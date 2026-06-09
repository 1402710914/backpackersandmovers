<?php

namespace App\Services;

use App\Models\Order;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class RazorpayPaymentService
{
    protected Api $api;

    public function __construct()
    {
        $this->api = new Api(
            config('payments.razorpay.key'),
            config('payments.razorpay.secret'),
        );
    }

    public function publicKey(): string
    {
        return (string) config('payments.razorpay.key');
    }

    public function isConfigured(): bool
    {
        $key = trim((string) config('payments.razorpay.key'));
        $secret = trim((string) config('payments.razorpay.secret'));

        return $key !== '' && $secret !== '';
    }

    /**
     * @return array<string, mixed>
     */
    public function ensureOrder(Order $order): array
    {
        $amountPaise = $this->amountInPaise($order);

        if ($order->razorpay_order_id) {
            try {
                $existing = $this->api->order->fetch($order->razorpay_order_id);

                if (
                    (int) ($existing['amount'] ?? 0) === $amountPaise
                    && ($existing['status'] ?? '') === 'created'
                ) {
                    return $existing->toArray();
                }
            } catch (\Throwable) {
                // Create a fresh Razorpay order below.
            }
        }

        $razorpayOrder = $this->api->order->create([
            'receipt' => $order->reference,
            'amount' => $amountPaise,
            'currency' => 'INR',
            'notes' => [
                'local_order_id' => (string) $order->id,
                'reference' => $order->reference,
            ],
        ]);

        $order->update(['razorpay_order_id' => $razorpayOrder['id']]);

        return $razorpayOrder->toArray();
    }

    /**
     * @param  array{razorpay_order_id: string, razorpay_payment_id: string, razorpay_signature: string}  $payload
     */
    public function verifySignature(array $payload): void
    {
        $this->api->utility->verifyPaymentSignature($payload);
    }

    public function amountInPaise(Order $order): int
    {
        return (int) round((float) $order->amount * 100);
    }
}
