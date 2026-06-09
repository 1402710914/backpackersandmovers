<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator as ValidatorInstance;
use Illuminate\View\View;

class BlogPostController extends Controller
{
    public function index(): View
    {
        $posts = BlogPost::query()->orderByDesc('id')->paginate(20);

        return view('admin.blog_posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.blog_posts.form', ['post' => new BlogPost]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }
        BlogPost::create($data);

        return redirect()->route('admin.blog-posts.index')->with('status', 'Article created.');
    }

    public function edit(BlogPost $blog_post): View
    {
        return view('admin.blog_posts.form', ['post' => $blog_post]);
    }

    public function update(Request $request, BlogPost $blog_post): RedirectResponse
    {
        $data = $this->validateData($request, $blog_post->id);
        if ($request->hasFile('featured_image')) {
            if ($blog_post->featured_image) {
                Storage::disk('public')->delete($blog_post->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }
        $blog_post->update($data);

        return redirect()->route('admin.blog-posts.index')->with('status', 'Article updated.');
    }

    public function destroy(BlogPost $blog_post): RedirectResponse
    {
        $blog_post->delete();

        return redirect()->route('admin.blog-posts.index')->with('status', 'Article deleted.');
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        $validator = Validator::make($request->all(), [
            'category_id' => ['nullable', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'is_published' => ['sometimes', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'featured_image' => ['nullable', 'image', 'max:4096'],
        ]);

        $validator->after(function (ValidatorInstance $v) use ($request): void {
            $excerpt = (string) $request->input('excerpt', '');
            if ($excerpt !== '' && str_word_count(strip_tags($excerpt)) > 500) {
                $v->errors()->add('excerpt', 'Excerpt (description) may not exceed 500 words.');
            }
        });

        $data = $validator->validate();
        $data['is_published'] = $request->boolean('is_published', true);
        if (empty($data['published_at']) && ($data['is_published'] ?? false)) {
            $data['published_at'] = now();
        }
        $base = $data['slug'] ?: $data['title'];
        $slug = Str::slug($base);
        $q = BlogPost::where('slug', $slug);
        if ($id) {
            $q->where('id', '!=', $id);
        }
        while ($q->exists()) {
            $slug .= '-'.Str::lower(Str::random(2));
            $q = BlogPost::where('slug', $slug);
            if ($id) {
                $q->where('id', '!=', $id);
            }
        }
        $data['slug'] = $slug;
        unset($data['featured_image']);

        return $data;
    }
}
