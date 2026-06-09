@extends('admin.layout')

@section('title', $destination->exists ? 'Edit destination' : 'New destination')

@section('content')
<x-admin.page-toolbar :title="$destination->exists ? 'Edit destination' : 'New destination'" subtitle="Details and featured image" />

<form method="post" enctype="multipart/form-data" action="{{ $destination->exists ? route('admin.destinations.update', $destination) : route('admin.destinations.store') }}" class="admin-form-card">
    @csrf
    @if ($destination->exists) @method('PUT') @endif
    <div class="mb-2"><label class="form-label">Name</label><input name="name" class="form-control" value="{{ old('name', $destination->name) }}" required></div>
    <div class="mb-2"><label class="form-label">Slug (optional)</label><input name="slug" class="form-control" value="{{ old('slug', $destination->slug) }}"></div>
    <div class="mb-2"><label class="form-label">Country</label><input name="country" class="form-control" value="{{ old('country', $destination->country) }}"></div>
    <div class="mb-2"><label class="form-label">Excerpt</label><textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $destination->excerpt) }}</textarea></div>
    <div class="mb-2"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="5">{{ old('description', $destination->description) }}</textarea></div>
    <div class="mb-2">
        <label class="form-label">Featured image</label>
        @if ($destination->exists && $destination->featured_image)
            <div class="mb-2">
                <img src="{{ storage_url($destination->featured_image) }}" alt="" class="rounded border" style="max-width: 280px; max-height: 160px; object-fit: cover;">
                <div class="form-text">Upload a new file below to replace this image.</div>
            </div>
        @endif
        <input type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" accept="image/*">
        @error('featured_image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div class="form-text">Optional. JPG, PNG, WebP or GIF — max 4&nbsp;MB. Shown on destination listing and detail pages.</div>
    </div>
    <div class="mb-2 form-check">
        <input type="hidden" name="is_featured" value="0">
        <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="df" {{ old('is_featured', $destination->is_featured) ? 'checked' : '' }}>
        <label class="form-check-label" for="df">Featured</label>
    </div>
    <div class="mb-3 form-check">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" class="form-check-input" id="da" {{ old('is_active', $destination->is_active ?? true) ? 'checked' : '' }}>
        <label class="form-check-label" for="da">Active</label>
    </div>
    <div class="admin-form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.destinations.index') }}" class="btn btn-link">Cancel</a>
    </div>
</form>
@endsection
