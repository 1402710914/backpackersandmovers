<?php

namespace App\Services;

use App\Models\Tour;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class CartService
{
    private const SESSION_KEY = 'cart';

    /**
     * @return array<string, array{tour_id: int, travelers: int, travel_date: string}>
     */
    public function items(): array
    {
        $items = session(self::SESSION_KEY, []);

        return is_array($items) ? $items : [];
    }

    public function count(): int
    {
        return count($this->items());
    }

    /**
     * @return Collection<int, array{key: string, tour: Tour, travelers: int, travel_date: string, line_total: float}>
     */
    public function hydratedItems(): Collection
    {
        $items = $this->items();
        if ($items === []) {
            return collect();
        }

        $tourIds = array_values(array_unique(array_map(
            static fn (array $item): int => (int) ($item['tour_id'] ?? 0),
            $items
        )));

        $tours = Tour::query()
            ->whereIn('id', $tourIds)
            ->where('is_active', true)
            ->get()
            ->keyBy('id');

        return collect($items)
            ->map(function (array $item, string $key) use ($tours) {
                $tourId = (int) ($item['tour_id'] ?? 0);
                $tour = $tours->get($tourId);
                if ($tour === null) {
                    return null;
                }

                $travelers = max(1, (int) ($item['travelers'] ?? 1));

                return [
                    'key' => $key,
                    'tour' => $tour,
                    'travelers' => $travelers,
                    'travel_date' => (string) ($item['travel_date'] ?? ''),
                    'line_total' => (float) $tour->price * $travelers,
                ];
            })
            ->filter()
            ->values();
    }

    public function subtotal(): float
    {
        return (float) $this->hydratedItems()->sum('line_total');
    }

    public function add(int $tourId, int $travelers, string $travelDate): string
    {
        $items = $this->items();
        $key = (string) Str::uuid();

        $items[$key] = [
            'tour_id' => $tourId,
            'travelers' => max(1, $travelers),
            'travel_date' => $travelDate,
        ];

        session([self::SESSION_KEY => $items]);

        return $key;
    }

    public function update(string $key, int $travelers, string $travelDate): bool
    {
        $items = $this->items();
        if (! isset($items[$key])) {
            return false;
        }

        $items[$key]['travelers'] = max(1, $travelers);
        $items[$key]['travel_date'] = $travelDate;

        session([self::SESSION_KEY => $items]);

        return true;
    }

    public function remove(string $key): bool
    {
        $items = $this->items();
        if (! isset($items[$key])) {
            return false;
        }

        unset($items[$key]);
        session([self::SESSION_KEY => $items]);

        return true;
    }

    public function clear(): void
    {
        session()->forget(self::SESSION_KEY);
    }

    public function pruneInactiveTours(): void
    {
        $items = $this->items();
        if ($items === []) {
            return;
        }

        $activeIds = Tour::query()
            ->whereIn('id', array_column($items, 'tour_id'))
            ->where('is_active', true)
            ->pluck('id')
            ->all();

        $activeLookup = array_fill_keys($activeIds, true);
        $changed = false;

        foreach ($items as $key => $item) {
            if (! isset($activeLookup[(int) ($item['tour_id'] ?? 0)])) {
                unset($items[$key]);
                $changed = true;
            }
        }

        if ($changed) {
            session([self::SESSION_KEY => $items]);
        }
    }
}
