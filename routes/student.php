<?php

use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\InAppNotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Staff\ExamCameraController;
use App\Http\Controllers\Staff\ExamSebConfigController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\ExamAttemptController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('ujian')->name('student.')->group(function () {
    // Guest Routes
    Route::middleware('guest:student')->group(function () {
        Route::get('login', [StudentAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [StudentAuthController::class, 'login'])->name('login.post');
        Route::get('register', [StudentAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [StudentAuthController::class, 'register'])->name('register.post');
    });

    // Authenticated Student Routes
    Route::middleware(['portal:student', 'active:student'])->group(function () {
        Route::post('logout', [StudentAuthController::class, 'logout'])->name('logout');

        // Profile & Completion
        Route::get('profile', [ProfileController::class, 'showStudent'])->name('profile');
        Route::get('profile/complete', [ProfileController::class, 'completeStudentForm'])->name('profile.complete');
        Route::put('profile', [ProfileController::class, 'updateStudent'])->name('profile.update');
        Route::post('profile/reset-photo', [ProfileController::class, 'resetStudentPhoto'])->name('profile.reset-photo');
        Route::put('password', function (Request $request) {
            return app(ProfileController::class)->changePassword($request, 'student');
        })->name('password.update');

        // Dashboard & Exams (Enforce Profile Completeness)
        Route::middleware('profile.complete')->group(function () {
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

            // Diagnostic Ping Endpoint (FULL-FEATURE 13.3)
            Route::get('ping', fn () => response()->json(['status' => 'ok', 'time' => now()->toIso8601String()]))->name('ping');

            // Exam Execution Engine (FULL-FEATURE Sec 13, 14, 15, 16, 18, 39.1)
            Route::prefix('exams')->name('exam.')->group(function () {
                Route::get('/', [ExamAttemptController::class, 'index'])->name('index');
                Route::get('{exam}/card', [ExamAttemptController::class, 'card'])->name('card');
                Route::get('{exam}/seb-config', [ExamSebConfigController::class, 'downloadStudent'])->name('seb-config');
                Route::get('{exam}/instructions', [ExamAttemptController::class, 'instructions'])->middleware('seb')->name('instructions');
                Route::post('{exam}/start', [ExamAttemptController::class, 'start'])->middleware('seb')->name('start');
            });

            Route::prefix('attempts')->name('exam.')->group(function () {
                Route::get('{attempt}', [ExamAttemptController::class, 'show'])->name('show');
                Route::get('{attempt}/time', [ExamAttemptController::class, 'serverTime'])->name('time');
                Route::post('{attempt}/save-answer', [ExamAttemptController::class, 'saveAnswer'])->name('save-answer');
                Route::post('{attempt}/toggle-flag', [ExamAttemptController::class, 'toggleFlag'])->name('toggle-flag');
                Route::post('{attempt}/submit', [ExamAttemptController::class, 'submit'])->name('submit');
                Route::get('{attempt}/finish', [ExamAttemptController::class, 'finish'])->name('finish');
                Route::get('{attempt}/transcript', [ExamAttemptController::class, 'transcript'])->name('transcript');
                Route::get('{attempt}/certificate', [ExamAttemptController::class, 'certificate'])->name('certificate');
                Route::post('{attempt}/heartbeat', [ExamAttemptController::class, 'heartbeat'])->name('heartbeat');
                Route::get('{attempt}/announcements', [ExamAttemptController::class, 'checkAnnouncements'])->name('announcements');
                Route::post('{attempt}/announcements/{announcement}/acknowledge', [ExamAttemptController::class, 'acknowledgeAnnouncement'])->name('announcements.acknowledge');
                Route::post('{attempt}/incident-snapshot', [ExamCameraController::class, 'uploadIncidentSnapshot'])->name('incident-snapshot');
            });

            // In-App Notification Center (FULL-FEATURE 40.7)
            Route::prefix('notifications')->name('notifications.')->group(function () {
                Route::get('/', [InAppNotificationController::class, 'index'])->name('index');
                Route::post('{notification}/read', [InAppNotificationController::class, 'markAsRead'])->name('read');
                Route::post('read-all', [InAppNotificationController::class, 'markAllRead'])->name('read-all');
            });
        });
    });
});
