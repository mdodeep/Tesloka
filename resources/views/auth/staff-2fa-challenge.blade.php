@extends('layouts.auth')

@section('title', 'Verifikasi Dua Faktor (2FA) : Staf')

@section('content')
    <div class="mb-6 text-center">
        <div class="size-12 rounded-full bg-primary/10 text-primary mx-auto flex items-center justify-center mb-3">
            <i data-lucide="shield-check" class="size-6"></i>
        </div>
        <h1 class="text-xl font-bold text-default-800">Tantangan Keamanan 2FA</h1>
        <p class="text-xs text-default-500 mt-1">
            Akun <strong>{{ $user->email ?: $user->username }}</strong> dilindungi otentikasi dua faktor (2FA).
        </p>
    </div>

    <form method="POST" action="{{ route('staff.2fa.challenge.verify') }}" class="space-y-4">
        @csrf

        <div>
            <label for="code" class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1.5">
                Kode Autentikator / Kode Pemulihan
            </label>
            <input type="text" id="code" name="code" required autofocus autocomplete="one-time-code"
                placeholder="Contoh: 123456 atau ABCD-EFGH"
                class="form-input text-center text-lg tracking-widest font-mono font-bold">
            <p class="text-[11px] text-default-400 mt-1.5 leading-relaxed">
                Buka aplikasi authenticator Anda (seperti Google Authenticator atau Aegis) dan masukkan 6 digit kode yang tampil, atau masukkan kode darurat cadangan Anda.
            </p>
        </div>

        <button type="submit" class="btn bg-primary text-white w-full shadow-xs">
            Verifikasi &amp; Lanjutkan ke Portal Staf
        </button>

        <div class="pt-4 border-t border-default-100 text-center text-xs text-default-500">
            <a href="{{ route('staff.login') }}" class="text-default-600 hover:text-primary font-medium">
                &larr; Batalkan &amp; Kembali ke Halaman Login
            </a>
        </div>
    </form>
@endsection

