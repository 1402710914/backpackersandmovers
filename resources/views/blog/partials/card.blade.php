@php
    $postUrl = route('blog.show', $post->slug);
    $coverUrl = $imageUrl ?? $post->coverImageUrl();
    $categoryName = $post->category?->name ?? 'Travel';
    $excerpt = filled($post->excerpt)
        ? strip_tags($post->excerpt)
        : \Illuminate\Support\Str::limit(strip_tags((string) $post->body), 120);
@endphp
@once
    @push('styles')
        @include('blog.partials.card-styles')
    @endpush
@endonce
<article class="blog-list-card h-100">
    <a href="{{ $postUrl }}" class="blog-list-card__media" aria-label="{{ $post->title }}">
        <img src="{{ $coverUrl }}" alt="{{ $post->title }}" loading="lazy" width="400" height="260">
        <span class="blog-list-card__overlay" aria-hidden="true"></span>
        <span class="blog-list-card__category">{{ $categoryName }}</span>
        @if ($post->published_at)
            <time class="blog-list-card__date" datetime="{{ $post->published_at->toDateString() }}">
                {{ $post->published_at->format('d M Y') }}
            </time>
        @endif
        @if (! empty($showDraftBadge) && ! $post->is_published)
            <span class="blog-list-card__draft">Draft</span>
        @endif
    </a>
    <div class="blog-list-card__body">
        <h3 class="blog-list-card__title" title="{{ $post->title }}">
            <a href="{{ $postUrl }}">{{ \Illuminate\Support\Str::limit($post->title, 72) }}</a>
        </h3>
        @if (filled($excerpt))
            <p class="blog-list-card__excerpt">{{ $excerpt }}</p>
        @endif
        <a href="{{ $postUrl }}" class="blog-list-card__cta">
            <span>Read article</span>
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
        </a>
    </div>
</article>
