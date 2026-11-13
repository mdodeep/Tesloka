<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamLivekitRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_session_id',
        'room_name',
        'sfu_provider',
        'server_url',
        'status',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(ExamSession::class, 'exam_session_id');
    }
}
