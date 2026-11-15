<?php

namespace Database\Seeders;

use App\Models\AcademicDepartment;
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

        $author = User::first();
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
    }
}
