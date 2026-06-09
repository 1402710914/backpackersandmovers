@extends('admin.layout')

@section('title', 'Users')

@section('content')
<x-admin.page-toolbar title="Users" subtitle="Customer and administrator accounts">
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-plus" aria-hidden="true"></i> Add user
    </a>
</x-admin.page-toolbar>

<div class="admin-table-panel">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="text-muted">#{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->is_admin)
                            <span class="admin-badge">Admin</span>
                        @else
                            <span class="admin-badge admin-badge-muted">User</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <span class="admin-table-actions">
                            <a href="{{ route('admin.users.edit', $user) }}">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="d-inline" onsubmit="return confirm('Delete this user?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-link btn-sm text-danger p-0 align-baseline">Delete</button>
                            </form>
                        </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="admin-pagination">{{ $users->links() }}</div>
@endsection
