<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'level',
        'description',
    ];

    /**
     * Relasi ke Rombel / Kelas dalam jurusan/prodi ini.
     */
    public function classes(): HasMany
    {
        return $this->hasMany(AcademicClass::class, 'department_id');
    }

    /**
     * Relasi ke Mata Pelajaran yang bernaung di jurusan ini.
     */
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class, 'department_id');
    }
}
