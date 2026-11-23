@extends('installer.layout')

@section('content')
    <div style="text-align: center; margin-bottom: 2rem;">
        <div style="width: 3.5rem; height: 3.5rem; background: #ecfdf5; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; color: var(--color-success); margin-bottom: 1rem; border: 2px solid #a7f3d0;">
            <svg style="width: 1.75rem; height: 1.75rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <h1 style="font-size: 1.5rem; font-weight: 800; color: var(--color-dark); margin-bottom: 0.375rem; letter-spacing: -0.01em;">
            Pemasangan Berhasil Diselesaikan!
        </h1>
        <p style="color: var(--color-muted); font-size: 0.875rem; max-width: 560px; margin: 0 auto; line-height: 1.5;">
            Selamat! TESLOKA CBT kini telah terpasang 100% dan siap digunakan untuk menyelenggarakan ujian berbasis komputer di institusi Anda.
        </p>
    </div>

    <div class="alert alert-info" style="margin-bottom: 1.5rem;">
        <strong>Perhatian Pengamanan Sistem:</strong> Berkas penanda keamanan <code>storage/installed.lock</code> telah dibuat secara otomatis. Seluruh rute pemasang sistem (<code>/install</code>) kini telah terkunci secara permanen demi mencegah akses tanpa izin dari publik.
    </div>

    <!-- Informasi Lengkap & Detail -->
    <div style="background: #f8fafc; padding: 1.25rem; border-radius: 0.75rem; border: 1px solid var(--color-border); margin-bottom: 1.5rem;">
        <h2 style="font-size: 0.9375rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--color-dark);">
            Informasi Akses & Kredensial Sistem
        </h2>

        <div class="table-responsive" style="margin-bottom: 0; background: #ffffff;">
            <table class="status-table">
                <tbody>
                    <tr>
                        <td style="width: 35%; color: var(--color-muted);">Institusi Pendidikan</td>
                        <td><strong>{{ $summary['institution_name'] ?? '-' }}</strong></td>
                    </tr>
                    <tr>
                        <td style="color: var(--color-muted);">Portal Staf & Administrasi</td>
                        <td>
                            <a href="{{ $summary['url_staff'] ?? '#' }}" target="_blank" style="color: var(--color-primary); font-weight: 600; text-decoration: none;">
                                {{ $summary['url_staff'] ?? '-' }} &UpperRightArrow;
                            </a>
                            <div class="form-hint">Digunakan oleh Admin, Proktor, Guru, dan Koordinator Ujian.</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="color: var(--color-muted);">Portal Ujian Siswa</td>
                        <td>
                            <a href="{{ $summary['url_student'] ?? '#' }}" target="_blank" style="color: var(--color-primary); font-weight: 600; text-decoration: none;">
                                {{ $summary['url_student'] ?? '-' }} &UpperRightArrow;
                            </a>
                            <div class="form-hint">Alamat pengerjaan ujian untuk seluruh peserta didik.</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="color: var(--color-muted);">Portal Verifikasi Publik</td>
                        <td>
                            <a href="{{ $summary['url_cert'] ?? '#' }}" target="_blank" style="color: var(--color-primary); font-weight: 600; text-decoration: none;">
                                {{ $summary['url_cert'] ?? '-' }} &UpperRightArrow;
                            </a>
                            <div class="form-hint">Verifikasi keaslian ijazah, SKHU, dan sertifikat ber-QR code.</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="color: var(--color-muted);">Username Administrator</td>
                        <td><code>{{ $summary['admin_username'] ?? 'admin' }}</code></td>
                    </tr>
                    <tr>
                        <td style="color: var(--color-muted);">Email Administrator</td>
                        <td>{{ $summary['admin_email'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="color: var(--color-muted);">Waktu Pemasangan</td>
                        <td>{{ $summary['installed_at'] ?? date('c') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Catatan Pasca Instalasi -->
    <div style="background: #ffffff; border: 1px dashed var(--color-border); padding: 1.25rem; border-radius: 0.75rem; margin-bottom: 2rem;">
        <h3 style="font-size: 0.875rem; font-weight: 700; color: var(--color-dark); margin-bottom: 0.5rem;">
            Langkah Penting Berikutnya:
        </h3>
        <ol style="margin-left: 1.25rem; font-size: 0.8125rem; color: var(--color-muted); line-height: 1.6;">
            <li>Pastikan <strong>Queue Worker</strong> (Supervisor) aktif di server agar pengiriman email, pembuatan sertifikat, dan impor bank soal berjalan di latar belakang.</li>
            <li>Pastikan <strong>Cron Scheduler</strong> (<code>* * * * * php /jalur/ke/artisan schedule:run</code>) aktif di server untuk sinkronisasi sesi dan penutupan ujian otomatis.</li>
            <li>Segera lakukan penggantian kata sandi pertama kali setelah berhasil masuk ke Portal Staf.</li>
        </ol>
    </div>

    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
        <button type="button" class="btn btn-secondary" id="btnDownloadSummary">
            Unduh Ringkasan (.TXT)
        </button>

        <a href="{{ $summary['url_staff'] ?? route('staff.login') }}" class="btn btn-primary" style="font-size: 0.9375rem; padding: 0.625rem 1.5rem;">
            <span>Buka Portal Staf & Masuk</span>
            <span>&rarr;</span>
        </a>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnDownload = document.getElementById('btnDownloadSummary');

        btnDownload.addEventListener('click', function () {
            const summaryText = `===============================================================
       TESLOKA CBT : RINGKASAN PEMASANGAN RESMI SISTEM
===============================================================

Institusi Pendidikan  : {{ $summary['institution_name'] ?? '-' }}
Waktu Pemasangan      : {{ $summary['installed_at'] ?? date('c') }}

ALAMAT AKSES PORTAL:
- Portal Staf & Admin : {{ $summary['url_staff'] ?? '-' }}
- Portal Ujian Siswa  : {{ $summary['url_student'] ?? '-' }}
- Portal Sertifikat   : {{ $summary['url_cert'] ?? '-' }}

KREDENSIAL ADMINISTRATOR UTAMA:
- Username            : {{ $summary['admin_username'] ?? 'admin' }}
- Email               : {{ $summary['admin_email'] ?? '-' }}

STATUS PENGAMANAN:
- File Kunci          : storage/installed.lock (TERKUNCI)
- Rute /install       : Dinonaktifkan Permanen

===============================================================
Simpan berkas ini di tempat aman oleh Administrator Sistem.
Hak Cipta (c) {{ date('Y') }} TESLOKA CBT.
===============================================================`;

            const blob = new Blob([summaryText], { type: 'text/plain;charset=utf-8' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'ringkasan-instalasi-tesloka.txt';
            link.click();
            URL.revokeObjectURL(link.href);
        });
    });
</script>
@endsection
