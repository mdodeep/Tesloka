@extends('layouts.auth')

@section('title', 'Login Staf & Pengawas')

@section('content')
    <div class="mb-5 text-center">
        <h1 class="text-xl font-bold text-default-800">Login Portal Staf</h1>
        <p class="text-xs text-default-500 mt-1">Sistem Administrasi & Evaluasi TESLOKA CBT</p>
    </div>

    <!-- Informasi Hak Akses Portal Staf -->
    <div class="mb-4 p-3 bg-primary/5 border border-primary/20 rounded-md text-xs text-default-700">
        <div class="flex items-center gap-1.5 font-semibold text-primary mb-1">
            <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
            <span>Ketentuan Akses Portal Staf:</span>
        </div>
        <p class="text-[11px] text-default-600 leading-relaxed">
            Portal ini hanya dapat diakses oleh personel berwenang institusi:
            <strong>Administrator</strong>, <strong>Guru/Dosen/Penulis Soal</strong>, <strong>Pengawas Ujian</strong>, <strong>Operator CBT</strong>, dan <strong>Auditor</strong>.
            <span class="text-danger block mt-1 font-medium">&bull; Akun peserta ujian (siswa) tidak dapat masuk melalui portal ini.</span>
        </p>
    </div>

    <form method="POST" action="{{ route('staff.login.post') }}" class="space-y-4">
        @csrf

        <div>
            <label for="login" class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1.5">
                Email / Username
            </label>
            <input type="text" id="login" name="login" value="{{ old('login') }}" required autofocus
                placeholder="nama@tesloka.test atau username"
                class="form-input">
        </div>

        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">
                    Kata Sandi
                </label>
            </div>
            <input type="password" id="password" name="password" required
                placeholder="••••••••"
                class="form-input">
        </div>

        <div class="flex items-center justify-between text-xs pt-1">
            <label class="flex items-center gap-2 cursor-pointer select-none text-default-600">
                <input type="checkbox" name="remember" value="1" class="form-checkbox">
                <span>Ingat saya di perangkat ini</span>
            </label>
        </div>

        <button type="submit" class="btn bg-primary text-white w-full">
            Masuk ke Portal Staf
        </button>
    </form>
@endsection
