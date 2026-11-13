<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExamPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'package_code',
        'name',
        'total_questions',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'total_questions' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function packageQuestions(): HasMany
    {
        return $this->hasMany(ExamPackageQuestion::class)->orderBy('order_position');
    }

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class, 'exam_package_questions')
            ->withPivot(['order_position', 'question_snapshot'])
            ->withTimestamps();
    }
}
