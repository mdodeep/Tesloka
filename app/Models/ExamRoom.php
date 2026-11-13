<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExamRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'location',
        'capacity',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'capacity' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (ExamRoom $room) {
            // DEC-001: Batas kapasitas ruang ujian maksimum 30 peserta
            if ($room->capacity > 30) {
                throw new \InvalidArgumentException('Pelanggaran DEC-001: Kapasitas ruang ujian tidak boleh melebihi 30 peserta.');
            }
        });
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(ExamSession::class);
    }
}
