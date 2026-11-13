<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class ExamSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'exam_room_id',
        'name',
        'session_code',
        'start_time',
        'end_time',
        'token',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'start_time' => 'datetime',
            'end_time' => 'datetime',
        ];
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(ExamRoom::class, 'exam_room_id');
    }

    public function proctors(): HasMany
    {
        return $this->hasMany(ExamProctor::class);
    }

    public function participants(): HasMany
    {
        return $this->hasMany(ExamParticipant::class);
    }

    public function incidents(): HasMany
    {
        return $this->hasMany(ExamIncidentLog::class, 'exam_session_id');
    }

    /**
     * Bangkitkan token rilis ujian baru (6 karakter alfanumerik) (FULL-FEATURE 10.4).
     */
    public function generateToken(): string
    {
        $this->token = strtoupper(Str::random(6));
        $this->save();

        return $this->token;
    }
}
