<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class StorageSetupCommand extends Command
{
    protected $signature = 'travel:storage-setup';

    protected $description = 'Storage setup for shared hosting (Hostinger) when php artisan storage:link fails';

    public function handle(): int
    {
        $target = storage_path('app/public');
        $link = public_path('storage');

        $this->line('Checking storage setup for shared hosting…');
        $this->line('');

        if (! File::isDirectory($target)) {
            $this->error('Missing: storage/app/public — create it and upload your images there.');

            return self::FAILURE;
        }

        $canSymlink = function_exists('symlink');
        $canExec = function_exists('exec') && ! in_array('exec', array_map('trim', explode(',', (string) ini_get('disable_functions'))), true);

        if ($canSymlink) {
            if (is_link($link)) {
                $this->info('OK: public/storage symlink already exists.');
            } else {
                if (File::exists($link)) {
                    $this->warn('public/storage exists but is not a symlink — remove it first if you want a symlink.');
                } else {
                    try {
                        symlink($target, $link);
                        $this->info('OK: Created public/storage symlink.');
                    } catch (\Throwable $e) {
                        $this->warn('Symlink failed: '.$e->getMessage());
                        $canSymlink = false;
                    }
                }
            }
        }

        if (! $canSymlink) {
            $this->warn('symlink() is disabled on this server (normal on Hostinger).');
            $this->warn('php artisan storage:link will fail — you can ignore that.');
            $this->line('');

            if (Route::has('storage.public')) {
                $this->info('OK: Laravel route serves uploads at /storage/... (no symlink required).');
            } else {
                $this->error('Missing route storage.public — upload config/filesystems.php (public disk serve => true, local => false).');
            }

            if (Route::has('storage.local')) {
                $this->error('Wrong storage route: storage.local is active (serves private disk). Fix config/filesystems.php on the server.');
            }

            if (File::isDirectory($link) && ! is_link($link)) {
                $this->line('');
                $this->warn('Tip: Delete the public/storage folder if it is empty.');
                $this->warn('An empty folder can block /storage/... from reaching Laravel.');
            }
        }

        $sample = collect(File::allFiles($target))->first();
        if ($sample) {
            $relative = str_replace('\\', '/', $sample->getRelativePathname());
            $appUrl = rtrim((string) config('app.url'), '/');
            $this->line('');
            $this->line('Test in browser after fixing APP_URL:');
            $this->line("  {$appUrl}/storage/{$relative}");
        }

        $this->line('');
        if (str_contains((string) config('app.url'), 'localhost')) {
            $this->warn('Fix .env on the server:');
            $this->warn('  APP_URL=https://greenyellow-ram-707584.hostingersite.com');
            $this->warn('Then: php artisan config:clear');
        }

        return self::SUCCESS;
    }
}
