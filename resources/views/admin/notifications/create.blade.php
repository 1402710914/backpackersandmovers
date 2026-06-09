@extends('admin.layout')

@section('title', 'Send notification')

@section('content')
<x-admin.page-toolbar title="Send notification" subtitle="Deliver an in-app alert to a user" />

<form method="post" action="{{ route('admin.notifications.store') }}" class="admin-form-card">
    @csrf
    <div class="mb-3">
        <label class="form-label">User</label>
        <select name="user_id" class="form-select" required>
            @foreach ($users as $u)
                <option value="{{ $u->id }}">{{ $u->name }} — {{ $u->email }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Body</label>
        <textarea name="body" class="form-control" rows="4"></textarea>
    </div>
    <div class="mb-0">
        <label class="form-label">Type</label>
        <input type="text" name="type" class="form-control" value="info">
    </div>
    <div class="admin-form-actions">
        <button type="submit" class="btn btn-primary">Send</button>
        <a href="{{ route('admin.notifications.index') }}" class="btn btn-link">Cancel</a>
    </div>
</form>
@endsection
