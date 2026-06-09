<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(Request $request): View
    {
        $type = $request->query('type');

        $categories = Category::query()
            ->when($type, fn ($q) => $q->where('type', $type))
            ->withCount(['tours' => fn ($q) => $q->where('is_active', true)])
            ->orderBy('type')
            ->orderBy('name')
            ->paginate(25)
            ->withQueryString();

        return view('admin.categories.index', compact('categories', 'type'));
    }

    public function create(): View
    {
        return view('admin.categories.form', ['category' => new Category]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        Category::create($data);

        return redirect()->route('admin.categories.index')->with('status', 'Category created.');
    }

    public function edit(Category $category): View
    {
        return view('admin.categories.form', compact('category'));
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $data = $this->validateData($request, $category->id);
        $category->update($data);

        return redirect()->route('admin.categories.index')->with('status', 'Category updated.');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('status', 'Category deleted.');
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:50'],
        ]);
        $base = $data['slug'] ?: $data['name'];
        $slug = Str::slug($base);
        $q = Category::where('slug', $slug);
        if ($id) {
            $q->where('id', '!=', $id);
        }
        while ($q->exists()) {
            $slug .= '-'.Str::lower(Str::random(2));
            $q = Category::where('slug', $slug);
            if ($id) {
                $q->where('id', '!=', $id);
            }
        }
        $data['slug'] = $slug;

        return $data;
    }
}
