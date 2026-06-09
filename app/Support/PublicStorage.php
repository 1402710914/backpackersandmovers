<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;

/**
 * Builds correct public URLs for files on the "public" disk (and theme assets under /public).
 * Works with subdirectory installs, APP_URL, and when public/storage symlink is missing.
 */
final class PublicStorage
{
    /**
     * URL for a path on the public disk (DB value e.g. tours/abc.jpg or blog/editor/x.png).
     */
    public static function diskUrl(?string $path): ?string
    {
        if ($path === null || trim($path) === '') {
            return null;
        }

        $path = str_replace('\\', '/', trim($path));

        if (preg_match('#^https?://#i', $path)) {
            return HtmlImageUrls::normalizePublicUrl($path);
        }

        if (str_starts_with($path, '/storage/')) {
            return HtmlImageUrls::normalizePublicUrl($path);
        }

        if (str_starts_with($path, 'storage/')) {
            return HtmlImageUrls::normalizePublicUrl('/'.$path);
        }

        return HtmlImageUrls::normalizePublicUrl('/storage/'.$path);
    }

    /**
     * URL for a path relative to /public (e.g. storage/logo.png, assets/img/foo.jpg).
     */
    public static function publicAsset(?string $path): string
    {
        if ($path === null || trim($path) === '') {
            return '';
        }

        return HtmlImageUrls::normalizePublicUrl(trim($path));
    }

    public static function logoUrl(): string
    {
        $configured = trim((string) config('app.logo', 'storage/logo.png'));
        if ($configured === '') {
            $configured = 'storage/logo.png';
        }

        if (self::logoFileIsReachable($configured)) {
            return self::publicAsset($configured);
        }

        foreach (['storage/logo.png', 'assets/img/logo/black-logo.svg', 'assets/img/logo/white-logo.svg'] as $fallback) {
            if (self::logoFileIsReachable($fallback)) {
                return self::publicAsset($fallback);
            }
        }

        return self::publicAsset('assets/img/logo/black-logo.svg');
    }

    private static function logoFileIsReachable(string $publicPath): bool
    {
        $publicPath = str_replace('\\', '/', trim($publicPath));
        if ($publicPath === '') {
            return false;
        }

        if (preg_match('#^https?://#i', $publicPath)) {
            return true;
        }

        $relative = ltrim($publicPath, '/');
        if (str_starts_with($relative, 'storage/')) {
            $diskPath = substr($relative, strlen('storage/'));
            if (self::diskFileExists($diskPath)) {
                return true;
            }

            return is_file(public_path($relative));
        }

        if (str_starts_with($relative, 'assets/')) {
            return is_file(public_path($relative));
        }

        return is_file(public_path($relative));
    }

    public static function diskFileExists(?string $path): bool
    {
        if ($path === null || trim($path) === '') {
            return false;
        }

        $path = str_replace('\\', '/', trim($path));
        if (str_starts_with($path, 'storage/')) {
            $path = substr($path, strlen('storage/'));
        }
        $path = ltrim($path, '/');

        return Storage::disk('public')->exists($path);
    }
}
