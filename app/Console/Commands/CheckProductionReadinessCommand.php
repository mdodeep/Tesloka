<?php

namespace App\Console\Commands;

use App\Models\Institution;
use App\Models\User;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class CheckProductionReadinessCommand extends Command
{
    protected $signature = 'tesloka:production-check';

    protected $description = 'Periksa kesiapan operasional server dan aplikasi TESLOKA untuk lingkungan produksi (FULL-FEATURE Sec 61, 97)';

    public function handle(): int
    {
        $this->info('===============================================================');
        $this->info('  TESLOKA CBT — PEMERIKSAAN KESIAPAN PRODUKSI (PRODUCTION CHECK)');
        $this->info('===============================================================');
        $this->newLine();

        $hasFailure = false;
        $results = [];

        // 1. PHP Version
        $phpVersion = PHP_VERSION;
        $phpOk = version_compare($phpVersion, '8.3.0', '>=');
        $results[] = [
            'Komponen' => 'PHP Version',
            'Kebutuhan' => '>= 8.3 (Target: PHP 8.5)',
            'Status Aktual' => "PHP {$phpVersion}",
            'Hasil' => $phpOk ? '<fg=green>PASS</>' : '<fg=red>FAIL</>',
        ];
        if (! $phpOk) {
            $hasFailure = true;
        }

        // 2. Ekstensi Wajib
        $requiredExtensions = ['pdo_pgsql', 'redis', 'mbstring', 'openssl', 'bcmath', 'curl', 'fileinfo', 'gd', 'zip'];
        $missingExtensions = [];
        foreach ($requiredExtensions as $ext) {
            if (! extension_loaded($ext)) {
                $missingExtensions[] = $ext;
            }
        }
        $extOk = empty($missingExtensions);
        $results[] = [
            'Komponen' => 'Ekstensi PHP',
            'Kebutuhan' => implode(', ', $requiredExtensions),
            'Status Aktual' => $extOk ? 'Lengkap ('.count($requiredExtensions).' ekstensi)' : 'Hilang: '.implode(', ', $missingExtensions),
            'Hasil' => $extOk ? '<fg=green>PASS</>' : '<fg=red>FAIL</>',
        ];
        if (! $extOk) {
            $hasFailure = true;
        }

        // 3. PostgreSQL Database
        try {
            $startTime = microtime(true);
            $dbVersion = DB::select('SELECT version()')[0]->version ?? 'Unknown';
            $dbLatency = round((microtime(true) - $startTime) * 1000, 2);
            $tableCount = DB::select("SELECT count(*) as count FROM information_schema.tables WHERE table_schema = 'public'")[0]->count ?? 0;

            $results[] = [
                'Komponen' => 'PostgreSQL Database',
                'Kebutuhan' => 'PostgreSQL 17/18 Port 5432 (Source of Truth)',
                'Status Aktual' => "Terhubung ({$dbLatency}ms, {$tableCount} tabel)",
                'Hasil' => '<fg=green>PASS</>',
            ];
        } catch (Exception $e) {
            $results[] = [
                'Komponen' => 'PostgreSQL Database',
                'Kebutuhan' => 'PostgreSQL 17/18 Port 5432',
                'Status Aktual' => 'Gagal: '.$e->getMessage(),
                'Hasil' => '<fg=red>FAIL</>',
            ];
            $hasFailure = true;
        }

        // 4. Redis Server
        try {
            $startTime = microtime(true);
            $redisPing = Redis::ping();
            $redisLatency = round((microtime(true) - $startTime) * 1000, 2);

            $results[] = [
                'Komponen' => 'Redis Server',
                'Kebutuhan' => 'Redis 8.x Port 6379 (Cache & Telemetri)',
                'Status Aktual' => "Terhubung (Ping: {$redisPing}, {$redisLatency}ms)",
                'Hasil' => '<fg=green>PASS</>',
            ];
        } catch (Exception $e) {
            // Pada environment testing / fallback array cache
            $results[] = [
                'Komponen' => 'Redis Server',
                'Kebutuhan' => 'Redis 8.x Port 6379',
                'Status Aktual' => 'Catatan: '.$e->getMessage(),
                'Hasil' => config('cache.default') === 'redis' ? '<fg=red>FAIL</>' : '<fg=yellow>SKIP (Non-Redis)</>',
            ];
        }

        // 5. Direktori Penyimpanan Terisolasi
        $writablePaths = [
            'storage/app',
            'storage/app/private',
            'storage/framework/cache',
            'storage/framework/sessions',
            'storage/framework/views',
            'storage/logs',
            'bootstrap/cache',
        ];
        $permErrors = [];
        foreach ($writablePaths as $path) {
            $fullPath = base_path($path);
            if (! is_dir($fullPath) || ! is_writable($fullPath)) {
                $permErrors[] = $path;
            }
        }
        $permOk = empty($permErrors);
        $results[] = [
            'Komponen' => 'Direktori Storage',
            'Kebutuhan' => 'Izin baca-tulis (775 / www-data)',
            'Status Aktual' => $permOk ? 'Lengkap & Writable' : 'Tolak akses: '.implode(', ', $permErrors),
            'Hasil' => $permOk ? '<fg=green>PASS</>' : '<fg=red>FAIL</>',
        ];
        if (! $permOk) {
            $hasFailure = true;
        }

        // 6. Enkripsi & Keamanan Aplikasi
        $appKeyOk = ! empty(config('app.key'));
        $results[] = [
            'Komponen' => 'Application Key',
            'Kebutuhan' => '32 bytes base64 APP_KEY',
            'Status Aktual' => $appKeyOk ? 'Terkonfigurasi' : 'Belum diisi',
            'Hasil' => $appKeyOk ? '<fg=green>PASS</>' : '<fg=red>FAIL</>',
        ];
        if (! $appKeyOk) {
            $hasFailure = true;
        }

        // 7. Entitas Institusi Single-Tenant (DEC-001)
        $institutionCount = Institution::count();
        $instOk = $institutionCount >= 1;
        $results[] = [
            'Komponen' => 'Institusi Single-Tenant',
            'Kebutuhan' => '1 Profil Institusi Utama',
            'Status Aktual' => $instOk ? Institution::first()->name : 'Belum di-seed',
            'Hasil' => $instOk ? '<fg=green>PASS</>' : '<fg=yellow>WARN</>',
        ];

        // 8. Akun Administrator Sistem
        $adminCount = User::whereHas('roles', fn ($q) => $q->where('name', 'admin'))->count();
        $adminOk = $adminCount >= 1;
        $results[] = [
            'Komponen' => 'Akun Administrator',
            'Kebutuhan' => 'Minimal 1 Akun Superadmin',
            'Status Aktual' => "{$adminCount} akun admin terdaftar",
            'Hasil' => $adminOk ? '<fg=green>PASS</>' : '<fg=yellow>WARN</>',
        ];

        $this->table(['Komponen', 'Kebutuhan', 'Status Aktual', 'Hasil'], $results);
        $this->newLine();

        if ($hasFailure) {
            $this->error('TERDAPAT KOMPONEN KRITIS YANG BELUM MEMENUHI SYARAT PRODUKSI!');

            return self::FAILURE;
        }

        $this->info('SEMUA PERSYARATAN UTAMA KESIAPAN PRODUKSI MEMENUHI STANDAR!');
        $this->line('Aplikasi TESLOKA siap beroperasi pada server produksi Linux (aaPanel / Nginx / PHP-FPM / PostgreSQL).');

        return self::SUCCESS;
    }
}
