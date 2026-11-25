<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;

class StudentSnapshotUploaded implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets;

    /**
     * @param  array<string, mixed>  $snapshot
     */
    public function __construct(
        public readonly int $sessionId,
        public readonly array $snapshot
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
        return 'snapshot.uploaded';
    }

    /**
     * @return array<string, mixed>
     */
    public function broadcastWith(): array
    {
        return [
            'session_id' => $this->sessionId,
            'snapshot' => $this->snapshot,
        ];
    }
}
