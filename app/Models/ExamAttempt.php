<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'metadata',
    ];

    protected function casts(): array
    {
        return [
            'started_at' => 'datetime',
            'deadline_at' => 'datetime',
            'submitted_at' => 'datetime',
            'question_order' => 'array',
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
     * Periksa apakah waktu pengerjaan server telah habis (FULL-FEATURE 14.4).
     */
    public function isExpired(): bool
    {
        if ($this->status === 'submitted') {
            return true;
        }

        return now()->greaterThan($this->deadline_at);
    }

    /**
     * Hitung sisa detik pengerjaan berdasarkan waktu server.
     */
    public function getRemainingSeconds(): int
    {
        if ($this->status === 'submitted') {
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
        if ($this->status === 'submitted' && $this->submission_receipt) {
            return $this->submission_receipt;
        }

        $receiptCode = 'RCP-'.strtoupper(Str::random(4)).'-'.strtoupper(Str::random(4)).'-'.strtoupper(Str::random(4));

        $this->update([
            'status' => 'submitted',
            'submitted_at' => now(),
            'submission_receipt' => $receiptCode,
            'metadata' => array_merge($this->metadata ?? [], [
                'submit_reason' => $reason,
                'submitted_ip' => request()->ip(),
            ]),
        ]);

        // Perbarui status peserta jika ada
        if ($this->participant) {
            $this->participant->update(['status' => 'completed']);
        }

        AuditLog::record(
            'attempt.submitted',
            $this,
            ['status' => 'in_progress'],
            ['status' => 'submitted', 'receipt' => $receiptCode, 'reason' => $reason],
            "Percobaan ujian #{$this->id} ({$this->student->name}) dikumpulkan dengan bukti tanda terima {$receiptCode}"
        );

        return $receiptCode;
    }

    /**
     * Hitung perolehan nilai dan rincian komponen (Pilihan Ganda vs Esai) (FULL-FEATURE 25 & 30).
     */
    public function getScoreBreakdown(): array
    {
        $mcScore = 0.0;
        $essayScore = 0.0;

        foreach ($this->answers as $ans) {
            $score = (float) ($ans->score ?? 0);
            $type = $ans->packageQuestion?->question?->type;

            if ($type === 'essay') {
                $essayScore += $score;
            } else {
                $mcScore += $score;
            }
        }

        $total = (float) ($this->total_score ?? ($mcScore + $essayScore));

        return [
            'mc_score' => round($mcScore, 2),
            'essay_score' => round($essayScore, 2),
            'total_score' => round($total, 2),
        ];
    }

    /**
     * Predikat huruf nilai standar akademik (FULL-FEATURE 31.2).
     */
    public function getLetterGrade(): string
    {
        $score = (float) ($this->total_score ?? 0);

        return match (true) {
            $score >= 85.0 => 'A',
            $score >= 75.0 => 'B',
            $score >= 65.0 => 'C',
            $score >= 50.0 => 'D',
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
     * Pada mode sertifikasi bahasa atau ujian tanpa KKM, seluruh peserta dianggap tuntas/tersertifikasi.
     */
    public function isPassed(): bool
    {
        if ($this->exam && (! $this->exam->has_passing_grade || $this->exam->isCertification())) {
            return true;
        }

        $kkm = (float) ($this->exam?->passing_grade ?? 75.0);
        $score = (float) ($this->total_score ?? 0);

        return $score >= $kkm;
    }
}
