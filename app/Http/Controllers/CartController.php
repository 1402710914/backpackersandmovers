<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Services\CartService;
use App\Services\TourBookingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(CartService $cart): View
    {
        $cart->pruneInactiveTours();

        return view('cart.index', [
            'cartItems' => $cart->hydratedItems(),
            'cartSubtotal' => $cart->subtotal(),
        ]);
    }

    public function store(Request $request, CartService $cart): RedirectResponse
    {
        $data = $request->validate([
            'tour_id' => ['required', 'exists:tours,id'],
            'travel_date' => ['required', 'date', 'after_or_equal:today'],
            'travelers' => ['required', 'integer', 'min:1', 'max:50'],
        ]);

        Tour::query()
            ->whereKey($data['tour_id'])
            ->where('is_active', true)
            ->firstOrFail();

        $cart->add(
            (int) $data['tour_id'],
            (int) $data['travelers'],
            $data['travel_date']
        );

        return redirect()
            ->route('cart.index')
            ->with('status', 'Tour added to your cart.');
    }

    public function update(Request $request, string $key, CartService $cart): RedirectResponse
    {
        $data = $request->validate([
            'travel_date' => ['required', 'date', 'after_or_equal:today'],
            'travelers' => ['required', 'integer', 'min:1', 'max:50'],
        ]);

        if (! $cart->update($key, (int) $data['travelers'], $data['travel_date'])) {
            abort(404);
        }

        return redirect()
            ->route('cart.index')
            ->with('status', 'Cart updated.');
    }

    public function destroy(string $key, CartService $cart): RedirectResponse
    {
        if (! $cart->remove($key)) {
            abort(404);
        }

        return redirect()
            ->route('cart.index')
            ->with('status', 'Item removed from cart.');
    }

    public function checkout(CartService $cart): View|RedirectResponse
    {
        $cart->pruneInactiveTours();
        $cartItems = $cart->hydratedItems();

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('warning', 'Your cart is empty.');
        }

        return view('cart.checkout', [
            'cartItems' => $cartItems,
            'cartSubtotal' => $cart->subtotal(),
        ]);
    }

    public function processCheckout(Request $request, CartService $cart, TourBookingService $booking): RedirectResponse
    {
        $cart->pruneInactiveTours();
        $cartItems = $cart->hydratedItems();

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('warning', 'Your cart is empty.');
        }

        $data = $request->validate([
            'notes' => ['nullable', 'string', 'max:2000'],
            'declaration_accepted' => ['accepted'],
        ], [
            'declaration_accepted.accepted' => 'You must accept the Trek Declaration & Green Pledge to book.',
        ]);

        $user = $request->user();
        $orders = [];

        foreach ($cartItems as $item) {
            $orders[] = $booking->createOrder(
                $user,
                $item['tour'],
                $item['travelers'],
                $item['travel_date'],
                $data['notes'] ?? null
            );
        }

        $cart->clear();

        $firstOrder = $orders[0];
        $count = count($orders);

        $statusMessage = $count === 1
            ? 'Booking received. Complete payment below. Declaration sent to your email.'
            : "{$count} bookings received. Complete payment for your first tour below — pay the rest from your dashboard.";

        return redirect()
            ->route('orders.payment', $firstOrder)
            ->with('status', $statusMessage);
    }
}
