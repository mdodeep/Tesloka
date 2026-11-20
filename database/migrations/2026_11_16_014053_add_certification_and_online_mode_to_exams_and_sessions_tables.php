<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Tambah kolom ke tabel exams
        Schema::table('exams', function (Blueprint $table) {
            if (! Schema::hasColumn('exams', 'delivery_mode')) {
                $table->string('delivery_mode', 20)->default('online')->after('status')->index();
            }
            if (! Schema::hasColumn('exams', 'assessment_type')) {
                $table->string('assessment_type', 40)->default('academic')->after('delivery_mode')->index();
            }
            if (! Schema::hasColumn('exams', 'has_passing_grade')) {
                $table->boolean('has_passing_grade')->default(true)->after('assessment_type');
            }
            if (! Schema::hasColumn('exams', 'score_scale')) {
                $table->string('score_scale', 30)->default('standard_100')->after('has_passing_grade');
            }
            if (! Schema::hasColumn('exams', 'certificate_type')) {
                $table->string('certificate_type', 40)->default('standard')->after('score_scale');
            }
        });

        // 2. Tambah delivery_mode dan jadikan exam_room_id nullable di exam_sessions
        Schema::table('exam_sessions', function (Blueprint $table) {
            if (! Schema::hasColumn('exam_sessions', 'delivery_mode')) {
                $table->string('delivery_mode', 20)->default('online')->after('status')->index();
            }
        });

        // Jadikan exam_room_id nullable untuk mengakomodasi ujian online / jarak jauh
        try {
            DB::statement('ALTER TABLE exam_sessions ALTER COLUMN exam_room_id DROP NOT NULL;');
        } catch (Throwable $e) {
            // Fallback schema builder jika bukan PostgreSQL
            Schema::table('exam_sessions', function (Blueprint $table) {
                $table->unsignedBigInteger('exam_room_id')->nullable()->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->dropColumn([
                'delivery_mode',
                'assessment_type',
                'has_passing_grade',
                'score_scale',
                'certificate_type',
            ]);
        });

        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->dropColumn(['delivery_mode']);
        });

        try {
            DB::statement('ALTER TABLE exam_sessions ALTER COLUMN exam_room_id SET NOT NULL;');
        } catch (Throwable $e) {
            //
        }
    }
};
