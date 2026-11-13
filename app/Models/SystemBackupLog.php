<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemBackupLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'disk',
        'backup_type',
        'size_bytes',
        'checksum_sha256',
        'status',
        'completed_at',
        'restore_verified',
        'restore_verified_at',
        'restore_notes',
        'error_message',
    ];

    protected function casts(): array
    {
        return [
            'size_bytes' => 'integer',
            'restore_verified' => 'boolean',
            'completed_at' => 'datetime',
            'restore_verified_at' => 'datetime',
        ];
    }

    /**
     * Format ukuran berkas backup ke bentuk KB/MB/GB.
     */
    public function getFormattedSizeAttribute(): string
    {
        $bytes = $this->size_bytes;
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2).' GB';
        }
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2).' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 1).' KB';
        }

        return $bytes.' B';
    }
}
