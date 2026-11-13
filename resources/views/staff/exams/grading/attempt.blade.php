@extends('layouts.staff')

@section('title', 'Periksa Lembar Jawaban — ' . $attempt->student->name)
@section('page-parent', 'Penilaian')
@section('page-title', 'Lembar Jawaban #' . $attempt->id)

@section('content')
<div class="space-y-6 w-full">

    <!-- Student Attempt Summary Card -->
    <div class="bg-slate-900 text-white rounded-md p-6 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <div class="flex items-center gap-2 flex-wrap mb-1">
                <span class="px-2.5 py-1 bg-primary text-white text-xs font-bold rounded uppercase shadow-xs">
                    Attempt #{{ $attempt->attempt_number }}
                </span>
                <span class="text-xs text-default-400">Resi: <strong class="text-emerald-400 font-mono">{{ $attempt->submission_receipt ?? '-' }}</strong></span>
            </div>
            <h2 class="text-2xl font-bold">{{ $attempt->student->name }}</h2>
            <p class="text-xs text-default-400 mt-1">
                NISN: <span class="text-slate-200 font-mono">{{ $attempt->student->nisn ?? $attempt->student->username }}</span> |
                Waktu Selesai: <span class="text-slate-200">{{ $attempt->submitted_at ? $attempt->submitted_at->format('d/m/Y H:i:s') : '-' }}</span>
            </p>
        </div>

        <div class="flex items-center gap-4 text-center">
            <div class="bg-slate-800 border border-slate-700 px-4 py-2 rounded">
                <span class="block text-[10px] text-default-400 uppercase tracking-wider">Total Skor</span>
                <span class="font-mono text-xl font-black text-white">{{ number_format($attempt->total_score ?? 0, 1) }}</span>
            </div>
            <div class="bg-slate-800 border border-slate-700 px-4 py-2 rounded">
                <span class="block text-[10px] text-default-400 uppercase tracking-wider">Persentase</span>
                <span class="font-mono text-xl font-black text-emerald-400">{{ number_format($attempt->latestGrade->percentage ?? 0, 1) }}%</span>
            </div>
        </div>
    </div>

    <!-- Questions Breakdown & Essay Marking -->
    <div class="space-y-4">
        @foreach($attempt->package->packageQuestions->sortBy('order_position') as $idx => $pq)
            @php
                $q = $pq->question;
                $ans = $answersMap->get($pq->id);
                $payload = $ans ? $ans->answer_payload : null;
            @endphp
            <x-cbt.card>
                <div class="space-y-4 text-xs">
                    <!-- Question Header Meta -->
                    <div class="flex items-center justify-between pb-3 border-b border-default-100">
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-1 bg-slate-900 text-white font-bold rounded-lg">
                                Soal #{{ $idx + 1 }}
                            </span>
                            <span class="px-2 py-0.5 bg-default-100 text-default-600 rounded uppercase font-mono">
                                {{ $q->type }}
                            </span>
                            <span class="text-default-400">Bobot: {{ number_format($q->weight, 1) }} Poin</span>
                        </div>
                        <div>
                            <span class="px-2.5 py-1 rounded-lg font-bold font-mono text-sm {{ ($ans?->score ?? 0) > 0 ? 'bg-emerald-100 text-emerald-800' : 'bg-default-100 text-default-700' }}">
                                Skor: {{ number_format($ans?->score ?? 0, 1) }} / {{ number_format($q->weight, 1) }}
                            </span>
                        </div>
                    </div>

                    <!-- Question Content -->
                    <div class="text-sm text-default-900 font-medium leading-relaxed">
                        {!! $q->content !!}
                    </div>

                    <!-- Options / Answer Display -->
                    @if(in_array($q->type, ['single_choice', 'true_false']))
                        <div class="space-y-2 pt-2 border-t border-default-100">
                            @foreach($q->options as $opt)
                                @php
                                    $isSelected = ((string)($payload['selected_option'] ?? '') === (string)$opt->id || (string)($payload['selected_option'] ?? '') === (string)$opt->option_key);
                                    $isCorrectKey = $opt->is_correct;
                                @endphp
                                <div class="p-2.5 rounded border text-xs flex items-center justify-between {{ $isSelected && $isCorrectKey ? 'bg-emerald-50 border-emerald-300 text-emerald-900' : ($isSelected && !$isCorrectKey ? 'bg-rose-50 border-rose-300 text-rose-900' : ($isCorrectKey ? 'bg-default-100 border-default-200 font-semibold text-default-800' : 'bg-white border-default-200 text-default-600')) }}">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold font-mono">{{ $opt->option_key }}.</span>
                                        <span>{{ strip_tags($opt->content) }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        @if($isSelected)
                                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold {{ $isCorrectKey ? 'bg-emerald-600 text-white' : 'bg-rose-600 text-white' }}">
                                                Jawaban Peserta
                                            </span>
                                        @endif
                                        @if($isCorrectKey)
                                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold bg-slate-800 text-white">
                                                Kunci Benar
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @elseif($q->type === 'essay')
                        <!-- Essay Response & Rubric-guided Manual Grading Form -->
                        <div class="p-4 bg-default-50 border border-default-200 rounded space-y-3">
                            <div>
                                <span class="text-xs font-bold text-default-600 block mb-1">Jawaban Siswa:</span>
                                <div class="p-3 bg-white border border-default-200 rounded-lg text-sm text-default-800 min-h-[60px] whitespace-pre-wrap">
                                    {{ $payload['text_answer'] ?? ($payload['essay_answer'] ?? 'Peserta tidak memberikan jawaban tertulis.') }}
                                </div>
                            </div>

                            <!-- Rubric Reference Checklist -->
                            <div class="p-3 bg-white border border-default-200 rounded-lg text-xs space-y-1.5">
                                <span class="font-bold text-default-700 block">Panduan Rubrik Penilaian:</span>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-[11px] text-default-600">
                                    <div class="p-2 bg-default-50 rounded border border-default-100">
                                        <strong>1. Relevansi Konsep (40%):</strong> Ketepatan pemahaman teori & substansi.
                                    </div>
                                    <div class="p-2 bg-default-50 rounded border border-default-100">
                                        <strong>2. Analisis & Argumen (40%):</strong> Kejelasan nalar & pembuktian logis.
                                    </div>
                                    <div class="p-2 bg-default-50 rounded border border-default-100">
                                        <strong>3. Sistematika (20%):</strong> Tata bahasa, kerapian struktur tulisan.
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('staff.exams.grading.essay', [$exam, $attempt, $pq]) }}" method="POST" class="pt-2 border-t border-default-200 space-y-3">
                                @csrf
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Beri Skor Angka (Maks: {{ $q->weight }})</label>
                                        <input type="number" step="0.1" min="0" max="{{ $q->weight }}" name="score" value="{{ $ans?->score ?? 0 }}" required class="form-input w-full h-10 px-3 py-2 border-default-200 rounded text-xs font-mono font-bold focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Umpan Balik Koreksi (Feedback)</label>
                                        <input type="text" name="feedback" value="{{ $ans?->feedback }}" placeholder="Contoh: Analisis sudah tepat, kurang penjelasan detail..." class="form-input w-full h-10 px-3 py-2 border-default-200 rounded text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition w-full sm:w-auto">
                                        Simpan Nilai Esai
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </x-cbt.card>
        @endforeach
    </div>

    <!-- Moderasi Nilai Lembar Jawaban -->
    <x-cbt.card title="Panel Moderasi Nilai & Penyesuaian Skor (Grading Moderator)">
        <p class="text-xs text-default-500 mb-4">
            Moderator Nilai dapat melakukan kalibrasi dan penyesuaian skor akhir peserta dengan mencantumkan pertimbangan tertulis secara transparan.
        </p>

        <form action="{{ route('staff.exams.grading.moderate', [$exam, $attempt]) }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-default-700 mb-1">Skor Akhir Hasil Moderasi (0-100) *</label>
                    <input type="number" step="0.1" min="0" max="100" name="moderated_score" value="{{ $attempt->total_score ?? 0 }}" required class="w-full px-3 py-2 border rounded text-xs font-bold font-mono focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-default-700 mb-1">Catatan Alasan Moderasi *</label>
                    <input type="text" name="moderation_notes" placeholder="Contoh: Penyesuaian rubrik butir soal nomor 5 berdasarkan diskusi panel korektor..." required class="w-full px-3 py-2 border rounded text-xs focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>
            </div>

            <div class="flex justify-end pt-2 border-t border-default-100">
                <button type="submit" class="btn btn-sm bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-xs rounded shadow-xs transition w-full sm:w-auto">
                    Simpan Hasil Moderasi Nilai
                </button>
            </div>
        </form>
    </x-cbt.card>
</div>
@endsection

