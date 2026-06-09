<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $viewerIsAdmin = $this->viewerIsAdmin();

        $posts = BlogPost::query()
            ->with('category')
            ->when(! $viewerIsAdmin, fn ($q) => $q->published())
            ->when($request->filled('q'), function ($query) use ($request) {
                $term = '%'.$request->get('q').'%';
                $query->where(function ($sub) use ($term) {
                    $sub->where('title', 'like', $term)
                        ->orWhere('excerpt', 'like', $term)
                        ->orWhere('body', 'like', $term);
                });
            })
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->whereHas('category', fn ($q) => $q->where('slug', $request->get('category')));
            })
            ->when($viewerIsAdmin, fn ($q) => $q->orderByDesc('is_published')->orderByDesc('updated_at'))
            ->when(! $viewerIsAdmin, fn ($q) => $q->orderByDesc('published_at'))
            ->paginate(9)
            ->withQueryString();

        return view('blog.index', compact('posts', 'viewerIsAdmin'));
    }

    public function show(string $slug): View
    {
        $viewerIsAdmin = $this->viewerIsAdmin();

        $post = BlogPost::query()
            ->with('category')
            ->where('slug', $slug)
            ->when(! $viewerIsAdmin, fn ($q) => $q->published())
            ->firstOrFail();

        $sidebarCategories = Category::query()
            ->where('type', 'blog')
            ->withCount([
                'blogPosts as posts_count' => fn ($q) => $q->published(),
            ])
            ->orderBy('name')
            ->get();

        $recentPosts = BlogPost::query()
            ->published()
            ->whereKeyNot($post->getKey())
            ->orderByDesc('published_at')
            ->limit(4)
            ->get();

        return view('blog.show', compact('post', 'sidebarCategories', 'recentPosts', 'viewerIsAdmin'));
    }

    private function viewerIsAdmin(): bool
    {
        return auth()->check() && (bool) auth()->user()->is_admin;
    }
}
