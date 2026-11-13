<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_attempt_grades', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_attempt_id')->constrained('exam_attempts')->cascadeOnDelete();
            $table->integer('grade_version')->default(1);
            $table->decimal('total_score', 8, 2);
            $table->decimal('max_score', 8, 2);
            $table->decimal('percentage', 5, 2);
            $table->boolean('is_passed')->default(false);
            $table->foreignId('graded_by_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('grading_type', 30)->default('automatic');
            $table->text('grading_notes')->nullable();
            $table->json('item_breakdown')->nullable();
            $table->timestamps();
        });

        Schema::create('exam_regrade_logs', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            $table->foreignId('requested_by_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('target_question_id')->nullable()->constrained('questions')->nullOnDelete();
            $table->string('status', 30)->default('pending');
            $table->text('regrade_reason');
            $table->json('before_summary')->nullable();
            $table->json('after_summary')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_regrade_logs');
        Schema::dropIfExists('exam_attempt_grades');
    }
};
