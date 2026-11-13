<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webhook_deliveries', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('webhook_subscription_id')->constrained('webhook_subscriptions')->cascadeOnDelete();
            $table->string('event_type', 100)->index();
            $table->jsonb('payload');
            $table->string('signature', 128);
            $table->integer('response_status')->nullable();
            $table->text('response_body')->nullable();
            $table->integer('attempt_number')->default(1);
            $table->string('status', 30)->default('pending')->index(); // pending, delivered, failed
            $table->text('error_message')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webhook_deliveries');
    }
};

