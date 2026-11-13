<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_bank_id',
        'stimulus_id',
        'code',
        'type',
        'content',
        'difficulty',
        'weight',
        'explanation',
        'status',
        'version',
        'is_rtl',
        'scoring_rules',
        'metadata',
    ];

    protected function casts(): array
    {
        return [
            'weight' => 'decimal:2',
            'version' => 'integer',
            'is_rtl' => 'boolean',
            'scoring_rules' => 'array',
            'metadata' => 'array',
        ];
    }

    public function questionBank(): BelongsTo
    {
        return $this->belongsTo(QuestionBank::class);
    }

    public function stimulus(): BelongsTo
    {
        return $this->belongsTo(QuestionStimulus::class, 'stimulus_id');
    }

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class)->orderBy('order_position');
    }

    public function versions(): HasMany
    {
        return $this->hasMany(QuestionVersion::class)->orderByDesc('version_number');
    }

    /**
     * Membentuk snapshot data butir soal yang mandiri dan tidak berubah (FULL-FEATURE 6.11).
     */
    public function createSnapshot(): array
    {
        $this->loadMissing(['stimulus', 'options']);

        return [
            'question_id' => $this->id,
            'code' => $this->code,
            'type' => $this->type,
            'content' => $this->content,
            'difficulty' => $this->difficulty,
            'weight' => (float) $this->weight,
            'explanation' => $this->explanation,
            'is_rtl' => (bool) $this->is_rtl,
            'version' => (int) $this->version,
            'scoring_rules' => $this->scoring_rules ?? [],
            'metadata' => $this->metadata ?? [],
            'stimulus' => $this->stimulus ? [
                'id' => $this->stimulus->id,
                'title' => $this->stimulus->title,
                'content' => $this->stimulus->content,
                'media_type' => $this->stimulus->media_type,
                'media_path' => $this->stimulus->media_path,
            ] : null,
            'options' => $this->options->map(fn ($opt) => [
                'id' => $opt->id,
                'option_key' => $opt->option_key,
                'content' => $opt->content,
                'is_correct' => (bool) $opt->is_correct,
                'weight_ratio' => (float) $opt->weight_ratio,
                'pair_match' => $opt->pair_match,
                'order_position' => (int) $opt->order_position,
            ])->toArray(),
            'snapshot_at' => now()->toIso8601String(),
        ];
    }

    /**
     * Menyimpan rekaman versi soal baru ketika terjadi perubahan signifikan.
     */
    public function saveVersion(?string $summary = null, ?int $authorId = null): QuestionVersion
    {
        $snapshot = $this->createSnapshot();

        return QuestionVersion::create([
            'question_id' => $this->id,
            'version_number' => $this->version,
            'author_id' => $authorId,
            'snapshot' => $snapshot,
            'change_summary' => $summary ?? "Pembaruan versi {$this->version}",
            'created_at' => now(),
        ]);
    }

    /**
     * Memulihkan butir soal ke versi terdahulu (FULL-FEATURE 6.11).
     */
    public function restoreVersion(int $versionNumber): bool
    {
        $version = $this->versions()->where('version_number', $versionNumber)->first();
        if (! $version || empty($version->snapshot)) {
            return false;
        }

        $snapshot = $version->snapshot;

        DB::transaction(function () use ($snapshot) {
            $this->update([
                'content' => $snapshot['content'],
                'type' => $snapshot['type'],
                'difficulty' => $snapshot['difficulty'],
                'weight' => $snapshot['weight'],
                'explanation' => $snapshot['explanation'] ?? null,
                'is_rtl' => $snapshot['is_rtl'] ?? false,
                'scoring_rules' => $snapshot['scoring_rules'] ?? null,
                'metadata' => $snapshot['metadata'] ?? null,
                'version' => $this->version + 1,
            ]);

            // Pulihkan opsi
            $this->options()->delete();
            if (! empty($snapshot['options'])) {
                foreach ($snapshot['options'] as $opt) {
                    QuestionOption::create([
                        'question_id' => $this->id,
                        'option_key' => $opt['option_key'],
                        'content' => $opt['content'],
                        'is_correct' => $opt['is_correct'],
                        'weight_ratio' => $opt['weight_ratio'] ?? 0,
                        'pair_match' => $opt['pair_match'] ?? null,
                        'order_position' => $opt['order_position'] ?? 0,
                    ]);
                }
            }

            $this->saveVersion("Dipulihkan dari Versi #{$snapshot['version']}");
        });

        return true;
    }

    /**
     * Menggandakan soal menghasilkan ID dan kode baru (FULL-FEATURE 6.12).
     */
    public function duplicate(?int $newBankId = null, ?int $newStimulusId = null): self
    {
        $this->loadMissing('options');

        $clone = self::create([
            'question_bank_id' => $newBankId ?? $this->question_bank_id,
            'stimulus_id' => $newStimulusId ?? $this->stimulus_id,
            'code' => ($this->code ?? 'Q').'-CLONE-'.strtoupper(Str::random(4)),
            'type' => $this->type,
            'content' => $this->content,
            'difficulty' => $this->difficulty,
            'weight' => $this->weight,
            'explanation' => $this->explanation,
            'status' => 'draft',
            'version' => 1,
            'is_rtl' => $this->is_rtl,
            'scoring_rules' => $this->scoring_rules,
            'metadata' => $this->metadata,
        ]);

        foreach ($this->options as $option) {
            QuestionOption::create([
                'question_id' => $clone->id,
                'option_key' => $option->option_key,
                'content' => $option->content,
                'is_correct' => $option->is_correct,
                'weight_ratio' => $option->weight_ratio,
                'pair_match' => $option->pair_match,
                'order_position' => $option->order_position,
            ]);
        }

        $clone->saveVersion('Inisialisasi duplikasi butir soal');

        return $clone;
    }

    /**
     * Menghitung rasio kemiripan konten untuk peringatan potensi duplikasi (FULL-FEATURE 6.12).
     */
    public function checkSimilarity(string $comparisonText): float
    {
        similar_text(
            strip_tags(mb_strtolower($this->content)),
            strip_tags(mb_strtolower($comparisonText)),
            $percent
        );

        return round($percent, 2);
    }
}
