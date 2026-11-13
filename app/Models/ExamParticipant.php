<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'exam_session_id',
        'student_id',
        'exam_package_id',
        'seat_number',
        'time_extension_percent',
        'accommodation_notes',
        'needs_scribe',
        'scribe_name',
        'scribe_nik',
        'scribe_phone',
        'scribe_pledge',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'time_extension_percent' => 'integer',
            'needs_scribe' => 'boolean',
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

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(ExamPackage::class, 'exam_package_id');
    }

    public function attempts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExamAttempt::class, 'exam_participant_id');
    }
}
