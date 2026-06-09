<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use App\Services\Admin\TourCsvService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TourController extends Controller
{
    public function __construct(
        private readonly TourCsvService $tourCsv
    ) {}

    public function index(Request $request): View
    {
        $tours = $this->filteredToursQuery($request)
            ->orderByDesc('id')
            ->get();

        $categories = Category::orderedTourNavCategories();

        return view('admin.tours.index', [
            'tours' => $tours,
            'categories' => $categories,
        ]);
    }

    public function export(Request $request): StreamedResponse
    {
        return $this->tourCsv->export($this->filteredToursQuery($request));
    }

    public function import(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:csv,txt', 'max:10240'],
        ]);

        $result = $this->tourCsv->import($request->file('file'));

        $message = "Import complete: {$result['created']} created, {$result['updated']} updated.";
        if ($result['skipped'] > 0) {
            $message .= " {$result['skipped']} skipped.";
        }
        if ($result['errors'] !== []) {
            $message .= ' Errors: '.implode(' | ', array_slice($result['errors'], 0, 5));
            if (count($result['errors']) > 5) {
                $message .= ' …';
            }

            return redirect()->route('admin.tours.index')->with('warning', $message);
        }

        return redirect()->route('admin.tours.index')->with('status', $message);
    }

    public function create(): View
    {
        return view('admin.tours.form', ['tour' => new Tour]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request, null, null);
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('tours', 'public');
        }
        Tour::create($data);

        return redirect()->route('admin.tours.index')->with('status', 'Tour created.');
    }

    public function edit(Tour $tour): View
    {
        return view('admin.tours.form', compact('tour'));
    }

    public function update(Request $request, Tour $tour): RedirectResponse
    {
        $data = $this->validateData($request, $tour->id, $tour);
        $newGallery = $data['gallery_images'] ?? null;
        $newGalleryArr = is_array($newGallery) ? $newGallery : [];
        $this->deleteRemovedGalleryFiles($tour, $newGalleryArr);

        if ($request->boolean('remove_featured_image')) {
            if ($tour->featured_image) {
                Storage::disk('public')->delete($tour->featured_image);
            }
            $data['featured_image'] = null;
        } elseif ($request->hasFile('featured_image')) {
            if ($tour->featured_image) {
                Storage::disk('public')->delete($tour->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('tours', 'public');
        }

        $tour->update($data);

        return redirect()->route('admin.tours.index')->with('status', 'Tour updated.');
    }

    public function destroy(Tour $tour): RedirectResponse
    {
        if ($tour->featured_image) {
            Storage::disk('public')->delete($tour->featured_image);
        }
        foreach ($tour->galleryImagePaths() as $path) {
            Storage::disk('public')->delete($path);
        }
        $tour->delete();

        return redirect()->route('admin.tours.index')->with('status', 'Tour deleted.');
    }

    private function filteredToursQuery(Request $request): Builder
    {
        $query = Tour::query()->with(['destination', 'category']);

        if ($request->filled('search')) {
            $term = '%'.$request->string('search')->trim()->toString().'%';
            $query->where(function (Builder $q) use ($term) {
                $q->where('title', 'like', $term)
                    ->orWhere('slug', 'like', $term)
                    ->orWhere('excerpt', 'like', $term)
                    ->orWhereHas('category', fn (Builder $c) => $c->where('name', 'like', $term))
                    ->orWhereHas('destination', fn (Builder $d) => $d->where('name', 'like', $term));
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->integer('category_id'));
        }

        if ($request->filled('status')) {
            if ($request->get('status') === 'active') {
                $query->where('is_active', true);
            } elseif ($request->get('status') === 'inactive') {
                $query->where('is_active', false);
            }
        }

        return $query;
    }

    private function validateData(Request $request, ?int $id = null, ?Tour $existingTour = null): array
    {
        $data = $request->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
            'destination_id' => ['nullable', 'exists:destinations,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'about' => ['nullable', 'string'],
            'itinerary_days' => ['nullable', 'array'],
            'itinerary_days.*.day_label' => ['nullable', 'string', 'max:500'],
            'itinerary_days.*.title' => ['nullable', 'string', 'max:500'],
            'itinerary_days.*.body' => ['nullable', 'string', 'max:100000'],
            'attractions' => ['nullable', 'string'],
            'offers' => ['nullable', 'string'],
            'faq' => ['nullable', 'array'],
            'faq.*.question' => ['nullable', 'string', 'max:2000'],
            'faq.*.answer' => ['nullable', 'string', 'max:50000'],
            'price' => ['required', 'numeric', 'min:0'],
            'duration_days' => ['required', 'integer', 'min:1', 'max:365'],
            'group_size' => ['nullable', 'integer', 'min:1', 'max:500'],
            'is_featured' => ['sometimes', 'boolean'],
            'is_active' => ['sometimes', 'boolean'],
            'featured_image' => ['nullable', 'image', 'max:4096'],
            'gallery_keep' => ['nullable', 'array'],
            'gallery_keep.*' => ['string', 'max:500'],
            'gallery_new' => ['nullable', 'array'],
            'gallery_new.*' => ['image', 'max:4096'],
        ]);
        $faqInput = $data['faq'] ?? [];
        unset($data['faq']);
        $itineraryInput = $data['itinerary_days'] ?? [];
        unset($data['itinerary_days']);
        unset($data['gallery_keep'], $data['gallery_new']);
        $faqClean = [];
        foreach (is_array($faqInput) ? $faqInput : [] as $row) {
            if (! is_array($row)) {
                continue;
            }
            $q = trim((string) ($row['question'] ?? ''));
            $a = trim((string) ($row['answer'] ?? ''));
            if ($q === '' && $a === '') {
                continue;
            }
            $faqClean[] = ['question' => $q, 'answer' => $a];
        }
        $data['faq'] = $faqClean !== [] ? json_encode($faqClean, JSON_UNESCAPED_UNICODE) : null;

        $itineraryClean = [];
        foreach (is_array($itineraryInput) ? $itineraryInput : [] as $row) {
            if (! is_array($row)) {
                continue;
            }
            $dayLabel = trim((string) ($row['day_label'] ?? ''));
            $title = trim((string) ($row['title'] ?? ''));
            $body = trim((string) ($row['body'] ?? ''));
            if ($dayLabel === '' && $title === '' && $body === '') {
                continue;
            }
            $itineraryClean[] = ['day_label' => $dayLabel, 'title' => $title, 'body' => $body];
        }
        $data['itinerary'] = $itineraryClean !== [] ? json_encode($itineraryClean, JSON_UNESCAPED_UNICODE) : null;

        $keepInput = $request->input('gallery_keep', []);
        if (! is_array($keepInput)) {
            $keepInput = [];
        }
        $galleryPaths = $this->mergeGalleryPaths($request, $keepInput, $existingTour);
        $data['gallery_images'] = $galleryPaths !== [] ? $galleryPaths : null;

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active', true);
        $base = $data['slug'] ?: $data['title'];
        $slug = Str::slug($base);
        $q = Tour::where('slug', $slug);
        if ($id) {
            $q->where('id', '!=', $id);
        }
        while ($q->exists()) {
            $slug .= '-'.Str::lower(Str::random(2));
            $q = Tour::where('slug', $slug);
            if ($id) {
                $q->where('id', '!=', $id);
            }
        }
        $data['slug'] = $slug;
        unset($data['featured_image']);

        return $data;
    }

    /**
     * @param  list<string>  $keepInput
     * @return list<string>
     */
    private function mergeGalleryPaths(Request $request, array $keepInput, ?Tour $existingTour): array
    {
        $paths = [];
        if ($existingTour) {
            $allowed = array_flip($existingTour->galleryImagePaths());
            foreach ($keepInput as $p) {
                $p = is_string($p) ? trim($p) : '';
                if ($p === '' || str_contains($p, '..') || ! str_starts_with($p, 'tours/')) {
                    continue;
                }
                if (! isset($allowed[$p])) {
                    continue;
                }
                $paths[] = $p;
            }
        }
        $paths = array_values(array_unique($paths));

        if ($request->hasFile('gallery_new')) {
            foreach ((array) $request->file('gallery_new') as $file) {
                if ($file && $file->isValid()) {
                    $paths[] = $file->store('tours', 'public');
                }
            }
        }

        return $paths;
    }

    /**
     * @param  list<string>  $newPaths
     */
    private function deleteRemovedGalleryFiles(Tour $tour, array $newPaths): void
    {
        foreach (array_diff($tour->galleryImagePaths(), $newPaths) as $removed) {
            Storage::disk('public')->delete($removed);
        }
    }
}
