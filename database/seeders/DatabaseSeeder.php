<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Jalankan seeder berdasarkan lingkungan aplikasi (Production vs Development/Lokal vs Testing).
     *
     * - Production: Database 100% bersih tanpa data dummy, HANYA berisi institusi dasar,
     *   RBAC roles/permissions, templat notifikasi, dan TEPAT SATU akun Administrator Utama.
     * - Development/Lokal: Seeder lengkap berisi seluruh akun pengguna, struktur akademik,
     *   bank soal 7 tipe, stimulus wacana, ujian aktif, paket soal, sesi ruang lab ber-token,
     *   serta rekaman percobaan ujian realistis (lulus, remedial, dan in-progress).
     * - Testing: Seeder baseline fondasional untuk pengujian unit & fitur otomatis.
     */
    public function run(): void
    {
        $this->call([
            InstitutionSeeder::class,
            RolePermissionSeeder::class,
            NotificationTemplateSeeder::class,
        ]);

        if (app()->environment('production')) {
            $this->call([
                UserSeeder::class,
            ]);

            return;
        }

        if (app()->environment('local', 'development')) {
            $this->call([
                AcademicStructureSeeder::class,
                UserSeeder::class,
                RealisticExamSimulationSeeder::class,
            ]);

            return;
        }

        // Environment testing (PHPUnit / CI automated tests)
        $this->call([
            AcademicStructureSeeder::class,
            UserSeeder::class,
        ]);
    }
}
