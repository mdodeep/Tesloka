<?php

use App\Http\Controllers\InstallerController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PublicVerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Web Setup Wizard (Installation System)
Route::prefix('install')->name('installer.')->group(function () {
    Route::get('/', [InstallerController::class, 'index'])->name('index');
    Route::get('/database', [InstallerController::class, 'database'])->name('database');
    Route::post('/database/test', [InstallerController::class, 'testDatabase'])->name('database.test');
    Route::post('/database/test-redis', [InstallerController::class, 'testRedis'])->name('redis.test');
    Route::post('/database', [InstallerController::class, 'saveDatabase'])->name('database.save');
    Route::get('/institution', [InstallerController::class, 'institution'])->name('institution');
    Route::post('/institution', [InstallerController::class, 'saveInstitution'])->name('institution.save');
    Route::get('/admin', [InstallerController::class, 'admin'])->name('admin');
    Route::post('/admin', [InstallerController::class, 'saveAdmin'])->name('admin.save');
    Route::get('/process', [InstallerController::class, 'process'])->name('process');
    Route::post('/execute', [InstallerController::class, 'execute'])->name('execute');
    Route::get('/finish', [InstallerController::class, 'finish'])->name('finish');
});

// Root Domain & Subdomain Router (sertifikat.*, staff.*, ujian.*)
Route::match(['get', 'post'], '/', function (Request $request) {
    $host = $request->getHost();

    // 1. Subdomain Khusus Sertifikat (misal: sertifikat.tesloka.test)
    if (str_starts_with($host, 'sertifikat.')) {
        if ($request->isMethod('post')) {
            return app(PublicVerificationController::class)->search($request);
        }

        return app(PublicVerificationController::class)->index($request);
    }

    // 2. Subdomain Khusus Staf & Admin (misal: staff.tesloka.test)
    if (str_starts_with($host, 'staff.')) {
        if (Auth::guard('staff')->check()) {
            return redirect()->route('staff.dashboard');
        }

        return redirect()->route('staff.login');
    }

    // 3. Subdomain Ujian / Siswa
    if (Auth::guard('student')->check()) {
        return redirect()->route('student.dashboard');
    }

    return redirect()->route('student.login');
})->name('home');

// Alias Pengalihan Login Ramah Pengguna Antar-Subdomain
Route::get('login', function (Request $request) {
    $host = $request->getHost();
    if (str_starts_with($host, 'staff.')) {
        return redirect()->route('staff.login');
    }

    return redirect()->route('student.login');
})->name('login');

// Alias Pengalihan Registrasi Mandiri Ramah Pengguna Antar-Subdomain
Route::get('register', function (Request $request) {
    $host = $request->getHost();
    if (str_starts_with($host, 'staff.')) {
        return redirect()->route('staff.register');
    }

    return redirect()->route('student.register');
})->name('register');

// Authorized Media Streaming Endpoint (FULL-FEATURE 47.2 & 50.3)
Route::get('media/{file}/stream', [MediaController::class, 'stream'])
    ->name('media.stream');

// Public Document & Certificate Verification with Rate Limiting (FULL-FEATURE 38.3 & 39.2)
Route::middleware('throttle:60,1')->group(function () {
    Route::get('verifikasi-sertifikat', [PublicVerificationController::class, 'index'])
        ->name('certificate.search');
    Route::post('verifikasi-sertifikat', [PublicVerificationController::class, 'search'])
        ->name('certificate.search.post');
    Route::get('verify/{token}', [PublicVerificationController::class, 'verify'])
        ->name('document.verify');
    Route::get('verify/{token}/certificate', [PublicVerificationController::class, 'publicCertificate'])
        ->name('document.certificate');

    // Shortcut langsung untuk subdomain sertifikat.* (misal: https://sertifikat.tesloka.test/{token})
    Route::get('{token}', function (Request $request, string $token) {
        if (str_starts_with($request->getHost(), 'sertifikat.')) {
            return app(PublicVerificationController::class)->verify($request, $token);
        }
        abort(404);
    })->where('token', '^(RCP|CERT|[0-9]+|[A-Za-z0-9\-_]+)$');

    Route::get('{token}/certificate', function (Request $request, string $token) {
        if (str_starts_with($request->getHost(), 'sertifikat.')) {
            return app(PublicVerificationController::class)->publicCertificate($token);
        }
        abort(404);
    })->where('token', '^(RCP|CERT|[0-9]+|[A-Za-z0-9\-_]+)$');
});
