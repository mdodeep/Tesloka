<?php

namespace Database\Seeders;

use App\Models\AcademicClass;
use App\Models\AcademicTerm;
use App\Models\AcademicYear;
use App\Models\ClassStudentEnrollment;
use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\ExamAttemptAnswer;
use App\Models\ExamAttemptGrade;
use App\Models\ExamFinalResult;
use App\Models\ExamPackage;
use App\Models\ExamPackageQuestion;
use App\Models\ExamParticipant;
use App\Models\ExamProctor;
use App\Models\ExamRoom;
use App\Models\ExamSession;
use App\Models\Institution;
use App\Models\Question;
use App\Models\QuestionBank;
use App\Models\QuestionOption;
use App\Models\QuestionStimulus;
use App\Models\Role;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class RealisticExamSimulationSeeder extends Seeder
{
    /**
     * Jalankan seeder simulasi ujian realistis (Khusus Lingkungan Development / Lokal).
     *
     * Memuat ekosistem CBT nyata: ruang lab komputer, akun siswa aktif ber-NIK/NIM,
     * bank soal 7 tipe lengkap dengan stimulus, perancangan ujian aktif, paket soal snapshot,
     * sesi ruang lab ber-token sah, penugasan pengawas, serta rekaman percobaan pengerjaan ujian nyata:
     * 1. fatimah_peserta (status submitted, skor 92.50, tanda terima RCP-FWUL-WQII-R0ZH, LULUS & sertifikat sah)
     * 2. ali_peserta (status submitted, skor 65.00, tanda terima RCP-NU6Z-B7JT-O1OO, remedial & proteksi 403)
     * 3. siswa01 (status in_progress, timer aktif, pengerjaan real-time di monitoring proctor)
     */
    public function run(bool $forceProduction = false): void
    {
        if ($forceProduction || app()->environment('production')) {
            return;
        }

        $rawPassword = 'Tesloka2026!';
        $password = Hash::make($rawPassword);
        $studentRole = Role::where('name', 'student')->first();
        $adminUser = User::where('username', 'admin')->first() ?? User::first();
        $teacher = User::where('username', 'ahmad_guru')->first() ?? $adminUser;
        $proctorUser = User::where('username', 'pengawas1')->first() ?? $adminUser;

        $institution = Institution::first() ?? Institution::create([
            'name' => 'TESLOKA',
            'code' => 'TESLOKA',
            'email' => 'info@tesloka.web.id',
            'address' => 'Jl. Swakarsa IV',
            'phone' => '+62812 1249 9153',
        ]);

        $year = AcademicYear::where('is_active', true)->first() ?? AcademicYear::first();
        $term = AcademicTerm::where('is_active', true)->first() ?? AcademicTerm::first();
        $class1A = AcademicClass::where('code', 'TIQ-1A')->first() ?? AcademicClass::first();
        $subject = Subject::where('code', 'SUBJ-THZ01')->first() ?? Subject::first();

        // 1. Ruang Ujian Laboratorium Komputer CBT
        $room1 = ExamRoom::updateOrCreate(
            ['code' => 'LAB-CBT-01'],
            [
                'name' => 'Laboratorium Komputer CBT 1',
                'location' => 'Gedung Rektorat Lt. 2',
                'capacity' => 30,
                'is_active' => true,
            ]
        );

        $room2 = ExamRoom::updateOrCreate(
            ['code' => 'LAB-CBT-02'],
            [
                'name' => 'Laboratorium Komputer CBT 2',
                'location' => 'Gedung Rektorat Lt. 3',
                'capacity' => 30,
                'is_active' => true,
            ]
        );

        // 2. Akun Siswa Realistis (siswa01 s.d. siswa10)
        $seededStudents = [];
        for ($i = 1; $i <= 10; $i++) {
            $numStr = str_pad((string) $i, 2, '0', STR_PAD_LEFT);
            $username = "siswa{$numStr}";
            $name = "Peserta Ujian {$numStr}";
            $nim = "NIM2026{$numStr}";
            $email = "siswa{$numStr}@tesloka.test";

            $user = User::updateOrCreate(
                ['username' => $username],
                [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'identity_number' => $nim,
                    'nik' => '31710101010500'.$numStr,
                    'phone' => '+62812000000'.$numStr,
                    'gender' => ($i % 2 === 0) ? 'female' : 'male',
                    'birth_place' => 'Jakarta',
                    'birth_date' => '2005-01-'.$numStr,
                    'address' => "Kompleks Pendidikan No. {$i}",
                    'city' => 'Jakarta Selatan',
                    'province' => 'DKI Jakarta',
                    'postal_code' => '12240',
                    'status' => 'active',
                    'must_change_password' => false,
                    'metadata' => User::mergeExamCardPasswordMetadata(null, $rawPassword),
                ]
            );

            if ($studentRole && ! $user->hasRole('student')) {
                $user->roles()->syncWithoutDetaching([$studentRole->id]);
            }

            if ($class1A && $year) {
                ClassStudentEnrollment::updateOrCreate(
                    ['student_id' => $user->id, 'class_id' => $class1A->id, 'academic_year_id' => $year->id],
                    ['status' => 'active']
                );
            }

            $seededStudents[] = $user;
        }

        // Pastikan ali_peserta dan fatimah_peserta juga memiliki profil lengkap
        $ali = User::where('username', 'ali_peserta')->first();
        if ($ali && $class1A && $year) {
            ClassStudentEnrollment::updateOrCreate(
                ['student_id' => $ali->id, 'class_id' => $class1A->id, 'academic_year_id' => $year->id],
                ['status' => 'active']
            );
        }

        $fatimah = User::where('username', 'fatimah_peserta')->first();
        if ($fatimah) {
            $fatimah->update([
                'identity_number' => 'NIM20260002',
                'nik' => '3201019900010002',
                'phone' => '+6281299998888',
                'gender' => 'female',
                'birth_place' => 'Bandung',
                'birth_date' => '2006-05-12',
                'address' => 'Jl. Pelajar Mandiri No. 12',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'postal_code' => '40115',
                'status' => 'active',
                'must_change_password' => false,
            ]);

            if ($class1A && $year) {
                ClassStudentEnrollment::updateOrCreate(
                    ['student_id' => $fatimah->id, 'class_id' => $class1A->id, 'academic_year_id' => $year->id],
                    ['status' => 'active']
                );
            }
        }

        // 3. Bank Soal & Stimulus Wacana
        $qBank = QuestionBank::updateOrCreate(
            ['code' => 'QB-REALISTIC-2026'],
            [
                'name' => 'Bank Soal Komprehensif Multi-Tipe TESLOKA',
                'subject_id' => $subject?->id,
                'author_id' => $teacher->id,
                'description' => 'Bank soal uji realistis mencakup seluruh tipe soal CBT.',
                'is_active' => true,
            ]
        );

        $stimulus = QuestionStimulus::updateOrCreate(
            ['question_bank_id' => $qBank->id, 'title' => 'Stimulus Wacana: Transformasi Digital CBT'],
            [
                'content' => '<p>Sistem Computer-Based Testing (CBT) modern dirancang untuk menjamin integritas, efisiensi waktu, dan keadilan evaluasi pembelajaran. Dengan persistensi transaksi PostgreSQL ACID dan protokol autosave idempotent berbasis sequence-guard, integritas jawaban peserta terlindungi secara optimal bahkan dalam kondisi fluktuasi jaringan kampus.</p>',
                'media_type' => 'text',
            ]
        );

        // 4. Tujuh Tipe Butir Soal Komprehensif
        $questionsData = [
            [
                'code' => 'Q-MC-001',
                'type' => 'multiple_choice',
                'content' => '<p>Komponen database apakah yang menjadi <strong>Single Source of Truth</strong> permanen untuk seluruh jawaban dan nilai pada TESLOKA CBT?</p>',
                'difficulty' => 'easy',
                'weight' => 15.0,
                'options' => [
                    ['key' => 'A', 'content' => 'Browser LocalStorage', 'is_correct' => false],
                    ['key' => 'B', 'content' => 'Redis Memory Cache', 'is_correct' => false],
                    ['key' => 'C', 'content' => 'PostgreSQL ACID Relational Database', 'is_correct' => true],
                    ['key' => 'D', 'content' => 'Session Cookie Client', 'is_correct' => false],
                ],
            ],
            [
                'code' => 'Q-MCC-002',
                'type' => 'multiple_choice_complex',
                'content' => '<p>Pilihlah <strong>DUA</strong> parameter utama yang wajib dikirim dalam request HTTP Autosave TESLOKA untuk menjamin prinsip Sequence Guard & Anti-Overwrite!</p>',
                'difficulty' => 'medium',
                'weight' => 20.0,
                'options' => [
                    ['key' => 'A', 'content' => 'Nomor Urut Transaksi (Sequence Number)', 'is_correct' => true],
                    ['key' => 'B', 'content' => 'Idempotency Key (UUID v4 unik)', 'is_correct' => true],
                    ['key' => 'C', 'content' => 'Nilai Baterai Klien Laptop', 'is_correct' => false],
                    ['key' => 'D', 'content' => 'Resolusi Layar Browser', 'is_correct' => false],
                ],
            ],
            [
                'code' => 'Q-TF-003',
                'type' => 'true_false',
                'content' => '<p>Waktu hitung mundur ujian (Timer) pada TESLOKA sepenuhnya dikendalikan oleh jam server institusi dan kebal terhadap manipulasi jam sistem klien.</p>',
                'difficulty' => 'easy',
                'weight' => 10.0,
                'options' => [
                    ['key' => 'A', 'content' => 'BENAR (True)', 'is_correct' => true],
                    ['key' => 'B', 'content' => 'SALAH (False)', 'is_correct' => false],
                ],
            ],
            [
                'code' => 'Q-SA-004',
                'type' => 'short_answer',
                'content' => '<p>Sebutkan algoritma hashing kriptografis standar yang digunakan TESLOKA untuk menghasilkan Resi Tanda Terima Submit (Cryptographic Submit Receipt)!</p>',
                'difficulty' => 'medium',
                'weight' => 15.0,
                'options' => [
                    ['key' => 'A', 'content' => 'SHA-256', 'is_correct' => true],
                ],
            ],
            [
                'code' => 'Q-MAT-005',
                'type' => 'matching',
                'content' => '<p>Pasangkan peran pengguna dengan fungsi utamanya pada sistem TESLOKA CBT:</p>',
                'difficulty' => 'hard',
                'weight' => 15.0,
                'options' => [
                    ['key' => 'Pengawas Ruang', 'content' => 'Monitoring waktu nyata dan penanganan insiden peserta', 'pair_match' => 'Monitoring & Proctoring', 'is_correct' => true],
                    ['key' => 'Guru / Dosen', 'content' => 'Penyusunan bank soal, kisi-kisi, dan penilaian esai', 'pair_match' => 'Penyusunan Butir Soal', 'is_correct' => true],
                    ['key' => 'Administrator', 'content' => 'Manajemen pengguna, audit log, backup, dan pengaturan branding', 'pair_match' => 'Tata Kelola Sistem', 'is_correct' => true],
                ],
            ],
            [
                'code' => 'Q-STM-006',
                'type' => 'multiple_choice',
                'content' => '<p>Berdasarkan wacana stimulus di samping, mekanisme apakah yang menjamin agar jawaban lama yang terlambat sampai tidak menimpa jawaban baru peserta?</p>',
                'difficulty' => 'medium',
                'weight' => 10.0,
                'stimulus_id' => $stimulus->id,
                'options' => [
                    ['key' => 'A', 'content' => 'Polling WebSocket', 'is_correct' => false],
                    ['key' => 'B', 'content' => 'Protokol Sequence Guard', 'is_correct' => true],
                    ['key' => 'C', 'content' => 'Local IndexedDB Mirror', 'is_correct' => false],
                    ['key' => 'D', 'content' => 'Force Restart Peramban', 'is_correct' => false],
                ],
            ],
            [
                'code' => 'Q-ES-007',
                'type' => 'essay',
                'content' => '<p>Jelaskan secara komprehensif mengapa pengawasan video kamera real-time WebRTC SFU (LiveKit) dipisahkan secara operasional dari server database aplikasi utama!</p>',
                'difficulty' => 'hard',
                'weight' => 15.0,
                'options' => [],
            ],
        ];

        $seededQuestions = [];
        foreach ($questionsData as $qData) {
            $q = Question::updateOrCreate(
                [
                    'question_bank_id' => $qBank->id,
                    'code' => $qData['code'],
                ],
                [
                    'type' => $qData['type'],
                    'content' => $qData['content'],
                    'difficulty' => $qData['difficulty'],
                    'weight' => $qData['weight'],
                    'stimulus_id' => $qData['stimulus_id'] ?? null,
                    'status' => 'approved',
                    'version' => 1,
                    'is_rtl' => false,
                ]
            );

            if (! empty($qData['options'])) {
                $q->options()->delete();
                foreach ($qData['options'] as $oIdx => $opt) {
                    QuestionOption::create([
                        'question_id' => $q->id,
                        'option_key' => $opt['key'],
                        'content' => $opt['content'],
                        'is_correct' => $opt['is_correct'],
                        'pair_match' => $opt['pair_match'] ?? null,
                        'order_position' => $oIdx + 1,
                    ]);
                }
            }
            $seededQuestions[] = $q;
        }

        // 5. Perancangan Ujian Aktif
        $exam = Exam::updateOrCreate(
            ['code' => 'EXAM-REALISTIC-2026'],
            [
                'institution_id' => $institution->id,
                'title' => 'Simulasi Ujian Komprehensif Multi-Siswa & Multi-Tipe',
                'subject_id' => $subject?->id,
                'academic_year_id' => $year?->id,
                'academic_term_id' => $term?->id,
                'creator_id' => $adminUser->id,
                'exam_type' => 'final_exam',
                'duration_minutes' => 90,
                'passing_grade' => 75.0,
                'scheduled_start' => now()->subHours(1),
                'scheduled_end' => now()->addHours(3),
                'status' => 'ongoing',
                'randomize_questions' => false,
                'randomize_options' => false,
                'show_result_on_finish' => true,
                'camera_proctoring_enabled' => false,
                'fullscreen_lock_enabled' => false,
                'seb_required' => false,
                'max_attempts' => 1,
                'published_by_id' => $adminUser->id,
                'published_at' => now()->subHours(1),
            ]
        );

        // 6. Paket Soal & Snapshot Lengkap
        $package = ExamPackage::updateOrCreate(
            ['exam_id' => $exam->id, 'package_code' => 'PKG-REAL-A'],
            [
                'name' => 'Paket Utama Komprehensif Varian A',
                'is_active' => true,
                'total_questions' => count($seededQuestions),
            ]
        );

        $package->packageQuestions()->delete();
        $packageQuestions = [];
        foreach ($seededQuestions as $oIdx => $q) {
            $q->load('options', 'stimulus');

            $optionsSnapshot = $q->options->map(function ($opt) {
                return [
                    'id' => $opt->id,
                    'key' => $opt->option_key,
                    'display_key' => $opt->option_key,
                    'content' => $opt->content,
                    'pair_match' => $opt->pair_match,
                    'is_correct' => (bool) $opt->is_correct,
                ];
            })->values()->toArray();

            $snapshot = [
                'id' => $q->id,
                'type' => $q->type,
                'content' => $q->content,
                'difficulty' => $q->difficulty,
                'weight' => (float) $q->weight,
                'is_rtl' => false,
                'options' => $optionsSnapshot,
                'stimulus' => $q->stimulus ? [
                    'id' => $q->stimulus->id,
                    'title' => $q->stimulus->title,
                    'content' => $q->stimulus->content,
                ] : null,
            ];

            $pq = ExamPackageQuestion::create([
                'exam_package_id' => $package->id,
                'question_id' => $q->id,
                'order_position' => $oIdx + 1,
                'question_snapshot' => $snapshot,
            ]);
            $packageQuestions[] = $pq;
        }

        // 7. Sesi Ujian Aktif di Lab CBT 1 dengan Token TSL0K1
        $session = ExamSession::updateOrCreate(
            ['exam_id' => $exam->id, 'session_code' => 'SESI-REAL-01'],
            [
                'name' => 'Sesi 1 — Laboratorium Komputer CBT',
                'exam_room_id' => $room1->id,
                'start_time' => now()->subMinutes(30),
                'end_time' => now()->addHours(2),
                'token' => 'TSL0K1',
                'status' => 'active',
            ]
        );

        ExamProctor::updateOrCreate(
            ['exam_session_id' => $session->id, 'proctor_id' => $proctorUser->id],
            ['role_title' => 'Pengawas Utama']
        );

        // 8. Pendaftaran Seluruh Siswa ke Sesi Ujian
        $allStudents = array_merge(
            $seededStudents,
            array_filter([$ali, $fatimah])
        );

        $participantsMap = [];
        foreach ($allStudents as $stu) {
            $part = ExamParticipant::updateOrCreate(
                ['exam_session_id' => $session->id, 'student_id' => $stu->id],
                [
                    'exam_id' => $exam->id,
                    'exam_package_id' => $package->id,
                    'status' => 'registered',
                ]
            );
            $participantsMap[$stu->username] = $part;
        }

        // 9. Rekaman Percobaan Ujian Nyata (Exam Attempts & Results)

        // Skenario A: fatimah_peserta (Lulus Sah, Skor 92.50, Resi RCP-FWUL-WQII-R0ZH)
        if ($fatimah) {
            $fatimahPart = $participantsMap['fatimah_peserta'] ?? null;
            $fatimahAttempt = ExamAttempt::updateOrCreate(
                [
                    'exam_id' => $exam->id,
                    'student_id' => $fatimah->id,
                    'attempt_number' => 1,
                ],
                [
                    'exam_participant_id' => $fatimahPart?->id,
                    'exam_package_id' => $package->id,
                    'status' => 'submitted',
                    'ip_address' => '127.0.0.1',
                    'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/120.0.0.0',
                    'started_at' => now()->subMinutes(45),
                    'deadline_at' => now()->addMinutes(45),
                    'submitted_at' => now()->subMinutes(10),
                    'submission_receipt' => 'RCP-FWUL-WQII-R0ZH',
                    'total_score' => 92.50,
                    'is_graded' => true,
                    'question_order' => array_map(fn ($pq) => $pq->id, $packageQuestions),
                    'metadata' => [
                        'submit_reason' => 'manual',
                        'submitted_ip' => '127.0.0.1',
                        'browser' => 'Chrome',
                    ],
                ]
            );

            // Simpan jawaban lengkap Fatimah
            $fatimahAnswersData = [
                ['score' => 15.00, 'payload' => ['selected_option' => 'C'], 'feedback' => 'Tepat sekali.'],
                ['score' => 20.00, 'payload' => ['selected_options' => ['A', 'B']], 'feedback' => 'Dua parameter sequence guard benar.'],
                ['score' => 10.00, 'payload' => ['selected_option' => 'A'], 'feedback' => 'Benar, timer dikendalikan server.'],
                ['score' => 15.00, 'payload' => ['text' => 'SHA-256'], 'feedback' => 'Algoritma hashing tepat.'],
                ['score' => 15.00, 'payload' => ['matches' => ['Pengawas Ruang' => 'Monitoring & Proctoring', 'Guru / Dosen' => 'Penyusunan Butir Soal', 'Administrator' => 'Tata Kelola Sistem']], 'feedback' => 'Semua pasangan benar.'],
                ['score' => 10.00, 'payload' => ['selected_option' => 'B'], 'feedback' => 'Sesuai wacana stimulus.'],
                ['score' => 7.50, 'payload' => ['text' => 'Pemisahan SFU LiveKit dari database CBT bertujuan untuk mencegah beban bandwidth streaming tinggi mengganggu transaksi write PostgreSQL.'], 'feedback' => 'Penjelasan baik, poin utama tersampaikan.'],
            ];

            foreach ($packageQuestions as $idx => $pq) {
                $ansData = $fatimahAnswersData[$idx] ?? ['score' => 10.0, 'payload' => ['text' => 'Jawaban']];
                ExamAttemptAnswer::updateOrCreate(
                    [
                        'exam_attempt_id' => $fatimahAttempt->id,
                        'exam_package_question_id' => $pq->id,
                    ],
                    [
                        'answer_payload' => $ansData['payload'],
                        'revision_sequence' => 1,
                        'is_flagged' => false,
                        'is_answered' => true,
                        'server_saved_at' => now()->subMinutes(15),
                        'client_timestamp' => now()->subMinutes(15),
                        'score' => $ansData['score'],
                        'feedback' => $ansData['feedback'] ?? null,
                    ]
                );
            }

            ExamAttemptGrade::updateOrCreate(
                [
                    'exam_attempt_id' => $fatimahAttempt->id,
                    'grade_version' => 1,
                ],
                [
                    'total_score' => 92.50,
                    'max_score' => 100.00,
                    'percentage' => 92.50,
                    'is_passed' => true,
                    'graded_by_id' => $adminUser->id,
                    'grading_type' => 'final',
                    'grading_notes' => 'Penilaian otomatis dan esai telah divalidasi.',
                ]
            );

            ExamFinalResult::updateOrCreate(
                [
                    'exam_attempt_id' => $fatimahAttempt->id,
                ],
                [
                    'exam_id' => $exam->id,
                    'student_id' => $fatimah->id,
                    'total_score' => 92.50,
                    'max_score' => 100.00,
                    'percentage' => 92.50,
                    'passing_grade' => 75.00,
                    'is_passed' => true,
                    'final_grade_letter' => 'A',
                    'effective_score' => 92.50,
                    'status' => 'finalized',
                    'finalized_by_id' => $adminUser->id,
                    'finalized_at' => now()->subMinutes(5),
                    'notes' => 'Dinyatakan LULUS dengan predikat Sangat Memuaskan.',
                ]
            );

            $fatimahPart?->update(['status' => 'completed']);
            Cache::forget('pub_cert_verify_v3_'.md5('rcp-fwul-wqii-r0zh'));
        }

        // Skenario B: ali_peserta (Remedial / Belum Lulus, Skor 65.00, Resi RCP-NU6Z-B7JT-O1OO)
        if ($ali) {
            $aliPart = $participantsMap['ali_peserta'] ?? null;
            $aliAttempt = ExamAttempt::updateOrCreate(
                [
                    'exam_id' => $exam->id,
                    'student_id' => $ali->id,
                    'attempt_number' => 1,
                ],
                [
                    'exam_participant_id' => $aliPart?->id,
                    'exam_package_id' => $package->id,
                    'status' => 'submitted',
                    'ip_address' => '127.0.0.1',
                    'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/120.0.0.0',
                    'started_at' => now()->subMinutes(50),
                    'deadline_at' => now()->addMinutes(40),
                    'submitted_at' => now()->subMinutes(5),
                    'submission_receipt' => 'RCP-NU6Z-B7JT-O1OO',
                    'total_score' => 65.00,
                    'is_graded' => true,
                    'question_order' => array_map(fn ($pq) => $pq->id, $packageQuestions),
                    'metadata' => [
                        'submit_reason' => 'manual',
                        'submitted_ip' => '127.0.0.1',
                        'browser' => 'Chrome',
                    ],
                ]
            );

            // Simpan jawaban Ali (skor total 65)
            $aliAnswersData = [
                ['score' => 15.00, 'payload' => ['selected_option' => 'C']],
                ['score' => 20.00, 'payload' => ['selected_options' => ['A', 'B']]],
                ['score' => 10.00, 'payload' => ['selected_option' => 'A']],
                ['score' => 0.00, 'payload' => ['text' => 'MD5']], // Salah
                ['score' => 10.00, 'payload' => ['matches' => ['Pengawas Ruang' => 'Monitoring & Proctoring', 'Guru / Dosen' => 'Penyusunan Butir Soal']]],
                ['score' => 10.00, 'payload' => ['selected_option' => 'B']],
                ['score' => 0.00, 'payload' => ['text' => 'Kurang paham detail teknis LiveKit.']],
            ];

            foreach ($packageQuestions as $idx => $pq) {
                $ansData = $aliAnswersData[$idx] ?? ['score' => 0.0, 'payload' => []];
                ExamAttemptAnswer::updateOrCreate(
                    [
                        'exam_attempt_id' => $aliAttempt->id,
                        'exam_package_question_id' => $pq->id,
                    ],
                    [
                        'answer_payload' => $ansData['payload'],
                        'revision_sequence' => 1,
                        'is_flagged' => false,
                        'is_answered' => true,
                        'server_saved_at' => now()->subMinutes(10),
                        'client_timestamp' => now()->subMinutes(10),
                        'score' => $ansData['score'],
                    ]
                );
            }

            ExamAttemptGrade::updateOrCreate(
                [
                    'exam_attempt_id' => $aliAttempt->id,
                    'grade_version' => 1,
                ],
                [
                    'total_score' => 65.00,
                    'max_score' => 100.00,
                    'percentage' => 65.00,
                    'is_passed' => false,
                    'graded_by_id' => $adminUser->id,
                    'grading_type' => 'final',
                    'grading_notes' => 'Nilai di bawah KKM 75.0, disarankan mengikuti sesi remedial.',
                ]
            );

            ExamFinalResult::updateOrCreate(
                [
                    'exam_attempt_id' => $aliAttempt->id,
                ],
                [
                    'exam_id' => $exam->id,
                    'student_id' => $ali->id,
                    'total_score' => 65.00,
                    'max_score' => 100.00,
                    'percentage' => 65.00,
                    'passing_grade' => 75.00,
                    'is_passed' => false,
                    'final_grade_letter' => 'C',
                    'effective_score' => 65.00,
                    'status' => 'finalized',
                    'finalized_by_id' => $adminUser->id,
                    'finalized_at' => now()->subMinutes(3),
                    'notes' => 'BELUM LULUS (Perlu Remedial).',
                ]
            );

            $aliPart?->update(['status' => 'completed']);
            Cache::forget('pub_cert_verify_v3_'.md5('rcp-nu6z-b7jt-o1oo'));
        }

        // Skenario C: siswa01 (Sedang Mengerjakan / In-Progress, Timer Berjalan)
        $siswa01 = $seededStudents[0] ?? null;
        if ($siswa01) {
            $s01Part = $participantsMap['siswa01'] ?? null;
            $s01Attempt = ExamAttempt::updateOrCreate(
                [
                    'exam_id' => $exam->id,
                    'student_id' => $siswa01->id,
                    'attempt_number' => 1,
                ],
                [
                    'exam_participant_id' => $s01Part?->id,
                    'exam_package_id' => $package->id,
                    'status' => 'in_progress',
                    'ip_address' => '127.0.0.1',
                    'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/120.0.0.0',
                    'started_at' => now()->subMinutes(15),
                    'deadline_at' => now()->addMinutes(75),
                    'submitted_at' => null,
                    'submission_receipt' => null,
                    'total_score' => null,
                    'is_graded' => false,
                    'question_order' => array_map(fn ($pq) => $pq->id, $packageQuestions),
                    'metadata' => [
                        'started_ip' => '127.0.0.1',
                        'browser' => 'Chrome',
                    ],
                ]
            );

            // Simpan jawaban autosave parsial untuk 2 butir soal
            if (! empty($packageQuestions[0])) {
                ExamAttemptAnswer::updateOrCreate(
                    [
                        'exam_attempt_id' => $s01Attempt->id,
                        'exam_package_question_id' => $packageQuestions[0]->id,
                    ],
                    [
                        'answer_payload' => ['selected_option' => 'C'],
                        'revision_sequence' => 1,
                        'is_flagged' => false,
                        'is_answered' => true,
                        'server_saved_at' => now()->subMinutes(10),
                        'client_timestamp' => now()->subMinutes(10),
                    ]
                );
            }

            if (! empty($packageQuestions[1])) {
                ExamAttemptAnswer::updateOrCreate(
                    [
                        'exam_attempt_id' => $s01Attempt->id,
                        'exam_package_question_id' => $packageQuestions[1]->id,
                    ],
                    [
                        'answer_payload' => ['selected_options' => ['A', 'B']],
                        'revision_sequence' => 1,
                        'is_flagged' => true,
                        'is_answered' => true,
                        'server_saved_at' => now()->subMinutes(5),
                        'client_timestamp' => now()->subMinutes(5),
                    ]
                );
            }

            $s01Part?->update(['status' => 'in_progress']);
        }
    }
}
