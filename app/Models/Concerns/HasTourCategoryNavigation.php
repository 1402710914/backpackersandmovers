<?php

namespace App\Models\Concerns;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

trait HasTourCategoryNavigation
{
    /** @return list<string> */
    public static function tourCategoryNavOrder(): array
    {
        return [
            'educational-one-day-outing',
            'educational-field-visit',
            'agri-tourism',
            'one-day-trek',
            'one-night-camping',
        ];
    }

    /** @return Collection<int, Category> */
    public static function orderedTourNavCategories(): Collection
    {
        $order = static::tourCategoryNavOrder();

        return Category::query()
            ->where('type', 'tour')
            ->withCount(['tours' => fn ($q) => $q->where('is_active', true)])
            ->whereHas('tours', fn ($q) => $q->where('is_active', true))
            ->get()
            ->sortBy(function (Category $category) use ($order) {
                $index = array_search($category->slug, $order, true);

                return $index === false ? 999 : $index;
            })
            ->values();
    }
}
