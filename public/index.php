<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$basePath = dirname(__DIR__);
$vendorAutoload = $basePath.'/vendor/autoload.php';
$lockFile = $basePath.'/storage/installed.lock';
$envFile = $basePath.'/.env';
$envExample = $basePath.'/.env.example';

// Zero-Vendor Web Bootstrapper: cegah fatal error require vendor/autoload.php saat /install dibuka pertama kali.
if (! file_exists($vendorAutoload)) {
    require __DIR__.'/bootstrap-installer.php';
    exit;
}

// Pastikan .env dan APP_KEY siap sebelum Laravel installer di-boot ketika instalasi belum dikunci.
if (! file_exists($lockFile)) {
    if (! file_exists($envFile) && file_exists($envExample)) {
        @copy($envExample, $envFile);
    }

    if (file_exists($envFile)) {
        $envContent = (string) @file_get_contents($envFile);
        if (preg_match('/^APP_KEY=\s*$/m', $envContent) === 1 || ! str_contains($envContent, 'APP_KEY=base64:')) {
            $generatedKey = 'base64:'.base64_encode(random_bytes(32));
            if (preg_match('/^APP_KEY=.*$/m', $envContent) === 1) {
                $updatedContent = preg_replace('/^APP_KEY=.*$/m', 'APP_KEY='.$generatedKey, $envContent, 1);
            } else {
                $updatedContent = rtrim($envContent)."\nAPP_KEY=".$generatedKey."\n";
            }

            if (is_string($updatedContent)) {
                @file_put_contents($envFile, $updatedContent);
            }
        }
    }
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require $vendorAutoload;

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
