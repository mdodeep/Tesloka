@extends('layouts.auth')

@section('title', 'Login Peserta Ujian')

@section('content')
    <div class="mb-6 text-center">
        <h1 class="text-xl font-bold text-default-800">Login Peserta Ujian</h1>
        <p class="text-xs text-default-500 mt-1">Masukkan Nomor Induk Mahasiswa/Siswa (NIM) dan Kata Sandi.</p>
    </div>

    <form method="POST" action="{{ route('student.login.post') }}" class="space-y-4">
        @csrf

        <div>
            <label for="login" class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1.5">
                NIM / Nomor Peserta
            </label>
            <input type="text" id="login" name="login" value="{{ old('login') }}" required autofocus
                placeholder="Contoh: NIM20260001"
                class="form-input">
        </div>

        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">
                    Kata Sandi Ujian
                </label>
            </div>
            <input type="password" id="password" name="password" required
                placeholder="••••••••"
                class="form-input">
        </div>

        <div class="flex items-center justify-between text-xs pt-1">
            <label class="flex items-center gap-2 cursor-pointer select-none text-default-600">
                <input type="checkbox" name="remember" class="form-checkbox">
                <span>Ingat sesi ujian saya</span>
            </label>
        </div>

        <button type="submit" class="btn bg-primary text-white w-full">
            Masuk ke Portal Ujian
        </button>

        <div class="pt-4 border-t border-default-100 text-center text-xs text-default-500">
            Dosen, Pengawas, atau Staf? <a href="{{ route('staff.login') }}" class="text-primary font-semibold hover:underline">Masuk ke Portal Staf &rarr;</a>
        </div>
    </form>
@endsection
