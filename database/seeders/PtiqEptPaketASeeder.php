<?php

namespace Database\Seeders;

use App\Models\AcademicDepartment;
use App\Models\AcademicYear;
use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\ExamPackage;
use App\Models\ExamPackageQuestion;
use App\Models\ExamParticipant;
use App\Models\ExamRoom;
use App\Models\ExamSession;
use App\Models\Institution;
use App\Models\QuestionBank;
use App\Models\Subject;
use App\Models\User;
use App\Services\QuestionImportService;
use Illuminate\Database\Seeder;

class PtiqEptPaketASeeder extends Seeder
{
    /**
     * Run the database seeds for PTIQ English Proficiency Test Paket A.
     */
    public function run(): void
    {
        $department = AcademicDepartment::first();
        if (! $department) {
            $department = AcademicDepartment::create([
                'code' => 'DEPT-PTIQ-01',
                'name' => 'Fakultas Ushuluddin',
            ]);
        }

        $subject = Subject::firstOrCreate(
            ['code' => 'SUBJ-ENG01'],
            [
                'department_id' => $department->id,
                'name' => 'Bahasa Inggris (PTIQ English Proficiency Test)',
                'description' => 'Mata uji kemahiran Bahasa Inggris akademik untuk asesmen institusional TOEFL ITP-Style Universitas PTIQ Jakarta.',
                'is_active' => true,
            ]
        );

        $author = User::whereHas('roles', fn ($q) => $q->where('name', 'superadmin'))->first() ?? User::first();
        if (! $author) {
            $author = User::factory()->create([
                'name' => 'Administrator CBT',
                'email' => 'admin@tesloka.test',
            ]);
        }
        $authorId = $author->id;

        // Bersihkan data bank soal lama jika ada agar idempotent
        $existing = QuestionBank::where('code', 'QB-PTIQ-EPT-A')->first();
        if ($existing) {
            $existing->questions()->delete();
            $existing->stimuli()->delete();
            $existing->delete();
        }

        $questionBank = QuestionBank::create([
            'subject_id' => $subject->id,
            'author_id' => $authorId,
            'code' => 'QB-PTIQ-EPT-A',
            'name' => 'PTIQ English Proficiency Test (Paket A - 140 Soal)',
            'description' => 'Paket A Lengkap (140 Butir) PTIQ English Proficiency Test - TOEFL ITP Style Internal Assessment Universitas PTIQ Jakarta.',
            'is_active' => true,
        ]);

        $zipPath = base_path('Soal/PTIQ_EPT_Paket_A_Media_Bundle.zip');
        if (file_exists($zipPath)) {
            $service = new QuestionImportService;
            $service->importZip($zipPath, $questionBank, $authorId);
        }

        // ==========================================
        // KONFIGURASI UJIAN RESMI LENGKAP (140 BUTIR)
        // ==========================================
        $institution = Institution::first();
        $academicYear = AcademicYear::first();
        if (! $institution || ! $academicYear) {
            return;
        }

        $questions = $questionBank->questions()->with(['stimulus', 'options'])->orderBy('id', 'asc')->get();
        if ($questions->isEmpty()) {
            return;
        }

        // 1. Buat / Perbarui Model Ujian Resmi PTIQ
        $exam = Exam::updateOrCreate(
            ['code' => 'EXAM-PTIQ-EPT-A'],
            [
                'institution_id' => $institution->id,
                'creator_id' => $authorId,
                'academic_year_id' => $academicYear->id,
                'subject_id' => $subject->id,
                'title' => 'PTIQ English Proficiency Test (Paket A - 140 Soal Lengkap)',
                'exam_type' => 'uas',
                'duration_minutes' => 115,
                'passing_grade' => 450.00,
                'status' => 'published',
                'randomize_questions' => false,
                'randomize_options' => false,
                'show_result_on_finish' => true,
                'published_by_id' => $authorId,
                'published_at' => now(),
            ]
        );

        // 2. Buat Paket Soal Utama Lengkap 140 Butir
        $package = ExamPackage::updateOrCreate(
            ['exam_id' => $exam->id, 'package_code' => 'PKG-PTIQ-A-FULL'],
            [
                'name' => 'Paket Lengkap PTIQ EPT (140 Butir)',
                'is_active' => true,
                'total_questions' => $questions->count(),
            ]
        );

        $package->packageQuestions()->delete();
        $createdPqIds = [];

        foreach ($questions as $idx => $q) {
            $snapshotOptions = $q->options->map(function ($opt) {
                return [
                    'id' => $opt->id,
                    'key' => $opt->option_key,
                    'display_key' => $opt->option_key,
                    'content' => $opt->content,
                    'is_correct' => $opt->is_correct,
                    'weight_ratio' => (float) $opt->weight_ratio,
                ];
            });

            $snapshot = [
                'question_id' => $q->id,
                'code' => $q->code,
                'type' => $q->type,
                'content' => $q->content,
                'media_path' => $q->media_path,
                'media_type' => $q->media_type,
                'media_url' => $q->media_url,
                'difficulty' => $q->difficulty,
                'weight' => (float) $q->weight,
                'explanation' => $q->explanation,
                'is_rtl' => (bool) $q->is_rtl,
                'version' => $q->version,
                'stimulus' => $q->stimulus ? [
                    'id' => $q->stimulus->id,
                    'title' => $q->stimulus->title,
                    'type' => $q->stimulus->media_type,
                    'media_type' => $q->stimulus->media_type,
                    'content' => $q->stimulus->content,
                    'media_url' => $q->stimulus->media_url,
                    'media_path' => $q->stimulus->media_path,
                ] : null,
                'options' => $snapshotOptions->toArray(),
            ];

            $pq = ExamPackageQuestion::create([
                'exam_package_id' => $package->id,
                'question_id' => $q->id,
                'order_position' => $idx + 1,
                'question_snapshot' => $snapshot,
            ]);
            $createdPqIds[] = $pq->id;
        }

        // 3. Ruang Ujian & Sesi Aktif Ber-token
        $room = ExamRoom::firstOrCreate(
            ['code' => 'LAB-PTIQ-01'],
            ['name' => 'Lab Komputer Bahasa 1', 'capacity' => 25, 'is_active' => true]
        );

        $session = ExamSession::updateOrCreate(
            ['session_code' => 'SES-PTIQ-EPT-01'],
            [
                'exam_id' => $exam->id,
                'exam_room_id' => $room->id,
                'name' => 'Sesi Resmi PTIQ EPT Paket A (140 Soal)',
                'start_time' => now()->subMinutes(15),
                'end_time' => now()->addHours(4),
                'token' => 'TESLOK',
                'status' => 'active',
            ]
        );

        // 4. Daftarkan Peserta Ujian Contoh (ali_peserta) dengan Percobaan 140 Soal
        $student = User::where('username', 'ali_peserta')->first();
        if ($student) {
            $participant = ExamParticipant::updateOrCreate(
                ['exam_session_id' => $session->id, 'student_id' => $student->id],
                [
                    'exam_id' => $exam->id,
                    'exam_package_id' => $package->id,
                    'seat_number' => 'A-01',
                    'status' => 'registered',
                ]
            );

            ExamAttempt::where('exam_participant_id', $participant->id)->delete();

            ExamAttempt::create([
                'exam_id' => $exam->id,
                'exam_participant_id' => $participant->id,
                'exam_package_id' => $package->id,
                'student_id' => $student->id,
                'attempt_number' => 1,
                'status' => 'in_progress',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 Seeder',
                'started_at' => now(),
                'deadline_at' => now()->addMinutes(115),
                'question_order' => $createdPqIds,
            ]);
        }
    }
}
