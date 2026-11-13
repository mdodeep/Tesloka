<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamProctorAction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'exam_id',
        'exam_attempt_id',
        'proctor_id',
        'action_type',
        'reason',
        'payload',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'payload' => 'array',
            'created_at' => 'datetime',
        ];
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function attempt(): BelongsTo
    {
        return $this->belongsTo(ExamAttempt::class, 'exam_attempt_id');
    }

    public function proctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'proctor_id');
    }
}
