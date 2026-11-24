@extends('layouts.auth')

@section('title', 'Pendaftaran Peserta Baru')
@section('card_width', 'max-w-lg')

@section('content')
    <div class="mb-5 text-center">
        <h1 class="text-xl font-bold text-default-800">Registrasi Peserta Baru</h1>
        <p class="text-xs text-default-500 mt-1">Daftarkan diri Anda untuk mengikuti ujian dan evaluasi berbasis komputer.</p>
    </div>

    @if(!empty($requiresApproval))
        <div class="mb-4 p-3 rounded-lg bg-sky-50 border border-sky-200 text-[11px] text-sky-900 flex items-start gap-2.5 leading-relaxed">
            <i data-lucide="shield-check" class="size-4 text-sky-600 shrink-0 mt-0.5"></i>
            <span>Pendaftaran memerlukan verifikasi Administrator/Panitia sebelum akun Anda dapat digunakan untuk login ke portal ujian.</span>
        </div>
    @endif

    <form method="POST" action="{{ route('student.register.post') }}" class="space-y-4 text-xs">
        @csrf

        <div>
            <label for="name" class="block font-semibold text-default-700 mb-1">
                Nama Lengkap Siswa / Mahasiswa <span class="text-rose-500">*</span>
            </label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                placeholder="Nama lengkap sesuai identitas resmi"
                class="form-input">
            @error('name')
                <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div>
                <label for="identity_number" class="block font-semibold text-default-700 mb-1">
                    NISN / NIM / No. Peserta <span class="text-rose-500">*</span>
                </label>
                <input type="text" id="identity_number" name="identity_number" value="{{ old('identity_number') }}" required
                    placeholder="Contoh: 20260010"
                    class="form-input font-mono">
                @error('identity_number')
                    <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="username" class="block font-semibold text-default-700 mb-1">
                    Username Akun Ujian <span class="text-rose-500">*</span>
                </label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required
                    placeholder="Contoh: siswa_ahmad"
                    class="form-input font-mono">
                @error('username')
                    <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div>
                <label for="email" class="block font-semibold text-default-700 mb-1">
                    Email (Opsional)
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    placeholder="nama@email.com"
                    class="form-input">
                @error('email')
                    <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block font-semibold text-default-700 mb-1">
                    No. WhatsApp / HP (Opsional)
                </label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                    placeholder="08123456789"
                    class="form-input font-mono">
                @error('phone')
                    <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        @if(!empty($allowClassChoice) && isset($classes) && $classes->isNotEmpty())
            <div>
                <label for="academic_class_id" class="block font-semibold text-default-700 mb-1">
                    Pilih Kelas / Rombel (Opsional)
                </label>
                <select id="academic_class_id" name="academic_class_id" class="form-select">
                    <option value="">-- Belum Memilih Rombel / Ditentukan Panitia --</option>
                    @foreach($classes as $cls)
                        <option value="{{ $cls->id }}" {{ (string) old('academic_class_id') === (string) $cls->id ? 'selected' : '' }}>
                            {{ $cls->name }} ({{ $cls->code }}) - Kuota tersisa {{ max(0, $cls->capacity - $cls->students_count) }}
                        </option>
                    @endforeach
                </select>
                @error('academic_class_id')
                    <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>
        @endif

        @if(!empty($requiresRegistrationCode))
            <div>
                <label for="registration_code" class="block font-semibold text-default-700 mb-1">
                    Kode Pendaftaran SPMB <span class="text-rose-500">*</span>
                </label>
                <input type="text" id="registration_code" name="registration_code" value="{{ old('registration_code') }}" required
                    placeholder="Masukkan kode pendaftaran dari panitia"
                    class="form-input font-mono uppercase">
                @error('registration_code')
                    <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div>
                <label for="password" class="block font-semibold text-default-700 mb-1">
                    Kata Sandi <span class="text-rose-500">*</span>
                </label>
                <input type="password" id="password" name="password" required minlength="6"
                    placeholder="Minimal 6 karakter"
                    class="form-input">
                @error('password')
                    <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
                @enderror
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

        <button type="submit" class="btn btn-primary w-full py-2.5 rounded-lg font-bold shadow-xs transition">
            {{ !empty($requiresApproval) ? 'Ajukan Pendaftaran Peserta' : 'Daftar Sekarang & Masuk Ujian' }}
        </button>

        <div class="pt-4 border-t border-default-100 text-center text-xs text-default-500">
            Sudah memiliki akun? <a href="{{ route('student.login') }}" class="text-primary font-semibold hover:underline">Masuk ke Portal Ujian &rarr;</a>
        </div>
    </form>
@endsection
