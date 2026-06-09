<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TourController extends Controller
{
    /** @var list<string> */
    private const CATEGORY_ORDER = [
        'educational-one-day-outing',
        'educational-field-visit',
        'agri-tourism',
        'one-day-trek',
        'one-night-camping',
    ];

    public function index(Request $request): View
    {
        return $this->listing($request->get('category'));
    }

    public function category(string $category): View
    {
        return $this->listing($category);
    }

    public function show(string $slug): View
    {
        $tour = Tour::query()
            ->with(['destination', 'category'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedTours = Tour::query()
            ->with(['destination', 'category'])
            ->where('is_active', true)
            ->where('id', '!=', $tour->id)
            ->when(
                $tour->category_id,
                fn ($query) => $query->where('category_id', $tour->category_id)
            )
            ->orderByDesc('is_featured')
            ->orderBy('title')
            ->limit(4)
            ->get();

        return view('tours.show', compact('tour', 'relatedTours'));
    }

    private function listing(?string $categorySlug): View
    {
        $categories = $this->tourCategories();

        $categoryPage = null;
        if (filled($categorySlug)) {
            $categoryPage = Category::query()
                ->where('type', 'tour')
                ->where('slug', $categorySlug)
                ->whereHas('tours', fn ($q) => $q->where('is_active', true))
                ->firstOrFail();
        }

        $tours = Tour::query()
            ->with(['destination', 'category'])
            ->where('is_active', true)
            ->when($categoryPage, fn ($query) => $query->where('category_id', $categoryPage->id))
            ->orderByDesc('is_featured')
            ->orderBy('title')
            ->get();

        $view = $categoryPage ? 'tours.category' : 'tours.index';

        return view($view, [
            'tours' => $tours,
            'categories' => $categories,
            'activeCategory' => $categoryPage?->slug,
            'categoryPage' => $categoryPage,
            'pageTitle' => $categoryPage?->name ?? 'Tours',
            'categoryIntro' => $categoryPage ? $this->categoryIntro($categoryPage->slug) : null,
            'categoryMeta' => $categoryPage ? $this->categoryPageMeta($categoryPage->slug, $tours) : null,
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection<int, Category>
     */
    private function tourCategories()
    {
        $categories = Category::query()
            ->where('type', 'tour')
            ->whereHas('tours', fn ($q) => $q->where('is_active', true))
            ->withCount(['tours' => fn ($q) => $q->where('is_active', true)])
            ->get();

        return $categories->sortBy(function (Category $category) {
            $index = array_search($category->slug, self::CATEGORY_ORDER, true);

            return $index === false ? 999 : $index;
        })->values();
    }

    private function categoryIntro(string $slug): ?string
    {
        return $this->categoryPageMeta($slug, collect())['intro'] ?? null;
    }

    /**
     * @param  \Illuminate\Support\Collection<int, Tour>|\Illuminate\Database\Eloquent\Collection<int, Tour>  $tours
     * @return array<string, mixed>
     */
    private function categoryPageMeta(string $slug, $tours): array
    {
        $defaults = [
            'eyebrow' => 'School & college programs',
            'intro' => 'Programs for schools and colleges across Maharashtra.',
            'duration' => 'Varies',
            'ideal_for' => 'School & college groups',
            'highlights' => [
                'Coordinated transport and on-ground support',
                'Pickup from Pune & Mumbai only',
                'Class-wise pricing on each program page',
            ],
        ];

        $meta = match ($slug) {
            'educational-one-day-outing' => [
                'eyebrow' => 'One-day school & college outings',
                'intro' => 'Theme parks, water parks, adventure resorts, and fun-learning destinations — full-day programs with transport, entry coordination, and teacher-friendly scheduling.',
                'duration' => '1 day',
                'ideal_for' => 'Std. 1–12, junior college & corporate fun days',
                'highlights' => [
                    'Imagica, water parks, resorts & adventure parks',
                    'Return same day — ideal for annual school outings',
                    'Per-student pricing by class group on each tour',
                    'Pickup & drop from Pune or Mumbai only',
                ],
            ],
            'educational-field-visit' => [
                'eyebrow' => 'Educational field visits',
                'intro' => 'Heritage walks, museums, metro rides, fire stations, and civic learning — curriculum-linked outings in and around Pune.',
                'duration' => '1 day',
                'ideal_for' => 'Primary to college batches',
                'highlights' => [
                    'Museums, forts, and heritage sites',
                    'Civic & safety awareness visits',
                    'Guided learning with teacher coordination',
                    'Pickup from Pune or Mumbai only',
                ],
            ],
            'agri-tourism' => [
                'eyebrow' => 'Agri-tourism for students',
                'intro' => 'Farm visits and rural experiences where students learn agriculture, sustainability, and village life in a supervised setting.',
                'duration' => '1 day',
                'ideal_for' => 'School & college environment clubs',
                'highlights' => [
                    'Hands-on farm and nature activities',
                    'Rural culture & sustainability focus',
                    'Safe zones with group leaders',
                    'Pickup from Pune or Mumbai only',
                ],
            ],
            'one-day-trek' => [
                'eyebrow' => 'One-day treks',
                'intro' => 'Fort treks and valley hikes for standards 8th through college — led by experienced trek leaders with safety briefings.',
                'duration' => '1 day',
                'ideal_for' => 'Std. 8+ and college adventure clubs',
                'highlights' => [
                    'Fort & hill treks across Maharashtra',
                    'Trained trek leaders on every batch',
                    'Fitness, teamwork & outdoor learning',
                    'Pickup from Pune or Mumbai only',
                ],
            ],
            'one-night-camping' => [
                'eyebrow' => 'One-night camps',
                'intro' => 'Beach camps, lake camping, and fort stays — overnight programs designed for college batches and corporate teams.',
                'duration' => '1 night / 2 days',
                'ideal_for' => 'College, corporate & senior school groups',
                'highlights' => [
                    'Beach, lake & fort camping options',
                    'Evening programs & group activities',
                    'Meals and stay coordination included in packages',
                    'Pickup from Pune or Mumbai only',
                ],
            ],
            default => $defaults,
        };

        return array_merge($defaults, $meta, [
            'program_count' => $tours->count(),
            'featured_count' => $tours->where('is_featured', true)->count(),
        ]);
    }
}
