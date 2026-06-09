<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Destination;
use App\Models\Tour;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * College & corporate one-night stay and camping programs.
 *
 * php artisan db:seed --class=OneNightCampingSeeder
 */
class OneNightCampingSeeder extends Seeder
{
    private const CATEGORY_SLUG = 'one-night-camping';

    private const CATEGORY_NAME = 'College & Corporate 1 Night Stay & Camping';

    public function run(): void
    {
        $category = Category::query()->firstOrCreate(
            ['slug' => self::CATEGORY_SLUG],
            [
                'name' => self::CATEGORY_NAME,
                'type' => 'tour',
            ]
        );

        $destination = Destination::query()->firstOrCreate(
            ['slug' => 'pune-mumbai'],
            [
                'name' => 'Pune & Mumbai',
                'country' => 'India',
                'excerpt' => 'School and college tour programs with pickup from Pune and Mumbai only.',
                'description' => '<p>All group departures start from <strong>Pune</strong> and <strong>Mumbai</strong>. Camping and overnight programs across Maharashtra.</p>',
                'is_featured' => true,
                'is_active' => true,
            ]
        );

        $programs = [
            [
                'title' => 'Harishchandragad Camping',
                'location' => 'Ahmednagar / Pune region',
                'tiers' => ['College & Corporate (with travel)' => 2200],
                'featured' => true,
            ],
            [
                'title' => 'Rajmachi Fort Camping',
                'location' => 'Lonavala',
                'tiers' => ['College & Corporate (with travel)' => 1800],
                'featured' => true,
            ],
            [
                'title' => 'Harihareshwar Beach & Temple',
                'location' => 'Raigad coast',
                'tiers' => ['College & Corporate (with travel)' => 2600],
                'featured' => false,
            ],
            [
                'title' => 'Aravi Beach & Homestay',
                'location' => 'Konkan coast',
                'tiers' => ['College & Corporate (with travel)' => 2600],
                'featured' => false,
            ],
            [
                'title' => 'Ladghar Beach',
                'location' => 'Dapoli / Konkan',
                'tiers' => ['College & Corporate (with travel)' => 3200],
                'featured' => false,
            ],
            [
                'title' => 'Kalsubai Peak Camping',
                'location' => 'Ahmednagar district',
                'tiers' => ['College & Corporate (with travel)' => 2200],
                'featured' => true,
            ],
            [
                'title' => 'Sandhan Valley Camping',
                'location' => 'Bhandardara',
                'tiers' => ['College & Corporate (with travel)' => 2200],
                'featured' => false,
            ],
            [
                'title' => 'Nagaon Beach & Homestay',
                'location' => 'Alibaug region',
                'tiers' => ['College & Corporate (with travel)' => 2600],
                'featured' => false,
            ],
            [
                'title' => 'Shrivardhan Beach & Homestay',
                'location' => 'Raigad coast',
                'tiers' => ['College & Corporate (with travel)' => 2900],
                'featured' => false,
            ],
            [
                'title' => 'Bhandardara Camping',
                'location' => 'Bhandardara',
                'tiers' => [
                    'Without travel' => 1200,
                    'With travel' => 2200,
                ],
                'featured' => true,
            ],
            [
                'title' => 'Vasota Fort Camping',
                'location' => 'Satara / Koyna region',
                'tiers' => ['College & Corporate (with travel)' => 1700],
                'featured' => false,
            ],
            [
                'title' => 'Velas Beach & Homestay',
                'location' => 'Ratnagiri coast',
                'tiers' => ['College & Corporate (with travel)' => 2400],
                'featured' => false,
            ],
            [
                'title' => 'Diveagar Beach',
                'location' => 'Raigad coast',
                'tiers' => ['College & Corporate (with travel)' => 2900],
                'featured' => false,
            ],
            [
                'title' => 'Anjarle Beach & Homestay',
                'location' => 'Dapoli / Konkan',
                'tiers' => ['College & Corporate (with travel)' => 2700],
                'featured' => false,
            ],
            [
                'title' => 'Panshet Camping',
                'location' => 'Panshet, Pune',
                'tiers' => [
                    'Without travel' => 1000,
                    'With travel' => 2000,
                ],
                'featured' => false,
            ],
            [
                'title' => 'Pawna Lake Camping',
                'location' => 'Lonavala',
                'tiers' => [
                    'Without travel' => 1000,
                    'With travel' => 2000,
                ],
                'featured' => true,
            ],
            [
                'title' => 'Alibaug Beach Camping',
                'location' => 'Alibaug',
                'tiers' => [
                    'Without travel' => 1200,
                    'With travel' => 2200,
                ],
                'featured' => true,
            ],
        ];

        $created = 0;
        $updated = 0;

        foreach ($programs as $row) {
            $title = $row['title'];
            $slug = Str::slug($title);
            $location = $row['location'];
            $tiers = $row['tiers'];
            $excerpt = 'One-night camping and stay at '.$title.' for college and corporate groups.';

            $payload = [
                'category_id' => $category->id,
                'destination_id' => $destination->id,
                'title' => $title,
                'excerpt' => $excerpt,
                'description' => $this->descriptionHtml($title, $location, $excerpt),
                'about' => $this->aboutHtml($title, $location),
                'itinerary' => $this->campingItineraryJson($title, $location),
                'attractions' => $this->attractionsHtml($title, $location),
                'offers' => $this->offersHtml($tiers),
                'faq' => $this->faqJson(),
                'price' => (float) min($tiers),
                'duration_days' => 2,
                'group_size' => 50,
                'is_featured' => (bool) ($row['featured'] ?? false),
                'is_active' => true,
            ];

            $tour = Tour::query()->where('slug', $slug)->first();
            if ($tour) {
                $tour->update($payload);
                $updated++;
            } else {
                Tour::query()->create(array_merge($payload, ['slug' => $slug]));
                $created++;
            }
        }

        $this->command?->info("One-night camping: {$created} created, {$updated} updated (category: {$category->name}).");
    }

    private function descriptionHtml(string $title, string $location, string $excerpt): string
    {
        return '<p class="lead">'.e($excerpt).'</p>'
            .'<p><strong>'.e($title).'</strong> ('.e($location).') is a <strong>one-night stay &amp; camping</strong> program for college and corporate groups by Backpackers and Movers.</p>'
            .'<p>Enjoy bonfire evenings, tents or homestay comfort, beach or fort surroundings, and team activities — with our coordinators managing safety and schedules.</p>';
    }

    private function aboutHtml(string $title, string $location): string
    {
        return '<p>This <strong>2-day / 1-night</strong> program at <strong>'.e($title).'</strong>, '.e($location).', is built for <strong>college batches and corporate teams</strong>.</p>'
            .'<p>Choose <em>with travel</em> (pickup, transport, and drop) or <em>without travel</em> (join at campsite) where options are listed on this page.</p>'
            .'<p>Ideal for annual outings, department offsites, and adventure clubs. Meals, camping gear, and activity inclusions are confirmed in your final quotation.</p>';
    }

    private function campingItineraryJson(string $title, string $location): string
    {
        $rows = [
            [
                'day_label' => 'Day 1',
                'title' => 'Arrival & camp setup',
                'body' => '<ul>'
                    .'<li>Travel to <strong>'.e($title).'</strong> ('.e($location).') — or direct check-in if without travel package.</li>'
                    .'<li>Campsite / homestay allocation and safety briefing.</li>'
                    .'<li>Evening activities, dinner, and bonfire (where available).</li>'
                    .'<li>Overnight stay in tents or homestay rooms.</li>'
                    .'</ul>',
            ],
            [
                'day_label' => 'Day 2',
                'title' => 'Morning & departure',
                'body' => '<ul>'
                    .'<li>Morning tea/breakfast and beach, fort, or valley exploration as per program.</li>'
                    .'<li>Group activities / temple or sightseeing (program-specific).</li>'
                    .'<li>Checkout and return travel to pickup point.</li>'
                    .'</ul>',
            ],
        ];

        return json_encode($rows, JSON_UNESCAPED_UNICODE);
    }

    private function attractionsHtml(string $title, string $location): string
    {
        return '<p>Highlights at <strong>'.e($title).'</strong> ('.e($location).'):</p><ul>'
            .'<li>One night under the stars — camping or coastal homestay</li>'
            .'<li>Team games, bonfire, and group bonding</li>'
            .'<li>Scenic fort, valley, lake, or beach setting</li>'
            .'<li>Led by coordinators experienced with college &amp; corporate groups</li>'
            .'</ul>';
    }

    /**
     * @param  array<string, int>  $tiers
     */
    private function offersHtml(array $tiers): string
    {
        $html = '<p><strong>Category:</strong> '.e(self::CATEGORY_NAME).'</p>'
            .'<h3>Package pricing (per person)</h3>'
            .'<div class="table-responsive"><table class="table table-bordered align-middle">'
            .'<thead><tr><th scope="col">Package</th><th scope="col">Price (₹)</th></tr></thead><tbody>';

        foreach ($tiers as $label => $amount) {
            $html .= '<tr><td>'.e($label).'</td><td><strong>₹'.number_format($amount).'</strong></td></tr>';
        }

        $html .= '</tbody></table></div>'
            .'<p class="mb-0"><em>Prices per participant for organized college or corporate groups. GST, meals, and activity add-ons as per final proposal. Seasonal rates may vary.</em></p>';

        return $html;
    }

    private function faqJson(): string
    {
        return json_encode([
            [
                'question' => 'What is included in “with travel”?',
                'answer' => '<p>Typically pickup and drop from an agreed point, transport to the campsite, coordination, and camping arrangements. Exact inclusions are listed on your booking voucher.</p>',
            ],
            [
                'question' => 'What does “without travel” mean?',
                'answer' => '<p>Your group reaches the campsite on your own transport; we provide camping stay, meals/activities as per the agreed package from arrival to checkout.</p>',
            ],
            [
                'question' => 'What should we carry for camping?',
                'answer' => '<p>Warm clothes, torch, personal medicines, comfortable shoes, and a proper backpack. See trek preparation tips on our home page for a full checklist.</p>',
            ],
        ], JSON_UNESCAPED_UNICODE);
    }
}
