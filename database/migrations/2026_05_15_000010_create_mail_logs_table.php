<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mail_logs', function (Blueprint $table) {
            $table->id();
            $table->string('to_email');
            $table->string('subject');
            $table->text('body')->nullable();
            $table->string('status')->default('sent');
            $table->text('error_message')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mail_logs');
    }
};
