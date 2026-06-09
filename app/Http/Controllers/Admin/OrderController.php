<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController as SiteOrderController;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::query()->with(['user', 'tour'])->orderByDesc('id')->paginate(25);

        return view('admin.orders.index', compact('orders'));
    }

    public function edit(Order $order): View
    {
        $order->load(['user', 'tour', 'paymentVerifier']);

        return view('admin.orders.form', compact('order'));
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'string', 'max:50'],
            'amount' => ['required', 'numeric', 'min:0'],
            'travel_date' => ['nullable', 'date'],
            'travelers' => ['required', 'integer', 'min:1'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);
        $order->update($data);

        return redirect()->route('admin.orders.index')->with('status', 'Order updated.');
    }

    public function resendBookingEmail(SiteOrderController $orders, Order $order): RedirectResponse
    {
        $order->loadMissing(['user', 'tour']);

        if ($orders->sendBookingEmail($order)) {
            return back()->with('status', 'Booking email sent to '.$order->user?->email.'.');
        }

        return back()->with('warning', 'Email could not be sent. Gmail daily limit may be exceeded — try again later. Check storage/logs/laravel.log.');
    }
}
