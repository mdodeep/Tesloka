@extends('layouts.staff')

@section('title', 'Detail & Kelola Ujian — ' . $exam->title)
@section('page-parent', 'Konten & Ujian')
@section('page-title', $exam->title)
@section('page-subtitle', 'Kode: ' . $exam->code . ' • Mapel: ' . ($exam->subject->name ?? '-') . ' • Durasi: ' . $exam->duration_minutes . ' Menit • KKM: ' . $exam->passing_grade)

@section('page-actions')
    <a href="{{ route('staff.exams.grading.index', $exam) }}" class="px-3.5 py-2 bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
        <span>Penilaian &amp; Hasil</span>
    </a>

    <a href="{{ route('staff.exams.reports.index', $exam) }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="size-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        <span>Grafik &amp; Analitik</span>
    </a>

    <a href="{{ route('staff.graduation.index', ['exam_id' => $exam->id]) }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="size-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <span>Kelulusan Peserta</span>
    </a>

    @if(in_array($exam->status, ['draft', 'pending_approval']))
        <a href="{{ route('staff.exams.edit', $exam) }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
            <svg class="size-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            <span>Edit</span>
        </a>
    @endif

    <form action="{{ route('staff.exams.duplicate', $exam) }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition cursor-pointer">
            <svg class="size-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
            <span>Gandakan</span>
        </button>
    </form>

    <a href="{{ route('staff.exams.seb-config', $exam) }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition" title="Unduh berkas konfigurasi .seb untuk Safe Exam Browser">
        <svg class="size-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
        <span>Unduh SEB</span>
    </a>

    @if($exam->status === 'draft')
        @if($validationResult['is_valid'] && $exam->packages->isNotEmpty())
            <form action="{{ route('staff.exams.request-approval', $exam) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="px-3.5 py-2 bg-primary hover:bg-primary-hover text-white text-xs font-bold rounded inline-flex items-center gap-1.5 shadow-xs transition cursor-pointer">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    <span>Ajukan Persetujuan</span>
                </button>
            </form>
        @endif
    @endif

    @if($exam->status === 'pending_approval' && auth('staff')->id() !== $exam->creator_id)
        <form action="{{ route('staff.exams.approve', $exam) }}" method="POST" class="inline" onsubmit="return confirm('Setujui dan terbitkan ujian ini?')">
            @csrf
            <button type="submit" class="px-3.5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded inline-flex items-center gap-1.5 shadow-xs transition cursor-pointer">
                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Setujui</span>
            </button>
        </form>

        <button type="button" onclick="document.getElementById('rejectModal').classList.remove('hidden')" class="px-3.5 py-2 bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-semibold rounded inline-flex items-center gap-1.5 border border-rose-200 transition cursor-pointer">
            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>Tolak</span>
        </button>
    @endif
@endsection

@section('content')
<div class="space-y-6 w-full">

    <!-- Pipeline Lifecycle Stepper -->
    <div class="bg-white border border-default-200 rounded-md p-4 shadow-2xs">
        <div class="grid grid-cols-2 md:grid-cols-6 gap-3 text-center text-xs">
            <div class="p-2.5 rounded bg-primary/10 text-primary font-semibold border border-primary/20">
                1. Draf Konfigurasi
            </div>
            <div class="p-2.5 rounded {{ $exam->blueprints->isNotEmpty() ? 'bg-primary/10 text-primary font-semibold border border-primary/20' : 'bg-default-50 text-default-400' }}">
                2. Blueprint Kisi-Kisi
            </div>
            <div class="p-2.5 rounded {{ $exam->packages->isNotEmpty() ? 'bg-primary/10 text-primary font-semibold border border-primary/20' : 'bg-default-50 text-default-400' }}">
                3. Pembentukan Paket
            </div>
            <div class="p-2.5 rounded {{ $validationResult['is_valid'] ? 'bg-emerald-50 text-emerald-700 font-semibold border border-emerald-200' : 'bg-rose-50 text-rose-700 border border-rose-200' }}">
                4. Validasi Pra-Publikasi
            </div>
            <div class="p-2.5 rounded {{ in_array($exam->status, ['pending_approval', 'ready', 'scheduled', 'active']) ? 'bg-primary/10 text-primary font-semibold border border-primary/20' : 'bg-default-50 text-default-400' }}">
                5. Four-Eyes Approval
            </div>
            <div class="p-2.5 rounded {{ in_array($exam->status, ['ready', 'scheduled', 'active']) ? 'bg-emerald-600 text-white font-bold' : 'bg-default-50 text-default-400' }}">
                6. Ujian Siap / Terbit
            </div>
        </div>
    </div>

    <!-- Pre-Publish Scorecard -->
    <x-cbt.card title="Scorecard Kesiapan & Validasi Pra-Publikasi">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h4 class="text-xs font-bold text-default-500 uppercase tracking-wide mb-3">Status Kesiapan:</h4>
                @if($validationResult['is_valid'])
                    <div class="p-4 bg-emerald-50 border border-emerald-200 rounded flex items-start gap-3">
                        <svg class="size-5 text-emerald-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <div>
                            <strong class="text-emerald-900 block text-xs font-bold">Lolos Uji Integritas Pra-Publikasi</strong>
                            <p class="text-xs text-emerald-700 mt-0.5">Semua parameter validasi (durasi, bank soal, ketersediaan butir, bobot nilai) terpenuhi secara sempurna.</p>
                        </div>
                    </div>
                @else
                    <div class="p-4 bg-rose-50 border border-rose-200 rounded flex items-start gap-3">
                        <svg class="size-5 text-rose-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        <div>
                            <strong class="text-rose-900 block text-xs font-bold">Prasyarat Belum Lengkap</strong>
                            <p class="text-xs text-rose-700 mt-0.5">Terdapat {{ count($validationResult['critical_errors'] ?? $validationResult['errors'] ?? []) }} kekurangan prasyarat yang wajib diperbaiki sebelum diajukan persetujuan.</p>
                        </div>
                    </div>
                @endif
            </div>

            <div>
                <h4 class="text-xs font-bold text-default-500 uppercase tracking-wide mb-3">Rincian Checklist:</h4>
                <div class="space-y-1.5 text-xs">
                    @foreach($validationResult['checklist'] ?? [] as $item)
                        <div class="flex items-center justify-between p-2 rounded-lg {{ $item['passed'] ? 'bg-default-50' : 'bg-rose-50/50' }}">
                            <span class="text-default-700">{{ $item['label'] }}</span>
                            @if($item['passed'])
                                <span class="text-emerald-600 font-bold flex items-center gap-1">
                                    <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    OK
                                </span>
                            @else
                                <span class="text-rose-600 font-bold flex items-center gap-1">
                                    <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    Kurang
                                </span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-cbt.card>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Widget 1: Cetak Biru (Blueprint) Kisi-Kisi Soal -->
        <x-cbt.card title="Cetak Biru (Blueprint) Kisi-Kisi Soal">
            <p class="text-xs text-default-500 mb-4">Tentukan distribusi jumlah butir soal yang ditarik dari bank soal terkait.</p>

            @if(in_array($exam->status, ['draft', 'pending_approval']))
                <form action="{{ route('staff.exams.blueprints.store', $exam) }}" method="POST" class="p-3.5 bg-default-50/80 border border-default-200 rounded mb-4 space-y-3">
                    @csrf
                    <div class="text-[11px] font-bold text-default-700 uppercase tracking-wider">Tambah Aturan Blueprint:</div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[11px] font-bold text-default-600 uppercase tracking-wider mb-1.5">Pilih Bank Soal *</label>
                            <select name="question_bank_id" class="form-select w-full text-xs h-10 rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                                <option value="">-- Pilih Bank Soal --</option>
                                @foreach($questionBanks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->name }} ({{ $bank->code }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-default-600 uppercase tracking-wider mb-1.5">Target Jumlah Butir *</label>
                            <input type="number" min="1" max="100" name="total_questions" value="10" class="form-input w-full text-xs h-10 rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-default-600 uppercase tracking-wider mb-1.5">Filter Kesulitan</label>
                            <select name="difficulty" class="form-select w-full text-xs h-10 rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <option value="">Semua Tingkat Kesulitan</option>
                                <option value="easy">Hanya Mudah</option>
                                <option value="medium">Hanya Sedang</option>
                                <option value="hard">Hanya Sukar</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="w-full h-10 bg-primary hover:bg-primary-hover text-white font-semibold text-xs rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition">
                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                Tambah Aturan
                            </button>
                        </div>
                    </div>
                </form>
            @endif

            <div class="overflow-x-auto -mx-3.5 sm:mx-0">
                <table class="w-full min-w-[700px] text-left text-xs text-default-600">
                    <thead class="bg-default-50 font-semibold text-default-500 border-b border-default-200 uppercase text-[11px]">
                        <tr>
                            <th class="py-2.5 px-3 whitespace-nowrap">Bank Soal</th>
                            <th class="py-2.5 px-3 text-center whitespace-nowrap">Jumlah</th>
                            <th class="py-2.5 px-3 text-center whitespace-nowrap">Tingkat</th>
                            <th class="py-2.5 px-3 text-right whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($exam->blueprints as $bp)
                            <tr class="hover:bg-default-50/80 transition-colors">
                                <td class="py-2.5 px-3 whitespace-nowrap">
                                    <strong class="text-default-800 block text-xs font-semibold">{{ $bp->questionBank->name ?? '-' }}</strong>
                                    <span class="text-[11px] text-default-400 font-mono">{{ $bp->questionBank->code ?? '-' }}</span>
                                </td>
                                <td class="py-2.5 px-3 text-center font-bold text-default-800 whitespace-nowrap">
                                    {{ $bp->total_questions }}
                                </td>
                                <td class="py-2.5 px-3 text-center whitespace-nowrap">
                                    <span class="px-2 py-0.5 bg-default-100 text-default-700 rounded-full text-[10px] uppercase font-semibold">
                                        {{ $bp->difficulty ?: 'Semua' }}
                                    </span>
                                </td>
                                <td class="py-2.5 px-3 text-right whitespace-nowrap">
                                    @if(in_array($exam->status, ['draft', 'pending_approval']))
                                        <form action="{{ route('staff.exams.blueprints.destroy', $bp) }}" method="POST" class="inline" onsubmit="return confirm('Hapus aturan blueprint ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-default-400 hover:text-rose-600 hover:bg-rose-50 p-1.5 rounded-lg transition" title="Hapus Aturan">
                                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-default-400 text-[11px]">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-default-400">
                                    Belum ada aturan cetak biru kisi-kisi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-cbt.card>

        <!-- Widget 2: Varian Paket Soal Snapshot Terisolasi -->
        <x-cbt.card title="Paket Soal Snapshot Terisolasi">
            <p class="text-xs text-default-500 mb-4">Setiap paket menyimpan snapshot butir soal permanen yang tidak terpengaruh perubahan di bank soal.</p>

            @if(in_array($exam->status, ['draft', 'pending_approval']))
                <form action="{{ route('staff.exams.generate-packages', $exam) }}" method="POST" class="p-3.5 bg-purple-50/70 border border-purple-200/80 rounded mb-4 space-y-3">
                    @csrf
                    <div class="text-[11px] font-bold text-purple-900 uppercase tracking-wider">Generator Paket Soal:</div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 items-end">
                        <div>
                            <label class="block text-[11px] font-bold text-purple-800 uppercase tracking-wider mb-1.5">Jumlah Varian</label>
                            <select name="package_count" class="form-select w-full text-xs h-10 rounded border-purple-200 bg-white shadow-2xs focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500">
                                <option value="1">1 Paket (Paket A)</option>
                                <option value="2">2 Varian (Paket A & B)</option>
                                <option value="3">3 Varian (Paket A, B, C)</option>
                                <option value="4">4 Varian (Paket A, B, C, D)</option>
                            </select>
                        </div>
                        <div class="flex items-center h-10">
                            <label class="flex items-center gap-2 cursor-pointer text-xs font-semibold text-purple-900 select-none">
                                <input type="checkbox" name="shuffle_options" value="1" checked class="form-checkbox size-4 text-purple-600 rounded">
                                Acak Opsi Pilihan
                            </label>
                        </div>
                        <div>
                            <button type="submit" class="w-full h-10 bg-purple-700 hover:bg-purple-800 text-white font-semibold text-xs rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition">
                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                Bentuk Paket Soal
                            </button>
                        </div>
                    </div>
                </form>
            @endif

            <div class="space-y-3">
                @forelse($exam->packages as $pkg)
                    <div class="border border-default-200 rounded p-3.5 bg-white shadow-2xs hover:border-primary/40 transition">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2.5">
                                <span class="size-8 rounded-lg bg-purple-100 text-purple-800 font-bold text-xs flex items-center justify-center">
                                    {{ substr($pkg->name, -1) }}
                                </span>
                                <div>
                                    <strong class="text-xs font-bold text-default-800 block">{{ $pkg->name }}</strong>
                                    <span class="text-[11px] text-default-400 font-mono block">{{ $pkg->package_code }}</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="px-2.5 py-0.5 bg-emerald-50 text-emerald-700 text-[11px] font-bold rounded-full border border-emerald-200/60">
                                    {{ $pkg->total_questions }} Butir Snapshot
                                </span>
                                <button type="button" onclick="togglePackageQuestions('{{ $pkg->id }}')" class="size-7 bg-default-100 hover:bg-slate-200 text-default-600 rounded-lg text-xs inline-flex items-center justify-center transition cursor-pointer" title="Lihat Daftar Butir Soal">
                                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </button>
                            </div>
                        </div>

                        <!-- Collapsible Questions List -->
                        <div id="pkg-questions-{{ $pkg->id }}" class="hidden mt-3 pt-3 border-t border-default-100 space-y-2">
                            <div class="text-[10px] font-bold text-default-400 uppercase tracking-wider">Daftar Soal Teracak (Snapshot):</div>
                            <div class="max-h-60 overflow-y-auto space-y-1.5 pr-1">
                                @foreach($pkg->packageQuestions as $pq)
                                    @php $snap = $pq->question_snapshot; @endphp
                                    <div class="p-2.5 bg-default-50/70 rounded-lg border border-default-100 text-xs flex items-start justify-between gap-2">
                                        <div class="flex-1">
                                            <span class="font-bold text-default-700 mr-1">#{{ $pq->order_position }}.</span>
                                            <span class="text-default-800">{{ Str::limit($snap['content'] ?? '-', 90) }}</span>
                                        </div>
                                        <div class="text-[10px] text-default-500 shrink-0 uppercase font-mono">
                                            {{ $snap['type'] ?? '-' }} &bull; {{ $snap['difficulty'] ?? '-' }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="py-8 text-center text-default-400 border border-dashed border-default-200 rounded bg-default-50/50">
                        Belum ada paket soal yang dibentuk. Silakan tekan tombol "Bentuk Paket Soal".
                    </div>
                @endforelse
            </div>
        </x-cbt.card>
    </div>
</div>

<!-- Modal Tolak Permohonan -->
<div id="rejectModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-xs hidden p-3 sm:p-4">
    <div class="bg-white rounded-lg max-w-md w-full max-h-[90vh] flex flex-col p-5 sm:p-6 shadow-2xl space-y-4 border border-default-200 animate-in fade-in zoom-in-95 duration-150 overflow-y-auto">
        <div class="flex items-center justify-between border-b border-default-100 pb-3">
            <h3 class="text-sm font-bold text-default-800">Tolak Permohonan Penerbitan</h3>
            <button type="button" onclick="document.getElementById('rejectModal').classList.add('hidden')" class="p-1 rounded text-default-400 hover:text-default-600 hover:bg-default-100 transition cursor-pointer">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <p class="text-xs text-default-500 leading-relaxed">Berikan catatan atau instruksi perbaikan yang harus diselesaikan oleh pembuat ujian.</p>
        <form action="{{ route('staff.exams.reject', $exam) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <textarea name="reason" rows="3" placeholder="Alasan penolakan / catatan perbaikan..." class="form-textarea w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500" required></textarea>
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-1 border-t border-default-100">
                <button type="button" onclick="document.getElementById('rejectModal').classList.add('hidden')" class="w-full sm:w-auto px-4 py-2 bg-default-100 hover:bg-slate-200 text-default-700 text-xs font-medium rounded transition">
                    Batal
                </button>
                <button type="submit" class="w-full sm:w-auto px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded shadow-xs transition">
                    Tolak & Kembalikan ke Draf
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePackageQuestions(id) {
        const el = document.getElementById('pkg-questions-' + id);
        el.classList.toggle('hidden');
    }
</script>
@endsection
