@extends('admin.layout')

@section('title', 'Header bar')

@section('content')
<x-admin.page-toolbar title="Header bar text" subtitle="Edit the welcome and pickup message shown at the top of every page" />

@if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<div class="row g-4">
    <div class="col-lg-7">
        <form method="post" action="{{ route('admin.settings.header.update') }}" class="admin-form-card">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label" for="header_welcome_prefix">Welcome prefix</label>
                <input type="text" id="header_welcome_prefix" name="header_welcome_prefix" class="form-control @error('header_welcome_prefix') is-invalid @enderror" value="{{ old('header_welcome_prefix', $welcomePrefix) }}" required maxlength="120">
                @error('header_welcome_prefix')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <div class="form-text">Example: Welcome to</div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="header_welcome_brand">Brand name (highlighted)</label>
                <input type="text" id="header_welcome_brand" name="header_welcome_brand" class="form-control @error('header_welcome_brand') is-invalid @enderror" value="{{ old('header_welcome_brand', $welcomeBrand) }}" required maxlength="120">
                @error('header_welcome_brand')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <div class="form-text">Example: Backpackers and Movers</div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="header_pickup_line">Pickup line</label>
                <input type="text" id="header_pickup_line" name="header_pickup_line" class="form-control @error('header_pickup_line') is-invalid @enderror" value="{{ old('header_pickup_line', $pickupLine) }}" required maxlength="200">
                @error('header_pickup_line')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <div class="form-text">Example: Tour pickup: Pune &amp; Mumbai only</div>
            </div>

            <div class="admin-form-actions">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>

    <div class="col-lg-5">
        <div class="admin-form-card">
            <h5 class="mb-3">Preview</h5>
            <div class="p-3 rounded" style="background:#151515;color:#b4b4b4;">
                <p class="mb-2" id="header-preview-welcome">
                    <span id="preview-prefix">{{ old('header_welcome_prefix', $welcomePrefix) }}</span>
                    <span id="preview-brand" style="color:#da9b21;border-bottom:1px solid #da9b21;">{{ old('header_welcome_brand', $welcomeBrand) }}</span>
                </p>
                <p class="mb-0" id="preview-pickup">{{ old('header_pickup_line', $pickupLine) }}</p>
            </div>
            <p class="small text-muted mt-3 mb-0">This bar is hidden on smaller screens (theme default).</p>
        </div>
    </div>
</div>

@push('scripts')
<script>
(function () {
    const prefix = document.getElementById('header_welcome_prefix');
    const brand = document.getElementById('header_welcome_brand');
    const pickup = document.getElementById('header_pickup_line');
    const previewPrefix = document.getElementById('preview-prefix');
    const previewBrand = document.getElementById('preview-brand');
    const previewPickup = document.getElementById('preview-pickup');

    function sync() {
        if (previewPrefix && prefix) previewPrefix.textContent = prefix.value;
        if (previewBrand && brand) previewBrand.textContent = brand.value;
        if (previewPickup && pickup) previewPickup.textContent = pickup.value;
    }

    [prefix, brand, pickup].forEach(el => el?.addEventListener('input', sync));
})();
</script>
@endpush
@endsection
