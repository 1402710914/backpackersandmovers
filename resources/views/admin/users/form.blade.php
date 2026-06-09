@extends('admin.layout')

@section('title', $user->exists ? 'Edit user' : 'New user')

@section('content')
<x-admin.page-toolbar :title="$user->exists ? 'Edit user' : 'New user'" subtitle="Account credentials and role" />

<form method="post" action="{{ $user->exists ? route('admin.users.update', $user) : route('admin.users.store') }}" class="admin-form-card">
    @csrf
    @if ($user->exists) @method('PUT') @endif
    <div class="mb-2"><label class="form-label">Name</label><input name="name" class="form-control" value="{{ old('name', $user->name) }}" required></div>
    <div class="mb-2"><label class="form-label">Email</label><input name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required></div>
    <div class="mb-2"><label class="form-label">Phone</label><input name="phone" class="form-control" value="{{ old('phone', $user->phone) }}"></div>
    <div class="mb-2"><label class="form-label">Password {{ $user->exists ? '(leave blank to keep)' : '' }}</label><input name="password" type="password" class="form-control" {{ $user->exists ? '' : 'required' }}></div>
    <div class="mb-2"><label class="form-label">Confirm password</label><input name="password_confirmation" type="password" class="form-control" {{ $user->exists ? '' : 'required' }}></div>
    <div class="mb-3 form-check">
        <input type="hidden" name="is_admin" value="0">
        <input type="checkbox" name="is_admin" value="1" class="form-check-input" id="is_admin" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
        <label class="form-check-label" for="is_admin">Administrator</label>
    </div>
    <div class="admin-form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-link">Cancel</a>
    </div>
</form>
@endsection
