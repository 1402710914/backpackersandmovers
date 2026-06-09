<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->longText('about')->nullable()->after('description');
            $table->longText('itinerary')->nullable()->after('about');
            $table->longText('attractions')->nullable()->after('itinerary');
            $table->longText('offers')->nullable()->after('attractions');
            $table->longText('faq')->nullable()->after('offers');
        });
    }

    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn(['about', 'itinerary', 'attractions', 'offers', 'faq']);
        });
    }
};
