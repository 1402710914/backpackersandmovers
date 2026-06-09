<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Seeder;

/**
 * Populate about, itinerary (JSON days), attractions, offers, and FAQ for every tour,
 * using the same generator as DatabaseSeeder (Paris Highlights keeps its special 3-day itinerary).
 *
 * php artisan db:seed --class=FillAllToursRichContentSeeder
 */
class FillAllToursRichContentSeeder extends DatabaseSeeder
{
    public function run(): void
    {
        $count = 0;
        foreach (Tour::query()->with('destination')->orderBy('id')->cursor() as $tour) {
            $destinationName = $tour->destination?->name ?? '';
            $country = $tour->destination?->country ?? '';
            $detail = $this->tourDummySections(
                $tour->title,
                $destinationName,
                $country,
                (int) $tour->duration_days
            );
            $tour->update([
                'about' => $detail['about'],
                'itinerary' => $detail['itinerary'],
                'attractions' => $detail['attractions'],
                'offers' => $detail['offers'],
                'faq' => $detail['faq'],
            ]);
            $count++;
        }

        $this->command?->info("Updated rich sections for {$count} tour(s).");
    }
}
