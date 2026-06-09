<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tour_id')->nullable()->constrained()->nullOnDelete();
            $table->string('status')->default('pending');
            $table->decimal('amount', 10, 2)->default(0);
            $table->date('travel_date')->nullable();
            $table->unsignedSmallInteger('travelers')->default(1);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
