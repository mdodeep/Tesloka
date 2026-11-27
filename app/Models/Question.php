<?php

namespace App\Models;

use App\Services\MediaStorageService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_bank_id',
        'stimulus_id',
        'section_category',
        'code',
        'type',
        'content',
        'media_type',
        'media_path',
        'difficulty',
        'weight',
        'explanation',
        'status',
        'version',
        'is_rtl',
        'scoring_rules',
        'metadata',
    ];

    protected $appends = [
        'media_url',
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

    public function storedFiles(): MorphMany
    {
        return $this->morphMany(StoredFile::class, 'attachable');
    }

    public function getMediaUrlAttribute(): ?string
    {
        return MediaStorageService::resolveMediaUrl($this->media_path);
    }

    /**
     * Memetakan label opsi pilihan ganda menjadi huruf Arab (Hijaiyah / Abjadiyah) untuk soal RTL.
     */
    public static function formatOptionLabel(string $key, bool $isRtl = false, string $style = 'arabic_hijaiyah'): string
    {
        $normalized = strtoupper(trim($key));
        if (! $isRtl || $style === 'latin') {
            return $normalized;
        }

        $maps = [
            'arabic_hijaiyah' => [
                'A' => 'أ',
                'B' => 'ب',
                'C' => 'ت',
                'D' => 'ث',
                'E' => 'ج',
                'F' => 'ح',
                'G' => 'خ',
                'H' => 'د',
            ],
            'arabic_abjadiyah' => [
                'A' => 'أ',
                'B' => 'ب',
                'C' => 'ج',
                'D' => 'د',
                'E' => 'هـ',
                'F' => 'و',
                'G' => 'ز',
                'H' => 'ح',
            ],
        ];

        $selectedMap = $maps[$style] ?? $maps['arabic_hijaiyah'];

        return $selectedMap[$normalized] ?? $normalized;
    }

    /**
     * Gaya penomoran opsi Arab efektif pada butir soal (override soal atau default ujian).
     */
    public function getEffectiveRtlOptionStyle(?string $examDefault = null): string
    {
        $meta = is_array($this->metadata) ? $this->metadata : [];
        $override = $meta['rtl_option_style'] ?? null;

        if (in_array($override, ['arabic_hijaiyah', 'arabic_abjadiyah', 'latin'], true)) {
            return $override;
        }

        return in_array($examDefault, ['arabic_hijaiyah', 'arabic_abjadiyah', 'latin'], true)
            ? $examDefault
            : 'arabic_hijaiyah';
    }

    /**
     * Batas pemutaran audio khusus butir soal (null = ikuti aturan ujian, 0 = tak terbatas).
     */
    public function getAudioMaxPlaysOverride(): ?int
    {
        $meta = is_array($this->metadata) ? $this->metadata : [];
        if (! array_key_exists('audio_max_plays', $meta) || $meta['audio_max_plays'] === null || $meta['audio_max_plays'] === '') {
            return null;
        }

        return max(0, (int) $meta['audio_max_plays']);
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
            'media_type' => $this->media_type,
            'media_path' => $this->media_path,
            'media_url' => $this->media_url,
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
                'media_url' => $this->stimulus->media_url,
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
