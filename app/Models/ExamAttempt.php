<?php

namespace App\Models;

use App\Services\ScoreScaleService;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExamAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'exam_participant_id',
        'exam_package_id',
        'student_id',
        'attempt_number',
        'status',
        'ip_address',
        'user_agent',
        'started_at',
        'deadline_at',
        'submitted_at',
        'submission_receipt',
        'question_order',
        'total_score',
        'is_graded',
        'device_type',
        'device_label',
        'device_metadata',
        'metadata',
    ];

    protected function casts(): array
    {
        return [
            'started_at' => 'datetime',
            'deadline_at' => 'datetime',
            'submitted_at' => 'datetime',
            'question_order' => 'array',
            'device_metadata' => 'array',
            'metadata' => 'array',
            'is_graded' => 'boolean',
            'total_score' => 'decimal:2',
            'attempt_number' => 'integer',
        ];
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function participant(): BelongsTo
    {
        return $this->belongsTo(ExamParticipant::class, 'exam_participant_id');
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(ExamPackage::class, 'exam_package_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(ExamAttemptAnswer::class);
    }

    public function grades(): HasMany
    {
        return $this->hasMany(ExamAttemptGrade::class);
    }

    public function latestGrade(): HasOne
    {
        return $this->hasOne(ExamAttemptGrade::class, 'exam_attempt_id')->latestOfMany('grade_version');
    }

    public function finalResult(): HasOne
    {
        return $this->hasOne(ExamFinalResult::class, 'exam_attempt_id');
    }

    /**
     * Periksa apakah attempt sudah ditutup (dikumpulkan atau dihentikan paksa oleh pengawas).
     */
    public function isClosed(): bool
    {
        return in_array($this->status, ['submitted', 'terminated'], true);
    }

    /**
     * Periksa apakah waktu pengerjaan server telah habis atau attempt telah ditutup (FULL-FEATURE 14.4).
     */
    public function isExpired(): bool
    {
        if ($this->isClosed()) {
            return true;
        }

        return now()->greaterThan($this->deadline_at);
    }

    /**
     * Hitung sisa detik pengerjaan berdasarkan waktu server.
     */
    public function getRemainingSeconds(): int
    {
        if ($this->isClosed()) {
            return 0;
        }

        $diff = now()->diffInSeconds($this->deadline_at, false);

        return (int) max(0, $diff);
    }

    /**
     * Kumpulkan dan kunci percobaan ujian secara idempoten serta terbitkan tanda terima sah (FULL-FEATURE 15.5 & 16.5).
     */
    public function submit(string $reason = 'manual'): string
    {
        return DB::transaction(function () use ($reason): string {
            /** @var self $locked */
            $locked = self::whereKey($this->id)->lockForUpdate()->firstOrFail();

            if ($locked->status === 'submitted' && $locked->submission_receipt) {
                $this->syncOriginal();
                $this->setRawAttributes($locked->getAttributes(), true);

                return $locked->submission_receipt;
            }

            $receiptCode = 'RCP-'.strtoupper(Str::random(4)).'-'.strtoupper(Str::random(4)).'-'.strtoupper(Str::random(4));

            $locked->update([
                'status' => 'submitted',
                'submitted_at' => now(),
                'submission_receipt' => $receiptCode,
                'metadata' => array_merge($locked->metadata ?? [], [
                    'submit_reason' => $reason,
                    'submitted_ip' => request()->ip(),
                ]),
            ]);

            // Perbarui status peserta jika ada
            if ($locked->participant) {
                $locked->participant->update(['status' => 'completed']);
            }

            AuditLog::record(
                'attempt.submitted',
                $locked,
                ['status' => 'in_progress'],
                ['status' => 'submitted', 'receipt' => $receiptCode, 'reason' => $reason],
                "Percobaan ujian #{$locked->id} ({$locked->student->name}) dikumpulkan dengan bukti tanda terima {$receiptCode}"
            );

            $this->setRawAttributes($locked->getAttributes(), true);

            return $receiptCode;
        });
    }

    /**
     * Hitung perolehan nilai dan rincian komponen (Pilihan Ganda vs Esai) serta bagian bahasa (FULL-FEATURE 25 & 30).
     */
    public function getScoreBreakdown(): array
    {
        $mcScore = 0.0;
        $essayScore = 0.0;
        $maxWeight = 0.0;
        $sectionItems = [];

        foreach ($this->answers as $ans) {
            $score = (float) ($ans->score ?? 0);
            $question = $ans->packageQuestion?->question;
            $snap = is_array($ans->packageQuestion?->question_snapshot) ? $ans->packageQuestion->question_snapshot : [];
            $type = $question?->type ?? ($snap['type'] ?? null);
            $weight = (float) ($question?->weight ?? ($snap['weight'] ?? 1.0));
            $maxWeight += $weight;

            if ($type === 'essay') {
                $essayScore += $score;
            } else {
                $mcScore += $score;
            }

            $sectionItems[] = [
                'section_category' => $snap['section_category'] ?? $question?->section_category ?? ($question?->metadata['section_category'] ?? null),
                'question_bank_name' => $question?->questionBank?->name,
                'stimulus_media_type' => $snap['stimulus']['media_type'] ?? $question?->stimulus?->media_type,
                'weight' => $weight,
                'score_earned' => $score,
                'is_correct' => $score > 0,
            ];
        }

        $total = (float) ($this->total_score ?? ($mcScore + $essayScore));
        $scaleSvc = app(ScoreScaleService::class);
        $exam = $this->exam;

        $savedSections = $this->finalResult?->section_scores ?? $this->latestGrade?->section_scores;
        $categorized = null;
        if ($exam) {
            $categorized = $scaleSvc->calculateCategorizedScores($sectionItems, $exam);
        }

        $sections = ! empty($savedSections) ? $savedSections : ($categorized['sections'] ?? []);
        $savedScaled = $this->finalResult?->scaled_score ?? $this->latestGrade?->scaled_score;
        $scaledScore = $savedScaled !== null
            ? (float) $savedScaled
            : ($exam && ($exam->score_scale ?? 'standard_100') !== 'standard_100'
                ? (float) ($categorized['overall_scaled_score'] ?? $total)
                : round($total, 2));

        $decimals = $scaleSvc->effectiveDecimalPlaces($exam);

        $effectivePercentage = $this->finalResult?->percentage
            ?? $this->latestGrade?->percentage
            ?? ($maxWeight > 0 ? round(($total / $maxWeight) * 100, 2) : $total);

        return [
            'mc_score' => round($mcScore, 2),
            'essay_score' => round($essayScore, 2),
            'total_score' => round($total, 2),
            'max_score' => round($this->finalResult?->max_score ?? $this->latestGrade?->max_score ?? ($maxWeight > 0 ? $maxWeight : 100.0), 2),
            'percentage' => round((float) $effectivePercentage, 2),
            'scaled_score' => round($scaledScore, $decimals),
            'formatted_score' => $scaleSvc->formatScorePlain($scaledScore, $exam),
            'formatted_display_score' => $scaleSvc->formatNumber($scaledScore, $decimals),
            'sections' => $sections,
            'cefr_level' => ($maxWeight > 0 && ! empty($categorized['cefr_level']))
                ? $categorized['cefr_level']
                : ScoreScaleService::mapPercentageToCefr((float) $effectivePercentage),
        ];
    }

    public function getEffectiveDisplayScore(): float
    {
        $breakdown = $this->getScoreBreakdown();

        return (float) $breakdown['scaled_score'];
    }

    public function getFormattedFinalScore(): string
    {
        $breakdown = $this->getScoreBreakdown();

        return (string) $breakdown['formatted_score'];
    }

    public function getSectionScores(): array
    {
        $breakdown = $this->getScoreBreakdown();

        return is_array($breakdown['sections'] ?? null) ? $breakdown['sections'] : [];
    }

    public function getCertificateIssuedAt(): CarbonInterface
    {
        return $this->finalResult?->finalized_at ?? $this->submitted_at ?? $this->created_at ?? now();
    }

    public function getCertificateExpiresAt(): ?CarbonInterface
    {
        if ($this->finalResult?->certificate_expires_at) {
            return $this->finalResult->certificate_expires_at;
        }

        $months = (int) ($this->exam?->certificate_validity_months ?? 0);
        if ($months <= 0) {
            return null;
        }

        return $this->getCertificateIssuedAt()->copy()->addMonths($months);
    }

    public function isCertificateExpired(): bool
    {
        $expiresAt = $this->getCertificateExpiresAt();

        return $expiresAt !== null && now()->greaterThan($expiresAt);
    }

    /**
     * Predikat huruf nilai standar akademik (FULL-FEATURE 31.2).
     */
    public function getLetterGrade(): string
    {
        $percentage = (float) ($this->finalResult?->percentage ?? $this->latestGrade?->percentage ?? 0);
        if ($percentage <= 0 && ($this->exam?->score_scale ?? 'standard_100') === 'standard_100') {
            $percentage = (float) ($this->total_score ?? 0);
        }

        return match (true) {
            $percentage >= 85.0 => 'A',
            $percentage >= 75.0 => 'B',
            $percentage >= 65.0 => 'C',
            $percentage >= 50.0 => 'D',
            default => 'E',
        };
    }

    /**
     * Predikat sebutan verbal (FULL-FEATURE 31.2).
     */
    public function getGradePredicate(): string
    {
        return match ($this->getLetterGrade()) {
            'A' => 'Sangat Memuaskan',
            'B' => 'Memuaskan',
            'C' => 'Cukup',
            'D' => 'Kurang',
            default => 'Sangat Kurang',
        };
    }

    /**
     * Apakah siswa dinyatakan lulus / melampaui KKM (FULL-FEATURE 32.1).
     * Jika ujian menonaktifkan batas KKM (`has_passing_grade === false`), seluruh peserta dianggap lulus/tersertifikasi.
     * Jika batas KKM diaktifkan (termasuk KKM > 100 pada TOEFL/ITP/Bahasa), skor dibandingkan sesuai skala KKM ujian.
     */
    public function isPassed(): bool
    {
        if ($this->exam && ! $this->exam->requiresPassingGrade()) {
            return true;
        }

        if ($this->finalResult !== null && $this->finalResult->is_passed !== null) {
            return (bool) $this->finalResult->is_passed;
        }

        $kkm = (float) ($this->exam?->passing_grade ?? 75.0);
        if (($this->exam?->score_scale ?? 'standard_100') !== 'standard_100' || $kkm > 100) {
            return $this->getEffectiveDisplayScore() >= $kkm;
        }

        $score = (float) ($this->total_score ?? 0);

        return $score >= $kkm;
    }
}
