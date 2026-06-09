@extends('layouts.roavio', ['title' => 'Checkout'])

@section('content')
<div class="breadcrumb-wrapper-3 fix bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-2.jpg') }}');">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Checkout</h1>
            </div>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('cart.index') }}">Cart</a></li>
                <li class="style-2 style-3">Checkout</li>
            </ul>
        </div>
    </div>
</div>

<section class="section-padding fix">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-7">
                <h2 class="h5 mb-3">Booking summary</h2>
                @foreach ($cartItems as $item)
                    @php $tour = $item['tour']; @endphp
                    <div class="border rounded-3 p-3 mb-3 bg-white">
                        <h3 class="h6 mb-1">{{ $tour->title }}</h3>
                        @if ($tour->category)
                            <p class="small text-muted mb-2">{{ $tour->category->name }}</p>
                        @endif
                        <ul class="list-unstyled small mb-0">
                            <li><strong>Travel date:</strong> {{ \Illuminate\Support\Carbon::parse($item['travel_date'])->format('d M Y') }}</li>
                            <li><strong>Members:</strong> {{ $item['travelers'] }}</li>
                            <li><strong>Line total:</strong> {{ $item['line_total'] > 0 ? '₹'.number_format($item['line_total'], 0) : 'On request' }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>

            <div class="col-lg-5">
                <div class="border rounded-3 p-4 bg-light">
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                        <span class="fw-semibold">Total</span>
                        <strong>{{ $cartSubtotal > 0 ? '₹'.number_format($cartSubtotal, 0) : 'On request' }}</strong>
                    </div>

                    <form action="{{ route('cart.checkout.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="checkout_notes">School name &amp; notes</label>
                            <textarea id="checkout_notes" name="notes" class="form-control" rows="3" placeholder="School/college name, pickup city (Pune or Mumbai), grade, special needs">{{ old('notes') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('declaration_accepted') is-invalid @enderror" id="declaration_accepted" name="declaration_accepted" value="1" @checked(old('declaration_accepted')) required>
                                <label class="form-check-label small" for="declaration_accepted">
                                    I accept the <strong>Trek Declaration &amp; Green Pledge</strong> (sent by email &amp; PDF after booking).
                                </label>
                                @error('declaration_accepted')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <details class="small text-muted mt-2">
                                <summary class="cursor-pointer">Read declaration</summary>
                                <div class="mt-2 pe-1" style="max-height: 160px; overflow-y: auto;">
                                    @foreach (preg_split('/\n\s*\n/', trim(config('trek-declaration.declaration'))) as $paragraph)
                                        <p class="mb-2">{{ $paragraph }}</p>
                                    @endforeach
                                    <p class="mb-1 fw-semibold">{{ config('trek-declaration.green_pledge_title') }}</p>
                                    <ul class="ps-3 mb-2">
                                        @foreach (config('trek-declaration.green_pledge_items') as $pledgeItem)
                                            <li>{{ $pledgeItem }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </details>
                        </div>
                        <button type="submit" class="theme-btn w-100 border-0 mb-2">
                            <i class="fa-solid fa-lock" aria-hidden="true"></i> Confirm booking &amp; pay
                        </button>
                        <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary w-100">Back to cart</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
