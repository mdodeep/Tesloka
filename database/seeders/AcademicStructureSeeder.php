<?php

namespace Database\Seeders;

use App\Models\AcademicClass;
use App\Models\AcademicDepartment;
use App\Models\AcademicTerm;
use App\Models\AcademicYear;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class AcademicStructureSeeder extends Seeder
{
    public function run(bool $forceProduction = false): void
    {
        if ($forceProduction || app()->environment('production')) {
            return;
        }
        // Tahun Ajaran
        $year = AcademicYear::updateOrCreate(
            ['name' => 'Tahun Akademik 2026/2027'],
            [
                'start_date' => '2026-08-01',
                'end_date' => '2027-07-31',
                'is_active' => true,
            ]
        );

        // Semester
        AcademicTerm::updateOrCreate(
            ['academic_year_id' => $year->id, 'code' => 'TERM-2026-1'],
            [
                'name' => 'Semester Ganjil 2026/2027',
                'start_date' => '2026-08-01',
                'end_date' => '2026-12-31',
                'is_active' => true,
            ]
        );

        // Jurusan / Departemen
        $deptQurani = AcademicDepartment::updateOrCreate(
            ['code' => 'TIQ'],
            [
                'name' => 'Tafsir dan Ilmu Al-Qur\'an',
                'level' => 'S1',
                'description' => 'Program Studi Sarjana Ilmu Al-Qur\'an dan Tafsir',
            ]
        );

        $deptSyariah = AcademicDepartment::updateOrCreate(
            ['code' => 'SYR'],
            [
                'name' => 'Hukum Islam & Syariah',
                'level' => 'S1',
                'description' => 'Program Studi Sarjana Hukum Ekonomi Syariah',
            ]
        );

        // Kelas / Rombel (Kapasitas 30 sesuai DEC-001)
        AcademicClass::updateOrCreate(
            ['code' => 'TIQ-1A'],
            [
                'department_id' => $deptQurani->id,
                'academic_year_id' => $year->id,
                'name' => 'Kelas TIQ 1-A (Reguler)',
                'capacity' => 30,
            ]
        );

        AcademicClass::updateOrCreate(
            ['code' => 'TIQ-1B'],
            [
                'department_id' => $deptQurani->id,
                'academic_year_id' => $year->id,
                'name' => 'Kelas TIQ 1-B (Reguler)',
                'capacity' => 30,
            ]
        );

        // Mata Pelajaran / Kuliah
        Subject::updateOrCreate(
            ['code' => 'SUBJ-THZ01'],
            [
                'department_id' => $deptQurani->id,
                'name' => 'Tahfidz & Qira\'at Sab\'ah',
                'description' => 'Mata kuliah hafalan dan qira\'at standar Tesloka',
                'is_active' => true,
            ]
        );

        Subject::updateOrCreate(
            ['code' => 'SUBJ-ULQ01'],
            [
                'department_id' => $deptQurani->id,
                'name' => 'Ulumul Qur\'an & Metodologi Tafsir',
                'description' => 'Mata kuliah metodologi dan kaidah tafsir',
                'is_active' => true,
            ]
        );

        Subject::updateOrCreate(
            ['code' => 'SUBJ-ARB01'],
            [
                'department_id' => $deptQurani->id,
                'name' => 'Kaidah Bahasa Arab & Nahwu Sharaf',
                'description' => 'Mata kuliah tata bahasa Arab aplikatif',
                'is_active' => true,
            ]
        );
    }
}
