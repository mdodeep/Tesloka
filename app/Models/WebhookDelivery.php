<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebhookDelivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'webhook_subscription_id',
        'event_type',
        'payload',
        'signature',
        'response_status',
        'response_body',
        'attempt_number',
        'status',
        'error_message',
        'delivered_at',
    ];

    protected function casts(): array
    {
        return [
            'payload' => 'array',
            'response_status' => 'integer',
            'attempt_number' => 'integer',
            'delivered_at' => 'datetime',
        ];
    }

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(WebhookSubscription::class, 'webhook_subscription_id');
    }
}

