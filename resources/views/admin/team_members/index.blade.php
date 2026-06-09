@extends('admin.layout')

@section('title', 'Team')

@section('content')
<x-admin.page-toolbar title="Team members" subtitle="People shown on the team page">
    <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-plus" aria-hidden="true"></i> Add member
    </a>
</x-admin.page-toolbar>

<div class="admin-table-panel">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th class="text-center" style="width: 72px;">Image</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Order</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($members as $member)
                <tr>
                    <td class="text-center">
                        @if ($member->photo)
                            <img src="{{ $member->profilePhotoUrl() }}" alt="" class="rounded border" style="width: 48px; height: 48px; object-fit: cover;">
                        @else
                            <span class="text-muted small">—</span>
                        @endif
                    </td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->role ?: '—' }}</td>
                    <td>{{ $member->sort_order }}</td>
                    <td class="text-end">
                        <span class="admin-table-actions">
                            <a href="{{ route('admin.team-members.edit', $member) }}">Edit</a>
                            <form action="{{ route('admin.team-members.destroy', $member) }}" method="post" class="d-inline" onsubmit="return confirm('Delete?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-link btn-sm text-danger p-0">Delete</button>
                            </form>
                        </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="admin-pagination">{{ $members->links() }}</div>
@endsection
