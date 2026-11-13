<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('system_settings')) {
                $host = \App\Models\SystemSetting::get('mail_host');
                if ($host) {
                    $port = (int) \App\Models\SystemSetting::get('mail_port', 587);
                    $username = \App\Models\SystemSetting::get('mail_username');
                    $password = \App\Models\SystemSetting::get('mail_password');
                    $encryption = \App\Models\SystemSetting::get('mail_encryption', 'tls');
                    $fromAddress = \App\Models\SystemSetting::get('mail_from_address');
                    $fromName = \App\Models\SystemSetting::get('mail_from_name');

                    config([
                        'mail.mailers.smtp.host' => $host,
                        'mail.mailers.smtp.port' => $port,
                        'mail.mailers.smtp.username' => $username,
                        'mail.mailers.smtp.password' => $password,
                        'mail.mailers.smtp.encryption' => ($encryption === 'none' || empty($encryption)) ? null : strtolower($encryption),
                        'mail.from.address' => $fromAddress ?: config('mail.from.address'),
                        'mail.from.name' => $fromName ?: config('mail.from.name'),
                    ]);
                }
            }
        } catch (\Throwable $e) {
            // Abaikan jika database belum siap saat migrasi awal
        }
    }
}
