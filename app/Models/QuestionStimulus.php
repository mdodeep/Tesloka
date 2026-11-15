<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class QuestionStimulus extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_bank_id',
        'title',
        'content',
        'media_type',
        'media_path',
    ];

    public function questionBank(): BelongsTo
    {
        return $this->belongsTo(QuestionBank::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'stimulus_id');
    }

    public function getMediaUrlAttribute(): ?string
    {
        if (empty($this->media_path)) {
            return null;
        }

        return str_starts_with($this->media_path, 'http')
            ? $this->media_path
            : Storage::disk('public')->url($this->media_path);
    }

    public function getTypeAttribute(): ?string
    {
        return $this->media_type;
    }
}
