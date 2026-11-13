<?php

namespace Database\Seeders;

use App\Models\NotificationTemplate;
use Illuminate\Database\Seeder;

class NotificationTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            [
                'code' => 'exam_results_published',
                'name' => 'Pengumuman Nilai & Hasil Ujian',
                'subject' => 'Hasil Ujian Resmi: {{judul_ujian}} - {{nama_institusi}}',
                'body_template' => '<p>Yth. {{nama_siswa}},</p><p>Hasil penilaian resmi untuk ujian <strong>{{judul_ujian}}</strong> telah dipublikasikan.</p><p><strong>Nilai Akhir:</strong> {{nilai}} (KKM: {{kkm}})<br><strong>Status:</strong> {{status_kelulusan}}</p><p>Silakan masuk ke portal ujian untuk melihat rincian capaian kompetensi.</p>',
                'channel' => 'email',
                'is_active' => true,
            ],
            [
                'code' => 'exam_scheduled',
                'name' => 'Pemberitahuan Jadwal Sesi Ujian',
                'subject' => 'Jadwal Ujian: {{judul_ujian}} (Sesi {{kode_sesi}})',
                'body_template' => '<p>Halo {{nama_siswa}},</p><p>Anda terdaftar pada sesi ujian <strong>{{judul_ujian}}</strong> yang dijadwalkan pada <strong>{{waktu_mulai}}</strong> di Ruang <strong>{{nama_ruang}}</strong>.</p><p><strong>Token Masuk Ujian:</strong> <code>{{token}}</code><br><strong>Kode Sesi:</strong> {{kode_sesi}}</p><p>Harap hadir 15 menit sebelum ujian dimulai dengan membawa nomor peserta dan kartu identitas.</p>',
                'channel' => 'email',
                'is_active' => true,
            ],
            [
                'code' => 'account_created',
                'name' => 'Akun Baru Pengguna',
                'subject' => 'Selamat Datang di TESLOKA CBT - Akun Anda Telah Aktif',
                'body_template' => '<p>Selamat datang {{nama_siswa}},</p><p>Akun portal TESLOKA CBT Anda telah berhasil dibuat.</p><p><strong>Nomor Peserta / Username:</strong> {{username}}<br>Gunakan sandi yang telah dibagikan pengelola untuk masuk ke sistem.</p>',
                'channel' => 'email',
                'is_active' => true,
            ],
        ];

        foreach ($templates as $tmpl) {
            NotificationTemplate::updateOrCreate(
                ['code' => $tmpl['code']],
                $tmpl
            );
        }
    }
}

