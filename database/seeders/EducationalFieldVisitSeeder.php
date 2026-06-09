<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Destination;
use App\Models\Tour;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Educational field visits — heritage, museums, civic sites (Pune region).
 *
 * php artisan db:seed --class=EducationalFieldVisitSeeder
 */
class EducationalFieldVisitSeeder extends Seeder
{
    private const CATEGORY_SLUG = 'educational-field-visit';

    private const CATEGORY_NAME = 'Educational Field Visit';

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
                'description' => '<p>All group departures start from <strong>Pune</strong> and <strong>Mumbai</strong>. Field visits and day trips across Maharashtra.</p>',
                'is_featured' => true,
                'is_active' => true,
            ]
        );

        $tours = [
            [
                'title' => 'Shaniwar Wada & Lal Mahal',
                'location' => 'Pune',
                'excerpt' => 'Heritage walk through Pune’s iconic forts and palaces — ideal for history and civics learning.',
                'tiers' => [
                    '1st to 4th' => 800,
                    '5th to 10th' => 850,
                ],
                'featured' => true,
            ],
            [
                'title' => 'Metro Station Visit',
                'location' => 'Pune',
                'excerpt' => 'Guided visit to understand metro operations, safety, and urban transport systems.',
                'tiers' => [
                    'Pre-primary' => 700,
                    '1st to 10th' => 750,
                ],
                'featured' => false,
            ],
            [
                'title' => 'Metro Station & Fire Station',
                'location' => 'Pune',
                'excerpt' => 'Combined civic learning — metro infrastructure and fire safety awareness in one field trip.',
                'tiers' => [
                    'Pre-primary' => 900,
                    '1st to 10th' => 1000,
                ],
                'featured' => true,
            ],
            [
                'title' => 'Shiv Sushuti Historical Theme Park',
                'location' => 'Pune region',
                'excerpt' => 'Historical theme park experience connecting students with regional heritage and stories.',
                'tiers' => [
                    '1st to 4th' => 900,
                    '5th to 10th' => 1000,
                    'College' => 1200,
                ],
                'featured' => true,
            ],
            [
                'title' => 'Zapurza Museum',
                'location' => 'Pune',
                'excerpt' => 'Museum visit for art, culture, and curated exhibits suited to school groups.',
                'tiers' => [
                    'Pre-primary' => 850,
                    '1st to 10th' => 950,
                ],
                'featured' => false,
            ],
            [
                'title' => 'Fire Station Visit',
                'location' => 'Pune',
                'excerpt' => 'Fire safety awareness, equipment demonstration, and emergency preparedness for students.',
                'tiers' => [
                    'Pre-primary' => 700,
                    '1st to 10th' => 750,
                ],
                'featured' => false,
            ],
            [
                'title' => 'Memorial War & Aga Khan Palace',
                'location' => 'Pune',
                'excerpt' => 'Patriotic and freedom-movement history at war memorial and Aga Khan Palace.',
                'tiers' => [
                    'Pre-primary' => 800,
                    '1st to 10th' => 850,
                ],
                'featured' => false,
            ],
            [
                'title' => 'Aga Khan Palace & Deccan Museum',
                'location' => 'Pune',
                'excerpt' => 'Heritage palace visit combined with Deccan Museum for a full-day educational program.',
                'tiers' => [
                    '1st to 4th' => 800,
                    '5th to 10th' => 850,
                ],
                'featured' => true,
            ],
        ];

        $created = 0;
        $updated = 0;

        foreach ($tours as $row) {
            $slug = Str::slug($row['title']);
            $title = $row['title'];
            $location = $row['location'];

            $payload = [
                'category_id' => $category->id,
                'destination_id' => $destination->id,
                'title' => $title,
                'excerpt' => $row['excerpt'],
                'description' => $this->descriptionHtml($title, $location, $row['excerpt']),
                'about' => $this->aboutHtml($title, $location),
                'itinerary' => $this->fieldVisitItineraryJson($title, $location),
                'attractions' => $this->attractionsHtml($title, $location),
                'offers' => $this->offersHtml($row['tiers']),
                'faq' => $this->faqJson(),
                'price' => $this->minimumPrice($row['tiers']),
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

        $this->command?->info("Educational field visits: {$created} created, {$updated} updated (category: {$category->name}).");
    }

    /**
     * @param  array<string, int>  $tiers
     */
    private function minimumPrice(array $tiers): float
    {
        return $tiers === [] ? 0 : (float) min($tiers);
    }

    private function descriptionHtml(string $title, string $location, string $excerpt): string
    {
        return '<p class="lead">'.e($excerpt).'</p>'
            .'<p><strong>'.e($title).'</strong> ('.e($location).') is offered as an <strong>educational field visit</strong> for schools and colleges through Backpackers and Movers — Educational Tours and Travels.</p>'
            .'<p>Includes coordinated group movement, site entry where applicable, and teacher-friendly scheduling. Final inclusions are confirmed in your quotation.</p>';
    }

    private function aboutHtml(string $title, string $location): string
    {
        return '<p>This <strong>field visit</strong> is designed for <strong>school and college batches</strong> at <strong>'.e($title).'</strong>, '.e($location).'.</p>'
            .'<p>Students learn through guided observation, storytelling, and interactive sessions aligned with history, civics, science, or cultural studies — depending on the site.</p>'
            .'<p>Our coordinators manage timings, headcounts, and on-ground discipline so faculty can focus on learning outcomes.</p>';
    }

    private function fieldVisitItineraryJson(string $title, string $location): string
    {
        $rows = [
            [
                'day_label' => 'Field visit (one day)',
                'title' => 'Program flow',
                'body' => '<ul>'
                    .'<li><strong>Morning:</strong> School assembly and travel to <strong>'.e($title).'</strong>.</li>'
                    .'<li><strong>On site:</strong> Guided tour, learning activity, or demonstration as per venue ('.e($location).').</li>'
                    .'<li><strong>Mid-day:</strong> Short break / lunch (packed or arranged as per package).</li>'
                    .'<li><strong>Afternoon:</strong> Continue visit or second site if included in your program.</li>'
                    .'<li><strong>Evening:</strong> Return to school.</li>'
                    .'</ul>',
            ],
        ];

        return json_encode($rows, JSON_UNESCAPED_UNICODE);
    }

    private function attractionsHtml(string $title, string $location): string
    {
        return '<p>Learning highlights at <strong>'.e($title).'</strong> ('.e($location).'):</p><ul>'
            .'<li>Curriculum-linked exposure to history, heritage, science, or civic life</li>'
            .'<li>Guided interaction suitable for pre-primary through college batches</li>'
            .'<li>Safe, supervised movement in groups with teacher support</li>'
            .'<li>Opportunity for worksheets, reflection, and group discussion after the visit</li>'
            .'</ul>';
    }

    /**
     * @param  array<string, int>  $tiers
     */
    private function offersHtml(array $tiers): string
    {
        $html = '<p><strong>Category:</strong> '.e(self::CATEGORY_NAME).'</p>';

        $html .= '<h3>Student group pricing (per student)</h3>'
            .'<div class="table-responsive"><table class="table table-bordered align-middle">'
            .'<thead><tr><th scope="col">Class / Group</th><th scope="col">Price (₹)</th></tr></thead><tbody>';

        foreach ($tiers as $label => $amount) {
            $html .= '<tr><td>'.e($label).'</td><td><strong>₹'.number_format($amount).'</strong></td></tr>';
        }

        $html .= '</tbody></table></div>'
            .'<p class="mb-0"><em>Rates are per student for organized school/college groups. Transport, meals, GST, and entry fees may apply as per final proposal.</em></p>';

        return $html;
    }

    private function faqJson(): string
    {
        return json_encode([
            [
                'question' => 'How do we book a field visit?',
                'answer' => '<p>Contact us with your preferred site, date, student count, and class range. We share a quotation covering transport, entry, and coordination.</p>',
            ],
            [
                'question' => 'Can we combine two sites in one day?',
                'answer' => '<p>Yes, where timing and distance allow — for example metro and fire station programs. Ask for a combined itinerary quote.</p>',
            ],
            [
                'question' => 'Are guides included?',
                'answer' => '<p>Site guides or our coordinators are included as per the final package shared with your institution.</p>',
            ],
        ], JSON_UNESCAPED_UNICODE);
    }
}
