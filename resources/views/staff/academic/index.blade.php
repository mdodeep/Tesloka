@extends('layouts.staff')

@section('title', 'Struktur Akademik — TESLOKA CBT')
@section('page-parent', 'Master Organisasi')
@section('page-title', 'Struktur Akademik')
@section('page-subtitle', 'Kelola Tahun Ajaran, Semester, Jurusan, Rombel/Kelas, dan Mata Pelajaran secara terpadu.')

@section('content')
<div class="space-y-6">
    <!-- Quick Stats Grid (Tailwick Metric Cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <div class="card">
            <div class="card-body flex items-center justify-between">
                <div>
                    <div class="text-xs text-default-400 font-semibold uppercase tracking-wider">Tahun Ajaran</div>
                    <div class="text-2xl font-bold text-default-800 mt-1">{{ $years->count() }}</div>
                </div>
                <div class="size-11 rounded bg-primary/10 text-primary flex items-center justify-center shrink-0">
                    <i data-lucide="calendar" class="size-5.5"></i>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body flex items-center justify-between">
                <div>
                    <div class="text-xs text-default-400 font-semibold uppercase tracking-wider">Jurusan / Prodi</div>
                    <div class="text-2xl font-bold text-default-800 mt-1">{{ $departments->count() }}</div>
                </div>
                <div class="size-11 rounded bg-info/10 text-info flex items-center justify-center shrink-0">
                    <i data-lucide="building" class="size-5.5"></i>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body flex items-center justify-between">
                <div>
                    <div class="text-xs text-default-400 font-semibold uppercase tracking-wider">Rombel / Kelas</div>
                    <div class="text-2xl font-bold text-default-800 mt-1">{{ $classes->total() }}</div>
                </div>
                <div class="size-11 rounded bg-success/10 text-success flex items-center justify-center shrink-0">
                    <i data-lucide="users" class="size-5.5"></i>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body flex items-center justify-between">
                <div>
                    <div class="text-xs text-default-400 font-semibold uppercase tracking-wider">Mata Pelajaran</div>
                    <div class="text-2xl font-bold text-default-800 mt-1">{{ $subjects->total() }}</div>
                </div>
                <div class="size-11 rounded bg-warning/10 text-warning flex items-center justify-center shrink-0">
                    <i data-lucide="book-open" class="size-5.5"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="border-b border-default-200 overflow-x-auto scrollbar-none -mx-3.5 px-3.5 sm:mx-0 sm:px-0">
        <nav class="flex space-x-2 sm:space-x-4 min-w-max pb-0.5" aria-label="Tabs" id="academicTabs">
            <button type="button" onclick="switchTab('years')" id="tab-btn-years" class="tab-btn py-2.5 sm:py-3 px-3 sm:px-3.5 text-xs font-semibold border-b-2 border-primary text-primary transition flex items-center gap-1.5 sm:gap-2 cursor-pointer shrink-0">
                <i data-lucide="calendar" class="size-4 shrink-0"></i>
                <span>Tahun Ajaran &amp; Semester</span>
                <span class="px-2 py-0.5 rounded-full text-[10px] bg-primary/10 text-primary">{{ $years->count() }}</span>
            </button>
            <button type="button" onclick="switchTab('departments')" id="tab-btn-departments" class="tab-btn py-2.5 sm:py-3 px-3 sm:px-3.5 text-xs font-semibold border-b-2 border-transparent text-default-500 hover:text-default-700 transition flex items-center gap-1.5 sm:gap-2 cursor-pointer shrink-0">
                <i data-lucide="building" class="size-4 shrink-0"></i>
                <span>Jurusan &amp; Departemen</span>
                <span class="px-2 py-0.5 rounded-full text-[10px] bg-default-100 text-default-600">{{ $departments->count() }}</span>
            </button>
            <button type="button" onclick="switchTab('classes')" id="tab-btn-classes" class="tab-btn py-2.5 sm:py-3 px-3 sm:px-3.5 text-xs font-semibold border-b-2 border-transparent text-default-500 hover:text-default-700 transition flex items-center gap-1.5 sm:gap-2 cursor-pointer shrink-0">
                <i data-lucide="users" class="size-4 shrink-0"></i>
                <span>Rombel &amp; Kelas</span>
                <span class="px-2 py-0.5 rounded-full text-[10px] bg-default-100 text-default-600">{{ $classes->total() }}</span>
            </button>
            <button type="button" onclick="switchTab('subjects')" id="tab-btn-subjects" class="tab-btn py-2.5 sm:py-3 px-3 sm:px-3.5 text-xs font-semibold border-b-2 border-transparent text-default-500 hover:text-default-700 transition flex items-center gap-1.5 sm:gap-2 cursor-pointer shrink-0">
                <i data-lucide="book-open" class="size-4 shrink-0"></i>
                <span>Mata Pelajaran / Kuliah</span>
                <span class="px-2 py-0.5 rounded-full text-[10px] bg-default-100 text-default-600">{{ $subjects->total() }}</span>
            </button>
        </nav>
    </div>

    <!-- ========================================== -->
    <!-- TAB 1: TAHUN AJARAN & SEMESTER             -->
    <!-- ========================================== -->
    <div id="tab-pane-years" class="tab-pane space-y-6">
        <!-- Tabel Daftar Tahun Ajaran -->
        <x-cbt.card title="Daftar Tahun Ajaran" subtitle="Tahun ajaran terdokumentasi dalam sistem dengan opsi edit dan pengarsipan aman">
            <x-slot:actions>
                <button type="button" onclick="openModal('modal-create-year')" class="btn btn-sm bg-primary text-white hover:bg-primary-hover shadow-xs inline-flex items-center gap-1.5 cursor-pointer">
                    <i data-lucide="plus" class="size-4"></i>
                    <span>Tambah Tahun Ajaran</span>
                </button>
            </x-slot:actions>

            <div class="overflow-x-auto -mx-3.5 sm:mx-0">
                <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-years">
                    <thead class="bg-default-150">
                        <tr class="text-xs uppercase font-semibold text-default-600 whitespace-nowrap tracking-wider">
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Nama Tahun Ajaran</th>
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Rentang Periode</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Kelas Terkait</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Semester</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Status</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center w-28 whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200 dark:divide-white/14">
                        @forelse ($years as $y)
                            <tr class="hover:bg-default-50 transition">
                                <td class="px-3.5 py-2.5 border-y border-default-200 font-semibold text-default-800 whitespace-nowrap">{{ $y->name }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-default-600 font-mono whitespace-nowrap">
                                    {{ $y->start_date ? $y->start_date->format('d M Y') : '-' }} s.d. {{ $y->end_date ? $y->end_date->format('d M Y') : '-' }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center font-mono whitespace-nowrap">{{ $y->classes_count }} kelas</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center font-mono whitespace-nowrap">{{ $y->terms_count }} semester</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                    @if ($y->is_active)
                                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-success/10 text-success border border-success/20">Aktif</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-default-200 text-default-600">Arsip</span>
                                    @endif
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button type="button" 
                                                onclick="openEditYearModal('{{ $y->id }}', '{{ addslashes($y->name) }}', '{{ $y->start_date ? $y->start_date->format('Y-m-d') : '' }}', '{{ $y->end_date ? $y->end_date->format('Y-m-d') : '' }}', {{ $y->is_active ? 'true' : 'false' }})"
                                                class="size-7 rounded bg-default-100 hover:bg-default-200 text-default-700 flex items-center justify-center transition cursor-pointer"
                                                title="Edit Tahun Ajaran">
                                            <i data-lucide="edit-3" class="size-3.5"></i>
                                        </button>
                                        <form method="POST" action="{{ route('staff.academic.years.destroy', $y) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tahun ajaran {{ $y->name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="size-7 rounded bg-danger/10 hover:bg-danger/20 text-danger flex items-center justify-center transition cursor-pointer"
                                                    title="Hapus Tahun Ajaran">
                                                <i data-lucide="trash-2" class="size-3.5"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-6 text-center text-default-400">Belum ada data tahun ajaran.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-cbt.card>

        <!-- Tabel Daftar Semester -->
        <x-cbt.card title="Daftar Semester / Term" subtitle="Rincian semester aktif dan historis dalam tahun ajaran">
            <x-slot:actions>
                <button type="button" onclick="openModal('modal-create-term')" class="btn btn-sm bg-primary text-white hover:bg-primary-hover shadow-xs inline-flex items-center gap-1.5 cursor-pointer">
                    <i data-lucide="plus" class="size-4"></i>
                    <span>Tambah Semester</span>
                </button>
            </x-slot:actions>

            <div class="overflow-x-auto -mx-3.5 sm:mx-0">
                <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-terms">
                    <thead class="bg-default-150">
                        <tr class="text-xs uppercase font-semibold text-default-600 whitespace-nowrap tracking-wider">
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Kode</th>
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Nama Semester</th>
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Tahun Ajaran</th>
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Periode</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Status</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center w-28 whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200 dark:divide-white/14">
                        @forelse ($terms as $t)
                            <tr class="hover:bg-default-50 transition">
                                <td class="px-3.5 py-2.5 border-y border-default-200 font-mono font-bold text-default-800 whitespace-nowrap">{{ $t->code }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 font-semibold text-default-700 whitespace-nowrap">{{ $t->name }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-default-600 whitespace-nowrap">{{ $t->academicYear?->name ?? '-' }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-default-600 font-mono whitespace-nowrap">
                                    {{ $t->start_date ? $t->start_date->format('d/m/Y') : '-' }} - {{ $t->end_date ? $t->end_date->format('d/m/Y') : '-' }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                    @if ($t->is_active)
                                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-success/10 text-success border border-success/20">Aktif</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-default-200 text-default-600">Arsip</span>
                                    @endif
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button type="button" 
                                                onclick="openEditTermModal('{{ $t->id }}', '{{ $t->academic_year_id }}', '{{ addslashes($t->name) }}', '{{ $t->code }}', '{{ $t->start_date ? $t->start_date->format('Y-m-d') : '' }}', '{{ $t->end_date ? $t->end_date->format('Y-m-d') : '' }}', {{ $t->is_active ? 'true' : 'false' }})"
                                                class="size-7 rounded bg-default-100 hover:bg-default-200 text-default-700 flex items-center justify-center transition cursor-pointer"
                                                title="Edit Semester">
                                            <i data-lucide="edit-3" class="size-3.5"></i>
                                        </button>
                                        <form method="POST" action="{{ route('staff.academic.terms.destroy', $t) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semester {{ $t->name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="size-7 rounded bg-danger/10 hover:bg-danger/20 text-danger flex items-center justify-center transition cursor-pointer"
                                                    title="Hapus Semester">
                                                <i data-lucide="trash-2" class="size-3.5"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-6 text-center text-default-400">Belum ada data semester.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-cbt.card>
    </div>

    <!-- ========================================== -->
    <!-- TAB 2: JURUSAN & DEPARTEMEN                -->
    <!-- ========================================== -->
    <div id="tab-pane-departments" class="tab-pane hidden space-y-6">
        <x-cbt.card title="Daftar Jurusan / Program Studi" subtitle="Daftar departemen yang terdaftar beserta relasi kelas dan mata pelajaran">
            <x-slot:actions>
                <button type="button" onclick="openModal('modal-create-department')" class="btn btn-sm bg-primary text-white hover:bg-primary-hover shadow-xs inline-flex items-center gap-1.5 cursor-pointer">
                    <i data-lucide="plus" class="size-4"></i>
                    <span>Tambah Jurusan Baru</span>
                </button>
            </x-slot:actions>

            <div class="overflow-x-auto -mx-3.5 sm:mx-0">
                <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-departments">
                    <thead class="bg-default-150">
                        <tr class="text-xs uppercase font-semibold text-default-600 whitespace-nowrap tracking-wider">
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Kode</th>
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Nama Jurusan / Prodi</th>
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Jenjang</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Kelas</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Mata Pelajaran</th>
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Deskripsi</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center w-28 whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200 dark:divide-white/14">
                        @forelse ($departments as $d)
                            <tr class="hover:bg-default-50 transition">
                                <td class="px-3.5 py-2.5 border-y border-default-200 font-mono font-bold text-default-800 whitespace-nowrap">{{ $d->code }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 font-semibold text-default-700 whitespace-nowrap">{{ $d->name }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-default-600 whitespace-nowrap">{{ $d->level ?? '-' }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center font-mono whitespace-nowrap">{{ $d->classes_count }} rombel</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center font-mono whitespace-nowrap">{{ $d->subjects_count }} mapel</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-default-500 whitespace-nowrap">{{ Str::limit($d->description, 40) ?? '-' }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button type="button" 
                                                onclick="openEditDepartmentModal('{{ $d->id }}', '{{ $d->code }}', '{{ addslashes($d->name) }}', '{{ addslashes($d->level ?? '') }}', '{{ addslashes($d->description ?? '') }}')"
                                                class="size-7 rounded bg-default-100 hover:bg-default-200 text-default-700 flex items-center justify-center transition cursor-pointer"
                                                title="Edit Jurusan">
                                            <i data-lucide="edit-3" class="size-3.5"></i>
                                        </button>
                                        <form method="POST" action="{{ route('staff.academic.departments.destroy', $d) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jurusan {{ $d->name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="size-7 rounded bg-danger/10 hover:bg-danger/20 text-danger flex items-center justify-center transition cursor-pointer"
                                                    title="Hapus Jurusan">
                                                <i data-lucide="trash-2" class="size-3.5"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-8 text-center text-default-400">
                                    <x-cbt.empty-state title="Belum Ada Jurusan" description="Klik tombol 'Tambah Jurusan Baru' untuk membuat jurusan/prodi." />
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-cbt.card>
    </div>

    <!-- ========================================== -->
    <!-- TAB 3: ROMBEL & KELAS                      -->
    <!-- ========================================== -->
    <div id="tab-pane-classes" class="tab-pane hidden space-y-6">
        <x-cbt.card title="Daftar Rombel / Kelas Terdaftar" subtitle="Kelola seluruh kelas, pengarsipan status, dan edit rincian kapasitas peserta (Maks. 30)">
            <x-slot:actions>
                <button type="button" onclick="openModal('modal-create-class')" class="btn btn-sm bg-primary text-white hover:bg-primary-hover shadow-xs inline-flex items-center gap-1.5 cursor-pointer">
                    <i data-lucide="plus" class="size-4"></i>
                    <span>Tambah Kelas Baru</span>
                </button>
            </x-slot:actions>

            <div class="overflow-x-auto -mx-3.5 sm:mx-0">
                <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-classes">
                    <thead class="bg-default-150">
                        <tr class="text-xs uppercase font-semibold text-default-600 whitespace-nowrap tracking-wider">
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Kode</th>
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Nama Kelas</th>
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Tahun Ajaran</th>
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Jurusan</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Kapasitas</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Peserta</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Status</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center w-36 whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200 dark:divide-white/14">
                        @forelse ($classes as $c)
                            <tr class="hover:bg-default-50 transition">
                                <td class="px-3.5 py-2.5 border-y border-default-200 font-mono font-bold text-default-800 whitespace-nowrap">{{ $c->code }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 font-semibold text-default-700 whitespace-nowrap">{{ $c->name }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-default-600 whitespace-nowrap">{{ $c->academicYear?->name ?? '-' }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-default-600 whitespace-nowrap">{{ $c->department?->name ?? 'Umum' }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center font-medium text-default-700 font-mono whitespace-nowrap">{{ $c->capacity }} peserta</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                    <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-primary/10 text-primary">
                                        {{ $c->students_count }} terdaftar
                                    </span>
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                    @if ($c->is_active)
                                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-success/10 text-success border border-success/20">Aktif</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-default-200 text-default-600 border border-default-300">Arsip</span>
                                    @endif
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <a href="{{ route('staff.academic.classes.print-cards', $c) }}" target="_blank"
                                           class="size-7 rounded bg-indigo-50 hover:bg-indigo-100 text-indigo-700 flex items-center justify-center transition cursor-pointer"
                                           title="Cetak Kartu Ujian Massal Siswa Kelas Ini (A4)">
                                            <i data-lucide="printer" class="size-3.5"></i>
                                        </a>
                                        <button type="button" 
                                                onclick="openEditClassModal('{{ $c->id }}', '{{ $c->academic_year_id }}', '{{ $c->department_id }}', '{{ addslashes($c->name) }}', '{{ $c->code }}', '{{ $c->capacity }}', {{ $c->is_active ? 'true' : 'false' }})"
                                                class="size-7 rounded bg-default-100 hover:bg-default-200 text-default-700 flex items-center justify-center transition cursor-pointer"
                                                title="Edit Kelas">
                                            <i data-lucide="edit-3" class="size-3.5"></i>
                                        </button>

                                        <form method="POST" action="{{ route('staff.academic.classes.toggle', $c) }}" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="size-7 rounded {{ $c->is_active ? 'bg-warning/10 hover:bg-warning/20 text-warning' : 'bg-success/10 hover:bg-success/20 text-success' }} flex items-center justify-center transition cursor-pointer"
                                                    title="{{ $c->is_active ? 'Nonaktifkan / Arsipkan' : 'Aktifkan Kembali' }}">
                                                <i data-lucide="{{ $c->is_active ? 'pause' : 'play' }}" class="size-3.5"></i>
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ route('staff.academic.classes.destroy', $c) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas {{ $c->name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="size-7 rounded bg-danger/10 hover:bg-danger/20 text-danger flex items-center justify-center transition cursor-pointer"
                                                    title="Hapus Kelas">
                                                <i data-lucide="trash-2" class="size-3.5"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-8 text-center text-default-400">
                                    <x-cbt.empty-state title="Belum Ada Rombel / Kelas" description="Silakan klik tombol 'Tambah Kelas Baru' di atas untuk membuat kelas baru." />
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($classes->hasPages())
                <div class="mt-4 pt-3 border-t border-default-200">
                    {{ $classes->appends(request()->except('classes_page'))->links() }}
                </div>
            @endif
        </x-cbt.card>
    </div>

    <!-- ========================================== -->
    <!-- TAB 4: MATA PELAJARAN / KULIAH             -->
    <!-- ========================================== -->
    <div id="tab-pane-subjects" class="tab-pane hidden space-y-6">
        <x-cbt.card title="Daftar Mata Pelajaran / Kuliah Terdaftar" subtitle="Kelola status aktif, edit nama/kode, dan telusuri dependensi bank soal">
            <x-slot:actions>
                <button type="button" onclick="openModal('modal-create-subject')" class="btn btn-sm bg-primary text-white hover:bg-primary-hover shadow-xs inline-flex items-center gap-1.5 cursor-pointer">
                    <i data-lucide="plus" class="size-4"></i>
                    <span>Tambah Mapel Baru</span>
                </button>
            </x-slot:actions>

            <div class="overflow-x-auto -mx-3.5 sm:mx-0">
                <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-subjects">
                    <thead class="bg-default-150">
                        <tr class="text-xs uppercase font-semibold text-default-600 whitespace-nowrap tracking-wider">
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Kode</th>
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Nama Mata Pelajaran</th>
                            <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Jurusan</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Bank Soal</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Ujian</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Status</th>
                            <th class="px-3.5 py-3 border-b border-default-200 text-center w-36 whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200 dark:divide-white/14">
                        @forelse ($subjects as $s)
                            <tr class="hover:bg-default-50 transition">
                                <td class="px-3.5 py-2.5 border-y border-default-200 font-mono font-bold text-default-800 whitespace-nowrap">{{ $s->code }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 font-semibold text-default-700 whitespace-nowrap">{{ $s->name }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-default-600 whitespace-nowrap">{{ $s->department?->name ?? 'Umum' }}</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center font-mono whitespace-nowrap">{{ $s->question_banks_count }} bank</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center font-mono whitespace-nowrap">{{ $s->exams_count }} ujian</td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                    @if ($s->is_active)
                                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-success/10 text-success border border-success/20">Aktif</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-default-200 text-default-600 border border-default-300">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button type="button" 
                                                onclick="openEditSubjectModal('{{ $s->id }}', '{{ $s->department_id }}', '{{ $s->code }}', '{{ addslashes($s->name) }}', '{{ addslashes($s->description ?? '') }}', {{ $s->is_active ? 'true' : 'false' }})"
                                                class="size-7 rounded bg-default-100 hover:bg-default-200 text-default-700 flex items-center justify-center transition cursor-pointer"
                                                title="Edit Mata Pelajaran">
                                            <i data-lucide="edit-3" class="size-3.5"></i>
                                        </button>

                                        <form method="POST" action="{{ route('staff.academic.subjects.toggle', $s) }}" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="size-7 rounded {{ $s->is_active ? 'bg-warning/10 hover:bg-warning/20 text-warning' : 'bg-success/10 hover:bg-success/20 text-success' }} flex items-center justify-center transition cursor-pointer"
                                                    title="{{ $s->is_active ? 'Nonaktifkan' : 'Aktifkan Kembali' }}">
                                                <i data-lucide="{{ $s->is_active ? 'pause' : 'play' }}" class="size-3.5"></i>
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ route('staff.academic.subjects.destroy', $s) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mata pelajaran {{ $s->name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="size-7 rounded bg-danger/10 hover:bg-danger/20 text-danger flex items-center justify-center transition cursor-pointer"
                                                    title="Hapus Mata Pelajaran">
                                                <i data-lucide="trash-2" class="size-3.5"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-8 text-center text-default-400">
                                    <x-cbt.empty-state title="Belum Ada Mata Pelajaran" description="Klik tombol 'Tambah Mapel Baru' untuk membuat mata pelajaran." />
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($subjects->hasPages())
                <div class="mt-4 pt-3 border-t border-default-200">
                    {{ $subjects->appends(request()->except('subjects_page'))->links() }}
                </div>
            @endif
        </x-cbt.card>
    </div>
</div>

<!-- ================================================================= -->
<!-- MODAL CREATE & EDIT SECTION                                       -->
<!-- ================================================================= -->

<!-- 1. MODAL TAMBAH KELAS -->
<div id="modal-create-class" class="fixed inset-0 z-50 hidden bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-white rounded-md max-w-xl w-full max-h-[90vh] flex flex-col shadow-lg border border-default-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-default-200 flex items-center justify-between shrink-0">
            <div>
                <h4 class="text-sm font-bold text-default-800">Tambah Kelas / Rombel Baru</h4>
                <p class="text-xs text-default-500 mt-0.5">Sesuai DEC-001, kapasitas maksimal dibatasi 30 peserta.</p>
            </div>
            <button type="button" onclick="closeModal('modal-create-class')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>
        <form method="POST" action="{{ route('staff.academic.classes.store') }}" class="p-4 sm:p-5 space-y-4 overflow-y-auto">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Tahun Ajaran <span class="text-danger">*</span></label>
                    <select name="academic_year_id" required class="form-select w-full truncate">
                        @foreach ($years as $y)
                            <option value="{{ $y->id }}" {{ $y->is_active ? 'selected' : '' }}>
                                {{ $y->name }} {{ $y->is_active ? '(Aktif)' : '' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Jurusan / Program Studi</label>
                    <select name="department_id" class="form-select w-full truncate">
                        <option value="">-- Umum / Non Jurusan --</option>
                        @foreach ($departments as $d)
                            <option value="{{ $d->id }}">{{ $d->name }} ({{ $d->code }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Nama Lengkap Kelas <span class="text-danger">*</span></label>
                <input type="text" name="name" required placeholder="Contoh: Kelas XII MIPA 1 (Reguler Pagi)" class="form-input w-full">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Kode Kelas <span class="text-danger">*</span></label>
                    <input type="text" name="code" required placeholder="Contoh: XII-MIPA-1" class="form-input font-mono w-full">
                </div>
                <div class="min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Kapasitas Maksimal (1-30) <span class="text-danger">*</span></label>
                    <input type="number" name="capacity" min="1" max="30" value="30" required class="form-input font-mono w-full">
                </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 w-full sm:w-auto">
                <x-cbt.button type="button" variant="outline" size="sm" onclick="closeModal('modal-create-class')" class="w-full sm:w-auto justify-center">Batal</x-cbt.button>
                <x-cbt.button type="submit" variant="primary" size="sm" class="w-full sm:w-auto justify-center">
                    <i data-lucide="plus" class="size-4 mr-1"></i>
                    Simpan Kelas
                </x-cbt.button>
            </div>
        </form>
    </div>
</div>

<!-- 2. MODAL EDIT KELAS -->
<div id="modal-edit-class" class="fixed inset-0 z-50 hidden bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-white rounded-md max-w-xl w-full max-h-[90vh] flex flex-col shadow-lg border border-default-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-default-200 flex items-center justify-between shrink-0">
            <h4 class="text-sm font-bold text-default-800">Edit Rombel / Kelas</h4>
            <button type="button" onclick="closeModal('modal-edit-class')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>
        <form id="form-edit-class" method="POST" action="" class="p-4 sm:p-5 space-y-4 overflow-y-auto">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Tahun Ajaran <span class="text-danger">*</span></label>
                    <select id="edit_class_year_id" name="academic_year_id" required class="form-select w-full truncate">
                        @foreach ($years as $y)
                            <option value="{{ $y->id }}">{{ $y->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Jurusan / Program Studi</label>
                    <select id="edit_class_dept_id" name="department_id" class="form-select w-full truncate">
                        <option value="">-- Umum / Non Jurusan --</option>
                        @foreach ($departments as $d)
                            <option value="{{ $d->id }}">{{ $d->name }} ({{ $d->code }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Nama Kelas <span class="text-danger">*</span></label>
                <input type="text" id="edit_class_name" name="name" required class="form-input w-full">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Kode Kelas <span class="text-danger">*</span></label>
                    <input type="text" id="edit_class_code" name="code" required class="form-input font-mono w-full">
                </div>
                <div class="min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Kapasitas Maksimal (1-30) <span class="text-danger">*</span></label>
                    <input type="number" id="edit_class_capacity" name="capacity" min="1" max="30" required class="form-input font-mono w-full">
                </div>
            </div>

            <label class="flex items-center gap-2 text-xs text-default-600 cursor-pointer pt-1">
                <input type="checkbox" id="edit_class_active" name="is_active" value="1" class="form-checkbox text-primary">
                <span>Status Kelas Aktif</span>
            </label>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 w-full sm:w-auto">
                <x-cbt.button type="button" variant="outline" size="sm" onclick="closeModal('modal-edit-class')" class="w-full sm:w-auto justify-center">Batal</x-cbt.button>
                <x-cbt.button type="submit" variant="primary" size="sm" class="w-full sm:w-auto justify-center">Simpan Perubahan</x-cbt.button>
            </div>
        </form>
    </div>
</div>

<!-- 3. MODAL TAMBAH TAHUN AJARAN -->
<div id="modal-create-year" class="fixed inset-0 z-50 hidden bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-white rounded-md max-w-lg w-full max-h-[90vh] flex flex-col shadow-lg border border-default-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-default-200 flex items-center justify-between shrink-0">
            <h4 class="text-sm font-bold text-default-800">Tambah Tahun Ajaran Baru</h4>
            <button type="button" onclick="closeModal('modal-create-year')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>
        <form method="POST" action="{{ route('staff.academic.years.store') }}" class="p-4 sm:p-5 space-y-4 overflow-y-auto">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Nama Tahun Ajaran <span class="text-danger">*</span></label>
                <input type="text" name="name" required placeholder="Contoh: Tahun Akademik 2026/2027" class="form-input w-full">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" name="start_date" required class="form-input w-full">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Tanggal Berakhir <span class="text-danger">*</span></label>
                    <input type="date" name="end_date" required class="form-input w-full">
                </div>
            </div>
            <label class="flex items-center gap-2 text-xs text-default-600 cursor-pointer pt-1">
                <input type="checkbox" name="is_active" value="1" checked class="form-checkbox text-primary">
                <span>Set sebagai Tahun Ajaran Aktif</span>
            </label>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 w-full sm:w-auto">
                <x-cbt.button type="button" variant="outline" size="sm" onclick="closeModal('modal-create-year')" class="w-full sm:w-auto justify-center">Batal</x-cbt.button>
                <x-cbt.button type="submit" variant="primary" size="sm" class="w-full sm:w-auto justify-center">Simpan Tahun Ajaran</x-cbt.button>
            </div>
        </form>
    </div>
</div>

<!-- 4. MODAL EDIT TAHUN AJARAN -->
<div id="modal-edit-year" class="fixed inset-0 z-50 hidden bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-white rounded-md max-w-lg w-full max-h-[90vh] flex flex-col shadow-lg border border-default-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-default-200 flex items-center justify-between shrink-0">
            <h4 class="text-sm font-bold text-default-800">Edit Tahun Ajaran</h4>
            <button type="button" onclick="closeModal('modal-edit-year')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>
        <form id="form-edit-year" method="POST" action="" class="p-4 sm:p-5 space-y-4 overflow-y-auto">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Nama Tahun Ajaran <span class="text-danger">*</span></label>
                <input type="text" id="edit_year_name" name="name" required class="form-input w-full">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" id="edit_year_start" name="start_date" required class="form-input w-full">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Tanggal Berakhir <span class="text-danger">*</span></label>
                    <input type="date" id="edit_year_end" name="end_date" required class="form-input w-full">
                </div>
            </div>
            <label class="flex items-center gap-2 text-xs text-default-600 cursor-pointer pt-1">
                <input type="checkbox" id="edit_year_active" name="is_active" value="1" class="form-checkbox text-primary">
                <span>Set sebagai Tahun Ajaran Aktif</span>
            </label>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 w-full sm:w-auto">
                <x-cbt.button type="button" variant="outline" size="sm" onclick="closeModal('modal-edit-year')" class="w-full sm:w-auto justify-center">Batal</x-cbt.button>
                <x-cbt.button type="submit" variant="primary" size="sm" class="w-full sm:w-auto justify-center">Simpan Perubahan</x-cbt.button>
            </div>
        </form>
    </div>
</div>

<!-- 5. MODAL TAMBAH SEMESTER -->
<div id="modal-create-term" class="fixed inset-0 z-50 hidden bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-white rounded-md max-w-lg w-full max-h-[90vh] flex flex-col shadow-lg border border-default-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-default-200 flex items-center justify-between shrink-0">
            <h4 class="text-sm font-bold text-default-800">Tambah Semester / Term Baru</h4>
            <button type="button" onclick="closeModal('modal-create-term')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>
        <form method="POST" action="{{ route('staff.academic.terms.store') }}" class="p-4 sm:p-5 space-y-4 overflow-y-auto">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Tahun Ajaran <span class="text-danger">*</span></label>
                    <select name="academic_year_id" required class="form-select w-full">
                        @foreach ($years as $y)
                            <option value="{{ $y->id }}" {{ $y->is_active ? 'selected' : '' }}>{{ $y->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Kode Semester <span class="text-danger">*</span></label>
                    <input type="text" name="code" required placeholder="Contoh: 20261 / GANJIL" class="form-input font-mono w-full">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Nama Semester <span class="text-danger">*</span></label>
                <input type="text" name="name" required placeholder="Contoh: Semester Ganjil 2026/2027" class="form-input w-full">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Tanggal Mulai</label>
                    <input type="date" name="start_date" class="form-input w-full">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Tanggal Selesai</label>
                    <input type="date" name="end_date" class="form-input w-full">
                </div>
            </div>
            <label class="flex items-center gap-2 text-xs text-default-600 cursor-pointer pt-1">
                <input type="checkbox" name="is_active" value="1" checked class="form-checkbox text-primary">
                <span>Set sebagai Semester Aktif</span>
            </label>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 w-full sm:w-auto">
                <x-cbt.button type="button" variant="outline" size="sm" onclick="closeModal('modal-create-term')" class="w-full sm:w-auto justify-center">Batal</x-cbt.button>
                <x-cbt.button type="submit" variant="primary" size="sm" class="w-full sm:w-auto justify-center">Simpan Semester</x-cbt.button>
            </div>
        </form>
    </div>
</div>

<!-- 6. MODAL EDIT SEMESTER -->
<div id="modal-edit-term" class="fixed inset-0 z-50 hidden bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-white rounded-md max-w-lg w-full max-h-[90vh] flex flex-col shadow-lg border border-default-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-default-200 flex items-center justify-between shrink-0">
            <h4 class="text-sm font-bold text-default-800">Edit Semester / Term</h4>
            <button type="button" onclick="closeModal('modal-edit-term')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>
        <form id="form-edit-term" method="POST" action="" class="p-4 sm:p-5 space-y-4 overflow-y-auto">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Tahun Ajaran <span class="text-danger">*</span></label>
                    <select id="edit_term_year_id" name="academic_year_id" required class="form-select w-full">
                        @foreach ($years as $y)
                            <option value="{{ $y->id }}">{{ $y->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Kode Semester <span class="text-danger">*</span></label>
                    <input type="text" id="edit_term_code" name="code" required class="form-input font-mono w-full">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Nama Semester <span class="text-danger">*</span></label>
                <input type="text" id="edit_term_name" name="name" required class="form-input w-full">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Tanggal Mulai</label>
                    <input type="date" id="edit_term_start" name="start_date" class="form-input w-full">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Tanggal Selesai</label>
                    <input type="date" id="edit_term_end" name="end_date" class="form-input w-full">
                </div>
            </div>
            <label class="flex items-center gap-2 text-xs text-default-600 cursor-pointer pt-1">
                <input type="checkbox" id="edit_term_active" name="is_active" value="1" class="form-checkbox text-primary">
                <span>Set sebagai Semester Aktif</span>
            </label>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 w-full sm:w-auto">
                <x-cbt.button type="button" variant="outline" size="sm" onclick="closeModal('modal-edit-term')" class="w-full sm:w-auto justify-center">Batal</x-cbt.button>
                <x-cbt.button type="submit" variant="primary" size="sm" class="w-full sm:w-auto justify-center">Simpan Perubahan</x-cbt.button>
            </div>
        </form>
    </div>
</div>

<!-- 7. MODAL TAMBAH JURUSAN -->
<div id="modal-create-department" class="fixed inset-0 z-50 hidden bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-white rounded-md max-w-lg w-full max-h-[90vh] flex flex-col shadow-lg border border-default-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-default-200 flex items-center justify-between shrink-0">
            <h4 class="text-sm font-bold text-default-800">Tambah Jurusan / Program Studi Baru</h4>
            <button type="button" onclick="closeModal('modal-create-department')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>
        <form method="POST" action="{{ route('staff.academic.departments.store') }}" class="p-4 sm:p-5 space-y-4 overflow-y-auto">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3.5">
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Kode Jurusan <span class="text-danger">*</span></label>
                    <input type="text" name="code" required placeholder="Contoh: TIQ / MIPA" class="form-input font-mono w-full">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Jenjang / Level</label>
                    <input type="text" name="level" placeholder="Contoh: S1 / SMA / D3" class="form-input w-full">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Nama Jurusan / Prodi <span class="text-danger">*</span></label>
                <input type="text" name="name" required placeholder="Contoh: Ilmu Al-Qur'an dan Tafsir" class="form-input w-full">
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Deskripsi Singkat</label>
                <textarea name="description" rows="2" placeholder="Keterangan fokus studi atau kompetensi jurusan..." class="form-textarea w-full"></textarea>
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 w-full sm:w-auto">
                <x-cbt.button type="button" variant="outline" size="sm" onclick="closeModal('modal-create-department')" class="w-full sm:w-auto justify-center">Batal</x-cbt.button>
                <x-cbt.button type="submit" variant="primary" size="sm" class="w-full sm:w-auto justify-center">Simpan Jurusan</x-cbt.button>
            </div>
        </form>
    </div>
</div>

<!-- 8. MODAL EDIT JURUSAN -->
<div id="modal-edit-department" class="fixed inset-0 z-50 hidden bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-white rounded-md max-w-lg w-full max-h-[90vh] flex flex-col shadow-lg border border-default-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-default-200 flex items-center justify-between shrink-0">
            <h4 class="text-sm font-bold text-default-800">Edit Jurusan / Program Studi</h4>
            <button type="button" onclick="closeModal('modal-edit-department')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>
        <form id="form-edit-department" method="POST" action="" class="p-4 sm:p-5 space-y-4 overflow-y-auto">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3.5">
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Kode <span class="text-danger">*</span></label>
                    <input type="text" id="edit_dept_code" name="code" required class="form-input font-mono w-full">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Jenjang / Level</label>
                    <input type="text" id="edit_dept_level" name="level" class="form-input w-full">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Nama Jurusan / Prodi <span class="text-danger">*</span></label>
                <input type="text" id="edit_dept_name" name="name" required class="form-input w-full">
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Deskripsi Singkat</label>
                <textarea id="edit_dept_desc" name="description" rows="2" class="form-textarea w-full"></textarea>
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 w-full sm:w-auto">
                <x-cbt.button type="button" variant="outline" size="sm" onclick="closeModal('modal-edit-department')" class="w-full sm:w-auto justify-center">Batal</x-cbt.button>
                <x-cbt.button type="submit" variant="primary" size="sm" class="w-full sm:w-auto justify-center">Simpan Perubahan</x-cbt.button>
            </div>
        </form>
    </div>
</div>

<!-- 9. MODAL TAMBAH MATA PELAJARAN -->
<div id="modal-create-subject" class="fixed inset-0 z-50 hidden bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-white rounded-md max-w-lg w-full max-h-[90vh] flex flex-col shadow-lg border border-default-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-default-200 flex items-center justify-between shrink-0">
            <h4 class="text-sm font-bold text-default-800">Tambah Mata Pelajaran / Kuliah Baru</h4>
            <button type="button" onclick="closeModal('modal-create-subject')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>
        <form method="POST" action="{{ route('staff.academic.subjects.store') }}" class="p-4 sm:p-5 space-y-4 overflow-y-auto">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Kode Mapel <span class="text-danger">*</span></label>
                    <input type="text" name="code" required placeholder="Contoh: BIO-101 / TAFSIR-1" class="form-input font-mono w-full">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Jurusan Pengampu</label>
                    <select name="department_id" class="form-select w-full">
                        <option value="">-- Umum / Lintas Jurusan --</option>
                        @foreach ($departments as $d)
                            <option value="{{ $d->id }}">{{ $d->name }} ({{ $d->code }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Nama Mata Pelajaran <span class="text-danger">*</span></label>
                <input type="text" name="name" required placeholder="Contoh: Biologi Molekuler Dasar" class="form-input w-full">
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Deskripsi Silabus / Materi</label>
                <textarea name="description" rows="2" placeholder="Cakupan materi pokok, kompetensi inti, dan topik ujian..." class="form-textarea w-full"></textarea>
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 w-full sm:w-auto">
                <x-cbt.button type="button" variant="outline" size="sm" onclick="closeModal('modal-create-subject')" class="w-full sm:w-auto justify-center">Batal</x-cbt.button>
                <x-cbt.button type="submit" variant="primary" size="sm" class="w-full sm:w-auto justify-center">Simpan Mapel</x-cbt.button>
            </div>
        </form>
    </div>
</div>

<!-- 10. MODAL EDIT MATA PELAJARAN -->
<div id="modal-edit-subject" class="fixed inset-0 z-50 hidden bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-white rounded-md max-w-lg w-full max-h-[90vh] flex flex-col shadow-lg border border-default-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-default-200 flex items-center justify-between shrink-0">
            <h4 class="text-sm font-bold text-default-800">Edit Mata Pelajaran / Kuliah</h4>
            <button type="button" onclick="closeModal('modal-edit-subject')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>
        <form id="form-edit-subject" method="POST" action="" class="p-4 sm:p-5 space-y-4 overflow-y-auto">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Kode <span class="text-danger">*</span></label>
                    <input type="text" id="edit_subject_code" name="code" required class="form-input font-mono w-full">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Jurusan Pengampu</label>
                    <select id="edit_subject_dept_id" name="department_id" class="form-select w-full">
                        <option value="">-- Umum / Lintas Jurusan --</option>
                        @foreach ($departments as $d)
                            <option value="{{ $d->id }}">{{ $d->name }} ({{ $d->code }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Nama Mata Pelajaran <span class="text-danger">*</span></label>
                <input type="text" id="edit_subject_name" name="name" required class="form-input w-full">
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1">Deskripsi Silabus</label>
                <textarea id="edit_subject_desc" name="description" rows="2" class="form-textarea w-full"></textarea>
            </div>
            <label class="flex items-center gap-2 text-xs text-default-600 cursor-pointer pt-1">
                <input type="checkbox" id="edit_subject_active" name="is_active" value="1" class="form-checkbox text-primary">
                <span>Status Mata Pelajaran Aktif</span>
            </label>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 w-full sm:w-auto">
                <x-cbt.button type="button" variant="outline" size="sm" onclick="closeModal('modal-edit-subject')" class="w-full sm:w-auto justify-center">Batal</x-cbt.button>
                <x-cbt.button type="submit" variant="primary" size="sm" class="w-full sm:w-auto justify-center">Simpan Perubahan</x-cbt.button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Tab switching logic
    function switchTab(tabId) {
        document.querySelectorAll('.tab-pane').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('border-primary', 'text-primary');
            btn.classList.add('border-transparent', 'text-default-500');
            const badge = btn.querySelector('span:last-child');
            if (badge) {
                badge.className = 'px-2 py-0.5 rounded-full text-[10px] bg-default-100 text-default-600';
            }
        });

        const activePane = document.getElementById('tab-pane-' + tabId);
        const activeBtn = document.getElementById('tab-btn-' + tabId);

        if (activePane) activePane.classList.remove('hidden');
        if (activeBtn) {
            activeBtn.classList.remove('border-transparent', 'text-default-500');
            activeBtn.classList.add('border-primary', 'text-primary');
            const badge = activeBtn.querySelector('span:last-child');
            if (badge) {
                badge.className = 'px-2 py-0.5 rounded-full text-[10px] bg-primary/10 text-primary';
            }
        }

        // Store active tab in URL hash
        window.location.hash = tabId;
    }

    // Modal helpers
    function openModal(id) {
        const m = document.getElementById(id);
        if (m) m.classList.remove('hidden');
        if (window.lucide) lucide.createIcons();
    }

    function closeModal(id) {
        const m = document.getElementById(id);
        if (m) m.classList.add('hidden');
    }

    // Populate Edit Year Modal
    function openEditYearModal(id, name, startDate, endDate, isActive) {
        document.getElementById('form-edit-year').action = `/staff/academic/years/${id}`;
        document.getElementById('edit_year_name').value = name;
        document.getElementById('edit_year_start').value = startDate;
        document.getElementById('edit_year_end').value = endDate;
        document.getElementById('edit_year_active').checked = isActive;
        openModal('modal-edit-year');
    }

    // Populate Edit Term Modal
    function openEditTermModal(id, yearId, name, code, startDate, endDate, isActive) {
        document.getElementById('form-edit-term').action = `/staff/academic/terms/${id}`;
        document.getElementById('edit_term_year_id').value = yearId;
        document.getElementById('edit_term_name').value = name;
        document.getElementById('edit_term_code').value = code;
        document.getElementById('edit_term_start').value = startDate;
        document.getElementById('edit_term_end').value = endDate;
        document.getElementById('edit_term_active').checked = isActive;
        openModal('modal-edit-term');
    }

    // Populate Edit Class Modal
    function openEditClassModal(id, yearId, deptId, name, code, capacity, isActive) {
        document.getElementById('form-edit-class').action = `/staff/academic/classes/${id}`;
        document.getElementById('edit_class_year_id').value = yearId;
        document.getElementById('edit_class_dept_id').value = deptId || '';
        document.getElementById('edit_class_name').value = name;
        document.getElementById('edit_class_code').value = code;
        document.getElementById('edit_class_capacity').value = capacity;
        document.getElementById('edit_class_active').checked = isActive;
        openModal('modal-edit-class');
    }

    // Populate Edit Department Modal
    function openEditDepartmentModal(id, code, name, level, description) {
        document.getElementById('form-edit-department').action = `/staff/academic/departments/${id}`;
        document.getElementById('edit_dept_code').value = code;
        document.getElementById('edit_dept_name').value = name;
        document.getElementById('edit_dept_level').value = level;
        document.getElementById('edit_dept_desc').value = description;
        openModal('modal-edit-department');
    }

    // Populate Edit Subject Modal
    function openEditSubjectModal(id, deptId, code, name, description, isActive) {
        document.getElementById('form-edit-subject').action = `/staff/academic/subjects/${id}`;
        document.getElementById('edit_subject_dept_id').value = deptId || '';
        document.getElementById('edit_subject_code').value = code;
        document.getElementById('edit_subject_name').value = name;
        document.getElementById('edit_subject_desc').value = description;
        document.getElementById('edit_subject_active').checked = isActive;
        openModal('modal-edit-subject');
    }

    // Restore active tab from hash on page load (defaults to 'years' if no hash)
    document.addEventListener('DOMContentLoaded', function() {
        const hash = window.location.hash.replace('#', '');
        if (hash && ['years', 'departments', 'classes', 'subjects'].includes(hash)) {
            switchTab(hash);
        }
    });
</script>
@endpush
@endsection
