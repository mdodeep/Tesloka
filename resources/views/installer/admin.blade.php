@extends('installer.layout')

@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h1 style="font-size: 1.5rem; font-weight: 700; color: var(--color-dark); margin-bottom: 0.5rem;">
            Pembuatan Akun Administrator Utama
        </h1>
        <p style="color: var(--color-muted); font-size: 0.875rem;">
            Akun ini memiliki hak akses penuh (*Super Administrator*) untuk mengelola seluruh konfigurasi ujian, bank soal, data akademik, dan staf pengawas.
        </p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin-left: 1.25rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('installer.admin.save') }}">
        @csrf

        <div style="background: var(--color-bg); padding: 1.25rem; border-radius: 0.75rem; border: 1px solid var(--color-border); margin-bottom: 1.5rem;">
            <div class="form-group">
                <label class="form-label" for="admin_name">Nama Lengkap Administrator</label>
                <input type="text" name="admin_name" id="admin_name" class="form-input" value="{{ old('admin_name', $data['admin_name'] ?? 'Administrator Utama TESLOKA') }}" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="form-group">
                    <label class="form-label" for="admin_username">Username</label>
                    <input type="text" name="admin_username" id="admin_username" class="form-input" value="{{ old('admin_username', $data['admin_username'] ?? 'admin') }}" required>
                    <div class="form-hint">Hanya huruf, angka, tanda strip (-), atau garis bawah (_).</div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="admin_email">Alamat Email</label>
                    <input type="email" name="admin_email" id="admin_email" class="form-input" value="{{ old('admin_email', $data['admin_email'] ?? 'admin@tesloka.test') }}" required>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="form-group">
                    <label class="form-label" for="admin_password">Kata Sandi (Password)</label>
                    <input type="password" name="admin_password" id="admin_password" class="form-input" placeholder="Minimal 8 karakter" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="admin_password_confirmation">Konfirmasi Kata Sandi</label>
                    <input type="password" name="admin_password_confirmation" id="admin_password_confirmation" class="form-input" placeholder="Ketik ulang kata sandi" required>
                </div>
            </div>
        </div>

        <div class="btn-row">
            <a href="{{ route('installer.institution') }}" class="btn btn-secondary">
                <span>&larr;</span>
                <span>Kembali ke Institusi</span>
            </a>

            <button type="submit" class="btn btn-primary">
                <span>Lanjutkan ke Tinjauan & Eksekusi</span>
                <span>&rarr;</span>
            </button>
        </div>
    </form>
@endsection

