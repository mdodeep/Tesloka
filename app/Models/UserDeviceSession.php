<?php

namespace App\Models;

use App\Services\DeviceDetectionService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDeviceSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
        'ip_address',
        'user_agent',
        'device_type',
        'device_category',
        'device_label',
        'os_name',
        'browser',
        'platform',
        'device_metadata',
        'is_revoked',
        'last_active_at',
    ];

    protected function casts(): array
    {
        return [
            'is_revoked' => 'boolean',
            'last_active_at' => 'datetime',
            'device_metadata' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Parse User-Agent dan telemetri opsional tanpa ketergantungan library eksternal.
     *
     * @param  array<string, mixed>  $telemetry
     */
    public static function parseUserAgent(?string $ua, array $telemetry = []): array
    {
        $detected = app(DeviceDetectionService::class)->detect($ua, $telemetry);

        return [
            'device_type' => $detected['legacy_device_type'],
            'device_category' => $detected['device_category'],
            'device_label' => $detected['device_label'],
            'browser' => $detected['browser_name'],
            'platform' => $detected['os_name'],
            'os_name' => $detected['os_name'],
            'device_metadata' => $detected['details'],
        ];
    }

    public function getFriendlyDeviceLabel(): string
    {
        if (! empty($this->device_label)) {
            return $this->device_label;
        }

        if (! empty($this->device_category)) {
            return DeviceDetectionService::categoryLabel($this->device_category);
        }

        return DeviceDetectionService::categoryLabel($this->device_type);
    }
}
