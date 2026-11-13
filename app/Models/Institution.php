<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'address',
        'phone',
        'email',
        'logo_path',
        'favicon_path',
        'config',
    ];

    protected function casts(): array
    {
        return [
            'config' => 'array',
        ];
    }

    /**
     * Relasi ke Ujian yang diselenggarakan institusi.
     */
    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class);
    }

    /**
     * URL Logo institusi resmi atau fallback default (FULL-FEATURE 49.2).
     */
    public function getLogoUrlAttribute(): string
    {
        if ($this->logo_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->logo_path)) {
            return \Illuminate\Support\Facades\Storage::disk('public')->url($this->logo_path);
        }

        return asset('assets/images/logo-tesloka-cbt.webp');
    }

    /**
     * URL Favicon institusi resmi atau fallback default (FULL-FEATURE 49.2).
     */
    public function getFaviconUrlAttribute(): string
    {
        if ($this->favicon_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->favicon_path)) {
            return \Illuminate\Support\Facades\Storage::disk('public')->url($this->favicon_path);
        }

        return asset('assets/images/favicon-tesloka-bg-putih.webp');
    }
}
