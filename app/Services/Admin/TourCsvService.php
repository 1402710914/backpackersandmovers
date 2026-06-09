<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Models\Destination;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TourCsvService
{
    /** @var list<string> */
    public const HEADERS = [
        'id',
        'category_slug',
        'destination_slug',
        'title',
        'slug',
        'excerpt',
        'description',
        'about',
        'itinerary',
        'attractions',
        'offers',
        'faq',
        'price',
        'duration_days',
        'group_size',
        'is_featured',
        'is_active',
    ];

    public function export(Builder $query): StreamedResponse
    {
        $filename = 'tours-export-'.now()->format('Y-m-d-His').'.csv';

        return response()->streamDownload(function () use ($query) {
            $handle = fopen('php://output', 'w');
            if ($handle === false) {
                return;
            }
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($handle, self::HEADERS);

            $query->with(['category', 'destination'])->orderBy('id')->chunk(100, function ($tours) use ($handle) {
                foreach ($tours as $tour) {
                    fputcsv($handle, $this->rowFromTour($tour));
                }
            });

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    /**
     * @return array{created: int, updated: int, skipped: int, errors: list<string>}
     */
    public function import(UploadedFile $file): array
    {
        $path = $file->getRealPath();
        if ($path === false) {
            return ['created' => 0, 'updated' => 0, 'skipped' => 0, 'errors' => ['Could not read uploaded file.']];
        }

        $handle = fopen($path, 'r');
        if ($handle === false) {
            return ['created' => 0, 'updated' => 0, 'skipped' => 0, 'errors' => ['Could not open CSV file.']];
        }

        $header = fgetcsv($handle);
        if ($header === false) {
            fclose($handle);

            return ['created' => 0, 'updated' => 0, 'skipped' => 0, 'errors' => ['CSV file is empty.']];
        }

        $header = $this->normalizeHeader($header);
        $missing = array_diff(['title', 'price', 'duration_days'], $header);
        if ($missing !== []) {
            fclose($handle);

            return ['created' => 0, 'updated' => 0, 'skipped' => 0, 'errors' => ['Missing required columns: '.implode(', ', $missing)]];
        }

        $created = 0;
        $updated = 0;
        $skipped = 0;
        $errors = [];
        $line = 1;

        while (($row = fgetcsv($handle)) !== false) {
            $line++;
            if ($this->rowIsEmpty($row)) {
                continue;
            }

            $data = $this->associativeRow($header, $row);
            try {
                $result = $this->importRow($data);
                if ($result === 'created') {
                    $created++;
                } elseif ($result === 'updated') {
                    $updated++;
                } else {
                    $skipped++;
                }
            } catch (\Throwable $e) {
                $errors[] = "Line {$line}: ".$e->getMessage();
            }
        }

        fclose($handle);

        return compact('created', 'updated', 'skipped', 'errors');
    }

    /**
     * @return list<string|int|float|null>
     */
    private function rowFromTour(Tour $tour): array
    {
        return [
            $tour->id,
            $tour->category?->slug ?? '',
            $tour->destination?->slug ?? '',
            $tour->title,
            $tour->slug,
            $tour->excerpt ?? '',
            $tour->description ?? '',
            $tour->about ?? '',
            $tour->getAttributes()['itinerary'] ?? '',
            $tour->attractions ?? '',
            $tour->offers ?? '',
            $tour->getAttributes()['faq'] ?? '',
            $tour->price,
            $tour->duration_days,
            $tour->group_size ?? '',
            $tour->is_featured ? 1 : 0,
            $tour->is_active ? 1 : 0,
        ];
    }

    /**
     * @param  list<string|null>  $header
     * @return list<string>
     */
    private function normalizeHeader(array $header): array
    {
        return array_map(function ($col) {
            $col = trim((string) $col);
            $col = preg_replace('/^\x{FEFF}/u', '', $col) ?? $col;

            return Str::snake(str_replace([' ', '-'], '_', strtolower($col)));
        }, $header);
    }

    /**
     * @param  list<string>  $header
     * @param  list<string|null>  $row
     * @return array<string, string>
     */
    private function associativeRow(array $header, array $row): array
    {
        $out = [];
        foreach ($header as $i => $key) {
            $out[$key] = trim((string) ($row[$i] ?? ''));
        }

        return $out;
    }

    /**
     * @param  list<string|null>  $row
     */
    private function rowIsEmpty(array $row): bool
    {
        foreach ($row as $cell) {
            if (trim((string) $cell) !== '') {
                return false;
            }
        }

        return true;
    }

    /**
     * @param  array<string, string>  $data
     */
    private function importRow(array $data): string
    {
        $title = $data['title'] ?? '';
        if ($title === '') {
            throw new \InvalidArgumentException('Title is required.');
        }

        $price = $data['price'] ?? '';
        if ($price === '' || ! is_numeric($price)) {
            throw new \InvalidArgumentException('Valid price is required.');
        }

        $duration = (int) ($data['duration_days'] ?? 1);
        if ($duration < 1) {
            $duration = 1;
        }

        $slug = $data['slug'] !== '' ? Str::slug($data['slug']) : Str::slug($title);
        $tour = null;
        if (($data['id'] ?? '') !== '' && is_numeric($data['id'])) {
            $tour = Tour::query()->find((int) $data['id']);
        }
        if (! $tour) {
            $tour = Tour::query()->where('slug', $slug)->first();
        }

        $categoryId = null;
        if (($data['category_slug'] ?? '') !== '') {
            $categoryId = Category::query()
                ->where('slug', $data['category_slug'])
                ->where('type', 'tour')
                ->value('id');
        }

        $destinationId = null;
        if (($data['destination_slug'] ?? '') !== '') {
            $destinationId = Destination::query()->where('slug', $data['destination_slug'])->value('id');
        }

        $payload = [
            'category_id' => $categoryId,
            'destination_id' => $destinationId,
            'title' => $title,
            'slug' => $this->uniqueSlug($slug, $tour?->id),
            'excerpt' => $data['excerpt'] ?? null,
            'description' => $data['description'] ?? null,
            'about' => $data['about'] ?? null,
            'itinerary' => ($data['itinerary'] ?? '') !== '' ? $data['itinerary'] : null,
            'attractions' => $data['attractions'] ?? null,
            'offers' => $data['offers'] ?? null,
            'faq' => ($data['faq'] ?? '') !== '' ? $data['faq'] : null,
            'price' => (float) $price,
            'duration_days' => $duration,
            'group_size' => ($data['group_size'] ?? '') !== '' ? (int) $data['group_size'] : null,
            'is_featured' => $this->boolValue($data['is_featured'] ?? '0'),
            'is_active' => $this->boolValue($data['is_active'] ?? '1', true),
        ];

        if ($tour) {
            $tour->update($payload);

            return 'updated';
        }

        Tour::query()->create($payload);

        return 'created';
    }

    private function uniqueSlug(string $slug, ?int $ignoreId = null): string
    {
        $base = $slug !== '' ? $slug : 'tour';
        $candidate = $base;
        $q = Tour::query()->where('slug', $candidate);
        if ($ignoreId) {
            $q->where('id', '!=', $ignoreId);
        }
        while ($q->exists()) {
            $candidate = $base.'-'.Str::lower(Str::random(4));
            $q = Tour::query()->where('slug', $candidate);
            if ($ignoreId) {
                $q->where('id', '!=', $ignoreId);
            }
        }

        return $candidate;
    }

    private function boolValue(string $value, bool $default = false): bool
    {
        $v = strtolower(trim($value));
        if ($v === '') {
            return $default;
        }

        return in_array($v, ['1', 'true', 'yes', 'y', 'on'], true);
    }
}
