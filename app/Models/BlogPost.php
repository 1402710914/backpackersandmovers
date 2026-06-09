<?php

namespace App\Models;

use App\Support\HtmlImageUrls;
use App\Support\PublicStorage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model
{
    protected $fillable = [
        'category_id', 'title', 'slug', 'excerpt', 'body',
        'featured_image', 'is_published', 'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    /**
     * Public URL for blog cards / sidebar: featured image, else first <img> in body, else placeholder.
     */
    public function coverImageUrl(): string
    {
        if (filled($this->featured_image)) {
            return PublicStorage::diskUrl($this->featured_image)
                ?? asset('assets/img/home-1/news/news-5.jpg');
        }
        $src = $this->firstImgSrcFromBody();
        if ($src !== null) {
            return HtmlImageUrls::normalizePublicUrl($src);
        }

        return asset('assets/img/home-1/news/news-5.jpg');
    }

    public function hasCoverImage(): bool
    {
        return filled($this->featured_image) || $this->firstImgSrcFromBody() !== null;
    }

    /**
     * Body HTML with img src rewritten to the current app base (fixes /storage paths & old hosts).
     */
    public function htmlBodyWithFixedImages(): string
    {
        return HtmlImageUrls::fixImgSrcsInHtml((string) ($this->body ?? ''));
    }

    private function firstImgSrcFromBody(): ?string
    {
        if (! filled($this->body)) {
            return null;
        }
        if (! preg_match('/<img\b[^>]*\bsrc\s*=\s*["\']([^"\'>]+)["\']/is', $this->body, $m)) {
            return null;
        }

        return $m[1];
    }
}
