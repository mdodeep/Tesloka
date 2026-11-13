<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->string('nik', 30)->nullable()->after('identity_number');
            $table->string('birth_place', 100)->nullable()->after('nik');
            $table->date('birth_date')->nullable()->after('birth_place');
            $table->text('address')->nullable()->after('birth_date');
            $table->string('postal_code', 20)->nullable()->after('address');
            $table->string('province', 100)->nullable()->after('postal_code');
            $table->string('city', 100)->nullable()->after('province');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn([
                'nik', 'birth_place', 'birth_date', 'address', 'postal_code', 'province', 'city',
            ]);
        });
    }
};
