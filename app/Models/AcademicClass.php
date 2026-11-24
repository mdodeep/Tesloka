<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'academic_year_id',
        'name',
        'code',
        'capacity',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'capacity' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Relasi ke Jurusan/Prodi.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(AcademicDepartment::class, 'department_id');
    }

    /**
     * Relasi ke Tahun Ajaran.
     */
    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }

    /**
     * Relasi ke Enrollment siswa.
     */
    public function enrollments(): HasMany
    {
        return $this->hasMany(ClassStudentEnrollment::class, 'class_id');
    }

    /**
     * Relasi ke Peserta Didik (Siswa murni) di kelas ini.
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'class_student_enrollments', 'class_id', 'student_id')
            ->whereHas('roles', fn ($q) => $q->where('name', 'student'))
            ->whereDoesntHave('roles', fn ($q) => $q->where('name', '!=', 'student'))
            ->withPivot('academic_year_id', 'status')
            ->withTimestamps();
    }
}
