<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class VerifyLiveAssetsCommand extends Command
{
    protected $signature = 'travel:verify-assets';

    protected $description = 'Check theme assets, storage uploads, and symlink before/after going live';

    public function handle(): int
    {
        $ok = true;

        $themeDir = public_path('assets');
        if (! File::isDirectory($themeDir)) {
            $this->error('Missing folder: public/assets (upload the whole assets folder to the server).');
            $ok = false;
        } else {
            $this->info('OK: public/assets exists.');
        }

        $hero = public_path('assets/img/home-1/hero/hero-bg.jpg');
        if (! File::isFile($hero)) {
            $this->error('Missing hero image: public/assets/img/home-1/hero/hero-bg.jpg');
            $ok = false;
        } else {
            $this->info('OK: hero background image found.');
        }

        $storageRoot = storage_path('app/public');
        if (! File::isDirectory($storageRoot)) {
            $this->warn('No uploads yet under storage/app/public.');
        } else {
            $uploadCount = count(File::allFiles($storageRoot));
            $this->info("OK: storage/app/public has {$uploadCount} uploaded file(s).");
        }

        $link = public_path('storage');
        if (is_link($link)) {
            $this->info('OK: public/storage symlink exists.');
        } elseif (File::isDirectory($link) && ! is_link($link)) {
            $this->warn('public/storage is a folder, not a symlink.');
            $this->warn('If uploads 404, delete this empty folder so /storage/... uses Laravel route.');
        } else {
            $this->info('OK: No symlink (Hostinger) — uploads served via /storage/... route.');
            $this->line('  Run: php artisan travel:storage-setup');
        }

        if (Route::has('storage.local')) {
            $this->error('storage.local route is active — uploads 404 until config/filesystems.php is fixed (upload from project).');
            $ok = false;
        } elseif (! Route::has('storage.public')) {
            $this->error('storage.public route missing — upload config/filesystems.php then php artisan config:clear');
            $ok = false;
        } else {
            $this->info('OK: storage.public route is registered.');
        }

        $appUrl = config('app.url');
        $this->line('');
        $this->line('APP_URL in .env: '.$appUrl);
        if (str_contains($appUrl, 'localhost')) {
            $this->error('APP_URL must be your live site URL (images will break until fixed).');
            $this->line('  Example: APP_URL=https://greenyellow-ram-707584.hostingersite.com');
            $this->line('  Then: php artisan config:clear');
            $ok = false;
        }

        $this->line('');
        $this->line('After deploy, also run:');
        $this->line('  php artisan config:clear && php artisan view:clear && php artisan route:clear');

        return $ok ? self::SUCCESS : self::FAILURE;
    }
}
