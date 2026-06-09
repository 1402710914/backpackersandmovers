@extends('layouts.roavio', ['title' => 'Blogs'])

@push('styles')
<style>
    .blog-grid-page {
        background: #fff;
    }
    .blog-grid-breadcrumb {
        background: #fff;
        border-top: 1px solid rgba(21, 21, 21, 0.08);
    }
    .blog-grid-breadcrumb .page-heading .breadcrumb-items li:first-child,
    .blog-grid-breadcrumb .page-heading .breadcrumb-items li:first-child a {
        color: var(--header, #151515);
    }
    .blog-grid-breadcrumb .page-heading .breadcrumb-items li:first-child a:hover {
        color: var(--theme);
    }
    .blog-grid-breadcrumb .page-heading .breadcrumb-items li.style-2.style-3 {
        color: var(--theme);
        border-bottom: none;
    }
    .blog-grid-breadcrumb .page-heading .breadcrumb-items li.style-2::before {
        background-color: var(--theme);
    }
    .blog-grid-page .news-section-2 {
        background: #fff;
        border-bottom: none;
    }
</style>
@endpush

@section('content')
<div class="blog-grid-page">
    <div class="breadcrumb-wrapper blog-grid-breadcrumb fix">
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Blog Grid</h1>
                </div>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="style-2 style-3">Blog Grid</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="news-section-2 section-padding pt-0 fix">
        <div class="container">
            @if ($viewerIsAdmin)
                <div class="alert alert-info border-0 shadow-sm mb-4" role="status">
                    You’re signed in as an administrator: this page also lists <strong>drafts</strong> (visitors only see published posts).
                    <a href="{{ route('admin.blog-posts.index') }}" class="alert-link">Manage in Admin</a>
                </div>
            @endif
            <div class="row g-4 justify-content-center blog-cards-row">
                @forelse ($posts as $post)
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ ['.3s', '.5s', '.7s'][$loop->index % 3] }}">
                        @include('blog.partials.card', [
                            'post' => $post,
                            'showDraftBadge' => $viewerIsAdmin ?? false,
                        ])
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted mb-2">No <strong>published</strong> articles to show here yet.</p>
                        <p class="small text-muted mb-0 mx-auto" style="max-width: 42rem">
                            If you saved posts as <strong>drafts</strong>, turn on <strong>Published</strong> in
                            <a href="{{ route('admin.blog-posts.index') }}">Admin → Blog posts</a>.
                            Open this site in the same browser while logged into Admin to preview drafts on this page.
                        </p>
                    </div>
                @endforelse
            </div>

            @if ($posts->hasPages())
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection
