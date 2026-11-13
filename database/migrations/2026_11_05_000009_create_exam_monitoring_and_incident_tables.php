<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_monitoring_heartbeats', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_attempt_id')->constrained('exam_attempts')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            $table->string('connection_status', 30)->default('connected');
            $table->boolean('is_fullscreen')->default(true);
            $table->boolean('is_tab_focused')->default(true);
            $table->string('battery_level', 20)->nullable();
            $table->string('camera_status', 30)->default('active');
            $table->json('device_telemetry')->nullable();
            $table->timestamp('recorded_at')->useCurrent();
        });

        Schema::create('exam_incident_logs', function (Blueprint $table): void {
            $table->id();
            $table->string('incident_code', 50)->unique();
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            $table->foreignId('exam_session_id')->constrained('exam_sessions')->cascadeOnDelete();
            $table->foreignId('exam_attempt_id')->nullable()->constrained('exam_attempts')->nullOnDelete();
            $table->foreignId('student_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('reported_by_id')->constrained('users')->cascadeOnDelete();
            $table->string('event_type', 50)->index();
            $table->string('severity', 20)->default('warning');
            $table->string('status', 30)->default('reported');
            $table->text('description');
            $table->json('metadata')->nullable();
            $table->text('action_taken')->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->foreignId('resolved_by_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('exam_proctor_actions', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            $table->foreignId('exam_attempt_id')->constrained('exam_attempts')->cascadeOnDelete();
            $table->foreignId('proctor_id')->constrained('users')->cascadeOnDelete();
            $table->string('action_type', 50);
            $table->text('reason')->nullable();
            $table->json('payload')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_proctor_actions');
        Schema::dropIfExists('exam_incident_logs');
        Schema::dropIfExists('exam_monitoring_heartbeats');
    }
};
