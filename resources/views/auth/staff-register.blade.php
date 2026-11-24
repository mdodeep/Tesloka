@extends('layouts.auth')

@section('title', 'Pendaftaran Mandiri Dosen & Staf')
@section('card_width', 'max-w-lg')

@section('content')
    <div class="mb-5 text-center">
        <h1 class="text-xl font-bold text-default-800">Registrasi Mandiri Dosen &amp; Staf</h1>
        <p class="text-xs text-default-500 mt-1">Ajukan akun portal staf untuk pengajar, pengawas ruang, korektor, atau petugas operasional.</p>
    </div>

    @if(!empty($requiresApproval))
        <div class="mb-4 p-3 rounded-lg bg-amber-50 border border-amber-200 text-[11px] text-amber-900 flex items-start gap-2.5 leading-relaxed">
            <i data-lucide="shield-alert" class="size-4 text-amber-600 shrink-0 mt-0.5"></i>
            <span>Demi keamanan sistem, akun dosen/staf baru berstatus <strong>Menunggu Persetujuan</strong> hingga diverifikasi dan diaktifkan oleh Administrator.</span>
        </div>
    @endif

    <form method="POST" action="{{ route('staff.register.post') }}" class="space-y-4 text-xs">
        @csrf

        <div>
            <label for="name" class="block font-semibold text-default-700 mb-1">
                Nama Lengkap &amp; Gelar <span class="text-rose-500">*</span>
            </label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                placeholder="Contoh: Dr. Ahmad Fauzi, M.Pd."
                class="form-input">
            @error('name')
                <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div>
                <label for="identity_number" class="block font-semibold text-default-700 mb-1">
                    NIP / NIDN / No. Pegawai <span class="text-rose-500">*</span>
                </label>
                <input type="text" id="identity_number" name="identity_number" value="{{ old('identity_number') }}" required
                    placeholder="Contoh: NIP19850101"
                    class="form-input font-mono">
                @error('identity_number')
                    <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="username" class="block font-semibold text-default-700 mb-1">
                    Username Portal Staf <span class="text-rose-500">*</span>
                </label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required
                    placeholder="Contoh: dosen_ahmad"
                    class="form-input font-mono">
                @error('username')
                    <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div>
                <label for="email" class="block font-semibold text-default-700 mb-1">
                    Email Resmi Institusi <span class="text-rose-500">*</span>
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    placeholder="nama@institusi.ac.id"
                    class="form-input">
                @error('email')
                    <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block font-semibold text-default-700 mb-1">
                    No. WhatsApp / HP Aktif <span class="text-rose-500">*</span>
                </label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required
                    placeholder="081234567890"
                    class="form-input font-mono">
                @error('phone')
                    <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="staff_register_role" class="block font-semibold text-default-700 mb-1">
                Peran / Jabatan yang Diajukan <span class="text-rose-500">*</span>
            </label>
            <select id="staff_register_role" name="role" required onchange="updateStaffRegRoleHint()" class="form-select">
                @foreach($roles as $role)
                    <option value="{{ $role->name }}" data-description="{{ $role->description }}" {{ old('role', $roles->first()?->name) === $role->name ? 'selected' : '' }}>
                        {{ $role->display_name }}
                    </option>
                @endforeach
            </select>
            <p id="staff_register_role_hint" class="text-[11px] text-default-500 mt-1 leading-relaxed"></p>
            @error('role')
                <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
            @enderror
        </div>

        @if(!empty($requiresRegistrationCode))
            <div>
                <label for="registration_code" class="block font-semibold text-default-700 mb-1">
                    Kode Undangan / Token Staf <span class="text-rose-500">*</span>
                </label>
                <input type="text" id="registration_code" name="registration_code" value="{{ old('registration_code') }}" required
                    placeholder="Masukkan kode undangan dari Administrator"
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
                <input type="password" id="password" name="password" required minlength="8"
                    placeholder="Min. 8 karakter (huruf & angka)"
                    class="form-input">
                @error('password')
                    <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block font-semibold text-default-700 mb-1">
                    Konfirmasi Sandi <span class="text-rose-500">*</span>
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8"
                    placeholder="Ulangi kata sandi"
                    class="form-input">
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-full py-2.5 rounded-lg font-bold shadow-xs transition">
            {{ !empty($requiresApproval) ? 'Ajukan Akun Dosen / Staf' : 'Daftar Sekarang & Masuk Portal Staf' }}
        </button>

        <div class="pt-4 border-t border-default-100 text-center text-xs text-default-500">
            Sudah memiliki akun staf? <a href="{{ route('staff.login') }}" class="text-primary font-semibold hover:underline">Masuk ke Portal Staf &rarr;</a>
        </div>
    </form>

    <script>
        function updateStaffRegRoleHint() {
            const select = document.getElementById('staff_register_role');
            const hint = document.getElementById('staff_register_role_hint');
            if (!select || !hint) return;
            const selected = select.options[select.selectedIndex];
            hint.textContent = selected ? (selected.getAttribute('data-description') || '') : '';
        }
        document.addEventListener('DOMContentLoaded', updateStaffRegRoleHint);
    </script>
@endsection
