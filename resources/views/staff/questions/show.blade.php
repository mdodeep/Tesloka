@extends('layouts.staff')

@section('title', 'Detail Butir Soal ' . $question->code . '')
@section('page-parent', 'Bank Soal')
@section('page-title', 'Soal: ' . $question->code)
@section('page-subtitle', 'Mata Pelajaran: ' . ($question->questionBank->subject->name ?? '-') . ' • Versi #' . $question->version . ' • Bobot: ' . $question->weight)

@section('page-actions')
    <a href="{{ route('staff.questions.edit', $question) }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
        <i data-lucide="edit" class="size-4"></i>
        <span>Edit / Revisi</span>
    </a>
    <form action="{{ route('staff.questions.duplicate', $question) }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition cursor-pointer">
            <i data-lucide="copy" class="size-4 text-default-500"></i>
            <span>Gandakan</span>
        </button>
    </form>
    <a href="{{ route('staff.question-banks.show', $question->questionBank) }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
        <i data-lucide="arrow-left" class="size-4 text-default-500"></i>
        <span>Kembali</span>
    </a>
@endsection

@section('content')
@php
    $isRtlQuestion = (bool) $question->is_rtl;
    $rtlOptionStyle = $question->getEffectiveRtlOptionStyle();
    $audioLimitOverride = $question->getAudioMaxPlaysOverride();
@endphp
<div class="space-y-6 w-full">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Kolom Kiri: Pratinjau Soal (Perspektif Peserta & Guru) -->
        <div class="lg:col-span-2 space-y-6">
            <x-cbt.card>
                <div class="border-b border-default-200 pb-3 mb-5 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="flex items-center gap-2 flex-wrap">
                        <button type="button" id="tabBtnCandidate" onclick="switchPreviewTab('candidate')" class="px-3.5 py-1.5 text-xs font-semibold rounded bg-primary/10 text-primary inline-flex items-center gap-1.5 transition cursor-pointer">
                            <i data-lucide="user" class="size-3.5"></i>
                            <span>Tampilan Peserta (Simulasi Ujian)</span>
                        </button>
                        <button type="button" id="tabBtnTeacher" onclick="switchPreviewTab('teacher')" class="px-3.5 py-1.5 text-xs font-semibold rounded text-default-500 hover:text-default-800 inline-flex items-center gap-1.5 transition cursor-pointer">
                            <i data-lucide="key" class="size-3.5"></i>
                            <span>Tampilan Guru (Kunci & Bobot)</span>
                        </button>
                    </div>
                    <span class="text-xs text-default-400">Tipe: <strong class="text-default-700">{{ strtoupper(str_replace('_', ' ', $question->type)) }}</strong></span>
                </div>

                <!-- Stimulus jika ada -->
                @if($question->stimulus)
                    <div class="p-4 bg-default-50 border border-default-200 rounded mb-6">
                        <div class="flex items-center gap-2 text-xs font-bold text-default-500 uppercase tracking-wide mb-3">
                            <i data-lucide="book-open" class="size-4 text-primary"></i>
                            <span>Stimulus / Wacana: {{ $question->stimulus->title }}</span>
                        </div>

                        @php
                            $stimContent = \App\Services\HtmlSanitizerService::clean($question->stimulus->content, true);
                        @endphp

                        @if($question->stimulus->media_type === 'audio' || \App\Services\MediaStorageService::isAudioPath($question->stimulus->media_path))
                            @if($question->stimulus->media_url)
                                <div class="mb-3 p-2.5 bg-white rounded border border-default-200">
                                    <audio controls class="w-full h-8" preload="metadata" src="{{ $question->stimulus->media_url }}" onerror="this.nextElementSibling.classList.remove('hidden')"></audio>
                                    <p class="hidden mt-1.5 text-[11px] text-rose-600 font-medium">Gagal memuat berkas audio stimulus. Periksa kembali keberadaan berkas di Pustaka Media.</p>
                                </div>
                            @endif
                            <!-- Mode Peserta: Transkrip disembunyikan untuk simulasi listening asli -->
                            <div id="stimulusAudioTranscriptCandidate" class="p-3 bg-primary-50/70 border border-primary-200/60 rounded text-xs text-primary-900 flex items-center gap-2">
                                <i data-lucide="headphones" class="size-4 text-primary shrink-0"></i>
                                <span><strong>Simulasi Mode Peserta:</strong> Transkrip audio disembunyikan agar murni menguji kemampuan mendengarkan. Peserta hanya mendengarkan rekaman suara melalui pemutar di atas.</span>
                            </div>
                            <!-- Mode Guru: Transkrip ditampilkan untuk verifikasi & telaah naskah -->
                            <div id="stimulusAudioTranscriptTeacher" class="hidden">
                                <div class="text-xs font-bold text-default-600 uppercase tracking-wide mb-1.5 flex items-center gap-1.5">
                                    <i data-lucide="file-text" class="size-3.5 text-primary"></i>
                                    <span>Transkrip Naskah Audio (Tampilan Khusus Guru / Staf):</span>
                                </div>
                                <div class="prose prose-sm max-w-none text-default-700 leading-relaxed p-3.5 bg-white border border-default-200 rounded {{ $isRtlQuestion ? 'text-right font-serif text-base' : '' }}" {{ $isRtlQuestion ? 'dir=rtl' : '' }}>
                                    {!! $stimContent !!}
                                </div>
                            </div>
                        @else
                            <!-- Stimulus Teks / Bacaan (Passage Reading Comprehension) -->
                            <div class="prose prose-sm max-w-none text-default-700 leading-relaxed {{ $isRtlQuestion ? 'text-right font-serif text-base' : '' }}" {{ $isRtlQuestion ? 'dir=rtl' : '' }}>
                                {!! $stimContent !!}
                            </div>
                        @endif

                        @if($question->stimulus->media_url && $question->stimulus->media_type !== 'audio')
                            <div class="mt-3">
                                <a href="{{ $question->stimulus->media_url }}" target="_blank" rel="noopener noreferrer" class="text-xs text-primary hover:underline inline-flex items-center gap-1">
                                    <i data-lucide="paperclip" class="size-3.5"></i>
                                    <span>Buka Lampiran Berkas Stimulus</span>
                                </a>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Pokok Soal -->
                <div class="mb-6">
                    <div class="text-xs font-bold text-default-400 uppercase tracking-wide mb-2">Pertanyaan / Soal</div>

                    <!-- Lampiran Media Butir Soal (Audio / Gambar dari Pustaka Media) -->
                    @if($question->media_url)
                        @if(\App\Services\MediaStorageService::isAudioPath($question->media_path, $question->media_type))
                            <div class="mb-4 p-3 bg-indigo-50/70 border border-indigo-200/70 rounded-md">
                                <div class="flex items-center gap-2 mb-1.5 text-xs font-bold text-indigo-900">
                                    <i data-lucide="volume-2" class="size-4 text-indigo-600"></i>
                                    <span>Audio Pertanyaan / Soal Listening</span>
                                </div>
                                <audio controls class="w-full h-8" preload="metadata" src="{{ $question->media_url }}" onerror="this.nextElementSibling.classList.remove('hidden')"></audio>
                                <p class="hidden mt-1.5 text-[11px] text-rose-600 font-medium">Berkas audio gagal diputar atau tidak ditemukan di server.</p>
                            </div>
                        @elseif(\App\Services\MediaStorageService::isImagePath($question->media_path, $question->media_type))
                            <div class="mb-4 p-2 bg-white border border-default-200 rounded-md max-w-lg">
                                <button type="button" onclick="openStaffImageZoom('{{ $question->media_url }}')" class="block w-full cursor-zoom-in group relative" title="Klik untuk memperbesar gambar">
                                    <img src="{{ $question->media_url }}" alt="Media Soal" class="rounded max-h-72 object-contain mx-auto">
                                    <span class="mt-1.5 inline-flex items-center gap-1 text-[11px] font-semibold text-primary group-hover:underline">
                                        <i data-lucide="zoom-in" class="size-3.5"></i>
                                        <span>Klik gambar untuk memperbesar</span>
                                    </span>
                                </button>
                            </div>
                        @endif
                    @endif

                    <div class="text-base text-default-900 leading-relaxed font-sans {{ $question->is_rtl ? 'text-right font-serif text-xl' : '' }}" {{ $question->is_rtl ? 'dir=rtl' : '' }}>
                        {!! \App\Services\HtmlSanitizerService::clean($question->content, true) !!}
                    </div>
                </div>

                <!-- Opsi Jawaban: Candidate Mode (Default) -->
                <div id="previewCandidate" class="space-y-3">
                    <div class="text-xs font-bold text-default-400 uppercase tracking-wide mb-2 {{ $isRtlQuestion ? 'text-right' : '' }}">Pilihan Jawaban (Peserta)</div>
                    @if($question->type === 'essay')
                        <div class="p-4 border border-dashed border-default-200 rounded bg-default-50 text-default-400 text-sm italic {{ $isRtlQuestion ? 'text-right' : '' }}" {{ $isRtlQuestion ? 'dir=rtl' : '' }}>
                            [Area respons uraian/esai bagi peserta ujian]
                        </div>
                    @elseif($question->type === 'short_answer' || $question->type === 'numeric')
                        <div class="p-3 border border-default-200 rounded bg-white flex items-center gap-3" {{ $isRtlQuestion ? 'dir=rtl' : '' }}>
                            <span class="text-xs font-bold text-default-400 uppercase">Jawaban:</span>
                            <input type="text" placeholder="Ketik jawaban di sini..." class="w-full text-xs border-default-200 rounded bg-default-50 {{ $isRtlQuestion ? 'text-right font-serif' : '' }}" {{ $isRtlQuestion ? 'dir=rtl' : '' }} disabled>
                        </div>
                    @elseif($question->type === 'matching')
                        <div class="space-y-2">
                            @foreach($question->options as $opt)
                                <div class="p-3 border border-default-200 rounded bg-white grid grid-cols-2 gap-4 items-center" {{ $isRtlQuestion ? 'dir=rtl' : '' }}>
                                    <div class="text-sm font-medium text-default-800 {{ $isRtlQuestion ? 'text-right font-serif' : '' }}">{!! \App\Services\HtmlSanitizerService::clean($opt->content, false) !!}</div>
                                    <div class="p-2 border border-dashed border-default-200 rounded-lg bg-default-50 text-xs text-default-500">
                                        Pilih pasangan...
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        @foreach($question->options as $opt)
                            @php
                                $displayOptionLetter = \App\Models\Question::formatOptionLabel($opt->option_key, $isRtlQuestion, $rtlOptionStyle);
                            @endphp
                            <div class="p-3 border border-default-200 rounded bg-white flex items-center gap-3 {{ $isRtlQuestion ? 'text-right' : '' }}" {{ $isRtlQuestion ? 'dir=rtl' : '' }}>
                                <span class="size-7 rounded-full border border-default-200 flex items-center justify-center font-bold text-xs text-default-700 bg-default-50 shrink-0 {{ $isRtlQuestion ? 'font-serif text-sm' : '' }}">
                                    {{ $displayOptionLetter }}
                                </span>
                                <span class="text-sm text-default-800 flex-1 {{ $isRtlQuestion ? 'font-serif text-base leading-relaxed' : '' }}">{!! \App\Services\HtmlSanitizerService::clean($opt->content, false) !!}</span>
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- Opsi Jawaban: Teacher Mode -->
                <div id="previewTeacher" class="space-y-3 hidden">
                    <div class="text-xs font-bold text-default-400 uppercase tracking-wide mb-2 {{ $isRtlQuestion ? 'text-right' : '' }}">Pilihan &amp; Kunci Jawaban (Guru)</div>
                    @if($question->type === 'essay')
                        <div class="p-4 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-900">
                            <strong>Panduan Penilaian Esai:</strong> Soal ini dinilai secara manual oleh pemeriksa/guru menggunakan rubrik penilaian.
                        </div>
                    @elseif($question->type === 'short_answer' || $question->type === 'numeric')
                        <div class="p-3 bg-emerald-50 border border-emerald-200 rounded-lg flex items-center gap-3" {{ $isRtlQuestion ? 'dir=rtl' : '' }}>
                            <span class="text-xs font-bold text-emerald-800 uppercase">Kunci Valid:</span>
                            <span class="text-sm font-semibold text-emerald-900 {{ $isRtlQuestion ? 'font-serif' : '' }}">{!! \App\Services\HtmlSanitizerService::clean(optional($question->options->first())->content ?? '', false) !!}</span>
                        </div>
                    @elseif($question->type === 'matching')
                        <div class="space-y-2">
                            @foreach($question->options as $opt)
                                <div class="p-3 bg-emerald-50 border border-emerald-200 rounded-lg grid grid-cols-2 gap-4 items-center" {{ $isRtlQuestion ? 'dir=rtl' : '' }}>
                                    <div class="text-sm font-medium text-default-800 {{ $isRtlQuestion ? 'font-serif' : '' }}">{!! \App\Services\HtmlSanitizerService::clean($opt->content, false) !!}</div>
                                    <div class="text-sm font-semibold text-emerald-800 flex items-center gap-1.5">
                                        <i data-lucide="check" class="size-4 text-emerald-600"></i>
                                        <span>{{ $opt->pair_match }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        @foreach($question->options as $opt)
                            @php
                                $displayOptionLetter = \App\Models\Question::formatOptionLabel($opt->option_key, $isRtlQuestion, $rtlOptionStyle);
                            @endphp
                            <div class="p-3 rounded-lg flex items-center justify-between gap-3 {{ $opt->is_correct ? 'bg-emerald-50 border border-emerald-300' : 'bg-white border border-default-200' }}" {{ $isRtlQuestion ? 'dir=rtl' : '' }}>
                                <div class="flex items-center gap-3 flex-1">
                                    <span class="w-7 h-7 rounded-full flex items-center justify-center font-bold text-xs shrink-0 {{ $opt->is_correct ? 'bg-emerald-600 text-white' : 'bg-default-100 text-default-700' }} {{ $isRtlQuestion ? 'font-serif text-sm' : '' }}">
                                        {{ $displayOptionLetter }}
                                    </span>
                                    <span class="text-sm {{ $opt->is_correct ? 'font-semibold text-emerald-900' : 'text-default-700' }} {{ $isRtlQuestion ? 'font-serif text-base leading-relaxed' : '' }}">{!! \App\Services\HtmlSanitizerService::clean($opt->content, false) !!}</span>
                                </div>
                                @if($opt->is_correct)
                                    <span class="text-xs font-bold text-emerald-700 bg-emerald-100 px-2.5 py-0.5 rounded-full inline-flex items-center gap-1 shrink-0">
                                        <i data-lucide="check" class="size-3.5 text-emerald-700"></i>
                                        Jawaban Benar
                                    </span>
                                @endif
                            </div>
                        @endforeach
                    @endif

                    @if($question->explanation)
                        <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded">
                            <div class="text-xs font-bold text-primary uppercase tracking-wide mb-1 flex items-center gap-1.5">
                                <i data-lucide="help-circle" class="size-4 text-primary"></i>
                                <span>Pembahasan Soal</span>
                            </div>
                            <div class="text-sm text-blue-900 leading-relaxed {{ $isRtlQuestion ? 'text-right font-serif text-base' : '' }}" {{ $isRtlQuestion ? 'dir=rtl' : '' }}>
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
                                <i data-lucide="clock" class="size-3.5 text-default-400"></i>
                                <span>{{ $ver->created_at->format('d M Y H:i') }} &bull; {{ $ver->author->name ?? 'Sistem' }}</span>
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
                        <dt class="text-default-400">Arah Teks &amp; Opsi:</dt>
                        <dd class="font-semibold text-default-700">
                            {{ $isRtlQuestion ? ('RTL Arab (' . ($rtlOptionStyle === 'arabic_abjadiyah' ? 'أ، ب، ج، د' : ($rtlOptionStyle === 'latin' ? 'A, B, C, D' : 'أ، ب، ت، ث')) . ')') : 'LTR (A, B, C, D)' }}
                        </dd>
                    </div>
                    <div class="flex justify-between py-1 border-b border-default-100">
                        <dt class="text-default-400">Batas Putar Audio:</dt>
                        <dd class="font-semibold text-default-700">
                            {{ $audioLimitOverride === null ? 'Ikuti Aturan Ujian' : ($audioLimitOverride === 0 ? 'Tak Terbatas' : ($audioLimitOverride . 'x Putar')) }}
                        </dd>
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

<!-- Lightbox Perbesar Gambar Soal -->
<div id="staffImageZoomModal" role="dialog" aria-modal="true" aria-label="Perbesaran Media Soal" class="hidden fixed inset-0 z-50 bg-black/75 backdrop-blur-xs flex items-center justify-center p-4" onclick="closeStaffImageZoom(event)">
    <div class="relative max-w-4xl max-h-[90vh] flex flex-col items-center">
        <button type="button" onclick="closeStaffImageZoom()" class="mb-2 self-end px-3 py-1 rounded-full bg-white text-default-800 text-xs font-bold shadow cursor-pointer">Tutup</button>
        <img id="staffImageZoomTarget" src="" alt="Perbesaran Media Soal" class="max-h-[82vh] max-w-full rounded-lg shadow-2xl bg-white p-1 object-contain">
    </div>
</div>

<script>
    function openStaffImageZoom(url) {
        const modal = document.getElementById('staffImageZoomModal');
        const img = document.getElementById('staffImageZoomTarget');
        if (modal && img && url) {
            img.src = url;
            modal.classList.remove('hidden');
        }
    }
    function closeStaffImageZoom(event) {
        const modal = document.getElementById('staffImageZoomModal');
        if (!modal) return;
        if (!event || event.target === modal) {
            modal.classList.add('hidden');
        }
    }
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeStaffImageZoom();
    });

    function switchPreviewTab(tab) {
        const candidateView = document.getElementById('previewCandidate');
        const teacherView = document.getElementById('previewTeacher');
        const btnCandidate = document.getElementById('tabBtnCandidate');
        const btnTeacher = document.getElementById('tabBtnTeacher');
        const audioTranscriptCandidate = document.getElementById('stimulusAudioTranscriptCandidate');
        const audioTranscriptTeacher = document.getElementById('stimulusAudioTranscriptTeacher');

        if (tab === 'candidate') {
            candidateView.classList.remove('hidden');
            teacherView.classList.add('hidden');
            if (audioTranscriptCandidate) audioTranscriptCandidate.classList.remove('hidden');
            if (audioTranscriptTeacher) audioTranscriptTeacher.classList.add('hidden');
            btnCandidate.className = 'px-3.5 py-1.5 text-xs font-semibold rounded bg-primary/10 text-primary inline-flex items-center gap-1.5 transition cursor-pointer';
            btnTeacher.className = 'px-3.5 py-1.5 text-xs font-semibold rounded text-default-500 hover:text-default-800 inline-flex items-center gap-1.5 transition cursor-pointer';
        } else {
            teacherView.classList.remove('hidden');
            candidateView.classList.add('hidden');
            if (audioTranscriptCandidate) audioTranscriptCandidate.classList.add('hidden');
            if (audioTranscriptTeacher) audioTranscriptTeacher.classList.remove('hidden');
            btnTeacher.className = 'px-3.5 py-1.5 text-xs font-semibold rounded bg-primary/10 text-primary inline-flex items-center gap-1.5 transition cursor-pointer';
            btnCandidate.className = 'px-3.5 py-1.5 text-xs font-semibold rounded text-default-500 hover:text-default-800 inline-flex items-center gap-1.5 transition cursor-pointer';
        }
    }
</script>
@endsection

