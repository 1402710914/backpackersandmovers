<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $statsTours = Tour::query()->where('is_active', true)->count();
        $featuredTourCategories = Category::orderedTourNavCategories();

        return view('pages.home', [
            'featuredTourCategories' => $featuredTourCategories,
            'statsCategories' => max($featuredTourCategories->count(), 1),
            'featuredTours' => Tour::query()
                ->with('destination')
                ->where('is_active', true)
                ->orderByDesc('is_featured')
                ->orderByDesc('id')
                ->take(8)
                ->get(),
            'latestPosts' => BlogPost::query()
                ->with('category')
                ->published()
                ->orderByDesc('published_at')
                ->take(4)
                ->get(),
            'statsTours' => max($statsTours, 1),
        ]);
    }

    public function about(): View
    {
        return view('pages.generated._about');
    }

    public function gallery(): View
    {
        return view('pages.generated._gallery');
    }

    public function faq(): View
    {
        return view('pages.generated._faq');
    }

    public function policy(): View
    {
        return view('pages.policy');
    }
}
