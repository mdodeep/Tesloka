<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamArchive extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'archived_by_id',
        'archive_code',
        'archived_at',
        'total_examinees',
        'total_submissions',
        'average_score',
        'manifest_data',
        'manifest_checksum',
        'legal_hold',
        'retention_until',
        'archival_notes',
    ];

    protected function casts(): array
    {
        return [
            'archived_at' => 'datetime',
            'legal_hold' => 'boolean',
            'retention_until' => 'date',
            'manifest_data' => 'array',
            'average_score' => 'decimal:2',
            'total_examinees' => 'integer',
            'total_submissions' => 'integer',
        ];
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function archivedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'archived_by_id');
    }
}
