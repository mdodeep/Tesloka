<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution_id',
        'academic_year_id',
        'academic_term_id',
        'subject_id',
        'creator_id',
        'title',
        'code',
        'description',
        'exam_type',
        'duration_minutes',
        'passing_grade',
        'scheduled_start',
        'scheduled_end',
        'status',
        'randomize_questions',
        'randomize_options',
        'show_result_on_finish',
        'camera_proctoring_enabled',
        'fullscreen_lock_enabled',
        'seb_required',
        'seb_config_key',
        'seb_quit_password',
        'max_attempts',
        'is_simulation',
        'rules_config',
        'parent_exam_id',
        'published_by_id',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'duration_minutes' => 'integer',
            'passing_grade' => 'decimal:2',
            'scheduled_start' => 'datetime',
            'scheduled_end' => 'datetime',
            'published_at' => 'datetime',
            'randomize_questions' => 'boolean',
            'randomize_options' => 'boolean',
            'show_result_on_finish' => 'boolean',
            'camera_proctoring_enabled' => 'boolean',
            'fullscreen_lock_enabled' => 'boolean',
            'seb_required' => 'boolean',
            'is_simulation' => 'boolean',
            'max_attempts' => 'integer',
            'rules_config' => 'array',
        ];
    }

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function academicTerm(): BelongsTo
    {
        return $this->belongsTo(AcademicTerm::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'published_by_id');
    }

    public function blueprints(): HasMany
    {
        return $this->hasMany(ExamBlueprint::class);
    }

    public function packages(): HasMany
    {
        return $this->hasMany(ExamPackage::class);
    }

    public function examSessions(): HasMany
    {
        return $this->hasMany(ExamSession::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(ExamSession::class);
    }

    public function participants(): HasMany
    {
        return $this->hasMany(ExamParticipant::class);
    }

    public function attempts(): HasMany
    {
        return $this->hasMany(ExamAttempt::class);
    }

    public function parentExam(): BelongsTo
    {
        return $this->belongsTo(Exam::class, 'parent_exam_id');
    }

    public function remedials(): HasMany
    {
        return $this->hasMany(Exam::class, 'parent_exam_id');
    }

    /**
     * Jalankan validasi pra-publikasi otomatis (FULL-FEATURE 12.2).
     *
     * @return array{is_valid: bool, critical_errors: string[], warnings: string[]}
     */
    public function validatePrePublish(): array
    {
        $criticalErrors = [];
        $warnings = [];

        // 1. Validasi Data Ujian
        if (empty($this->title)) {
            $criticalErrors[] = 'Judul ujian wajib diisi.';
        }
        if ($this->duration_minutes <= 0) {
            $criticalErrors[] = 'Durasi ujian harus lebih besar dari 0 menit.';
        }
        if ($this->passing_grade < 0 || $this->passing_grade > 100) {
            $criticalErrors[] = 'Nilai batas kelulusan (KKM) harus berada di antara 0 dan 100.';
        }
        if ($this->scheduled_start && $this->scheduled_end && $this->scheduled_end->lte($this->scheduled_start)) {
            $criticalErrors[] = 'Waktu jadwal selesai harus setelah waktu jadwal mulai.';
        }

        // 2. Validasi Blueprint & Bank Soal
        $blueprints = $this->blueprints()->with('questionBank.questions.options')->get();
        if ($blueprints->isEmpty()) {
            $criticalErrors[] = 'Ujian belum memiliki cetak biru (blueprint) kisi-kisi soal.';
        } else {
            $totalBlueprintQuestions = 0;
            foreach ($blueprints as $bp) {
                $totalBlueprintQuestions += $bp->total_questions;
                $bank = $bp->questionBank;

                if (! $bank) {
                    $criticalErrors[] = "Bank soal terkait pada blueprint #{$bp->id} tidak ditemukan.";

                    continue;
                }

                $availableQuestions = $bank->questions()->where('status', '!=', 'archived')->get();
                if ($availableQuestions->count() < $bp->total_questions) {
                    $criticalErrors[] = "Bank soal '{$bank->name}' hanya memiliki {$availableQuestions->count()} butir soal aktif, kurang dari kebutuhan blueprint ({$bp->total_questions} butir).";
                }

                // Periksa ketersediaan kunci jawaban pada soal objektif
                foreach ($availableQuestions as $q) {
                    if (in_array($q->type, ['multiple_choice', 'true_false'])) {
                        $hasCorrect = $q->options->contains(fn ($opt) => (bool) $opt->is_correct);
                        if (! $hasCorrect) {
                            $criticalErrors[] = "Soal {$q->code} dalam bank '{$bank->name}' belum memiliki kunci jawaban benar.";
                        }
                    }
                }
            }

            if ($totalBlueprintQuestions === 0) {
                $criticalErrors[] = 'Total butir soal yang diatur dalam blueprint masih 0.';
            }
        }

        // 3. Peringatan Opsional (Warnings)
        if (! $this->scheduled_start) {
            $warnings[] = 'Jadwal pelaksanaan belum ditentukan (ujian dapat dimulai secara fleksibel).';
        }

        $isValid = empty($criticalErrors);

        $hasBaseConfig = ! empty($this->title) && $this->duration_minutes > 0 && $this->passing_grade >= 0 && $this->passing_grade <= 100;
        $hasBlueprints = $blueprints->isNotEmpty() && ($totalBlueprintQuestions ?? 0) > 0;
        $hasSufficientQuota = $blueprints->isNotEmpty() && ! collect($criticalErrors)->contains(fn ($err) => str_contains($err, 'kurang dari kebutuhan blueprint'));
        $hasAnswerKeys = ! collect($criticalErrors)->contains(fn ($err) => str_contains($err, 'belum memiliki kunci jawaban benar'));
        $hasPackages = $this->packages()->exists();

        $checklist = [
            [
                'label' => 'Konfigurasi parameter dasar (judul, durasi, KKM)',
                'passed' => $hasBaseConfig,
            ],
            [
                'label' => 'Cetak biru (blueprint) kisi-kisi soal terkonfigurasi',
                'passed' => $hasBlueprints,
            ],
            [
                'label' => 'Ketersediaan kuota butir soal pada bank soal aktif',
                'passed' => $hasSufficientQuota,
            ],
            [
                'label' => 'Kelengkapan kunci jawaban butir soal objektif',
                'passed' => $hasAnswerKeys,
            ],
            [
                'label' => 'Varian paket soal snapshot terisolasi terbentuk',
                'passed' => $hasPackages,
            ],
        ];

        return [
            'is_valid' => $isValid,
            'critical_errors' => $criticalErrors,
            'errors' => $criticalErrors,
            'warnings' => $warnings,
            'checklist' => $checklist,
        ];
    }

    /**
     * Bangkitkan paket-paket soal terisolasi berdasarkan blueprint kisi-kisi (FULL-FEATURE 9.3 & 9.7).
     *
     * @return Collection<int, ExamPackage>
     */
    public function generatePackages(int $packageCount = 1, bool $shuffleOptions = true)
    {
        $blueprints = $this->blueprints()->with(['questionBank.questions' => function ($q) {
            $q->where('status', '!=', 'archived')->with(['options', 'stimulus']);
        }])->get();

        if ($blueprints->isEmpty()) {
            throw new \RuntimeException('Tidak dapat membentuk paket soal tanpa cetak biru (blueprint).');
        }

        $packageLetters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        $createdPackages = collect();

        DB::transaction(function () use ($packageCount, $blueprints, $packageLetters, &$createdPackages, $shuffleOptions) {
            for ($pIdx = 0; $pIdx < $packageCount; $pIdx++) {
                $packageLetter = $packageLetters[$pIdx] ?? ('V'.($pIdx + 1));
                $packageCode = "{$this->code}-PKG-{$packageLetter}";

                // Hapus paket dengan kode yang sama jika ada sebelumnya untuk regenerasi bersih
                $existingPackage = $this->packages()->where('package_code', $packageCode)->first();
                if ($existingPackage) {
                    $existingPackage->packageQuestions()->delete();
                    $existingPackage->delete();
                }

                $package = ExamPackage::create([
                    'exam_id' => $this->id,
                    'package_code' => $packageCode,
                    'name' => "Paket {$packageLetter}",
                    'total_questions' => 0,
                    'is_active' => true,
                ]);

                $selectedQuestions = collect();

                foreach ($blueprints as $bp) {
                    $bankQuestions = $bp->questionBank->questions;

                    // Filter berdasarkan rules blueprint jika ada (misal per difficulty)
                    $rules = $bp->rules ?? [];
                    if (! empty($rules['difficulty'])) {
                        $bankQuestions = $bankQuestions->where('difficulty', $rules['difficulty']);
                    }
                    if (! empty($rules['type'])) {
                        $bankQuestions = $bankQuestions->where('type', $rules['type']);
                    }

                    // Ambil sejumlah total_questions secara acak
                    $pool = $bankQuestions->shuffle();
                    $picked = $pool->take($bp->total_questions);
                    $selectedQuestions = $selectedQuestions->concat($picked);
                }

                // Acak urutan butir soal jika dikonfigurasi
                if ($this->randomize_questions) {
                    $selectedQuestions = $selectedQuestions->shuffle();
                }

                $orderPosition = 1;
                foreach ($selectedQuestions as $q) {
                    $snapshotOptions = $q->options->map(function ($opt) {
                        return [
                            'id' => $opt->id,
                            'key' => $opt->option_key,
                            'content' => $opt->content,
                            'is_correct' => (bool) $opt->is_correct,
                            'weight_ratio' => (float) $opt->weight_ratio,
                            'pair_match' => $opt->pair_match,
                            'order_position' => $opt->order_position,
                        ];
                    });

                    // Acak urutan opsi jawaban jika diaktifkan (FULL-FEATURE 9.5)
                    if ($shuffleOptions && $this->randomize_options && in_array($q->type, ['multiple_choice', 'multiple_choice_complex'])) {
                        $snapshotOptions = $snapshotOptions->shuffle()->values()->map(function ($opt, $idx) use ($packageLetters) {
                            $opt['display_key'] = $packageLetters[$idx] ?? $opt['key'];

                            return $opt;
                        });
                    }

                    $snapshot = [
                        'question_id' => $q->id,
                        'code' => $q->code,
                        'type' => $q->type,
                        'content' => $q->content,
                        'difficulty' => $q->difficulty,
                        'weight' => (float) $q->weight,
                        'explanation' => $q->explanation,
                        'is_rtl' => (bool) $q->is_rtl,
                        'version' => $q->version,
                        'stimulus' => $q->stimulus ? [
                            'id' => $q->stimulus->id,
                            'title' => $q->stimulus->title,
                            'type' => $q->stimulus->media_type,
                            'media_type' => $q->stimulus->media_type,
                            'content' => $q->stimulus->content,
                            'media_url' => $q->stimulus->media_url,
                            'media_path' => $q->stimulus->media_path,
                        ] : null,
                        'options' => $snapshotOptions->toArray(),
                    ];

                    ExamPackageQuestion::create([
                        'exam_package_id' => $package->id,
                        'question_id' => $q->id,
                        'order_position' => $orderPosition++,
                        'question_snapshot' => $snapshot,
                    ]);
                }

                $package->update(['total_questions' => $selectedQuestions->count()]);
                $createdPackages->push($package);
            }
        });

        return $createdPackages;
    }

    /**
     * Gandakan konfigurasi ujian beserta cetak biru kisi-kisinya (FULL-FEATURE 8.3).
     */
    public function duplicate(): self
    {
        $clone = $this->replicate([
            'published_by_id',
            'published_at',
        ]);

        $clone->code = 'EXAM-'.strtoupper(Str::random(6));
        $clone->title = "{$this->title} (Salinan)";
        $clone->status = 'draft';
        $clone->save();

        foreach ($this->blueprints as $bp) {
            $clone->blueprints()->create([
                'question_bank_id' => $bp->question_bank_id,
                'rules' => $bp->rules,
                'total_questions' => $bp->total_questions,
            ]);
        }

        return $clone;
    }

    /**
     * Relasi ke hasil akhir resmi siswa untuk ujian ini (FULL-FEATURE 31).
     */
    public function finalResults(): HasMany
    {
        return $this->hasMany(ExamFinalResult::class);
    }
}
