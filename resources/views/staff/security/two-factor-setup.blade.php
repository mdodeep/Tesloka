@extends('layouts.staff')

@section('title', 'Aktivasi Two-Factor Authentication — TESLOKA CBT')
@section('page-parent', 'Keamanan')
@section('page-title', 'Pengaturan Autentikasi 2FA')
@section('page-subtitle', 'Ikuti 3 langkah berikut untuk menautkan aplikasi autentikator Anda dengan akun TESLOKA.')

@section('content')
<div class="max-w-4xl space-y-6">
    @if($errors->any())
        <x-cbt.alert type="danger" :message="$errors->first()" />
    @endif

    <div class="space-y-4">
        <!-- Langkah 1: Kunci Rahasia / QR URL -->
        <x-cbt.card title="Langkah 1: Masukkan Kunci Rahasia ke Aplikasi Autentikator">
            <p class="text-xs text-default-500 mb-3">
                Buka aplikasi seperti <strong>Google Authenticator</strong>, <strong>Microsoft Authenticator</strong>, atau <strong>2FAS</strong>, lalu tambahkan akun baru dengan memasukkan kunci rahasia berikut:
            </p>

            <div class="bg-default-50 border border-default-200 p-4 rounded flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <div class="text-[10px] uppercase font-bold text-default-400">Kunci Rahasia Base32 (Manual Entry):</div>
                    <div class="font-mono font-bold text-base text-primary tracking-widest select-all break-all">
                        {{ $secret }}
                    </div>
                </div>
                <button type="button" onclick="navigator.clipboard.writeText('{{ $secret }}'); alert('Kunci rahasia berhasil disalin!')" class="btn btn-sm bg-white border border-default-200 hover:bg-default-50 text-default-700 text-xs font-semibold rounded shadow-2xs cursor-pointer text-center justify-center w-full sm:w-auto">
                    Salin Kunci
                </button>
            </div>

            <div class="mt-3 text-[11px] text-default-500">
                <span>Atau gunakan tautan URI ini: </span>
                <code class="font-mono text-default-700 bg-default-100 px-1 py-0.5 rounded break-all">{{ $qrUrl }}</code>
            </div>
        </x-cbt.card>

        <!-- Langkah 2: Simpan Kode Pemulihan -->
        <x-cbt.card title="Langkah 2: Simpan Kode Pemulihan Darurat">
            <p class="text-xs text-default-500 mb-3">
                Kode-kode berikut adalah satu-satunya cara memulihkan akun jika ponsel/authenticator Anda hilang:
            </p>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 bg-default-50 p-3 rounded border border-default-200">
                @foreach($recoveryCodes as $code)
                    <div class="font-mono text-center text-xs font-bold bg-white py-1.5 px-2 rounded border border-default-200 text-default-700">
                        {{ $code }}
                    </div>
                @endforeach
            </div>
        </x-cbt.card>

        <!-- Langkah 3: Verifikasi Kode 6 Digit -->
        <x-cbt.card title="Langkah 3: Konfirmasi Kode Autentikasi 6-Digit">
            <form action="{{ route('staff.security.two-factor.confirm') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="code" class="block text-xs font-bold text-default-700 uppercase tracking-wider mb-1.5">
                        Masukkan 6 Angka dari Aplikasi Authenticator <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="code" id="code" required maxlength="6" pattern="[0-9]{6}" autocomplete="one-time-code" autofocus
                        class="form-input w-full text-center tracking-[0.5em] font-mono text-xl py-3 bg-white border-default-200 rounded focus:ring-2 focus:ring-primary/20 focus:border-primary transition shadow-2xs"
                        placeholder="000000">
                </div>

                <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 pt-2">
                    <a href="{{ route('staff.security.two-factor') }}" class="btn btn-sm border border-default-200 bg-white hover:bg-default-50 rounded text-xs font-semibold text-default-600 transition text-center justify-center">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition cursor-pointer text-center justify-center">
                        Verifikasi & Aktifkan 2FA
                    </button>
                </div>
            </form>
        </x-cbt.card>
    </div>
</div>
@endsection

