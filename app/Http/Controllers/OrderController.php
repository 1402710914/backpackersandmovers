<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tour;
use App\Models\UserAlert;
use App\Services\RazorpayPaymentService;
use App\Services\TourBookingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Razorpay\Api\Errors\SignatureVerificationError;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, TourBookingService $booking): RedirectResponse
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

        $order = $booking->createOrder(
            $request->user(),
            $tour,
            (int) $data['travelers'],
            $data['travel_date'],
            $data['notes'] ?? null
        );

        return redirect()
            ->route('orders.payment', $order)
            ->with('status', 'Booking received. Complete payment below. Declaration sent to your email.');
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

        $paymentError = null;
        $razorpayOrder = null;

        if (! $razorpay->isConfigured()) {
            $paymentError = 'Online payment is not configured yet. Please contact support to complete your booking.';
        } else {
            try {
                $razorpayOrder = $razorpay->ensureOrder($order);
            } catch (\Throwable $e) {
                Log::error('Razorpay order creation failed', [
                    'order_id' => $order->id,
                    'error' => $e->getMessage(),
                ]);

                $paymentError = str_contains(strtolower($e->getMessage()), 'authentication')
                    ? (config('app.debug')
                        ? 'Razorpay login failed: RAZORPAY_KEY / RAZORPAY_SECRET in .env are wrong or expired. Open dashboard.razorpay.com → Settings → API Keys, copy Test Mode Key ID + Secret into .env, then run: php artisan config:clear'
                        : 'Payment gateway credentials are invalid. Please contact support — we cannot process online payment until this is fixed.')
                    : 'Unable to start payment right now. Please try again in a few minutes or contact support.';
            }
        }

        return view('orders.payment', [
            'order' => $order,
            'paymentError' => $paymentError,
            'razorpayKey' => $razorpay->publicKey(),
            'razorpayOrderId' => $razorpayOrder['id'] ?? null,
            'razorpayAmount' => isset($razorpayOrder['amount']) ? (int) $razorpayOrder['amount'] : $razorpay->amountInPaise($order),
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

    public function sendBookingEmail(Order $order, ?string $email = null, ?TourBookingService $booking = null): bool
    {
        return ($booking ?? app(TourBookingService::class))->sendBookingEmail($order, $email);
    }
}
