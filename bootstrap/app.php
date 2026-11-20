<?php

use App\Http\Middleware\AuthenticateApiKey;
use App\Http\Middleware\CheckInstallation;
use App\Http\Middleware\EnsurePortalAccess;
use App\Http\Middleware\EnsureProfileComplete;
use App\Http\Middleware\EnsureSafeExamBrowser;
use App\Http\Middleware\EnsureUserActive;
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function (): void {
            Route::middleware('web')
                ->group(base_path('routes/staff.php'));

            Route::middleware('web')
                ->group(base_path('routes/student.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            CheckInstallation::class,
        ]);

        $middleware->replace(
            Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,
            PreventRequestsDuringMaintenance::class
        );

        $middleware->alias([
            'portal' => EnsurePortalAccess::class,
            'role' => EnsureUserHasRole::class,
            'active' => EnsureUserActive::class,
            'profile.complete' => EnsureProfileComplete::class,
            'seb' => EnsureSafeExamBrowser::class,
            'auth.apikey' => AuthenticateApiKey::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
