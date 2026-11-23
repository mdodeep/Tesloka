<?php

namespace App\Providers;

use App\Models\SystemSetting;
use App\Services\BrandingService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
            View::composer('*', function ($view): void {
                if (! array_key_exists('branding', $view->getData())) {
                    $view->with('branding', app(BrandingService::class)->getBranding());
                }
            });

            if (Schema::hasTable('system_settings')) {
                $host = SystemSetting::get('mail_host');
                $fromName = SystemSetting::get('mail_from_name');

                if ($host) {
                    $port = (int) SystemSetting::get('mail_port', 587);
                    $username = SystemSetting::get('mail_username');
                    $password = SystemSetting::get('mail_password');
                    $encryption = SystemSetting::get('mail_encryption', 'tls');
                    $fromAddress = SystemSetting::get('mail_from_address');

                    config([
                        'mail.default' => 'smtp',
                        'mail.mailers.smtp.transport' => 'smtp',
                        'mail.mailers.smtp.host' => $host,
                        'mail.mailers.smtp.port' => $port,
                        'mail.mailers.smtp.username' => $username,
                        'mail.mailers.smtp.password' => $password,
                        'mail.mailers.smtp.encryption' => ($encryption === 'none' || empty($encryption)) ? null : strtolower($encryption),
                        'mail.from.address' => $fromAddress ?: config('mail.from.address'),
                        'mail.from.name' => $fromName ?: app(BrandingService::class)->getBranding()['app_name'],
                    ]);
                } elseif (! $fromName) {
                    config(['mail.from.name' => app(BrandingService::class)->getBranding()['app_name']]);
                }
            }
        } catch (\Throwable $e) {
            // Abaikan jika database belum siap saat migrasi awal
        }
    }
}
