<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Tour;
use Illuminate\Database\Seeder;

/**
 * Remove template demo destinations (Bali, Paris, Dubai, etc.) and their tours.
 *
 * php artisan db:seed --class=CleanupDemoDestinationsSeeder
 */
class CleanupDemoDestinationsSeeder extends Seeder
{
    public function run(): void
    {
        $deletedTours = 0;
        $deletedDestinations = 0;

        foreach (Destination::DEMO_SLUGS as $slug) {
            $destination = Destination::query()->where('slug', $slug)->first();
            if (! $destination) {
                continue;
            }

            $deletedTours += Tour::query()->where('destination_id', $destination->id)->delete();
            $destination->delete();
            $deletedDestinations++;
        }

        $this->command?->info("Removed {$deletedTours} demo tour(s) and {$deletedDestinations} demo destination(s).");
    }
}
