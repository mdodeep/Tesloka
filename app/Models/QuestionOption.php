<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'option_key',
        'content',
        'is_correct',
        'weight_ratio',
        'pair_match',
        'order_position',
    ];

    protected function casts(): array
    {
        return [
            'is_correct' => 'boolean',
            'weight_ratio' => 'decimal:4',
            'order_position' => 'integer',
        ];
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
