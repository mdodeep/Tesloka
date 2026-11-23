<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    public function run(): void
    {
        if (app()->environment('production')) {
            if (Institution::count() > 0) {
                return;
            }

            Institution::create([
                'code' => 'INST-001',
                'name' => config('app.name', 'Portal CBT Institusi'),
                'address' => null,
                'phone' => null,
                'email' => null,
                'logo_path' => null,
                'favicon_path' => null,
                'config' => [
                    'timezone' => config('app.timezone', 'Asia/Jakarta'),
                    'is_active' => true,
                ],
            ]);

            return;
        }

        Institution::updateOrCreate(
            ['code' => 'TESLOKA'],
            [
                'name' => 'Tesloka',
                'address' => 'Jl. Swakarsa IV',
                'phone' => '+62812 1249 9153',
                'email' => 'info@tesloka.web.id',
                'logo_path' => 'logo-tesloka-cbt.webp',
                'favicon_path' => 'favicon-tesloka-bg-putih.webp',
                'config' => [
                    'portal_subdomain' => 'ujian.tesloka.test',
                    'timezone' => 'Asia/Jakarta',
                    'is_active' => true,
                ],
            ]
        );
    }
}
