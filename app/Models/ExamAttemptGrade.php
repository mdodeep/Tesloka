<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamAttemptGrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_attempt_id',
        'grade_version',
        'total_score',
        'max_score',
        'percentage',
        'is_passed',
        'graded_by_id',
        'grading_type',
        'grading_notes',
        'item_breakdown',
    ];

    protected function casts(): array
    {
        return [
            'total_score' => 'decimal:2',
            'max_score' => 'decimal:2',
            'percentage' => 'decimal:2',
            'is_passed' => 'boolean',
            'item_breakdown' => 'array',
        ];
    }

    public function attempt(): BelongsTo
    {
        return $this->belongsTo(ExamAttempt::class, 'exam_attempt_id');
    }

    public function gradedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'graded_by_id');
    }
}
