<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->string('username', 50)->nullable()->unique()->after('name');
            $table->string('identity_number', 50)->nullable()->index()->after('username');
            $table->string('phone', 30)->nullable()->after('email');
            $table->string('gender', 10)->nullable()->after('phone');
            $table->string('photo_path')->nullable()->after('gender');
            $table->string('status', 30)->default('active')->index()->after('photo_path');
            $table->boolean('must_change_password')->default(false)->after('password');
            $table->timestamp('last_login_at')->nullable()->after('remember_token');
            $table->string('last_login_ip', 45)->nullable()->after('last_login_at');
            $table->jsonb('metadata')->nullable()->after('last_login_ip');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn([
                'username', 'identity_number', 'phone', 'gender', 'photo_path',
                'status', 'must_change_password', 'last_login_at', 'last_login_ip', 'metadata',
            ]);
        });
    }
};
