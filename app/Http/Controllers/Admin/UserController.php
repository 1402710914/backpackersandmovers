<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()->orderByDesc('id')->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.users.form', ['user' => new User]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request, null);
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('admin.users.index')->with('status', 'User created.');
    }

    public function edit(User $user): View
    {
        return view('admin.users.form', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $this->validated($request, $user->id);
        if (! empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);

        return redirect()->route('admin.users.index')->with('status', 'User updated.');
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }
        $user->delete();

        return redirect()->route('admin.users.index')->with('status', 'User removed.');
    }

    private function validated(Request $request, ?int $userId = null): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'email', 'max:190',
                $userId !== null
                    ? Rule::unique('users', 'email')->ignore($userId)
                    : Rule::unique('users', 'email'),
            ],
            'phone' => ['nullable', 'string', 'max:32'],
            'password' => [$userId !== null ? 'nullable' : 'required', 'string', 'min:8', 'confirmed'],
            'is_admin' => ['sometimes', 'boolean'],
        ];
        $data = $request->validate($rules);
        $data['is_admin'] = $request->boolean('is_admin');

        return $data;
    }
}
