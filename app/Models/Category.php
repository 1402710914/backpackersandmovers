<?php

namespace App\Models;

use App\Models\Concerns\HasTourCategoryNavigation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasTourCategoryNavigation;

    protected $fillable = ['name', 'slug', 'type'];

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }

    public function blogPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }
}
