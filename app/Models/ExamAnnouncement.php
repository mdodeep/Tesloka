<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExamAnnouncement extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'exam_session_id',
        'sender_id',
        'title',
        'message',
        'target_type',
        'target_id',
        'priority',
        'requires_acknowledgement',
        'is_active',
        'expires_at',
    ];

    protected function casts(): array
    {
        return [
            'requires_acknowledgement' => 'boolean',
            'is_active' => 'boolean',
            'expires_at' => 'datetime',
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

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function reads(): HasMany
    {
        return $this->hasMany(ExamAnnouncementRead::class, 'exam_announcement_id');
    }

    public function isReadBy(int $studentId): bool
    {
        return $this->reads()->where('student_id', $studentId)->exists();
    }
}
