<?php

namespace App\Support;

/**
 * Rewrites &lt;img src&gt; URLs in HTML fragments for the current app base (storage paths, subfolders).
 */
final class HtmlImageUrls
{
    public static function fixImgSrcsInHtml(?string $html): string
    {
        $html = (string) $html;
        if ($html === '') {
            return '';
        }

        return (string) preg_replace_callback(
            '/<img\b([^>]*)\bsrc\s*=\s*([\'"])([^\'"]*)\2([^>]*)>/is',
            fn (array $m) => '<img'.$m[1].' src='.$m[2].self::normalizePublicUrl($m[3]).$m[2].$m[4].'>',
            $html
        );
    }

    public static function normalizePublicUrl(string $src): string
    {
        $src = trim(html_entity_decode($src, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
        if ($src === '') {
            return '';
        }

        $src = preg_replace('/[?#].*$/u', '', $src) ?? $src;
        $src = str_replace('\\', '/', $src);

        if (preg_match('#^https?://#i', $src)) {
            if (($relative = self::extractAppPublicPath($src)) !== null) {
                return url($relative);
            }

            return $src;
        }

        if (($storagePath = self::extractPublicStoragePath($src)) !== null) {
            return url($storagePath);
        }

        if (($assetPath = self::extractThemeAssetPath($src)) !== null) {
            return url($assetPath);
        }

        if (str_starts_with($src, '/')) {
            return url($src);
        }

        return url('/'.ltrim($src, '/'));
    }

    /**
     * Pull /assets/... or /storage/... from any absolute URL (e.g. old localhost links in HTML).
     */
    private static function extractAppPublicPath(string $src): ?string
    {
        if (($storagePath = self::extractPublicStoragePath($src)) !== null) {
            return $storagePath;
        }

        return self::extractThemeAssetPath($src);
    }

    private static function extractThemeAssetPath(string $src): ?string
    {
        $s = str_replace('\\', '/', $src);
        if (preg_match('#/(?:public/)?(assets/.+)$#i', $s, $m)) {
            return '/'.$m[1];
        }

        if (preg_match('#^assets/.+$#i', $s)) {
            return '/'.$s;
        }

        if (str_starts_with($s, '/assets/')) {
            return $s;
        }

        return null;
    }

    /**
     * Pull "/storage/..." from full URLs or subdirectory paths (e.g. /new-travel/public/storage/...).
     */
    private static function extractPublicStoragePath(string $src): ?string
    {
        $s = str_replace('\\', '/', $src);
        if (preg_match('#(/storage/.+)$#i', $s, $m)) {
            return self::stripPublicPrefixFromStoragePath($m[1]);
        }
        if (preg_match('#^storage/(.+)$#i', $s, $m)) {
            return '/storage/'.$m[1];
        }

        return null;
    }

    private static function stripPublicPrefixFromStoragePath(string $path): string
    {
        if (str_starts_with($path, '/public/storage/')) {
            return '/storage/'.substr($path, strlen('/public/storage/'));
        }

        return $path;
    }
}
