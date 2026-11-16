@extends('layouts.staff')

@section('title', 'Detail & Kelola Ujian — ' . $exam->title)
@section('page-parent', 'Konten & Ujian')
@section('page-title')
    <div class="flex items-center gap-2 flex-wrap">
        <span>{{ $exam->title }}</span>
        @if($exam->is_simulation)
            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-300">
                <i data-lucide="sparkles" class="size-3 text-amber-600"></i>
                SIMULASI / TRY OUT
            </span>
        @endif
    </div>
@endsection
@section('page-subtitle', 'Kode: ' . $exam->code . ' • Mapel: ' . ($exam->subject->name ?? '-') . ' • Durasi: ' . $exam->duration_minutes . ' Menit • KKM: ' . $exam->passing_grade)

@section('page-actions')
    {{-- 1. Tombol Aksi Utama Sesuai Status Ujian --}}
    @if($exam->status === 'draft')
        @if($validationResult['is_valid'] && $exam->packages->isNotEmpty())
            @if(auth('staff')->user()?->isAdmin())
                <form action="{{ route('staff.exams.approve', $exam) }}" method="POST" class="inline" onsubmit="return confirm('Terbitkan ujian ini sekarang secara langsung?')">
                    @csrf
                    <button type="submit" class="btn btn-sm bg-success hover:bg-success/90 text-white text-xs font-bold rounded inline-flex items-center gap-1.5 shadow-xs transition cursor-pointer">
                        <i data-lucide="check-circle" class="size-4"></i>
                        <span>Terbitkan Langsung</span>
                    </button>
                </form>
            @endif
            <form action="{{ route('staff.exams.request-approval', $exam) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white text-xs font-bold rounded inline-flex items-center gap-1.5 shadow-xs transition cursor-pointer">
                    <i data-lucide="send" class="size-4"></i>
                    <span>Ajukan Persetujuan</span>
                </button>
            </form>
        @endif
        <a href="{{ route('staff.exams.edit', $exam) }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
            <i data-lucide="edit" class="size-4 text-default-500"></i>
            <span>Edit</span>
        </a>
    @elseif($exam->status === 'pending_approval')
        @if(auth('staff')->user()?->isAdmin() || auth('staff')->id() !== $exam->creator_id)
            <form action="{{ route('staff.exams.approve', $exam) }}" method="POST" class="inline" onsubmit="return confirm('Setujui dan terbitkan ujian ini?')">
                @csrf
                <button type="submit" class="btn btn-sm bg-success hover:bg-success/90 text-white text-xs font-bold rounded inline-flex items-center gap-1.5 shadow-xs transition cursor-pointer">
                    <i data-lucide="check-circle" class="size-4"></i>
                    <span>Setujui</span>
                </button>
            </form>

            <button type="button" onclick="document.getElementById('rejectModal').classList.remove('hidden')" class="btn btn-sm bg-danger/10 hover:bg-danger/20 text-danger border border-danger/20 text-xs font-semibold rounded inline-flex items-center gap-1.5 transition cursor-pointer">
                <i data-lucide="x-circle" class="size-4"></i>
                <span>Tolak</span>
            </button>
        @endif
        <a href="{{ route('staff.exams.edit', $exam) }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
            <i data-lucide="edit" class="size-4 text-default-500"></i>
            <span>Edit</span>
        </a>
    @else
        <a href="{{ route('staff.exams.grading.index', $exam) }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
            <i data-lucide="check-square" class="size-4"></i>
            <span>Penilaian &amp; Hasil</span>
        </a>

        <a href="{{ route('staff.graduation.index', ['exam_id' => $exam->id]) }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
            <i data-lucide="award" class="size-4 text-emerald-600"></i>
            <span>Kelulusan Peserta</span>
        </a>
    @endif

    {{-- 2. Dropdown Menu Aksi Terpadu (Mengelompokkan Aksi Sekunder Agar Header Tetap Ramping) --}}
    <div class="relative inline-block text-left" id="examActionsDropdownContainer">
        <button type="button" onclick="toggleExamActionsMenu()" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition cursor-pointer">
            <i data-lucide="more-horizontal" class="size-4 text-default-500"></i>
            <span>Menu Aksi</span>
            <i data-lucide="chevron-down" class="size-3.5 text-default-400"></i>
        </button>

        <div id="examActionsMenu" class="hidden absolute right-0 mt-1.5 w-56 bg-white border border-default-200 rounded-md shadow-lg z-50 py-1 divide-y divide-default-100 text-xs">
            <!-- Grup Evaluasi & Laporan -->
            <div class="py-1">
                <div class="px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-default-400">Hasil &amp; Evaluasi</div>
                <a href="{{ route('staff.exams.grading.index', $exam) }}" class="flex items-center gap-2 px-3 py-1.5 text-default-700 hover:bg-default-50 hover:text-primary transition">
                    <i data-lucide="check-square" class="size-4 text-primary"></i>
                    <span>Penilaian &amp; Hasil</span>
                </a>
                <a href="{{ route('staff.graduation.index', ['exam_id' => $exam->id]) }}" class="flex items-center gap-2 px-3 py-1.5 text-default-700 hover:bg-default-50 hover:text-emerald-600 transition">
                    <i data-lucide="award" class="size-4 text-emerald-600"></i>
                    <span>Kelulusan Peserta</span>
                </a>
                <a href="{{ route('staff.exams.reports.index', $exam) }}" class="flex items-center gap-2 px-3 py-1.5 text-default-700 hover:bg-default-50 hover:text-primary transition">
                    <i data-lucide="bar-chart-2" class="size-4 text-default-500"></i>
                    <span>Grafik &amp; Analitik</span>
                </a>
                <a href="{{ route('staff.exams.remedial', $exam) }}" class="flex items-center gap-2 px-3 py-1.5 text-default-700 hover:bg-default-50 hover:text-warning transition">
                    <i data-lucide="refresh-cw" class="size-4 text-warning"></i>
                    <span>Buat Sesi Remedial</span>
                </a>
            </div>

            <!-- Grup Utilitas & Pengelolaan -->
            <div class="py-1">
                <div class="px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-default-400">Utilitas &amp; Berkas</div>
                @if(in_array($exam->status, ['draft', 'pending_approval']))
                    <a href="{{ route('staff.exams.edit', $exam) }}" class="flex items-center gap-2 px-3 py-1.5 text-default-700 hover:bg-default-50 hover:text-primary transition">
                        <i data-lucide="edit" class="size-4 text-default-500"></i>
                        <span>Edit Pengaturan Ujian</span>
                    </a>
                @endif
                <form action="{{ route('staff.exams.duplicate', $exam) }}" method="POST" class="block w-full">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 w-full text-left px-3 py-1.5 text-default-700 hover:bg-default-50 hover:text-primary transition cursor-pointer">
                        <i data-lucide="copy" class="size-4 text-default-500"></i>
                        <span>Gandakan Ujian</span>
                    </button>
                </form>
                <a href="{{ route('staff.exams.seb-config', $exam) }}" class="flex items-center gap-2 px-3 py-1.5 text-default-700 hover:bg-default-50 hover:text-primary transition" title="Unduh berkas konfigurasi .seb untuk Safe Exam Browser">
                    <i data-lucide="shield" class="size-4 text-default-500"></i>
                    <span>Unduh Konfigurasi SEB</span>
                </a>
            </div>
        </div>
    </div>
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
                        <i data-lucide="check-circle" class="size-5 text-emerald-600 shrink-0 mt-0.5"></i>
                        <div>
                            <strong class="text-emerald-900 block text-xs font-bold">Lolos Uji Integritas Pra-Publikasi</strong>
                            <p class="text-xs text-emerald-700 mt-0.5">Semua parameter validasi (durasi, bank soal, ketersediaan butir, bobot nilai) terpenuhi secara sempurna.</p>
                        </div>
                    </div>
                @else
                    <div class="p-4 bg-rose-50 border border-rose-200 rounded flex items-start gap-3">
                        <i data-lucide="alert-triangle" class="size-5 text-rose-600 shrink-0 mt-0.5"></i>
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
                                    <i data-lucide="check" class="size-3.5"></i>
                                    OK
                                </span>
                            @else
                                <span class="text-rose-600 font-bold flex items-center gap-1">
                                    <i data-lucide="x" class="size-3.5"></i>
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
                            <button type="submit" class="btn btn-sm w-full h-10 bg-primary hover:bg-primary-hover text-white font-semibold text-xs rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition">
                                <i data-lucide="plus" class="size-4"></i>
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
                                            <button type="submit" class="btn btn-icon size-7 text-default-400 hover:text-rose-600 hover:bg-rose-50 rounded transition" title="Hapus Aturan">
                                                <i data-lucide="trash-2" class="size-4"></i>
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
                            <button type="submit" class="btn btn-sm w-full h-10 bg-purple-700 hover:bg-purple-800 text-white font-semibold text-xs rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition">
                                <i data-lucide="refresh-cw" class="size-4"></i>
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
                                <button type="button" onclick="togglePackageQuestions('{{ $pkg->id }}')" class="btn btn-icon size-7 bg-default-100 hover:bg-default-200 text-default-600 rounded-lg text-xs inline-flex items-center justify-center transition cursor-pointer" title="Lihat Daftar Butir Soal">
                                    <i data-lucide="chevron-down" class="size-4"></i>
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
<div id="rejectModal" class="fixed inset-0 z-50 flex items-center justify-center bg-default-900/50 backdrop-blur-xs hidden p-3 sm:p-4">
    <div class="card max-w-md w-full max-h-[90vh] flex flex-col p-5 sm:p-6 shadow-2xl space-y-4 animate-in fade-in zoom-in-95 duration-150 overflow-y-auto">
        <div class="flex items-center justify-between border-b border-default-100 pb-3">
            <h3 class="text-sm font-bold text-default-800">Tolak Permohonan Penerbitan</h3>
            <button type="button" onclick="document.getElementById('rejectModal').classList.add('hidden')" class="btn btn-icon size-7 rounded text-default-400 hover:text-default-600 hover:bg-default-100 transition cursor-pointer">
                <i data-lucide="x" class="size-4"></i>
            </button>
        </div>
        <p class="text-xs text-default-500 leading-relaxed">Berikan catatan atau instruksi perbaikan yang harus diselesaikan oleh pembuat ujian.</p>
        <form action="{{ route('staff.exams.reject', $exam) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <textarea name="reason" rows="3" placeholder="Alasan penolakan / catatan perbaikan..." class="form-textarea w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500" required></textarea>
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-1 border-t border-default-100">
                <button type="button" onclick="document.getElementById('rejectModal').classList.add('hidden')" class="btn btn-sm w-full sm:w-auto px-4 py-2 bg-default-100 hover:bg-default-200 text-default-700 text-xs font-medium rounded transition">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm w-full sm:w-auto px-4 py-2 bg-danger hover:bg-danger/90 text-white text-xs font-bold rounded shadow-xs transition">
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

    function toggleExamActionsMenu() {
        const menu = document.getElementById('examActionsMenu');
        if (menu) {
            menu.classList.toggle('hidden');
            if (window.lucide && window.lucide.createIcons) window.lucide.createIcons();
        }
    }

    document.addEventListener('click', function(e) {
        const container = document.getElementById('examActionsDropdownContainer');
        const menu = document.getElementById('examActionsMenu');
        if (container && menu && !container.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
</script>
@endsection
