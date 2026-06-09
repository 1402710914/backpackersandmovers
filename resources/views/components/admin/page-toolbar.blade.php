@props(['title', 'subtitle' => null])

<div {{ $attributes->merge(['class' => 'admin-page-toolbar d-flex flex-wrap align-items-end justify-content-between gap-2 mb-3']) }}>
    <div>
        <h1 class="admin-page-title mb-0">{{ $title }}</h1>
        @if ($subtitle)
            <p class="admin-page-sub mb-0 mt-1">{{ $subtitle }}</p>
        @endif
    </div>
    @if (isset($slot) && ! $slot->isEmpty())
        <div class="admin-page-toolbar-actions d-flex flex-wrap gap-1 align-items-center">
            {{ $slot }}
        </div>
    @endif
</div>
