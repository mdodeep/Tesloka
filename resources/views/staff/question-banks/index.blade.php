@extends('layouts.staff')

@section('title', 'Bank Soal & Konten — TESLOKA CBT')
@section('page-parent', 'Konten & Ujian')
@section('page-title', 'Bank Soal & Konten')
@section('page-subtitle', 'Kelola bank soal berbasis mata pelajaran/kuliah, stimulus, dan butir soal berbagai format.')

@section('page-actions')
    <button type="button" onclick="document.getElementById('modal-create-bank').classList.remove('hidden')" class="btn btn-sm bg-primary text-white hover:bg-primary-hover shadow-xs inline-flex items-center gap-1.5 cursor-pointer">
        <i data-lucide="plus" class="size-4"></i>
        <span>Buat Bank Soal Baru</span>
    </button>
@endsection

@section('content')
<div class="space-y-6">

    <!-- Quick Stats Grid (Metric Cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="card">
            <div class="card-body flex items-center justify-between">
                <div>
                    <div class="text-xs text-default-400 font-semibold uppercase tracking-wider">Total Bank Soal</div>
                    <div class="text-2xl font-bold text-default-800 mt-1">{{ $stats['total_banks'] ?? $banks->total() }}</div>
                </div>
                <div class="size-11 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0">
                    <i data-lucide="layers" class="size-5.5"></i>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body flex items-center justify-between">
                <div>
                    <div class="text-xs text-default-400 font-semibold uppercase tracking-wider">Butir Soal Terdaftar</div>
                    <div class="text-2xl font-bold text-default-800 mt-1">{{ $stats['total_questions'] ?? 0 }}</div>
                </div>
                <div class="size-11 rounded-lg bg-success/10 text-success flex items-center justify-center shrink-0">
                    <i data-lucide="help-circle" class="size-5.5"></i>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body flex items-center justify-between">
                <div>
                    <div class="text-xs text-default-400 font-semibold uppercase tracking-wider">Stimulus Media</div>
                    <div class="text-2xl font-bold text-default-800 mt-1">{{ $stats['total_stimuli'] ?? 0 }}</div>
                </div>
                <div class="size-11 rounded-lg bg-info/10 text-info flex items-center justify-center shrink-0">
                    <i data-lucide="image" class="size-5.5"></i>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body flex items-center justify-between">
                <div>
                    <div class="text-xs text-default-400 font-semibold uppercase tracking-wider">Bank Soal Aktif</div>
                    <div class="text-2xl font-bold text-default-800 mt-1">{{ $stats['active_banks'] ?? 0 }}</div>
                </div>
                <div class="size-11 rounded-lg bg-warning/10 text-warning flex items-center justify-center shrink-0">
                    <i data-lucide="check-circle-2" class="size-5.5"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & View Switcher Card -->
    <x-cbt.card>
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <form method="GET" action="{{ route('staff.question-banks.index') }}" class="grid grid-cols-1 sm:grid-cols-3 gap-3.5 text-xs items-end flex-1">
                <div>
                    <label class="block font-semibold text-default-700 uppercase tracking-wider mb-1.5">Cari Nama / Kode</label>
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Ketik kata kunci..." class="form-input w-full pl-8 text-xs">
                        <i data-lucide="search" class="size-3.5 text-default-400 absolute left-2.5 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                    </div>
                </div>
                <div>
                    <label class="block font-semibold text-default-700 uppercase tracking-wider mb-1.5">Mata Pelajaran</label>
                    <select name="subject_id" class="form-select text-xs">
                        <option value="">-- Semua Mata Pelajaran --</option>
                        @foreach ($subjects as $s)
                            <option value="{{ $s->id }}" {{ request('subject_id') == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center gap-2">
                    <x-cbt.button type="submit" variant="primary" size="sm" class="flex-1">
                        <i data-lucide="filter" class="size-3.5"></i>
                        <span>Filter</span>
                    </x-cbt.button>
                    <a href="{{ route('staff.question-banks.index') }}" class="btn btn-sm border border-default-200 bg-default-100 hover:bg-default-200 text-default-700">
                        Reset
                    </a>
                </div>
            </form>

            <!-- View Switcher (Table vs Grid) -->
            <div class="flex items-center gap-1.5 p-1 bg-default-100 rounded-md border border-default-200 self-start md:self-end">
                <button type="button" 
                        onclick="switchView('table')" 
                        id="btn-view-table" 
                        class="px-2.5 py-1.5 rounded text-xs font-semibold flex items-center gap-1.5 transition cursor-pointer bg-white text-primary shadow-xs"
                        title="Tampilan Tabel (Rapi & Terstruktur)">
                    <i data-lucide="list" class="size-3.5"></i>
                    <span class="hidden sm:inline">Tabel</span>
                </button>
                <button type="button" 
                        onclick="switchView('grid')" 
                        id="btn-view-grid" 
                        class="px-2.5 py-1.5 rounded text-xs font-semibold flex items-center gap-1.5 transition cursor-pointer text-default-600 hover:text-default-800"
                        title="Tampilan Kartu (Visual Grid)">
                    <i data-lucide="layout-grid" class="size-3.5"></i>
                    <span class="hidden sm:inline">Kartu</span>
                </button>
            </div>
        </div>
    </x-cbt.card>

    <!-- ========================================== -->
    <!-- VIEW 1: TABLE VIEW (DEFAULT & RECOMMENDED) -->
    <!-- ========================================== -->
    <div id="view-table" class="space-y-4">
        <x-cbt.card title="Daftar Bank Soal Terdaftar" subtitle="Kelola butir soal, stimulus bacaan/audio, dan ekspor duplikasi bank soal">
            <div class="overflow-x-auto -mx-3.5 sm:mx-0">
                <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs text-default-600" id="table-question-banks">
                    <thead class="bg-default-150">
                        <tr class="text-xs uppercase font-semibold text-default-600 whitespace-nowrap tracking-wider">
                            <th class="px-4 py-3 border-b border-default-200 w-36 whitespace-nowrap">Kode Bank</th>
                            <th class="px-4 py-3 border-b border-default-200 whitespace-nowrap">Nama Bank Soal &amp; Deskripsi</th>
                            <th class="px-4 py-3 border-b border-default-200 whitespace-nowrap">Mata Pelajaran</th>
                            <th class="px-4 py-3 border-b border-default-200 text-center w-28 whitespace-nowrap">Butir Soal</th>
                            <th class="px-4 py-3 border-b border-default-200 text-center w-28 whitespace-nowrap">Stimulus</th>
                            <th class="px-4 py-3 border-b border-default-200 text-center w-24 whitespace-nowrap">Status</th>
                            <th class="px-4 py-3 border-b border-default-200 text-center w-36 whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200 dark:divide-white/14">
                        @forelse ($banks as $bank)
                            <tr class="hover:bg-default-50/70 transition">
                                <td class="px-4 py-3 font-mono font-bold whitespace-nowrap">
                                    <span class="px-2.5 py-1 rounded text-[11px] bg-primary/10 text-primary border border-primary/20 block text-center whitespace-nowrap">
                                        {{ $bank->code }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <a href="{{ route('staff.question-banks.show', $bank) }}" class="font-bold text-default-800 hover:text-primary transition line-clamp-1 text-sm block">
                                        {{ $bank->name }}
                                    </a>
                                    @if ($bank->description)
                                        <p class="text-xs text-default-400 line-clamp-1 mt-0.5">{{ $bank->description }}</p>
                                    @else
                                        <p class="text-xs text-default-300 italic mt-0.5">Tidak ada catatan silabus</p>
                                    @endif
                                </td>
                                <td class="px-4 py-3 font-medium text-default-700 whitespace-nowrap">
                                    <div class="flex items-center gap-1.5 whitespace-nowrap">
                                        <i data-lucide="book-open" class="size-3.5 text-default-400 shrink-0"></i>
                                        <span>{{ $bank->subject?->name ?? 'Mata Pelajaran Umum' }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-center whitespace-nowrap">
                                    <span class="px-2.5 py-0.5 rounded text-[11px] font-bold font-mono bg-primary/10 text-primary whitespace-nowrap inline-block">
                                        {{ $bank->questions_count }} butir
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center whitespace-nowrap">
                                    <span class="text-xs text-default-600 font-mono whitespace-nowrap inline-block">
                                        {{ $bank->stimuli_count }} stimulus
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center whitespace-nowrap">
                                    @if ($bank->is_active)
                                        <x-cbt.badge color="success">Aktif</x-cbt.badge>
                                    @else
                                        <x-cbt.badge color="secondary">Arsip</x-cbt.badge>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-1.5 whitespace-nowrap">
                                        <a href="{{ route('staff.question-banks.show', $bank) }}" 
                                           class="btn btn-sm h-8 px-3 rounded-lg bg-primary hover:bg-primary-hover text-white text-xs font-semibold shadow-2xs inline-flex items-center gap-1.5 transition"
                                           title="Buka Bank Soal">
                                            <span>Buka</span>
                                            <i data-lucide="arrow-right" class="size-3.5"></i>
                                        </a>

                                        <form method="POST" action="{{ route('staff.question-banks.duplicate', $bank) }}" class="inline" onsubmit="return confirm('Duplikasi bank soal ini beserta seluruh soal dan stimulus?')">
                                            @csrf
                                            <button type="submit" 
                                                    class="btn btn-icon size-8 rounded-lg border border-default-200/90 bg-card hover:bg-secondary/10 hover:text-secondary hover:border-secondary/30 text-default-600 flex items-center justify-center transition cursor-pointer" 
                                                    title="Duplikasi Bank Soal">
                                                <i data-lucide="copy" class="size-4"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('staff.question-banks.export-csv', $bank) }}" 
                                           class="btn btn-icon size-8 rounded-lg border border-default-200/90 bg-card hover:bg-emerald-50 hover:text-emerald-600 hover:border-emerald-300 text-default-600 flex items-center justify-center transition cursor-pointer"
                                           title="Ekspor CSV">
                                            <i data-lucide="download" class="size-4"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-8 text-center text-default-400">
                                    <x-cbt.empty-state title="Belum Ada Bank Soal" description="Klik tombol 'Buat Bank Soal Baru' di atas untuk mulai membuat bank soal.">
                                        <x-cbt.button type="button" variant="primary" size="sm" onclick="document.getElementById('modal-create-bank').classList.remove('hidden')">
                                            + Buat Bank Soal
                                        </x-cbt.button>
                                    </x-cbt.empty-state>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="flex items-center justify-between px-4 py-3 border-t border-default-200 dark:border-white/14 text-xs text-default-500 bg-default-50/30">
                <span>Total: <b class="text-default-700 font-semibold">{{ count($banks) }}</b> bank soal</span>
            </div>
        </x-cbt.card>
    </div>

    <!-- ========================================== -->
    <!-- VIEW 2: GRID / CARD VIEW (STANDARDIZED)    -->
    <!-- ========================================== -->
    <div id="view-grid" class="hidden">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse ($banks as $bank)
                <div class="card hover:border-primary/50 transition-all flex flex-col h-full bg-card border border-default-200 rounded-md overflow-hidden shadow-2xs">
                    <!-- Card Top Header & Body -->
                    <div class="p-5 flex-1 flex flex-col">
                        <div class="flex items-start justify-between gap-2 mb-3">
                            <span class="px-2.5 py-0.5 rounded text-[11px] font-mono font-semibold bg-primary/10 text-primary border border-primary/20">
                                {{ $bank->code }}
                            </span>
                            @if ($bank->is_active)
                                <x-cbt.badge color="success">Aktif</x-cbt.badge>
                            @else
                                <x-cbt.badge color="secondary">Arsip</x-cbt.badge>
                            @endif
                        </div>

                        <!-- Fixed-Height Title Area (Prevents vertical jitter) -->
                        <div class="min-h-[2.75rem] flex items-start">
                            <a href="{{ route('staff.question-banks.show', $bank) }}" 
                               class="text-sm font-bold text-default-800 hover:text-primary transition line-clamp-2 leading-snug"
                               title="{{ $bank->name }}">
                                {{ $bank->name }}
                            </a>
                        </div>

                        <!-- Subject -->
                        <div class="flex items-center gap-1.5 text-xs text-default-500 mt-1 truncate">
                            <i data-lucide="book-open" class="size-3.5 text-default-400 shrink-0"></i>
                            <span class="truncate">{{ $bank->subject?->name ?? 'Mata Pelajaran Umum' }}</span>
                        </div>

                        <!-- Fixed-Height Description Area (Prevents uneven card size) -->
                        <div class="h-10 mt-2.5 overflow-hidden">
                            @if ($bank->description)
                                <p class="text-xs text-default-400 line-clamp-2 leading-relaxed" title="{{ $bank->description }}">
                                    {{ $bank->description }}
                                </p>
                            @else
                                <p class="text-xs text-default-300 italic flex items-center gap-1 pt-1">
                                    <i data-lucide="minus" class="size-3"></i>
                                    <span>Tidak ada catatan silabus</span>
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Card Pinned Footer -->
                    <div class="mt-auto px-5 py-3.5 border-t border-default-200 bg-default-50/60">
                        <div class="flex items-center justify-between text-xs text-default-500 mb-3">
                            <div class="flex items-center gap-1.5 font-semibold text-default-700">
                                <span class="px-2 py-0.5 rounded bg-primary/10 text-primary font-mono font-bold">{{ $bank->questions_count }}</span>
                                <span>Butir Soal</span>
                            </div>
                            <div class="text-[11px] text-default-400 font-mono">
                                {{ $bank->stimuli_count }} Stimulus
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('staff.question-banks.show', $bank) }}" class="btn btn-sm bg-primary text-white hover:bg-primary-hover flex-1 text-center font-semibold text-xs py-2 shadow-2xs inline-flex items-center justify-center gap-1.5">
                                <span>Buka Bank Soal</span>
                                <i data-lucide="arrow-right" class="size-3.5"></i>
                            </a>
                            <form method="POST" action="{{ route('staff.question-banks.duplicate', $bank) }}" class="inline" onsubmit="return confirm('Duplikasi bank soal ini beserta seluruh soal dan stimulus?')">
                                @csrf
                                <button type="submit" class="size-8 rounded border border-default-200 bg-white hover:bg-default-100 text-default-600 hover:text-primary flex items-center justify-center transition cursor-pointer" title="Duplikasi Bank Soal">
                                    <i data-lucide="copy" class="size-3.5"></i>
                                </button>
                            </form>
                            <a href="{{ route('staff.question-banks.export-csv', $bank) }}" 
                               class="size-8 rounded border border-default-200 bg-white hover:bg-success/10 text-default-600 hover:text-success flex items-center justify-center transition cursor-pointer"
                               title="Ekspor CSV">
                                <i data-lucide="download" class="size-3.5"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <x-cbt.empty-state title="Belum Ada Bank Soal" description="Buat bank soal pertama Anda untuk mulai menyusun butir soal dan materi ujian.">
                        <x-cbt.button type="button" variant="primary" size="sm" onclick="document.getElementById('modal-create-bank').classList.remove('hidden')">
                            + Buat Bank Soal
                        </x-cbt.button>
                    </x-cbt.empty-state>
                </div>
            @endforelse
        </div>
    </div>

    @if($banks->hasPages())
        <div class="mt-4 pt-3 border-t border-default-200">
            {{ $banks->links() }}
        </div>
    @endif
</div>

<!-- Modal Create Question Bank -->
<div id="modal-create-bank" class="hidden fixed inset-0 bg-default-900/40 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="bg-card rounded-lg max-w-lg w-full max-h-[90vh] flex flex-col p-5 shadow-2xl border border-default-200 overflow-y-auto">
        <div class="flex items-center justify-between pb-3 mb-4 border-b border-default-200">
            <div>
                <h4 class="text-sm font-bold text-default-800">Buat Bank Soal Baru</h4>
                <p class="text-xs text-default-500 mt-0.5">Susun bank soal berbasis mata pelajaran dan standar CBT.</p>
            </div>
            <button type="button" onclick="document.getElementById('modal-create-bank').classList.add('hidden')" class="p-1 rounded text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>

        <form method="POST" action="{{ route('staff.question-banks.store') }}" class="space-y-4 text-xs">
            @csrf
            <div>
                <label class="block font-semibold text-default-800 uppercase tracking-wider mb-1">Mata Pelajaran / Kuliah <span class="text-danger">*</span></label>
                <select name="subject_id" required class="form-select w-full">
                    @foreach ($subjects as $s)
                        <option value="{{ $s->id }}">{{ $s->name }} ({{ $s->code }})</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold text-default-800 uppercase tracking-wider mb-1">Nama Bank Soal <span class="text-danger">*</span></label>
                <input type="text" name="name" required placeholder="Contoh: Bank Soal Ulumul Qur'an UTS 2026/2027" class="form-input w-full">
            </div>

            <div>
                <label class="block font-semibold text-default-800 uppercase tracking-wider mb-1">Kode Unik Bank Soal <span class="text-danger">*</span></label>
                <input type="text" name="code" required placeholder="BS-ULQ-2026" class="form-input font-mono w-full">
            </div>

            <div>
                <label class="block font-semibold text-default-800 uppercase tracking-wider mb-1">Deskripsi Singkat / Catatan Silabus</label>
                <textarea name="description" rows="2" placeholder="Catatan topik, silabus materi..." class="form-textarea w-full"></textarea>
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2.5 pt-3 border-t border-default-200">
                <button type="button" onclick="document.getElementById('modal-create-bank').classList.add('hidden')" class="w-full sm:w-auto btn btn-sm border border-default-200 text-default-700 hover:bg-default-100 rounded cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="w-full sm:w-auto btn btn-sm bg-primary text-white hover:bg-primary-hover rounded inline-flex items-center justify-center gap-1.5 shadow-xs cursor-pointer">
                    <i data-lucide="check" class="size-4"></i>
                    <span>Simpan Bank Soal</span>
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function switchView(mode) {
        const tableView = document.getElementById('view-table');
        const gridView = document.getElementById('view-grid');
        const btnTable = document.getElementById('btn-view-table');
        const btnGrid = document.getElementById('btn-view-grid');

        if (mode === 'grid') {
            tableView.classList.add('hidden');
            gridView.classList.remove('hidden');

            btnGrid.className = 'px-2.5 py-1.5 rounded text-xs font-semibold flex items-center gap-1.5 transition cursor-pointer bg-white text-primary shadow-xs';
            btnTable.className = 'px-2.5 py-1.5 rounded text-xs font-semibold flex items-center gap-1.5 transition cursor-pointer text-default-600 hover:text-default-800';
        } else {
            gridView.classList.add('hidden');
            tableView.classList.remove('hidden');

            btnTable.className = 'px-2.5 py-1.5 rounded text-xs font-semibold flex items-center gap-1.5 transition cursor-pointer bg-white text-primary shadow-xs';
            btnGrid.className = 'px-2.5 py-1.5 rounded text-xs font-semibold flex items-center gap-1.5 transition cursor-pointer text-default-600 hover:text-default-800';
        }

        localStorage.setItem('tesloka_qb_view', mode);
        if (window.lucide) lucide.createIcons();
    }

    document.addEventListener('DOMContentLoaded', function() {
        const savedView = localStorage.getItem('tesloka_qb_view') || 'table';
        switchView(savedView);
    });
</script>
@endpush
@endsection
