<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_rooms', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('code', 50)->unique();
            $table->string('location')->nullable();
            $table->integer('capacity')->default(30);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('exam_sessions', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            $table->foreignId('exam_room_id')->constrained('exam_rooms')->cascadeOnDelete();
            $table->string('name');
            $table->string('session_code', 50)->unique();
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->string('token', 20)->nullable();
            $table->string('status', 30)->default('scheduled')->index();
            $table->timestamps();
        });

        Schema::create('exam_proctors', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_session_id')->constrained('exam_sessions')->cascadeOnDelete();
            $table->foreignId('proctor_id')->constrained('users')->cascadeOnDelete();
            $table->string('role_title', 50)->default('Proctor');
            $table->timestamps();
        });

        Schema::create('exam_participants', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            $table->foreignId('exam_session_id')->constrained('exam_sessions')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('exam_package_id')->nullable()->constrained('exam_packages')->nullOnDelete();
            $table->string('seat_number', 20)->nullable();
            $table->string('status', 30)->default('registered')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_participants');
        Schema::dropIfExists('exam_proctors');
        Schema::dropIfExists('exam_sessions');
        Schema::dropIfExists('exam_rooms');
    }
};
