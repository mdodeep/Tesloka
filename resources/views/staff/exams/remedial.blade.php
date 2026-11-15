@extends('layouts.staff')

@section('title', 'Buat Ujian Remedial & Susulan — ' . $exam->title)
@section('page-parent', 'Konten & Ujian')
@section('page-title', 'Penyusunan Ujian Remedial: ' . $exam->title)
@section('page-subtitle', 'Menerbitkan ujian tindak lanjut yang terhubung ke ujian induk dengan penyalinan otomatis cetak biru (blueprint).')

@section('page-actions')
    <a href="{{ route('staff.exams.show', $exam) }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
        <i data-lucide="arrow-left" class="size-4"></i>
        <span>Batal & Kembali</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">

    @if($errors->any())
        <x-cbt.alert type="danger" dismissible="true">
            <ul class="list-disc list-inside space-y-1 text-xs">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </x-cbt.alert>
    @endif

    <!-- Kartu Referensi Ujian Induk -->
    <div class="p-4 bg-default-50 border border-default-200 rounded space-y-2">
        <div class="flex items-center justify-between">
            <span class="text-xs font-bold text-default-500 uppercase">Ujian Induk (Parent Exam)</span>
            <span class="px-2 py-0.5 bg-primary-100 text-primary-800 text-[10px] font-bold rounded">
                KKM: {{ $exam->passing_grade }}
            </span>
        </div>
        <div class="text-base font-bold text-default-900">{{ $exam->title }} (<code>{{ $exam->code }}</code>)</div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-xs text-default-600 pt-1">
            <div>Mata Pelajaran: <strong>{{ $exam->subject->name ?? '-' }}</strong></div>
            <div>Durasi Asal: <strong>{{ $exam->duration_minutes }} Menit</strong></div>
            <div>Blueprint Soal: <strong>{{ $exam->blueprints->count() }} Aturan</strong></div>
            <div>Peserta Terdaftar: <strong>{{ $participants->count() }} Orang</strong></div>
        </div>
    </div>

    <form action="{{ route('staff.exams.remedial.store', $exam) }}" method="POST" class="space-y-6">
        @csrf

        <x-cbt.card title="Konfigurasi Pelaksanaan Ujian Baru">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="exam_type" class="block text-xs font-bold text-default-700 uppercase mb-1">Jenis Ujian *</label>
                    <select id="exam_type" name="exam_type" required class="form-select w-full text-xs border-default-200 rounded focus:ring-2 focus:ring-primary/20 focus:border-primary h-10">
                        <option value="remedial" {{ old('exam_type') === 'remedial' ? 'selected' : '' }}>Ujian Remedial (Perbaikan Nilai di Bawah KKM)</option>
                        <option value="makeup" {{ old('exam_type') === 'makeup' ? 'selected' : '' }}>Ujian Susulan (Bagi Peserta Berhalangan Hadir)</option>
                    </select>
                </div>

                <div>
                    <label for="remedial_policy" class="block text-xs font-bold text-default-700 uppercase mb-1">Kebijakan Penentuan Nilai Akhir *</label>
                    <select id="remedial_policy" name="remedial_policy" required class="form-select w-full text-xs border-default-200 rounded focus:ring-2 focus:ring-primary/20 focus:border-primary h-10">
                        <option value="highest" {{ old('remedial_policy') === 'highest' ? 'selected' : '' }}>Mengambil Nilai Tertinggi (Maksimal)</option>
                        <option value="latest" {{ old('remedial_policy') === 'latest' ? 'selected' : '' }}>Mengambil Nilai Terakhir (Hasil Remedial)</option>
                        <option value="replace" {{ old('remedial_policy') === 'replace' ? 'selected' : '' }}>Menggantikan Nilai Lama Secara Penuh</option>
                        <option value="formula" {{ old('remedial_policy') === 'formula' ? 'selected' : '' }}>Formula Pembobotan (50% Reguler + 50% Remedial)</option>
                    </select>
                </div>

                <div>
                    <label for="title" class="block text-xs font-bold text-default-700 uppercase mb-1">Judul Ujian Baru *</label>
                    <input type="text" id="title" name="title" value="{{ old('title', '[Remedial] ' . $exam->title) }}" required class="form-input w-full text-xs border-default-200 rounded focus:ring-2 focus:ring-primary/20 focus:border-primary h-10">
                </div>

                <div>
                    <label for="code" class="block text-xs font-bold text-default-700 uppercase mb-1">Kode Ujian Baru *</label>
                    <input type="text" id="code" name="code" value="{{ old('code', 'REM-' . strtoupper(Str::random(5))) }}" required class="form-input w-full text-xs font-mono uppercase border-default-200 rounded focus:ring-2 focus:ring-primary/20 focus:border-primary h-10">
                </div>

                <div>
                    <label for="duration_minutes" class="block text-xs font-bold text-default-700 uppercase mb-1">Durasi Ujian (Menit) *</label>
                    <input type="number" id="duration_minutes" name="duration_minutes" value="{{ old('duration_minutes', $exam->duration_minutes) }}" min="1" required class="form-input w-full text-xs font-mono border-default-200 rounded focus:ring-2 focus:ring-primary/20 focus:border-primary h-10">
                </div>

                <div>
                    <label for="passing_grade" class="block text-xs font-bold text-default-700 uppercase mb-1">Batas Kelulusan (KKM) *</label>
                    <input type="number" step="0.01" id="passing_grade" name="passing_grade" value="{{ old('passing_grade', $exam->passing_grade) }}" min="0" max="100" required class="form-input w-full text-xs font-mono border-default-200 rounded focus:ring-2 focus:ring-primary/20 focus:border-primary h-10">
                </div>

                <div class="md:col-span-2">
                    <label for="remedial_reason" class="block text-xs font-bold text-default-700 uppercase mb-1">Alasan Pelaksanaan Remedial / Susulan *</label>
                    <textarea id="remedial_reason" name="remedial_reason" rows="2" required placeholder="Tuliskan justifikasi formal pemberian kesempatan remedial atau susulan..." class="form-textarea w-full text-xs border-default-200 rounded focus:ring-2 focus:ring-primary/20 focus:border-primary">{{ old('remedial_reason', 'Memberikan kesempatan perbaikan bagi peserta didik yang belum melampaui batas kriteria ketuntasan minimal (KKM).') }}</textarea>
                </div>
            </div>
        </x-cbt.card>

        <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 pt-2">
            <a href="{{ route('staff.exams.show', $exam) }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold text-center justify-center">
                Batal
            </a>
            <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold shadow-xs inline-flex items-center justify-center gap-1.5 transition">
                <i data-lucide="plus-circle" class="size-4"></i>
                <span>Terbitkan Draf Ujian Remedial / Susulan</span>
            </button>
        </div>
    </form>
</div>
@endsection

