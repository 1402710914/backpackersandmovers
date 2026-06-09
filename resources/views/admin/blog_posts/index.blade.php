@extends('admin.layout')

@section('title', 'Blog')

@section('content')
<x-admin.page-toolbar title="Blog posts" subtitle="Articles on the public site">
    <a href="{{ route('admin.blog-posts.create') }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-plus" aria-hidden="true"></i> New article
    </a>
</x-admin.page-toolbar>

<div class="admin-table-panel">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th class="text-center" style="width: 72px;">Image</th>
                    <th>Title</th>
                    <th>Published</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="text-center">
                        @if ($post->hasCoverImage())
                            <img src="{{ $post->coverImageUrl() }}" alt="" class="rounded border" style="width: 48px; height: 48px; object-fit: cover;">
                        @else
                            <span class="text-muted small">—</span>
                        @endif
                    </td>
                    <td>{{ \Illuminate\Support\Str::limit($post->title, 64) }}</td>
                    <td>{{ $post->published_at?->format('Y-m-d') ?? '—' }}</td>
                    <td class="text-end">
                        <span class="admin-table-actions">
                            <a href="{{ route('admin.blog-posts.edit', $post) }}">Edit</a>
                            <form action="{{ route('admin.blog-posts.destroy', $post) }}" method="post" class="d-inline" onsubmit="return confirm('Delete?');">
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
<div class="admin-pagination">{{ $posts->links() }}</div>
@endsection
