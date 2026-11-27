<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('bank_accounts')) {
            Schema::create('bank_accounts', function (Blueprint $table): void {
                $table->id();
                $table->string('bank_name', 100);
                $table->string('account_number', 60);
                $table->string('account_holder', 150);
                $table->string('branch', 120)->nullable();
                $table->string('notes', 255)->nullable();
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('exam_payments')) {
            Schema::create('exam_payments', function (Blueprint $table): void {
                $table->id();
                $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
                $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
                $table->foreignId('exam_participant_id')->nullable()->constrained('exam_participants')->nullOnDelete();
                $table->foreignId('bank_account_id')->nullable()->constrained('bank_accounts')->nullOnDelete();
                $table->string('bank_name_snapshot', 100);
                $table->string('account_number_snapshot', 60);
                $table->string('account_holder_snapshot', 150)->nullable();
                $table->decimal('amount', 12, 2)->default(0);
                $table->string('sender_name', 150);
                $table->string('sender_bank', 100);
                $table->string('sender_account_number', 60)->nullable();
                $table->date('transfer_date')->nullable();
                $table->string('proof_path', 255);
                $table->string('proof_original_name', 255)->nullable();
                $table->string('status', 20)->default('pending');
                $table->text('rejection_reason')->nullable();
                $table->text('student_notes')->nullable();
                $table->foreignId('reviewed_by_id')->nullable()->constrained('users')->nullOnDelete();
                $table->timestamp('reviewed_at')->nullable();
                $table->timestamps();

                $table->index(['exam_id', 'student_id']);
                $table->index('status');
            });
        }

        Schema::table('exams', function (Blueprint $table): void {
            if (! Schema::hasColumn('exams', 'requires_payment')) {
                $table->boolean('requires_payment')->default(false);
            }
            if (! Schema::hasColumn('exams', 'payment_amount')) {
                $table->decimal('payment_amount', 12, 2)->default(0);
            }
            if (! Schema::hasColumn('exams', 'payment_instructions')) {
                $table->text('payment_instructions')->nullable();
            }
            if (! Schema::hasColumn('exams', 'certificate_validity_months')) {
                $table->unsignedSmallInteger('certificate_validity_months')->nullable();
            }
            if (! Schema::hasColumn('exams', 'score_decimal_places')) {
                $table->unsignedTinyInteger('score_decimal_places')->nullable();
            }
            if (! Schema::hasColumn('exams', 'section_config')) {
                $table->json('section_config')->nullable();
            }
        });

        Schema::table('questions', function (Blueprint $table): void {
            if (! Schema::hasColumn('questions', 'section_category')) {
                $table->string('section_category', 80)->nullable();
            }
        });

        Schema::table('exam_blueprints', function (Blueprint $table): void {
            if (! Schema::hasColumn('exam_blueprints', 'section_category')) {
                $table->string('section_category', 80)->nullable();
            }
        });

        Schema::table('exam_attempt_grades', function (Blueprint $table): void {
            if (! Schema::hasColumn('exam_attempt_grades', 'scaled_score')) {
                $table->decimal('scaled_score', 10, 2)->nullable();
            }
            if (! Schema::hasColumn('exam_attempt_grades', 'section_scores')) {
                $table->json('section_scores')->nullable();
            }
        });

        Schema::table('exam_final_results', function (Blueprint $table): void {
            if (! Schema::hasColumn('exam_final_results', 'scaled_score')) {
                $table->decimal('scaled_score', 10, 2)->nullable();
            }
            if (! Schema::hasColumn('exam_final_results', 'section_scores')) {
                $table->json('section_scores')->nullable();
            }
            if (! Schema::hasColumn('exam_final_results', 'certificate_expires_at')) {
                $table->timestamp('certificate_expires_at')->nullable();
            }
        });

        Schema::table('user_device_sessions', function (Blueprint $table): void {
            if (! Schema::hasColumn('user_device_sessions', 'device_category')) {
                $table->string('device_category', 30)->nullable();
            }
            if (! Schema::hasColumn('user_device_sessions', 'device_label')) {
                $table->string('device_label', 120)->nullable();
            }
            if (! Schema::hasColumn('user_device_sessions', 'os_name')) {
                $table->string('os_name', 80)->nullable();
            }
            if (! Schema::hasColumn('user_device_sessions', 'device_metadata')) {
                $table->json('device_metadata')->nullable();
            }
        });

        Schema::table('exam_attempts', function (Blueprint $table): void {
            if (! Schema::hasColumn('exam_attempts', 'device_type')) {
                $table->string('device_type', 30)->nullable();
            }
            if (! Schema::hasColumn('exam_attempts', 'device_label')) {
                $table->string('device_label', 120)->nullable();
            }
            if (! Schema::hasColumn('exam_attempts', 'device_metadata')) {
                $table->json('device_metadata')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_payments');
        Schema::dropIfExists('bank_accounts');

        Schema::table('exam_attempts', function (Blueprint $table): void {
            foreach (['device_type', 'device_label', 'device_metadata'] as $col) {
                if (Schema::hasColumn('exam_attempts', $col)) {
                    $table->dropColumn($col);
                }
            }
        });

        Schema::table('user_device_sessions', function (Blueprint $table): void {
            foreach (['device_category', 'device_label', 'os_name', 'device_metadata'] as $col) {
                if (Schema::hasColumn('user_device_sessions', $col)) {
                    $table->dropColumn($col);
                }
            }
        });

        Schema::table('exam_final_results', function (Blueprint $table): void {
            foreach (['scaled_score', 'section_scores', 'certificate_expires_at'] as $col) {
                if (Schema::hasColumn('exam_final_results', $col)) {
                    $table->dropColumn($col);
                }
            }
        });

        Schema::table('exam_attempt_grades', function (Blueprint $table): void {
            foreach (['scaled_score', 'section_scores'] as $col) {
                if (Schema::hasColumn('exam_attempt_grades', $col)) {
                    $table->dropColumn($col);
                }
            }
        });

        Schema::table('exam_blueprints', function (Blueprint $table): void {
            if (Schema::hasColumn('exam_blueprints', 'section_category')) {
                $table->dropColumn('section_category');
            }
        });

        Schema::table('questions', function (Blueprint $table): void {
            if (Schema::hasColumn('questions', 'section_category')) {
                $table->dropColumn('section_category');
            }
        });

        Schema::table('exams', function (Blueprint $table): void {
            foreach ([
                'requires_payment',
                'payment_amount',
                'payment_instructions',
                'certificate_validity_months',
                'score_decimal_places',
                'section_config',
            ] as $col) {
                if (Schema::hasColumn('exams', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
