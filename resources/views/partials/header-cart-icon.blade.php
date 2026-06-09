<a href="{{ route('cart.index') }}" class="header-cart-link" aria-label="Cart{{ $cartItemCount > 0 ? ', '.$cartItemCount.' items' : '' }}">
    <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
    @if ($cartItemCount > 0)
        <span class="header-cart-link__count">{{ $cartItemCount > 99 ? '99+' : $cartItemCount }}</span>
    @endif
</a>
