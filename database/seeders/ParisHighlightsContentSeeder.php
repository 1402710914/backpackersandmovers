<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Seeder;

/**
 * Fills detail sections for an existing "Paris Highlights Long Weekend" tour (slug paris-highlights).
 * Run after migrations: php artisan db:seed --class=ParisHighlightsContentSeeder
 */
class ParisHighlightsContentSeeder extends DatabaseSeeder
{
    public function run(): void
    {
        $tour = Tour::query()->where('slug', 'paris-highlights')->with('destination')->first();
        if (! $tour) {
            $this->command?->warn('No tour with slug "paris-highlights". Create it or run DatabaseSeeder first.');

            return;
        }

        $destinationName = $tour->destination?->name ?? 'Paris';
        $country = $tour->destination?->country ?? 'France';

        $detail = $this->tourDummySections(
            'Paris Highlights Long Weekend',
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

        $this->command?->info('Updated Paris Highlights Long Weekend (paris-highlights) detail sections.');
    }
}
