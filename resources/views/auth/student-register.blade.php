@extends('layouts.auth')

@section('title', 'Pendaftaran Peserta Baru')

@section('content')
    <div class="mb-6 text-center">
        <h1 class="text-xl font-bold text-default-800">Registrasi Peserta Baru</h1>
        <p class="text-xs text-default-500 mt-1">Daftarkan diri Anda untuk mengikuti ujian dan evaluasi berbasis komputer.</p>
    </div>

    <form method="POST" action="{{ route('student.register.post') }}" class="space-y-4 text-xs">
        @csrf

        <div>
            <label for="name" class="block font-semibold text-default-700 mb-1">
                Nama Lengkap Siswa / Mahasiswa <span class="text-rose-500">*</span>
            </label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                placeholder="Nama lengkap sesuai identitas resmi"
                class="form-input">
        </div>

        <div>
            <label for="identity_number" class="block font-semibold text-default-700 mb-1">
                Nomor Identitas (NISN / NIM / No. Peserta) <span class="text-rose-500">*</span>
            </label>
            <input type="text" id="identity_number" name="identity_number" value="{{ old('identity_number') }}" required
                placeholder="Contoh: 1234567890"
                class="form-input font-mono">
        </div>

        <div>
            <label for="username" class="block font-semibold text-default-700 mb-1">
                Username Akun Ujian <span class="text-rose-500">*</span>
            </label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" required
                placeholder="Contoh: siswa_ahmad"
                class="form-input font-mono">
            <p class="text-[11px] text-default-400 mt-1">Digunakan untuk masuk login ke dalam portal ujian.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div>
                <label for="email" class="block font-semibold text-default-700 mb-1">
                    Email (Opsional)
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    placeholder="nama@email.com"
                    class="form-input">
            </div>

            <div>
                <label for="phone" class="block font-semibold text-default-700 mb-1">
                    No. WhatsApp / HP (Opsional)
                </label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                    placeholder="08123456789"
                    class="form-input font-mono">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div>
                <label for="password" class="block font-semibold text-default-700 mb-1">
                    Kata Sandi <span class="text-rose-500">*</span>
                </label>
                <input type="password" id="password" name="password" required minlength="6"
                    placeholder="Minimal 6 karakter"
                    class="form-input">
            </div>

            <div>
                <label for="password_confirmation" class="block font-semibold text-default-700 mb-1">
                    Konfirmasi Sandi <span class="text-rose-500">*</span>
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" required minlength="6"
                    placeholder="Ulangi kata sandi"
                    class="form-input">
            </div>
        </div>

        <button type="submit" class="btn bg-primary hover:bg-primary-hover text-white w-full py-2.5 font-bold shadow-xs transition">
            Daftar Sekarang &amp; Masuk Ujian
        </button>

        <div class="pt-4 border-t border-default-100 text-center text-xs text-default-500">
            Sudah memiliki akun? <a href="{{ route('student.login') }}" class="text-primary font-semibold hover:underline">Masuk ke Portal Ujian &rarr;</a>
        </div>
    </form>
@endsection

