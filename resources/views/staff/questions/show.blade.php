@extends('layouts.staff')

@section('title', 'Detail Butir Soal ' . $question->code . ' — TESLOKA CBT')
@section('page-parent', 'Bank Soal')
@section('page-title', 'Soal: ' . $question->code)
@section('page-subtitle', 'Mata Pelajaran: ' . ($question->questionBank->subject->name ?? '-') . ' • Versi #' . $question->version . ' • Bobot: ' . $question->weight)

@section('page-actions')
    <a href="{{ route('staff.questions.edit', $question) }}" class="px-3.5 py-2 bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
        <span>Edit / Revisi</span>
    </a>
    <form action="{{ route('staff.questions.duplicate', $question) }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition cursor-pointer">
            <svg class="size-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
            <span>Gandakan</span>
        </button>
    </form>
    <a href="{{ route('staff.question-banks.show', $question->questionBank) }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="size-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        <span>Kembali</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Kolom Kiri: Pratinjau Soal (Perspektif Peserta & Guru) -->
        <div class="lg:col-span-2 space-y-6">
            <x-cbt.card>
                <div class="border-b border-default-200 pb-3 mb-5 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="flex items-center gap-2 flex-wrap">
                        <button type="button" id="tabBtnCandidate" onclick="switchPreviewTab('candidate')" class="px-3.5 py-1.5 text-xs font-semibold rounded-lg bg-primary/10 text-primary inline-flex items-center gap-1.5 transition">
                            <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            Tampilan Peserta (Simulasi Ujian)
                        </button>
                        <button type="button" id="tabBtnTeacher" onclick="switchPreviewTab('teacher')" class="px-3.5 py-1.5 text-xs font-semibold rounded-lg text-default-500 hover:text-default-800 inline-flex items-center gap-1.5 transition">
                            <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            Tampilan Guru (Kunci & Bobot)
                        </button>
                    </div>
                    <span class="text-xs text-default-400">Tipe: <strong class="text-default-700">{{ strtoupper(str_replace('_', ' ', $question->type)) }}</strong></span>
                </div>

                <!-- Stimulus jika ada -->
                @if($question->stimulus)
                    <div class="p-4 bg-default-50 border border-default-200 rounded mb-6">
                        <div class="flex items-center gap-2 text-xs font-bold text-default-500 uppercase tracking-wide mb-2">
                            <svg class="size-4 text-default-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Stimulus / Wacana: {{ $question->stimulus->title }}
                        </div>
                        <div class="prose prose-sm max-w-none text-default-700 leading-relaxed">
                            @php
                                $allowedTags = '<p><br><strong><b><em><i><u><s><ul><ol><li><table><thead><tbody><tr><th><td><img><span><sub><sup><div>';
                                $stimContent = strip_tags($question->stimulus->content, $allowedTags);
                                if (!str_contains($stimContent, '<p>') && !str_contains($stimContent, '<br>')) {
                                    $stimContent = nl2br($stimContent);
                                }
                            @endphp
                            {!! $stimContent !!}
                        </div>
                        @if($question->stimulus->media_url)
                            <div class="mt-3">
                                <a href="{{ $question->stimulus->media_url }}" target="_blank" class="text-xs text-primary hover:underline inline-flex items-center gap-1">
                                    <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                                    Buka Lampiran Berkas Stimulus
                                </a>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Pokok Soal -->
                <div class="mb-6">
                    <div class="text-xs font-bold text-default-400 uppercase tracking-wide mb-2">Pertanyaan / Soal</div>
                    <div class="text-base text-default-900 leading-relaxed font-sans {{ $question->is_rtl ? 'text-right font-serif text-xl' : '' }}" {{ $question->is_rtl ? 'dir=rtl' : '' }}>
                        @php
                            $qContent = strip_tags($question->content, $allowedTags);
                            if (!str_contains($qContent, '<p>') && !str_contains($qContent, '<br>')) {
                                $qContent = nl2br($qContent);
                            }
                        @endphp
                        {!! $qContent !!}
                    </div>
                </div>

                <!-- Opsi Jawaban: Candidate Mode (Default) -->
                <div id="previewCandidate" class="space-y-3">
                    <div class="text-xs font-bold text-default-400 uppercase tracking-wide mb-2">Pilihan Jawaban (Peserta)</div>
                    @if($question->type === 'essay')
                        <div class="p-4 border border-dashed border-default-200 rounded bg-default-50 text-default-400 text-sm italic">
                            [Area respons uraian/esai bagi peserta ujian]
                        </div>
                    @elseif($question->type === 'short_answer' || $question->type === 'numeric')
                        <div class="p-3 border border-default-200 rounded bg-white flex items-center gap-3">
                            <span class="text-xs font-bold text-default-400 uppercase">Jawaban:</span>
                            <input type="text" placeholder="Ketik jawaban di sini..." class="w-full text-xs border-default-200 rounded bg-default-50" disabled>
                        </div>
                    @elseif($question->type === 'matching')
                        <div class="space-y-2">
                            @foreach($question->options as $opt)
                                <div class="p-3 border border-default-200 rounded bg-white grid grid-cols-2 gap-4 items-center">
                                    <div class="text-sm font-medium text-default-800">{!! strip_tags($opt->content, '<br><strong><b><em><i><u><s><sub><sup><img><span>') !!}</div>
                                    <div class="p-2 border border-dashed border-default-200 rounded-lg bg-default-50 text-xs text-default-500">
                                        Pilih pasangan...
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        @foreach($question->options as $opt)
                            <div class="p-3 border border-default-200 rounded bg-white flex items-center gap-3">
                                <span class="size-7 rounded-full border border-default-200 flex items-center justify-center font-bold text-xs text-default-700 bg-default-50">
                                    {{ $opt->option_key }}
                                </span>
                                <span class="text-sm text-default-800">{!! strip_tags($opt->content, '<br><strong><b><em><i><u><s><sub><sup><img><span>') !!}</span>
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- Opsi Jawaban: Teacher Mode -->
                <div id="previewTeacher" class="space-y-3 hidden">
                    <div class="text-xs font-bold text-default-400 uppercase tracking-wide mb-2">Pilihan & Kunci Jawaban (Guru)</div>
                    @if($question->type === 'essay')
                        <div class="p-4 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-900">
                            <strong>Panduan Penilaian Esai:</strong> Soal ini dinilai secara manual oleh pemeriksa/guru menggunakan rubrik penilaian.
                        </div>
                    @elseif($question->type === 'short_answer' || $question->type === 'numeric')
                        <div class="p-3 bg-emerald-50 border border-emerald-200 rounded-lg flex items-center gap-3">
                            <span class="text-xs font-bold text-emerald-800 uppercase">Kunci Valid:</span>
                            <span class="text-sm font-semibold text-emerald-900">{!! strip_tags(optional($question->options->first())->content ?? '', '<br><strong><b><em><i><u><s><sub><sup><img><span>') !!}</span>
                        </div>
                    @elseif($question->type === 'matching')
                        <div class="space-y-2">
                            @foreach($question->options as $opt)
                                <div class="p-3 bg-emerald-50 border border-emerald-200 rounded-lg grid grid-cols-2 gap-4 items-center">
                                    <div class="text-sm font-medium text-default-800">{!! strip_tags($opt->content, '<br><strong><b><em><i><u><s><sub><sup><img><span>') !!}</div>
                                    <div class="text-sm font-semibold text-emerald-800 flex items-center gap-1.5">
                                        <svg class="size-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                        {{ $opt->pair_match }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        @foreach($question->options as $opt)
                            <div class="p-3 rounded-lg flex items-center justify-between {{ $opt->is_correct ? 'bg-emerald-50 border border-emerald-300' : 'bg-white border border-default-200' }}">
                                <div class="flex items-center gap-3">
                                    <span class="w-7 h-7 rounded-full flex items-center justify-center font-bold text-xs {{ $opt->is_correct ? 'bg-emerald-600 text-white' : 'bg-default-100 text-default-700' }}">
                                        {{ $opt->option_key }}
                                    </span>
                                    <span class="text-sm {{ $opt->is_correct ? 'font-semibold text-emerald-900' : 'text-default-700' }}">{!! strip_tags($opt->content, '<br><strong><b><em><i><u><s><sub><sup><img><span>') !!}</span>
                                </div>
                                @if($opt->is_correct)
                                    <span class="text-xs font-bold text-emerald-700 bg-emerald-100 px-2.5 py-0.5 rounded-full inline-flex items-center gap-1">
                                        <svg class="size-3.5 text-emerald-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                        Jawaban Benar
                                    </span>
                                @endif
                            </div>
                        @endforeach
                    @endif

                    @if($question->explanation)
                        <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded">
                            <div class="text-xs font-bold text-blue-800 uppercase tracking-wide mb-1 flex items-center gap-1.5">
                                <svg class="size-4 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                                Pembahasan Soal
                            </div>
                            <div class="text-sm text-blue-900 leading-relaxed">
                                {!! nl2br(e($question->explanation)) !!}
                            </div>
                        </div>
                    @endif
                </div>
            </x-cbt.card>
        </div>

        <!-- Kolom Kanan: Riwayat Versi (Snapshot Immutable Audit) -->
        <div class="space-y-6">
            <x-cbt.card title="Riwayat Versi Butir Soal">
                <p class="text-xs text-default-500 mb-4">Setiap revisi tersimpan sebagai snapshot terisolasi.</p>
                <div class="relative border-l-2 border-default-200 ml-3 space-y-6 pb-2">
                    @forelse($question->versions as $ver)
                        <div class="relative pl-6">
                            <!-- Bullet -->
                            <div class="absolute -left-2 top-1 w-4 h-4 rounded-full border-2 border-white {{ $ver->version_number === $question->version ? 'bg-primary ring-4 ring-primary/20' : 'bg-slate-300' }}"></div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm font-bold text-default-800">Versi #{{ $ver->version_number }}</span>
                                @if($ver->version_number === $question->version)
                                    <span class="text-[10px] uppercase font-bold text-primary bg-primary/10 px-2 py-0.5 rounded-full">Aktif</span>
                                @else
                                    <form action="{{ route('staff.questions.restore', [$question, $ver->version_number]) }}" method="POST" onsubmit="return confirm('Pulihkan soal ke Versi #{{ $ver->version_number }}?')">
                                        @csrf
                                        <button type="submit" class="text-xs text-primary hover:text-[#1e22cc] font-medium">Pulihkan</button>
                                    </form>
                                @endif
                            </div>
                            <p class="text-xs text-default-600 mt-1 font-medium">{{ $ver->change_summary ?? 'Perubahan butir soal' }}</p>
                            <div class="text-[11px] text-default-400 mt-1 flex items-center gap-1.5">
                                <svg class="size-3.5 text-default-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $ver->created_at->format('d M Y H:i') }} &bull; {{ $ver->author->name ?? 'Sistem' }}
                            </div>
                        </div>
                    @empty
                        <div class="pl-6 text-xs text-default-400">Belum ada catatan riwayat versi.</div>
                    @endforelse
                </div>
            </x-cbt.card>

            <x-cbt.card title="Metadata Soal">
                <dl class="text-xs space-y-2">
                    <div class="flex justify-between py-1 border-b border-default-100">
                        <dt class="text-default-400">ID Sistem:</dt>
                        <dd class="font-mono text-default-700">{{ $question->id }}</dd>
                    </div>
                    <div class="flex justify-between py-1 border-b border-default-100">
                        <dt class="text-default-400">Status:</dt>
                        <dd class="capitalize font-semibold text-default-700">{{ $question->status }}</dd>
                    </div>
                    <div class="flex justify-between py-1 border-b border-default-100">
                        <dt class="text-default-400">Dibuat Pada:</dt>
                        <dd class="text-default-700">{{ $question->created_at->format('d M Y H:i') }}</dd>
                    </div>
                    <div class="flex justify-between py-1">
                        <dt class="text-default-400">Terakhir Diperbarui:</dt>
                        <dd class="text-default-700">{{ $question->updated_at->format('d M Y H:i') }}</dd>
                    </div>
                </dl>
            </x-cbt.card>
        </div>
    </div>
</div>

<script>
    function switchPreviewTab(tab) {
        const candidateView = document.getElementById('previewCandidate');
        const teacherView = document.getElementById('previewTeacher');
        const btnCandidate = document.getElementById('tabBtnCandidate');
        const btnTeacher = document.getElementById('tabBtnTeacher');

        if (tab === 'candidate') {
            candidateView.classList.remove('hidden');
            teacherView.classList.add('hidden');
            btnCandidate.className = 'px-3.5 py-1.5 text-xs font-semibold rounded-lg bg-primary-50 text-primary-700';
            btnTeacher.className = 'px-3.5 py-1.5 text-xs font-semibold rounded-lg text-default-500 hover:text-default-800';
        } else {
            teacherView.classList.remove('hidden');
            candidateView.classList.add('hidden');
            btnTeacher.className = 'px-3.5 py-1.5 text-xs font-semibold rounded-lg bg-primary-50 text-primary-700';
            btnCandidate.className = 'px-3.5 py-1.5 text-xs font-semibold rounded-lg text-default-500 hover:text-default-800';
        }
    }
</script>
@endsection

