<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
