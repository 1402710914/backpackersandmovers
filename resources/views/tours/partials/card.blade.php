@php
    $tourUrl = route('tours.show', $tour->slug);
@endphp
@once
    @push('styles')
        @include('tours.partials.card-styles')
    @endpush
@endonce
<article class="tour-list-card h-100">
    <a href="{{ $tourUrl }}" class="tour-list-card__media" aria-label="{{ $tour->title }}">
        <img src="{{ $tour->listingImageUrl() }}" alt="{{ $tour->title }}" loading="lazy" width="400" height="260">
        <span class="tour-list-card__overlay" aria-hidden="true"></span>
        <div class="tour-list-card__badges">
            @if ($tour->is_featured)
                <span class="tour-list-card__badge tour-list-card__badge--featured">Featured</span>
            @endif
            @if ($tour->category)
                <span class="tour-list-card__badge tour-list-card__badge--category">{{ $tour->category->name }}</span>
            @endif
        </div>
        <div class="tour-list-card__price-tag">
            <span class="tour-list-card__price-label">From</span>
            <strong>{{ $tour->formattedPrice() }}</strong>
            @if ($tour->isStudentGroupTour())
                <small>/ member</small>
            @endif
        </div>
    </a>
    <div class="tour-list-card__body">
        <h3 class="tour-list-card__title" title="{{ $tour->title }}">
            <a href="{{ $tourUrl }}">{{ $tour->listingTitle() }}</a>
        </h3>
        @if (filled($tour->excerpt))
            <p class="tour-list-card__excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($tour->excerpt), 96) }}</p>
        @endif
        <div class="tour-list-card__chips">
            <span class="tour-list-card__chip tour-list-card__chip--pickup" title="Pickup locations">
                <i class="fa-solid fa-bus" aria-hidden="true"></i>
                {{ $tour->pickupLocationsLabel() }}
            </span>
            <span class="tour-list-card__chip">
                <i class="fa-regular fa-location-dot" aria-hidden="true"></i>
                {{ $tour->destination?->name ?? tour_pickup_locations_label() }}
            </span>
            <span class="tour-list-card__chip">
                <i class="fa-regular fa-clock" aria-hidden="true"></i>
                {{ (int) $tour->duration_days }} day{{ (int) $tour->duration_days === 1 ? '' : 's' }}
            </span>
            @if ($tour->group_size)
                <span class="tour-list-card__chip">
                    <i class="fa-regular fa-users" aria-hidden="true"></i>
                    Up to {{ $tour->group_size }} members
                </span>
            @endif
        </div>
        <a href="{{ $tourUrl }}" class="tour-list-card__cta">
            <span>View tour details</span>
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
        </a>
    </div>
</article>
