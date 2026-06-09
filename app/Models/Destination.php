<?php

namespace App\Models;

use App\Support\PublicStorage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    /** Template / international demo destinations — not used for student tours. */
    public const DEMO_SLUGS = [
        'bali',
        'paris',
        'tokyo',
        'dubai',
        'rome',
        'maldives',
        'santorini',
        'kyoto',
    ];

    protected $fillable = [
        'name', 'slug', 'country', 'excerpt', 'description',
        'featured_image', 'is_featured', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }

    public function scopeExcludingDemo($query)
    {
        return $query->whereNotIn('slug', self::DEMO_SLUGS);
    }

    public function scopeWithActiveTours($query)
    {
        return $query->whereHas('tours', fn ($q) => $q->where('is_active', true));
    }

    public function featuredImageUrl(?string $fallback = null): string
    {
        if (filled($this->featured_image)) {
            return PublicStorage::diskUrl($this->featured_image)
                ?? ($fallback ?? asset('assets/img/home-2/destination/02.jpg'));
        }

        return $fallback ?? asset('assets/img/home-2/destination/02.jpg');
    }
}
