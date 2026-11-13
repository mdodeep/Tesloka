<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tambahkan kolom 2FA ke tabel users
        Schema::table('users', function (Blueprint $table): void {
            $table->text('two_factor_secret')->nullable()->after('remember_token');
            $table->text('two_factor_recovery_codes')->nullable()->after('two_factor_secret');
            $table->timestamp('two_factor_confirmed_at')->nullable()->after('two_factor_recovery_codes');
        });

        // 2. Buat tabel pelacakan perangkat dan sesi aktif (FULL-FEATURE 44.4)
        Schema::create('user_device_sessions', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('session_id', 255)->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('device_type', 50)->default('desktop');
            $table->string('browser', 50)->nullable();
            $table->string('platform', 50)->nullable();
            $table->boolean('is_revoked')->default(false)->index();
            $table->timestamp('last_active_at')->useCurrent()->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_device_sessions');

        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn([
                'two_factor_secret',
                'two_factor_recovery_codes',
                'two_factor_confirmed_at',
            ]);
        });
    }
};
