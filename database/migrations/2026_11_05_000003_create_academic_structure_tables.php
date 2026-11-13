<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('academic_years', function (Blueprint $table): void {
            $table->id();
            $table->string('name', 50);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_active')->default(false)->index();
            $table->timestamps();
        });

        Schema::create('academic_terms', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('academic_year_id')->constrained('academic_years')->cascadeOnDelete();
            $table->string('name', 50);
            $table->string('code', 20);
            $table->boolean('is_active')->default(false)->index();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });

        Schema::create('academic_departments', function (Blueprint $table): void {
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('name');
            $table->string('level', 50)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('academic_classes', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('department_id')->nullable()->constrained('academic_departments')->nullOnDelete();
            $table->foreignId('academic_year_id')->constrained('academic_years')->cascadeOnDelete();
            $table->string('name');
            $table->string('code', 50);
            $table->integer('capacity')->default(36);
            $table->timestamps();
        });

        Schema::create('subjects', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('department_id')->nullable()->constrained('academic_departments')->nullOnDelete();
            $table->string('code', 50)->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });

        Schema::create('teacher_subject_assignments', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->foreignId('class_id')->nullable()->constrained('academic_classes')->nullOnDelete();
            $table->foreignId('academic_term_id')->nullable()->constrained('academic_terms')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('class_student_enrollments', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('class_id')->constrained('academic_classes')->cascadeOnDelete();
            $table->foreignId('academic_year_id')->constrained('academic_years')->cascadeOnDelete();
            $table->string('status', 30)->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_student_enrollments');
        Schema::dropIfExists('teacher_subject_assignments');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('academic_classes');
        Schema::dropIfExists('academic_departments');
        Schema::dropIfExists('academic_terms');
        Schema::dropIfExists('academic_years');
    }
};
