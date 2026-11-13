<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('institution_id')->constrained('institutions')->cascadeOnDelete();
            $table->foreignId('academic_year_id')->constrained('academic_years')->cascadeOnDelete();
            $table->foreignId('academic_term_id')->nullable()->constrained('academic_terms')->nullOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->foreignId('creator_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->string('code', 50)->unique();
            $table->text('description')->nullable();
            $table->string('exam_type', 50)->default('quiz');
            $table->integer('duration_minutes')->default(60);
            $table->decimal('passing_grade', 8, 2)->default(75.00);
            $table->timestamp('scheduled_start')->nullable();
            $table->timestamp('scheduled_end')->nullable();
            $table->string('status', 30)->default('draft')->index();
            $table->boolean('randomize_questions')->default(true);
            $table->boolean('randomize_options')->default(true);
            $table->boolean('show_result_on_finish')->default(false);
            $table->boolean('camera_proctoring_enabled')->default(false);
            $table->boolean('fullscreen_lock_enabled')->default(true);
            $table->integer('max_attempts')->default(1);
            $table->jsonb('rules_config')->nullable();
            $table->foreignId('parent_exam_id')->nullable()->constrained('exams')->nullOnDelete();
            $table->foreignId('published_by_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('exam_blueprints', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            $table->foreignId('question_bank_id')->constrained('question_banks')->cascadeOnDelete();
            $table->jsonb('rules');
            $table->integer('total_questions')->default(0);
            $table->timestamps();
        });

        Schema::create('exam_packages', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            $table->string('package_code', 50);
            $table->string('name')->nullable();
            $table->integer('total_questions')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('exam_package_questions', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_package_id')->constrained('exam_packages')->cascadeOnDelete();
            $table->foreignId('question_id')->constrained('questions')->cascadeOnDelete();
            $table->integer('order_position')->default(1);
            $table->jsonb('question_snapshot');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_package_questions');
        Schema::dropIfExists('exam_packages');
        Schema::dropIfExists('exam_blueprints');
        Schema::dropIfExists('exams');
    }
};
