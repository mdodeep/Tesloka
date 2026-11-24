@extends('layouts.auth')

@section('title', 'Login Staf & Pengawas')

@section('content')
    <div class="mb-6 text-center space-y-1">
        <h1 class="text-xl font-bold text-default-900 tracking-tight">Login Portal Staf</h1>
        <p class="text-xs text-default-500 leading-relaxed">Sistem Administrasi, Pengawasan, &amp; Evaluasi Ujian</p>
    </div>

    <form method="POST" action="{{ route('staff.login.post') }}" class="space-y-4">
        @csrf

        <div class="space-y-1.5">
            <label for="login" class="block text-xs font-semibold text-default-700">
                Email / Username
            </label>
            <input type="text" id="login" name="login" value="{{ old('login') }}" required autofocus
                placeholder="nama@tesloka.test atau username"
                class="form-input rounded-lg">
        </div>

        <div class="space-y-1.5">
            <div class="flex items-center justify-between">
                <label for="password" class="block text-xs font-semibold text-default-700">
                    Kata Sandi
                </label>
            </div>
            <input type="password" id="password" name="password" required
                placeholder="••••••••"
                class="form-input rounded-lg">
        </div>

        <div class="flex items-center justify-between text-xs pt-1">
            <label class="flex items-center gap-2 cursor-pointer select-none text-default-600 font-medium">
                <input type="checkbox" name="remember" value="1" class="form-checkbox rounded">
                <span>Ingat saya di perangkat ini</span>
            </label>
        </div>

        <button type="submit" class="btn btn-primary w-full py-2.5 rounded-lg shadow-xs font-bold text-sm tracking-wide transition-all">
            Masuk ke Portal Staf
        </button>

        @if(\App\Models\SystemSetting::get('cbt.allow_staff_self_registration', false))
            <div class="text-center pt-2 border-t border-default-100 mt-3">
                <span class="text-xs text-default-500">Belum punya akun dosen/staf?</span>
                <a href="{{ route('staff.register') }}" class="text-xs font-bold text-primary hover:text-primary-hover hover:underline ml-1">
                    Daftar sebagai Dosen / Staf &rarr;
                </a>
            </div>
        @endif
    </form>
@endsection
