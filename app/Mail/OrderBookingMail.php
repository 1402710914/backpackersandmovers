<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class OrderBookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Order $order) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking confirmation & Trek Declaration — '.$this->order->reference,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order-booking',
            with: [
                'order' => $this->order,
                'declaration' => config('trek-declaration'),
                'paymentUrl' => route('orders.payment', $this->order),
            ],
        );
    }

    public function attachments(): array
    {
        if (! $this->order->declaration_pdf_path) {
            return [];
        }

        $disk = Storage::disk('public');

        if (! $disk->exists($this->order->declaration_pdf_path)) {
            return [];
        }

        return [
            Attachment::fromPath($disk->path($this->order->declaration_pdf_path))
                ->as('Trek-Declaration-'.$this->order->reference.'.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
