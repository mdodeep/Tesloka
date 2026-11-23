<?php

namespace App\Console\Commands;

use App\Services\InstallationService;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class InstallCommand extends Command
{
    protected $signature = 'tesloka:install
        {--non-interactive : Jalankan tanpa prompt interaktif menggunakan parameter baris perintah}
        {--db-connection=pgsql : Driver basis data (pgsql, mysql, sqlite)}
        {--db-host=127.0.0.1 : Host basis data}
        {--db-port=5432 : Port basis data}
        {--db-name=tesloka : Nama basis data}
        {--db-user=postgres : Nama pengguna basis data}
        {--db-password= : Kata sandi basis data}
        {--use-redis : Aktifkan Redis untuk cache dan sesi}
        {--redis-host=127.0.0.1 : Host Redis}
        {--redis-port=6379 : Port Redis}
        {--institution-name= : Nama resmi institusi}
        {--institution-code= : NPSN / Kode institusi}
        {--admin-name= : Nama lengkap administrator}
        {--admin-username=admin : Username administrator}
        {--admin-email= : Email administrator}
        {--admin-password= : Kata sandi administrator}
        {--app-url= : URL dasar aplikasi}
        {--force : Paksa instalasi ulang jika sudah terpasang}';

    protected $description = 'Pemasang Sistem Terpadu TESLOKA CBT via CLI / Command Line Interface';

    public function handle(InstallationService $installerService): int
    {
        $this->info('===============================================================');
        $this->info('           TESLOKA CBT : PEMASANG SISTEM RESMI (CLI)          ');
        $this->info('===============================================================');
        $this->newLine();

        if (InstallationService::isInstalled() && ! $this->option('force')) {
            $this->error('Aplikasi TESLOKA CBT sudah terpasang!');
            $this->line('Berkas [storage/installed.lock] terdeteksi.');
            $this->line('Gunakan flag --force jika Anda ingin memaksa instalasi ulang.');

            return self::FAILURE;
        }

        $isNonInteractive = $this->option('non-interactive');

        // 1. Kumpulkan Data Konfigurasi
        if ($isNonInteractive) {
            $payload = [
                'db_connection' => $this->option('db-connection'),
                'db_host' => $this->option('db-host'),
                'db_port' => $this->option('db-port'),
                'db_database' => $this->option('db-name'),
                'db_username' => $this->option('db-user'),
                'db_password' => $this->option('db-password') ?? '',
                'use_redis' => $this->option('use-redis'),
                'redis_host' => $this->option('redis-host'),
                'redis_port' => $this->option('redis-port'),
                'institution_name' => $this->option('institution-name') ?: 'Institusi Pendidikan CBT',
                'institution_code' => $this->option('institution-code') ?: 'NPSN'.rand(10000000, 99999999),
                'admin_name' => $this->option('admin-name') ?: 'Administrator Utama',
                'admin_username' => $this->option('admin-username') ?: 'admin',
                'admin_email' => $this->option('admin-email') ?: 'admin@institusi.local',
                'admin_password' => $this->option('admin-password') ?: Str::password(16),
                'app_url' => $this->option('app-url') ?: config('app.url', 'https://staff.tesloka.test'),
            ];
        } else {
            $this->comment('Langkah 1: Konfigurasi Basis Data');
            $dbConnection = $this->choice('Pilih Driver Basis Data', ['pgsql', 'mysql', 'sqlite'], 'pgsql');
            $dbHost = $this->ask('Host Basis Data', '127.0.0.1');
            $dbPort = $this->ask('Port Basis Data', $dbConnection === 'pgsql' ? '5432' : '3306');
            $dbName = $this->ask('Nama Basis Data', 'tesloka');
            $dbUser = $this->ask('Username Basis Data', 'postgres');
            $dbPass = (string) $this->secret('Kata Sandi Basis Data (kosongkan jika tanpa sandi)');

            // Uji Koneksi Basis Data
            $this->line('Menguji koneksi ke basis data...');
            $testDb = $installerService->testDatabaseConnection([
                'db_connection' => $dbConnection,
                'db_host' => $dbHost,
                'db_port' => $dbPort,
                'db_database' => $dbName,
                'db_username' => $dbUser,
                'db_password' => $dbPass,
            ]);

            if (! $testDb['success']) {
                $this->error('Gagal terhubung ke basis data: '.$testDb['message']);
                if (! $this->confirm('Apakah Anda ingin tetap melanjutkan meskipun koneksi gagal?', false)) {
                    return self::FAILURE;
                }
            } else {
                $this->info('Koneksi basis data berhasil diverifikasi.');
            }

            $this->newLine();
            $this->comment('Langkah 2: Profil Institusi Pendidikan');
            $instName = $this->ask('Nama Resmi Sekolah / Kampus', 'SMK / SMA / Universitas Indonesia');
            $instCode = $this->ask('NPSN / Kode Institusi', 'NPSN'.rand(10000000, 99999999));
            $appUrl = $this->ask('URL Portal Staf', 'https://staff.tesloka.test');

            $this->newLine();
            $this->comment('Langkah 3: Akun Administrator Utama');
            $adminName = $this->ask('Nama Lengkap Administrator', 'Administrator Utama TESLOKA');
            $adminUser = $this->ask('Username Administrator', 'admin');
            $adminEmail = $this->ask('Email Administrator', 'admin@tesloka.test');
            $adminPass = (string) $this->secret('Kata Sandi Administrator (min. 8 karakter)');
            while (strlen($adminPass) < 8) {
                $this->error('Kata sandi minimal 8 karakter!');
                $adminPass = (string) $this->secret('Ketik ulang Kata Sandi Administrator');
            }

            $payload = [
                'db_connection' => $dbConnection,
                'db_host' => $dbHost,
                'db_port' => $dbPort,
                'db_database' => $dbName,
                'db_username' => $dbUser,
                'db_password' => $dbPass,
                'institution_name' => $instName,
                'institution_code' => $instCode,
                'admin_name' => $adminName,
                'admin_username' => $adminUser,
                'admin_email' => $adminEmail,
                'admin_password' => $adminPass,
                'app_url' => $appUrl,
            ];
        }

        $this->newLine();
        $this->info('Memulai proses eksekusi instalasi...');

        try {
            $result = $installerService->executeInstallation($payload, 'cli');

            foreach ($result['logs'] as $log) {
                $this->line(" - {$log}");
            }

            $this->newLine();
            $this->info('===============================================================');
            $this->info('          PEMASANGAN TESLOKA CBT BERHASIL 100%!                ');
            $this->info('===============================================================');
            $rows = [
                ['Institusi', $payload['institution_name']],
                ['NPSN / Kode', $payload['institution_code']],
                ['URL Portal Staf', $payload['app_url']],
                ['Username Admin', $payload['admin_username']],
                ['Email Admin', $payload['admin_email']],
                ['Waktu Pemasangan', $result['lock_data']['installed_at'] ?? date('c')],
            ];
            if (! $this->option('admin-password') && $isNonInteractive) {
                $rows[] = ['Sandi Admin Acak', $payload['admin_password']];
            }
            $this->table(['Parameter', 'Nilai'], $rows);

            return self::SUCCESS;
        } catch (Exception $e) {
            $this->error('Terjadi kesalahan fatal selama instalasi: '.$e->getMessage());

            return self::FAILURE;
        }
    }
}
