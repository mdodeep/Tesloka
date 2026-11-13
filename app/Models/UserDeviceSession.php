<?php

namespace App\Models;

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
        'browser',
        'platform',
        'is_revoked',
        'last_active_at',
    ];

    protected function casts(): array
    {
        return [
            'is_revoked' => 'boolean',
            'last_active_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Parse User-Agent sederhana tanpa ketergantungan library eksternal.
     */
    public static function parseUserAgent(?string $ua): array
    {
        if (empty($ua)) {
            return [
                'device_type' => 'desktop',
                'browser' => 'Unknown',
                'platform' => 'Unknown',
            ];
        }

        // Platform
        $platform = 'Unknown';
        if (preg_match('/windows|win32/i', $ua)) {
            $platform = 'Windows';
        } elseif (preg_match('/macintosh|mac os x/i', $ua)) {
            $platform = 'macOS';
        } elseif (preg_match('/android/i', $ua)) {
            $platform = 'Android';
        } elseif (preg_match('/iphone|ipad|ipod/i', $ua)) {
            $platform = 'iOS';
        } elseif (preg_match('/linux/i', $ua)) {
            $platform = 'Linux';
        }

        // Browser
        $browser = 'Unknown';
        if (preg_match('/edg/i', $ua)) {
            $browser = 'Microsoft Edge';
        } elseif (preg_match('/chrome|crios/i', $ua)) {
            $browser = 'Google Chrome';
        } elseif (preg_match('/firefox|fxios/i', $ua)) {
            $browser = 'Mozilla Firefox';
        } elseif (preg_match('/safari/i', $ua) && ! preg_match('/chrome|crios/i', $ua)) {
            $browser = 'Safari';
        } elseif (preg_match('/opera|opr/i', $ua)) {
            $browser = 'Opera';
        }

        // Device Type
        $deviceType = 'desktop';
        if (preg_match('/mobile|android.*mobile|iphone|ipod/i', $ua)) {
            $deviceType = 'mobile';
        } elseif (preg_match('/ipad|tablet|android(?!.*mobile)/i', $ua)) {
            $deviceType = 'tablet';
        }

        return [
            'device_type' => $deviceType,
            'browser' => $browser,
            'platform' => $platform,
        ];
    }
}
