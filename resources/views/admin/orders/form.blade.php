@extends('admin.layout')

@section('title', 'Edit order')

@section('content')
<x-admin.page-toolbar :title="'Order '.$order->reference" subtitle="Update status and travel details" />

@if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<div class="row g-4">
    <div class="col-lg-5">
        <div class="admin-form-card mb-0">
            <h5 class="mb-3">Payment details</h5>
            <p class="mb-1"><strong>Status:</strong> {{ $order->paymentStatusLabel() }}</p>
            <p class="mb-1"><strong>Amount:</strong> ₹{{ number_format($order->amount, 2) }}</p>
            @if ($order->razorpay_order_id)
                <p class="mb-1"><strong>Razorpay order:</strong> <code class="small">{{ $order->razorpay_order_id }}</code></p>
            @endif
            @if ($order->razorpay_payment_id)
                <p class="mb-1"><strong>Razorpay payment:</strong> <code class="small">{{ $order->razorpay_payment_id }}</code></p>
            @endif
            @if ($order->payment_verified_at)
                <p class="mb-1"><strong>Paid at:</strong> {{ $order->payment_verified_at->format('d M Y, h:i A') }}</p>
            @endif

            @if ($order->isPaid())
                <div class="alert alert-success mb-0">Payment received via Razorpay. Order is confirmed.</div>
            @elseif ($order->needsPayment())
                <div class="alert alert-secondary mb-0">Awaiting customer payment on the website.</div>
            @endif

            @if ($order->declaration_pdf_path)
                <hr>
                <a href="{{ asset('storage/'.$order->declaration_pdf_path) }}" target="_blank" rel="noopener">Download declaration PDF</a>
            @endif
            @if ($order->user?->email)
                <hr>
                <form method="post" action="{{ route('admin.orders.resend-email', $order) }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary btn-sm">Resend booking email to {{ $order->user->email }}</button>
                </form>
            @endif
        </div>
    </div>

    <div class="col-lg-7">
        <form method="post" action="{{ route('admin.orders.update', $order) }}" class="admin-form-card">
            @csrf @method('PUT')
            <h5 class="mb-3">Order details</h5>
            <div class="mb-2"><label class="form-label">Status</label>
                <select name="status" class="form-select">
                    @foreach (['pending', 'confirmed', 'cancelled', 'completed'] as $s)
                        <option value="{{ $s }}" @selected(old('status', $order->status) === $s)>{{ $s }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2"><label class="form-label">Amount (₹)</label><input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $order->amount) }}" required></div>
            <div class="mb-2"><label class="form-label">Travel date</label><input type="date" name="travel_date" class="form-control" value="{{ old('travel_date', optional($order->travel_date)->format('Y-m-d')) }}"></div>
            <div class="mb-2"><label class="form-label">Members</label><input type="number" name="travelers" class="form-control" value="{{ old('travelers', $order->travelers) }}" required></div>
            <div class="mb-2"><label class="form-label">Customer</label><input type="text" class="form-control" value="{{ $order->user?->name }} ({{ $order->user?->email }})" disabled></div>
            <div class="mb-2"><label class="form-label">Tour</label><input type="text" class="form-control" value="{{ $order->tour?->title ?? '—' }}" disabled></div>
            <div class="mb-3"><label class="form-label">Notes</label><textarea name="notes" class="form-control" rows="3">{{ old('notes', $order->notes) }}</textarea></div>
            <div class="admin-form-actions">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-link">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
