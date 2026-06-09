<?php

namespace App\Console\Commands;

use App\Mail\OrderBookingMail;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ResendOrderBookingEmail extends Command
{
    protected $signature = 'orders:resend-email {order : Order ID or reference (e.g. NT-ABC123)}';

    protected $description = 'Resend booking confirmation email with Trek Declaration PDF';

    public function handle(): int
    {
        $key = $this->argument('order');

        $order = Order::query()
            ->with(['user', 'tour'])
            ->when(
                is_numeric($key),
                fn ($q) => $q->whereKey($key),
                fn ($q) => $q->where('reference', $key),
            )
            ->first();

        if (! $order) {
            $this->error('Order not found.');

            return self::FAILURE;
        }

        $recipient = $order->user?->email;

        if (! $recipient) {
            $this->error('Order has no customer email.');

            return self::FAILURE;
        }

        $this->info("Sending to {$recipient} for order {$order->reference}...");

        try {
            Mail::to($recipient)->send(new OrderBookingMail($order));
            $this->info('Email sent successfully.');

            return self::SUCCESS;
        } catch (\Throwable $e) {
            Log::error('Booking confirmation email failed', [
                'order_id' => $order->id,
                'reference' => $order->reference,
                'recipient' => $recipient,
                'error' => $e->getMessage(),
            ]);

            $this->error('Email failed — Gmail/server rejected the message.');
            $this->line($e->getMessage());
            $this->newLine();

            if (str_contains($e->getMessage(), 'Daily user sending limit exceeded')) {
                $this->warn('Gmail daily sending limit is full for iammanoj914@gmail.com.');
                $this->warn('Wait ~24 hours, then run this command again.');
                $this->warn('For production, use Hostinger/Zoho/SendGrid SMTP instead of personal Gmail.');
            }

            return self::FAILURE;
        }
    }
}
