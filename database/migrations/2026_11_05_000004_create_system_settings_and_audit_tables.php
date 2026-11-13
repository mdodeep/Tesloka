<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('institutions', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('code', 50)->unique();
            $table->text('address')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('email')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('favicon_path')->nullable();
            $table->jsonb('config')->nullable();
            $table->timestamps();
        });

        Schema::create('system_settings', function (Blueprint $table): void {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group', 50)->default('general')->index();
            $table->string('type', 30)->default('string');
            $table->string('description')->nullable();
            $table->boolean('is_public')->default(false);
            $table->timestamps();
        });

        Schema::create('audit_logs', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('event_type', 100)->index();
            $table->string('auditable_type', 150)->nullable()->index();
            $table->unsignedBigInteger('auditable_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->jsonb('old_values')->nullable();
            $table->jsonb('new_values')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('created_at')->useCurrent()->index();

            $table->index(['auditable_type', 'auditable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
        Schema::dropIfExists('system_settings');
        Schema::dropIfExists('institutions');
    }
};
