@extends('layouts.roavio', ['title' => $post->title])

@push('styles')
<style>
    .blog-details-page {
        background: #fff;
    }
    .blog-details-page .news-details-section {
        background: #fff;
        border-bottom: none;
    }
    .blog-details-page .news-details-content .details-thumb img {
        border-radius: 16px;
        width: 100%;
        height: auto;
    }
    .blog-details-page .main-sideber .recent-post-area .recent-thumb {
        flex: 0 0 150px;
        max-width: 150px;
    }
    .blog-details-page .main-sideber .recent-post-area .recent-thumb img {
        width: 150px;
        max-width: 100%;
        aspect-ratio: 16 / 10;
        height: auto;
        border-radius: 10px;
        object-fit: cover;
        display: block;
    }
    .blog-details-page .blog-body-html {
        margin-top: 1rem;
    }
    .blog-details-page .blog-body-html img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
    }
    .blog-details-page .blog-body-html p:last-child {
        margin-bottom: 0;
    }
</style>
@endpush

@section('content')
<div class="blog-details-page">
    <div class="breadcrumb-wrapper blog-grid-breadcrumb fix">
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Blog Details</h1>
                </div>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="style-2 style-3">Blog Details</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="news-details-section section-padding pt-0 fix">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8 col-12">
                    <div class="news-details-post">
                        <ul class="list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="style-2">Single blog</li>
                        </ul>
                        <h2>{{ $post->title }}</h2>
                        @if (($viewerIsAdmin ?? false) && ! $post->is_published)
                            <div class="alert alert-warning border-0 mt-3" role="status">
                                This article is a <strong>draft</strong> — only administrators see it. Enable <strong>Published</strong> in Admin when it’s ready for the public.
                                <a href="{{ route('admin.blog-posts.edit', $post) }}" class="alert-link">Edit in Admin</a>
                            </div>
                        @endif
                        <ul class="list-items">
                            <li class="list">{{ $post->category?->name ?? 'Tours & travel' }}</li>
                            <li class="list">By Admin</li>
                            @if ($post->published_at)
                                <li class="list">{{ $post->published_at->format('j F Y') }}</li>
                            @endif
                            <li class="list">Comments (0)</li>
                        </ul>
                        <div class="news-details-content">
                            @if (filled($post->excerpt))
                                <p>{{ $post->excerpt }}</p>
                            @endif
                            @if ($post->featured_image)
                                <div class="details-thumb mb-0">
                                    <img src="{{ $post->coverImageUrl() }}" alt="{{ $post->title }}">
                                </div>
                            @endif
                            @if (filled($post->body))
                                <div class="blog-body-html mt-2">
                                    {!! $post->htmlBodyWithFixedImages() !!}
                                </div>
                            @elseif (! filled($post->excerpt))
                                <p class="text-muted">No content yet.</p>
                            @endif
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('blog.index') }}" class="theme-btn style-2">Back to blogs</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sideber sticky-style">
                        <div class="single-sideber-widget">
                            <div class="search-widget">
                                <form action="{{ route('blog.index') }}" method="get">
                                    <input type="search" name="q" value="{{ request('q') }}" placeholder="Search" autocomplete="off">
                                    <button type="submit" aria-label="Search"><i class="fa-regular fa-magnifying-glass"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="single-sideber-widget">
                            <div class="widget-title">
                                <h4>Categories</h4>
                            </div>
                            <ul>
                                @forelse ($sidebarCategories as $cat)
                                    <li>
                                        <a href="{{ route('blog.index', ['category' => $cat->slug]) }}">{{ $cat->name }}</a>
                                        <span>({{ $cat->posts_count }})</span>
                                    </li>
                                @empty
                                    <li><span class="text-muted small">No categories yet.</span></li>
                                @endforelse
                            </ul>
                        </div>
                        <div class="single-sideber-widget">
                            <div class="widget-title">
                                <h4>Recent Post</h4>
                            </div>
                            <div class="recent-post-area">
                                @forelse ($recentPosts as $recent)
                                    <div class="recent-items">
                                        <div class="recent-thumb">
                                            <a href="{{ route('blog.show', $recent->slug) }}">
                                                <img src="{{ $recent->coverImageUrl() }}" alt="{{ $recent->title }}">
                                            </a>
                                        </div>
                                        <div class="recent-content">
                                            @if ($recent->published_at)
                                                <span>{{ $recent->published_at->format('j F Y') }}</span>
                                            @endif
                                            <h5>
                                                <a href="{{ route('blog.show', $recent->slug) }}">{{ \Illuminate\Support\Str::limit($recent->title, 70) }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted small mb-0">No other posts yet.</p>
                                @endforelse
                            </div>
                        </div>
                        <div class="tour-bg-image">
                            <img src="{{ asset(config('app.blog_sidebar_promo_image')) }}" alt="{{ config('app.name') }} — tours">
                            <div class="tour-bg-content">
                                <span>Explore the world</span>
                                <h3>
                                    <a href="{{ route('tours.index') }}">Best tourist places</a>
                                </h3>
                                <a href="{{ route('tours.index') }}" class="theme-btn">Explore tours</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
