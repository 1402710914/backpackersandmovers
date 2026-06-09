@extends('layouts.roavio', ['title' => 'Complete payment'])

@section('content')
<div class="payment-page-wrap">
@include('partials.page-heading', [
    'title' => 'Complete payment',
    'items' => [
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Dashboard', 'url' => route('dashboard')],
        ['label' => 'Payment'],
    ],
])

@php
    $paid = request('paid') === '1' || $order->isPaid();
    $paymentBadgeClass = $paid ? 'payment-badge--verified' : 'payment-badge--pending';
@endphp

<section class="section-padding fix payment-page pt-0">
    <div class="container payment-page__inner">
        @if (session('status'))
            <div class="alert payment-alert-success">{{ session('status') }}</div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning">{{ session('warning') }}</div>
        @endif
        @if ($paid)
            <div class="alert payment-alert-success">Payment successful! Your booking is confirmed.</div>
        @endif

        <div class="payment-hero">
            <div class="payment-hero__top">
                <div>
                    <span class="payment-hero__label"><i class="fa-solid fa-receipt"></i> Booking reference</span>
                    <p class="payment-hero__ref">{{ $order->reference }}</p>
                    <p class="payment-hero__tour">{{ $order->tour?->title ?? 'Tour' }}</p>
                </div>
                <div class="payment-hero__amount-wrap">
                    <div class="payment-hero__amount-label">Amount to pay</div>
                    <p class="payment-hero__amount">₹{{ number_format($order->amount, 0) }}</p>
                </div>
            </div>
        </div>

        <div class="payment-steps">
            <div class="payment-step {{ $paid ? 'is-done' : 'is-active' }}">
                <span class="payment-step__num">{{ $paid ? '✓' : '1' }}</span>
                <span class="payment-step__text">
                    <strong>Pay online</strong>
                    <small>Card, UPI, netbanking via Razorpay</small>
                </span>
            </div>
            <div class="payment-step {{ $paid ? 'is-active is-done' : '' }}">
                <span class="payment-step__num">{{ $paid ? '✓' : '2' }}</span>
                <span class="payment-step__text">
                    <strong>Confirmed</strong>
                    <small>Booking active</small>
                </span>
            </div>
        </div>

        <div class="payment-grid">
            <div class="payment-card">
                <div class="payment-card__head">
                    <i class="fa-regular fa-clipboard" aria-hidden="true"></i>
                    <h4>Order summary</h4>
                </div>
                <div class="payment-card__body">
                    <div class="payment-facts">
                        <div class="payment-fact">
                            <span class="payment-fact__icon"><i class="fa-regular fa-calendar" aria-hidden="true"></i></span>
                            <span class="payment-fact__text">
                                <strong>{{ $order->travel_date?->format('d M Y') ?? '—' }}</strong>
                                <small>Travel date</small>
                            </span>
                        </div>
                        <div class="payment-fact">
                            <span class="payment-fact__icon"><i class="fa-regular fa-users" aria-hidden="true"></i></span>
                            <span class="payment-fact__text">
                                <strong>{{ $order->travelers }} member{{ $order->travelers === 1 ? '' : 's' }}</strong>
                                <small>Group size</small>
                            </span>
                        </div>
                        <div class="payment-fact">
                            <span class="payment-fact__icon"><i class="fa-solid fa-indian-rupee-sign" aria-hidden="true"></i></span>
                            <span class="payment-fact__text">
                                <strong>₹{{ number_format($order->amount, 2) }}</strong>
                                <small>Total payable</small>
                            </span>
                        </div>
                    </div>

                    <div class="payment-badges">
                        <span class="payment-badge {{ $paymentBadgeClass }}">
                            <i class="fa-solid fa-circle" style="font-size:0.45rem"></i>
                            {{ $order->paymentStatusLabel() }}
                        </span>
                        <span class="payment-badge {{ $order->status === 'confirmed' ? 'payment-badge--confirmed' : 'payment-badge--pending' }}">
                            Order: {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="payment-card">
                <div class="payment-card__head">
                    <i class="fa-solid fa-credit-card" aria-hidden="true"></i>
                    <h4>Secure payment</h4>
                </div>
                <div class="payment-card__body text-center">
                    @if ($paid)
                        <div class="payment-done-card__icon d-inline-flex mb-3">
                            <i class="fa-solid fa-check" aria-hidden="true"></i>
                        </div>
                        <p class="mb-1"><strong>Payment received</strong></p>
                        @if ($order->razorpay_payment_id)
                            <p class="small text-muted mb-3">Payment ID: <code>{{ $order->razorpay_payment_id }}</code></p>
                        @endif
                        <a href="{{ route('dashboard') }}" class="theme-btn border-0">Go to dashboard</a>
                    @elseif (! empty($paymentError))
                        <div class="alert alert-warning text-start mb-4">{{ $paymentError }}</div>
                        <p class="payment-qr-hint mb-4">You can reach us on WhatsApp or email with your booking reference <strong>{{ $order->reference }}</strong> and we will help you complete payment.</p>
                        <a href="https://wa.me/918788883003?text={{ rawurlencode('Payment help for order '.$order->reference) }}" target="_blank" rel="noopener noreferrer" class="theme-btn border-0 px-4 py-3 me-2 mb-2">
                            <i class="fa-brands fa-whatsapp me-1"></i> WhatsApp support
                        </a>
                        <a href="{{ route('dashboard') }}" class="theme-btn border-0 px-4 py-3 mb-2" style="background:#555;">Back to dashboard</a>
                    @else
                        <p class="payment-qr-hint mb-4">Pay securely with UPI, debit/credit card, or net banking. Your booking confirms instantly after successful payment.</p>
                        <button type="button" id="rzp-pay-btn" class="theme-btn border-0 px-5 py-3">
                            <i class="fa-solid fa-lock me-1"></i> Pay ₹{{ number_format($order->amount, 2) }}
                        </button>
                        <p class="small text-muted mt-3 mb-0">Powered by Razorpay</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="payment-help-strip">
            <span>Need help with payment?</span>
            <a href="https://wa.me/918788883003?text={{ rawurlencode('Payment help for order '.$order->reference) }}" target="_blank" rel="noopener noreferrer" class="whatsapp">
                <i class="fa-brands fa-whatsapp"></i> WhatsApp us
            </a>
            <a href="mailto:backpackersandmovers@gmail.com?subject={{ rawurlencode('Payment query — '.$order->reference) }}">
                <i class="fa-regular fa-envelope"></i> Email support
            </a>
        </div>
    </div>
</section>
</div>

@include('orders.partials.payment-styles')

@if (! $paid && empty($paymentError))
@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
(function () {
    const btn = document.getElementById('rzp-pay-btn');
    if (!btn) return;

    const options = {
        key: @json($razorpayKey),
        amount: @json($razorpayAmount),
        currency: 'INR',
        name: @json(config('app.name')),
        description: @json('Booking '.$order->reference),
        order_id: @json($razorpayOrderId),
        prefill: {
            name: @json($order->user?->name ?? ''),
            email: @json($order->user?->email ?? ''),
        },
        theme: { color: '#da9b21' },
        handler: function (response) {
            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Verifying...';

            fetch(@json(route('orders.payment.verify', $order)), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    razorpay_payment_id: response.razorpay_payment_id,
                    razorpay_order_id: response.razorpay_order_id,
                    razorpay_signature: response.razorpay_signature,
                }),
            })
            .then(r => r.json().then(data => ({ ok: r.ok, data })))
            .then(({ ok, data }) => {
                if (ok && data.success) {
                    window.location.href = data.redirect;
                    return;
                }
                alert(data.message || 'Payment verification failed. Please contact support.');
                btn.disabled = false;
                btn.innerHTML = '<i class="fa-solid fa-lock me-1"></i> Pay ₹{{ number_format($order->amount, 2) }}';
            })
            .catch(() => {
                alert('Something went wrong. If amount was deducted, contact us with your booking reference.');
                btn.disabled = false;
                btn.innerHTML = '<i class="fa-solid fa-lock me-1"></i> Pay ₹{{ number_format($order->amount, 2) }}';
            });
        },
        modal: {
            ondismiss: function () {
                btn.disabled = false;
            }
        }
    };

    const rzp = new Razorpay(options);
    btn.addEventListener('click', function () {
        rzp.open();
    });
})();
</script>
@endpush
@endif
@endsection
