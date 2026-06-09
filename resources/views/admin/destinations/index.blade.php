@extends('admin.layout')

@section('title', 'Destinations')

@section('content')
<x-admin.page-toolbar title="Destinations" subtitle="Places featured on the public site">
    <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-plus" aria-hidden="true"></i> Add destination
    </a>
</x-admin.page-toolbar>

<div class="admin-table-panel">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th class="text-center" style="width: 72px;">Image</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Active</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($destinations as $destination)
                <tr>
                    <td class="text-center">
                        @if ($destination->featured_image)
                            <img src="{{ $destination->featuredImageUrl() }}" alt="" class="rounded border" style="width: 48px; height: 48px; object-fit: cover;">
                        @else
                            <span class="text-muted small">—</span>
                        @endif
                    </td>
                    <td>{{ $destination->name }}</td>
                    <td>{{ $destination->country ?: '—' }}</td>
                    <td>
                        @if ($destination->is_active)
                            <span class="admin-badge">Active</span>
                        @else
                            <span class="admin-badge admin-badge-muted">Off</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <span class="admin-table-actions">
                            <a href="{{ route('admin.destinations.edit', $destination) }}">Edit</a>
                            <form action="{{ route('admin.destinations.destroy', $destination) }}" method="post" class="d-inline" onsubmit="return confirm('Delete?');">
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
<div class="admin-pagination">{{ $destinations->links() }}</div>
@endsection
