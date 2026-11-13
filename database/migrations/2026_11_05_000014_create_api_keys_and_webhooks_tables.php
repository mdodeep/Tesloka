<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('api_keys', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('name');
            $table->string('key_hash', 64)->unique();
            $table->string('prefix', 10);
            $table->jsonb('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('webhook_subscriptions', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->string('secret', 100);
            $table->jsonb('events');
            $table->boolean('is_active')->default(true);
            $table->integer('failure_count')->default(0);
            $table->timestamp('last_delivery_at')->nullable();
            $table->smallInteger('last_status_code')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webhook_subscriptions');
        Schema::dropIfExists('api_keys');
    }
};
