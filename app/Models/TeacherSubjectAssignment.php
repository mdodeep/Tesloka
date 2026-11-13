<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeacherSubjectAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'subject_id',
        'class_id',
        'academic_term_id',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function classGroup(): BelongsTo
    {
        return $this->belongsTo(AcademicClass::class, 'class_id');
    }

    public function academicTerm(): BelongsTo
    {
        return $this->belongsTo(AcademicTerm::class);
    }
}
