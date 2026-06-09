<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DestinationController extends Controller
{
    public function index(): RedirectResponse
    {
        return redirect()->route('tours.index');
    }

    public function show(string $slug): View|RedirectResponse
    {
        if (in_array($slug, Destination::DEMO_SLUGS, true)) {
            abort(404);
        }

        $category = Category::query()
            ->where('type', 'tour')
            ->where('slug', $slug)
            ->whereHas('tours', fn ($q) => $q->where('is_active', true))
            ->first();

        if ($category) {
            return redirect()->route('tours.category', $category->slug);
        }

        $destination = Destination::query()
            ->excludingDemo()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->whereHas('tours', fn ($q) => $q->where('is_active', true))
            ->first();

        if ($destination) {
            return redirect()->route('tours.index');
        }

        abort(404);
    }
}
