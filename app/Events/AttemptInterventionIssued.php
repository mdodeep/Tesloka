<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;

class AttemptInterventionIssued implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets;

    /**
     * @param  array<string, mixed>  $payload
     */
    public function __construct(
        public readonly int $attemptId,
        public readonly string $instruction,
        public readonly array $payload = []
    ) {}

    /**
     * @return array<int, PrivateChannel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel("exam.attempt.{$this->attemptId}"),
        ];
    }

    public function broadcastAs(): string
    {
        return 'intervention.issued';
    }

    /**
     * @return array<string, mixed>
     */
    public function broadcastWith(): array
    {
        return [
            'attempt_id' => $this->attemptId,
            'instruction' => $this->instruction,
            'payload' => $this->payload,
        ];
    }
}
