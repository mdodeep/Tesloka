<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_incident_snapshots', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_incident_log_id')->nullable()->constrained('exam_incident_logs')->nullOnDelete();
            $table->foreignId('exam_attempt_id')->constrained('exam_attempts')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->string('snapshot_path');
            $table->unsignedInteger('file_size_bytes')->default(0);
            $table->string('trigger_reason', 50)->default('incident'); // tab_blur, fullscreen_exit, proctor_request, periodic
            $table->json('metadata')->nullable();
            $table->timestamp('captured_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('exam_livekit_rooms', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_session_id')->unique()->constrained('exam_sessions')->cascadeOnDelete();
            $table->string('room_name', 100)->unique();
            $table->string('sfu_provider', 50)->default('livekit');
            $table->string('server_url', 255)->nullable();
            $table->string('status', 30)->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_livekit_rooms');
        Schema::dropIfExists('exam_incident_snapshots');
    }
};
