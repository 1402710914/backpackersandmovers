@extends('admin.layout')

@section('title', 'Bookings')

@section('content')
<x-admin.page-toolbar title="Tour bookings" subtitle="Customer orders, UPI payments, and status" />

@if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<div class="admin-table-panel">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Ref</th>
                    <th>User</th>
                    <th>Tour</th>
                    <th>Amount</th>
                    <th>Order</th>
                    <th>Payment</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                @php
                    $paymentBadge = match ($order->payment_status ?? 'awaiting_payment') {
                        'verified' => 'success',
                        'submitted' => 'warning',
                        'rejected' => 'danger',
                        default => 'muted',
                    };
                @endphp
                <tr>
                    <td><code class="small">{{ $order->reference }}</code></td>
                    <td>{{ $order->user?->email ?? '—' }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($order->tour?->title ?? '—', 40) }}</td>
                    <td>₹{{ number_format($order->amount, 2) }}</td>
                    <td><span class="admin-badge admin-badge-muted">{{ $order->status }}</span></td>
                    <td><span class="badge bg-{{ $paymentBadge === 'muted' ? 'secondary' : $paymentBadge }}">{{ str_replace('_', ' ', $order->payment_status ?? 'awaiting_payment') }}</span></td>
                    <td class="text-end">
                        <a href="{{ route('admin.orders.edit', $order) }}">Manage</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="admin-pagination">{{ $orders->links() }}</div>
@endsection
