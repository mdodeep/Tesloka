@extends('layouts.staff')

@section('title', 'Edit Ujian : ' . $exam->title)
@section('page-parent', 'Konten & Ujian')
@section('page-title', 'Edit Ujian: ' . $exam->title)
@section('page-subtitle', 'Kode: ' . $exam->code . ' • Status: ' . strtoupper($exam->status))

@section('page-actions')
    <a href="{{ route('staff.exams.show', $exam) }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <i data-lucide="eye" class="size-4"></i>
        <span>Kelola Blueprint</span>
    </a>
    <a href="{{ route('staff.exams.index') }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <i data-lucide="arrow-left" class="size-4"></i>
        <span>Kembali</span>
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

    <form action="{{ route('staff.exams.update', $exam) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Kolom Kiri & Tengah: Parameter Utama Ujian -->
            <div class="lg:col-span-2 space-y-6">
                <x-cbt.card title="1. Identitas & Sasaran Akademik">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Judul Ujian *</label>
                            <input type="text" name="title" value="{{ old('title', $exam->title) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Mata Pelajaran *</label>
                                <select name="subject_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                                    @foreach($subjects as $subj)
                                        <option value="{{ $subj->id }}" {{ old('subject_id', $exam->subject_id) == $subj->id ? 'selected' : '' }}>
                                            {{ $subj->name }} ({{ $subj->code }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Jenis / Kategori Ujian *</label>
                                <select name="exam_type" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                                    <option value="quiz" {{ old('exam_type', $exam->exam_type) == 'quiz' ? 'selected' : '' }}>Kuis / Penilaian Harian</option>
                                    <option value="uts" {{ old('exam_type', $exam->exam_type) == 'uts' ? 'selected' : '' }}>Penilaian Tengah Semester (PTS/UTS)</option>
                                    <option value="uas" {{ old('exam_type', $exam->exam_type) == 'uas' ? 'selected' : '' }}>Penilaian Akhir Semester (PAS/UAS)</option>
                                    <option value="tryout" {{ old('exam_type', $exam->exam_type) == 'tryout' ? 'selected' : '' }}>Tryout / Uji Coba</option>
                                    <option value="placement" {{ old('exam_type', $exam->exam_type) == 'placement' ? 'selected' : '' }}>Tes Penempatan (Placement Test)</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Tipe Asesmen / Evaluasi *</label>
                                <select name="assessment_type" id="select-assessment-type" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                                    <option value="academic" {{ old('assessment_type', $exam->assessment_type ?? 'academic') == 'academic' ? 'selected' : '' }}>Ujian Akademik Standar (Sekolah / Kampus)</option>
                                    <option value="certification_language" {{ old('assessment_type', $exam->assessment_type) == 'certification_language' ? 'selected' : '' }}>Sertifikasi Bahasa (TOEFL / EPT / ITP / TOAFL)</option>
                                    <option value="certification_competency" {{ old('assessment_type', $exam->assessment_type) == 'certification_competency' ? 'selected' : '' }}>Sertifikasi Kompetensi & Profesi</option>
                                    <option value="tryout" {{ old('assessment_type', $exam->assessment_type) == 'tryout' ? 'selected' : '' }}>Tryout Mandiri / Uji Coba</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Mode Pelaksanaan Ujian *</label>
                                <select name="delivery_mode" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                                    <option value="online" {{ old('delivery_mode', $exam->delivery_mode ?? 'online') == 'online' ? 'selected' : '' }}>Daring / Jarak Jauh (Online Mandiri)</option>
                                    <option value="offline" {{ old('delivery_mode', $exam->delivery_mode) == 'offline' ? 'selected' : '' }}>Luring / Tatap Muka (Ruang Lab Terjadwal)</option>
                                    <option value="hybrid" {{ old('delivery_mode', $exam->delivery_mode) == 'hybrid' ? 'selected' : '' }}>Hybrid (Daring & Luring Fleksibel)</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Tahun Ajaran *</label>
                                <select name="academic_year_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" required>
                                    @foreach($academicYears as $year)
                                        <option value="{{ $year->id }}" {{ old('academic_year_id', $exam->academic_year_id) == $year->id ? 'selected' : '' }}>
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
                                        <option value="{{ $term->id }}" {{ old('academic_term_id', $exam->academic_term_id) == $term->id ? 'selected' : '' }}>
                                            {{ $term->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Petunjuk & Deskripsi Ujian</label>
                            <textarea name="description" rows="3" class="form-textarea w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">{{ old('description', $exam->description) }}</textarea>
                        </div>
                    </div>
                </x-cbt.card>

                <x-cbt.card title="2. Durasi, Ketuntasan, &amp; Periode Ketersediaan">
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Durasi Pengerjaan (Menit) *</label>
                                <input type="number" min="5" max="360" name="duration_minutes" value="{{ old('duration_minutes', $exam->duration_minutes) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                                <p class="text-xs text-default-400 mt-1">Acuan waktu server, timer otomatis mengunci saat habis.</p>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Skala Penilaian Skor</label>
                                <select name="score_scale" id="select-score-scale" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium">
                                    <option value="standard_100" {{ old('score_scale', $exam->score_scale ?? 'standard_100') == 'standard_100' ? 'selected' : '' }}>Standar Nilai 0 - 100 (Persentase)</option>
                                    <option value="toefl_itp_677" {{ old('score_scale', $exam->score_scale) == 'toefl_itp_677' ? 'selected' : '' }}>Skala TOEFL ITP / PBT (310 - 677)</option>
                                    <option value="toefl_ibt_120" {{ old('score_scale', $exam->score_scale) == 'toefl_ibt_120' ? 'selected' : '' }}>Skala TOEFL iBT (0 - 120)</option>
                                    <option value="ielts_9" {{ old('score_scale', $exam->score_scale) == 'ielts_9' ? 'selected' : '' }}>Skala IELTS Band (0 - 9.0)</option>
                                    <option value="cefr" {{ old('score_scale', $exam->score_scale) == 'cefr' ? 'selected' : '' }}>Standar Kemahiran CEFR (A1 - C2)</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @php
                                $curDecimals = old('score_decimal_places', $exam->score_decimal_places);
                            @endphp
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Format Pembulatan Nilai Akhir</label>
                                <select name="score_decimal_places" id="select-score-decimals" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                    <option value="" {{ $curDecimals === null || $curDecimals === '' ? 'selected' : '' }}>Otomatis (Bilangan Bulat u/ Bahasa, 1 Desimal u/ Standar)</option>
                                    <option value="0" {{ (string) $curDecimals === '0' ? 'selected' : '' }}>Bilangan Bulat (Tanpa Koma, cth: 550)</option>
                                    <option value="1" {{ (string) $curDecimals === '1' ? 'selected' : '' }}>1 Angka Desimal (cth: 85.5)</option>
                                    <option value="2" {{ (string) $curDecimals === '2' ? 'selected' : '' }}>2 Angka Desimal (cth: 85.75)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Masa Berlaku Sertifikat (Bulan)</label>
                                <div class="flex gap-2">
                                    <select id="preset-cert-validity" class="form-select flex-1 h-10 text-xs rounded border-default-200 bg-white">
                                        <option value="">Pilih Cepat...</option>
                                        <option value="0">Seumur Hidup / Permanen</option>
                                        <option value="6">6 Bulan</option>
                                        <option value="12">1 Tahun (12 Bulan)</option>
                                        <option value="24">2 Tahun (24 Bulan - Standar TOEFL/IELTS)</option>
                                        <option value="36">3 Tahun (36 Bulan - Standar Profesi)</option>
                                    </select>
                                    <input type="number" min="0" max="120" name="certificate_validity_months" id="input-cert-validity" value="{{ old('certificate_validity_months', $exam->certificate_validity_months ?? 0) }}" class="form-input w-24 h-10 text-xs rounded border-default-200 bg-white font-mono text-center" placeholder="Bln">
                                </div>
                                <p class="text-[11px] text-default-400 mt-1">Isi <code>0</code> bila sertifikat berlaku seumur hidup.</p>
                            </div>
                        </div>

                        <div class="p-3.5 rounded-lg border border-default-200 bg-default-50/60 space-y-3">
                            <label class="flex items-center justify-between cursor-pointer">
                                <div>
                                    <span class="text-xs font-bold text-default-800 block">Terapkan Nilai Batas Kelulusan (KKM)</span>
                                    <p class="text-[11px] text-default-500">Mendukung KKM di atas 100 (misal 500 untuk syarat kelulusan TOEFL ITP universitas) atau nonaktifkan jika tanpa ambang batas.</p>
                                </div>
                                <input type="hidden" name="has_passing_grade" value="0">
                                <input type="checkbox" name="has_passing_grade" id="toggle-has-passing-grade" value="1" {{ filter_var(old('has_passing_grade', $exam->has_passing_grade ?? true), FILTER_VALIDATE_BOOLEAN) ? 'checked' : '' }} class="form-switch">
                            </label>

                            <div id="container-passing-grade" class="pt-3 border-t border-default-200">
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Nilai Batas Kelulusan (KKM) *</label>
                                <input type="number" step="0.01" min="0" max="10000" name="passing_grade" id="input-passing-grade" value="{{ old('passing_grade', $exam->passing_grade) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-mono">
                                <p id="passing-grade-hint" class="text-[11px] text-default-500 mt-1">Masukkan nilai batas lulus sesuai skala skor (contoh: 75 untuk skala 0-100, atau 500 untuk skala TOEFL ITP).</p>
                            </div>
                        </div>

                        <div class="p-3 rounded-lg bg-sky-50/70 border border-sky-200 text-xs text-sky-900 space-y-1">
                            <div class="font-bold flex items-center justify-between gap-2">
                                <span>Pemisahan Jadwal: Periode Ketersediaan vs Sesi Pelaksanaan</span>
                                <span class="px-2 py-0.5 rounded bg-white border border-sky-200 font-mono text-[10px]">Zona Waktu: {{ \App\Services\DocumentConfigService::timezoneLabel() }}</span>
                            </div>
                            <p class="text-[11px] text-sky-800 leading-relaxed">
                                Rentang di bawah hanya membatasi periode global kapan sesi ujian boleh dibuat (opsional). Penentuan jam mulai/selesai persis, ruang lab, token rilis, dan peserta diatur di menu <strong>Sesi &amp; Penjadwalan</strong>.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Periode Ketersediaan Mulai (Opsional)</label>
                                <input type="datetime-local" name="scheduled_start" value="{{ old('scheduled_start', optional($exam->scheduled_start)->format('Y-m-d\TH:i')) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Periode Ketersediaan Berakhir (Opsional)</label>
                                <input type="datetime-local" name="scheduled_end" value="{{ old('scheduled_end', optional($exam->scheduled_end)->format('Y-m-d\TH:i')) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Format Dokumen Kelulusan / Sertifikat</label>
                            <select name="certificate_type" id="select-certificate-type" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium">
                                <option value="standard" {{ old('certificate_type', $exam->certificate_type ?? 'standard') == 'standard' ? 'selected' : '' }}>Sertifikat Kelulusan Standar (Akademik)</option>
                                <option value="language_proficiency" {{ old('certificate_type', $exam->certificate_type) == 'language_proficiency' ? 'selected' : '' }}>Sertifikat Kecakapan Bahasa (TOEFL / EPT / TOAFL)</option>
                                <option value="competency" {{ old('certificate_type', $exam->certificate_type) == 'competency' ? 'selected' : '' }}>Sertifikat Uji Kompetensi &amp; Profesi</option>
                            </select>
                        </div>

                        @php
                            $secCfg = is_array($exam->section_config) ? $exam->section_config : [];
                            $isLangSelected = old('assessment_type', $exam->assessment_type) === 'certification_language' || old('certificate_type', $exam->certificate_type) === 'language_proficiency';
                        @endphp
                        <div id="panel-language-sections" class="p-3.5 rounded-lg border border-primary/25 bg-primary-50/40 space-y-3 {{ $isLangSelected ? '' : 'hidden' }}">
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <div>
                                    <span class="text-xs font-bold text-primary-900 block">Label Kategori Penilaian Sertifikasi Bahasa</span>
                                    <p class="text-[11px] text-default-600">Menampilkan rincian skor per bagian (Listening, Structure, Reading) di sertifikat &amp; transkrip.</p>
                                </div>
                                <div class="flex gap-1.5">
                                    <button type="button" onclick="applyLanguageSectionPreset('en')" class="px-2 py-1 rounded bg-white border border-default-200 hover:bg-default-100 text-[10px] font-bold text-default-700 cursor-pointer">Preset TOEFL (EN)</button>
                                    <button type="button" onclick="applyLanguageSectionPreset('ar')" class="px-2 py-1 rounded bg-white border border-default-200 hover:bg-default-100 text-[10px] font-bold text-default-700 cursor-pointer">Preset TOAFL (AR)</button>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2.5">
                                <div>
                                    <label class="block text-[10px] font-bold text-default-600 uppercase mb-1">Seksi 1 (Listening)</label>
                                    <input type="text" id="sec_label_listening" name="section_labels[listening]" value="{{ old('section_labels.listening', $secCfg['listening'] ?? 'Listening Comprehension') }}" class="form-input h-9 text-xs bg-white">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-default-600 uppercase mb-1">Seksi 2 (Structure)</label>
                                    <input type="text" id="sec_label_structure" name="section_labels[structure]" value="{{ old('section_labels.structure', $secCfg['structure'] ?? 'Structure and Written Expression') }}" class="form-input h-9 text-xs bg-white">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-default-600 uppercase mb-1">Seksi 3 (Reading)</label>
                                    <input type="text" id="sec_label_reading" name="section_labels[reading]" value="{{ old('section_labels.reading', $secCfg['reading'] ?? 'Reading Comprehension') }}" class="form-input h-9 text-xs bg-white">
                                </div>
                            </div>
                        </div>

                        <div class="p-3.5 rounded-lg border border-default-200 bg-default-50/70 space-y-3">
                            @php
                                $reqPay = filter_var(old('requires_payment', $exam->requires_payment ?? false), FILTER_VALIDATE_BOOLEAN);
                            @endphp
                            <label class="flex items-center justify-between cursor-pointer">
                                <div>
                                    <span class="text-xs font-bold text-default-800 block">Wajibkan Pembayaran Transfer Sebelum Ujian</span>
                                    <p class="text-[11px] text-default-500">Peserta wajib mengunggah bukti transfer dan mendapat verifikasi Admin sebelum dapat membuka token &amp; mulai ujian.</p>
                                </div>
                                <input type="hidden" name="requires_payment" value="0">
                                <input type="checkbox" name="requires_payment" id="toggle-requires-payment" value="1" {{ $reqPay ? 'checked' : '' }} class="form-switch">
                            </label>
                            <div id="container-payment-settings" class="pt-3 border-t border-default-200 space-y-3 {{ $reqPay ? '' : 'hidden' }}">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Biaya Pendaftaran Ujian (Rp) *</label>
                                        <input type="number" min="0" step="1000" name="payment_amount" value="{{ old('payment_amount', $exam->payment_amount ?? 0) }}" class="form-input h-10 text-xs bg-white font-mono">
                                    </div>
                                    <div class="flex items-end pb-1">
                                        <a href="{{ route('staff.payments.index') }}" target="_blank" rel="noopener noreferrer" class="text-xs font-semibold text-primary hover:underline inline-flex items-center gap-1">
                                            <i data-lucide="landmark" class="size-3.5"></i>
                                            <span>Kelola Daftar Rekening Bank Institusi</span>
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Instruksi Pembayaran Tambahan (Opsional)</label>
                                    <textarea name="payment_instructions" rows="2" class="form-textarea text-xs bg-white" placeholder="Cantumkan NIM/Nama pada berita transfer...">{{ old('payment_instructions', $exam->payment_instructions) }}</textarea>
                                </div>
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
                            <input type="hidden" name="randomize_questions" value="0">
                            <input type="checkbox" name="randomize_questions" value="1" {{ filter_var(old('randomize_questions', $exam->randomize_questions), FILTER_VALIDATE_BOOLEAN) ? 'checked' : '' }} class="form-switch">
                        </label>

                        <label class="flex items-center justify-between p-2.5 rounded hover:bg-default-50 transition cursor-pointer">
                            <div>
                                <span class="text-xs font-bold text-default-800 block">Acak Opsi Pilihan Jawaban</span>
                                <p class="text-[11px] text-default-400">Pilihan A, B, C, D diacak tanpa mengubah kunci penilaian.</p>
                            </div>
                            <input type="hidden" name="randomize_options" value="0">
                            <input type="checkbox" name="randomize_options" value="1" {{ filter_var(old('randomize_options', $exam->randomize_options), FILTER_VALIDATE_BOOLEAN) ? 'checked' : '' }} class="form-switch">
                        </label>

                        <label class="flex items-center justify-between p-2.5 rounded hover:bg-default-50 transition cursor-pointer">
                            <div>
                                <span class="text-xs font-bold text-default-800 block">Tampilkan Skor Instan</span>
                                <p class="text-[11px] text-default-400">Peserta dapat melihat nilai langsung saat selesai.</p>
                            </div>
                            <input type="hidden" name="show_result_on_finish" value="0">
                            <input type="checkbox" name="show_result_on_finish" value="1" {{ filter_var(old('show_result_on_finish', $exam->show_result_on_finish), FILTER_VALIDATE_BOOLEAN) ? 'checked' : '' }} class="form-switch">
                        </label>

                        <label class="flex items-center justify-between p-2.5 rounded bg-amber-50/60 border border-amber-200/70 hover:bg-amber-50 transition cursor-pointer">
                            <div>
                                <span class="text-xs font-bold text-amber-900 flex items-center gap-1.5">
                                    <i data-lucide="sparkles" class="size-3.5 text-amber-600"></i>
                                    <span>Mode Ujian Simulasi / Try Out</span>
                                </span>
                                <p class="text-[11px] text-amber-700">Ujian latihan mandiri. Nilai tidak dimasukkan ke dalam penentuan kelulusan resmi / SKL.</p>
                            </div>
                            <input type="hidden" name="is_simulation" value="0">
                            <input type="checkbox" name="is_simulation" value="1" {{ filter_var(old('is_simulation', $exam->is_simulation), FILTER_VALIDATE_BOOLEAN) ? 'checked' : '' }} class="form-switch text-amber-500">
                        </label>

                        <div class="pt-2 border-t border-default-100">
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Maksimal Percobaan (Attempts) *</label>
                            <input type="number" min="1" max="5" name="max_attempts" value="{{ old('max_attempts', $exam->max_attempts) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                        </div>
                    </div>
                </x-cbt.card>

                <x-cbt.card title="4. Keamanan & Pengawasan">
                    <div class="space-y-4">
                        <label class="flex items-center justify-between p-2.5 rounded hover:bg-default-50 transition cursor-pointer">
                            <div>
                                <span class="text-xs font-bold text-default-800 block">Kunci Layar Penuh (Fullscreen Lock)</span>
                                <p class="text-[11px] text-default-400">Peringatan dan deteksi saat peserta keluar dari layar.</p>
                            </div>
                            <input type="hidden" name="fullscreen_lock_enabled" value="0">
                            <input type="checkbox" name="fullscreen_lock_enabled" value="1" {{ filter_var(old('fullscreen_lock_enabled', $exam->fullscreen_lock_enabled), FILTER_VALIDATE_BOOLEAN) ? 'checked' : '' }} class="form-switch">
                        </label>

                        <label class="flex items-center justify-between p-2.5 rounded hover:bg-default-50 transition cursor-pointer">
                            <div>
                                <span class="text-xs font-bold text-default-800 block">Kamera Pengawas (Snapshot &amp; Live Video WebRTC)</span>
                                <p class="text-[11px] text-default-400">Pengawasan kamera &amp; snapshot berkala (mendukung streaming WebRTC LiveKit bila dikonfigurasi).</p>
                            </div>
                            <input type="hidden" name="camera_proctoring_enabled" value="0">
                            <input type="checkbox" name="camera_proctoring_enabled" value="1" {{ filter_var(old('camera_proctoring_enabled', $exam->camera_proctoring_enabled), FILTER_VALIDATE_BOOLEAN) ? 'checked' : '' }} class="form-switch">
                        </label>

                        <label class="flex items-center justify-between p-2.5 rounded hover:bg-default-50 transition cursor-pointer pt-2 border-t border-default-100">
                            <div>
                                <span class="text-xs font-bold text-default-800 block">Wajib Gunakan Safe Exam Browser (SEB)</span>
                                <p class="text-[11px] text-default-400">Blokir peramban biasa, hanya izinkan klien SEB resmi.</p>
                            </div>
                            <input type="hidden" name="seb_required" value="0">
                            <input type="checkbox" name="seb_required" value="1" {{ filter_var(old('seb_required', $exam->seb_required), FILTER_VALIDATE_BOOLEAN) ? 'checked' : '' }} class="form-switch">
                        </label>
                    </div>
                </x-cbt.card>

                @php
                    $mediaCfg = $exam->getMediaAndDisplayConfig();
                @endphp
                <x-cbt.card title="5. Pengaturan Media (Audio & Gambar) & Bahasa Arab (RTL)">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Batas Pemutaran Audio Listening</label>
                            <select name="audio_max_plays" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                @php
                                    $curPlays = (string) old('audio_max_plays', $mediaCfg['audio_max_plays']);
                                @endphp
                                <option value="0" {{ $curPlays === '0' ? 'selected' : '' }}>Tak Terbatas (Bebas Diputar Ulang Peserta)</option>
                                <option value="1" {{ $curPlays === '1' ? 'selected' : '' }}>Maksimal 1 Kali (Standar TOEFL / TOAFL Resmi)</option>
                                <option value="2" {{ $curPlays === '2' ? 'selected' : '' }}>Maksimal 2 Kali (Default Institusi)</option>
                                <option value="3" {{ $curPlays === '3' ? 'selected' : '' }}>Maksimal 3 Kali</option>
                                <option value="5" {{ $curPlays === '5' ? 'selected' : '' }}>Maksimal 5 Kali (Latihan)</option>
                                @if(! in_array($curPlays, ['0', '1', '2', '3', '5'], true))
                                    <option value="{{ $curPlays }}" selected>Maksimal {{ $curPlays }} Kali (Kustom)</option>
                                @endif
                            </select>
                            <p class="text-[11px] text-default-400 mt-1">Aturan global untuk soal audio; dapat dioverride di masing-masing butir soal.</p>
                        </div>

                        <label class="flex items-center justify-between p-2.5 rounded hover:bg-default-50 transition cursor-pointer">
                            <div>
                                <span class="text-xs font-bold text-default-800 block">Izinkan Geser Durasi / Seek Audio</span>
                                <p class="text-[11px] text-default-400">Jika nonaktif, peserta harus menyimak audio secara berurutan tanpa loncat detik.</p>
                            </div>
                            <input type="hidden" name="audio_allow_seek" value="0">
                            <input type="checkbox" name="audio_allow_seek" value="1" {{ old('audio_allow_seek', $mediaCfg['audio_allow_seek']) ? 'checked' : '' }} class="form-switch">
                        </label>

                        <label class="flex items-center justify-between p-2.5 rounded hover:bg-default-50 transition cursor-pointer">
                            <div>
                                <span class="text-xs font-bold text-default-800 block">Izinkan Perbesar Gambar Soal (Zoom Lightbox)</span>
                                <p class="text-[11px] text-default-400">Peserta dapat mengeklik gambar pada stimulus/soal untuk memperbesar tampilan.</p>
                            </div>
                            <input type="hidden" name="image_zoom_enabled" value="0">
                            <input type="checkbox" name="image_zoom_enabled" value="1" {{ old('image_zoom_enabled', $mediaCfg['image_zoom_enabled']) ? 'checked' : '' }} class="form-switch">
                        </label>

                        <div class="pt-2 border-t border-default-100">
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Huruf Pilihan Jawaban Khusus Soal Arab (RTL)</label>
                            @php
                                $curRtlStyle = old('rtl_option_style', $mediaCfg['rtl_option_style']);
                            @endphp
                            <select name="rtl_option_style" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <option value="arabic_hijaiyah" {{ $curRtlStyle === 'arabic_hijaiyah' ? 'selected' : '' }}>أ، ب، ت، ث، ج (Alif, Ba, Ta - Hijaiyah)</option>
                                <option value="arabic_abjadiyah" {{ $curRtlStyle === 'arabic_abjadiyah' ? 'selected' : '' }}>أ، ب، ج، د، هـ (Alif, Ba, Jim - Abjadiyah / TOAFL)</option>
                                <option value="latin" {{ $curRtlStyle === 'latin' ? 'selected' : '' }}>A, B, C, D, E (Huruf Latin)</option>
                            </select>
                        </div>

                        <label class="flex items-center justify-between p-2.5 rounded hover:bg-default-50 transition cursor-pointer">
                            <div>
                                <span class="text-xs font-bold text-default-800 block">Pilihan Jawaban Rata Kanan Khusus Soal Arab (RTL)</span>
                                <p class="text-[11px] text-default-400">Menempatkan huruf pilihan dan teks opsi Arab sejajar dari kanan ke kiri.</p>
                            </div>
                            <input type="hidden" name="rtl_align_options_right" value="0">
                            <input type="checkbox" name="rtl_align_options_right" value="1" {{ old('rtl_align_options_right', $mediaCfg['rtl_align_options_right']) ? 'checked' : '' }} class="form-switch">
                        </label>
                    </div>
                </x-cbt.card>

                <!-- Actions -->
                <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 pt-2">
                    <a href="{{ route('staff.exams.show', $exam) }}" class="btn btn-sm w-full sm:w-auto px-5 py-2.5 bg-default-100 hover:bg-default-200 text-default-700 font-semibold text-xs rounded transition text-center">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-sm w-full sm:w-auto px-6 py-2.5 bg-primary hover:bg-primary-hover text-white font-semibold text-xs rounded shadow-xs inline-flex items-center justify-center gap-1.5 transition">
                        <i data-lucide="save" class="size-4 shrink-0"></i>
                        <span>Simpan Perubahan</span>
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
        const passingGradeHint = document.getElementById('passing-grade-hint');
        const selectAssessmentType = document.getElementById('select-assessment-type');
        const selectScoreScale = document.getElementById('select-score-scale');
        const selectScoreDecimals = document.getElementById('select-score-decimals');
        const selectCertificateType = document.getElementById('select-certificate-type');
        const panelLangSections = document.getElementById('panel-language-sections');
        const presetValidity = document.getElementById('preset-cert-validity');
        const inputValidity = document.getElementById('input-cert-validity');
        const togglePayment = document.getElementById('toggle-requires-payment');
        const containerPayment = document.getElementById('container-payment-settings');

        window.applyLanguageSectionPreset = function (lang) {
            const listening = document.getElementById('sec_label_listening');
            const structure = document.getElementById('sec_label_structure');
            const reading = document.getElementById('sec_label_reading');
            if (lang === 'ar') {
                if (listening) listening.value = 'Fahm al-Masmu (Listening / Menyimak)';
                if (structure) structure.value = 'Qawaid wa Tarakib (Structure / Tata Bahasa)';
                if (reading) reading.value = 'Fahm al-Maqru (Reading / Membaca)';
            } else {
                if (listening) listening.value = 'Listening Comprehension';
                if (structure) structure.value = 'Structure and Written Expression';
                if (reading) reading.value = 'Reading Comprehension';
            }
        };

        function updatePassingGradeHint() {
            if (!passingGradeHint || !selectScoreScale) return;
            const hints = {
                standard_100: 'Skala Standar 0 - 100: contoh KKM 75.',
                toefl_itp_677: 'Skala TOEFL ITP (310 - 677): boleh isi di atas 100, contoh KKM 450 atau 500.',
                toefl_ibt_120: 'Skala TOEFL iBT (0 - 120): contoh KKM 80 atau 90.',
                ielts_9: 'Skala IELTS Band (0 - 9.0): contoh KKM 6.0 atau 6.5.',
                cefr: 'Skala CEFR dikonversi dari persentase 0 - 100.'
            };
            passingGradeHint.textContent = hints[selectScoreScale.value] || hints.standard_100;
        }

        function updateLangPanelVisibility() {
            if (!panelLangSections) return;
            const isLang = (selectAssessmentType && selectAssessmentType.value === 'certification_language')
                || (selectCertificateType && selectCertificateType.value === 'language_proficiency');
            panelLangSections.classList.toggle('hidden', !isLang);
        }

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
        if (togglePayment && containerPayment) {
            togglePayment.addEventListener('change', () => {
                containerPayment.classList.toggle('hidden', !togglePayment.checked);
            });
        }
        if (presetValidity && inputValidity) {
            presetValidity.addEventListener('change', function () {
                if (this.value !== '') inputValidity.value = this.value;
            });
        }
        if (selectScoreScale) {
            selectScoreScale.addEventListener('change', updatePassingGradeHint);
            updatePassingGradeHint();
        }
        if (selectCertificateType) {
            selectCertificateType.addEventListener('change', updateLangPanelVisibility);
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
                    if (selectScoreDecimals) selectScoreDecimals.value = '0';
                    if (selectCertificateType) selectCertificateType.value = 'language_proficiency';
                    if (inputValidity && (!inputValidity.value || Number(inputValidity.value) === 0)) {
                        inputValidity.value = '24';
                    }
                } else if (val === 'certification_competency') {
                    if (selectCertificateType) selectCertificateType.value = 'competency';
                } else if (val === 'academic') {
                    if (togglePassingGrade) {
                        togglePassingGrade.checked = true;
                        updatePassingGradeVisibility();
                    }
                    if (inputPassingGrade && (!inputPassingGrade.value || parseFloat(inputPassingGrade.value) === 0)) {
                        inputPassingGrade.value = '75.0';
                    }
                    if (selectScoreScale) selectScoreScale.value = 'standard_100';
                    if (selectCertificateType) selectCertificateType.value = 'standard';
                }
                updatePassingGradeHint();
                updateLangPanelVisibility();
            });
        }
    });
</script>
@endpush
@endsection

