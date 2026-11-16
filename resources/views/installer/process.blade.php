@extends('installer.layout')

@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h1 style="font-size: 1.5rem; font-weight: 700; color: var(--color-dark); margin-bottom: 0.5rem;">
            Konfirmasi & Eksekusi Pemasangan
        </h1>
        <p style="color: var(--color-muted); font-size: 0.875rem;">
            Periksa kembali seluruh parameter konfigurasi sebelum sistem memulai proses inisialisasi basis data dan data master awal.
        </p>
    </div>

    <div style="background: var(--color-bg); padding: 1.25rem; border-radius: 0.75rem; border: 1px solid var(--color-border); margin-bottom: 1.5rem;">
        <h2 style="font-size: 1rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--color-dark);">
            Ringkasan Konfigurasi
        </h2>
        <table class="status-table">
            <tbody>
                <tr>
                    <td style="width: 35%; color: var(--color-muted);">Basis Data</td>
                    <td><strong>{{ strtoupper($database['db_connection'] ?? 'pgsql') }}</strong> ({{ $database['db_username'] ?? 'postgres' }}@{{ $database['db_host'] ?? '127.0.0.1' }}:{{ $database['db_port'] ?? '5432' }} / {{ $database['db_database'] ?? 'tesloka' }})</td>
                </tr>
                <tr>
                    <td style="color: var(--color-muted);">Cache Redis</td>
                    <td>{{ !empty($database['use_redis']) ? 'Aktif (' . ($database['redis_host'] ?? '127.0.0.1') . ':' . ($database['redis_port'] ?? '6379') . ')' : 'Nonaktif (File Cache)' }}</td>
                </tr>
                <tr>
                    <td style="color: var(--color-muted);">Institusi</td>
                    <td><strong>{{ $institution['institution_name'] ?? '-' }}</strong> (NPSN: {{ $institution['institution_code'] ?? '-' }})</td>
                </tr>
                <tr>
                    <td style="color: var(--color-muted);">Domain Portal Staf</td>
                    <td><code>{{ $institution['app_url_staff'] ?? '-' }}</code></td>
                </tr>
                <tr>
                    <td style="color: var(--color-muted);">Domain Portal Ujian</td>
                    <td><code>{{ $institution['app_url_student'] ?? '-' }}</code></td>
                </tr>
                <tr>
                    <td style="color: var(--color-muted);">Domain Sertifikat</td>
                    <td><code>{{ $institution['app_url_cert'] ?? '-' }}</code></td>
                </tr>
                <tr>
                    <td style="color: var(--color-muted);">Administrator Utama</td>
                    <td><strong>{{ $admin['admin_name'] ?? '-' }}</strong> (Username: <code>{{ $admin['admin_username'] ?? 'admin' }}</code> / Email: {{ $admin['admin_email'] ?? '-' }})</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Progress Bar (Tersembunyi Awalnya) -->
    <div id="progressSection" style="display: none; margin-bottom: 1.5rem;">
        <div style="display: flex; justify-content: space-between; font-size: 0.8125rem; font-weight: 600; margin-bottom: 0.375rem;">
            <span id="progressLabel" style="color: var(--color-dark);">Menginisialisasi sistem...</span>
            <span id="progressPercent" style="color: var(--color-primary);">0%</span>
        </div>
        <div style="height: 8px; background: var(--color-border); border-radius: 9999px; overflow: hidden; margin-bottom: 1rem;">
            <div id="progressBar" style="width: 0%; height: 100%; background: linear-gradient(90deg, #2e33ff 0%, #14bba6 100%); transition: width 0.3s ease;"></div>
        </div>

        <div style="background: #0f172a; color: #38bdf8; font-family: monospace; font-size: 0.75rem; padding: 1rem; border-radius: 0.5rem; height: 140px; overflow-y: auto; line-height: 1.6;" id="logConsole">
            [TESLOKA] Menunggu instruksi pemasangan...
        </div>
    </div>

    <div class="btn-row" id="actionButtons">
        <a href="{{ route('installer.admin') }}" class="btn btn-secondary">
            <span>&larr;</span>
            <span>Kembali ke Akun Admin</span>
        </a>

        <button type="button" class="btn btn-primary" id="btnExecute">
            <span>Mulai Pemasangan Sistem Sekarang</span>
            <span>&rarr;</span>
        </button>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnExecute = document.getElementById('btnExecute');
        const progressSection = document.getElementById('progressSection');
        const actionButtons = document.getElementById('actionButtons');
        const progressBar = document.getElementById('progressBar');
        const progressPercent = document.getElementById('progressPercent');
        const progressLabel = document.getElementById('progressLabel');
        const logConsole = document.getElementById('logConsole');

        function appendLog(text) {
            const time = new Date().toLocaleTimeString();
            logConsole.innerHTML += `\n[${time}] ${text}`;
            logConsole.scrollTop = logConsole.scrollHeight;
        }

        btnExecute.addEventListener('click', async function () {
            btnExecute.disabled = true;
            btnExecute.style.display = 'none';
            progressSection.style.display = 'block';

            appendLog('Memulai eksekusi pemasangan sistem...');
            progressBar.style.width = '20%';
            progressPercent.textContent = '20%';
            progressLabel.textContent = 'Menyiapkan berkas lingkungan (.env)...';

            try {
                const res = await fetch("{{ route('installer.execute') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({})
                });

                progressBar.style.width = '60%';
                progressPercent.textContent = '60%';
                progressLabel.textContent = 'Menjalankan migrasi tabel & seeder awal...';

                const data = await res.json();

                if (data.success) {
                    progressBar.style.width = '100%';
                    progressPercent.textContent = '100%';
                    progressLabel.textContent = 'Pemasangan selesai!';
                    appendLog('Pemasangan sistem sukses 100%.');
                    appendLog('Mengalihkan ke halaman ringkasan selesai...');

                    setTimeout(function () {
                        window.location.href = data.redirect || "{{ route('installer.finish') }}";
                    }, 1200);
                } else {
                    progressBar.style.background = 'var(--color-danger)';
                    progressLabel.textContent = 'Pemasangan Gagal!';
                    appendLog('GALAT: ' + (data.message || 'Terjadi kesalahan sistem.'));
                    alert('Gagal: ' + (data.message || 'Terjadi galat sistem.'));
                    btnExecute.disabled = false;
                    btnExecute.style.display = 'inline-flex';
                }
            } catch (err) {
                progressBar.style.background = 'var(--color-danger)';
                progressLabel.textContent = 'Galat Jaringan!';
                appendLog('GALAT: ' + err.message);
                alert('Terjadi kesalahan jaringan: ' + err.message);
                btnExecute.disabled = false;
                btnExecute.style.display = 'inline-flex';
            }
        });
    });
</script>
@endsection

