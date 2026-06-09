<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Destination;
use App\Models\Tour;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Agri tourism farm visits for schools and colleges (Pune region).
 *
 * php artisan db:seed --class=AgriTourismSeeder
 */
class AgriTourismSeeder extends Seeder
{
    private const CATEGORY_SLUG = 'agri-tourism';

    private const CATEGORY_NAME = 'Agri Tourism';

    /** @var array<string, int> */
    private const STANDARD_TIERS = [
        'Pre-primary' => 850,
        '1st to 4th' => 900,
        '5th to 7th' => 950,
        '8th to 10th' => 1000,
        'College' => 1300,
    ];

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
                'description' => '<p>All group departures start from <strong>Pune</strong> and <strong>Mumbai</strong>. Agri tourism and farm visits across Maharashtra.</p>',
                'is_featured' => true,
                'is_active' => true,
            ]
        );

        $tours = [
            ['name' => 'AROHI', 'location' => 'Talegaon Dhamdhere', 'featured' => true],
            ['name' => 'Kalpataru Baug', 'location' => 'Theur', 'featured' => true],
            ['name' => 'Memane Farm', 'location' => 'Urali Kanchan', 'featured' => true],
            ['name' => 'Chonde Farms', 'location' => 'Loni Kand', 'featured' => false],
            ['name' => 'Avani', 'location' => 'Chakan', 'featured' => false],
            ['name' => 'Kokan Kanya', 'location' => 'Shikrapur', 'featured' => false],
            ['name' => 'Muktar Farms', 'location' => 'Urali Kanchan', 'featured' => false],
            ['name' => 'Nisarg Sangeet', 'location' => 'Saswad', 'featured' => false],
            ['name' => 'Raj Rohi', 'location' => 'Talegaon Somatne Phata', 'featured' => true],
            ['name' => 'Sheru', 'location' => 'Yawat', 'featured' => false],
            ['name' => 'Darekar Wada', 'location' => 'Yawat', 'featured' => false],
            ['name' => 'Morachi Chincholi', 'location' => 'Morachi Chincholi', 'featured' => false],
            ['name' => 'Nature Nest', 'location' => 'Urali Kanchan', 'featured' => false],
            ['name' => 'Prabhushree', 'location' => 'Alandi', 'featured' => false],
        ];

        $created = 0;
        $updated = 0;

        foreach ($tours as $row) {
            $title = 'Agri Tourism — '.$row['name'];
            $slug = Str::slug($title);
            $location = $row['location'];
            $excerpt = 'Hands-on farm visit at '.$row['name'].' — agriculture, rural life, and outdoor learning for student groups.';

            $payload = [
                'category_id' => $category->id,
                'destination_id' => $destination->id,
                'title' => $title,
                'excerpt' => $excerpt,
                'description' => $this->descriptionHtml($row['name'], $location, $excerpt),
                'about' => $this->aboutHtml($row['name'], $location),
                'itinerary' => $this->visitItineraryJson($row['name'], $location),
                'attractions' => $this->attractionsHtml($row['name'], $location),
                'offers' => $this->offersHtml(self::STANDARD_TIERS),
                'faq' => $this->faqJson(),
                'price' => (float) min(self::STANDARD_TIERS),
                'duration_days' => 1,
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

        $this->command?->info("Agri tourism: {$created} created, {$updated} updated (category: {$category->name}).");
    }

    private function descriptionHtml(string $farm, string $location, string $excerpt): string
    {
        return '<p class="lead">'.e($excerpt).'</p>'
            .'<p><strong>'.e($farm).'</strong> ('.e($location).') is offered as an <strong>agri tourism</strong> day program for schools and colleges through Backpackers and Movers — Educational Tours and Travels.</p>'
            .'<p>Students experience farming, rural culture, and nature-based activities with coordinated group movement and teacher support.</p>';
    }

    private function aboutHtml(string $farm, string $location): string
    {
        return '<p>Visit <strong>'.e($farm).'</strong> at <strong>'.e($location).'</strong> for a curated <strong>agri tourism</strong> experience designed for pre-primary through college batches.</p>'
            .'<p>Programs may include farm walks, crop awareness, animal husbandry demos, traditional food, and team activities — depending on the farm and season.</p>'
            .'<p>Our team manages timings, safety, and group coordination so your institution enjoys a smooth, educational day outdoors.</p>';
    }

    private function visitItineraryJson(string $farm, string $location): string
    {
        $rows = [
            [
                'day_label' => 'One day visit',
                'title' => 'Typical program',
                'body' => '<ul>'
                    .'<li><strong>Morning:</strong> Travel from school to <strong>'.e($farm).'</strong>, '.e($location).'.</li>'
                    .'<li><strong>On farm:</strong> Guided tour, activities, and learning sessions as per the farm schedule.</li>'
                    .'<li><strong>Afternoon:</strong> Lunch (packed or farm-arranged as per package) and continued activities.</li>'
                    .'<li><strong>Evening:</strong> Return to school.</li>'
                    .'</ul>',
            ],
        ];

        return json_encode($rows, JSON_UNESCAPED_UNICODE);
    }

    private function attractionsHtml(string $farm, string $location): string
    {
        return '<p>At <strong>'.e($farm).'</strong> ('.e($location).'), students typically enjoy:</p><ul>'
            .'<li>Introduction to agriculture and local farming practices</li>'
            .'<li>Rural lifestyle and environmental awareness</li>'
            .'<li>Interactive games and team-building in open spaces</li>'
            .'<li>Seasonal activities (planting, harvesting, animal care — as available)</li>'
            .'</ul>';
    }

    /**
     * @param  array<string, int>  $tiers
     */
    private function offersHtml(array $tiers): string
    {
        $html = '<p><strong>Category:</strong> '.e(self::CATEGORY_NAME).'</p>'
            .'<h3>Student group pricing (per student)</h3>'
            .'<div class="table-responsive"><table class="table table-bordered align-middle">'
            .'<thead><tr><th scope="col">Class / Group</th><th scope="col">Price (₹)</th></tr></thead><tbody>';

        foreach ($tiers as $label => $amount) {
            $html .= '<tr><td>'.e($label).'</td><td><strong>₹'.number_format($amount).'</strong></td></tr>';
        }

        $html .= '</tbody></table></div>'
            .'<p class="mb-0"><em>Rates are per student for organized school/college groups. Transport, meals, GST, and farm charges may apply as per final proposal.</em></p>';

        return $html;
    }

    private function faqJson(): string
    {
        return json_encode([
            [
                'question' => 'What is agri tourism?',
                'answer' => '<p>Agri tourism lets students visit working farms to learn about agriculture, food sources, rural culture, and nature in a supervised, fun setting.</p>',
            ],
            [
                'question' => 'Is pricing the same for all farms?',
                'answer' => '<p>Class-wise per-student rates listed on this page apply to our agri tourism programs. Final quotes may vary slightly by farm and inclusions.</p>',
            ],
            [
                'question' => 'What should students wear?',
                'answer' => '<p>Comfortable full clothing, closed shoes, caps, and sunscreen. See our trek preparation section on the home page for general outdoor trip guidance.</p>',
            ],
        ], JSON_UNESCAPED_UNICODE);
    }
}
