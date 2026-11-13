<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Jalankan seluruh seeder foundational untuk institusi, RBAC, akademik, dan pengguna.
     */
    public function run(): void
    {
        $this->call([
            InstitutionSeeder::class,
            RolePermissionSeeder::class,
            AcademicStructureSeeder::class,
            UserSeeder::class,
            NotificationTemplateSeeder::class,
        ]);
    }
}
