<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    public function run(): void
    {
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
