<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request): Renderable
    {
        $user = $request->user();
        $orders = $user->orders()->with('tour')->latest()->take(15)->get();
        $alerts = $user->alerts()->whereNull('read_at')->latest()->take(10)->get();

        return view('dashboard', compact('orders', 'alerts'));
    }
}
