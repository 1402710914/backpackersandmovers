<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        DB::table('site_settings')->insertOrIgnore([
            'key' => 'home_tour_programs_section_enabled',
            'value' => '0',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    public function down(): void
    {
        DB::table('site_settings')->where('key', 'home_tour_programs_section_enabled')->delete();
    }
};
