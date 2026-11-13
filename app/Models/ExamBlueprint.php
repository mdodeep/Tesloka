<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamBlueprint extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'question_bank_id',
        'rules',
        'total_questions',
    ];

    protected function casts(): array
    {
        return [
            'rules' => 'array',
            'total_questions' => 'integer',
        ];
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function questionBank(): BelongsTo
    {
        return $this->belongsTo(QuestionBank::class);
    }
}
