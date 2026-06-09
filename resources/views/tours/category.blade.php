@extends('layouts.roavio', ['title' => $pageTitle ?? 'Tours'])

@php
    $meta = $categoryMeta ?? [];
    $whatsappMessage = rawurlencode('Hi, I am interested in '.$categoryPage->name.' programs — '.route('tours.category', $categoryPage->slug));
@endphp

@push('styles')
    @include('tours.partials.category-listing-styles')
@endpush

@section('content')
<div class="tour-category-page">
    <header class="tour-category-hero bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-4.jpg') }}');">
        <div class="container">
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".2s">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('tours.index') }}">Tours</a></li>
                <li class="style-2">{{ $categoryPage->name }}</li>
            </ul>

            <span class="tour-category-hero__eyebrow wow fadeInUp" data-wow-delay=".25s">{{ $meta['eyebrow'] ?? 'School programs' }}</span>
            <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ $categoryPage->name }}</h1>
            <p class="tour-category-hero__intro wow fadeInUp" data-wow-delay=".35s">{{ $meta['intro'] ?? $categoryIntro }}</p>

            <div class="tour-category-hero__stats wow fadeInUp" data-wow-delay=".4s">
                <div class="tour-category-hero__stat">
                    <strong>{{ $meta['program_count'] ?? $tours->count() }}</strong>
                    <span>Programs listed</span>
                </div>
                <div class="tour-category-hero__stat">
                    <strong>{{ $meta['duration'] ?? '1 day' }}</strong>
                    <span>Typical duration</span>
                </div>
                <div class="tour-category-hero__stat">
                    <strong>{{ tour_pickup_locations_label() }}</strong>
                    <span>Pickup cities</span>
                </div>
                @if (($meta['featured_count'] ?? 0) > 0)
                    <div class="tour-category-hero__stat">
                        <strong>{{ $meta['featured_count'] }}</strong>
                        <span>Featured picks</span>
                    </div>
                @endif
            </div>

            <div class="tour-category-hero__actions wow fadeInUp" data-wow-delay=".45s">
                <a href="{{ route('contact') }}" class="theme-btn">Get a quotation</a>
                <a href="https://wa.me/918788883003?text={{ $whatsappMessage }}" class="theme-btn style-2" target="_blank" rel="noopener noreferrer">WhatsApp enquiry</a>
            </div>
        </div>
    </header>

    <div class="tour-category-body">
        <div class="container">
            <div class="tour-category-layout">
                <aside class="tour-category-sidebar wow fadeInLeft" data-wow-delay=".2s">
                    <div class="tour-category-sidebar__card">
                        <div class="tour-category-sidebar__head">
                            <h3>Program snapshot</h3>
                            <p>{{ $meta['ideal_for'] ?? 'School & college groups' }}</p>
                        </div>
                        <div class="tour-category-sidebar__body">
                            <dl class="tour-category-sidebar__meta">
                                <div>
                                    <dt>Duration</dt>
                                    <dd>{{ $meta['duration'] ?? '—' }}</dd>
                                </div>
                                <div>
                                    <dt>Programs</dt>
                                    <dd>{{ $meta['program_count'] ?? $tours->count() }} available</dd>
                                </div>
                                <div>
                                    <dt>Pickup</dt>
                                    <dd>{{ tour_pickup_locations_label() }} only</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <div class="tour-category-sidebar__card">
                        <div class="tour-category-sidebar__head">
                            <h3>Why schools book this</h3>
                        </div>
                        <div class="tour-category-sidebar__body">
                            <ul class="tour-category-sidebar__list">
                                @foreach ($meta['highlights'] ?? [] as $highlight)
                                    <li><i class="fa-solid fa-check" aria-hidden="true"></i> {{ $highlight }}</li>
                                @endforeach
                            </ul>
                            <a href="https://wa.me/918788883003?text={{ $whatsappMessage }}" class="tour-category-sidebar__btn tour-category-sidebar__btn--wa" target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-whatsapp" aria-hidden="true"></i> Chat on WhatsApp
                            </a>
                            <a href="{{ route('contact') }}" class="tour-category-sidebar__btn tour-category-sidebar__btn--contact">
                                <i class="fa-regular fa-envelope" aria-hidden="true"></i> Request quotation
                            </a>
                        </div>
                    </div>
                </aside>

                <div class="tour-category-main">
                    @if ($categories->isNotEmpty())
                        <nav class="tours-filter-nav wow fadeInUp" data-wow-delay=".25s" aria-label="Tour categories">
                            <a href="{{ route('tours.index') }}" class="tours-filter-pill">All tours</a>
                            @foreach ($categories as $cat)
                                <a href="{{ route('tours.category', $cat->slug) }}" class="tours-filter-pill {{ ($activeCategory ?? '') === $cat->slug ? 'is-active' : '' }}">
                                    {{ $cat->name }}
                                    <span class="opacity-75">({{ $cat->tours_count }})</span>
                                </a>
                            @endforeach
                        </nav>
                    @endif

                    <div class="tour-category-main__toolbar wow fadeInUp" data-wow-delay=".3s">
                        <p class="tour-category-main__count">
                            Showing <strong>{{ $tours->count() }}</strong> {{ \Illuminate\Support\Str::plural('program', $tours->count()) }} in this category
                        </p>
                    </div>

                    @include('tours.partials.pickup-notice', ['class' => 'tour-pickup-notice wow fadeInUp'])

                    <div class="row g-4 tours-listing-grid">
                        @forelse ($tours as $tour)
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".1s">
                                @include('tours.partials.card', ['tour' => $tour])
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="tours-empty-state text-center">
                                    <p class="mb-3">No programs in this category yet.</p>
                                    <a href="{{ route('tours.index') }}" class="theme-btn">View all tours</a>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="contact-section section-padding pb-0">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row g-4 align-items-end">
                <div class="col-lg-6">
                    <div class="contact-image">
                        <img data-speed=".8" src="{{ asset('assets/img/home-1/Image.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-content">
                        <div class="logo-image">
                            <a href="{{ route('home') }}"><img src="{{ logo_url() }}" class="site-brand-logo-header" alt="{{ config('app.name') }}"></a>
                        </div>
                        <div class="section-title mb-0">
                            <h2 class="sec-title text-white text-anim">Plan your {{ $categoryPage->name }} trip</h2>
                        </div>
                        <p class="text wow fadeInUp" data-wow-delay=".3s">
                            Share your school name, batch size, preferred date, and pickup city (Pune or Mumbai). We will send a customized quotation.
                        </p>
                        <a href="{{ route('contact') }}" class="theme-btn">Get in touch</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
