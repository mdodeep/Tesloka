<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;

class StudentTelemetryUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets;

    /**
     * @param  array<string, mixed>  $participant
     */
    public function __construct(
        public readonly int $sessionId,
        public readonly array $participant,
        public readonly string $serverTime
    ) {}

    /**
     * @return array<int, PrivateChannel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel("exam.session.{$this->sessionId}"),
        ];
    }

    public function broadcastAs(): string
    {
        return 'telemetry.updated';
    }

    /**
     * @return array<string, mixed>
     */
    public function broadcastWith(): array
    {
        return [
            'session_id' => $this->sessionId,
            'participant' => $this->participant,
            'server_time' => $this->serverTime,
        ];
    }
}
