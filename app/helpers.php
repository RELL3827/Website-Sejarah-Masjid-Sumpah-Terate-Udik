<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (! function_exists('setting')) {
    function setting(string $key, ?string $default = null): ?string
    {
        return Cache::remember("setting.{$key}", 3600, function () use ($key, $default) {
            return Setting::get($key, $default);
        });
    }
}

if (! function_exists('format_date')) {
    function format_date(?string $date, string $format = 'd F Y'): string
    {
        if (! $date) {
            return '-';
        }

        return \Carbon\Carbon::parse($date)->translatedFormat($format);
    }
}

if (! function_exists('image_url')) {
    function image_url(?string $path, string $fallback = 'images/masjid/placeholder.jpg'): string
    {
        if (! $path) {
            return asset($fallback);
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (str_starts_with($path, 'images/')) {
            return asset($path);
        }

        return asset('storage/' . $path);
    }
}