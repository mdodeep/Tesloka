@extends('layouts.student')

@section('title', 'Profil Peserta Ujian')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="bg-white border border-default-200 rounded-md p-6 shadow-xs">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-lg font-bold text-default-800">Profil Peserta Ujian</h1>
            @if ($user->isProfileComplete())
                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                    Profil Lengkap
                </span>
            @else
                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                    Perlu Dilengkapi
                </span>
            @endif
        </div>

        <form method="POST" action="{{ route('student.profile.update') }}" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            @method('PUT')

            <!-- Avatar & Notice with Tailwick CBT Dropzone -->
            <div class="pb-5 border-b border-default-100 flex flex-col sm:flex-row items-center gap-5">
                <div class="shrink-0 text-center">
                    <img src="{{ $user->photo_url }}" alt="{{ $user->name }}" class="size-20 rounded-full object-cover border-2 border-default-200 shadow-sm mx-auto">
                    @if($user->hasCustomPhoto())
                        <div class="mt-2">
                            <button type="submit" name="remove_photo" value="1" onclick="return confirm('Apakah Anda yakin ingin mereset foto profil ke avatar default Tesloka?')" class="inline-flex items-center gap-1 text-[11px] text-danger hover:underline font-semibold cursor-pointer">
                                <i data-lucide="rotate-ccw" class="size-3"></i>
                                <span>Reset Foto</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="flex-1 w-full space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label class="block font-semibold text-default-700">Perbarui Pasfoto Formal Peserta</label>
                        @if($user->hasCustomPhoto())
                            <label class="inline-flex items-center gap-1.5 text-xs text-danger font-semibold cursor-pointer">
                                <input type="checkbox" name="remove_photo" value="1" class="rounded border-default-300 text-danger focus:ring-danger">
                                <span>Reset ke Default</span>
                            </label>
                        @endif
                    </div>
                    <x-cbt.dropzone
                        name="photo"
                        id="student_photo_dropzone"
                        label="Unggah Pasfoto Formal"
                        accept="image/jpeg,image/png,image/webp"
                        maxSize="1MB"
                        :currentUrl="$user->photo_path ? Storage::url($user->photo_path) : null"
                        hint="Foto resmi yang tercantum pada kartu peserta ujian dan SKHU. Default: tesloka-default-profile.webp."
                    />
                </div>
            </div>

            <!-- Readonly Identity Data -->
            <div class="p-4 bg-default-50/80 border border-default-200 rounded-md space-y-2">
                <div class="text-[11px] font-bold text-default-500 uppercase tracking-wider">Identitas Pokok (Dikelola Administrator)</div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                    <div>
                        <span class="text-default-400">Nama Siswa:</span>
                        <div class="font-bold text-default-800">{{ $user->name }}</div>
                    </div>
                    <div>
                        <span class="text-default-400">NIM / Nomor Peserta:</span>
                        <div class="font-bold font-mono text-default-800">{{ $user->identity_number ?? $user->username }}</div>
                    </div>
                </div>
            </div>

            <!-- Editable Fields -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold text-default-700 mb-1">
                        NIK (Nomor Induk Kependudukan)
                        <span class="text-default-400 font-normal">Privasi dilindungi</span>
                    </label>
                    <input type="text" name="nik" value="{{ old('nik', $user->nik) }}" maxlength="16" placeholder="16 digit NIK"
                        class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    @if ($user->nik)
                        <span class="text-[10px] text-default-400 mt-1 block">Tersimpan: {{ $user->maskedNik() }}</span>
                    @endif
                </div>
                <div>
                    <label class="block font-semibold text-default-700 mb-1">Nomor WhatsApp / HP Aktif</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" required placeholder="Contoh: 081234567890"
                        class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block font-semibold text-default-700 mb-1">Jenis Kelamin</label>
                    <select name="gender" required class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                        <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="block font-semibold text-default-700 mb-1">Tempat Lahir</label>
                    <input type="text" name="birth_place" value="{{ old('birth_place', $user->birth_place) }}" required placeholder="Kota kelahiran"
                        class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                </div>
                <div>
                    <label class="block font-semibold text-default-700 mb-1">Tanggal Lahir</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date', $user->birth_date?->format('Y-m-d')) }}" required
                        class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                </div>
            </div>

            <div>
                <label class="block font-semibold text-default-700 mb-1">Alamat Tempat Tinggal</label>
                <textarea name="address" rows="2" required placeholder="Alamat jalan, RT/RW, kelurahan..."
                    class="form-textarea w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">{{ old('address', $user->address) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block font-semibold text-default-700 mb-1">Kabupaten / Kota</label>
                    <input type="text" name="city" value="{{ old('city', $user->city) }}" required
                        class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                </div>
                <div>
                    <label class="block font-semibold text-default-700 mb-1">Provinsi</label>
                    <input type="text" name="province" value="{{ old('province', $user->province) }}" required
                        class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                </div>
                <div>
                    <label class="block font-semibold text-default-700 mb-1">Kode Pos</label>
                    <input type="text" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}"
                        class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="btn btn-sm bg-primary text-white font-semibold hover:bg-primary-hover shadow-xs cursor-pointer inline-flex items-center justify-center gap-2 w-full sm:w-auto">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Simpan Perubahan Profil</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Ganti Password Peserta -->
    <div class="bg-white border border-default-200 rounded-md p-6 shadow-xs">
        <h2 class="text-sm font-bold text-default-800 mb-4">Ganti Kata Sandi Ujian</h2>

        <form method="POST" action="{{ route('student.password.update') }}" class="space-y-4 text-xs max-w-md">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold text-default-700 mb-1">Kata Sandi Saat Ini</label>
                <input type="password" name="current_password" required
                    class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
            </div>

            <div>
                <label class="block font-semibold text-default-700 mb-1">Kata Sandi Baru (Min. 8 Karakter & Angka)</label>
                <input type="password" name="password" required
                    class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
            </div>

            <div>
                <label class="block font-semibold text-default-700 mb-1">Konfirmasi Kata Sandi Baru</label>
                <input type="password" name="password_confirmation" required
                    class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
            </div>

            <div class="pt-2">
                <button type="submit" class="px-5 py-2.5 rounded bg-slate-800 text-white font-semibold hover:bg-slate-900 shadow-xs cursor-pointer inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    <span>Perbarui Kata Sandi Ujian</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

