<?php

use App\Support\PublicStorage;

if (! function_exists('storage_url')) {
    function storage_url(?string $path): ?string
    {
        return PublicStorage::diskUrl($path);
    }
}

if (! function_exists('logo_url')) {
    function logo_url(): string
    {
        return PublicStorage::logoUrl();
    }
}

if (! function_exists('public_asset_url')) {
    function public_asset_url(?string $path): string
    {
        return PublicStorage::publicAsset($path);
    }
}

if (! function_exists('theme_asset')) {
    /** Theme images/CSS/JS under /public/assets (correct URL on live + subfolder installs). */
    function theme_asset(?string $path): string
    {
        return PublicStorage::publicAsset($path);
    }
}

if (! function_exists('tour_pickup_locations')) {
    /** @return list<string> */
    function tour_pickup_locations(): array
    {
        $locations = config('tours.pickup_locations', ['Pune', 'Mumbai']);

        return array_values(array_filter(array_map(
            static fn ($name) => trim((string) $name),
            is_array($locations) ? $locations : []
        )));
    }
}

if (! function_exists('tour_pickup_locations_label')) {
    function tour_pickup_locations_label(string $separator = ' & '): string
    {
        $locations = tour_pickup_locations();

        return $locations !== [] ? implode($separator, $locations) : 'Pune & Mumbai';
    }
}

if (! function_exists('site_setting')) {
    function site_setting(string $key, ?string $default = null): string
    {
        return \App\Models\SiteSetting::get($key, $default);
    }
}

if (! function_exists('site_setting_bool')) {
    function site_setting_bool(string $key, bool $default = false): bool
    {
        $value = strtolower(site_setting($key, $default ? '1' : '0'));

        return in_array($value, ['1', 'true', 'yes', 'on'], true);
    }
}
