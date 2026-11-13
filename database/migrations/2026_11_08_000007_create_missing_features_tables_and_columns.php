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
        // 1. Safe Exam Browser (SEB) fields on exams table (Section 18)
        Schema::table('exams', function (Blueprint $table) {
            $table->boolean('seb_required')->default(false)->after('fullscreen_lock_enabled');
            $table->string('seb_config_key', 128)->nullable()->after('seb_required');
            $table->string('seb_quit_password', 128)->nullable()->after('seb_config_key');
        });

        // 2. Disability Accommodations & Scribe fields on exam_participants (Section 11)
        Schema::table('exam_participants', function (Blueprint $table) {
            $table->integer('time_extension_percent')->default(0)->after('seat_number');
            $table->text('accommodation_notes')->nullable()->after('time_extension_percent');
            $table->boolean('needs_scribe')->default(false)->after('accommodation_notes');
            $table->string('scribe_name', 150)->nullable()->after('needs_scribe');
        });

        // 3. Email Delivery Logs table (Section 40)
        Schema::create('email_delivery_logs', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_email');
            $table->string('subject');
            $table->string('channel', 30)->default('email');
            $table->string('status', 30)->default('pending')->index(); // pending, sent, failed, bounced
            $table->text('error_message')->nullable();
            $table->jsonb('metadata')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_delivery_logs');

        Schema::table('exam_participants', function (Blueprint $table) {
            $table->dropColumn(['time_extension_percent', 'accommodation_notes', 'needs_scribe', 'scribe_name']);
        });

        Schema::table('exams', function (Blueprint $table) {
            $table->dropColumn(['seb_required', 'seb_config_key', 'seb_quit_password']);
        });
    }
};

