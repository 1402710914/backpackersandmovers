<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tour;
use Illuminate\Database\Seeder;

/**
 * Remove template demo tour categories (Adventure, Beach, City Breaks, Cultural) and their tours.
 *
 * php artisan db:seed --class=CleanupDemoTourCategoriesSeeder
 */
class CleanupDemoTourCategoriesSeeder extends Seeder
{
    private const DEMO_SLUGS = ['adventure', 'beach', 'city-breaks', 'cultural'];

    public function run(): void
    {
        $deletedTours = 0;
        $deletedCategories = 0;

        foreach (self::DEMO_SLUGS as $slug) {
            $category = Category::query()->where('slug', $slug)->where('type', 'tour')->first();
            if (! $category) {
                continue;
            }

            $deletedTours += Tour::query()->where('category_id', $category->id)->delete();
            $category->delete();
            $deletedCategories++;
        }

        $this->command?->info("Removed {$deletedTours} demo tour(s) and {$deletedCategories} demo categor(ies).");
    }
}
