<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamIncidentLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'incident_code',
        'exam_id',
        'exam_session_id',
        'exam_attempt_id',
        'student_id',
        'reported_by_id',
        'event_type',
        'severity',
        'status',
        'description',
        'metadata',
        'action_taken',
        'resolved_at',
        'resolved_by_id',
    ];

    protected function casts(): array
    {
        return [
            'metadata' => 'array',
            'resolved_at' => 'datetime',
        ];
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(ExamSession::class, 'exam_session_id');
    }

    public function attempt(): BelongsTo
    {
        return $this->belongsTo(ExamAttempt::class, 'exam_attempt_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function reportedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by_id');
    }

    public function resolvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'resolved_by_id');
    }

    public function resolve(int $userId, string $actionTaken): void
    {
        $this->update([
            'status' => 'resolved',
            'action_taken' => $actionTaken,
            'resolved_at' => now(),
            'resolved_by_id' => $userId,
        ]);
    }
}
