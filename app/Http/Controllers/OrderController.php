<?php

namespace App\Http\Controllers;

use App\Mail\OrderBookingMail;
use App\Models\Order;
use App\Models\Tour;
use App\Models\UserAlert;
use App\Services\RazorpayPaymentService;
use App\Services\TrekDeclarationPdfService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Razorpay\Api\Errors\SignatureVerificationError;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, TrekDeclarationPdfService $pdfService): RedirectResponse
    {
        $data = $request->validate([
            'tour_id' => ['required', 'exists:tours,id'],
            'travel_date' => ['required', 'date', 'after_or_equal:today'],
            'travelers' => ['required', 'integer', 'min:1', 'max:50'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'declaration_accepted' => ['accepted'],
        ], [
            'declaration_accepted.accepted' => 'You must accept the Trek Declaration & Green Pledge to book.',
        ]);

        $tour = Tour::query()->whereKey($data['tour_id'])->where('is_active', true)->firstOrFail();
        $travelers = (int) $data['travelers'];

        $order = Order::create([
            'reference' => 'NT-'.strtoupper(Str::random(10)),
            'user_id' => $request->user()->id,
            'tour_id' => $tour->id,
            'status' => 'pending',
            'amount' => (float) $tour->price * $travelers,
            'travel_date' => $data['travel_date'],
            'travelers' => $travelers,
            'notes' => $data['notes'] ?? null,
            'declaration_accepted_at' => now(),
            'payment_status' => Order::PAYMENT_AWAITING,
        ]);

        $pdfPath = $pdfService->generateAndStore($order);
        $order->update(['declaration_pdf_path' => $pdfPath]);

        $order->load(['user', 'tour']);

        $mailSent = $this->sendBookingEmail($order, $request->user()->email);

        $admins = \App\Models\User::query()->where('is_admin', true)->get();
        foreach ($admins as $admin) {
            UserAlert::create([
                'user_id' => $admin->id,
                'title' => 'New tour booking',
                'body' => "Order {$order->reference} for {$tour->title} ({$travelers} members). Awaiting online payment.",
                'type' => 'order',
            ]);
        }

        if (! $mailSent) {
            foreach ($admins as $admin) {
                UserAlert::create([
                    'user_id' => $admin->id,
                    'title' => 'Booking email failed',
                    'body' => "Could not email {$request->user()->email} for order {$order->reference}. Resend from admin or run: php artisan orders:resend-email {$order->id}",
                    'type' => 'order',
                ]);
            }
        }

        $statusMessage = $mailSent
            ? 'Booking received. Complete payment below. Declaration sent to your email.'
            : 'Booking received. Complete payment below. Confirmation email could not be sent right now — check spam later or contact us with reference '.$order->reference.'.';

        return redirect()
            ->route('orders.payment', $order)
            ->with($mailSent ? 'status' : 'warning', $statusMessage);
    }

    public function payment(Request $request, Order $order, RazorpayPaymentService $razorpay): View|RedirectResponse
    {
        abort_unless($order->isOwnedBy($request->user()), 403);

        $order->load(['tour', 'user']);

        if ($order->isPaid()) {
            return redirect()
                ->route('dashboard')
                ->with('status', 'Payment already completed for '.$order->reference.'.');
        }

        if (! $order->needsPayment()) {
            return redirect()->route('dashboard');
        }

        try {
            $razorpayOrder = $razorpay->ensureOrder($order);
        } catch (\Throwable $e) {
            Log::error('Razorpay order creation failed', [
                'order_id' => $order->id,
                'error' => $e->getMessage(),
            ]);

            return redirect()
                ->route('dashboard')
                ->with('warning', 'Unable to start payment right now. Please try again in a few minutes or contact support.');
        }

        return view('orders.payment', [
            'order' => $order,
            'razorpayKey' => $razorpay->publicKey(),
            'razorpayOrderId' => $razorpayOrder['id'],
            'razorpayAmount' => (int) $razorpayOrder['amount'],
        ]);
    }

    public function verifyRazorpayPayment(Request $request, Order $order, RazorpayPaymentService $razorpay): JsonResponse
    {
        abort_unless($order->isOwnedBy($request->user()), 403);

        if ($order->isPaid()) {
            return response()->json([
                'success' => true,
                'redirect' => route('dashboard'),
            ]);
        }

        $data = $request->validate([
            'razorpay_payment_id' => ['required', 'string', 'max:255'],
            'razorpay_order_id' => ['required', 'string', 'max:255'],
            'razorpay_signature' => ['required', 'string', 'max:255'],
        ]);

        if ($order->razorpay_order_id !== $data['razorpay_order_id']) {
            return response()->json(['message' => 'Invalid payment order.'], 422);
        }

        try {
            $razorpay->verifySignature($data);
        } catch (SignatureVerificationError $e) {
            Log::warning('Razorpay signature verification failed', [
                'order_id' => $order->id,
                'error' => $e->getMessage(),
            ]);

            return response()->json(['message' => 'Payment verification failed. Please contact support.'], 422);
        }

        $order->update([
            'razorpay_payment_id' => $data['razorpay_payment_id'],
            'payment_status' => Order::PAYMENT_VERIFIED,
            'payment_verified_at' => now(),
            'status' => 'confirmed',
        ]);

        UserAlert::create([
            'user_id' => $order->user_id,
            'title' => 'Payment successful',
            'body' => "Your payment for order {$order->reference} was successful. Your booking is confirmed.",
            'type' => 'order',
        ]);

        $admins = \App\Models\User::query()->where('is_admin', true)->get();
        foreach ($admins as $admin) {
            UserAlert::create([
                'user_id' => $admin->id,
                'title' => 'Payment received',
                'body' => "Order {$order->reference} paid via Razorpay ({$data['razorpay_payment_id']}).",
                'type' => 'order',
            ]);
        }

        return response()->json([
            'success' => true,
            'redirect' => route('orders.payment', $order).'?paid=1',
        ]);
    }

    public function sendBookingEmail(Order $order, ?string $email = null): bool
    {
        $recipient = $email ?? $order->user?->email;

        if (! $recipient) {
            return false;
        }

        $order->loadMissing(['user', 'tour']);

        try {
            Mail::to($recipient)->send(new OrderBookingMail($order));

            return true;
        } catch (\Throwable $e) {
            Log::error('Booking confirmation email failed', [
                'order_id' => $order->id,
                'reference' => $order->reference,
                'recipient' => $recipient,
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }
}
