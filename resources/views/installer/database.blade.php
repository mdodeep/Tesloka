@extends('installer.layout')

@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h1 style="font-size: 1.375rem; font-weight: 700; color: var(--color-dark); margin-bottom: 0.375rem; letter-spacing: -0.01em;">
            Konfigurasi Basis Data & Cache
        </h1>
        <p style="color: var(--color-muted); font-size: 0.875rem; line-height: 1.5;">
            TESLOKA CBT menggunakan PostgreSQL sebagai sumber kebenaran data mutlak (Source of Truth) dan Redis untuk caching telemetri ujian.
        </p>
    </div>

    <form method="POST" action="{{ route('installer.database.save') }}" id="databaseForm">
        @csrf

        <div style="background: #f8fafc; padding: 1.25rem; border-radius: 0.75rem; border: 1px solid var(--color-border); margin-bottom: 1.5rem;">
            <h2 style="font-size: 0.9375rem; font-weight: 700; margin-bottom: 0.875rem; color: var(--color-dark);">
                A. Parameter Basis Data Utama
            </h2>

            <div class="form-group">
                <label class="form-label" for="db_connection">Jenis Driver Basis Data</label>
                <select name="db_connection" id="db_connection" class="form-input">
                    <option value="pgsql" {{ ($data['db_connection'] ?? '') === 'pgsql' ? 'selected' : '' }}>PostgreSQL (Sangat Direkomendasikan untuk CBT)</option>
                    <option value="mysql" {{ ($data['db_connection'] ?? '') === 'mysql' ? 'selected' : '' }}>MySQL / MariaDB</option>
                    <option value="sqlite" {{ ($data['db_connection'] ?? '') === 'sqlite' ? 'selected' : '' }}>SQLite (Hanya untuk Demo / Uji Coba)</option>
                </select>
                <div class="form-hint">PostgreSQL menjamin integritas transaksi autosave dan submit receipt ber-hash kriptografis SHA-256.</div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <div class="form-group">
                    <label class="form-label" for="db_host">Host Basis Data</label>
                    <input type="text" name="db_host" id="db_host" class="form-input" value="{{ $data['db_host'] ?? '127.0.0.1' }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="db_port">Port</label>
                    <input type="number" name="db_port" id="db_port" class="form-input" value="{{ $data['db_port'] ?? '5432' }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="db_database">Nama Basis Data (Database Name)</label>
                <input type="text" name="db_database" id="db_database" class="form-input" value="{{ $data['db_database'] ?? 'tesloka' }}" required>
                <div class="form-hint">Pastikan basis data ini sudah dibuat terlebih dahulu di server atau aaPanel Anda.</div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <div class="form-group">
                    <label class="form-label" for="db_username">Nama Pengguna (Username)</label>
                    <input type="text" name="db_username" id="db_username" class="form-input" value="{{ $data['db_username'] ?? 'postgres' }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="db_password">Kata Sandi (Password)</label>
                    <input type="password" name="db_password" id="db_password" class="form-input" value="{{ $data['db_password'] ?? '' }}" placeholder="Kosongkan jika tanpa sandi">
                </div>
            </div>

            <!-- Tombol Uji Koneksi Database -->
            <div style="display: flex; align-items: center; justify-content: flex-start; gap: 1rem; margin-top: 0.5rem; flex-wrap: wrap;">
                <button type="button" id="btnTestDb" class="btn btn-secondary" style="font-size: 0.8125rem;">
                    Uji Koneksi Basis Data
                </button>
                <div id="dbTestStatus" style="font-size: 0.8125rem; font-weight: 600;"></div>
            </div>
        </div>

        <div style="background: #f8fafc; padding: 1.25rem; border-radius: 0.75rem; border: 1px solid var(--color-border); margin-bottom: 1.5rem;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.625rem; flex-wrap: wrap; gap: 0.5rem;">
                <h2 style="font-size: 0.9375rem; font-weight: 700; color: var(--color-dark);">
                    B. Konfigurasi Cache Redis (Disarankan)
                </h2>
                <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.8125rem; font-weight: 600; cursor: pointer;">
                    <input type="checkbox" name="use_redis" id="use_redis" value="1" {{ !empty($data['use_redis']) ? 'checked' : '' }}>
                    Aktifkan Redis
                </label>
            </div>
            <p style="color: var(--color-muted); font-size: 0.8125rem; margin-bottom: 1rem; line-height: 1.4;">
                Redis mempercepat proses validasi sesi login ratusan siswa secara bersamaan dan menjaga kestabilan server saat ujian serentak.
            </p>

            <div id="redisFields" style="{{ !empty($data['use_redis']) ? '' : 'display: none;' }}">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                    <div class="form-group">
                        <label class="form-label" for="redis_host">Host Redis</label>
                        <input type="text" name="redis_host" id="redis_host" class="form-input" value="{{ $data['redis_host'] ?? '127.0.0.1' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="redis_port">Port Redis</label>
                        <input type="number" name="redis_port" id="redis_port" class="form-input" value="{{ $data['redis_port'] ?? '6379' }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="redis_password">Kata Sandi Redis (Opsional)</label>
                    <input type="password" name="redis_password" id="redis_password" class="form-input" value="{{ $data['redis_password'] ?? '' }}" placeholder="Kosongkan jika default tanpa auth">
                </div>

                <div style="display: flex; align-items: center; justify-content: flex-start; gap: 1rem; margin-top: 0.5rem; flex-wrap: wrap;">
                    <button type="button" id="btnTestRedis" class="btn btn-secondary" style="font-size: 0.8125rem;">
                        Uji Koneksi Redis
                    </button>
                    <div id="redisTestStatus" style="font-size: 0.8125rem; font-weight: 600;"></div>
                </div>
            </div>
        </div>

        <div class="btn-row">
            <a href="{{ route('installer.index') }}" class="btn btn-secondary">
                <span>&larr;</span>
                <span>Kembali ke Prasyarat</span>
            </a>

            <button type="submit" class="btn btn-primary" id="btnSubmitDb">
                <span>Lanjutkan ke Identitas Institusi</span>
                <span>&rarr;</span>
            </button>
        </div>
    </form>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dbConnSelect = document.getElementById('db_connection');
        const dbPortInput = document.getElementById('db_port');
        const useRedisCheck = document.getElementById('use_redis');
        const redisFields = document.getElementById('redisFields');

        dbConnSelect.addEventListener('change', function () {
            if (this.value === 'pgsql') {
                dbPortInput.value = 5432;
            } else if (this.value === 'mysql') {
                dbPortInput.value = 3306;
            }
        });

        useRedisCheck.addEventListener('change', function () {
            redisFields.style.display = this.checked ? 'block' : 'none';
        });

        // Test Database AJAX
        const btnTestDb = document.getElementById('btnTestDb');
        const dbStatus = document.getElementById('dbTestStatus');

        btnTestDb.addEventListener('click', async function () {
            dbStatus.style.color = 'var(--color-muted)';
            dbStatus.textContent = 'Memeriksa koneksi...';
            btnTestDb.disabled = true;

            const payload = {
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                db_connection: document.getElementById('db_connection').value,
                db_host: document.getElementById('db_host').value,
                db_port: document.getElementById('db_port').value,
                db_database: document.getElementById('db_database').value,
                db_username: document.getElementById('db_username').value,
                db_password: document.getElementById('db_password').value
            };

            try {
                const res = await fetch("{{ route('installer.database.test') }}", {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                    body: JSON.stringify(payload)
                });
                const data = await res.json();
                if (data.success) {
                    dbStatus.style.color = 'var(--color-success)';
                    dbStatus.textContent = 'Koneksi Berhasil (' + (data.version || 'OK') + ')';
                } else {
                    dbStatus.style.color = 'var(--color-danger)';
                    dbStatus.textContent = data.message || 'Koneksi gagal.';
                }
            } catch (err) {
                dbStatus.style.color = 'var(--color-danger)';
                dbStatus.textContent = 'Galat jaringan: ' + err.message;
            } finally {
                btnTestDb.disabled = false;
            }
        });

        // Test Redis AJAX
        const btnTestRedis = document.getElementById('btnTestRedis');
        const redisStatus = document.getElementById('redisTestStatus');

        btnTestRedis.addEventListener('click', async function () {
            redisStatus.style.color = 'var(--color-muted)';
            redisStatus.textContent = 'Memeriksa Redis...';
            btnTestRedis.disabled = true;

            const payload = {
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                redis_host: document.getElementById('redis_host').value,
                redis_port: document.getElementById('redis_port').value,
                redis_password: document.getElementById('redis_password').value
            };

            try {
                const res = await fetch("{{ route('installer.redis.test') }}", {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                    body: JSON.stringify(payload)
                });
                const data = await res.json();
                if (data.success) {
                    redisStatus.style.color = 'var(--color-success)';
                    redisStatus.textContent = 'Redis Terhubung';
                } else {
                    redisStatus.style.color = 'var(--color-danger)';
                    redisStatus.textContent = data.message || 'Redis gagal dihubungi.';
                }
            } catch (err) {
                redisStatus.style.color = 'var(--color-danger)';
                redisStatus.textContent = 'Galat: ' + err.message;
            } finally {
                btnTestRedis.disabled = false;
            }
        });
    });
</script>
@endsection
