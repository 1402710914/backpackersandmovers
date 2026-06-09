<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Destination;
use App\Models\Tour;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Educational one-day school/college outings — Backpackers and Movers.
 *
 * php artisan db:seed --class=EducationalOneDayOutingSeeder
 */
class EducationalOneDayOutingSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::query()->firstOrCreate(
            ['slug' => 'educational-one-day-outing'],
            [
                'name' => 'Educational One Day Outing',
                'type' => 'tour',
            ]
        );

        $destination = Destination::query()->firstOrCreate(
            ['slug' => 'pune-mumbai'],
            [
                'name' => 'Pune & Mumbai',
                'country' => 'India',
                'excerpt' => 'School and college tour programs with pickup from Pune and Mumbai only.',
                'description' => '<p>All group departures start from <strong>Pune</strong> and <strong>Mumbai</strong>. Day trips for schools and colleges across Maharashtra.</p>',
                'is_featured' => true,
                'is_active' => true,
            ]
        );

        $tours = [
            [
                'title' => "Adlabs Imagica Theme Park",
                'location' => 'Khopoli',
                'excerpt' => 'Full-day theme park outing with rides and entertainment for school and college groups.',
                'tiers' => [
                    '5th to 10th' => 1800,
                    '11th to 12th' => 2000,
                    'College' => 2200,
                ],
                'featured' => true,
            ],
            [
                'title' => "Adlabs Imagica Water Park",
                'location' => 'Khopoli',
                'excerpt' => 'Water park day outing with slides and pools — ideal for senior school and college batches.',
                'tiers' => [
                    '5th to 10th' => 1900,
                    '11th to 12th' => 2000,
                    'College' => 2200,
                ],
                'featured' => true,
            ],
            [
                'title' => 'Krushnai Water World',
                'location' => 'Maharashtra',
                'excerpt' => 'Water park experience for student groups — contact us for current group rates and availability.',
                'tiers' => [],
                'featured' => false,
            ],
            [
                'title' => 'Indoor Amusement Games',
                'location' => 'Singhad',
                'excerpt' => 'Indoor games and amusement activities — perfect for younger batches and monsoon season outings.',
                'tiers' => [],
                'featured' => false,
            ],
            [
                'title' => 'Wet N Joy Theme & Water Park',
                'location' => 'Kamshet, Lonavala',
                'excerpt' => 'Combined theme and water park fun near Lonavala for educational one-day trips.',
                'tiers' => [
                    '4th to 10th' => 1800,
                    '11th to 12th' => 2000,
                    'College' => 2200,
                ],
                'featured' => true,
            ],
            [
                'title' => 'On Wheels Amusement Park',
                'location' => 'Panchgani',
                'excerpt' => 'Amusement park outing in the Panchgani hill station region.',
                'tiers' => [
                    '1st to 4th' => 1400,
                    '5th to 10th' => 1500,
                    'College' => 1700,
                ],
                'featured' => false,
            ],
            [
                'title' => 'Mapro Garden',
                'location' => 'Panchgani',
                'excerpt' => 'Garden visit with strawberry treats and scenic Panchgani surroundings.',
                'tiers' => [
                    '1st to 4th' => 1100,
                    '5th to 10th' => 1200,
                    'College' => 1400,
                ],
                'featured' => false,
            ],
            [
                'title' => 'Monteria Village',
                'location' => 'Khalapur',
                'excerpt' => 'Village-style adventure and activity park experience for student groups.',
                'tiers' => [
                    '1st to 4th' => 1400,
                    '5th to 10th' => 1500,
                    'College' => 1700,
                ],
                'featured' => false,
            ],
            [
                'title' => 'Snow Park',
                'location' => 'Panchgani',
                'excerpt' => 'Snow play and winter-themed activities at Panchgani for an exciting school day out.',
                'tiers' => [
                    '1st to 4th' => 1750,
                    '5th to 10th' => 1800,
                    'College' => 2000,
                ],
                'featured' => true,
            ],
            [
                'title' => 'Meher Retreat',
                'location' => 'Yawat',
                'excerpt' => 'Resort day outing with games and open spaces suited for school picnics.',
                'tiers' => [
                    '1st to 4th' => 900,
                    '5th to 7th' => 950,
                    '8th to 10th' => 1100,
                    'College' => 1200,
                ],
                'featured' => false,
            ],
            [
                'title' => 'Mauli Resort',
                'location' => 'Kasarsai, Hinjewadi',
                'excerpt' => 'Resort picnic near Hinjewadi with activities for pre-primary to college groups.',
                'tiers' => [
                    'Pre-primary' => 900,
                    '1st to 4th' => 950,
                    '5th to 10th' => 1000,
                    'College' => 1300,
                ],
                'featured' => false,
            ],
            [
                'title' => 'Girivan The Hill Resorts',
                'location' => 'Paud',
                'excerpt' => 'Hill resort outing with nature, games, and team activities for students.',
                'tiers' => [
                    '1st to 4th' => 1100,
                    '5th to 7th' => 1200,
                    '8th to 10th' => 1300,
                    'College' => 1500,
                ],
                'featured' => false,
            ],
            [
                'title' => 'Diamond Water Park & Adventure Park',
                'location' => 'Wagholi',
                'excerpt' => 'Water and adventure park combination near Wagholi for action-packed student outings.',
                'tiers' => [
                    '1st to 4th' => 1200,
                    '5th to 7th' => 1250,
                    '8th to 10th' => 1300,
                    'College' => 1500,
                ],
                'featured' => false,
            ],
            [
                'title' => 'Lekha Farms — A Cultural Garden',
                'location' => 'Dehu Road',
                'excerpt' => 'Cultural garden and farm experience with rural activities and learning for all age groups.',
                'tiers' => [
                    'Pre-primary' => 800,
                    '1st to 4th' => 900,
                    '5th to 7th' => 1000,
                    '8th to 10th' => 1200,
                    'College' => 1300,
                ],
                'featured' => true,
            ],
        ];

        $created = 0;
        $updated = 0;

        foreach ($tours as $row) {
            $slug = Str::slug($row['title']);
            $minPrice = $this->minimumPrice($row['tiers']);
            $location = $row['location'];
            $title = $row['title'];

            $payload = [
                'category_id' => $category->id,
                'destination_id' => $destination->id,
                'title' => $title,
                'excerpt' => $row['excerpt'],
                'description' => $this->descriptionHtml($title, $location, $row['excerpt']),
                'about' => $this->aboutHtml($title, $location),
                'itinerary' => $this->oneDayItineraryJson($title, $location),
                'attractions' => $this->attractionsHtml($title, $location),
                'offers' => $this->offersHtml($row['tiers']),
                'faq' => $this->faqJson(),
                'price' => $minPrice,
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

        $this->command?->info("Educational outings: {$created} created, {$updated} updated (category: {$category->name}).");
    }

    /**
     * @param  array<string, int>  $tiers
     */
    private function minimumPrice(array $tiers): float
    {
        if ($tiers === []) {
            return 0;
        }

        return (float) min($tiers);
    }

    private function descriptionHtml(string $title, string $location, string $excerpt): string
    {
        return '<p class="lead">'.e($excerpt).'</p>'
            .'<p><strong>'.e($title).'</strong> ('.e($location).') is offered as an <strong>educational one-day outing</strong> for schools and colleges through Backpackers and Movers — Educational Tours and Travels.</p>'
            .'<p>Programs include coordinated transport, entry arrangements, on-ground support, and age-appropriate scheduling. Final inclusions are confirmed in your quotation.</p>';
    }

    private function aboutHtml(string $title, string $location): string
    {
        return '<p>This one-day program is designed for <strong>school and college groups</strong> visiting <strong>'.e($title).'</strong> at <strong>'.e($location).'</strong>.</p>'
            .'<p>Our team handles group coordination, safety briefings, and timing so teachers can focus on students. Outings support teamwork, confidence, and learning outside the classroom.</p>'
            .'<p>Contact us to customize pickup points, meal plans, and batch sizes for your institution.</p>';
    }

    private function oneDayItineraryJson(string $title, string $location): string
    {
        $rows = [
            [
                'day_label' => 'One day outing',
                'title' => 'Typical program flow',
                'body' => '<ul>'
                    .'<li><strong>Morning:</strong> Group assembly at school and departure by private coach.</li>'
                    .'<li><strong>Mid-day:</strong> Arrival at <strong>'.e($title).'</strong> ('.e($location).') — activities, rides, or guided sessions as per venue.</li>'
                    .'<li><strong>Afternoon:</strong> Lunch break (packed or arranged — as per your package).</li>'
                    .'<li><strong>Evening:</strong> Departure from venue and return to school.</li>'
                    .'</ul>'
                    .'<p><em>Exact timings depend on distance, batch size, and venue rules.</em></p>',
            ],
        ];

        return json_encode($rows, JSON_UNESCAPED_UNICODE);
    }

    private function attractionsHtml(string $title, string $location): string
    {
        return '<p>Highlights of <strong>'.e($title).'</strong> ('.e($location).'):</p><ul>'
            .'<li>Full-day access to venue activities suited for student groups</li>'
            .'<li>Supervised free time and group movement with teacher coordination</li>'
            .'<li>Photo stops and memory-making for annual outings</li>'
            .'<li>Optional add-ons available on request (meals, guides, extra activities)</li>'
            .'</ul>';
    }

    /**
     * @param  array<string, int>  $tiers
     */
    private function offersHtml(array $tiers): string
    {
        $html = '<p><strong>Category:</strong> Educational One Day Outing</p>';

        if ($tiers === []) {
            return $html
                .'<p>Group pricing is shared on enquiry based on batch size, date, and inclusions. '
                .'<a href="'.e(route('contact')).'">Contact us</a> for a customized quotation for your school or college.</p>';
        }

        $html .= '<h3>Student group pricing (per student)</h3>'
            .'<div class="table-responsive"><table class="table table-bordered align-middle">'
            .'<thead><tr><th scope="col">Class / Group</th><th scope="col">Price (₹)</th></tr></thead><tbody>';

        foreach ($tiers as $label => $amount) {
            $html .= '<tr><td>'.e($label).'</td><td><strong>₹'.number_format($amount).'</strong></td></tr>';
        }

        $html .= '</tbody></table></div>'
            .'<p class="mb-0"><em>Rates are per student for organized school/college groups. Transport, meals, GST, and venue surcharges may apply as per final proposal. Prices subject to change by venue policy.</em></p>';

        return $html;
    }

    private function faqJson(): string
    {
        return json_encode([
            [
                'question' => 'How do we book for our school?',
                'answer' => '<p>Share your preferred date, number of students, class range, and pickup location via our contact page or phone. We send a formal quotation and confirm once approved.</p>',
            ],
            [
                'question' => 'What is included in the per-student price?',
                'answer' => '<p>Typically venue entry and our coordination fee. Transport, meals, and insurance are quoted separately unless mentioned in your voucher.</p>',
            ],
            [
                'question' => 'What is the minimum group size?',
                'answer' => '<p>Most venues require a minimum batch size. Contact us with your expected headcount — we advise the best option for smaller or combined groups.</p>',
            ],
            [
                'question' => 'Is a teacher complimentary?',
                'answer' => '<p>Complimentary teacher passes depend on the venue ratio. We confirm this in writing before you confirm the trip.</p>',
            ],
        ], JSON_UNESCAPED_UNICODE);
    }
}
