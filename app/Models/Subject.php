<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'code',
        'name',
        'description',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Relasi ke Jurusan/Prodi pengampu (opsional).
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(AcademicDepartment::class, 'department_id');
    }

    /**
     * Relasi ke Bank Soal yang bernaung di bawah mata pelajaran ini.
     */
    public function questionBanks(): HasMany
    {
        return $this->hasMany(QuestionBank::class);
    }

    /**
     * Relasi ke Ujian yang menggunakan mata pelajaran ini.
     */
    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class);
    }
}
