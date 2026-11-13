<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionVersion extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'question_id',
        'version_number',
        'author_id',
        'snapshot',
        'change_summary',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'version_number' => 'integer',
            'snapshot' => 'array',
            'created_at' => 'datetime',
        ];
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
