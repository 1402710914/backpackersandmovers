<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->timestamp('declaration_accepted_at')->nullable()->after('notes');
            $table->string('declaration_pdf_path')->nullable()->after('declaration_accepted_at');
            $table->string('payment_status')->default('awaiting_payment')->after('declaration_pdf_path');
            $table->string('payment_utr')->nullable()->after('payment_status');
            $table->string('payment_proof_path')->nullable()->after('payment_utr');
            $table->text('payment_notes')->nullable()->after('payment_proof_path');
            $table->timestamp('payment_submitted_at')->nullable()->after('payment_notes');
            $table->timestamp('payment_verified_at')->nullable()->after('payment_submitted_at');
            $table->foreignId('payment_verified_by')->nullable()->after('payment_verified_at')->constrained('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropConstrainedForeignId('payment_verified_by');
            $table->dropColumn([
                'declaration_accepted_at',
                'declaration_pdf_path',
                'payment_status',
                'payment_utr',
                'payment_proof_path',
                'payment_notes',
                'payment_submitted_at',
                'payment_verified_at',
            ]);
        });
    }
};
