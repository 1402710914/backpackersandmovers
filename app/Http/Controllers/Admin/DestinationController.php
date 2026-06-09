<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DestinationController extends Controller
{
    public function index(): View
    {
        $destinations = Destination::query()
            ->excludingDemo()
            ->withCount(['tours' => fn ($q) => $q->where('is_active', true)])
            ->orderByDesc('id')
            ->paginate(20);

        return view('admin.destinations.index', compact('destinations'));
    }

    public function create(): View
    {
        return view('admin.destinations.form', ['destination' => new Destination]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('destinations', 'public');
        }
        Destination::create($data);

        return redirect()->route('admin.destinations.index')->with('status', 'Destination created.');
    }

    public function edit(Destination $destination): View
    {
        return view('admin.destinations.form', compact('destination'));
    }

    public function update(Request $request, Destination $destination): RedirectResponse
    {
        $data = $this->validateData($request, $destination->id);
        if ($request->hasFile('featured_image')) {
            if ($destination->featured_image) {
                Storage::disk('public')->delete($destination->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('destinations', 'public');
        }
        $destination->update($data);

        return redirect()->route('admin.destinations.index')->with('status', 'Destination updated.');
    }

    public function destroy(Destination $destination): RedirectResponse
    {
        if ($destination->featured_image) {
            Storage::disk('public')->delete($destination->featured_image);
        }
        $destination->delete();

        return redirect()->route('admin.destinations.index')->with('status', 'Destination deleted.');
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:120'],
            'excerpt' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'is_featured' => ['sometimes', 'boolean'],
            'is_active' => ['sometimes', 'boolean'],
            'featured_image' => ['nullable', 'image', 'max:4096'],
        ]);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active', true);
        $base = $data['slug'] ?: $data['name'];
        $slug = Str::slug($base);
        $q = Destination::where('slug', $slug);
        if ($id) {
            $q->where('id', '!=', $id);
        }
        while ($q->exists()) {
            $slug .= '-'.Str::lower(Str::random(2));
            $q = Destination::where('slug', $slug);
            if ($id) {
                $q->where('id', '!=', $id);
            }
        }
        $data['slug'] = $slug;
        unset($data['featured_image']);

        return $data;
    }
}
