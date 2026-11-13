<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_final_results', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('exam_attempt_id')->constrained('exam_attempts')->cascadeOnDelete();
            $table->decimal('total_score', 8, 2);
            $table->decimal('max_score', 8, 2);
            $table->decimal('percentage', 5, 2);
            $table->decimal('passing_grade', 8, 2);
            $table->boolean('is_passed')->default(false);
            $table->string('final_grade_letter', 10)->nullable();
            $table->decimal('effective_score', 8, 2);
            $table->string('status', 30)->default('draft')->index();
            $table->foreignId('finalized_by_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('finalized_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_final_results');
    }
};
