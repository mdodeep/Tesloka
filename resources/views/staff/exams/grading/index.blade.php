@extends('layouts.staff')

@section('title', 'Penilaian & Hasil Ujian — ' . $exam->title)
@section('page-parent', 'Konten & Ujian')
@section('page-title', 'Penilaian & Pemeringkatan')

@section('content')
<div class="space-y-6 w-full">

    <!-- Top Action Banner -->
    <div class="bg-slate-900 text-white rounded-md p-6 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <div class="flex items-center gap-2 flex-wrap mb-1">
                <span class="px-2.5 py-1 bg-primary text-white text-xs font-bold rounded uppercase shadow-xs">
                    {{ $exam->exam_type }}
                </span>
                <span class="text-xs text-default-400">Kode: <strong class="text-white">{{ $exam->code }}</strong></span>
                <span class="text-xs text-default-400">KKM: <strong class="text-emerald-400">{{ $exam->passing_grade ?? 75 }}</strong></span>
            </div>
            <h2 class="text-2xl font-bold">{{ $exam->title }}</h2>
            <p class="text-xs text-default-400 mt-1">
                Mata Pelajaran: <span class="text-slate-200">{{ $exam->subject->name ?? '-' }}</span> |
                Status Publikasi Nilai:
                @if($exam->show_result_on_finish)
                    <span class="text-emerald-400 font-bold">Terpublikasi ke Siswa</span>
                @else
                    <span class="text-amber-400 font-bold">Draft / Belum Dipublikasikan</span>
                @endif
            </p>
        </div>

        <div class="flex items-center gap-2 flex-wrap">
            <form action="{{ route('staff.exams.grading.recalculate', $exam) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="btn btn-sm bg-slate-800 hover:bg-slate-700 text-white font-semibold transition inline-flex items-center gap-1.5 border border-slate-700">
                    <i data-lucide="refresh-cw" class="size-4 text-primary-400"></i>
                    <span>Hitung Ulang Nilai</span>
                </button>
            </form>

            <button type="button" onclick="openRegradeModal()" class="btn btn-sm bg-amber-600 hover:bg-amber-500 text-white font-semibold transition inline-flex items-center gap-1.5 shadow-xs">
                <i data-lucide="edit-3" class="size-4"></i>
                <span>Regrade Kunci Soal</span>
            </button>

            <form action="{{ route('staff.exams.grading.approve', $exam) }}" method="POST" class="inline" onsubmit="return confirm('Setujui seluruh nilai akhir ujian ini secara resmi?')">
                @csrf
                <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold transition inline-flex items-center gap-1.5 shadow-xs" title="Persetujuan Nilai Akhir">
                    <i data-lucide="shield-check" class="size-4"></i>
                    <span>Setujui Nilai (Approval)</span>
                </button>
            </form>

            @if(!$exam->show_result_on_finish)
                <form action="{{ route('staff.exams.grading.publish', $exam) }}" method="POST" class="inline" onsubmit="return confirm('Publikasikan nilai ujian kepada seluruh peserta?')">
                    @csrf
                    <button type="submit" class="btn btn-sm bg-emerald-600 hover:bg-emerald-500 text-white font-semibold transition inline-flex items-center gap-1.5 shadow-xs">
                        <i data-lucide="check-circle" class="size-4"></i>
                        <span>Publikasikan Nilai</span>
                    </button>
                </form>
            @endif
        </div>
    </div>

    <!-- Statistical Metrics Overview -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
        <div class="bg-white border border-default-200 rounded p-4 shadow-sm text-center">
            <span class="block text-2xl font-black text-default-800">{{ $stats['total_participants'] }}</span>
            <span class="text-xs text-default-500 font-medium">Total Peserta</span>
        </div>
        <div class="bg-white border border-emerald-200 rounded p-4 shadow-sm text-center">
            <span class="block text-2xl font-black text-emerald-600">{{ number_format($stats['highest_score'], 1) }}</span>
            <span class="text-xs text-emerald-700 font-medium">Skor Tertinggi</span>
        </div>
        <div class="bg-white border border-rose-200 rounded p-4 shadow-sm text-center">
            <span class="block text-2xl font-black text-rose-600">{{ number_format($stats['lowest_score'], 1) }}</span>
            <span class="text-xs text-rose-700 font-medium">Skor Terendah</span>
        </div>
        <div class="bg-white border border-blue-200 rounded p-4 shadow-sm text-center">
            <span class="block text-2xl font-black text-blue-600">{{ number_format($stats['average_score'], 1) }}</span>
            <span class="text-xs text-blue-700 font-medium">Nilai Rata-rata</span>
        </div>
        <div class="bg-white border border-emerald-200 rounded p-4 shadow-sm text-center">
            <span class="block text-2xl font-black text-emerald-600">{{ $stats['passed_count'] }}</span>
            <span class="text-xs text-emerald-700 font-medium">Tuntas KKM</span>
        </div>
        <div class="bg-white border border-amber-200 rounded p-4 shadow-sm text-center">
            <span class="block text-2xl font-black text-amber-600">{{ $stats['pass_percentage'] }}%</span>
            <span class="text-xs text-amber-700 font-medium">Persentase Lulus</span>
        </div>
    </div>

    <!-- Results Table with Ranking -->
    <x-cbt.card title="Rekapitulasi Nilai & Pemeringkatan Peserta (Ranking)">
        <div class="overflow-x-auto -mx-3.5 sm:mx-0">
            <table class="w-full min-w-[760px] text-left text-xs border-collapse">
                <thead>
                    <tr class="border-b border-default-200 bg-default-50 text-default-600 font-semibold uppercase tracking-wider">
                        <th class="py-3 px-4 text-center w-12 whitespace-nowrap">Peringkat</th>
                        <th class="py-3 px-4 whitespace-nowrap">Nama Peserta</th>
                        <th class="py-3 px-4 whitespace-nowrap">NISN / Username</th>
                        <th class="py-3 px-4 text-center whitespace-nowrap">Skor Perolehan</th>
                        <th class="py-3 px-4 text-center whitespace-nowrap">Persentase</th>
                        <th class="py-3 px-4 text-center whitespace-nowrap">Predikat</th>
                        <th class="py-3 px-4 text-center whitespace-nowrap">Kelulusan KKM</th>
                        <th class="py-3 px-4 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($results as $rank => $res)
                        <tr class="hover:bg-default-50/80 transition">
                            <td class="py-3 px-4 text-center font-bold text-default-700 whitespace-nowrap">
                                @if($rank === 0)
                                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-amber-100 text-amber-800 font-black">1</span>
                                @elseif($rank === 1)
                                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-slate-200 text-default-800 font-black">2</span>
                                @elseif($rank === 2)
                                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-amber-700/20 text-amber-900 font-black">3</span>
                                @else
                                    {{ $rank + 1 }}
                                @endif
                            </td>
                            <td class="py-3 px-4 font-bold text-default-900 whitespace-nowrap">
                                {{ $res->student->name }}
                            </td>
                            <td class="py-3 px-4 font-mono text-default-500 whitespace-nowrap">
                                {{ $res->student->nisn ?? $res->student->username }}
                            </td>
                            <td class="py-3 px-4 text-center font-mono font-bold text-default-800 text-sm whitespace-nowrap">
                                {{ number_format($res->total_score, 1) }} / {{ number_format($res->max_score, 1) }}
                            </td>
                            <td class="py-3 px-4 text-center font-bold whitespace-nowrap">
                                {{ number_format($res->percentage, 1) }}%
                            </td>
                            <td class="py-3 px-4 text-center whitespace-nowrap">
                                <span class="px-2 py-0.5 rounded font-black font-mono {{ $res->final_grade_letter === 'A' ? 'bg-emerald-100 text-emerald-800' : ($res->final_grade_letter === 'B' ? 'bg-blue-100 text-blue-800' : 'bg-default-100 text-default-700') }}">
                                    {{ $res->final_grade_letter ?? '-' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center whitespace-nowrap">
                                @if($res->is_passed)
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">
                                        TUNTAS
                                    </span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-100 text-rose-800">
                                        REMEDIAL
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right whitespace-nowrap">
                                <a href="{{ route('staff.exams.grading.attempt', [$exam, $res->exam_attempt_id]) }}" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold inline-flex items-center gap-1.5 shadow-2xs">
                                    <i data-lucide="eye" class="size-3.5"></i>
                                    <span>Periksa & Koreksi</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-8 text-default-400">
                                Belum ada peserta yang mengumpulkan atau dinilai pada ujian ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-cbt.card>

    <!-- Regrade History Table -->
    @if($regradeLogs->isNotEmpty())
        <x-cbt.card title="Riwayat Checkpoint Regrade (Penilaian Ulang)">
            <div class="space-y-3">
                @foreach($regradeLogs as $log)
                    <div class="p-4 border border-default-200 rounded bg-default-50 text-xs space-y-2">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="font-bold text-default-800">Butir Soal: {{ $log->targetQuestion->code ?? '-' }}</span>
                                <span class="text-default-500 ml-2">Diajukan oleh: {{ $log->requestedBy->name ?? 'Staff' }}</span>
                            </div>
                            <span class="text-default-400 font-mono">{{ $log->completed_at ? $log->completed_at->format('d/m/Y H:i') : '-' }}</span>
                        </div>
                        <p class="text-default-700"><strong>Alasan:</strong> {{ $log->regrade_reason }}</p>
                        @if($log->before_summary)
                            <div class="p-2 bg-white rounded border border-default-200 text-[11px] text-default-600 flex gap-4">
                                <span>Peserta Terdampak: <strong>{{ $log->before_summary['affected_count'] ?? 0 }}</strong></span>
                                <span class="text-emerald-600">Nilai Naik: <strong>{{ $log->before_summary['increased_count'] ?? 0 }}</strong></span>
                                <span class="text-rose-600">Nilai Turun: <strong>{{ $log->before_summary['decreased_count'] ?? 0 }}</strong></span>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </x-cbt.card>
    @endif
</div>

<!-- Modal Regrade Kunci Soal -->
<div id="modal-regrade" class="hidden fixed inset-0 z-50 bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4">
    <div class="card max-w-xl w-full p-4 sm:p-6 space-y-4 shadow-2xl max-h-[90vh] flex flex-col">
        <div class="flex items-center justify-between border-b border-default-200 pb-3 shrink-0">
            <h3 class="font-bold text-default-900 text-base">Alur Regrade Penilaian Ulang (Koreksi Kunci)</h3>
            <button type="button" onclick="closeRegradeModal()" class="btn btn-sm btn-icon bg-default-100 hover:bg-default-200 text-default-500 rounded-md transition cursor-pointer">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>

        <form id="form-regrade" action="{{ route('staff.exams.grading.regrade.execute', $exam) }}" method="POST" class="space-y-4 overflow-y-auto pr-1">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Pilih Butir Soal yang Akan Dikoreksi</label>
                <select name="question_id" id="regrade-question-id" required onchange="loadQuestionOptionsForRegrade(this.value)" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="">-- Pilih Butir Soal --</option>
                    @foreach($exam->packages->first()?->packageQuestions ?? [] as $pq)
                        <option value="{{ $pq->question->id }}">{{ $pq->question->code }} - {{ Str::limit(strip_tags($pq->question->content), 60) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Pilih Kunci Jawaban Benar yang Baru</label>
                <select name="new_correct_option_id" id="regrade-option-id" required class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="">-- Pilih Opsi Benar --</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Alasan Koreksi / Dasar Keputusan (Wajib)</label>
                <textarea name="reason" rows="2" required placeholder="Contoh: Terjadi kesalahan penetapan kunci awal pada opsi A seharusnya B..." class="form-textarea w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary"></textarea>
            </div>

            <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-between gap-2.5 pt-3 border-t border-default-100 shrink-0">
                <button type="button" onclick="previewRegradeImpact()" class="btn btn-sm bg-default-100 hover:bg-slate-200 text-default-700 rounded text-xs font-semibold transition cursor-pointer text-center justify-center">
                    Pratinjau Dampak Simulasi
                </button>
                <div class="flex flex-col-reverse sm:flex-row gap-2">
                    <button type="button" onclick="closeRegradeModal()" class="btn btn-sm border border-default-200 rounded text-xs font-semibold text-default-700 hover:bg-default-50 cursor-pointer text-center justify-center">Batal</button>
                    <button type="submit" class="btn btn-sm bg-amber-600 hover:bg-amber-700 text-white rounded text-xs font-semibold shadow-xs transition cursor-pointer text-center justify-center">Eksekusi Regrade</button>
                </div>
            </div>

            <div id="regrade-preview-box" class="hidden p-3 bg-default-50 border border-default-200 rounded text-xs space-y-1">
                <strong class="text-default-800 block">Hasil Simulasi Dampak:</strong>
                <p id="regrade-preview-text" class="text-default-600"></p>
            </div>
        </form>
    </div>
</div>

<script>
    const examQuestions = {
        @foreach($exam->packages->first()?->packageQuestions ?? [] as $pq)
            "{{ $pq->question->id }}": [
                @foreach($pq->question->options ?? [] as $opt)
                    { id: {{ $opt->id }}, label: "{{ $opt->option_key }}. {{ addslashes(Str::limit(strip_tags($opt->content), 40)) }}" },
                @endforeach
            ],
        @endforeach
    };

    function openRegradeModal() { document.getElementById('modal-regrade').classList.remove('hidden'); }
    function closeRegradeModal() { document.getElementById('modal-regrade').classList.add('hidden'); }

    function loadQuestionOptionsForRegrade(qId) {
        const select = document.getElementById('regrade-option-id');
        select.innerHTML = '<option value="">-- Pilih Opsi Benar --</option>';
        if (!qId || !examQuestions[qId]) return;

        examQuestions[qId].forEach(opt => {
            const o = document.createElement('option');
            o.value = opt.id;
            o.textContent = opt.label;
            select.appendChild(o);
        });
    }

    function previewRegradeImpact() {
        const qId = document.getElementById('regrade-question-id').value;
        const optId = document.getElementById('regrade-option-id').value;
        if (!qId || !optId) {
            alert('Pilih butir soal dan opsi baru terlebih dahulu.');
            return;
        }

        fetch("{{ route('staff.exams.grading.regrade.preview', $exam) }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ question_id: qId, new_correct_option_id: optId })
        })
        .then(r => r.json())
        .then(data => {
            const p = data.preview;
            const box = document.getElementById('regrade-preview-box');
            const txt = document.getElementById('regrade-preview-text');
            box.classList.remove('hidden');
            txt.innerHTML = `Total ${p.total_attempts} peserta: <strong>${p.affected_count} peserta terdampak</strong> (${p.increased_count} naik, ${p.decreased_count} turun, ${p.unchanged_count} tetap).`;
        })
        .catch(err => alert('Gagal memuat pratinjau simulasi.'));
    }
</script>
@endsection

