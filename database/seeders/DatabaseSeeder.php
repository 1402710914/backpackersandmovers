<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'traveler@example.com'],
            [
                'name' => 'Demo Traveler',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]
        );

        BlogPost::query()->whereIn('slug', [
            'pack-light-two-weeks',
            'travel-insurance-checklist',
            'family-destinations-season',
            'avoid-jet-lag',
            'hidden-gems-southern-europe',
            'street-food-safety',
        ])->delete();

        Category::query()
            ->where('type', 'blog')
            ->whereIn('slug', ['travel-news', 'travel-tips'])
            ->whereDoesntHave('blogPosts')
            ->delete();

        $catBlog = Category::firstOrCreate(
            ['slug' => 'school-outings', 'type' => 'blog'],
            ['name' => 'School Outings']
        );
        $catTips = Category::firstOrCreate(
            ['slug' => 'trek-tips', 'type' => 'blog'],
            ['name' => 'Trek & Camp Tips']
        );

        $posts = [
            [$catBlog->id, 'Planning a safe one-day school outing in Maharashtra', 'plan-safe-school-outing-maharashtra', 'Checklists for teachers before booking transport and venues.', 'Confirm pickup from Pune or Mumbai, share student lists, and brief parents on dress code and meals.'],
            [$catTips->id, 'What to pack for a school trek', 'school-trek-packing-list', 'Essentials for fort treks and day hikes with student groups.', 'Sturdy shoes, water bottles, rain layer, cap, and a small dry bag for phones.'],
            [$catBlog->id, 'Field visits that support classroom learning', 'educational-field-visits-learning', 'Museums, heritage sites, and civic visits near Pune.', 'Pair each stop with a short worksheet so students engage beyond sightseeing.'],
            [$catTips->id, 'Agri-tourism: learning outside the classroom', 'agri-tourism-students', 'Farm visits that teach sustainability and rural life.', 'Hands-on activities work best with smaller batches and clear safety zones.'],
            [$catBlog->id, 'One-night camps for college batches', 'college-overnight-camp-guide', 'Beach camps, lake stays, and fort camping programs.', 'Evening programs, bonfire rules, and separate coordination for boys and girls blocks.'],
            [$catTips->id, 'Pickup points: Pune & Mumbai only', 'pickup-pune-mumbai', 'How we organize departures for school groups.', 'All Backpackers and Movers tours start from these two cities — share your preferred pickup when you enquire.'],
        ];

        $i = 1;
        foreach ($posts as $p) {
            $body = '<p class="lead">'.$p[4].'</p>'
                .'<p>We have road-tested these recommendations with hundreds of travelers over multiple seasons. Use this as a starting framework, then adapt to your pace, budget, and the exact month you travel — weather and crowds can shift quickly.</p>'
                .'<h3>Before you go</h3><ul>'
                    .'<li>Double-check visa rules and passport validity (often six months beyond return).</li>'
                    .'<li>Screenshot offline maps and save hotel addresses in the local language.</li>'
                    .'<li>Split cards and cash across two secure locations.</li>'
                .'</ul>'
                .'<h3>On the ground</h3><p>Blend a few must-book experiences with open-ended blocks for wandering. Some of the best travel stories start when you leave margin in the schedule.</p>'
                .'<p>We update this advice as regulations and seasons change — always confirm visa and health rules before departure.</p>';

            BlogPost::updateOrCreate(
                ['slug' => $p[2]],
                [
                    'category_id' => $p[0],
                    'title' => $p[1],
                    'excerpt' => $p[3],
                    'body' => $body,
                    'is_published' => true,
                    'published_at' => now()->subDays($i++),
                ]
            );
        }

        $team = [
            ['Emma Williams', 'emma-williams', 'Senior Tour Guide', '<p>Emma has led small groups across <strong>Southeast Asia</strong> for over eight years and specializes in sustainable travel and community-based tourism.</p><p>She speaks English and Indonesian and holds a certificate in wilderness first aid.</p>', 'emma@example.com', 1],
            ['James Anderson', 'james-anderson', 'Travel Specialist', '<p>James designs custom <strong>European rail</strong> itineraries and honeymoon packages with an eye for boutique hotels and regional cuisine.</p><p>Former concierge in London — now full-time with our planning desk.</p>', 'james@example.com', 2],
            ['Sophia Martinez', 'sophia-martinez', 'Cultural Guide', '<p>Historian and storyteller focused on <strong>Iberia and Latin America</strong>. Sophia leads museum-heavy city tours at a conversational pace.</p>', 'sophia@example.com', 3],
            ['Ava Thompson', 'ava-thompson', 'Holiday Planner', '<p>Builds multi-destination trips for <strong>families and corporate retreats</strong>, including ground transport and age-appropriate activities.</p>', 'ava@example.com', 4],
            ['Lucas Kim', 'lucas-kim', 'Asia Operations', '<p>On-ground logistics for <strong>Japan, Korea, and Vietnam</strong> departures — vendor contracts, train passes, and last-minute fixes.</p>', 'lucas@example.com', 5],
        ];

        foreach ($team as $m) {
            TeamMember::updateOrCreate(
                ['slug' => $m[1]],
                [
                    'name' => $m[0],
                    'role' => $m[2],
                    'bio' => $m[3],
                    'email' => $m[4],
                    'sort_order' => $m[5],
                    'is_active' => true,
                ]
            );
        }

        $this->command?->info('Base data seeded (users, blog, team). Seeding school tour programs…');

        $this->call([
            CleanupDemoTourCategoriesSeeder::class,
            CleanupDemoDestinationsSeeder::class,
            EducationalOneDayOutingSeeder::class,
            EducationalFieldVisitSeeder::class,
            AgriTourismSeeder::class,
            OneDayTrekSeeder::class,
            OneNightCampingSeeder::class,
        ]);

        $db = config('database.connections.'.config('database.default').'.database');
        $this->command?->info("All seeders finished. Database: {$db}");
        $this->command?->info('Admin login: admin@admin.com / password');
    }

    /**
     * @return array{about: string, itinerary: string, attractions: string, offers: string, faq: string}
     */
    protected function tourDummySections(string $title, string $destination, string $country, int $days): array
    {
        $countryBit = $country !== '' ? ", {$country}" : '';

        $about = '<p><strong>'.e($title).'</strong> is designed for travelers who want to explore <strong>'.e($destination).$countryBit.'</strong> with expert pacing, trusted local partners, and room for your own discoveries.</p>'
            .'<p>You will stay in carefully chosen properties, enjoy included experiences that explain the story of the region, and have clear free time options marked each day. Our team monitors flights and local conditions so you are never left guessing.</p>'
            .'<p><em>Travel style:</em> Small-friendly groups, bilingual guides where available, and an emphasis on respectful tourism.</p>';

        if ($title === 'Paris Highlights Long Weekend') {
            $itinerary = $this->parisHighlightsItineraryJson();
        } else {
            $itinerary = $this->defaultItineraryJson($destination, (int) $days);
        }

        $attractions = '<p>Highlights typically include:</p><ul>'
            .'<li>Iconic viewpoints and photo spots curated by your guide</li>'
            .'<li>UNESCO or heritage districts with <strong>skip-the-line</strong> entry where we can reserve ahead</li>'
            .'<li>Local market or artisan quarter for authentic souvenirs</li>'
            .'<li>One signature food experience (tasting menu, street-food crawl, or cooking demo)</li>'
            .'</ul>'
            .'<p>Exact sequence may shift with weather, closures, or local holidays — we substitute with equivalents of equal value.</p>';

        $offers = '<ul>'
            .'<li><strong>Included:</strong> Accommodations as listed, daily breakfast where noted, sightseeing per itinerary, English-speaking guide on group days, all taxes on included services.</li>'
            .'<li><strong>Early-bird:</strong> Book 90+ days out and receive a <strong>5% loyalty credit</strong> toward a future trip (terms apply).</li>'
            .'<li><strong>Honeymoon / anniversary:</strong> Complimentary room upgrade subject to availability + sparking welcome.</li>'
            .'<li><strong>Private option:</strong> Same route available as a private departure — ask for a quote.</li>'
            .'</ul>';

        $faq = json_encode([
            [
                'question' => 'What should I pack?',
                'answer' => '<p>Layers, comfortable walking shoes, a light rain shell, and any personal medication. A detailed packing note is emailed two weeks before departure.</p>',
            ],
            [
                'question' => 'Are flights included?',
                'answer' => '<p>International flights are <strong>not</strong> included unless your voucher explicitly says so. We can recommend airlines and typical connection cities.</p>',
            ],
            [
                'question' => 'Can I change dates?',
                'answer' => '<p>Yes, subject to availability and fare rules. Fees may apply depending on how close you are to the start date.</p>',
            ],
            [
                'question' => 'Is travel insurance required?',
                'answer' => '<p>We strongly recommend comprehensive coverage including medical and trip interruption — proof may be requested for adventure add-ons.</p>',
            ],
        ], JSON_UNESCAPED_UNICODE);

        return [
            'about' => $about,
            'itinerary' => $itinerary,
            'attractions' => $attractions,
            'offers' => $offers,
            'faq' => $faq,
        ];
    }

    private function parisHighlightsItineraryJson(): string
    {
        $rows = [
            [
                'day_label' => 'Day 1 | 15th May 2026',
                'title' => 'Delhi to Chopta',
                'body' => '<ul>'
                    .'<li>The group assembles at <strong>Akshardham Metro Station</strong> at <strong>09:00 PM.</strong></li>'
                    .'<li>Introduction session by the Trip Captain.</li>'
                    .'<li>Start your Journey towards Chopta</li>'
                    .'</ul>'
                    .'<p><strong><em>Note: The pickup point is Akshardham Metro Station.</em></strong></p>',
            ],
            [
                'day_label' => 'Day 2 | 16th May 2026',
                'title' => 'Chopta Arrival | Leisure Day',
                'body' => '<ul>'
                    .'<li>Witness the stunning confluence of the Ganga River, taking in breathtaking views at <strong>Devprayag</strong> and <strong>Rudraprayag.</strong></li>'
                    .'<li>Check-in at <strong>Chopta campsites.</strong></li>'
                    .'<li>Leisure day with group bonding activities.</li>'
                    .'<li>Evening dinner and overnight stay in camps.</li>'
                    .'</ul>',
            ],
            [
                'day_label' => 'Day 3 | 17th May 2026',
                'title' => 'Trek to Tungnath Chandrashila (4 Kilometers, 4 Hours)',
                'body' => '<ul>'
                    .'<li>Early morning trek from Chopta to Chandrashila summit.</li>'
                    .'<li>Traverse through <strong>Tungnath</strong>, the <strong>Highest Shiva Temple</strong> globally.</li>'
                    .'<li>Packed lunch en route.</li>'
                    .'<li><strong>Chandrashila</strong> tops at <strong>12,110 ft</strong> with views of Nandadevi, Trisul, Kedar Peak, Bandarpunch, and Chaukhamba peaks.</li>'
                    .'<li>Return to Chopta, dinner, and overnight stay.</li>'
                    .'</ul>',
            ],
        ];

        return json_encode($rows, JSON_UNESCAPED_UNICODE);
    }

    private function defaultItineraryJson(string $destination, int $days): string
    {
        $days = max(1, $days);
        $rows = [];
        for ($d = 1; $d <= $days; $d++) {
            if ($d === 1) {
                $rows[] = [
                    'day_label' => 'Day '.$d.' | Arrival',
                    'title' => 'Welcome to '.$destination,
                    'body' => '<ul><li>Meet-and-greet and transfer to your stay.</li><li>Evening briefing or time at leisure.</li></ul>',
                ];
            } elseif ($d === $days) {
                $rows[] = [
                    'day_label' => 'Day '.$d.' | Departure',
                    'title' => 'Farewell',
                    'body' => '<ul><li>Breakfast and checkout.</li><li>Transfer to airport or station.</li></ul>',
                ];
            } else {
                $rows[] = [
                    'day_label' => 'Day '.$d.' | '.$destination,
                    'title' => 'Explore & discover',
                    'body' => '<ul><li>Guided highlights with photo stops.</li><li>Flexible afternoon — café, sights, or rest.</li></ul>',
                ];
            }
        }

        return json_encode($rows, JSON_UNESCAPED_UNICODE);
    }
}
