<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    public const PAYMENT_AWAITING = 'awaiting_payment';

    public const PAYMENT_SUBMITTED = 'submitted';

    public const PAYMENT_VERIFIED = 'verified';

    public const PAYMENT_REJECTED = 'rejected';

    protected $fillable = [
        'reference', 'user_id', 'tour_id', 'status', 'amount',
        'travel_date', 'travelers', 'notes',
        'declaration_accepted_at', 'declaration_pdf_path',
        'payment_status', 'payment_utr', 'payment_proof_path', 'payment_notes',
        'payment_submitted_at', 'payment_verified_at', 'payment_verified_by',
        'razorpay_order_id', 'razorpay_payment_id',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'travel_date' => 'date',
            'declaration_accepted_at' => 'datetime',
            'payment_submitted_at' => 'datetime',
            'payment_verified_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }

    public function paymentVerifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'payment_verified_by');
    }

    public function paymentStatusLabel(): string
    {
        return match ($this->payment_status) {
            self::PAYMENT_VERIFIED => 'Payment successful',
            self::PAYMENT_SUBMITTED => 'Payment submitted — awaiting verification',
            self::PAYMENT_REJECTED => 'Payment failed — try again',
            default => 'Awaiting payment',
        };
    }

    public function needsPayment(): bool
    {
        return $this->payment_status === self::PAYMENT_AWAITING
            && $this->status !== 'cancelled';
    }

    public function isPaid(): bool
    {
        return $this->payment_status === self::PAYMENT_VERIFIED;
    }

    /** @deprecated Use needsPayment() */
    public function canSubmitPayment(): bool
    {
        return $this->needsPayment();
    }

    public function isOwnedBy(?User $user): bool
    {
        return $user && (int) $this->user_id === (int) $user->id;
    }
}
