@extends('layouts.roavio', ['title' => $pageTitle ?? 'Tours'])

@section('content')
<div class="breadcrumb-wrapper-2 style-tour-page bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-4.jpg') }}');">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ $pageTitle ?? 'Tours' }}</h1>
            </div>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('tours.index') }}">Tours</a></li>
                @if ($categoryPage ?? null)
                    <li class="style-2">{{ $categoryPage->name }}</li>
                @else
                    <li class="style-2">All tours</li>
                @endif
            </ul>
        </div>
    </div>
</div>

<section class="tour-grid-section section-padding fix tours-listing-page">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="text-anim">School &amp; college tours</h2>
            <p class="wow fadeInUp" data-wow-delay=".5s">
                All programs for schools, colleges, and corporate groups across Maharashtra.
                <span class="d-block mt-1">{{ $tours->count() }} {{ \Illuminate\Support\Str::plural('program', $tours->count()) }} available</span>
            </p>
        </div>

        @include('tours.partials.pickup-notice', ['class' => 'wow fadeInUp mb-4'])

        @if ($categories->isNotEmpty())
            <nav class="tours-filter-nav wow fadeInUp" data-wow-delay=".4s" aria-label="Tour categories">
                <a href="{{ route('tours.index') }}" class="tours-filter-pill {{ empty($activeCategory) ? 'is-active' : '' }}">All tours</a>
                @foreach ($categories as $cat)
                    <a href="{{ route('tours.category', $cat->slug) }}" class="tours-filter-pill">
                        {{ $cat->name }} ({{ $cat->tours_count }})
                    </a>
                @endforeach
            </nav>
        @endif

        <div class="row g-4 tours-listing-grid">
            @forelse ($tours as $tour)
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".15s">
                    @include('tours.partials.card', ['tour' => $tour])
                </div>
            @empty
                <div class="col-12">
                    <div class="tours-empty-state text-center py-5">
                        <p class="mb-3">No tours in this category yet.</p>
                        <a href="{{ route('tours.index') }}" class="theme-btn">View all tours</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

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
                            <h2 class="sec-title text-white text-anim">Plan your next student trip</h2>
                        </div>
                        <p class="text wow fadeInUp" data-wow-delay=".3s">
                            Contact Backpackers and Movers for one-day outings, field visits, treks, and customized school programs.
                        </p>
                        <a href="{{ route('contact') }}" class="theme-btn">Get in touch</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.tours-listing-page .tours-filter-nav {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0.5rem;
    margin-bottom: 2.5rem;
}
.tours-listing-page .tours-empty-state .theme-btn,
.tours-listing-page .contact-content .theme-btn {
    padding: 0.55rem 1.1rem;
    font-size: 0.875rem;
}
.tours-listing-page .tours-filter-pill {
    display: inline-block;
    padding: 0.38rem 0.85rem;
    border-radius: 999px;
    font-size: 0.8125rem;
    font-weight: 600;
    text-decoration: none;
    color: var(--header, #1a1a1a);
    background: #f4f4f4;
    border: 1px solid #e8e8e8;
    transition: background 0.2s, color 0.2s, border-color 0.2s;
}
.tours-listing-page .tours-filter-pill:hover,
.tours-listing-page .tours-filter-pill.is-active {
    background: var(--theme, #DA9B21);
    border-color: var(--theme, #DA9B21);
    color: #fff;
}
.tours-empty-state {
    background: #f8f9fa;
    border-radius: 12px;
}
</style>
@endpush
