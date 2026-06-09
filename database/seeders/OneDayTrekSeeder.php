<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Destination;
use App\Models\Tour;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * One-day treks for schools, colleges, and corporate groups.
 *
 * php artisan db:seed --class=OneDayTrekSeeder
 */
class OneDayTrekSeeder extends Seeder
{
    private const CATEGORY_SLUG = 'one-day-trek';

    private const CATEGORY_NAME = 'One Day Trek for School, College & Corporate';

    /** @var array<string, int> */
    private const STANDARD_TIERS = [
        '8th to 10th' => 1100,
        'College' => 1200,
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
                'description' => '<p>All group departures start from <strong>Pune</strong> and <strong>Mumbai</strong>. One-day treks across Maharashtra.</p>',
                'is_featured' => true,
                'is_active' => true,
            ]
        );

        $treks = [
            ['name' => 'Kalsubai Trek', 'location' => 'Ahmednagar district', 'featured' => true],
            ['name' => 'Harishchandragad', 'location' => 'Ahmednagar / Pune region', 'featured' => true],
            ['name' => 'Ratangad Fort', 'location' => 'Bhandardara region', 'featured' => true],
            ['name' => 'Raigad Fort', 'location' => 'Raigad', 'featured' => true],
            ['name' => 'Rajgad Fort', 'location' => 'Pune district', 'featured' => false],
            ['name' => 'Kalavantin Durg', 'location' => 'Prabalmachi region', 'featured' => true],
            ['name' => 'Sandhan Valley', 'location' => 'Bhandardara', 'featured' => false],
            ['name' => 'Rajmachi Fort', 'location' => 'Lonavala', 'featured' => false],
            ['name' => 'Visapur Fort', 'location' => 'Lonavala', 'featured' => false],
            ['name' => 'Lohagad Fort', 'location' => 'Lonavala', 'featured' => false],
            ['name' => 'Tung Fort', 'location' => 'Lonavala', 'featured' => false],
            ['name' => 'Sinhagad Fort', 'location' => 'Pune', 'featured' => false],
            ['name' => 'Tikona Fort', 'location' => 'Lonavala', 'featured' => false],
            ['name' => 'Torna Fort', 'location' => 'Pune district', 'featured' => false],
            ['name' => 'Korigad Fort', 'location' => 'Lonavala', 'featured' => false],
            ['name' => 'Sudhagad Fort', 'location' => 'Pali / Khopoli region', 'featured' => false],
            ['name' => 'Prabalmachi', 'location' => 'Raigad district', 'featured' => false],
            ['name' => 'Peb Fort', 'location' => 'Neral region', 'featured' => false],
            ['name' => 'Ajinkyatara Fort', 'location' => 'Satara', 'featured' => false],
            ['name' => 'Nimgiri Fort', 'location' => 'Pune region', 'featured' => false],
            ['name' => 'Jivdhan Fort', 'location' => 'Junnar / Naneghat region', 'featured' => false],
        ];

        $created = 0;
        $updated = 0;

        foreach ($treks as $row) {
            $title = $row['name'];
            $slug = Str::slug($title);
            $location = $row['location'];
            $excerpt = 'One-day trek to '.$row['name'].' for school, college, and corporate groups — led by experienced trek leaders.';

            $payload = [
                'category_id' => $category->id,
                'destination_id' => $destination->id,
                'title' => $title,
                'excerpt' => $excerpt,
                'description' => $this->descriptionHtml($title, $location, $excerpt),
                'about' => $this->aboutHtml($title, $location),
                'itinerary' => $this->trekItineraryJson($title, $location),
                'attractions' => $this->attractionsHtml($title, $location),
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

        $this->command?->info("One-day treks: {$created} created, {$updated} updated (category: {$category->name}).");
    }

    private function descriptionHtml(string $trek, string $location, string $excerpt): string
    {
        return '<p class="lead">'.e($excerpt).'</p>'
            .'<p><strong>'.e($trek).'</strong> ('.e($location).') is a <strong>one-day trek</strong> for schools, colleges, and corporate teams organized by Backpackers and Movers — Educational Tours and Travels.</p>'
            .'<p>Includes trek leader support, route planning, and group coordination. Transport and meals are confirmed in your quotation.</p>';
    }

    private function aboutHtml(string $trek, string $location): string
    {
        return '<p><strong>'.e($trek).'</strong> at <strong>'.e($location).'</strong> offers students and professionals a full-day adventure combining fitness, teamwork, and heritage exploration.</p>'
            .'<p>Our experienced leaders manage pace, safety briefings, and checkpoints so participants of varying fitness levels can complete the trek comfortably.</p>'
            .'<p>Ideal for annual outings, adventure clubs, NCC batches, and corporate team-building programs. See the home page for things to carry and trek guidelines.</p>';
    }

    private function trekItineraryJson(string $trek, string $location): string
    {
        $rows = [
            [
                'day_label' => 'One day trek',
                'title' => 'Typical schedule',
                'body' => '<ul>'
                    .'<li><strong>Early morning:</strong> Assembly at designated pickup point and travel to base village.</li>'
                    .'<li><strong>Morning:</strong> Safety briefing and start of trek to <strong>'.e($trek).'</strong> ('.e($location).').</li>'
                    .'<li><strong>Mid-day:</strong> Summit / fort exploration, rest, and packed lunch at a suitable spot.</li>'
                    .'<li><strong>Afternoon:</strong> Descent with breaks at marked checkpoints.</li>'
                    .'<li><strong>Evening:</strong> Return travel to pickup point.</li>'
                    .'</ul>'
                    .'<p><em>Timings vary by trek difficulty, season, and group size.</em></p>',
            ],
        ];

        return json_encode($rows, JSON_UNESCAPED_UNICODE);
    }

    private function attractionsHtml(string $trek, string $location): string
    {
        return '<p>Highlights of <strong>'.e($trek).'</strong> ('.e($location).'):</p><ul>'
            .'<li>Panoramic views and photo opportunities from the trail and summit</li>'
            .'<li>Heritage fort structures, caves, or plateaus (where applicable)</li>'
            .'<li>Team bonding, leadership, and confidence-building outdoors</li>'
            .'<li>Guided experience with trek leaders familiar with the route</li>'
            .'</ul>';
    }

    /**
     * @param  array<string, int>  $tiers
     */
    private function offersHtml(array $tiers): string
    {
        $html = '<p><strong>Category:</strong> '.e(self::CATEGORY_NAME).'</p>'
            .'<h3>Student / group pricing (per person)</h3>'
            .'<div class="table-responsive"><table class="table table-bordered align-middle">'
            .'<thead><tr><th scope="col">Class / Group</th><th scope="col">Price (₹)</th></tr></thead><tbody>';

        foreach ($tiers as $label => $amount) {
            $html .= '<tr><td>'.e($label).'</td><td><strong>₹'.number_format($amount).'</strong></td></tr>';
        }

        $html .= '</tbody></table></div>'
            .'<p class="mb-0"><em>Rates per participant for organized groups. Corporate batches — contact us for a custom quote. Transport, meals, and insurance may be quoted separately.</em></p>';

        return $html;
    }

    private function faqJson(): string
    {
        return json_encode([
            [
                'question' => 'Who can join these treks?',
                'answer' => '<p>Programs are designed for <strong>school (8th–10th)</strong>, <strong>college</strong>, and <strong>corporate</strong> groups. Fitness and age suitability depend on the specific trek — we advise before booking.</p>',
            ],
            [
                'question' => 'What should we carry?',
                'answer' => '<p>See the <strong>Things to carry</strong> and <strong>Trek guidelines</strong> sections on our home page — torch, water, proper shoes, and full-sleeve clothing are essential.</p>',
            ],
            [
                'question' => 'Is a trek leader provided?',
                'answer' => '<p>Yes. Experienced trek leaders guide the group, manage pace, and coordinate safety throughout the day.</p>',
            ],
        ], JSON_UNESCAPED_UNICODE);
    }
}
