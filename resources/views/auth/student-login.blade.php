@extends('layouts.auth')

@section('title', 'Login Peserta Ujian')

@section('content')
    <div class="mb-6 text-center space-y-1">
        <h1 class="text-xl font-bold text-default-900 tracking-tight">Login Peserta Ujian</h1>
        <p class="text-xs text-default-500 leading-relaxed">Masukkan Nomor Peserta / NIM dan Kata Sandi Ujian Anda.</p>
    </div>

    <form method="POST" action="{{ route('student.login.post') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="device_telemetry" value="">

        <div class="space-y-1.5">
            <label for="login" class="block text-xs font-semibold text-default-700">
                NIM / Nomor Peserta
            </label>
            <input type="text" id="login" name="login" value="{{ old('login', request('u', request('login', ''))) }}" required autofocus
                placeholder="Contoh: NIM20260001"
                class="form-input rounded-lg">
        </div>

        <div class="space-y-1.5">
            <div class="flex items-center justify-between">
                <label for="password" class="block text-xs font-semibold text-default-700">
                    Kata Sandi Ujian
                </label>
            </div>
            <input type="password" id="password" name="password" required
                placeholder="••••••••"
                class="form-input rounded-lg">
        </div>

        <div class="flex items-center justify-between text-xs pt-1">
            <label class="flex items-center gap-2 cursor-pointer select-none text-default-600 font-medium">
                <input type="checkbox" name="remember" value="1" class="form-checkbox rounded">
                <span>Ingat sesi ujian saya</span>
            </label>
        </div>

        <button type="submit" class="btn btn-primary w-full py-2.5 rounded-lg shadow-xs font-bold text-sm tracking-wide transition-all">
            Masuk ke Portal Ujian
        </button>

        @if(\App\Models\SystemSetting::get('cbt.allow_student_self_registration', false))
            <div class="text-center pt-2 border-t border-default-100 mt-3">
                <span class="text-xs text-default-500">Belum punya akun peserta?</span>
                <a href="{{ route('student.register') }}" class="text-xs font-bold text-primary hover:text-primary-hover hover:underline ml-1">
                    Daftar sebagai Peserta Baru &rarr;
                </a>
            </div>
        @endif
    </form>
@endsection
