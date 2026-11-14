<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'subject',
        'body_template',
        'channel',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Dapatkan sampel data realistis untuk pengujian / pratinjau template email.
     */
    public static function getSampleData(): array
    {
        return [
            'nama_siswa' => 'Ahmad Fauzi',
            'username' => '20261001',
            'email_siswa' => 'ahmad.fauzi@siswa.test',
            'judul_ujian' => 'Ujian Akhir Semester Ganjil 2026/2027',
            'kode_sesi' => 'SESI-PAGI-01',
            'waktu_mulai' => 'Senin, 10 Nov 2026 08:00 WIB',
            'nama_ruang' => 'Laboratorium Komputer 1',
            'nilai' => '88.50',
            'kkm' => '75.00',
            'status_kelulusan' => 'LULUS',
            'nama_institusi' => SystemSetting::get('institution_name', 'Tesloka'),
            'token' => 'TESLOKA26',
            'durasi' => '90 Menit',
            'tanggal' => now()->translatedFormat('d F Y'),
        ];
    }

    /**
     * Render subjek dan bodi pesan dengan data sampel atau data spesifik.
     */
    public function renderPreview(?string $customSubject = null, ?string $customBody = null, ?array $customData = null): array
    {
        $data = array_merge(self::getSampleData(), $customData ?? []);
        $subject = $customSubject ?? $this->subject;
        $body = $customBody ?? $this->body_template;

        foreach ($data as $key => $val) {
            $placeholder = '{{'.$key.'}}';
            $subject = str_replace($placeholder, (string) $val, $subject);
            $body = str_replace($placeholder, (string) $val, $body);
        }

        return [
            'template_id' => $this->id,
            'template_code' => $this->code,
            'template_name' => $this->name,
            'channel' => $this->channel,
            'subject' => $subject,
            'body' => $body,
            'sample_data' => $data,
        ];
    }
}
