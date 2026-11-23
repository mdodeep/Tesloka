@extends('layouts.staff')

@section('title', 'Profil & Kata Sandi')
@section('page-parent', 'Akun Pribadi')
@section('page-title', 'Profil & Kata Sandi')
@section('page-subtitle', 'Kelola informasi identitas, foto profil resmi, dan keamanan kata sandi akun Anda.')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 w-full">
    <!-- Kolom Kiri: Kartu Ringkasan Pengguna (Modern Style) -->
    <div class="lg:col-span-4 space-y-6">
        <x-cbt.card>
            <div class="text-center py-4">
                <div class="relative inline-block mb-3">
                    <img src="{{ $user->photo_url }}" alt="{{ $user->name }}" class="size-24 rounded-full object-cover border-2 border-default-200 shadow-sm mx-auto">
                    <span class="absolute bottom-0 right-1 size-4 bg-emerald-500 border-2 border-white rounded-full" title="Akun Aktif"></span>
                </div>

                @if($user->hasCustomPhoto())
                    <div class="mb-3">
                        <form method="POST" action="{{ route('staff.profile.reset-photo') }}" onsubmit="return confirm('Apakah Anda yakin ingin mereset foto profil ke avatar default Tesloka?')">
                            @csrf
                            <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold rounded text-danger bg-danger/10 hover:bg-danger hover:text-white transition cursor-pointer">
                                <i data-lucide="rotate-ccw" class="size-3.5"></i>
                                <span>Reset Foto Profil</span>
                            </button>
                        </form>
                    </div>
                @endif

                <h3 class="text-base font-bold text-default-800">{{ $user->name }}</h3>
                <p class="text-xs text-default-500 mt-0.5">{{ $user->email }}</p>

                <div class="mt-3 flex items-center justify-center gap-1.5">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-[11px] font-semibold bg-primary/10 text-primary border border-primary/20">
                        {{ $user->roles->pluck('display_name')->first() ?? 'Staf Pegawai' }}
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                        Aktif
                    </span>
                </div>
            </div>

            <div class="border-t border-default-200 pt-4 mt-2 space-y-3 text-xs">
                <div class="flex items-center justify-between">
                    <span class="text-default-500">NIP / Identitas:</span>
                    <span class="font-semibold text-default-800 font-mono">{{ $user->identity_number ?? '-' }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-default-500">Institusi:</span>
                    <span class="font-semibold text-default-800">{{ $user->institution->name ?? 'Tesloka' }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-default-500">Terdaftar Sejak:</span>
                    <span class="font-semibold text-default-800">{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</span>
                </div>
            </div>

            <div class="border-t border-default-200 pt-4 mt-4">
                <a href="{{ route('staff.security.two-factor') }}" class="w-full h-10 px-4 bg-white hover:bg-default-50 text-default-700 hover:text-default-900 border border-default-200 hover:border-default-300 rounded-md text-xs font-semibold shadow-2xs transition inline-flex items-center justify-center gap-2 cursor-pointer">
                    <i data-lucide="shield-check" class="size-4 text-primary"></i>
                    <span>Pengaturan Autentikasi (2FA)</span>
                </a>
            </div>
        </x-cbt.card>
    </div>

    <!-- Kolom Kanan: Form Data Profil & Ganti Password -->
    <div class="lg:col-span-8 space-y-6">
        <!-- Kartu Informasi Profil -->
        <x-cbt.card title="Informasi Profil Staf" subtitle="Perbarui foto profil dan data kontak Anda.">
            <form method="POST" action="{{ route('staff.profile.update') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider">Foto Profil Pegawai / Staf</label>
                        @if($user->hasCustomPhoto())
                            <label class="inline-flex items-center gap-1.5 text-xs text-danger font-semibold cursor-pointer">
                                <input type="checkbox" name="remove_photo" value="1" class="rounded border-default-300 text-danger focus:ring-danger">
                                <span>Reset ke Avatar Default</span>
                            </label>
                        @endif
                    </div>
                    <x-cbt.dropzone
                        name="photo"
                        id="profile_photo_dropzone"
                        label="Unggah Foto Profil Pegawai / Staf"
                        accept="image/jpeg,image/png,image/webp"
                        maxSize="1MB"
                        :currentUrl="$user->photo_path ? Storage::url($user->photo_path) : null"
                        hint="Maks. 1 MB (JPG, PNG, atau WebP). Jika belum ada foto, sistem otomatis menggunakan avatar default tesloka-default-profile.webp."
                    />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                            class="form-input">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1.5">Email Resmi</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="form-input">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1.5">Nomor Telepon / WhatsApp</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="form-input" placeholder="+62...">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1.5">NIP / Nomor Identitas (Readonly)</label>
                        <input type="text" value="{{ $user->identity_number ?? '-' }}" readonly
                            class="form-input bg-default-50 text-default-500 cursor-not-allowed">
                    </div>
                </div>

                <div class="flex justify-end pt-3 border-t border-default-100">
                    <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold inline-flex items-center justify-center gap-2 cursor-pointer shadow-2xs">
                        <i data-lucide="save" class="size-4"></i>
                        <span>Simpan Perubahan Profil</span>
                    </button>
                </div>
            </form>
        </x-cbt.card>

        <!-- Kartu Ganti Kata Sandi Terintegrasi -->
        <div id="change-password">
            <x-cbt.card title="Ganti Kata Sandi" subtitle="Pastikan kata sandi baru Anda kuat dan sulit ditebak untuk melindungi akun institusi.">
                <form method="POST" action="{{ route('staff.password.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1.5">
                            Kata Sandi Saat Ini <span class="text-danger">*</span>
                        </label>
                        <input type="password" name="current_password" required
                            class="form-input @error('current_password') border-danger @enderror" placeholder="Masukkan kata sandi lama Anda">
                        @error('current_password')
                            <p class="mt-1 text-xs text-danger font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1.5">
                                Kata Sandi Baru <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="password" required
                                class="form-input @error('password') border-danger @enderror" placeholder="Minimal 8 karakter & angka">
                            @error('password')
                                <p class="mt-1 text-xs text-danger font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1.5">
                                Konfirmasi Kata Sandi Baru <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="password_confirmation" required
                                class="form-input" placeholder="Ulangi kata sandi baru">
                        </div>
                    </div>

                    <!-- Checklist Kebijakan Keamanan Password -->
                    <div class="bg-default-50 rounded p-3.5 border border-default-200 text-xs text-default-600 space-y-1.5">
                        <div class="font-bold text-default-800 mb-1">Standar Keamanan Kata Sandi {{ $branding['app_name'] }}:</div>
                        <div class="flex items-center gap-2">
                            <span class="size-1.5 rounded-full bg-emerald-500"></span>
                            <span>Minimal terdiri dari 8 karakter</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="size-1.5 rounded-full bg-emerald-500"></span>
                            <span>Kombinasi huruf dan angka</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="size-1.5 rounded-full bg-emerald-500"></span>
                            <span>Pembaruan kata sandi otomatis mencabut seluruh sesi aktif lain di perangkat luar demi keamanan</span>
                        </div>
                    </div>

                    <div class="flex justify-end pt-3 border-t border-default-100">
                        <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold inline-flex items-center justify-center gap-2 cursor-pointer shadow-2xs">
                            <i data-lucide="lock" class="size-4"></i>
                            <span>Perbarui Kata Sandi</span>
                        </button>
                    </div>
                </form>
            </x-cbt.card>
        </div>
    </div>
</div>
@endsection
