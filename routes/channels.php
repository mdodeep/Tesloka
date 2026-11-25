<?php

use App\Models\ExamAttempt;
use App\Models\ExamSession;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Otorisasi channel privat real-time untuk monitoring pengawasan ujian
| dan instruksi langsung ke perangkat peserta ujian (Laravel Reverb / Echo).
|
*/

Broadcast::channel('exam.session.{sessionId}', function (User $user, int $sessionId): bool {
    if (! $user->isStaff()) {
        return false;
    }

    if (! $user->hasRole([
        'admin',
        'super_admin',
        'institution_admin',
        'proctor',
        'teacher',
        'exam_coordinator',
        'academic_coordinator',
        'auditor',
    ])) {
        return false;
    }

    return ExamSession::whereKey($sessionId)->exists();
}, ['guards' => ['staff']]);

Broadcast::channel('exam.attempt.{attemptId}', function (User $user, int $attemptId): bool {
    $attempt = ExamAttempt::find($attemptId);

    if (! $attempt) {
        return false;
    }

    if ($user->isStudent() && (int) $attempt->student_id === (int) $user->id) {
        return true;
    }

    if ($user->isStaff() && $user->hasRole([
        'admin',
        'super_admin',
        'institution_admin',
        'proctor',
        'teacher',
        'exam_coordinator',
        'academic_coordinator',
        'auditor',
    ])) {
        return true;
    }

    return false;
}, ['guards' => ['student', 'staff']]);
