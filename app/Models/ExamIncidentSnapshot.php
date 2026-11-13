<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamIncidentSnapshot extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'exam_incident_log_id',
        'exam_attempt_id',
        'student_id',
        'snapshot_path',
        'file_size_bytes',
        'trigger_reason',
        'metadata',
        'captured_at',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'metadata' => 'array',
            'captured_at' => 'datetime',
            'created_at' => 'datetime',
        ];
    }

    public function incidentLog(): BelongsTo
    {
        return $this->belongsTo(ExamIncidentLog::class, 'exam_incident_log_id');
    }

    public function attempt(): BelongsTo
    {
        return $this->belongsTo(ExamAttempt::class, 'exam_attempt_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function getUrlAttribute(): ?string
    {
        if (! $this->snapshot_path) {
            return null;
        }

        return route('staff.sessions.snapshots.view', $this);
    }
}
