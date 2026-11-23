@extends('layouts.staff')

@section('title', 'Ubah Password Akun')
@section('page-parent', 'Akun Pribadi')
@section('page-title', 'Ubah Password')
@section('page-subtitle', 'Gunakan kombinasi password yang kuat untuk melindungi akun institusi Anda.')

@section('content')
<div class="max-w-3xl space-y-6">
    <div class="bg-white border border-default-200 rounded-md p-6 shadow-xs">
        <form action="{{ route('staff.security.password.update') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Current Password -->
            <div>
                <label for="current_password" class="block text-xs font-bold text-default-700 uppercase tracking-wider mb-1.5">
                    Password Saat Ini <span class="text-rose-500">*</span>
                </label>
                <input type="password" name="current_password" id="current_password" required
                    class="form-input w-full h-11 px-3.5 py-2.5 bg-white border border-default-200 rounded text-xs focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition @error('current_password') border-rose-500 @enderror"
                    placeholder="Masukkan password lama Anda">
                @error('current_password')
                    <p class="mt-1 text-xs text-rose-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="border-t border-default-100 pt-4"></div>

            <!-- New Password -->
            <div>
                <label for="password" class="block text-xs font-bold text-default-700 uppercase tracking-wider mb-1.5">
                    Password Baru <span class="text-rose-500">*</span>
                </label>
                <input type="password" name="password" id="password" required
                    class="form-input w-full h-11 px-3.5 py-2.5 bg-white border border-default-200 rounded text-xs focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition @error('password') border-rose-500 @enderror"
                    placeholder="Minimal 8 karakter (huruf dan angka)">
                @error('password')
                    <p class="mt-1 text-xs text-rose-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm New Password -->
            <div>
                <label for="password_confirmation" class="block text-xs font-bold text-default-700 uppercase tracking-wider mb-1.5">
                    Konfirmasi Password Baru <span class="text-rose-500">*</span>
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="form-input w-full h-11 px-3.5 py-2.5 bg-white border border-default-200 rounded text-xs focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                    placeholder="Ulangi password baru">
            </div>

            <!-- Checklist Kebijakan Keamanan -->
            <div class="bg-default-50 rounded p-4 border border-default-200 text-xs text-default-600 space-y-1.5">
                <div class="font-bold text-default-800 mb-1">Standar Keamanan Password {{ $branding['app_name'] }}:</div>
                <div class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    <span>Minimal terdiri dari 8 karakter</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    <span>Kombinasi huruf besar, huruf kecil, dan angka</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    <span>Pembaruan password otomatis mencabut seluruh sesi lain di perangkat luar</span>
                </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 pt-3">
                <a href="{{ route('staff.security.sessions') }}" class="btn btn-sm border border-default-200 hover:bg-default-50 rounded text-xs font-semibold text-default-600 transition text-center justify-center">
                    Batal
                </a>
                <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition cursor-pointer text-center justify-center">
                    Simpan Password Baru
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

