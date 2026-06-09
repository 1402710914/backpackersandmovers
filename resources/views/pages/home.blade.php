@extends('layouts.roavio', ['title' => 'Home'])

@section('content')
@include('partials.home-hero-and-strip')

@if (site_setting_bool('home_tour_programs_section_enabled'))
{{-- Tour programs (categories with active tours) --}}
@php
    $categoryImages = [
        'educational-one-day-outing' => 'assets/img/home-2/destination/01.jpg',
        'educational-field-visit' => 'assets/img/home-2/destination/02.jpg',
        'agri-tourism' => 'assets/img/home-2/destination/03.jpg',
        'one-day-trek' => 'assets/img/home-2/destination/04.jpg',
        'one-night-camping' => 'assets/img/home-2/destination/05.jpg',
    ];
    $destColPattern = [
        'col-xl-3 col-lg-4 col-md-6',
        'col-xl-6 col-lg-4 col-md-6',
        'col-xl-3 col-lg-4 col-md-6',
        'col-xl-6 col-lg-4 col-md-6',
        'col-xl-3 col-lg-4 col-md-6',
        'col-xl-3 col-lg-4 col-md-6',
    ];
@endphp
<section class="destination-section-4 section-padding fix">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="text-anim">School &amp; college tour programs</h2>
            <p class="wow fadeInUp" data-wow-delay=".5s">One-day outings, field visits, treks, and camps for student groups across Maharashtra — pickup from {{ tour_pickup_locations_label() }} only</p>
        </div>
        <div class="destination-one-wrapper">
            <div class="row g-3">
                @forelse ($featuredTourCategories as $category)
                    @php
                        $fbImg = $categoryImages[$category->slug] ?? 'assets/img/home-2/destination/'.str_pad((string) (($loop->iteration - 1) % 6 + 1), 2, '0', STR_PAD_LEFT).'.jpg';
                        $tourCount = $category->tours_count ?? $category->tours()->where('is_active', true)->count();
                    @endphp
                    <div class="{{ $destColPattern[$loop->index] ?? 'col-xl-4 col-lg-6 col-md-6' }} wow fadeInUp" data-wow-delay=".{{ min(2 + $loop->iteration, 9) }}s">
                        <div class="destination-image-item">
                            <div class="destination-image">
                                <img src="{{ asset($fbImg) }}" alt="{{ $category->name }}">
                                <div class="destination-content">
                                    <h3>
                                        <a href="{{ route('tours.category', $category->slug) }}">{{ $category->name }}</a>
                                    </h3>
                                    <p>{{ $tourCount }} {{ \Illuminate\Support\Str::plural('program', $tourCount) }} available</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">No tour programs yet.</div>
                @endforelse
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('tours.index') }}" class="theme-btn">View all tours</a>
        </div>
    </div>
</section>
@endif

{{-- Featured tours (DB) --}}
<section class="tour-place-section section-padding fix">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="text-anim">UPCOMING TREKS FROM PUNE AND MUMBAI Neww</h2>
            <p class="wow fadeInUp" data-wow-delay=".5s">Educational outings, treks, and group programs across Maharashtra — pickup from {{ tour_pickup_locations_label() }} only</p>
        </div>
        @include('tours.partials.pickup-notice', ['class' => 'wow fadeInUp mb-4'])
        <div class="row g-4 tour-cards-row">
            @forelse ($featuredTours as $tour)
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".{{ min(2 + $loop->iteration, 9) }}s">
                    @include('tours.partials.card', ['tour' => $tour])
                </div>
            @empty
                <div class="col-12 text-center text-muted">No tours published yet.</div>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('tours.index') }}" class="theme-btn">View all tours</a>
        </div>
    </div>
</section>

@include('partials.home-mid-sections')

{{-- Blog (DB) --}}
<section class="news-section section-padding fix">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="text-anim">Latest news &amp; blog</h2>
            <p class="wow fadeInUp" data-wow-delay=".5s">Travel tips and stories from {{ config('app.name') }}</p>
        </div>
        <div class="row g-4 blog-cards-row">
            @php $fallbackNews = ['news-1','news-2','news-3','news-4']; @endphp
            @forelse ($latestPosts as $post)
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".{{ min(2 + $loop->iteration * 2, 8) }}s">
                    @include('blog.partials.card', [
                        'post' => $post,
                        'imageUrl' => $post->hasCoverImage()
                            ? $post->coverImageUrl()
                            : asset('assets/img/home-1/news/'.$fallbackNews[$loop->index % 4].'.jpg'),
                    ])
                </div>
            @empty
                <div class="col-12 text-center text-muted py-4">No blog posts yet.</div>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('blog.index') }}" class="theme-btn">All articles</a>
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
                            <h2 class="sec-title text-white text-anim">Adventure is calling</h2>
                        </div>
                        <p class="text wow fadeInUp" data-wow-delay=".3s">
                            Plan your next educational outing, trek, or camp with Backpackers and Movers.
                        </p>
                        <a href="{{ route('contact') }}" class="theme-btn">Get in touch</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
