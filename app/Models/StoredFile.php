<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class StoredFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploaded_by_id',
        'disk',
        'storage_path',
        'original_name',
        'mime_type',
        'size_bytes',
        'sha256_hash',
        'visibility',
        'attachable_type',
        'attachable_id',
        'metadata',
    ];

    protected function casts(): array
    {
        return [
            'size_bytes' => 'integer',
            'metadata' => 'array',
        ];
    }

    public function uploadedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by_id');
    }

    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }

    public function isImage(): bool
    {
        return str_starts_with($this->mime_type, 'image/');
    }

    public function isAudio(): bool
    {
        return str_starts_with($this->mime_type, 'audio/');
    }

    public function isVideo(): bool
    {
        return str_starts_with($this->mime_type, 'video/');
    }

    public function isPdf(): bool
    {
        return $this->mime_type === 'application/pdf';
    }

    /**
     * Format ukuran berkas ke bentuk yang mudah dibaca (KB, MB).
     */
    public function getFormattedSizeAttribute(): string
    {
        $bytes = $this->size_bytes;
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2).' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 1).' KB';
        }

        return $bytes.' B';
    }
}
