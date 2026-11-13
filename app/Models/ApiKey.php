<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class ApiKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'key_hash',
        'prefix',
        'abilities',
        'last_used_at',
        'expires_at',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'abilities' => 'array',
            'last_used_at' => 'datetime',
            'expires_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Buat kredensial API Key baru.
     * Mengembalikan plain key yang hanya tampil sekali saat pembuatan.
     *
     * @return array{plain_key: string, api_key: self}
     */
    public static function createKey(User $user, string $name, array $abilities = ['*'], ?Carbon $expiresAt = null): array
    {
        $plainKey = 'tslk_'.Str::random(40);
        $prefix = substr($plainKey, 0, 9);
        $keyHash = hash('sha256', $plainKey);

        $apiKey = static::create([
            'user_id' => $user->id,
            'name' => $name,
            'key_hash' => $keyHash,
            'prefix' => $prefix,
            'abilities' => $abilities,
            'expires_at' => $expiresAt,
            'is_active' => true,
        ]);

        return [
            'plain_key' => $plainKey,
            'api_key' => $apiKey,
        ];
    }

    /**
     * Cari API key berdasarkan string plain key.
     */
    public static function findByKey(string $plainKey): ?self
    {
        $hash = hash('sha256', $plainKey);

        return static::where('key_hash', $hash)->first();
    }

    /**
     * Periksa apakah kunci valid (aktif dan belum kedaluwarsa).
     */
    public function isValid(): bool
    {
        if (! $this->is_active) {
            return false;
        }

        if ($this->expires_at && $this->expires_at->isPast()) {
            return false;
        }

        return true;
    }

    /**
     * Periksa kemampuan (ability/scope).
     */
    public function hasAbility(string $ability): bool
    {
        $abilities = $this->abilities ?? ['*'];

        if (in_array('*', $abilities, true)) {
            return true;
        }

        return in_array($ability, $abilities, true);
    }

    /**
     * Catat penggunaan kunci terakhir.
     */
    public function touchUsage(): void
    {
        $this->update(['last_used_at' => now()]);
    }
}
