<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('system_backup_logs', function (Blueprint $table): void {
            $table->id();
            $table->string('filename');
            $table->string('disk', 50)->default('local');
            $table->string('backup_type', 30)->default('full');
            $table->bigInteger('size_bytes')->default(0);
            $table->string('checksum_sha256', 64)->nullable();
            $table->string('status', 30)->default('pending');
            $table->timestamp('completed_at')->nullable();
            $table->boolean('restore_verified')->default(false);
            $table->timestamp('restore_verified_at')->nullable();
            $table->text('restore_notes')->nullable();
            $table->text('error_message')->nullable();
            $table->timestamps();
        });

        Schema::create('stored_files', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('uploaded_by_id')->constrained('users')->cascadeOnDelete();
            $table->string('disk', 50)->default('local');
            $table->string('storage_path');
            $table->string('original_name');
            $table->string('mime_type', 100);
            $table->bigInteger('size_bytes');
            $table->string('sha256_hash', 64)->nullable();
            $table->string('visibility', 20)->default('private');
            $table->string('attachable_type', 150)->nullable();
            $table->unsignedBigInteger('attachable_id')->nullable();
            $table->jsonb('metadata')->nullable();
            $table->timestamps();
        });

        Schema::create('exam_archives', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            $table->foreignId('archived_by_id')->constrained('users')->cascadeOnDelete();
            $table->string('archive_code', 50)->unique();
            $table->timestamp('archived_at');
            $table->integer('total_examinees')->default(0);
            $table->integer('total_submissions')->default(0);
            $table->decimal('average_score', 8, 2)->nullable();
            $table->jsonb('manifest_data')->nullable();
            $table->string('manifest_checksum', 64)->nullable();
            $table->boolean('legal_hold')->default(false);
            $table->date('retention_until')->nullable();
            $table->text('archival_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_archives');
        Schema::dropIfExists('stored_files');
        Schema::dropIfExists('system_backup_logs');
    }
};
