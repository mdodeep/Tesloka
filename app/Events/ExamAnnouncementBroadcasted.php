<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;

class ExamAnnouncementBroadcasted implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets;

    /**
     * @param  array<string, mixed>  $announcement
     * @param  list<int>  $targetAttemptIds
     */
    public function __construct(
        public readonly int $sessionId,
        public readonly array $announcement,
        public readonly array $targetAttemptIds = []
    ) {}

    /**
     * @return array<int, PrivateChannel>
     */
    public function broadcastOn(): array
    {
        $channels = [
            new PrivateChannel("exam.session.{$this->sessionId}"),
        ];

        foreach (array_slice(array_unique($this->targetAttemptIds), 0, 120) as $attemptId) {
            $channels[] = new PrivateChannel("exam.attempt.{$attemptId}");
        }

        return $channels;
    }

    public function broadcastAs(): string
    {
        return 'announcement.broadcasted';
    }

    /**
     * @return array<string, mixed>
     */
    public function broadcastWith(): array
    {
        return [
            'session_id' => $this->sessionId,
            'announcement' => $this->announcement,
        ];
    }
}
