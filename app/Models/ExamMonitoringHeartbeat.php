<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamMonitoringHeartbeat extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'exam_attempt_id',
        'student_id',
        'exam_id',
        'connection_status',
        'is_fullscreen',
        'is_tab_focused',
        'battery_level',
        'camera_status',
        'device_telemetry',
        'recorded_at',
    ];

    protected function casts(): array
    {
        return [
            'is_fullscreen' => 'boolean',
            'is_tab_focused' => 'boolean',
            'device_telemetry' => 'array',
            'recorded_at' => 'datetime',
        ];
    }

    public function attempt(): BelongsTo
    {
        return $this->belongsTo(ExamAttempt::class, 'exam_attempt_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }
}
