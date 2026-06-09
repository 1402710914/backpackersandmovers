@extends('layouts.roavio', ['title' => 'Cart'])

@push('styles')
<style>
.cart-steps {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}
.cart-steps__item {
    display: flex;
    align-items: center;
    gap: 0.55rem;
    font-size: 0.82rem;
    font-weight: 600;
    color: #999;
}
.cart-steps__item--active {
    color: #151515;
}
.cart-steps__item--active .cart-steps__dot {
    background: var(--theme, #DA9B21);
    border-color: var(--theme, #DA9B21);
    color: #fff;
}
.cart-steps__dot {
    width: 1.75rem;
    height: 1.75rem;
    border-radius: 50%;
    border: 2px solid rgba(21, 21, 21, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.72rem;
    font-weight: 800;
    flex-shrink: 0;
    background: #fff;
}
.cart-steps__line {
    width: 2.5rem;
    height: 2px;
    background: rgba(21, 21, 21, 0.1);
    margin: 0 0.5rem;
}
.cart-page__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
}
.cart-page__header h2 {
    margin: 0;
    font-size: 1.35rem;
    font-weight: 800;
    color: #151515;
}
.cart-page__header p {
    margin: 0.2rem 0 0;
    font-size: 0.88rem;
    color: #777;
}
.cart-page__item {
    display: flex;
    gap: 1.25rem;
    border: 1px solid rgba(21, 21, 21, 0.08);
    border-radius: 16px;
    padding: 1.15rem;
    background: #fff;
    margin-bottom: 1rem;
    box-shadow: 0 4px 20px rgba(21, 21, 21, 0.05);
    transition: border-color 0.25s ease, box-shadow 0.25s ease;
}
.cart-page__item:hover {
    border-color: rgba(218, 155, 33, 0.25);
    box-shadow: 0 8px 28px rgba(21, 21, 21, 0.08);
}
.cart-page__thumb {
    flex-shrink: 0;
    width: 140px;
    border-radius: 12px;
    overflow: hidden;
    aspect-ratio: 4 / 3;
    background: linear-gradient(145deg, #e8e4df 0%, #d4cfc8 100%);
}
.cart-page__thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.cart-page__body {
    flex: 1;
    min-width: 0;
}
.cart-page__item-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 0.65rem;
}
.cart-page__title {
    font-size: 1.05rem;
    font-weight: 700;
    color: #151515;
    text-decoration: none;
    line-height: 1.35;
    display: block;
}
.cart-page__title:hover {
    color: var(--theme, #DA9B21);
}
.cart-page__category {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    margin-top: 0.35rem;
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--theme, #DA9B21);
    text-decoration: none;
}
.cart-page__category:hover {
    text-decoration: underline;
}
.cart-page__chips {
    display: flex;
    flex-wrap: wrap;
    gap: 0.4rem;
    margin-bottom: 0.85rem;
}
.cart-page__chip {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    font-size: 0.75rem;
    font-weight: 500;
    color: #555;
    background: #f5f4f2;
    border: 1px solid rgba(21, 21, 21, 0.06);
    border-radius: 999px;
    padding: 0.3rem 0.65rem;
}
.cart-page__chip i {
    font-size: 0.7rem;
    color: var(--theme, #DA9B21);
}
.cart-page__price-block {
    text-align: right;
    flex-shrink: 0;
}
.cart-page__line-total {
    font-size: 1.15rem;
    font-weight: 800;
    color: #151515;
    white-space: nowrap;
    line-height: 1.2;
}
.cart-page__unit-price {
    font-size: 0.78rem;
    color: #888;
    margin-top: 0.15rem;
}
.cart-page__edit {
    border-top: 1px solid rgba(21, 21, 21, 0.06);
    padding-top: 0.85rem;
    margin-top: 0.25rem;
}
.cart-page__edit-label {
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #999;
    margin-bottom: 0.65rem;
}
.cart-page__form .form-label {
    font-size: 0.78rem;
    font-weight: 600;
    color: #555;
}
.cart-page__form .form-control {
    border-radius: 10px;
    border-color: rgba(21, 21, 21, 0.12);
    font-size: 0.88rem;
}
.cart-page__form .form-control:focus {
    border-color: var(--theme, #DA9B21);
    box-shadow: 0 0 0 3px rgba(218, 155, 33, 0.15);
}
.cart-page__update-btn {
    border-radius: 10px;
    font-size: 0.82rem;
    font-weight: 600;
    padding: 0.45rem 0.75rem;
    border-color: rgba(21, 21, 21, 0.15);
    color: #333;
    transition: all 0.2s;
}
.cart-page__update-btn:hover {
    background: var(--theme, #DA9B21);
    border-color: var(--theme, #DA9B21);
    color: #fff;
}
.cart-page__remove-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    font-size: 0.8rem;
    font-weight: 600;
    color: #c0392b;
    background: none;
    border: none;
    padding: 0.45rem 0;
    cursor: pointer;
    text-decoration: none;
    transition: opacity 0.2s;
}
.cart-page__remove-btn:hover {
    opacity: 0.75;
    color: #c0392b;
}
.cart-page__summary-wrap {
    position: sticky;
    top: 5.5rem;
}
.cart-page__summary {
    border-radius: 18px;
    overflow: hidden;
    background: #fff;
    border: 1px solid rgba(21, 21, 21, 0.08);
    box-shadow: 0 16px 48px rgba(21, 21, 21, 0.1);
}
.cart-page__summary-head {
    padding: 1.35rem;
    background: linear-gradient(145deg, #1a1a1a 0%, #333 100%);
    color: #fff;
    text-align: center;
}
.cart-page__summary-label {
    margin: 0;
    font-size: 0.72rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    opacity: 0.7;
}
.cart-page__summary-total {
    margin: 0.25rem 0 0;
    font-size: 2rem;
    font-weight: 800;
    color: var(--theme, #DA9B21);
    line-height: 1.1;
}
.cart-page__summary-count {
    margin: 0.4rem 0 0;
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.75);
}
.cart-page__summary-body {
    padding: 1.25rem 1.35rem;
}
.cart-page__summary-lines {
    list-style: none;
    padding: 0;
    margin: 0 0 1rem;
}
.cart-page__summary-line {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 0.75rem;
    padding: 0.55rem 0;
    border-bottom: 1px solid rgba(21, 21, 21, 0.06);
    font-size: 0.82rem;
}
.cart-page__summary-line:last-child {
    border-bottom: none;
}
.cart-page__summary-line-name {
    color: #444;
    line-height: 1.35;
    flex: 1;
    min-width: 0;
}
.cart-page__summary-line-name strong {
    display: block;
    font-weight: 600;
    color: #151515;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.cart-page__summary-line-name small {
    color: #999;
}
.cart-page__summary-line-price {
    font-weight: 700;
    color: #151515;
    white-space: nowrap;
}
.cart-page__summary-note {
    font-size: 0.78rem;
    color: #888;
    line-height: 1.5;
    margin-bottom: 1.15rem;
    padding: 0.75rem;
    background: #faf9f7;
    border-radius: 10px;
    border: 1px solid rgba(21, 21, 21, 0.05);
}
.cart-page__trust {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0.5rem;
    margin-bottom: 1.15rem;
}
.cart-page__trust-item {
    text-align: center;
    padding: 0.55rem 0.25rem;
    background: #faf9f7;
    border-radius: 10px;
    border: 1px solid rgba(21, 21, 21, 0.05);
}
.cart-page__trust-item strong {
    display: block;
    font-size: 0.95rem;
    font-weight: 800;
    color: var(--theme, #DA9B21);
    line-height: 1.2;
}
.cart-page__trust-item span {
    font-size: 0.65rem;
    color: #888;
    line-height: 1.3;
}
.cart-page__empty {
    text-align: center;
    padding: 3.5rem 1.5rem;
    background: #fff;
    border-radius: 18px;
    border: 1px solid rgba(21, 21, 21, 0.08);
    box-shadow: 0 8px 32px rgba(21, 21, 21, 0.06);
    max-width: 520px;
    margin: 0 auto;
}
.cart-page__empty-icon {
    width: 4.5rem;
    height: 4.5rem;
    margin: 0 auto 1.25rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: linear-gradient(145deg, rgba(218, 155, 33, 0.15) 0%, rgba(218, 155, 33, 0.05) 100%);
    color: var(--theme, #DA9B21);
    font-size: 1.75rem;
}
.cart-page__empty h2 {
    font-size: 1.35rem;
    font-weight: 800;
    color: #151515;
    margin-bottom: 0.5rem;
}
.cart-page__empty p {
    color: #777;
    font-size: 0.92rem;
    margin-bottom: 1.5rem;
    line-height: 1.55;
}
@media (max-width: 767.98px) {
    .cart-page__item {
        flex-direction: column;
    }
    .cart-page__thumb {
        width: 100%;
        aspect-ratio: 16 / 9;
    }
    .cart-page__item-top {
        flex-direction: column;
    }
    .cart-page__price-block {
        text-align: left;
    }
    .cart-steps__line {
        width: 1.5rem;
    }
}
</style>
@endpush

@section('content')
<div class="breadcrumb-wrapper-3 fix bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-2.jpg') }}');">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Your cart</h1>
            </div>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="style-2 style-3">Cart</li>
            </ul>
        </div>
    </div>
</div>

<section class="cart-list-area section-padding fix">
    <div class="container">
        @if ($cartItems->isEmpty())
            <div class="cart-page__empty wow fadeInUp">
                <div class="cart-page__empty-icon" aria-hidden="true">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <h2>Your cart is empty</h2>
                <p>Browse school &amp; college tour programs, pick a date and group size, then add them here to plan your trip.</p>
                <a href="{{ route('tours.index') }}" class="theme-btn">
                    <i class="fa-solid fa-compass" aria-hidden="true"></i> Browse tours
                </a>
            </div>
        @else
            <nav class="cart-steps wow fadeInUp" aria-label="Booking progress">
                <div class="cart-steps__item cart-steps__item--active">
                    <span class="cart-steps__dot">1</span>
                    <span>Cart</span>
                </div>
                <span class="cart-steps__line" aria-hidden="true"></span>
                <div class="cart-steps__item">
                    <span class="cart-steps__dot">2</span>
                    <span>Checkout</span>
                </div>
                <span class="cart-steps__line" aria-hidden="true"></span>
                <div class="cart-steps__item">
                    <span class="cart-steps__dot">3</span>
                    <span>Payment</span>
                </div>
            </nav>

            @include('tours.partials.pickup-notice', ['class' => 'wow fadeInUp mb-4'])

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="cart-page__header wow fadeInUp">
                        <div>
                            <h2>{{ $cartItems->count() }} {{ \Illuminate\Support\Str::plural('program', $cartItems->count()) }} in your cart</h2>
                            <p>Review dates and group size before checkout</p>
                        </div>
                    </div>

                    @foreach ($cartItems as $item)
                        @php
                            $tour = $item['tour'];
                            $tourUrl = route('tours.show', $tour->slug);
                            $formattedDate = \Illuminate\Support\Carbon::parse($item['travel_date'])->format('D, d M Y');
                            $lineTotalFormatted = $item['line_total'] > 0
                                ? '₹'.number_format($item['line_total'], floor($item['line_total']) === $item['line_total'] ? 0 : 2)
                                : 'On request';
                        @endphp
                        <article class="cart-page__item wow fadeInUp" data-wow-delay=".{{ min(2 + $loop->iteration, 6) }}s">
                            <a href="{{ $tourUrl }}" class="cart-page__thumb" aria-label="{{ $tour->title }}">
                                <img src="{{ $tour->listingImageUrl() }}" alt="{{ $tour->title }}" loading="lazy" width="280" height="210">
                            </a>

                            <div class="cart-page__body">
                                <div class="cart-page__item-top">
                                    <div>
                                        <a href="{{ $tourUrl }}" class="cart-page__title">{{ $tour->title }}</a>
                                        @if ($tour->category)
                                            <a href="{{ route('tours.category', $tour->category->slug) }}" class="cart-page__category">
                                                <i class="fa-solid fa-layer-group" aria-hidden="true"></i>
                                                {{ $tour->category->name }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="cart-page__price-block">
                                        <div class="cart-page__line-total">{{ $lineTotalFormatted }}</div>
                                        <div class="cart-page__unit-price">{{ $tour->formattedPrice() }} × {{ $item['travelers'] }} member{{ $item['travelers'] === 1 ? '' : 's' }}</div>
                                    </div>
                                </div>

                                <div class="cart-page__chips">
                                    <span class="cart-page__chip">
                                        <i class="fa-regular fa-calendar" aria-hidden="true"></i>
                                        {{ $formattedDate }}
                                    </span>
                                    <span class="cart-page__chip">
                                        <i class="fa-regular fa-clock" aria-hidden="true"></i>
                                        {{ (int) $tour->duration_days }} day{{ (int) $tour->duration_days === 1 ? '' : 's' }}
                                    </span>
                                    <span class="cart-page__chip">
                                        <i class="fa-solid fa-bus" aria-hidden="true"></i>
                                        {{ $tour->pickupLocationsLabel() }}
                                    </span>
                                    @if ($tour->destination)
                                        <span class="cart-page__chip">
                                            <i class="fa-regular fa-location-dot" aria-hidden="true"></i>
                                            {{ $tour->destination->name }}
                                        </span>
                                    @endif
                                </div>

                                <div class="cart-page__edit">
                                    <div class="cart-page__edit-label">Update booking details</div>
                                    <div class="row g-2 align-items-end">
                                        <div class="col">
                                            <form action="{{ route('cart.update', $item['key']) }}" method="post" class="cart-page__form">
                                                @csrf
                                                @method('PUT')
                                                <div class="row g-2 align-items-end">
                                                    <div class="col-sm-5">
                                                        <label class="form-label" for="travel_date_{{ $item['key'] }}">Travel date</label>
                                                        <input type="date" id="travel_date_{{ $item['key'] }}" name="travel_date" class="form-control" value="{{ $item['travel_date'] }}" min="{{ now()->toDateString() }}" required>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label" for="travelers_{{ $item['key'] }}">Members</label>
                                                        <input type="number" id="travelers_{{ $item['key'] }}" name="travelers" class="form-control" min="1" max="50" value="{{ $item['travelers'] }}" required>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <button type="submit" class="btn btn-outline-secondary cart-page__update-btn w-100">
                                                            <i class="fa-solid fa-rotate" aria-hidden="true"></i> Update
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-auto">
                                            <form action="{{ route('cart.destroy', $item['key']) }}" method="post" onsubmit="return confirm('Remove this tour from cart?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="cart-page__remove-btn" aria-label="Remove {{ $tour->title }} from cart">
                                                    <i class="fa-solid fa-trash-can" aria-hidden="true"></i> Remove
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="col-lg-4">
                    <div class="cart-page__summary-wrap wow fadeInUp" data-wow-delay=".3s">
                        <aside class="cart-page__summary" aria-label="Order summary">
                            <div class="cart-page__summary-head">
                                <p class="cart-page__summary-label">Estimated total</p>
                                <p class="cart-page__summary-total">
                                    {{ $cartSubtotal > 0 ? '₹'.number_format($cartSubtotal, floor($cartSubtotal) === $cartSubtotal ? 0 : 2) : 'On request' }}
                                </p>
                                <p class="cart-page__summary-count">{{ $cartItems->count() }} {{ \Illuminate\Support\Str::plural('program', $cartItems->count()) }}</p>
                            </div>

                            <div class="cart-page__summary-body">
                                <ul class="cart-page__summary-lines">
                                    @foreach ($cartItems as $item)
                                        @php $tour = $item['tour']; @endphp
                                        <li class="cart-page__summary-line">
                                            <div class="cart-page__summary-line-name">
                                                <strong title="{{ $tour->title }}">{{ $tour->listingTitle() }}</strong>
                                                <small>{{ $item['travelers'] }} member{{ $item['travelers'] === 1 ? '' : 's' }} · {{ \Illuminate\Support\Carbon::parse($item['travel_date'])->format('d M') }}</small>
                                            </div>
                                            <span class="cart-page__summary-line-price">
                                                {{ $item['line_total'] > 0 ? '₹'.number_format($item['line_total'], 0) : '—' }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="cart-page__trust">
                                    <div class="cart-page__trust-item">
                                        <strong>300+</strong>
                                        <span>Programs done</span>
                                    </div>
                                    <div class="cart-page__trust-item">
                                        <strong>100%</strong>
                                        <span>Supervised</span>
                                    </div>
                                    <div class="cart-page__trust-item">
                                        <strong>2</strong>
                                        <span>Pickup cities</span>
                                    </div>
                                </div>

                                <p class="cart-page__summary-note">
                                    Final pricing may vary by group size and school batch. Sign in and proceed to checkout to confirm your booking.
                                </p>

                                @auth
                                    <a href="{{ route('cart.checkout') }}" class="theme-btn w-100 text-center d-block mb-2">
                                        <i class="fa-solid fa-lock" aria-hidden="true"></i> Proceed to checkout
                                    </a>
                                    <a href="{{ route('tours.index') }}" class="btn btn-outline-secondary w-100">Continue browsing</a>
                                @else
                                    <a href="{{ route('cart.checkout') }}" class="theme-btn w-100 text-center d-block mb-2">
                                        <i class="fa-solid fa-right-to-bracket" aria-hidden="true"></i> Log in to checkout
                                    </a>
                                    <a href="{{ route('register') }}" class="btn btn-outline-secondary w-100 mb-2">Create account</a>
                                    <a href="{{ route('tours.index') }}" class="btn btn-link w-100 text-center text-muted">Continue browsing</a>
                                @endauth
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
