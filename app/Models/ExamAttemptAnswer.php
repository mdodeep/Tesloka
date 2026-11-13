<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamAttemptAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_attempt_id',
        'exam_package_question_id',
        'answer_payload',
        'revision_sequence',
        'is_flagged',
        'is_answered',
        'server_saved_at',
        'client_timestamp',
        'score',
        'feedback',
    ];

    protected function casts(): array
    {
        return [
            'answer_payload' => 'array',
            'revision_sequence' => 'integer',
            'is_flagged' => 'boolean',
            'is_answered' => 'boolean',
            'server_saved_at' => 'datetime',
            'client_timestamp' => 'datetime',
            'score' => 'decimal:2',
        ];
    }

    public function attempt(): BelongsTo
    {
        return $this->belongsTo(ExamAttempt::class, 'exam_attempt_id');
    }

    public function packageQuestion(): BelongsTo
    {
        return $this->belongsTo(ExamPackageQuestion::class, 'exam_package_question_id');
    }
}
