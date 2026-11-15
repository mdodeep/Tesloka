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
            <i data-lucide="shield-check" class="size-4 shrink-0"></i>
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
