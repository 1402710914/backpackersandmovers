<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAlert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserAlertController extends Controller
{
    public function index(): View
    {
        $alerts = UserAlert::query()->with('user')->orderByDesc('id')->paginate(30);

        return view('admin.notifications.index', compact('alerts'));
    }

    public function create(): View
    {
        $users = User::query()->orderBy('name')->limit(500)->get();

        return view('admin.notifications.create', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'body' => ['nullable', 'string', 'max:2000'],
            'type' => ['nullable', 'string', 'max:50'],
        ]);
        UserAlert::create($data);

        return redirect()->route('admin.notifications.index')->with('status', 'Notification sent to user.');
    }
}
