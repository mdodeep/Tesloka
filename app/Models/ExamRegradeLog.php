<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamRegradeLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'requested_by_id',
        'target_question_id',
        'status',
        'regrade_reason',
        'before_summary',
        'after_summary',
        'completed_at',
    ];

    protected function casts(): array
    {
        return [
            'before_summary' => 'array',
            'after_summary' => 'array',
            'completed_at' => 'datetime',
        ];
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by_id');
    }

    public function targetQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'target_question_id');
    }
}
