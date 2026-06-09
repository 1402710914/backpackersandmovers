<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('destinations')
            ->where('slug', 'pune-maharashtra')
            ->update([
                'name' => 'Pune & Mumbai',
                'slug' => 'pune-mumbai',
                'excerpt' => 'School and college tour programs with pickup from Pune and Mumbai only.',
                'description' => '<p>All group departures for Backpackers and Movers tours start from <strong>Pune</strong> and <strong>Mumbai</strong>. Programs cover forts, camps, field visits, and outings across Maharashtra.</p>',
            ]);
    }

    public function down(): void
    {
        DB::table('destinations')
            ->where('slug', 'pune-mumbai')
            ->update([
                'name' => 'Pune & Maharashtra',
                'slug' => 'pune-maharashtra',
                'excerpt' => 'One-day educational outings, theme parks, and adventure destinations near Pune and Maharashtra.',
                'description' => '<p>Day trips for schools and colleges across Pune, Lonavala, Panchgani, Khopoli, and surrounding regions.</p>',
            ]);
    }
};
