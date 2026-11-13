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
        Schema::table('exam_participants', function (Blueprint $table) {
            $table->string('scribe_nik', 30)->nullable()->after('scribe_name');
            $table->string('scribe_phone', 30)->nullable()->after('scribe_nik');
            $table->text('scribe_pledge')->nullable()->after('scribe_phone');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('preferred_font', 30)->default('sora')->after('remember_token');
            $table->string('contrast_mode', 20)->default('normal')->after('preferred_font');
            $table->integer('font_scale')->default(100)->after('contrast_mode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['preferred_font', 'contrast_mode', 'font_scale']);
        });

        Schema::table('exam_participants', function (Blueprint $table) {
            $table->dropColumn(['scribe_nik', 'scribe_phone', 'scribe_pledge']);
        });
    }
};

