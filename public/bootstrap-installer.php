<?php

/**
 * Bootstrapper Pemasang Web Zero-Vendor untuk TESLOKA CBT.
 *
 * Berkas ini berjalan dengan PHP murni tanpa bergantung pada direktori vendor/
 * atau berkas .env. Tugas utamanya adalah memperbarui Composer (self-update),
 * memasang dependensi vendor Laravel, menyiapkan berkas .env beserta APP_KEY,
 * lalu menyerahkan kendali ke wizard instalasi Laravel (/install).
 */
$basePath = dirname(__DIR__);
$vendorAutoload = $basePath.'/vendor/autoload.php';
$lockFile = $basePath.'/storage/installed.lock';
$acceptHeader = (string) ($_SERVER['HTTP_ACCEPT'] ?? '');
$isAjaxRequest = str_contains($acceptHeader, 'application/json')
    || strtolower((string) ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '')) === 'xmlhttprequest';

// Penguncian keamanan mutlak: tolak akses jika aplikasi sudah terpasang atau vendor sudah ada.
if (file_exists($lockFile) || file_exists($vendorAutoload)) {
    if ($isAjaxRequest) {
        http_response_code(403);
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode([
            'success' => false,
            'message' => 'Bootstrapper dikunci karena sistem atau dependensi vendor sudah tersedia.',
        ]);
        exit;
    }

    $targetUrl = file_exists($lockFile) ? '/' : '/install';
    header('Location: '.$targetUrl, true, 302);
    exit;
}

if (! function_exists('teslokaBootstrapIsFunctionEnabled')) {
    function teslokaBootstrapIsFunctionEnabled(string $functionName): bool
    {
        if (! function_exists($functionName)) {
            return false;
        }

        $disabled = (string) ini_get('disable_functions');
        if ($disabled === '') {
            return true;
        }

        $disabledList = array_map('trim', explode(',', strtolower($disabled)));

        return ! in_array(strtolower($functionName), $disabledList, true);
    }
}

if (! function_exists('teslokaBootstrapIsWindows')) {
    function teslokaBootstrapIsWindows(): bool
    {
        return DIRECTORY_SEPARATOR === '\\';
    }
}

if (! function_exists('teslokaBootstrapEnsureDirectories')) {
    function teslokaBootstrapEnsureDirectories(string $basePath): array
    {
        $requiredDirs = [
            $basePath.'/storage',
            $basePath.'/storage/app',
            $basePath.'/storage/app/.composer',
            $basePath.'/storage/framework',
            $basePath.'/storage/framework/cache',
            $basePath.'/storage/framework/sessions',
            $basePath.'/storage/framework/views',
            $basePath.'/storage/logs',
            $basePath.'/bootstrap/cache',
        ];

        $warnings = [];
        foreach ($requiredDirs as $dir) {
            if (! is_dir($dir)) {
                @mkdir($dir, 0775, true);
            }
            if (! is_dir($dir) || ! is_writable($dir)) {
                $warnings[] = $dir;
            }
        }

        return $warnings;
    }
}

if (! function_exists('teslokaBootstrapEnsureEnvAndKey')) {
    function teslokaBootstrapEnsureEnvAndKey(string $basePath): array
    {
        $envPath = $basePath.'/.env';
        $examplePath = $basePath.'/.env.example';
        $logs = [];

        if (! file_exists($envPath)) {
            if (file_exists($examplePath) && @copy($examplePath, $envPath)) {
                $logs[] = '[OK] Berkas .env berhasil disalin dari .env.example.';
            } else {
                $fallbackEnv = "APP_NAME=\"TESLOKA CBT\"\nAPP_ENV=production\nAPP_KEY=\nAPP_DEBUG=false\nAPP_TIMEZONE=Asia/Jakarta\nAPP_URL=http://localhost\n\nDB_CONNECTION=pgsql\nDB_HOST=127.0.0.1\nDB_PORT=5432\nDB_DATABASE=tesloka\nDB_USERNAME=tesloka\nDB_PASSWORD=\n\nSESSION_DRIVER=file\nCACHE_STORE=file\nQUEUE_CONNECTION=database\n";
                if (@file_put_contents($envPath, $fallbackEnv) !== false) {
                    $logs[] = '[OK] Berkas .env awal berhasil dibuat.';
                } else {
                    return ['ok' => false, 'logs' => ['[GAGAL] Tidak dapat membuat berkas .env. Periksa izin tulis direktori root proyek.']];
                }
            }
        }

        $envContent = (string) @file_get_contents($envPath);
        if (preg_match('/^APP_KEY=\s*$/m', $envContent) === 1 || ! str_contains($envContent, 'APP_KEY=base64:')) {
            $generatedKey = 'base64:'.base64_encode(random_bytes(32));
            if (preg_match('/^APP_KEY=.*$/m', $envContent) === 1) {
                $updatedContent = preg_replace('/^APP_KEY=.*$/m', 'APP_KEY='.$generatedKey, $envContent, 1);
            } else {
                $updatedContent = rtrim($envContent)."\nAPP_KEY=".$generatedKey."\n";
            }

            if (is_string($updatedContent) && @file_put_contents($envPath, $updatedContent) !== false) {
                $logs[] = '[OK] Kunci enkripsi aplikasi (APP_KEY) berhasil dibuat otomatis.';
            } else {
                return ['ok' => false, 'logs' => ['[GAGAL] Tidak dapat menulis APP_KEY ke berkas .env.']];
            }
        } else {
            $logs[] = '[OK] Berkas .env dan APP_KEY sudah tersedia.';
        }

        return ['ok' => true, 'logs' => $logs];
    }
}

if (! function_exists('teslokaBootstrapDetectCliPhp')) {
    function teslokaBootstrapDetectCliPhp(): string
    {
        if (teslokaBootstrapIsWindows()) {
            $binary = PHP_BINARY;
            if ($binary !== '' && file_exists($binary) && ! str_contains(strtolower(basename($binary)), 'cgi')) {
                return $binary;
            }

            return 'php';
        }

        $candidates = [
            '/www/server/php/85/bin/php',
            '/www/server/php/84/bin/php',
            '/www/server/php/83/bin/php',
            '/www/server/php/82/bin/php',
            '/usr/bin/php8.5',
            '/usr/bin/php8.4',
            '/usr/bin/php8.3',
            '/usr/bin/php8.2',
            '/usr/local/bin/php',
            '/usr/bin/php',
        ];

        $phpBinary = defined('PHP_BINARY') ? PHP_BINARY : '';
        if ($phpBinary !== '' && ! str_contains(strtolower(basename($phpBinary)), 'fpm') && @is_executable($phpBinary)) {
            array_unshift($candidates, $phpBinary);
        }

        foreach ($candidates as $candidate) {
            if ($candidate !== '' && @file_exists($candidate) && @is_executable($candidate)) {
                return $candidate;
            }
        }

        return 'php';
    }
}

if (! function_exists('teslokaBootstrapDownloadFile')) {
    function teslokaBootstrapDownloadFile(string $url, string $destination): array
    {
        $tempPath = $destination.'.tmp.'.bin2hex(random_bytes(4));

        if (function_exists('curl_init')) {
            $fp = @fopen($tempPath, 'wb');
            if ($fp !== false) {
                $ch = curl_init($url);
                curl_setopt_array($ch, [
                    CURLOPT_FILE => $fp,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_MAXREDIRS => 5,
                    CURLOPT_CONNECTTIMEOUT => 15,
                    CURLOPT_TIMEOUT => 90,
                    CURLOPT_SSL_VERIFYPEER => true,
                    CURLOPT_USERAGENT => 'TESLOKA-CBT-Bootstrapper/1.0',
                ]);
                $result = curl_exec($ch);
                $httpCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
                $curlErr = curl_error($ch);
                curl_close($ch);
                fclose($fp);

                if ($result === true && $httpCode >= 200 && $httpCode < 400 && file_exists($tempPath) && filesize($tempPath) > 100000) {
                    if (@rename($tempPath, $destination)) {
                        @chmod($destination, 0755);

                        return ['ok' => true, 'message' => 'Berhasil mengunduh composer-stable.phar melalui cURL.'];
                    }
                }
                @unlink($tempPath);

                return ['ok' => false, 'message' => 'Gagal mengunduh composer.phar (HTTP '.$httpCode.' '.$curlErr.').'];
            }
        }

        $context = stream_context_create([
            'http' => ['timeout' => 90, 'header' => "User-Agent: TESLOKA-CBT-Bootstrapper/1.0\r\n"],
            'ssl' => ['verify_peer' => true, 'verify_peer_name' => true],
        ]);
        $binary = @file_get_contents($url, false, $context);
        if (is_string($binary) && strlen($binary) > 100000 && @file_put_contents($tempPath, $binary) !== false) {
            if (@rename($tempPath, $destination)) {
                @chmod($destination, 0755);

                return ['ok' => true, 'message' => 'Berhasil mengunduh composer-stable.phar melalui HTTP stream.'];
            }
        }
        @unlink($tempPath);

        return ['ok' => false, 'message' => 'Gagal mengunduh composer.phar dari getcomposer.org.'];
    }
}

if (! function_exists('teslokaBootstrapRunCommand')) {
    function teslokaBootstrapRunCommand(string $basePath, string $command): array
    {
        $output = [];
        $exitCode = 1;

        if (teslokaBootstrapIsWindows()) {
            $fullCommand = 'cd /d '.escapeshellarg($basePath).' && '.$command.' 2>&1';
        } else {
            $composerHome = $basePath.'/storage/app/.composer';
            $composerCache = $composerHome.'/cache';
            $envPrefix = 'env'
                .' HOME='.escapeshellarg($composerHome)
                .' COMPOSER_HOME='.escapeshellarg($composerHome)
                .' COMPOSER_CACHE_DIR='.escapeshellarg($composerCache)
                .' COMPOSER_MEMORY_LIMIT=-1'
                .' COMPOSER_NO_INTERACTION=1'
                .' COMPOSER_ALLOW_SUPERUSER=1';
            $fullCommand = 'cd '.escapeshellarg($basePath).' && '.$envPrefix.' '.$command.' 2>&1';
        }

        exec($fullCommand, $output, $exitCode);

        return [
            'exit_code' => $exitCode,
            'output' => implode("\n", $output),
        ];
    }
}

// Inisialisasi sesi untuk proteksi CSRF tanpa bergantung pada path sesi yang terkunci
$sessionPath = $basePath.'/storage/framework/sessions';
if (is_dir($sessionPath) && is_writable($sessionPath)) {
    @ini_set('session.save_path', $sessionPath);
} elseif (is_writable(sys_get_temp_dir())) {
    @ini_set('session.save_path', sys_get_temp_dir());
}
if (session_status() !== PHP_SESSION_ACTIVE) {
    @session_start();
}
if (empty($_SESSION['tesloka_bootstrap_csrf'])) {
    $_SESSION['tesloka_bootstrap_csrf'] = bin2hex(random_bytes(32));
}
$csrfToken = (string) $_SESSION['tesloka_bootstrap_csrf'];

// Pemeriksaan prasyarat dasar
$dirWarnings = teslokaBootstrapEnsureDirectories($basePath);
$execEnabled = teslokaBootstrapIsFunctionEnabled('exec');
$cliPhp = teslokaBootstrapDetectCliPhp();
$localPharPath = $basePath.'/storage/app/composer.phar';

$requiredExtensions = [
    'bcmath', 'ctype', 'curl', 'fileinfo', 'gd', 'json',
    'mbstring', 'openssl', 'pdo', 'pdo_pgsql', 'tokenizer', 'xml', 'zip',
];
$extensionStatus = [];
foreach ($requiredExtensions as $ext) {
    $extensionStatus[$ext] = extension_loaded($ext);
}

$globalComposer = null;
foreach (['/usr/local/bin/composer', '/usr/bin/composer'] as $candidateComposer) {
    if (@file_exists($candidateComposer)) {
        $globalComposer = $candidateComposer;
        break;
    }
}

$executionResult = null;

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $submittedToken = (string) ($_POST['_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '');
    if ($submittedToken === '' || ! hash_equals($csrfToken, $submittedToken)) {
        $executionResult = [
            'success' => false,
            'logs' => ['[GAGAL] Token keamanan CSRF tidak valid atau sesi kedaluwarsa. Muat ulang halaman lalu coba lagi.'],
        ];
    } elseif (! $execEnabled) {
        $executionResult = [
            'success' => false,
            'logs' => ['[TERBLOKIR] Fungsi PHP exec() dinonaktifkan pada konfigurasi php.ini server. Gunakan perintah terminal SSH yang tersedia pada halaman ini.'],
        ];
    } else {
        @set_time_limit(0);
        @ini_set('max_execution_time', '0');
        @ini_set('memory_limit', '512M');

        $logs = [];
        $envResult = teslokaBootstrapEnsureEnvAndKey($basePath);
        $logs = array_merge($logs, $envResult['logs']);

        $composerCmd = null;
        if (file_exists($localPharPath) && filesize($localPharPath) > 100000) {
            $composerCmd = escapeshellarg($cliPhp).' '.escapeshellarg($localPharPath);
            $logs[] = '[OK] Menggunakan Composer PHAR lokal: storage/app/composer.phar';
        } else {
            $logs[] = '[INFO] Mengunduh Composer terbaru (composer-stable.phar)...';
            $download = teslokaBootstrapDownloadFile('https://getcomposer.org/composer-stable.phar', $localPharPath);
            if ($download['ok']) {
                $composerCmd = escapeshellarg($cliPhp).' '.escapeshellarg($localPharPath);
                $logs[] = '[OK] '.$download['message'];
            } elseif ($globalComposer !== null) {
                $composerCmd = escapeshellarg($cliPhp).' '.escapeshellarg($globalComposer);
                $logs[] = '[PERINGATAN] '.$download['message'].' Beralih ke Composer global: '.$globalComposer;
            } else {
                $logs[] = '[GAGAL] '.$download['message'].' Composer global juga tidak ditemukan di server.';
            }
        }

        if ($composerCmd !== null && $envResult['ok']) {
            $logs[] = '[INFO] Memeriksa dan memperbarui versi Composer (composer self-update)...';
            $selfUpdate = teslokaBootstrapRunCommand($basePath, $composerCmd.' self-update --no-interaction');
            if ($selfUpdate['exit_code'] === 0) {
                $logs[] = '[OK] Composer berhasil diperbarui ke versi terbaru.';
                if (trim($selfUpdate['output']) !== '') {
                    $logs[] = trim($selfUpdate['output']);
                }
            } else {
                $logs[] = '[PERINGATAN] Pembaruan Composer dilewati (melanjutkan dengan versi yang tersedia).';
                if (trim($selfUpdate['output']) !== '') {
                    $logs[] = trim($selfUpdate['output']);
                }
            }

            $logs[] = '[INFO] Menjalankan pemasangan dependensi Laravel (composer install --no-dev --optimize-autoloader)...';
            $install = teslokaBootstrapRunCommand(
                $basePath,
                $composerCmd.' install --no-dev --optimize-autoloader --no-interaction --prefer-dist --no-progress'
            );

            if (trim($install['output']) !== '') {
                $logs[] = trim($install['output']);
            }

            if ($install['exit_code'] === 0 && file_exists($vendorAutoload)) {
                $logs[] = '[SUKSES] Seluruh paket vendor berhasil dipasang dan autoloader siap digunakan.';
                $executionResult = [
                    'success' => true,
                    'redirect' => '/install',
                    'logs' => $logs,
                ];
            } else {
                $logs[] = '[GAGAL] Pemasangan Composer selesai dengan kode keluar '.$install['exit_code'].'. Periksa log di atas atau jalankan via SSH.';
                $executionResult = [
                    'success' => false,
                    'logs' => $logs,
                ];
            }
        } else {
            $executionResult = [
                'success' => false,
                'logs' => $logs,
            ];
        }
    }

    if ($isAjaxRequest) {
        http_response_code($executionResult['success'] ? 200 : 422);
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode([
            'success' => $executionResult['success'],
            'redirect' => $executionResult['redirect'] ?? '/install',
            'message' => $executionResult['success']
                ? 'Dependensi vendor dan berkas .env siap. Mengalihkan ke Wizard Pemasang...'
                : 'Proses pemasangan dependensi belum selesai. Periksa log diagnosa.',
            'logs' => $executionResult['logs'],
        ]);
        exit;
    }

    if ($executionResult['success']) {
        header('Location: /install', true, 302);
        exit;
    }
}

$cliFallbackCommand = 'cd '.$basePath.' && php -r "copy(\'https://getcomposer.org/installer\', \'composer-setup.php\');" && php composer-setup.php --install-dir=/usr/local/bin --filename=composer ; php -r "unlink(\'composer-setup.php\');" ; composer self-update && COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader --no-interaction && cp -n .env.example .env && php artisan key:generate';
$shortCliCommand = 'cd '.$basePath.' && composer self-update && COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader && cp -n .env.example .env && php artisan key:generate';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penyiapan Awal Dependensi : TESLOKA CBT</title>
    <link rel="icon" type="image/webp" href="/assets/images/favicon-tesloka-bg-putih.webp">
    <style>
        @font-face {
            font-family: 'Sora';
            src: url('/assets/fonts/sora.ttf') format('truetype');
            font-weight: 100 900;
            font-display: swap;
        }
        :root {
            --color-primary: #2e33ff;
            --color-primary-hover: #1f24d9;
            --color-dark: #14213d;
            --color-bg: #f8fafc;
            --color-accent: #14bba6;
            --color-muted: #64728b;
            --color-border: #e2e8f0;
            --color-success: #10b981;
            --color-danger: #ef4444;
            --color-warning: #f59e0b;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Sora', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--color-bg);
            color: var(--color-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            line-height: 1.55;
            -webkit-font-smoothing: antialiased;
        }
        .header {
            background: #ffffff;
            border-bottom: 1px solid var(--color-border);
            padding: 0.9rem 1.5rem;
        }
        .header-inner {
            max-width: 820px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .brand-logo {
            height: 2rem;
            max-width: 170px;
            object-fit: contain;
            display: block;
        }
        .pill {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--color-primary);
            background: rgba(46, 51, 255, 0.08);
            border: 1px solid rgba(46, 51, 255, 0.2);
            padding: 0.25rem 0.7rem;
            border-radius: 999px;
        }
        .container {
            max-width: 820px;
            width: 100%;
            margin: 2rem auto;
            padding: 0 1.25rem;
            flex: 1;
        }
        .card {
            background: #ffffff;
            border: 1px solid var(--color-border);
            border-radius: 1rem;
            padding: 1.75rem;
            box-shadow: 0 10px 30px -15px rgba(20, 33, 61, 0.12);
        }
        .badge-step {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: var(--color-accent);
            background: rgba(20, 187, 166, 0.1);
            border: 1px solid rgba(20, 187, 166, 0.25);
            padding: 0.25rem 0.65rem;
            border-radius: 0.5rem;
            margin-bottom: 0.85rem;
        }
        h1 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--color-dark);
            margin-bottom: 0.5rem;
        }
        .lead {
            color: var(--color-muted);
            font-size: 0.92rem;
            margin-bottom: 1.5rem;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 0.85rem;
            margin-bottom: 1.5rem;
        }
        .stat-box {
            border: 1px solid var(--color-border);
            border-radius: 0.75rem;
            padding: 0.9rem 1rem;
            background: #f8fafc;
        }
        .stat-label {
            font-size: 0.75rem;
            color: var(--color-muted);
            margin-bottom: 0.25rem;
        }
        .stat-value {
            font-size: 0.92rem;
            font-weight: 700;
            color: var(--color-dark);
            word-break: break-word;
        }
        .status-ok { color: #059669; }
        .status-warn { color: #d97706; }
        .status-err { color: #dc2626; }
        .ext-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 0.4rem;
            margin-top: 0.5rem;
        }
        .ext-tag {
            font-size: 0.74rem;
            padding: 0.2rem 0.55rem;
            border-radius: 0.45rem;
            font-weight: 600;
            border: 1px solid transparent;
        }
        .ext-ok { background: #ecfdf5; color: #047857; border-color: #a7f3d0; }
        .ext-miss { background: #fef2f2; color: #b91c1c; border-color: #fecaca; }
        .alert {
            border-radius: 0.75rem;
            padding: 1rem 1.15rem;
            font-size: 0.88rem;
            margin-bottom: 1.25rem;
            border: 1px solid;
        }
        .alert-info { background: #eff6ff; border-color: #bfdbfe; color: #1e3a8a; }
        .alert-warn { background: #fffbeb; border-color: #fde68a; color: #92400e; }
        .alert-err { background: #fef2f2; border-color: #fecaca; color: #991b1b; }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            font-family: inherit;
            font-size: 0.92rem;
            font-weight: 600;
            padding: 0.85rem 1.4rem;
            border-radius: 0.75rem;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.15s ease, opacity 0.15s ease;
        }
        .btn-primary {
            background-color: var(--color-primary);
            color: #ffffff;
            width: 100%;
        }
        .btn-primary:hover:not(:disabled) { background-color: var(--color-primary-hover); }
        .btn-primary:disabled { opacity: 0.65; cursor: wait; }
        .btn-secondary {
            background: #eef2ff;
            color: var(--color-primary);
            border: 1px solid #c7d2fe;
            font-size: 0.8rem;
            padding: 0.45rem 0.85rem;
        }
        .code-box {
            background: #0f172a;
            color: #e2e8f0;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            font-size: 0.8rem;
            padding: 0.95rem 1rem;
            border-radius: 0.75rem;
            overflow-x: auto;
            white-space: pre-wrap;
            word-break: break-all;
            margin: 0.75rem 0;
        }
        .log-panel {
            margin-top: 1.25rem;
            background: #0f172a;
            color: #cbd5e1;
            border-radius: 0.75rem;
            padding: 1rem;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            font-size: 0.78rem;
            max-height: 280px;
            overflow-y: auto;
            white-space: pre-wrap;
            display: none;
        }
        .log-panel.visible { display: block; }
        .spinner {
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.35);
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 0.75s linear infinite;
            display: none;
        }
        .spinner.visible { display: inline-block; }
        @keyframes spin { to { transform: rotate(360deg); } }
        .footer {
            text-align: center;
            padding: 1.25rem;
            font-size: 0.8rem;
            color: var(--color-muted);
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-inner">
            <img src="/assets/images/logo-tesloka-cbt.webp" alt="TESLOKA CBT" class="brand-logo">
            <span class="pill">Tahap 0: Penyiapan Dependensi Web</span>
        </div>
    </header>

    <main class="container">
        <section class="card">
            <span class="badge-step">Zero-Vendor Web Bootstrapper</span>
            <h1>Menyiapkan Dependensi Laravel &amp; Berkas .env</h1>
            <p class="lead">
                Direktori <code>vendor/</code> belum terpasang pada server Anda. Halaman ini menggantikan layar error fatal dan memasang dependensi Composer terbaru (<code>self-update</code> + <code>composer install</code>) serta kunci keamanan <code>APP_KEY</code> langsung dari browser sebelum membuka Wizard Pemasang TESLOKA.
            </p>

            <div class="grid">
                <div class="stat-box">
                    <div class="stat-label">Versi PHP Web</div>
                    <div class="stat-value <?php echo version_compare(PHP_VERSION, '8.2.0', '>=') ? 'status-ok' : 'status-err'; ?>">
                        PHP <?php echo htmlspecialchars(PHP_VERSION, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                </div>
                <div class="stat-box">
                    <div class="stat-label">Binary PHP CLI</div>
                    <div class="stat-value">
                        <code><?php echo htmlspecialchars($cliPhp, ENT_QUOTES, 'UTF-8'); ?></code>
                    </div>
                </div>
                <div class="stat-box">
                    <div class="stat-label">Eksekusi Web (exec)</div>
                    <div class="stat-value <?php echo $execEnabled ? 'status-ok' : 'status-warn'; ?>">
                        <?php echo $execEnabled ? 'Aktif (Pemasangan 1-Klik Siap)' : 'Dinonaktifkan di php.ini'; ?>
                    </div>
                </div>
                <div class="stat-box">
                    <div class="stat-label">Izin Tulis Direktori</div>
                    <div class="stat-value <?php echo empty($dirWarnings) ? 'status-ok' : 'status-err'; ?>">
                        <?php echo empty($dirWarnings) ? 'Storage &amp; Cache Siap' : 'Perlu chmod/chown www'; ?>
                    </div>
                </div>
            </div>

            <div class="stat-box" style="margin-bottom: 1.25rem;">
                <div class="stat-label">Status Ekstensi PHP Wajib</div>
                <div class="ext-wrap">
                    <?php foreach ($extensionStatus as $extName => $loaded) { ?>
                        <span class="ext-tag <?php echo $loaded ? 'ext-ok' : 'ext-miss'; ?>">
                            <?php echo $loaded ? 'OK ' : 'Kurang '; ?><?php echo htmlspecialchars($extName, ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                    <?php } ?>
                </div>
            </div>

            <?php if (! empty($dirWarnings)) { ?>
                <div class="alert alert-err">
                    <strong>Perhatian Izin Tulis Folder:</strong> Pengguna web server belum memiliki izin tulis pada folder:
                    <code><?php echo htmlspecialchars(implode(', ', $dirWarnings), ENT_QUOTES, 'UTF-8'); ?></code>.
                    Pastikan kepemilikan folder adalah pengguna web server (misalnya <code>chown -R www:www <?php echo htmlspecialchars($basePath, ENT_QUOTES, 'UTF-8'); ?></code> pada aaPanel).
                </div>
            <?php } ?>

            <?php if ($execEnabled) { ?>
                <div class="alert alert-info">
                    Sistem akan mengunduh atau memperbarui <strong>Composer</strong> (<code>self-update</code>), memasang paket produksi ke folder <code>vendor/</code>, membuat berkas <code>.env</code> dari <code>.env.example</code>, dan membuat <code>APP_KEY</code>. Proses ini membutuhkan waktu sekitar <strong>20 hingga 90 detik</strong>; harap tunggu hingga halaman otomatis beralih ke <code>/install</code>.
                </div>

                <form id="bootstrap-form" method="POST" action="">
                    <input type="hidden" name="_token" value="<?php echo htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8'); ?>">
                    <button id="submit-btn" type="submit" class="btn btn-primary">
                        <span id="btn-spinner" class="spinner" aria-hidden="true"></span>
                        <span id="btn-label">Update Composer, Pasang Vendor &amp; Lanjut ke /install</span>
                    </button>
                </form>
            <?php } else { ?>
                <div class="alert alert-warn">
                    <strong>Mode Fallback Terminal:</strong> Fungsi <code>exec()</code> sedang dinonaktifkan pada <code>php.ini</code> PHP-FPM server ini. Jalankan perintah berikut satu kali melalui SSH/Terminal aaPanel (lalu muat ulang halaman ini untuk melanjutkan ke Wizard Web <code>/install</code>):
                </div>
                <div class="code-box" id="cli-fallback-cmd"><?php echo htmlspecialchars($shortCliCommand, ENT_QUOTES, 'UTF-8'); ?></div>
                <button type="button" class="btn btn-secondary" onclick="copyCommand('cli-fallback-cmd', this)">Salin Perintah Terminal</button>
            <?php } ?>

            <div id="log-output" class="log-panel<?php echo $executionResult !== null ? ' visible' : ''; ?>"><?php
if ($executionResult !== null) {
    echo htmlspecialchars(implode("\n", $executionResult['logs']), ENT_QUOTES, 'UTF-8');
}
?></div>

            <?php if ($execEnabled) { ?>
                <details style="margin-top: 1.25rem; font-size: 0.84rem; color: var(--color-muted);">
                    <summary style="cursor: pointer; font-weight: 600; color: var(--color-dark);">Opsi Alternatif via SSH (Jika jaringan Composer di PHP-FPM lambat)</summary>
                    <div class="code-box" id="cli-alt-cmd"><?php echo htmlspecialchars($cliFallbackCommand, ENT_QUOTES, 'UTF-8'); ?></div>
                    <button type="button" class="btn btn-secondary" onclick="copyCommand('cli-alt-cmd', this)">Salin Perintah SSH Lengkap</button>
                </details>
            <?php } ?>
        </section>
    </main>

    <footer class="footer">
        TESLOKA CBT On-Premise Installer Bootstrapper
    </footer>

    <script>
        function copyCommand(elementId, btn) {
            var el = document.getElementById(elementId);
            if (!el) return;
            var text = el.textContent || el.innerText || '';
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(function () {
                    var orig = btn.textContent;
                    btn.textContent = 'Tersalin!';
                    setTimeout(function () { btn.textContent = orig; }, 1800);
                });
            }
        }

        var form = document.getElementById('bootstrap-form');
        if (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                var btn = document.getElementById('submit-btn');
                var spinner = document.getElementById('btn-spinner');
                var label = document.getElementById('btn-label');
                var logPanel = document.getElementById('log-output');

                btn.disabled = true;
                spinner.classList.add('visible');
                label.textContent = 'Sedang memperbarui Composer & memasang vendor...';
                logPanel.classList.add('visible');
                logPanel.textContent = '[PROSES] Menghubungi server untuk mengunduh/memperbarui Composer dan memasang dependensi vendor...\nHarap jangan menutup atau me-refresh tab ini.';

                var formData = new FormData(form);
                fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(function (response) {
                    return response.text().then(function (raw) {
                        try {
                            return { ok: response.ok, status: response.status, data: JSON.parse(raw) };
                        } catch (e) {
                            return { ok: false, status: response.status, raw: raw };
                        }
                    });
                })
                .then(function (res) {
                    if (res.data && Array.isArray(res.data.logs)) {
                        logPanel.textContent = res.data.logs.join('\n');
                    } else if (res.raw) {
                        logPanel.textContent = '[PERINGATAN HTTP ' + res.status + '] Respons server bukan JSON:\n' + res.raw.slice(0, 1500);
                    }

                    if (res.data && res.data.success) {
                        label.textContent = 'Berhasil! Mengalihkan ke /install...';
                        window.location.href = res.data.redirect || '/install';
                    } else {
                        btn.disabled = false;
                        spinner.classList.remove('visible');
                        label.textContent = 'Coba Lagi Pasang Vendor & Lanjut ke /install';
                    }
                })
                .catch(function (err) {
                    btn.disabled = false;
                    spinner.classList.remove('visible');
                    label.textContent = 'Coba Lagi Pasang Vendor & Lanjut ke /install';
                    logPanel.textContent = '[KESALAHAN JARINGAN] ' + (err && err.message ? err.message : 'Koneksi terputus atau timeout server.')
                        + '\nSilakan muat ulang halaman (kemungkinan Composer sudah terpasang sebagian) atau gunakan perintah SSH alternatif di bawah.';
                });
            });
        }
    </script>
</body>
</html>
