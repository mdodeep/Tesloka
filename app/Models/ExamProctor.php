<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamProctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_session_id',
        'proctor_id',
        'role_title',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(ExamSession::class, 'exam_session_id');
    }

    public function proctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'proctor_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'proctor_id');
    }
}
