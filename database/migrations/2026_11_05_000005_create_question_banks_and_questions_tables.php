<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('question_banks', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->foreignId('author_id')->constrained('users')->cascadeOnDelete();
            $table->string('name');
            $table->string('code', 50)->unique();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });

        Schema::create('question_stimuli', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('question_bank_id')->constrained('question_banks')->cascadeOnDelete();
            $table->string('title');
            $table->text('content');
            $table->string('media_type', 50)->nullable();
            $table->string('media_path')->nullable();
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('question_bank_id')->constrained('question_banks')->cascadeOnDelete();
            $table->foreignId('stimulus_id')->nullable()->constrained('question_stimuli')->nullOnDelete();
            $table->string('code', 50)->nullable();
            $table->string('type', 50)->comment('multiple_choice, multiple_choice_complex, true_false, short_answer, numeric, matching, order, essay');
            $table->text('content');
            $table->string('difficulty', 20)->default('medium');
            $table->decimal('weight', 8, 2)->default(1.00);
            $table->text('explanation')->nullable();
            $table->string('status', 30)->default('draft');
            $table->integer('version')->default(1);
            $table->boolean('is_rtl')->default(false);
            $table->jsonb('scoring_rules')->nullable();
            $table->jsonb('metadata')->nullable();
            $table->timestamps();
        });

        Schema::create('question_options', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('question_id')->constrained('questions')->cascadeOnDelete();
            $table->string('option_key', 20);
            $table->text('content');
            $table->boolean('is_correct')->default(false);
            $table->decimal('weight_ratio', 8, 4)->default(0.0000);
            $table->string('pair_match')->nullable();
            $table->integer('order_position')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('question_options');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('question_stimuli');
        Schema::dropIfExists('question_banks');
    }
};
