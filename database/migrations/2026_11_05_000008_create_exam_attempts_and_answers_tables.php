<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_attempts', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            $table->foreignId('exam_participant_id')->constrained('exam_participants')->cascadeOnDelete();
            $table->foreignId('exam_package_id')->constrained('exam_packages')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->integer('attempt_number')->default(1);
            $table->string('status', 30)->default('in_progress')->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('started_at');
            $table->timestamp('deadline_at');
            $table->timestamp('submitted_at')->nullable();
            $table->string('submission_receipt', 100)->nullable()->unique();
            $table->json('question_order')->nullable();
            $table->decimal('total_score', 8, 2)->nullable();
            $table->boolean('is_graded')->default(false);
            $table->json('metadata')->nullable();
            $table->timestamps();
        });

        Schema::create('exam_attempt_answers', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_attempt_id')->constrained('exam_attempts')->cascadeOnDelete();
            $table->foreignId('exam_package_question_id')->constrained('exam_package_questions')->cascadeOnDelete();
            $table->json('answer_payload')->nullable();
            $table->integer('revision_sequence')->default(1);
            $table->boolean('is_flagged')->default(false);
            $table->boolean('is_answered')->default(false);
            $table->timestamp('server_saved_at')->nullable();
            $table->timestamp('client_timestamp')->nullable();
            $table->decimal('score', 8, 2)->nullable();
            $table->text('feedback')->nullable();
            $table->timestamps();

            $table->unique(['exam_attempt_id', 'exam_package_question_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_attempt_answers');
        Schema::dropIfExists('exam_attempts');
    }
};
