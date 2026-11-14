<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('exams', function (Blueprint $table): void {
            if (! Schema::hasColumn('exams', 'is_simulation')) {
                $table->boolean('is_simulation')->default(false)->after('max_attempts');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exams', function (Blueprint $table): void {
            if (Schema::hasColumn('exams', 'is_simulation')) {
                $table->dropColumn('is_simulation');
            }
        });
    }
};

