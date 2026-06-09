@extends('admin.layout')

@section('title', $category->exists ? 'Edit category' : 'New category')

@section('content')
<x-admin.page-toolbar :title="$category->exists ? 'Edit category' : 'New category'" subtitle="Used for tours or blog" />

<form method="post" action="{{ $category->exists ? route('admin.categories.update', $category) : route('admin.categories.store') }}" class="admin-form-card">
    @csrf
    @if ($category->exists) @method('PUT') @endif
    <div class="mb-2"><label class="form-label">Name</label><input name="name" class="form-control" value="{{ old('name', $category->name) }}" required></div>
    <div class="mb-2"><label class="form-label">Slug (optional)</label><input name="slug" class="form-control" value="{{ old('slug', $category->slug) }}"></div>
    <div class="mb-3"><label class="form-label">Type</label>
        <select name="type" class="form-select">
            <option value="tour" @selected(old('type', $category->type) === 'tour')>tour</option>
            <option value="blog" @selected(old('type', $category->type) === 'blog')>blog</option>
        </select>
    </div>
    <div class="admin-form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-link">Cancel</a>
    </div>
</form>
@endsection
