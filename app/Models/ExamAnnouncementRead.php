<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamAnnouncementRead extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'exam_announcement_id',
        'student_id',
        'read_at',
    ];

    protected function casts(): array
    {
        return [
            'read_at' => 'datetime',
        ];
    }

    public function announcement(): BelongsTo
    {
        return $this->belongsTo(ExamAnnouncement::class, 'exam_announcement_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
