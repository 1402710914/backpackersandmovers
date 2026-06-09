@extends('layouts.roavio', ['title' => $tour->title])

@push('styles')
    @include('tours.partials.show-styles')
@endpush

@section('content')
@php
    $hasNav = $tour->hasGallerySection()
        || $tour->hasDescriptionSection()
        || $tour->hasAboutSection()
        || $tour->hasItinerarySection()
        || $tour->hasAttractionsSection()
        || $tour->hasOffersSection()
        || $tour->hasFaqSection();
@endphp

<div class="tour-details-page">
    <header class="tour-detail-hero" style="background-image: url('{{ $tour->featuredImageUrl() }}');">
        <div class="container">
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('tours.index') }}">Tours</a></li>
                @if ($tour->category)
                    <li><a href="{{ route('tours.category', $tour->category->slug) }}">{{ \Illuminate\Support\Str::limit($tour->category->name, 36) }}</a></li>
                @endif
                <li class="style-2 style-3">{{ \Illuminate\Support\Str::limit($tour->title, 48) }}</li>
            </ul>

            @if ($tour->category)
                <span class="tour-detail-hero__category wow fadeInUp" data-wow-delay=".35s">{{ $tour->category->name }}</span>
            @endif

            <h1 class="wow fadeInUp" data-wow-delay=".4s">{{ $tour->title }}</h1>

            @if (filled($tour->excerpt))
                <p class="tour-detail-hero__excerpt wow fadeInUp" data-wow-delay=".45s">{{ strip_tags($tour->excerpt) }}</p>
            @endif

            <div class="tour-detail-hero__chips wow fadeInUp" data-wow-delay=".5s">
                <span class="tour-detail-hero__chip tour-detail-hero__chip--pickup">
                    <i class="fa-solid fa-bus" aria-hidden="true"></i>
                    Pickup: {{ $tour->pickupLocationsLabel() }}
                </span>
                <span class="tour-detail-hero__chip">
                    <i class="fa-regular fa-location-dot" aria-hidden="true"></i>
                    {{ $tour->destination?->name ?? tour_pickup_locations_label() }}
                </span>
                <span class="tour-detail-hero__chip">
                    <i class="fa-regular fa-clock" aria-hidden="true"></i>
                    {{ (int) $tour->duration_days }} day{{ (int) $tour->duration_days === 1 ? '' : 's' }}
                </span>
                @if ($tour->group_size)
                    <span class="tour-detail-hero__chip">
                        <i class="fa-regular fa-users" aria-hidden="true"></i>
                        Up to {{ $tour->group_size }} members
                    </span>
                @endif
                @if ($tour->is_featured)
                    <span class="tour-detail-hero__chip">
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        Featured program
                    </span>
                @endif
            </div>

            <div class="tour-detail-hero__actions wow fadeInUp" data-wow-delay=".55s">
                <div class="tour-detail-hero__price">
                    {{ $tour->formattedPrice() }}
                    <small>{{ $tour->isEducationalOuting() ? 'per member' : 'per person' }}</small>
                </div>
                <a href="#tour-booking" class="theme-btn">Book this tour</a>
                <a href="{{ route('contact') }}" class="theme-btn style-2">Ask a question</a>
            </div>
        </div>
    </header>

    <div class="tour-details-body">
        <div class="container">
            @if ($hasNav)
                <nav class="tour-details-nav" aria-label="Tour sections">
                    <div class="tour-details-nav-inner">
                        @if ($tour->hasGallerySection())
                            <a href="#tour-gallery">Gallery</a>
                        @endif
                        @if ($tour->hasDescriptionSection())
                            <a href="#tour-description">Description</a>
                        @endif
                        @if ($tour->hasAboutSection())
                            <a href="#tour-about">About</a>
                        @endif
                        @if ($tour->hasItinerarySection())
                            <a href="#tour-itinerary">Itinerary</a>
                        @endif
                        @if ($tour->hasAttractionsSection())
                            <a href="#tour-attractions">Attractions</a>
                        @endif
                        @if ($tour->hasOffersSection())
                            <a href="#tour-offers">Pricing</a>
                        @endif
                        @if ($tour->hasFaqSection())
                            <a href="#tour-faq">FAQ</a>
                        @endif
                        <a href="#tour-booking">Booking</a>
                    </div>
                </nav>
            @endif

            <div class="row g-4 align-items-start">
                <div class="col-lg-8 col-12">
                    @if ($tour->hasGallerySection())
                        <section id="tour-gallery" class="tour-detail-panel">
                            <div class="tour-detail-panel__head">
                                <span class="tour-detail-panel__icon"><i class="fa-regular fa-images" aria-hidden="true"></i></span>
                                <h2>Photo gallery</h2>
                            </div>
                            <div class="tour-gallery-mosaic">
                                @foreach ($tour->galleryImagePaths() as $gPath)
                                    <a href="{{ $tour->galleryImageUrl($gPath) }}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ $tour->galleryImageUrl($gPath) }}" alt="{{ $tour->title }} — gallery" loading="lazy">
                                    </a>
                                @endforeach
                            </div>
                        </section>
                    @endif

                    @if ($tour->hasDescriptionSection())
                        <section id="tour-description" class="tour-detail-panel">
                            <div class="tour-detail-panel__head">
                                <span class="tour-detail-panel__icon"><i class="fa-regular fa-file-lines" aria-hidden="true"></i></span>
                                <h2>Description</h2>
                            </div>
                            <div class="tour-html">{!! $tour->htmlDescription() !!}</div>
                        </section>
                    @endif

                    @if ($tour->hasAboutSection())
                        <section id="tour-about" class="tour-detail-panel">
                            <div class="tour-detail-panel__head">
                                <span class="tour-detail-panel__icon"><i class="fa-regular fa-circle-info" aria-hidden="true"></i></span>
                                <h2>About this tour</h2>
                            </div>
                            <div class="tour-html">{!! $tour->htmlAbout() !!}</div>
                        </section>
                    @endif

                    @if ($tour->hasItinerarySection())
                        <section id="tour-itinerary" class="tour-detail-panel">
                            <div class="tour-detail-panel__head">
                                <span class="tour-detail-panel__icon"><i class="fa-regular fa-route" aria-hidden="true"></i></span>
                                <h2>Itinerary</h2>
                            </div>
                            @if ($tour->hasStructuredItinerary())
                                <div class="tour-itinerary-timeline">
                                    @foreach ($tour->itineraryDays() as $itin)
                                        <div class="tour-itin-item">
                                            <span class="tour-itin-dot" aria-hidden="true"></span>
                                            @if (filled($itin['day_label']))
                                                <p class="tour-itin-meta">{{ $itin['day_label'] }}</p>
                                            @endif
                                            @if (filled($itin['title']))
                                                <h3 class="tour-itin-title">{{ $itin['title'] }}</h3>
                                            @endif
                                            @if (filled($itin['body']))
                                                <div class="tour-html tour-itin-content">{!! $tour->itineraryDayBodyHtml($itin['body']) !!}</div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="tour-html">{!! $tour->htmlLegacyItinerary() !!}</div>
                            @endif
                        </section>
                    @endif

                    @if ($tour->hasAttractionsSection())
                        <section id="tour-attractions" class="tour-detail-panel">
                            <div class="tour-detail-panel__head">
                                <span class="tour-detail-panel__icon"><i class="fa-regular fa-map" aria-hidden="true"></i></span>
                                <h2>Attractions</h2>
                            </div>
                            <div class="tour-html">{!! $tour->htmlAttractions() !!}</div>
                        </section>
                    @endif

                    @if ($tour->hasOffersSection())
                        <section id="tour-offers" class="tour-detail-panel">
                            <div class="tour-detail-panel__head">
                                <span class="tour-detail-panel__icon"><i class="fa-solid fa-tags" aria-hidden="true"></i></span>
                                <h2>{{ $tour->isEducationalOuting() ? 'Student group pricing' : 'Offers & inclusions' }}</h2>
                            </div>
                            <div class="tour-html">{!! $tour->htmlOffers() !!}</div>
                        </section>
                    @endif

                    @if ($tour->hasFaqSection())
                        <section id="tour-faq" class="tour-detail-panel">
                            <div class="tour-detail-panel__head">
                                <span class="tour-detail-panel__icon"><i class="fa-regular fa-circle-question" aria-hidden="true"></i></span>
                                <h2>Frequently asked questions</h2>
                            </div>
                            <div class="accordion tour-faq-accordion" id="accordionTourFaq">
                                @foreach ($tour->faqEntries() as $i => $item)
                                    <div class="accordion-item">
                                        <h3 class="accordion-header m-0" id="tourFaqHeading-{{ $i }}">
                                            <button class="accordion-button {{ $i > 0 ? 'collapsed' : '' }} fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#tourFaqCollapse-{{ $i }}" aria-expanded="{{ $i === 0 ? 'true' : 'false' }}" aria-controls="tourFaqCollapse-{{ $i }}">
                                                {{ $item['question'] }}
                                            </button>
                                        </h3>
                                        <div id="tourFaqCollapse-{{ $i }}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}" aria-labelledby="tourFaqHeading-{{ $i }}" data-bs-parent="#accordionTourFaq">
                                            <div class="accordion-body tour-html">
                                                {!! $tour->faqAnswerForDisplay($item['answer']) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif

                    @if (! $hasNav)
                        <section class="tour-detail-panel">
                            <div class="tour-detail-panel__head">
                                <span class="tour-detail-panel__icon"><i class="fa-regular fa-file-lines" aria-hidden="true"></i></span>
                                <h2>Overview</h2>
                            </div>
                            <div class="tour-html">
                                @if (filled($tour->excerpt))
                                    {!! nl2br(e($tour->excerpt)) !!}
                                @else
                                    <p class="text-muted mb-0">More details for this tour will be published soon.</p>
                                @endif
                            </div>
                        </section>
                    @endif
                </div>

                <div class="col-lg-4 col-12">
                    @include('tours.partials.show-sidebar', ['tour' => $tour, 'hasNav' => $hasNav])
                </div>
            </div>
        </div>
    </div>

    @if (($relatedTours ?? collect())->isNotEmpty())
        <section class="tour-related-section">
            <div class="container">
                <h2 class="text-anim">More {{ $tour->category?->name ?? 'tours' }}</h2>
                <div class="row g-4 tour-cards-row">
                    @foreach ($relatedTours as $related)
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            @include('tours.partials.card', ['tour' => $related])
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>
@endsection
