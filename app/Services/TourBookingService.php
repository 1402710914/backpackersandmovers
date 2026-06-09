<?php

namespace App\Services;

use App\Mail\OrderBookingMail;
use App\Models\Order;
use App\Models\Tour;
use App\Models\User;
use App\Models\UserAlert;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TourBookingService
{
    public function __construct(
        private readonly TrekDeclarationPdfService $pdfService,
    ) {}

    public function createOrder(User $user, Tour $tour, int $travelers, string $travelDate, ?string $notes = null): Order
    {
        $travelers = max(1, $travelers);

        $order = Order::create([
            'reference' => 'NT-'.strtoupper(Str::random(10)),
            'user_id' => $user->id,
            'tour_id' => $tour->id,
            'status' => 'pending',
            'amount' => (float) $tour->price * $travelers,
            'travel_date' => $travelDate,
            'travelers' => $travelers,
            'notes' => $notes,
            'declaration_accepted_at' => now(),
            'payment_status' => Order::PAYMENT_AWAITING,
        ]);

        $pdfPath = $this->pdfService->generateAndStore($order);
        $order->update(['declaration_pdf_path' => $pdfPath]);
        $order->load(['user', 'tour']);

        $mailSent = $this->sendBookingEmail($order, $user->email);

        $admins = User::query()->where('is_admin', true)->get();
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
                    'body' => "Could not email {$user->email} for order {$order->reference}. Resend from admin or run: php artisan orders:resend-email {$order->id}",
                    'type' => 'order',
                ]);
            }
        }

        return $order;
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
