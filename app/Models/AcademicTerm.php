<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcademicTerm extends Model
{
    use HasFactory;

    protected $fillable = [
        'academic_year_id',
        'name',
        'code',
        'is_active',
        'start_date',
        'end_date',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    /**
     * Relasi ke Tahun Ajaran induk.
     */
    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
