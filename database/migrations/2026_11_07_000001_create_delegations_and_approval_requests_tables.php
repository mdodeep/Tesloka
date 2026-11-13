<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_delegations', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('delegator_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('delegatee_id')->constrained('users')->cascadeOnDelete();
            $table->string('scope', 100)->index();
            $table->date('start_date');
            $table->date('end_date');
            $table->jsonb('action_limits')->nullable();
            $table->text('reason')->nullable();
            $table->string('status', 30)->default('active')->index();
            $table->timestamp('revoked_at')->nullable();
            $table->foreignId('revoked_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index(['delegator_id', 'status']);
            $table->index(['delegatee_id', 'status']);
        });

        Schema::create('approval_requests', function (Blueprint $table): void {
            $table->id();
            $table->string('action_type', 100)->index();
            $table->string('target_type', 150)->nullable();
            $table->unsignedBigInteger('target_id')->nullable();
            $table->foreignId('requester_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('approver_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('status', 30)->default('pending')->index();
            $table->jsonb('payload')->nullable();
            $table->text('reason')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();

            $table->index(['target_type', 'target_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval_requests');
        Schema::dropIfExists('user_delegations');
    }
};
