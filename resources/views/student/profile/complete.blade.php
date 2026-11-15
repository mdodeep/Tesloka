@extends('layouts.student')

@section('title', 'Lengkapi Data Profil Wajib')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="bg-amber-50 border border-amber-200 rounded-md p-5 text-xs text-amber-900 flex items-start gap-3">
        <i data-lucide="alert-triangle" class="size-6 text-amber-600 shrink-0 mt-0.5"></i>
        <div>
            <div class="font-bold text-sm text-amber-950">Pelengkapan Data Wajib Peserta Ujian</div>
            <p class="mt-1">
                Sesuai tata tertib CBT, Anda wajib melengkapi data profil pokok berikut sebelum diizinkan mengakses dan memulai sesi ujian.
            </p>
        </div>
    </div>

    <div class="bg-white border border-default-200 rounded-md p-6 shadow-xs">
        <form method="POST" action="{{ route('student.profile.update') }}" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            @method('PUT')

            <!-- Identitas Siswa -->
            <div class="p-3 bg-default-50 border border-default-200 rounded space-y-1">
                <div class="text-[11px] font-semibold text-default-500 uppercase">Identitas Peserta Terdaftar</div>
                <div class="font-bold text-default-800 text-sm">{{ $user->name }}</div>
                <div class="font-mono text-default-600">NIM: {{ $user->identity_number ?? $user->username }}</div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold text-default-700 mb-1">
                        NIK (Nomor Induk Kependudukan)
                    </label>
                    <input type="text" name="nik" value="{{ old('nik', $user->nik) }}" maxlength="16" placeholder="16 digit angka NIK"
                        class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                </div>
                <div>
                    <label class="block font-semibold text-default-700 mb-1">Nomor WhatsApp / HP Aktif *</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" required placeholder="081234567890"
                        class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block font-semibold text-default-700 mb-1">Jenis Kelamin *</label>
                    <select name="gender" required class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                        <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="block font-semibold text-default-700 mb-1">Tempat Lahir *</label>
                    <input type="text" name="birth_place" value="{{ old('birth_place', $user->birth_place) }}" required placeholder="Kota kelahiran"
                        class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                </div>
                <div>
                    <label class="block font-semibold text-default-700 mb-1">Tanggal Lahir *</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date', $user->birth_date?->format('Y-m-d')) }}" required
                        class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                </div>
            </div>

            <div>
                <label class="block font-semibold text-default-700 mb-1">Alamat Tempat Tinggal Lengkap *</label>
                <textarea name="address" rows="2" required placeholder="Nama jalan, RT/RW, nomor rumah, kelurahan, kecamatan..."
                    class="form-textarea w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">{{ old('address', $user->address) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block font-semibold text-default-700 mb-1">Kabupaten / Kota *</label>
                    <input type="text" name="city" value="{{ old('city', $user->city) }}" required placeholder="Contoh: Jakarta Selatan"
                        class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                </div>
                <div>
                    <label class="block font-semibold text-default-700 mb-1">Provinsi *</label>
                    <input type="text" name="province" value="{{ old('province', $user->province) }}" required placeholder="Contoh: DKI Jakarta"
                        class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                </div>
                <div>
                    <label class="block font-semibold text-default-700 mb-1">Kode Pos</label>
                    <input type="text" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" placeholder="12240"
                        class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                </div>
            </div>

            <x-cbt.dropzone
                name="photo"
                id="complete_photo_dropzone"
                label="Unggah Pasfoto Formal (JPG/PNG/WebP, Maks 1 MB)"
                accept="image/jpeg,image/png,image/webp"
                maxSize="1MB"
                hint="Pasfoto resmi berlatar belakang polos untuk identifikasi kartu peserta ujian."
            />

            <div class="pt-4 border-t border-default-100 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
                <span class="text-default-400 text-xs">* Wajib diisi</span>
                <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold shadow-xs cursor-pointer inline-flex items-center justify-center gap-2 w-full sm:w-auto">
                    <span>Simpan & Lanjutkan ke Lobi Ujian</span>
                    <i data-lucide="arrow-right" class="size-4"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

