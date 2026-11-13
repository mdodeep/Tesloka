@extends('layouts.staff')

@section('title', 'Rancang Ujian Baru — TESLOKA CBT')
@section('page-parent', 'Konten & Ujian')
@section('page-title', 'Rancang Ujian Baru')
@section('page-subtitle', 'Tentukan parameter ujian, durasi, jadwal, dan kebijakan pengawasan anti-kecurangan.')

@section('page-actions')
    <a href="{{ route('staff.exams.index') }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        <span>Kembali ke Daftar</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">

    @if($errors->any())
        <x-cbt.alert type="danger" dismissible="true">
            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </x-cbt.alert>
    @endif

    <form action="{{ route('staff.exams.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Kolom Kiri & Tengah: Parameter Utama Ujian -->
            <div class="lg:col-span-2 space-y-6">
                <x-cbt.card title="1. Identitas & Sasaran Akademik">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Judul Ujian *</label>
                            <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Penilaian Akhir Semester Ganjil - Jaringan Komputer" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Mata Pelajaran *</label>
                                <select name="subject_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                                    <option value="">-- Pilih Mata Pelajaran --</option>
                                    @foreach($subjects as $subj)
                                        <option value="{{ $subj->id }}" {{ old('subject_id') == $subj->id ? 'selected' : '' }}>
                                            {{ $subj->name }} ({{ $subj->code }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Jenis / Kategori Ujian *</label>
                                <select name="exam_type" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                                    <option value="quiz" {{ old('exam_type') == 'quiz' ? 'selected' : '' }}>Kuis / Penilaian Harian</option>
                                    <option value="uts" {{ old('exam_type') == 'uts' ? 'selected' : '' }}>Penilaian Tengah Semester (PTS/UTS)</option>
                                    <option value="uas" {{ old('exam_type') == 'uas' ? 'selected' : '' }}>Penilaian Akhir Semester (PAS/UAS)</option>
                                    <option value="tryout" {{ old('exam_type') == 'tryout' ? 'selected' : '' }}>Tryout / Uji Coba</option>
                                    <option value="placement" {{ old('exam_type') == 'placement' ? 'selected' : '' }}>Tes Penempatan (Placement Test)</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Tahun Ajaran *</label>
                                <select name="academic_year_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                                    @foreach($academicYears as $year)
                                        <option value="{{ $year->id }}" {{ old('academic_year_id') == $year->id ? 'selected' : '' }}>
                                            {{ $year->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Semester (Opsional)</label>
                                <select name="academic_term_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                    <option value="">-- Tanpa Spesifikasi Semester --</option>
                                    @foreach($academicTerms as $term)
                                        <option value="{{ $term->id }}" {{ old('academic_term_id') == $term->id ? 'selected' : '' }}>
                                            {{ $term->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Petunjuk & Deskripsi Ujian</label>
                            <textarea name="description" rows="3" placeholder="Tuliskan petunjuk pengerjaan bagi peserta..." class="form-textarea w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </x-cbt.card>

                <x-cbt.card title="2. Waktu Pelaksanaan & Ketuntasan">
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Durasi Pengerjaan (Menit) *</label>
                                <input type="number" min="5" max="360" name="duration_minutes" value="{{ old('duration_minutes', 60) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                                <p class="text-xs text-default-400 mt-1">Acuan waktu server, timer otomatis mengunci saat habis.</p>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Nilai Batas Kelulusan (KKM) *</label>
                                <input type="number" step="0.1" min="0" max="100" name="passing_grade" value="{{ old('passing_grade', 75.0) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Jadwal Mulai Ujian (Opsional)</label>
                                <input type="datetime-local" name="scheduled_start" value="{{ old('scheduled_start') }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Batas Akhir Ujian (Opsional)</label>
                                <input type="datetime-local" name="scheduled_end" value="{{ old('scheduled_end') }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                            </div>
                        </div>
                    </div>
                </x-cbt.card>
            </div>

            <!-- Kolom Kanan: Pengaturan Integritas & Pengawasan -->
            <div class="space-y-6">
                <x-cbt.card title="3. Pengacakan & Navigasi">
                    <div class="space-y-4">
                        <label class="flex items-center justify-between p-2.5 rounded hover:bg-default-50 transition cursor-pointer">
                            <div>
                                <span class="text-xs font-bold text-default-800 block">Acak Urutan Soal</span>
                                <p class="text-[11px] text-default-400">Setiap paket peserta menerima urutan soal yang berbeda.</p>
                            </div>
                            <input type="checkbox" name="randomize_questions" value="1" {{ old('randomize_questions', '1') ? 'checked' : '' }} class="form-switch">
                        </label>

                        <label class="flex items-center justify-between p-2.5 rounded hover:bg-default-50 transition cursor-pointer">
                            <div>
                                <span class="text-xs font-bold text-default-800 block">Acak Opsi Pilihan Jawaban</span>
                                <p class="text-[11px] text-default-400">Pilihan A, B, C, D diacak tanpa mengubah kunci penilaian.</p>
                            </div>
                            <input type="checkbox" name="randomize_options" value="1" {{ old('randomize_options', '1') ? 'checked' : '' }} class="form-switch">
                        </label>

                        <label class="flex items-center justify-between p-2.5 rounded hover:bg-default-50 transition cursor-pointer">
                            <div>
                                <span class="text-xs font-bold text-default-800 block">Tampilkan Skor Instan</span>
                                <p class="text-[11px] text-default-400">Peserta dapat melihat nilai saat menekan selesai.</p>
                            </div>
                            <input type="checkbox" name="show_result_on_finish" value="1" {{ old('show_result_on_finish') ? 'checked' : '' }} class="form-switch">
                        </label>

                        <div class="pt-2 border-t border-default-100">
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Maksimal Percobaan (Attempts) *</label>
                            <input type="number" min="1" max="5" name="max_attempts" value="{{ old('max_attempts', 1) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                        </div>
                    </div>
                </x-cbt.card>

                <x-cbt.card title="4. Keamanan & Pengawasan (Proctoring)">
                    <div class="space-y-4">
                        <label class="flex items-center justify-between p-2.5 rounded hover:bg-default-50 transition cursor-pointer">
                            <div>
                                <span class="text-xs font-bold text-default-800 block">Kunci Layar Penuh (Fullscreen Lock)</span>
                                <p class="text-[11px] text-default-400">Peringatan saat peserta keluar dari layar ujian.</p>
                            </div>
                            <input type="checkbox" name="fullscreen_lock_enabled" value="1" {{ old('fullscreen_lock_enabled', '1') ? 'checked' : '' }} class="form-switch">
                        </label>

                        <label class="flex items-center justify-between p-2.5 rounded hover:bg-default-50 transition cursor-pointer">
                            <div>
                                <span class="text-xs font-bold text-default-800 block">Kamera Pengawas (WebRTC SFU Live)</span>
                                <p class="text-[11px] text-default-400">Pengawasan video langsung per ruang.</p>
                            </div>
                            <input type="checkbox" name="camera_proctoring_enabled" value="1" {{ old('camera_proctoring_enabled') ? 'checked' : '' }} class="form-switch">
                        </label>

                        <label class="flex items-center justify-between p-2.5 rounded hover:bg-default-50 transition cursor-pointer pt-2 border-t border-default-100">
                            <div>
                                <span class="text-xs font-bold text-default-800 block">Wajib Gunakan Safe Exam Browser (SEB)</span>
                                <p class="text-[11px] text-default-400">Hanya izinkan klien SEB resmi (Sec 18).</p>
                            </div>
                            <input type="checkbox" name="seb_required" value="1" {{ old('seb_required') ? 'checked' : '' }} class="form-switch">
                        </label>

                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Kode Unik Ujian (Opsional)</label>
                            <input type="text" name="code" value="{{ old('code') }}" placeholder="Otomatis jika kosong (cth: EXAM-JARKOM01)" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-mono">
                        </div>
                    </div>
                </x-cbt.card>

                <!-- Actions -->
                <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 pt-2">
                    <a href="{{ route('staff.exams.index') }}" class="w-full sm:w-auto px-5 py-2.5 bg-default-100 hover:bg-slate-200 text-default-700 font-semibold text-xs rounded transition text-center">
                        Batal
                    </a>
                    <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-primary hover:bg-primary-hover text-white font-semibold text-xs rounded shadow-xs inline-flex items-center justify-center gap-2 transition">
                        <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                        <span>Simpan Draf Ujian</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

