@extends('admin.layout')

@section('title', $category->exists ? 'Edit category' : 'New category')

@section('content')
<x-admin.page-toolbar :title="$category->exists ? 'Edit category' : 'New category'" subtitle="Used for tours or blog" />

<form method="post" enctype="multipart/form-data" action="{{ $category->exists ? route('admin.categories.update', $category) : route('admin.categories.store') }}" class="admin-form-card">
    @csrf
    @if ($category->exists) @method('PUT') @endif
    <div class="mb-2"><label class="form-label">Name</label><input name="name" class="form-control" value="{{ old('name', $category->name) }}" required></div>
    <div class="mb-2"><label class="form-label">Slug (optional)</label><input name="slug" class="form-control" value="{{ old('slug', $category->slug) }}"></div>
    <div class="mb-2"><label class="form-label">Type</label>
        <select name="type" class="form-select">
            <option value="tour" @selected(old('type', $category->type) === 'tour')>tour</option>
            <option value="blog" @selected(old('type', $category->type) === 'blog')>blog</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label d-block">Featured image</label>
        <p class="form-text mb-1">Shown on the homepage tour programs grid and category pages (tour categories only).</p>
        @if ($category->exists && $category->featured_image)
            <div class="mb-2">
                <img src="{{ storage_url($category->featured_image) }}" alt="" class="rounded border" style="max-width: 320px; max-height: 200px; object-fit: cover;">
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" name="remove_featured_image" value="1" class="form-check-input" id="remove-category-featured" {{ old('remove_featured_image') ? 'checked' : '' }}>
                <label class="form-check-label" for="remove-category-featured">Remove featured image</label>
            </div>
        @endif
        <input type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" accept="image/*">
        @error('featured_image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div class="form-text">Optional. JPG, PNG, WebP or GIF — max 4&nbsp;MB.</div>
    </div>
    <div class="admin-form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-link">Cancel</a>
    </div>
</form>
@endsection
