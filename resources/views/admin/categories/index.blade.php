@extends('admin.layout')

@section('title', 'Categories')

@section('content')
<x-admin.page-toolbar :title="($type ?? '') === 'tour' ? 'Tour categories' : 'Categories'" :subtitle="($type ?? '') === 'tour' ? 'Programs shown in site menu and home page' : 'Tour and blog taxonomy'">
    @if (($type ?? '') === 'tour')
        <a href="{{ route('admin.tours.index') }}" class="btn btn-outline-secondary btn-sm">All tours</a>
    @endif
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-plus" aria-hidden="true"></i> Add category
    </a>
</x-admin.page-toolbar>

<div class="admin-table-panel">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th class="text-center" style="width: 72px;">Image</th>
                    <th>Name</th>
                    <th>Slug</th>
                    @if (($type ?? '') !== 'tour')
                        <th>Type</th>
                    @endif
                    <th>Tours</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td class="text-center">
                        <img src="{{ $category->listingImageUrl() }}" alt="" class="rounded border" style="width: 48px; height: 48px; object-fit: cover;">
                    </td>
                    <td>{{ $category->name }}</td>
                    <td><code class="small">{{ $category->slug }}</code></td>
                    @if (($type ?? '') !== 'tour')
                        <td><span class="admin-badge admin-badge-muted">{{ $category->type }}</span></td>
                    @endif
                    <td>{{ $category->tours_count ?? 0 }}</td>
                    <td class="text-end">
                        <span class="admin-table-actions">
                            @if ($category->type === 'tour')
                                <a href="{{ route('tours.category', $category->slug) }}" target="_blank" rel="noopener noreferrer">View</a>
                            @endif
                            <a href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="post" class="d-inline" onsubmit="return confirm('Delete?');">
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
<div class="admin-pagination">{{ $categories->links() }}</div>
@endsection
