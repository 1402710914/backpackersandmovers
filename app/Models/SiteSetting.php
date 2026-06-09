<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value'];

    public static function get(string $key, ?string $default = null): string
    {
        return Cache::rememberForever('site_setting.'.$key, function () use ($key, $default) {
            $value = static::query()->where('key', $key)->value('value');

            return $value !== null && $value !== '' ? $value : ($default ?? '');
        });
    }

    public static function set(string $key, ?string $value): void
    {
        static::query()->updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );

        Cache::forget('site_setting.'.$key);
    }

    /** @param  array<string, string|null>  $settings */
    public static function setMany(array $settings): void
    {
        foreach ($settings as $key => $value) {
            static::set($key, $value);
        }
    }
}
