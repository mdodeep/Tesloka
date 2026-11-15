<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ApprovalRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'action_type',
        'target_type',
        'target_id',
        'requester_id',
        'approver_id',
        'status',
        'payload',
        'reason',
        'rejection_reason',
        'approved_at',
    ];

    protected function casts(): array
    {
        return [
            'payload' => 'array',
            'approved_at' => 'datetime',
        ];
    }

    public function requester(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approver_id');
    }

    public function target(): MorphTo
    {
        return $this->morphTo();
    }

    public function approve(int $approverId): bool
    {
        $approver = User::find($approverId);
        $isAdmin = $approver && $approver->isAdmin();

        // Aturan Four-Eyes: Pemohon tidak boleh menjadi penyetuju dirinya sendiri KECUALI Administrator dengan wewenang penuh
        if (! $isAdmin && $approverId === $this->requester_id) {
            throw new \DomainException('Prinsip Four-Eyes: Pemohon tidak dapat menyetujui permintaannya sendiri.');
        }

        return $this->update([
            'status' => 'approved',
            'approver_id' => $approverId,
            'approved_at' => now(),
        ]);
    }

    public function reject(int $approverId, string $rejectionReason): bool
    {
        $approver = User::find($approverId);
        $isAdmin = $approver && $approver->isAdmin();

        if (! $isAdmin && $approverId === $this->requester_id) {
            throw new \DomainException('Prinsip Four-Eyes: Pemohon tidak dapat menolak permintaannya sendiri melalui jalur penyetuju.');
        }

        return $this->update([
            'status' => 'rejected',
            'approver_id' => $approverId,
            'rejection_reason' => $rejectionReason,
        ]);
    }
}
