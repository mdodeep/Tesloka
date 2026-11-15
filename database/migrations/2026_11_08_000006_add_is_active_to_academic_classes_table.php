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
        Schema::table('academic_classes', function (Blueprint $table): void {
            if (! Schema::hasColumn('academic_classes', 'is_active')) {
                $table->boolean('is_active')->default(true)->index()->after('capacity');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('academic_classes', function (Blueprint $table): void {
            if (Schema::hasColumn('academic_classes', 'is_active')) {
                $table->dropColumn('is_active');
            }
        });
    }
};
