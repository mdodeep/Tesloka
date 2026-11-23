<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Seeder khusus untuk Lingkungan Production.
     *
     * Hanya menginisialisasi:
     * 1. Profil Institusi dasar (InstitutionSeeder)
     * 2. RBAC 14 Roles & Permissions sistem (RolePermissionSeeder)
     * 3. Templat notifikasi sistem standar (NotificationTemplateSeeder)
     * 4. TEPAT SATU akun Administrator Utama (UserSeeder dengan forceProduction: true)
     *
     * Seluruh data dummy akademik, rombel, soal, bank soal, sesi, dan peserta
     * dipastikan kosong 100% sehingga instansi dapat langsung mulai secara bersih.
     */
    public function run(): void
    {
        $this->call([
            InstitutionSeeder::class,
            RolePermissionSeeder::class,
            NotificationTemplateSeeder::class,
        ]);

        $userSeeder = new UserSeeder;
        if ($this->command) {
            $userSeeder->setCommand($this->command);
        }
        $userSeeder->run(forceProduction: true);
    }
}
