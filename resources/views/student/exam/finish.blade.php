@extends('layouts.student')

@section('title', 'Bukti Pengumpulan Ujian - ' . $attempt->exam->title)

@section('content')
<div class="max-w-2xl mx-auto space-y-6 py-6">
    <!-- Success Banner -->
    <div class="bg-emerald-50 border border-emerald-200 rounded-md p-6 text-center space-y-3 shadow-sm">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 mb-2">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-default-900">Ujian Berhasil Dikumpulkan</h1>
        <p class="text-sm text-default-600">
            Jawaban Anda telah tersimpan secara permanen dan sah di server CBT TESLOKA.
        </p>
    </div>

    <!-- Official Receipt Card -->
    <div class="bg-white border border-default-200 rounded-md shadow-sm overflow-hidden print:border-none print:shadow-none">
        <div class="bg-slate-900 text-white p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <span class="text-xs font-semibold uppercase tracking-wider text-primary-400">Tanda Terima Resmi CBT</span>
                <h2 class="text-lg font-bold">BUKTI PENGUMPULAN UJIAN</h2>
            </div>
            <div class="bg-slate-800 border border-slate-700 px-4 py-2 rounded-lg text-right">
                <span class="block text-[10px] text-default-400 uppercase tracking-wider">Nomor Resi / Receipt Token</span>
                <span class="font-mono text-base font-bold text-emerald-400 select-all">{{ $attempt->submission_receipt ?? '-' }}</span>
            </div>
        </div>

        <div class="p-6 space-y-6">
            <!-- Student & Exam Details -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm pb-6 border-b border-default-100">
                <div>
                    <span class="text-xs text-default-400 block mb-1">Nama Peserta:</span>
                    <strong class="text-default-800 text-base">{{ Auth::guard('student')->user()->name }}</strong>
                    <span class="text-xs text-default-500 block font-mono">NIS/NISN: {{ Auth::guard('student')->user()->nisn ?? Auth::guard('student')->user()->username }}</span>
                </div>
                <div>
                    <span class="text-xs text-default-400 block mb-1">Mata Pelajaran & Ujian:</span>
                    <strong class="text-default-800">{{ $attempt->exam->title }}</strong>
                    <span class="text-xs text-default-500 block">{{ $attempt->exam->subject->name ?? 'Umum' }} ({{ strtoupper($attempt->exam->exam_type) }})</span>
                </div>
                <div>
                    <span class="text-xs text-default-400 block mb-1">Waktu Mulai:</span>
                    <span class="text-default-700 font-mono">{{ $attempt->started_at ? $attempt->started_at->format('d/m/Y H:i:s T') : '-' }}</span>
                </div>
                <div>
                    <span class="text-xs text-default-400 block mb-1">Waktu Pengumpulan (Server):</span>
                    <span class="text-default-700 font-mono">{{ $attempt->submitted_at ? $attempt->submitted_at->format('d/m/Y H:i:s T') : '-' }}</span>
                </div>
            </div>

            <!-- Statistics Breakdown -->
            <div>
                <h3 class="text-xs font-semibold text-default-400 uppercase tracking-wider mb-3">Ringkasan Pengerjaan</h3>
                <div class="grid grid-cols-3 gap-3 text-center">
                    <div class="p-3 bg-default-50 border border-default-100 rounded">
                        <span class="text-2xl font-black text-default-800">{{ $totalQuestions }}</span>
                        <span class="text-xs text-default-500 block mt-0.5">Total Soal</span>
                    </div>
                    <div class="p-3 bg-emerald-50 border border-emerald-100 rounded">
                        <span class="text-2xl font-black text-emerald-600">{{ $answeredQuestions }}</span>
                        <span class="text-xs text-emerald-700 font-medium block mt-0.5">Dijawab</span>
                    </div>
                    <div class="p-3 bg-default-50 border border-default-100 rounded">
                        <span class="text-2xl font-black text-amber-600">{{ $unansweredQuestions }}</span>
                        <span class="text-xs text-amber-700 font-medium block mt-0.5">Kosong</span>
                    </div>
                </div>
            </div>

            <!-- Optional Instant Score -->
            @if($attempt->exam->show_result_on_finish)
                <div class="p-4 bg-primary-50 border border-primary-200 rounded flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold text-primary-800 uppercase tracking-wider block">Nilai Perolehan Awal</span>
                        <p class="text-xs text-primary-600">Hasil penilaian otomatis butir soal pilihan ganda.</p>
                    </div>
                    <div class="text-right">
                        <span class="text-3xl font-black text-primary-700 font-mono">{{ number_format($attempt->final_score ?? 0, 1) }}</span>
                    </div>
                </div>
            @else
                <div class="p-4 bg-default-50 border border-default-200 rounded text-xs text-default-600 flex items-center gap-3">
                    <svg class="w-5 h-5 text-default-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Hasil nilai dan perankingan akan diumumkan secara resmi oleh pihak sekolah/madrasah setelah seluruh sesi selesai.</span>
                </div>
            @endif

            <!-- Integrity Watermark & Notice -->
            <div class="text-[11px] text-default-400 border-t border-default-100 pt-4 flex flex-col sm:flex-row justify-between items-center gap-2">
                <span>Bukti ini diterbitkan secara sah oleh mesin penguji TESLOKA CBT.</span>
                <span class="font-mono">ID Percobaan: #{{ $attempt->id }}</span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="bg-default-50 p-4 border-t border-default-100 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 print:hidden">
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 w-full sm:w-auto">
                <button type="button" onclick="window.print()" class="w-full sm:w-auto px-4 py-2.5 border border-default-200 rounded text-default-700 text-xs font-semibold hover:bg-default-50 transition inline-flex items-center justify-center gap-2 cursor-pointer shadow-2xs">
                    <svg class="w-4 h-4 text-default-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Cetak Bukti Resi
                </button>
                <a href="{{ route('student.exam.transcript', $attempt) }}" class="w-full sm:w-auto px-4 py-2 bg-indigo-50 border border-indigo-200 text-indigo-700 rounded-lg text-sm font-semibold hover:bg-indigo-100 transition inline-flex items-center justify-center gap-1.5">
                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Cetak SKHU / Transkrip</span>
                </a>
                @if($attempt->isPassed())
                    <a href="{{ route('student.exam.certificate', $attempt) }}" class="w-full sm:w-auto px-4 py-2 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm font-semibold hover:bg-emerald-100 transition inline-flex items-center justify-center gap-1.5">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        <span>Sertifikat</span>
                    </a>
                @endif
            </div>
            <a href="{{ route('student.dashboard') }}" class="w-full sm:w-auto px-6 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg text-sm font-semibold transition text-center shadow-sm">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection

