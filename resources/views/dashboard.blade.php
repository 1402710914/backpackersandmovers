@extends('layouts.roavio', ['title' => 'My account'])

@section('content')
@include('partials.page-heading', [
    'title' => 'Dashboard',
    'items' => [
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Account'],
    ],
])

<section class="section-padding fix pt-0">
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning">{{ session('warning') }}</div>
        @endif

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="p-4 header-bg text-white rounded-3 h-100">
                    <h4 class="text-white mb-3">Recent bookings</h4>
                    @forelse ($orders ?? [] as $order)
                        @php
                            $paymentClass = match ($order->payment_status ?? 'awaiting_payment') {
                                'verified' => 'text-success',
                                'submitted' => 'text-warning',
                                'rejected' => 'text-danger',
                                default => 'text-white-50',
                            };
                        @endphp
                        <div class="border-bottom border-secondary pb-3 mb-3">
                            <div class="d-flex justify-content-between align-items-start gap-2">
                                <div>
                                    <strong>{{ $order->reference }}</strong><br>
                                    <small>{{ $order->tour?->title ?? 'Tour removed' }}</small><br>
                                    <small>Order: {{ ucfirst($order->status) }} · ₹{{ number_format($order->amount, 2) }}</small><br>
                                    <small class="{{ $paymentClass }}">{{ $order->paymentStatusLabel() }}</small>
                                </div>
                                <div class="text-end">
                                    <small>{{ $order->created_at?->format('M j, Y') }}</small>
                                    @if ($order->needsPayment())
                                        <br><a href="{{ route('orders.payment', $order) }}" class="btn btn-sm btn-light mt-2">Pay now</a>
                                    @elseif ($order->isPaid())
                                        <br><a href="{{ route('orders.payment', $order) }}" class="btn btn-sm btn-outline-light mt-2">Receipt</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="mb-0 small">No bookings yet. <a href="{{ route('tours.index') }}" class="text-white">Browse tours</a></p>
                    @endforelse
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-4 bg-light rounded-3 h-100">
                    <h4 class="mb-3">Notifications</h4>
                    @forelse ($alerts ?? [] as $alert)
                        <div class="mb-3 pb-2 border-bottom">
                            <strong>{{ $alert->title }}</strong>
                            <p class="small mb-0">{{ $alert->body }}</p>
                            <small class="text-muted">{{ $alert->created_at?->diffForHumans() }}</small>
                        </div>
                    @empty
                        <p class="small text-muted mb-0">No new notifications.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
