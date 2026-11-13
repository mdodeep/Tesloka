<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamPackageQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_package_id',
        'question_id',
        'order_position',
        'question_snapshot',
    ];

    protected function casts(): array
    {
        return [
            'order_position' => 'integer',
            'question_snapshot' => 'array',
        ];
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(ExamPackage::class, 'exam_package_id');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
