<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuditLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'event_type',
        'auditable_type',
        'auditable_id',
        'ip_address',
        'user_agent',
        'old_values',
        'new_values',
        'notes',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'old_values' => 'array',
            'new_values' => 'array',
            'created_at' => 'datetime',
        ];
    }

    /**
     * Relasi ke Pengguna (Aktor) yang memicu aktivitas.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi polymorphic ke entitas bisnis yang diaudit.
     */
    public function auditable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Mencatat entri audit log bisnis secara terstruktur.
     */
    public static function record(
        string $eventType,
        ?Model $auditable = null,
        ?array $oldValues = null,
        ?array $newValues = null,
        ?string $notes = null,
        ?int $userId = null
    ): self {
        $actorId = $userId
            ?? Auth::guard('staff')->id()
            ?? Auth::guard('student')->id()
            ?? Auth::id();

        return self::create([
            'user_id' => $actorId,
            'event_type' => $eventType,
            'auditable_type' => $auditable ? get_class($auditable) : null,
            'auditable_id' => $auditable ? $auditable->getKey() : null,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'old_values' => $oldValues,
            'new_values' => $newValues,
            'notes' => $notes,
            'created_at' => now(),
        ]);
    }

    /**
     * Label aktor manusiawi apabila log tidak terikat dengan user_id tertentu.
     */
    public function actorFallbackLabel(): string
    {
        if (str_contains($this->event_type, 'login') || str_contains($this->event_type, 'auth')) {
            return 'Tamu / Belum Login';
        }

        return 'Sistem (Otomatis / CLI)';
    }

    /**
     * Ringkasan entitas target audit untuk ditampilkan di UI.
     */
    public function auditableShortLabel(): ?string
    {
        if (empty($this->auditable_type)) {
            return null;
        }

        $shortName = class_basename($this->auditable_type);

        return $this->auditable_id ? "{$shortName} #{$this->auditable_id}" : $shortName;
    }
}
