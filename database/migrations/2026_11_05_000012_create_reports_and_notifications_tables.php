<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_official_reports', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            $table->foreignId('exam_session_id')->constrained('exam_sessions')->cascadeOnDelete();
            $table->foreignId('exam_room_id')->constrained('exam_rooms')->cascadeOnDelete();
            $table->foreignId('lead_proctor_id')->constrained('users')->cascadeOnDelete();
            $table->integer('registered_count')->default(0);
            $table->integer('attended_count')->default(0);
            $table->integer('absent_count')->default(0);
            $table->text('general_notes')->nullable();
            $table->boolean('is_signed')->default(false);
            $table->foreignId('signed_by_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('signed_at')->nullable();
            $table->timestamps();
        });

        Schema::create('notification_templates', function (Blueprint $table): void {
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('name');
            $table->string('subject');
            $table->text('body_template');
            $table->string('channel', 30)->default('email');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('system_notifications', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('type', 50)->default('info');
            $table->string('title');
            $table->text('message');
            $table->string('action_url')->nullable();
            $table->boolean('is_read')->default(false)->index();
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('system_notifications');
        Schema::dropIfExists('notification_templates');
        Schema::dropIfExists('exam_official_reports');
    }
};
