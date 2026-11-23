<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class StoredFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploaded_by_id',
        'disk',
        'storage_path',
        'original_name',
        'mime_type',
        'size_bytes',
        'sha256_hash',
        'visibility',
        'attachable_type',
        'attachable_id',
        'metadata',
    ];

    protected function casts(): array
    {
        return [
            'size_bytes' => 'integer',
            'metadata' => 'array',
        ];
    }

    public function uploadedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by_id');
    }

    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }

    public function isImage(): bool
    {
        return str_starts_with($this->mime_type, 'image/');
    }

    public function isAudio(): bool
    {
        return str_starts_with($this->mime_type, 'audio/');
    }

    public function isVideo(): bool
    {
        return str_starts_with($this->mime_type, 'video/');
    }

    public function isPdf(): bool
    {
        return $this->mime_type === 'application/pdf';
    }

    /**
     * Format ukuran berkas ke bentuk yang mudah dibaca (KB, MB).
     */
    public function getFormattedSizeAttribute(): string
    {
        $bytes = $this->size_bytes;
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2).' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 1).' KB';
        }

        return $bytes.' B';
    }

    /**
     * URL akses berkas (stream route atau public url).
     */
    public function getUrlAttribute(): string
    {
        if ($this->disk === 'public') {
            return '/storage/'.ltrim($this->storage_path, '/');
        }

        return route('media.stream', $this, false);
    }

    /**
     * Informasi pelacakan penggunaan berkas di wacana stimulus dan butir soal.
     */
    public function getUsageDetails(): array
    {
        // 1. Periksa dari relasi attachable
        $attachable = $this->attachable;

        // 2. Jika belum ada attachable eksplisit, telusuri QuestionStimulus dan Question berdasarkan storage_path / nama file
        if (! $attachable) {
            $baseName = basename($this->storage_path);
            $stimulus = QuestionStimulus::where('media_path', $this->storage_path)
                ->orWhere('media_path', 'like', '%'.$baseName)
                ->first();

            if ($stimulus) {
                $attachable = $stimulus;
            } else {
                $question = Question::where('media_path', $this->storage_path)
                    ->orWhere('media_path', 'like', '%'.$baseName)
                    ->orWhere('content', 'like', '%'.$baseName.'%')
                    ->first();
                if ($question) {
                    $attachable = $question;
                }
            }
        }

        if ($attachable instanceof QuestionStimulus) {
            $questions = $attachable->questions()->select('id', 'code', 'content')->get();
            $questionList = [];
            foreach ($questions as $q) {
                $num = null;
                if (preg_match('/(\d+)$/', $q->code, $m)) {
                    $num = (int) $m[1];
                }
                $questionList[] = [
                    'id' => $q->id,
                    'code' => $q->code,
                    'label' => $num ? "Soal #{$num}" : $q->code,
                    'edit_url' => route('staff.questions.edit', $q->id),
                    'show_url' => route('staff.questions.show', $q->id),
                ];
            }

            $labelItems = array_column($questionList, 'label');
            $labelStr = ! empty($labelItems) ? implode(', ', $labelItems) : 'Belum ada butir soal';

            return [
                'is_used' => true,
                'type' => 'stimulus',
                'target_title' => $attachable->title,
                'stimulus_id' => $attachable->id,
                'questions_count' => count($questionList),
                'questions' => $questionList,
                'summary' => "Wacana Stimulus '{$attachable->title}' (".count($questionList)." Soal: {$labelStr})",
            ];
        }

        if ($attachable instanceof Question) {
            $num = null;
            if (preg_match('/(\d+)$/', $attachable->code, $m)) {
                $num = (int) $m[1];
            }
            $label = $num ? "Soal #{$num} ({$attachable->code})" : $attachable->code;

            return [
                'is_used' => true,
                'type' => 'question',
                'target_code' => $attachable->code,
                'target_title' => $label,
                'question_id' => $attachable->id,
                'questions_count' => 1,
                'questions' => [
                    [
                        'id' => $attachable->id,
                        'code' => $attachable->code,
                        'label' => $label,
                        'edit_url' => route('staff.questions.edit', $attachable->id),
                        'show_url' => route('staff.questions.show', $attachable->id),
                    ],
                ],
                'summary' => "Butir Soal {$label}",
            ];
        }

        return [
            'is_used' => false,
            'type' => 'unattached',
            'target_title' => null,
            'target_code' => null,
            'questions_count' => 0,
            'questions' => [],
            'summary' => 'Belum dikaitkan ke soal / wacana stimulus',
        ];
    }
}
