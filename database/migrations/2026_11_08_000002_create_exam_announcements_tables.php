<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_announcements', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            $table->foreignId('exam_session_id')->nullable()->constrained('exam_sessions')->cascadeOnDelete();
            $table->foreignId('sender_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->text('message');
            $table->string('target_type', 50)->default('all'); // all, session, room, student
            $table->string('target_id', 100)->nullable();
            $table->string('priority', 20)->default('normal'); // normal, urgent, emergency
            $table->boolean('requires_acknowledgement')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });

        Schema::create('exam_announcement_reads', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_announcement_id')->constrained('exam_announcements')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->timestamp('read_at')->useCurrent();
            $table->unique(['exam_announcement_id', 'student_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_announcement_reads');
        Schema::dropIfExists('exam_announcements');
    }
};
