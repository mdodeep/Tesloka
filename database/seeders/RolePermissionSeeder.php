<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['id' => 1, 'name' => 'portal.staff.access', 'display_name' => 'Akses Portal Staf & Internal', 'module' => 'MOD-01'],
            ['id' => 2, 'name' => 'portal.student.access', 'display_name' => 'Akses Portal Peserta Ujian', 'module' => 'MOD-01'],
            ['id' => 3, 'name' => 'academic.view', 'display_name' => 'Melihat Data Akademik', 'module' => 'MOD-02'],
            ['id' => 4, 'name' => 'academic.manage', 'display_name' => 'Mengelola Data Akademik', 'module' => 'MOD-02'],
            ['id' => 5, 'name' => 'users.view', 'display_name' => 'Melihat Daftar Pengguna', 'module' => 'MOD-03'],
            ['id' => 6, 'name' => 'users.manage', 'display_name' => 'Mengelola Akun Pengguna', 'module' => 'MOD-03'],
            ['id' => 7, 'name' => 'questions.view', 'display_name' => 'Melihat Bank Soal', 'module' => 'MOD-04'],
            ['id' => 8, 'name' => 'questions.create', 'display_name' => 'Membuat Soal Baru', 'module' => 'MOD-04'],
            ['id' => 9, 'name' => 'questions.edit', 'display_name' => 'Mengubah Soal Milik Sendiri', 'module' => 'MOD-04'],
            ['id' => 10, 'name' => 'questions.delete', 'display_name' => 'Menghapus Soal', 'module' => 'MOD-04'],
            ['id' => 11, 'name' => 'questions.approve', 'display_name' => 'Menyetujui Publikasi Soal', 'module' => 'MOD-04'],
            ['id' => 12, 'name' => 'questions.import_export', 'display_name' => 'Impor dan Ekspor Soal', 'module' => 'MOD-05'],
            ['id' => 13, 'name' => 'exams.view', 'display_name' => 'Melihat Jadwal & Daftar Ujian', 'module' => 'MOD-06'],
            ['id' => 14, 'name' => 'exams.create', 'display_name' => 'Menyusun Jadwal & Aturan Ujian', 'module' => 'MOD-06'],
            ['id' => 15, 'name' => 'exams.edit', 'display_name' => 'Mengubah Konfigurasi Ujian', 'module' => 'MOD-06'],
            ['id' => 16, 'name' => 'exams.publish', 'display_name' => 'Menerbitkan Ujian', 'module' => 'MOD-06'],
            ['id' => 17, 'name' => 'exams.assign', 'display_name' => 'Menugaskan Peserta & Pengawas', 'module' => 'MOD-08'],
            ['id' => 18, 'name' => 'proctoring.view', 'display_name' => 'Melihat Dashboard Monitoring', 'module' => 'MOD-15'],
            ['id' => 19, 'name' => 'proctoring.manage', 'display_name' => 'Mengontrol Sesi Peserta (Tambah Waktu / Force Submit)', 'module' => 'MOD-15'],
            ['id' => 20, 'name' => 'proctoring.camera', 'display_name' => 'Melihat Grid Kamera Video Peserta', 'module' => 'MOD-14'],
            ['id' => 21, 'name' => 'proctoring.incident', 'display_name' => 'Mencatat Insiden & Bukti Kecurangan', 'module' => 'MOD-16'],
            ['id' => 22, 'name' => 'grading.view', 'display_name' => 'Melihat Lembar Jawaban Peserta', 'module' => 'MOD-17'],
            ['id' => 23, 'name' => 'grading.evaluate', 'display_name' => 'Menilai Jawaban Esai', 'module' => 'MOD-17'],
            ['id' => 24, 'name' => 'grading.moderate', 'display_name' => 'Melakukan Moderasi Nilai', 'module' => 'MOD-17'],
            ['id' => 25, 'name' => 'grading.regrade', 'display_name' => 'Menjalankan Regrade Otomatis', 'module' => 'MOD-18'],
            ['id' => 26, 'name' => 'results.view', 'display_name' => 'Melihat Rekapitulasi Nilai & Kelulusan', 'module' => 'MOD-19'],
            ['id' => 27, 'name' => 'results.publish', 'display_name' => 'Mempublikasikan Nilai ke Peserta', 'module' => 'MOD-19'],
            ['id' => 28, 'name' => 'reports.view', 'display_name' => 'Mengunduh Laporan & Berita Acara', 'module' => 'MOD-22'],
            ['id' => 29, 'name' => 'settings.manage', 'display_name' => 'Mengelola Pengaturan Sistem & Branding', 'module' => 'MOD-26'],
            ['id' => 30, 'name' => 'audit.view', 'display_name' => 'Melihat Log Audit & Forensik', 'module' => 'MOD-25'],
            ['id' => 31, 'name' => 'system.preflight', 'display_name' => 'Menjalankan Health Check & Preflight', 'module' => 'MOD-31'],
        ];

        foreach ($permissions as $perm) {
            Permission::updateOrCreate(['name' => $perm['name']], $perm);
        }

        // Roles
        $adminRole = Role::updateOrCreate(['name' => 'admin'], [
            'display_name' => 'Administrator',
            'description' => 'Akses penuh ke seluruh konfigurasi, data, dan operasional sistem.',
            'is_system' => true,
        ]);

        $teacherRole = Role::updateOrCreate(['name' => 'teacher'], [
            'display_name' => 'Pengajar (Guru/Dosen)',
            'description' => 'Mengelola bank soal, membuat paket ujian, koreksi esai, dan melihat analitik kelas.',
            'is_system' => true,
        ]);

        $proctorRole = Role::updateOrCreate(['name' => 'proctor'], [
            'display_name' => 'Pengawas Ujian',
            'description' => 'Memantau pelaksanaan ujian real-time, live video grid, presensi, dan pencatatan insiden.',
            'is_system' => true,
        ]);

        $studentRole = Role::updateOrCreate(['name' => 'student'], [
            'display_name' => 'Peserta Ujian',
            'description' => 'Mengakses portal ujian, mengerjakan paket soal, dan melihat hasil yang dipublikasikan.',
            'is_system' => true,
        ]);

        // Additional Organizational Roles (FULL-FEATURE 3.1)
        $instAdminRole = Role::updateOrCreate(['name' => 'institution_admin'], [
            'display_name' => 'Administrator Institusi',
            'description' => 'Mengelola struktur akademik, kebijakan institusi, dan pengaturan branding sistem.',
            'is_system' => true,
        ]);

        $acadCoordRole = Role::updateOrCreate(['name' => 'academic_coordinator'], [
            'display_name' => 'Koordinator Akademik',
            'description' => 'Mengkoordinasikan kurikulum, penugasan guru, mata pelajaran, dan jadwal akademik.',
            'is_system' => true,
        ]);

        $examCoordRole = Role::updateOrCreate(['name' => 'exam_coordinator'], [
            'display_name' => 'Koordinator Ujian',
            'description' => 'Bertanggung jawab atas penyusunan jadwal, validasi paket ujian, dan alokasi sesi/ruang.',
            'is_system' => true,
        ]);

        $acadOpRole = Role::updateOrCreate(['name' => 'academic_operator'], [
            'display_name' => 'Operator Akademik',
            'description' => 'Entri data rombel, pendaftaran siswa, presensi manual, dan pencetakan kartu ujian.',
            'is_system' => true,
        ]);

        $graderRole = Role::updateOrCreate(['name' => 'grader'], [
            'display_name' => 'Pemeriksa / Korektor',
            'description' => 'Fokus memeriksa dan memberi penilaian pada jawaban esai peserta sesuai rubrik.',
            'is_system' => true,
        ]);

        $gradModRole = Role::updateOrCreate(['name' => 'grading_moderator'], [
            'display_name' => 'Moderator Penilaian',
            'description' => 'Memoderasi nilai esai, menyelesaikan perbedaan penilaian, dan menyetujui nilai akhir.',
            'is_system' => true,
        ]);

        $approverRole = Role::updateOrCreate(['name' => 'approver'], [
            'display_name' => 'Pejabat Penyetuju (Approver)',
            'description' => 'Otoritas penandatangan/penyetuju rilis soal, pembukaan sesi, dan penerbitan nilai.',
            'is_system' => true,
        ]);

        $auditorRole = Role::updateOrCreate(['name' => 'auditor'], [
            'display_name' => 'Auditor Sistem',
            'description' => 'Melihat jejak audit, riwayat perubahan nilai, rekaman pengawasan, dan log keamanan.',
            'is_system' => true,
        ]);

        $techOfficerRole = Role::updateOrCreate(['name' => 'technical_officer'], [
            'display_name' => 'Petugas Teknis / Lab',
            'description' => 'Memantau kesehatan server, konektivitas lab komputer, konfigurasi SEB, dan backup.',
            'is_system' => true,
        ]);

        $helpdeskRole = Role::updateOrCreate(['name' => 'helpdesk_officer'], [
            'display_name' => 'Petugas Layanan Peserta (Helpdesk)',
            'description' => 'Mereset password siswa, menangani sesi terkendala login, dan menerima laporan peserta.',
            'is_system' => true,
        ]);

        // Assign all permissions to admin and institution_admin
        $allPermissionIds = Permission::pluck('id');
        $adminRole->permissions()->sync($allPermissionIds);
        $instAdminRole->permissions()->sync($allPermissionIds);

        // Assign teacher permissions
        $teacherPermissions = Permission::whereIn('name', [
            'portal.staff.access',
            'academic.view',
            'questions.view', 'questions.create', 'questions.edit', 'questions.delete', 'questions.approve', 'questions.import_export',
            'exams.view', 'exams.create', 'exams.edit', 'exams.assign',
            'grading.view', 'grading.evaluate',
            'results.view',
            'reports.view',
        ])->pluck('id');
        $teacherRole->permissions()->sync($teacherPermissions);

        // Assign proctor permissions
        $proctorPermissions = Permission::whereIn('name', [
            'portal.staff.access',
            'academic.view',
            'exams.view',
            'proctoring.view', 'proctoring.manage', 'proctoring.camera', 'proctoring.incident',
            'reports.view',
        ])->pluck('id');
        $proctorRole->permissions()->sync($proctorPermissions);

        // Assign student permissions
        $studentPermissions = Permission::whereIn('name', [
            'portal.student.access',
        ])->pluck('id');
        $studentRole->permissions()->sync($studentPermissions);

        // Assign exam coordinator permissions
        $examCoordRole->permissions()->sync(Permission::whereIn('name', [
            'portal.staff.access', 'academic.view', 'exams.view', 'exams.create', 'exams.edit', 'exams.publish', 'exams.assign',
            'proctoring.view', 'grading.view', 'results.view', 'reports.view',
        ])->pluck('id'));

        // Assign academic coordinator permissions
        $acadCoordRole->permissions()->sync(Permission::whereIn('name', [
            'portal.staff.access', 'academic.view', 'academic.manage', 'exams.view', 'results.view', 'reports.view',
        ])->pluck('id'));

        // Assign academic operator permissions
        $acadOpRole->permissions()->sync(Permission::whereIn('name', [
            'portal.staff.access', 'academic.view', 'users.view', 'exams.view', 'reports.view',
        ])->pluck('id'));

        // Assign grader permissions
        $graderRole->permissions()->sync(Permission::whereIn('name', [
            'portal.staff.access', 'grading.view', 'grading.evaluate',
        ])->pluck('id'));

        // Assign grading moderator permissions
        $gradModRole->permissions()->sync(Permission::whereIn('name', [
            'portal.staff.access', 'grading.view', 'grading.evaluate', 'grading.moderate', 'results.view',
        ])->pluck('id'));

        // Assign approver permissions
        $approverRole->permissions()->sync(Permission::whereIn('name', [
            'portal.staff.access', 'questions.view', 'questions.approve', 'exams.view', 'exams.publish', 'results.view', 'results.publish',
        ])->pluck('id'));

        // Assign auditor permissions
        $auditorRole->permissions()->sync(Permission::whereIn('name', [
            'portal.staff.access', 'audit.view', 'results.view', 'reports.view', 'proctoring.view',
        ])->pluck('id'));

        // Assign technical officer permissions
        $techOfficerRole->permissions()->sync(Permission::whereIn('name', [
            'portal.staff.access', 'system.preflight', 'audit.view', 'settings.manage',
        ])->pluck('id'));

        // Assign helpdesk permissions
        $helpdeskRole->permissions()->sync(Permission::whereIn('name', [
            'portal.staff.access', 'users.view', 'exams.view', 'proctoring.view',
        ])->pluck('id'));
    }
}
