<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class SetupTravelPointDatabase extends Command
{
    protected $signature = 'db:setup-travel
                            {--fresh : Drop all tables and re-run migrations}
                            {--seed-only : Run seeders only (skip migrate)}';

    protected $description = 'Migrate and seed the travel_point_new MySQL database with all site data';

    public function handle(): int
    {
        $database = (string) config('database.connections.'.config('database.default').'.database');

        if ($database !== 'travel_point_new') {
            $this->warn("Current DB_DATABASE is \"{$database}\", not \"travel_point_new\".");
            if (! $this->confirm('Continue anyway?', false)) {
                $this->info('Set DB_DATABASE=travel_point_new in .env and run again.');

                return self::FAILURE;
            }
        }

        try {
            DB::connection()->getPdo();
            $this->info("Connected to MySQL database: {$database}");
        } catch (\Throwable $e) {
            $this->error('Cannot connect to database: '.$e->getMessage());
            $this->line('Create the database in phpMyAdmin: CREATE DATABASE travel_point_new;');

            return self::FAILURE;
        }

        if (! $this->option('seed-only')) {
            if ($this->option('fresh')) {
                $this->warn('Running migrate:fresh (all tables will be dropped).');
                Artisan::call('migrate:fresh', [], $this->output);
            } else {
                Artisan::call('migrate', ['--force' => true], $this->output);
            }
        }

        Artisan::call('db:seed', ['--force' => true], $this->output);

        $this->newLine();
        $this->table(
            ['Table', 'Rows'],
            collect(['users', 'categories', 'destinations', 'tours', 'blog_posts', 'team_members'])
                ->map(fn (string $table) => [$table, DB::table($table)->count()])
                ->all()
        );

        $this->info('Setup complete. Site data is in '.$database.'.');

        return self::SUCCESS;
    }
}
