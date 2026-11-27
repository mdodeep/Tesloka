<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamFinalResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'student_id',
        'exam_attempt_id',
        'total_score',
        'scaled_score',
        'section_scores',
        'max_score',
        'percentage',
        'passing_grade',
        'is_passed',
        'final_grade_letter',
        'effective_score',
        'status',
        'finalized_by_id',
        'finalized_at',
        'certificate_expires_at',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'total_score' => 'decimal:2',
            'scaled_score' => 'decimal:2',
            'section_scores' => 'array',
            'max_score' => 'decimal:2',
            'percentage' => 'decimal:2',
            'passing_grade' => 'decimal:2',
            'effective_score' => 'decimal:2',
            'is_passed' => 'boolean',
            'finalized_at' => 'datetime',
            'certificate_expires_at' => 'datetime',
        ];
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function attempt(): BelongsTo
    {
        return $this->belongsTo(ExamAttempt::class, 'exam_attempt_id');
    }

    public function finalizedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'finalized_by_id');
    }

    public static function calculateLetter(float $percentage): string
    {
        if ($percentage >= 85) {
            return 'A';
        }
        if ($percentage >= 75) {
            return 'B';
        }
        if ($percentage >= 60) {
            return 'C';
        }
        if ($percentage >= 50) {
            return 'D';
        }

        return 'E';
    }
}
