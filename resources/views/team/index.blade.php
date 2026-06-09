@extends('layouts.roavio', ['title' => 'Our team'])

@push('styles')
<style>
    .team-list-page {
        background: #fff;
    }
    .team-list-page .team-grid-breadcrumb {
        background: #fff;
        border-top: 1px solid rgba(21, 21, 21, 0.08);
    }
    .team-list-page .team-grid-breadcrumb .page-heading .breadcrumb-items li:first-child,
    .team-list-page .team-grid-breadcrumb .page-heading .breadcrumb-items li:first-child a {
        color: var(--header, #151515);
    }
    .team-list-page .team-grid-breadcrumb .page-heading .breadcrumb-items li:first-child a:hover {
        color: var(--theme);
    }
    .team-list-page .team-grid-breadcrumb .page-heading .breadcrumb-items li.style-2.style-3 {
        color: var(--theme);
        border-bottom: none;
    }
    .team-list-page .team-grid-breadcrumb .page-heading .breadcrumb-items li.style-2::before {
        background-color: var(--theme);
    }
    .team-list-page .team-section-wrap {
        background: #fff;
    }
    .team-list-page .team-section-inner {
        background: #fff;
        padding: 2.5rem 1.5rem;
    }
    @media (min-width: 768px) {
        .team-list-page .team-section-inner {
            padding: 3rem 2.5rem;
        }
    }
    .team-list-page .team-image-item {
        margin-top: 0;
        height: 100%;
        display: flex;
        flex-direction: column;
        padding: 1rem 0.5rem;
        border-radius: 12px;
        transition: background-color 0.25s ease;
    }
    .team-list-page .team-image-item:hover {
        background: rgba(0, 0, 0, 0.02);
    }
    .team-list-page .team-image-item .team-image {
        max-width: 220px;
        margin: 0 auto;
    }
    .team-list-page .team-image-item .team-image img {
        width: 100%;
        aspect-ratio: 1;
        object-fit: cover;
        border-radius: 50%;
    }
    .team-list-page .team-image-item .team-content {
        margin-top: 1.25rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .team-list-page .team-image-item .team-content .team-role {
        color: var(--theme);
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
        letter-spacing: 0.02em;
    }
    .team-list-page .team-image-item .team-content h3 {
        margin-bottom: 0.35rem;
        text-align: center;
    }
    .team-list-page .team-bio-inline {
        margin-top: 0.75rem;
        font-size: 15px;
        line-height: 1.65;
        color: #5c5c5c;
        text-align: center;
        width: 100%;
        max-width: 36rem;
        margin-left: auto;
        margin-right: auto;
    }
    .team-list-page .team-bio-inline img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin: 0.75rem auto;
        display: block;
    }
    .team-list-page .team-bio-inline p:last-child {
        margin-bottom: 0;
    }
    .team-list-page .team-bio-inline ul,
    .team-list-page .team-bio-inline ol {
        display: inline-block;
        text-align: left;
        margin: 0.5rem auto 0;
        padding-left: 1.35rem;
    }
    .team-list-page .team-image-item .team-card-link {
        margin-top: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        font-weight: 600;
        font-size: 15px;
        color: var(--theme);
        text-decoration: none;
    }
    .team-list-page .team-image-item .team-card-link:hover {
        text-decoration: underline;
    }
    .team-list-page .team-empty {
        padding: 3rem 1.5rem;
    }
</style>
@endpush

@section('content')
<div class="team-list-page">
    <div class="breadcrumb-wrapper team-grid-breadcrumb fix">
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Our team</h1>
                </div>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="style-2 style-3">Team</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="team-section-wrap section-padding pt-0 pb-5 fix">
        <div class="container">
            <div class="team-section-inner">
                <div class="section-title text-center mb-2 mb-md-4">
                    <h2 class="text-anim">Meet our team</h2>
                    <p class="wow fadeInUp text-muted mb-0" data-wow-delay=".5s">People behind {{ config('app.name') }} — profiles pulled from your admin panel.</p>
                </div>

                <div class="row justify-content-center g-4">
                    @forelse ($members as $member)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ ['.15s', '.25s', '.35s', '.4s'][$loop->index % 4] }}">
                            <div class="team-image-item">
                                <div class="team-image">
                                    <img src="{{ $member->listingPhotoUrl($loop->index) }}" alt="{{ $member->name }}" loading="lazy">
                                </div>
                                <div class="team-content">
                                    @if (filled($member->role))
                                        <span class="team-role">{{ $member->role }}</span>
                                    @endif
                                    <h3>{{ $member->name }}</h3>
                                    @if (filled($member->bio))
                                        <div class="team-bio-inline">{!! $member->htmlBioWithFixedImages() !!}</div>
                                    @endif
                                    @if (filled($member->email))
                                        <a href="mailto:{{ $member->email }}" class="team-card-link">
                                            {{ $member->email }} <i class="fa-regular fa-envelope" style="font-size: 0.85em;"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 team-empty text-center">
                            <p class="text-muted mb-3">No team members are published yet.</p>
                            <p class="small text-muted mb-0">Add people under <strong>Admin → Team members</strong> and mark them <strong>Active</strong> to show them here.</p>
                            <a href="{{ route('home') }}" class="theme-btn style-2 mt-4 d-inline-flex">Back to home</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
