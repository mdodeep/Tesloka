<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class WebhookSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'secret',
        'events',
        'is_active',
        'failure_count',
        'last_delivery_at',
        'last_status_code',
    ];

    protected function casts(): array
    {
        return [
            'events' => 'array',
            'is_active' => 'boolean',
            'failure_count' => 'integer',
            'last_delivery_at' => 'datetime',
            'last_status_code' => 'integer',
        ];
    }

    public function deliveries(): HasMany
    {
        return $this->hasMany(WebhookDelivery::class);
    }

    /**
     * Generate rahasia HMAC unik jika belum ada.
     */
    public static function generateSecret(): string
    {
        return 'whsec_'.Str::random(32);
    }

    /**
     * Periksa apakah webhook berlangganan terhadap tipe peristiwa tertentu.
     */
    public function subscribesTo(string $eventType): bool
    {
        if (! $this->is_active) {
            return false;
        }

        $events = $this->events ?? [];

        if (in_array('*', $events, true)) {
            return true;
        }

        return in_array($eventType, $events, true);
    }

    /**
     * Hitung tanda tangan HMAC-SHA256 untuk payload.
     */
    public function signPayload(string $payload): string
    {
        return hash_hmac('sha256', $payload, $this->secret);
    }
}
