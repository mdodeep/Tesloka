<?php

namespace Database\Seeders;

use App\Models\AcademicClass;
use App\Models\AcademicTerm;
use App\Models\AcademicYear;
use App\Models\ClassStudentEnrollment;
use App\Models\Role;
use App\Models\Subject;
use App\Models\TeacherSubjectAssignment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(bool $forceProduction = false): void
    {
        $isProductionMode = $forceProduction || app()->environment('production');
        $envAdminPassword = env('TESLOKA_ADMIN_PASSWORD');
        $generatedProdPassword = null;

        if ($isProductionMode) {
            if (! empty($envAdminPassword)) {
                $adminPasswordHash = Hash::make((string) $envAdminPassword);
                $mustChangePassword = false;
            } else {
                // Production wajib bebas sandi bawaan universal; hasilkan sandi acak kriptografis
                $generatedProdPassword = Str::password(16);
                $adminPasswordHash = Hash::make($generatedProdPassword);
                $mustChangePassword = true;
            }
        } else {
            $adminPasswordHash = Hash::make('Tesloka2026!');
            $mustChangePassword = false;
        }

        $defaultPassword = Hash::make('Tesloka2026!');

        $adminRole = Role::where('name', 'admin')->first();
        $teacherRole = Role::where('name', 'teacher')->first();
        $proctorRole = Role::where('name', 'proctor')->first();
        $studentRole = Role::where('name', 'student')->first();
        $instAdminRole = Role::where('name', 'institution_admin')->first();
        $acadCoordRole = Role::where('name', 'academic_coordinator')->first();
        $examCoordRole = Role::where('name', 'exam_coordinator')->first();
        $acadOpRole = Role::where('name', 'academic_operator')->first();
        $graderRole = Role::where('name', 'grader')->first();
        $gradModRole = Role::where('name', 'grading_moderator')->first();
        $approverRole = Role::where('name', 'approver')->first();
        $auditorRole = Role::where('name', 'auditor')->first();
        $techOfficerRole = Role::where('name', 'technical_officer')->first();
        $helpdeskRole = Role::where('name', 'helpdesk_officer')->first();

        // 1. Administrator Utama
        if (! $isProductionMode || User::count() === 0) {
            $admin = User::updateOrCreate(
                ['username' => 'admin'],
                [
                    'name' => $isProductionMode ? 'Administrator Utama' : 'Administrator Utama TESLOKA',
                    'email' => $isProductionMode ? 'admin@institusi.local' : 'admin@tesloka.test',
                    'password' => $adminPasswordHash,
                    'identity_number' => 'ADM2026001',
                    'status' => 'active',
                    'must_change_password' => $mustChangePassword,
                ]
            );
            if ($adminRole && ! $admin->hasRole('admin')) {
                $admin->roles()->syncWithoutDetaching([$adminRole->id]);
            }

            if ($generatedProdPassword !== null && $this->command) {
                $this->command->warn("Akun admin awal dibuat dengan sandi acak sekali lihat: {$generatedProdPassword}");
                $this->command->warn('Segera ganti kata sandi setelah login pertama.');
            }
        }

        // Khusus Lingkungan Production: Hanya Administrator Utama yang dibuat.
        // Hentikan proses seeder di sini agar database institusi tetap bersih.
        if ($isProductionMode) {
            return;
        }

        // 2. Guru / Dosen
        $teacher = User::updateOrCreate(
            ['username' => 'ahmad_guru'],
            [
                'name' => 'Ustadz Ahmad Al-Hafidz, M.Pd.',
                'email' => 'ustadz.ahmad@tesloka.test',
                'password' => $defaultPassword,
                'identity_number' => 'NIP198501012010011001',
                'phone' => '+6281234567890',
                'gender' => 'male',
                'status' => 'active',
                'must_change_password' => false,
            ]
        );
        if ($teacherRole && ! $teacher->hasRole('teacher')) {
            $teacher->roles()->syncWithoutDetaching([$teacherRole->id]);
        }

        // 3. Pengawas Ujian
        $proctor = User::updateOrCreate(
            ['username' => 'pengawas1'],
            [
                'name' => 'Bambang Sudarmanto, S.Kom. (Pengawas)',
                'email' => 'pengawas1@tesloka.test',
                'password' => $defaultPassword,
                'identity_number' => 'PW2026001',
                'phone' => '+6281298765432',
                'gender' => 'male',
                'status' => 'active',
                'must_change_password' => false,
            ]
        );
        if ($proctorRole && ! $proctor->hasRole('proctor')) {
            $proctor->roles()->syncWithoutDetaching([$proctorRole->id]);
        }

        // Additional Functional Accounts (FULL-FEATURE 3.1)
        $orgUsers = [
            [
                'username' => 'admin_institusi',
                'name' => 'Dr. H. Mulyadi, M.A. (Admin Institusi)',
                'email' => 'admin.institusi@tesloka.test',
                'identity_number' => 'ADM-INS-001',
                'role' => $instAdminRole,
            ],
            [
                'username' => 'koordinator_akademik',
                'name' => 'Dra. Hj. Nurjanah, M.Pd. (Koord. Akademik)',
                'email' => 'koord.akademik@tesloka.test',
                'identity_number' => 'KRD-AKD-001',
                'role' => $acadCoordRole,
            ],
            [
                'username' => 'koordinator_ujian',
                'name' => 'Faisal Rahman, M.Kom. (Koord. Ujian)',
                'email' => 'koord.ujian@tesloka.test',
                'identity_number' => 'KRD-UJN-001',
                'role' => $examCoordRole,
            ],
            [
                'username' => 'operator_akademik',
                'name' => 'Rina Andriani, S.Pd. (Operator Akademik)',
                'email' => 'operator.akademik@tesloka.test',
                'identity_number' => 'OPR-AKD-001',
                'role' => $acadOpRole,
            ],
            [
                'username' => 'korektor1',
                'name' => 'Ustadzah Maryam, M.Ag. (Pemeriksa / Korektor)',
                'email' => 'korektor1@tesloka.test',
                'identity_number' => 'KOR-2026-001',
                'role' => $graderRole,
            ],
            [
                'username' => 'moderator1',
                'name' => 'Dr. Arif Kurniawan, M.Hum. (Moderator Penilaian)',
                'email' => 'moderator1@tesloka.test',
                'identity_number' => 'MOD-2026-001',
                'role' => $gradModRole,
            ],
            [
                'username' => 'penyetuju1',
                'name' => 'Prof. Dr. H. Subagyo (Pejabat Penyetuju / Dekan)',
                'email' => 'penyetuju1@tesloka.test',
                'identity_number' => 'APP-2026-001',
                'role' => $approverRole,
            ],
            [
                'username' => 'auditor1',
                'name' => 'Hendro Prasetyo, S.E., Ak. (Auditor Sistem)',
                'email' => 'auditor1@tesloka.test',
                'identity_number' => 'AUD-2026-001',
                'role' => $auditorRole,
            ],
            [
                'username' => 'teknisi1',
                'name' => 'Dwi Cahyono, S.T. (Petugas Teknis & Lab)',
                'email' => 'teknisi1@tesloka.test',
                'identity_number' => 'TEK-2026-001',
                'role' => $techOfficerRole,
            ],
            [
                'username' => 'helpdesk1',
                'name' => 'Dewi Lestari, A.Md. (Layanan Peserta Helpdesk)',
                'email' => 'helpdesk1@tesloka.test',
                'identity_number' => 'HLP-2026-001',
                'role' => $helpdeskRole,
            ],
        ];

        foreach ($orgUsers as $data) {
            $u = User::updateOrCreate(
                ['username' => $data['username']],
                [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => $defaultPassword,
                    'identity_number' => $data['identity_number'],
                    'status' => 'active',
                    'must_change_password' => false,
                ]
            );
            if ($data['role'] && ! $u->roles->contains($data['role']->id)) {
                $u->roles()->syncWithoutDetaching([$data['role']->id]);
            }
        }

        // 4. Siswa 1 (Profil Lengkap)
        $student1 = User::updateOrCreate(
            ['username' => 'ali_peserta'],
            [
                'name' => 'Muhammad Ali Fikri',
                'email' => 'ali@tesloka.test',
                'password' => $defaultPassword,
                'identity_number' => 'NIM20260001',
                'nik' => '3171010101050001',
                'phone' => '+6285712345678',
                'gender' => 'male',
                'birth_place' => 'Jakarta',
                'birth_date' => '2005-01-01',
                'address' => 'Jl. Ciputat Raya No. 45',
                'city' => 'Jakarta Selatan',
                'province' => 'DKI Jakarta',
                'postal_code' => '12240',
                'status' => 'active',
                'must_change_password' => false,
            ]
        );
        if ($studentRole && ! $student1->hasRole('student')) {
            $student1->roles()->syncWithoutDetaching([$studentRole->id]);
        }

        // 5. Siswa 2 (Profil Belum Lengkap untuk Pengujian Guard)
        $student2 = User::updateOrCreate(
            ['username' => 'fatimah_peserta'],
            [
                'name' => 'Siti Fatimah Az-Zahra',
                'email' => 'fatimah@tesloka.test',
                'password' => $defaultPassword,
                'identity_number' => 'NIM20260002',
                'status' => 'active',
                'must_change_password' => false,
            ]
        );
        if ($studentRole && ! $student2->hasRole('student')) {
            $student2->roles()->syncWithoutDetaching([$studentRole->id]);
        }

        // Penugasan Akademik Contoh
        $class1A = AcademicClass::where('code', 'TIQ-1A')->first();
        $year = AcademicYear::where('name', 'Tahun Akademik 2026/2027')->first();
        $subjThz = Subject::where('code', 'SUBJ-THZ01')->first();
        $term = AcademicTerm::where('code', 'TERM-2026-1')->first();

        if ($class1A && $year) {
            ClassStudentEnrollment::updateOrCreate(
                ['student_id' => $student1->id, 'class_id' => $class1A->id, 'academic_year_id' => $year->id],
                ['status' => 'active']
            );
            ClassStudentEnrollment::updateOrCreate(
                ['student_id' => $student2->id, 'class_id' => $class1A->id, 'academic_year_id' => $year->id],
                ['status' => 'active']
            );
        }

        if ($teacher && $subjThz && $class1A && $term) {
            TeacherSubjectAssignment::updateOrCreate(
                ['teacher_id' => $teacher->id, 'subject_id' => $subjThz->id, 'class_id' => $class1A->id, 'academic_term_id' => $term->id],
                []
            );
        }
    }
}
