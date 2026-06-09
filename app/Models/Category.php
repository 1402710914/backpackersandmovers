<?php

namespace App\Models;

use App\Models\Concerns\HasTourCategoryNavigation;
use App\Support\PublicStorage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasTourCategoryNavigation;

    protected $fillable = ['name', 'slug', 'type', 'featured_image'];

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }

    public function blogPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }

    public function listingImageUrl(): string
    {
        if (filled($this->featured_image)) {
            return PublicStorage::diskUrl($this->featured_image)
                ?? $this->defaultListingImageUrl();
        }

        return $this->defaultListingImageUrl();
    }

    private function defaultListingImageUrl(): string
    {
        $bySlug = [
            'educational-one-day-outing' => 'assets/img/home-2/destination/01.jpg',
            'educational-field-visit' => 'assets/img/home-2/destination/02.jpg',
            'agri-tourism' => 'assets/img/home-2/destination/03.jpg',
            'one-day-trek' => 'assets/img/home-2/destination/04.jpg',
            'one-night-camping' => 'assets/img/home-2/destination/05.jpg',
        ];

        if (isset($bySlug[$this->slug])) {
            return asset($bySlug[$this->slug]);
        }

        $index = (($this->id ?? 1) - 1) % 6 + 1;

        return asset('assets/img/home-2/destination/'.str_pad((string) $index, 2, '0', STR_PAD_LEFT).'.jpg');
    }
}
