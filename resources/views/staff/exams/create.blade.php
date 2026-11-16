@extends('layouts.staff')

@section('title', 'Rancang Ujian Baru — TESLOKA CBT')
@section('page-parent', 'Konten & Ujian')
@section('page-title', 'Rancang Ujian Baru')
@section('page-subtitle', 'Tentukan parameter ujian, durasi, jadwal, dan kebijakan pengawasan anti-kecurangan.')

@section('page-actions')
    <a href="{{ route('staff.exams.index') }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <i data-lucide="arrow-left" class="size-4"></i>
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
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Tipe Asesmen / Evaluasi *</label>
                                <select name="assessment_type" id="select-assessment-type" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                                    <option value="academic" {{ old('assessment_type') == 'academic' ? 'selected' : '' }}>Ujian Akademik Standar (Sekolah / Kampus)</option>
                                    <option value="certification_language" {{ old('assessment_type') == 'certification_language' ? 'selected' : '' }}>Sertifikasi Bahasa (TOEFL / EPT / ITP / TOAFL)</option>
                                    <option value="certification_competency" {{ old('assessment_type') == 'certification_competency' ? 'selected' : '' }}>Sertifikasi Kompetensi & Profesi</option>
                                    <option value="tryout" {{ old('assessment_type') == 'tryout' ? 'selected' : '' }}>Tryout Mandiri / Uji Coba</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Mode Pelaksanaan CBT *</label>
                                <select name="delivery_mode" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                                    <option value="online" {{ old('delivery_mode', 'online') == 'online' ? 'selected' : '' }}>Daring / Jarak Jauh (Online CBT Mandiri)</option>
                                    <option value="offline" {{ old('delivery_mode') == 'offline' ? 'selected' : '' }}>Luring / Tatap Muka (Lab CBT Terjadwal)</option>
                                    <option value="hybrid" {{ old('delivery_mode') == 'hybrid' ? 'selected' : '' }}>Hybrid (Daring & Luring Fleksibel)</option>
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
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Skala Penilaian Skor</label>
                                <select name="score_scale" id="select-score-scale" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium">
                                    <option value="standard_100" {{ old('score_scale') == 'standard_100' ? 'selected' : '' }}>Standar Nilai 0 - 100 (Persentase)</option>
                                    <option value="toefl_itp_677" {{ old('score_scale') == 'toefl_itp_677' ? 'selected' : '' }}>Skala TOEFL ITP / PBT (310 - 677)</option>
                                    <option value="toefl_ibt_120" {{ old('score_scale') == 'toefl_ibt_120' ? 'selected' : '' }}>Skala TOEFL iBT (0 - 120)</option>
                                    <option value="ielts_9" {{ old('score_scale') == 'ielts_9' ? 'selected' : '' }}>Skala IELTS Band (0 - 9.0)</option>
                                    <option value="cefr" {{ old('score_scale') == 'cefr' ? 'selected' : '' }}>Standar Kemahiran CEFR (A1 - C2)</option>
                                </select>
                            </div>
                        </div>

                        <div class="p-3.5 rounded-lg border border-default-200 bg-default-50/60 space-y-3">
                            <label class="flex items-center justify-between cursor-pointer">
                                <div>
                                    <span class="text-xs font-bold text-default-800 block">Terapkan Nilai Batas Kelulusan (KKM)</span>
                                    <p class="text-[11px] text-default-500">Nonaktifkan untuk sertifikasi bahasa (TOEFL/EPT/ITP) di mana seluruh peserta memperoleh skor tanpa status Remedial.</p>
                                </div>
                                <input type="checkbox" name="has_passing_grade" id="toggle-has-passing-grade" value="1" {{ old('has_passing_grade', '1') ? 'checked' : '' }} class="form-switch">
                            </label>

                            <div id="container-passing-grade" class="pt-3 border-t border-default-200">
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Nilai Batas Kelulusan (KKM) *</label>
                                <input type="number" step="0.1" min="0" max="100" name="passing_grade" id="input-passing-grade" value="{{ old('passing_grade', 75.0) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
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

                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Format Dokumen Kelulusan / Sertifikat</label>
                            <select name="certificate_type" id="select-certificate-type" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium">
                                <option value="standard" {{ old('certificate_type') == 'standard' ? 'selected' : '' }}>Sertifikat Kelulusan Standar (SKL Resmi)</option>
                                <option value="language_proficiency" {{ old('certificate_type') == 'language_proficiency' ? 'selected' : '' }}>Sertifikat Kecakapan Bahasa (Proficiency Certificate)</option>
                                <option value="competency" {{ old('certificate_type') == 'competency' ? 'selected' : '' }}>Sertifikat Uji Kompetensi Keahlian</option>
                            </select>
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

                        <label class="flex items-center justify-between p-2.5 rounded bg-amber-50/60 border border-amber-200/70 hover:bg-amber-50 transition cursor-pointer">
                            <div>
                                <span class="text-xs font-bold text-amber-900 flex items-center gap-1.5">
                                    <i data-lucide="sparkles" class="size-3.5 text-amber-600"></i>
                                    <span>Mode Ujian Simulasi / Try Out</span>
                                </span>
                                <p class="text-[11px] text-amber-700">Ujian latihan mandiri. Nilai tidak dimasukkan ke dalam penentuan kelulusan resmi / SKL.</p>
                            </div>
                            <input type="checkbox" name="is_simulation" value="1" {{ old('is_simulation') ? 'checked' : '' }} class="form-switch text-amber-500">
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
                    <a href="{{ route('staff.exams.index') }}" class="btn btn-sm w-full sm:w-auto px-5 py-2.5 bg-default-100 hover:bg-default-200 text-default-700 font-semibold text-xs rounded transition text-center">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-sm w-full sm:w-auto px-6 py-2.5 bg-primary hover:bg-primary-hover text-white font-semibold text-xs rounded shadow-xs inline-flex items-center justify-center gap-1.5 transition">
                        <i data-lucide="save" class="size-4 shrink-0"></i>
                        <span>Simpan Draf Ujian</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassingGrade = document.getElementById('toggle-has-passing-grade');
        const containerPassingGrade = document.getElementById('container-passing-grade');
        const inputPassingGrade = document.getElementById('input-passing-grade');
        const selectAssessmentType = document.getElementById('select-assessment-type');
        const selectScoreScale = document.getElementById('select-score-scale');
        const selectCertificateType = document.getElementById('select-certificate-type');

        function updatePassingGradeVisibility() {
            if (!togglePassingGrade || !containerPassingGrade) return;
            if (togglePassingGrade.checked) {
                containerPassingGrade.style.display = 'block';
                if (inputPassingGrade) inputPassingGrade.required = true;
            } else {
                containerPassingGrade.style.display = 'none';
                if (inputPassingGrade) inputPassingGrade.required = false;
            }
        }

        if (togglePassingGrade) {
            togglePassingGrade.addEventListener('change', updatePassingGradeVisibility);
            updatePassingGradeVisibility();
        }

        if (selectAssessmentType) {
            selectAssessmentType.addEventListener('change', function () {
                const val = this.value;
                if (val === 'certification_language') {
                    if (togglePassingGrade) {
                        togglePassingGrade.checked = false;
                        updatePassingGradeVisibility();
                    }
                    if (selectScoreScale) selectScoreScale.value = 'toefl_itp_677';
                    if (selectCertificateType) selectCertificateType.value = 'language_proficiency';
                } else if (val === 'certification_competency') {
                    if (selectCertificateType) selectCertificateType.value = 'competency';
                } else if (val === 'academic') {
                    if (togglePassingGrade) {
                        togglePassingGrade.checked = true;
                        updatePassingGradeVisibility();
                    }
                    if (selectScoreScale) selectScoreScale.value = 'standard_100';
                    if (selectCertificateType) selectCertificateType.value = 'standard';
                }
            });
        }
    });
</script>
@endpush
@endsection

