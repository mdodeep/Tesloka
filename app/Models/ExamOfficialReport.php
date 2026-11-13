<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamOfficialReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'exam_session_id',
        'exam_room_id',
        'lead_proctor_id',
        'registered_count',
        'attended_count',
        'absent_count',
        'general_notes',
        'is_signed',
        'signed_by_id',
        'signed_at',
    ];

    protected function casts(): array
    {
        return [
            'is_signed' => 'boolean',
            'signed_at' => 'datetime',
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

    public function room(): BelongsTo
    {
        return $this->belongsTo(ExamRoom::class, 'exam_room_id');
    }

    public function leadProctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'lead_proctor_id');
    }

    public function signedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'signed_by_id');
    }
}
