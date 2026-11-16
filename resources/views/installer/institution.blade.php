@extends('installer.layout')

@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h1 style="font-size: 1.5rem; font-weight: 700; color: var(--color-dark); margin-bottom: 0.5rem;">
            Identitas Institusi & Domain Portal
        </h1>
        <p style="color: var(--color-muted); font-size: 0.875rem;">
            TESLOKA mengisolasi sistem menjadi tiga portal independen untuk menjamin keamanan dan kenyamanan akses peserta serta staf pengawas.
        </p>
    </div>

    <form method="POST" action="{{ route('installer.institution.save') }}">
        @csrf

        <div style="background: var(--color-bg); padding: 1.25rem; border-radius: 0.75rem; border: 1px solid var(--color-border); margin-bottom: 1.5rem;">
            <h2 style="font-size: 1rem; font-weight: 700; margin-bottom: 1rem; color: var(--color-dark);">
                A. Profil Institusi Pendidikan
            </h2>

            <div class="form-group">
                <label class="form-label" for="institution_name">Nama Resmi Sekolah / Kampus</label>
                <input type="text" name="institution_name" id="institution_name" class="form-input" value="{{ old('institution_name', $data['institution_name'] ?? '') }}" placeholder="Contoh: SMA Negeri 1 Jakarta / Universitas Tesloka" required>
                <div class="form-hint">Nama ini akan dicetak pada KOP Berita Acara, Kartu Peserta Ujian, dan Sertifikat Kelulusan.</div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="form-group">
                    <label class="form-label" for="institution_code">NPSN / Kode Institusi</label>
                    <input type="text" name="institution_code" id="institution_code" class="form-input" value="{{ old('institution_code', $data['institution_code'] ?? '') }}" placeholder="Contoh: 20101234" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="institution_phone">Nomor Telepon / WhatsApp</label>
                    <input type="text" name="institution_phone" id="institution_phone" class="form-input" value="{{ old('institution_phone', $data['institution_phone'] ?? '+62') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="institution_address">Alamat Lengkap</label>
                <input type="text" name="institution_address" id="institution_address" class="form-input" value="{{ old('institution_address', $data['institution_address'] ?? '') }}" placeholder="Jl. Raya No. ..., Kota, Provinsi">
            </div>
        </div>

        <div style="background: var(--color-bg); padding: 1.25rem; border-radius: 0.75rem; border: 1px solid var(--color-border); margin-bottom: 1.5rem;">
            <h2 style="font-size: 1rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--color-dark);">
                B. Alamat Domain Tiga Portal Terisolasi
            </h2>
            <p style="color: var(--color-muted); font-size: 0.8125rem; margin-bottom: 1rem;">
                Pastikan subdomain ini sudah diarahkan (DNS Record A) ke alamat IP server Anda.
            </p>

            <div class="form-group">
                <label class="form-label" for="app_url_staff">1. URL Portal Staf & Administrasi (Admin, Guru, Pengawas)</label>
                <input type="url" name="app_url_staff" id="app_url_staff" class="form-input" value="{{ old('app_url_staff', $data['app_url_staff'] ?? 'https://staff.tesloka.test') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="app_url_student">2. URL Portal Peserta Ujian (Siswa / Mahasiswa)</label>
                <input type="url" name="app_url_student" id="app_url_student" class="form-input" value="{{ old('app_url_student', $data['app_url_student'] ?? 'https://ujian.tesloka.test') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="app_url_cert">3. URL Portal Verifikasi Publik (Cek Ijazah / Sertifikat)</label>
                <input type="url" name="app_url_cert" id="app_url_cert" class="form-input" value="{{ old('app_url_cert', $data['app_url_cert'] ?? 'https://sertifikat.tesloka.test') }}" required>
            </div>
        </div>

        <div class="btn-row">
            <a href="{{ route('installer.database') }}" class="btn btn-secondary">
                <span>&larr;</span>
                <span>Kembali ke Basis Data</span>
            </a>

            <button type="submit" class="btn btn-primary">
                <span>Lanjutkan ke Akun Administrator</span>
                <span>&rarr;</span>
            </button>
        </div>
    </form>
@endsection

