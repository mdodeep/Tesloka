<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDelegation extends Model
{
    use HasFactory;

    protected $fillable = [
        'delegator_id',
        'delegatee_id',
        'scope',
        'start_date',
        'end_date',
        'action_limits',
        'reason',
        'status',
        'revoked_at',
        'revoked_by',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'action_limits' => 'array',
            'revoked_at' => 'datetime',
        ];
    }

    public function delegator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'delegator_id');
    }

    public function delegatee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'delegatee_id');
    }

    public function revokedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'revoked_by');
    }

    public function isValidNow(): bool
    {
        if ($this->status !== 'active') {
            return false;
        }

        $today = now()->toDateString();

        return $this->start_date->toDateString() <= $today && $this->end_date->toDateString() >= $today;
    }

    public function revoke(int $revokedByUserId, ?string $reason = null): void
    {
        $this->update([
            'status' => 'revoked',
            'revoked_at' => now(),
            'revoked_by' => $revokedByUserId,
            'reason' => $reason ? ($this->reason." | Pencabutan: {$reason}") : $this->reason,
        ]);
    }
}
