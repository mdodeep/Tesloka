<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class QuestionBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'author_id',
        'name',
        'code',
        'description',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function stimuli(): HasMany
    {
        return $this->hasMany(QuestionStimulus::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Menggandakan bank soal beserta stimulus dan seluruh butir soalnya (FULL-FEATURE 6.12).
     */
    public function duplicate(int $newAuthorId, ?string $newName = null): self
    {
        $newBank = self::create([
            'subject_id' => $this->subject_id,
            'author_id' => $newAuthorId,
            'name' => $newName ?? ($this->name.' (Salinan)'),
            'code' => $this->code.'-COPY-'.strtoupper(Str::random(4)),
            'description' => $this->description,
            'is_active' => true,
        ]);

        $stimulusMap = [];
        foreach ($this->stimuli as $stimulus) {
            $newStimulus = QuestionStimulus::create([
                'question_bank_id' => $newBank->id,
                'title' => $stimulus->title,
                'content' => $stimulus->content,
                'media_type' => $stimulus->media_type,
                'media_path' => $stimulus->media_path,
            ]);
            $stimulusMap[$stimulus->id] = $newStimulus->id;
        }

        foreach ($this->questions as $question) {
            $newStimulusId = $question->stimulus_id ? ($stimulusMap[$question->stimulus_id] ?? null) : null;
            $question->duplicate($newBank->id, $newStimulusId);
        }

        return $newBank;
    }
}
