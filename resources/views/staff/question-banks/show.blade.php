@extends('layouts.staff')

@section('title', $questionBank->name . '')
@section('page-parent', 'Bank Soal')
@section('page-title', $questionBank->name)
@section('page-subtitle', 'Kode: ' . $questionBank->code . ' • Mapel: ' . ($questionBank->subject?->name ?? 'Umum') . ' • Penyusun: ' . ($questionBank->author?->name ?? 'Staf'))

@section('page-actions')
    <button type="button" onclick="document.getElementById('modal-edit-bank-detail').classList.remove('hidden')" class="btn btn-sm bg-white hover:bg-amber-50 text-default-700 hover:text-amber-700 border border-default-200 rounded font-semibold shadow-xs flex items-center gap-1.5 transition-all cursor-pointer" title="Edit Metadata Bank Soal">
        <i data-lucide="settings-2" class="size-4"></i>
        <span>Edit Bank</span>
    </button>

    <a href="{{ route('staff.question-banks.export-docx', $questionBank) }}" class="btn btn-sm bg-primary/10 text-primary hover:bg-primary hover:text-white rounded font-semibold shadow-xs flex items-center gap-1.5 transition-all" title="Ekspor Naskah Soal Lengkap ke Format Microsoft Word (.docx)">
        <i data-lucide="file-text" class="size-4"></i>
        <span>Ekspor Word (.docx)</span>
    </a>

    <a href="{{ route('staff.question-banks.export-zip', $questionBank) }}" class="btn btn-sm bg-purple-500/10 text-purple-600 hover:bg-purple-600 hover:text-white rounded font-semibold shadow-xs flex items-center gap-1.5 transition-all" title="Ekspor Paket Media Bundle ZIP (Soal + Lampiran Gambar/Audio)">
        <i data-lucide="archive" class="size-4"></i>
        <span>Ekspor ZIP Bundle</span>
    </a>

    <a href="{{ route('staff.question-banks.export-csv', $questionBank) }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 rounded font-semibold shadow-xs flex items-center gap-1.5 transition-all">
        <i data-lucide="download" class="size-4 text-default-500"></i>
        <span>Ekspor CSV</span>
    </a>

    <button onclick="document.getElementById('modal-import-csv').classList.toggle('hidden')" class="btn btn-sm bg-info/10 text-info hover:bg-info hover:text-white rounded font-semibold shadow-xs flex items-center gap-1.5 transition-all cursor-pointer">
        <i data-lucide="upload" class="size-4"></i>
        <span>Impor Soal</span>
    </button>

    <button onclick="document.getElementById('modal-stimulus').classList.toggle('hidden')" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-800 rounded font-semibold shadow-xs flex items-center gap-1.5 transition-all cursor-pointer">
        <i data-lucide="book-open" class="size-4"></i>
        <span>+ Stimulus</span>
    </button>

    <a href="{{ route('staff.question-banks.questions.create', $questionBank) }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded font-semibold shadow-xs flex items-center gap-1.5 transition-all">
        <i data-lucide="plus" class="size-4"></i>
        <span>+ Tambah Soal</span>
    </a>
@endsection

@section('content')
<div class="space-y-6">

    <!-- Stimuli Accordion / Cards if any -->
    @if ($questionBank->stimuli->isNotEmpty())
        <div class="bg-white border border-default-200 rounded-md p-5 shadow-xs">
            <h2 class="text-xs font-bold text-default-700 uppercase tracking-wider mb-3">Stimulus / Wacana Bersama ({{ $questionBank->stimuli->count() }})</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach ($questionBank->stimuli as $stimulus)
                    <div class="p-3.5 rounded border border-default-200 bg-default-50/60 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <span class="font-bold text-xs text-default-800 line-clamp-1">{{ $stimulus->title }}</span>
                                @if ($stimulus->media_type)
                                    <span class="px-1.5 py-0.5 rounded text-[10px] font-mono bg-indigo-100 text-indigo-700 uppercase font-semibold">
                                        {{ $stimulus->media_type }}
                                    </span>
                                @endif
                            </div>
                            @if (\App\Services\MediaStorageService::isAudioPath($stimulus->media_path, $stimulus->media_type) && $stimulus->media_url)
                                <div class="my-2 p-1.5 bg-slate-100 border border-default-200 rounded">
                                    <audio controls class="w-full h-7" preload="metadata" src="{{ $stimulus->media_url }}" onerror="this.nextElementSibling.classList.remove('hidden')"></audio>
                                    <p class="hidden text-[10px] text-rose-600 mt-1 font-medium">Audio stimulus gagal dimuat.</p>
                                </div>
                            @elseif (\App\Services\MediaStorageService::isImagePath($stimulus->media_path, $stimulus->media_type) && $stimulus->media_url)
                                <div class="my-2">
                                    <img src="{{ $stimulus->media_url }}" alt="{{ $stimulus->title }}" class="max-h-24 rounded border border-default-200 object-contain">
                                </div>
                            @endif
                            <p class="text-[11px] text-default-500 line-clamp-2 mt-1">{{ strip_tags($stimulus->content) }}</p>
                        </div>
                        <div class="pt-2 mt-2 border-t border-default-200 flex items-center justify-between text-[11px] text-default-400">
                            <span>{{ $stimulus->questions()->count() }} Soal Terhubung</span>
                            <div class="flex items-center gap-2.5">
                                <button type="button" onclick="openEditStimulusModal({{ $stimulus->id }}, {{ json_encode($stimulus->title) }}, {{ json_encode($stimulus->content) }}, {{ json_encode($stimulus->media_url) }}, {{ json_encode($stimulus->media_type) }})" class="text-primary hover:underline font-semibold cursor-pointer">Edit</button>
                                <form method="POST" action="{{ route('staff.stimuli.destroy', $stimulus) }}" class="inline" onsubmit="return confirm('Hapus stimulus ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:underline cursor-pointer">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Questions Table -->
    <x-cbt.card flush title="Daftar Butir Soal ({{ $questions->total() }})" subtitle="Soal-soal yang tersimpan pada bank soal ini.">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] divide-y divide-default-200/80 text-left text-xs" id="table-bank-questions">
                <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                    <tr>
                        <th class="ps-4 sm:ps-6 pe-3 py-3 whitespace-nowrap">Kode & Versi</th>
                        <th class="px-3 py-3 whitespace-nowrap">Tipe Soal</th>
                        <th class="px-3 py-3 whitespace-nowrap">Konten Pertanyaan</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Tingkat</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Bobot</th>
                        <th class="px-3 py-3 whitespace-nowrap">Stimulus</th>
                        <th class="ps-3 pe-4 sm:pe-6 py-3 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200/70">
                    @forelse ($questions as $q)
                        <tr class="hover:bg-default-50/60 transition-colors">
                            <td class="ps-4 sm:ps-6 pe-3 py-3.5 whitespace-nowrap">
                                <div class="font-mono font-bold text-default-900 whitespace-nowrap">{{ $q->code }}</div>
                                <div class="text-[10px] text-default-400 font-medium whitespace-nowrap">Versi #{{ $q->version }}</div>
                            </td>
                            <td class="px-3 py-3.5 whitespace-nowrap">
                                @php
                                    $typeLabels = [
                                        'multiple_choice' => 'Pilihan Ganda',
                                        'multiple_choice_complex' => 'PG Kompleks',
                                        'true_false' => 'Benar / Salah',
                                        'short_answer' => 'Isian Singkat',
                                        'numeric' => 'Numerik',
                                        'matching' => 'Menjodohkan',
                                        'essay' => 'Esai / Uraian',
                                    ];
                                @endphp
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-primary/10 text-primary border border-primary/20">
                                    {{ $typeLabels[$q->type] ?? $q->type }}
                                </span>
                                @if ($q->is_rtl)
                                    <span class="px-1.5 py-0.5 rounded text-[9px] font-bold bg-amber-100 text-amber-800 ml-1">RTL Arab</span>
                                @endif
                            </td>
                            <td class="px-3 py-3.5 max-w-md">
                                @if ($q->media_url)
                                    @if (\App\Services\MediaStorageService::isAudioPath($q->media_path, $q->media_type))
                                        <div class="mb-2 p-1.5 rounded bg-indigo-50/70 border border-indigo-200/80">
                                            <audio controls preload="metadata" src="{{ $q->media_url }}" class="w-full h-7" onerror="this.nextElementSibling.classList.remove('hidden')"></audio>
                                            <span class="hidden text-[10px] text-rose-600 font-medium">Audio soal gagal dimuat.</span>
                                        </div>
                                    @elseif (\App\Services\MediaStorageService::isImagePath($q->media_path, $q->media_type))
                                        <div class="mb-1.5">
                                            <img src="{{ $q->media_url }}" alt="Media {{ $q->code }}" class="max-h-14 rounded border border-default-200 object-contain">
                                        </div>
                                    @endif
                                @endif
                                <div class="text-default-800 line-clamp-2 {{ $q->is_rtl ? 'text-right font-serif' : '' }}" dir="{{ $q->is_rtl ? 'rtl' : 'ltr' }}">
                                    {{ strip_tags($q->content) }}
                                </div>
                                <div class="text-[11px] text-default-400 mt-0.5">
                                    {{ $q->options->count() }} Pilihan Jawaban
                                </div>
                            </td>
                            <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                @if ($q->difficulty === 'easy')
                                    <x-cbt.badge color="success">Mudah</x-cbt.badge>
                                @elseif ($q->difficulty === 'hard')
                                    <x-cbt.badge color="danger">Sukar</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="warning">Sedang</x-cbt.badge>
                                @endif
                            </td>
                            <td class="px-3 py-3.5 text-center font-bold text-default-800 whitespace-nowrap">{{ $q->weight }}</td>
                            <td class="px-3 py-3.5 text-default-500 whitespace-nowrap">
                                {{ $q->stimulus?->title ?? '-' }}
                            </td>
                            <td class="ps-3 pe-4 sm:pe-6 py-3.5 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-1.5">
                                    <a href="{{ route('staff.questions.show', $q) }}" class="btn btn-icon size-8 rounded border border-default-200 bg-white hover:text-primary hover:border-primary/40 hover:bg-primary/5 shadow-2xs transition" title="Pratinjau & Riwayat Versi">
                                        <i data-lucide="eye" class="size-4"></i>
                                    </a>

                                    <a href="{{ route('staff.questions.edit', $q) }}" class="btn btn-icon size-8 rounded border border-default-200 bg-white hover:text-amber-600 hover:border-amber-300 hover:bg-amber-50 shadow-2xs transition" title="Edit Soal (Bentuk Versi Baru)">
                                        <i data-lucide="edit" class="size-4"></i>
                                    </a>

                                    <form method="POST" action="{{ route('staff.questions.duplicate', $q) }}" class="inline">
                                        @csrf
                                        <button type="submit" class="btn btn-icon size-8 rounded border border-default-200 bg-white hover:text-indigo-600 hover:border-indigo-300 hover:bg-indigo-50 shadow-2xs transition cursor-pointer" title="Duplikasi Soal">
                                            <i data-lucide="copy" class="size-4"></i>
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('staff.questions.destroy', $q) }}" class="inline" onsubmit="return confirm('Hapus butir soal ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon size-8 rounded border border-default-200 bg-white hover:text-rose-600 hover:border-rose-300 hover:bg-rose-50 shadow-2xs transition cursor-pointer" title="Hapus Soal">
                                            <i data-lucide="trash-2" class="size-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 px-4 sm:px-6 text-center text-default-400">
                                <x-cbt.empty-state :bordered="false" title="Belum Ada Butir Soal" message="Klik '+ Tambah Soal Baru' atau gunakan fitur 'Impor CSV' untuk memasukkan soal." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination & Summary Footer -->
        <div class="px-4 sm:px-6 py-3.5 border-t border-default-200/80 bg-default-50/30 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-default-500">
            <div>
                Menampilkan <span class="font-bold text-default-800">{{ $questions->firstItem() ?? 0 }}</span> sampai <span class="font-bold text-default-800">{{ $questions->lastItem() ?? 0 }}</span> dari <span class="font-bold text-default-800">{{ $questions->total() }}</span> butir soal
            </div>

            <div class="flex items-center gap-2">
                {{ $questions->links() }}
            </div>
        </div>
    </x-cbt.card>
</div>

<!-- Modal Stimulus Baru -->
<div id="modal-stimulus" class="hidden fixed inset-0 bg-default-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="card max-w-lg w-full max-h-[90vh] flex flex-col p-5 sm:p-6 shadow-xl border border-default-200 overflow-y-auto">
        <div class="flex items-center justify-between mb-4 border-b border-default-100 pb-3">
            <h3 class="text-sm font-bold text-default-800">Tambah Stimulus / Wacana Bersama</h3>
            <button type="button" onclick="document.getElementById('modal-stimulus').classList.add('hidden')" class="btn btn-icon size-7 rounded text-default-400 hover:text-default-600 hover:bg-default-100 cursor-pointer">
                <i data-lucide="x" class="size-4"></i>
            </button>
        </div>

        <form method="POST" action="{{ route('staff.question-banks.stimuli.store', $questionBank) }}" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            <div>
                <label class="block font-semibold text-default-700 uppercase tracking-wider mb-1">Judul Stimulus</label>
                <input type="text" name="title" required placeholder="Contoh: Wacana Tafsir Ayat Ahkam"
                    class="form-input w-full h-10 px-3.5 py-2 rounded border-default-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none">
            </div>

            <div>
                <label class="block font-semibold text-default-700 uppercase tracking-wider mb-1">Isi Teks / Wacana</label>
                <textarea name="content" rows="4" required placeholder="Tuliskan teks wacana, kutipan ayat, kasus..."
                    class="form-textarea w-full px-3.5 py-2 rounded border-default-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none"></textarea>
            </div>

            <x-cbt.dropzone
                name="media"
                id="stimulus_media_dropzone"
                label="Lampiran Media (Opsional)"
                accept="image/*,audio/*,video/*,.pdf"
                maxSize="10MB"
                hint="Mendukung gambar, audio listening, video atau PDF (Maks. 10 MB)."
            />

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2.5 pt-3 border-t border-default-100">
                <button type="button" onclick="document.getElementById('modal-stimulus').classList.add('hidden')" class="w-full sm:w-auto px-4 py-2.5 rounded border border-default-200 text-default-700 hover:bg-default-50 font-semibold cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="w-full sm:w-auto px-5 py-2.5 rounded bg-primary hover:bg-primary-hover text-white font-semibold shadow-xs transition cursor-pointer">
                    Simpan Stimulus
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Bank Soal Detail -->
<div id="modal-edit-bank-detail" class="hidden fixed inset-0 bg-default-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="card max-w-lg w-full max-h-[90vh] flex flex-col p-5 sm:p-6 shadow-xl border border-default-200 overflow-y-auto">
        <div class="flex items-center justify-between border-b border-default-100 pb-3 mb-4">
            <h3 class="text-sm font-bold text-default-800">Edit Metadata Bank Soal</h3>
            <button type="button" onclick="document.getElementById('modal-edit-bank-detail').classList.add('hidden')" class="btn btn-icon size-7 rounded text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4"></i>
            </button>
        </div>
        <form method="POST" action="{{ route('staff.question-banks.update', $questionBank) }}" class="space-y-4 text-xs">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-semibold text-default-700 uppercase mb-1">Mata Pelajaran *</label>
                <select name="subject_id" required class="form-select w-full">
                    @foreach (($subjects ?? []) as $s)
                        <option value="{{ $s->id }}" {{ $questionBank->subject_id == $s->id ? 'selected' : '' }}>{{ $s->name }} ({{ $s->code }})</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-semibold text-default-700 uppercase mb-1">Nama Bank Soal *</label>
                <input type="text" name="name" value="{{ $questionBank->name }}" required class="form-input w-full">
            </div>
            <div>
                <label class="block font-semibold text-default-700 uppercase mb-1">Kode Bank Soal *</label>
                <input type="text" name="code" value="{{ $questionBank->code }}" required class="form-input font-mono w-full">
            </div>
            <div>
                <label class="block font-semibold text-default-700 uppercase mb-1">Deskripsi</label>
                <textarea name="description" rows="2" class="form-textarea w-full">{{ $questionBank->description }}</textarea>
            </div>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ $questionBank->is_active ? 'checked' : '' }} class="rounded border-default-300 text-primary size-4">
                <span class="font-semibold text-default-800">Bank Soal Aktif</span>
            </label>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100">
                <button type="button" onclick="document.getElementById('modal-edit-bank-detail').classList.add('hidden')" class="w-full sm:w-auto px-4 py-2 rounded border border-default-200 text-default-700 font-semibold cursor-pointer">Batal</button>
                <button type="submit" class="w-full sm:w-auto px-5 py-2 rounded bg-primary hover:bg-primary-hover text-white font-semibold cursor-pointer">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Stimulus -->
<div id="modal-edit-stimulus" class="hidden fixed inset-0 bg-default-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="card max-w-lg w-full max-h-[90vh] flex flex-col p-5 sm:p-6 shadow-xl border border-default-200 overflow-y-auto">
        <div class="flex items-center justify-between mb-4 border-b border-default-100 pb-3">
            <h3 class="text-sm font-bold text-default-800">Edit Stimulus / Wacana Bersama</h3>
            <button type="button" onclick="document.getElementById('modal-edit-stimulus').classList.add('hidden')" class="btn btn-icon size-7 rounded text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4"></i>
            </button>
        </div>
        <form id="form-edit-stimulus" method="POST" action="" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-semibold text-default-700 uppercase mb-1">Judul Stimulus *</label>
                <input id="edit-stim-title" type="text" name="title" required class="form-input w-full">
            </div>
            <div>
                <label class="block font-semibold text-default-700 uppercase mb-1">Isi Teks / Wacana *</label>
                <textarea id="edit-stim-content" name="content" rows="4" required class="form-textarea w-full"></textarea>
            </div>
            <div id="edit-stim-current-media" class="hidden p-2.5 bg-default-50 border border-default-200 rounded space-y-2">
                <div class="flex items-center justify-between">
                    <span class="font-semibold text-default-700">Media Saat Ini:</span>
                    <label class="inline-flex items-center gap-1.5 text-rose-600 font-semibold cursor-pointer">
                        <input type="checkbox" name="remove_media" value="1" class="rounded border-default-300 text-rose-600 size-3.5">
                        <span>Hapus Media Ini</span>
                    </label>
                </div>
                <div id="edit-stim-media-preview"></div>
            </div>
            <div>
                <label class="block font-semibold text-default-700 uppercase mb-1">Ganti Berkas Media (Opsional)</label>
                <input type="file" name="media" accept="image/*,audio/*,.mp3,.wav,.ogg,.m4a,.aac,.pdf" class="form-input w-full text-xs">
                <p class="text-[11px] text-default-400 mt-1">Mendukung MP3, WAV, OGG, M4A, AAC, PNG/JPG/WebP, dan PDF.</p>
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2.5 pt-3 border-t border-default-100">
                <button type="button" onclick="document.getElementById('modal-edit-stimulus').classList.add('hidden')" class="w-full sm:w-auto px-4 py-2 rounded border border-default-200 text-default-700 font-semibold cursor-pointer">Batal</button>
                <button type="submit" class="w-full sm:w-auto px-5 py-2 rounded bg-primary hover:bg-primary-hover text-white font-semibold cursor-pointer">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Impor Soal (XLSX, CSV, JSON, Media Bundle ZIP, Aiken, GIFT) -->
<div id="modal-import-csv" class="hidden fixed inset-0 bg-default-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="card max-w-3xl w-full max-h-[90vh] flex flex-col p-5 sm:p-6 shadow-xl border border-default-200 space-y-4 overflow-y-auto">
        <div class="flex items-center justify-between border-b border-default-100 pb-3 shrink-0">
            <div>
                <h3 class="text-base font-bold text-default-900">Impor Soal &amp; Media ke Bank Soal</h3>
                <p class="text-[11px] text-default-500">Mendukung 6 format resmi dilengkapi template siap pakai dan pratinjau validasi sebelum impor.</p>
            </div>
            <button type="button" onclick="document.getElementById('modal-import-csv').classList.add('hidden')" class="btn btn-icon size-7 rounded text-default-400 hover:text-default-600 hover:bg-default-100 cursor-pointer">
                <i data-lucide="x" class="size-4"></i>
            </button>
        </div>

        <form id="form-import-questions" method="POST" action="{{ route('staff.question-banks.import-csv', $questionBank) }}" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            <div>
                <label class="block font-bold text-default-800 mb-1">1. Pilih Format Berkas Impor:</label>
                <select name="format" id="importFormatSelector" onchange="switchImportGuide(this.value)" class="form-select w-full rounded border-default-200 text-xs">
                    <option value="xlsx" selected>Excel Spreadsheet Standar (.xlsx)</option>
                    <option value="csv">CSV Tabular UTF-8 Standar (.csv)</option>
                    <option value="json">JSON Terstruktur + Stimulus (.json)</option>
                    <option value="zip">Paket Media Bundle (.zip) - Soal + Lampiran Gambar/Audio</option>
                    <option value="aiken">Format Teks Aiken (.txt) - Pilihan Ganda Ringkas</option>
                    <option value="gift">Format Moodle GIFT (.txt) - Multi-tipe Soal</option>
                </select>
            </div>

            <!-- Guide XLSX -->
            <div id="guide-xlsx" class="p-3.5 bg-emerald-50 border border-emerald-200 rounded text-emerald-950 space-y-2">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <span class="font-bold text-emerald-900">Spesifikasi Format Excel (.xlsx):</span>
                    <a href="{{ route('staff.question-banks.template-xlsx') }}" class="btn btn-sm bg-success hover:bg-success-hover text-white rounded font-bold text-[11px] inline-flex items-center gap-1 shadow-2xs shrink-0">
                        <i data-lucide="download" class="size-3.5"></i>
                        <span>Unduh Template Excel (.xlsx)</span>
                    </a>
                </div>
                <p class="text-[11px] text-emerald-900 leading-relaxed">
                    Baris 1 wajib berisi 13 header baku: <code>Kode Soal | Tipe Soal | Konten Soal | Tingkat Kesulitan | Bobot | RTL (Arab) | Stimulus Judul | Opsi A | Opsi B | Opsi C | Opsi D | Opsi E | Kunci Jawaban</code>.
                    Nilai valid Tipe: <code>multiple_choice, multiple_choice_complex, true_false, short_answer, numeric, matching, essay</code>. Kesulitan: <code>easy, medium, hard</code>.
                </p>
            </div>

            <!-- Guide CSV -->
            <div id="guide-csv" class="hidden p-3.5 bg-indigo-50 border border-indigo-200 rounded text-indigo-950 space-y-2">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <span class="font-bold text-indigo-900">Spesifikasi Format CSV UTF-8 BOM (.csv):</span>
                    <a href="{{ route('staff.question-banks.template-csv') }}" class="btn btn-sm bg-indigo-600 hover:bg-indigo-700 text-white rounded font-bold text-[11px] inline-flex items-center gap-1 shadow-2xs shrink-0">
                        <i data-lucide="download" class="size-3.5"></i>
                        <span>Unduh Template CSV (.csv)</span>
                    </a>
                </div>
                <div class="font-mono text-[10px] bg-white p-2 rounded border border-indigo-200/70 break-all">
                    kode,tipe,konten,kesulitan,bobot,is_rtl,stimulus,opsi_a,opsi_b,opsi_c,opsi_d,opsi_e,kunci
                </div>
                <p class="text-[11px] text-indigo-800">Pemisah koma (<code>,</code>). Kunci pilihan ganda tunggal: <code>A</code>; kompleks: <code>A,C</code>. Kolom <code>is_rtl</code> diisi <code>1</code> untuk teks Arab RTL atau <code>0</code>.</p>
            </div>

            <!-- Guide JSON -->
            <div id="guide-json" class="hidden p-3.5 bg-sky-50 border border-sky-200 rounded text-sky-950 space-y-2">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <span class="font-bold text-sky-900">Spesifikasi Format JSON Terstruktur (.json):</span>
                    <a href="{{ route('staff.question-banks.template-json') }}" class="btn btn-sm bg-sky-600 hover:bg-sky-700 text-white rounded font-bold text-[11px] inline-flex items-center gap-1 shadow-2xs shrink-0">
                        <i data-lucide="download" class="size-3.5"></i>
                        <span>Unduh Template JSON (.json)</span>
                    </a>
                </div>
                <p class="text-[11px] text-sky-900">Mendukung relasi wacana <code>stimuli[]</code> dan butir soal <code>questions[]</code> beserta opsi bobot parsial.</p>
                <pre class="font-mono text-[10px] bg-white p-2.5 rounded border border-sky-200/70 overflow-x-auto">{
  "stimuli": [{ "id": "STIM-01", "title": "Wacana 1", "content": "Isi bacaan..." }],
  "questions": [{
    "code": "Q-01", "type": "multiple_choice", "content": "Pertanyaan?",
    "difficulty": "medium", "weight": 1.0, "stimulus_id": "STIM-01",
    "options": [
      { "option_key": "A", "content": "Benar", "is_correct": true },
      { "option_key": "B", "content": "Salah", "is_correct": false }
    ]
  }]
}</pre>
            </div>

            <!-- Guide ZIP -->
            <div id="guide-zip" class="hidden p-3.5 bg-purple-50 border border-purple-200 rounded text-purple-950 space-y-2.5">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <span class="font-bold text-purple-900">Struktur Resmi Paket Media Bundle (.zip):</span>
                    <a href="{{ route('staff.question-banks.template-zip') }}" class="btn btn-sm bg-purple-600 hover:bg-purple-700 text-white rounded font-bold text-[11px] inline-flex items-center gap-1 shadow-2xs shrink-0">
                        <i data-lucide="download" class="size-3.5"></i>
                        <span>Unduh Contoh Media Bundle (.zip)</span>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2.5">
                    <div class="bg-white p-2.5 rounded border border-purple-200/70">
                        <div class="font-bold text-[11px] text-purple-900 mb-1">Susunan Direktori ZIP:</div>
                        <pre class="font-mono text-[10px] leading-relaxed text-default-800">media-bundle.zip
├── manifest.json     (metadata &amp; stimuli)
├── questions.json    (daftar soal &amp; opsi)
└── media/
    ├── audio/
    │   └── listening-001.wav
    └── images/
        └── diagram-001.svg</pre>
                    </div>
                    <div class="bg-white p-2.5 rounded border border-purple-200/70 space-y-1 text-[11px]">
                        <div class="font-bold text-purple-900">Aturan Referensi Path:</div>
                        <ul class="list-disc list-inside space-y-0.5 text-default-700">
                            <li><code>media_type</code>: <code>"audio"</code> atau <code>"image"</code>.</li>
                            <li><code>media_path</code>: cocokkan persis path di folder <code>media/</code> (misal <code>"media/audio/listening-001.wav"</code>).</li>
                            <li>Format didukung: MP3, WAV, OGG, M4A, AAC, WebM, PNG, JPG, WebP, SVG, PDF.</li>
                            <li>Jika terjadi kegagalan, transaksi database &amp; media di-rollback otomatis (tanpa data yatim).</li>
                        </ul>
                    </div>
                </div>
                <pre class="font-mono text-[10px] bg-white p-2.5 rounded border border-purple-200/70 overflow-x-auto">// manifest.json (stimuli) &amp; questions.json (questions):
{
  "stimuli": [{ "title": "Audio Part A", "media_type": "audio", "media_path": "media/audio/listening-001.wav", "content": "Transkrip..." }],
  "questions": [{
    "code": "Q-01", "type": "multiple_choice", "content": "Dengarkan audio berikut:",
    "stimulus_title": "Audio Part A", "media_type": "audio", "media_path": "media/audio/listening-001.wav",
    "options": [{ "option_key": "A", "content": "Jawaban Benar", "is_correct": true }]
  }]
}</pre>
            </div>

            <!-- Guide Aiken -->
            <div id="guide-aiken" class="hidden p-3.5 bg-emerald-50 border border-emerald-200 rounded text-emerald-950 space-y-2">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <span class="font-bold text-emerald-900">Contoh Format Teks Aiken (.txt):</span>
                    <a href="{{ route('staff.question-banks.template-aiken') }}" class="btn btn-sm bg-emerald-600 hover:bg-emerald-700 text-white rounded font-bold text-[11px] inline-flex items-center gap-1 shadow-2xs shrink-0">
                        <i data-lucide="download" class="size-3.5"></i>
                        <span>Unduh Template Aiken (.txt)</span>
                    </a>
                </div>
                <pre class="font-mono text-[10px] bg-white p-2 rounded border border-emerald-200/70 whitespace-pre-wrap">Ibu kota negara Indonesia adalah...
A. Surabaya
B. Bandung
C. Jakarta
D. Medan
ANSWER: C</pre>
                <p class="text-[11px] text-emerald-800">Setiap soal wajib diakhiri <code>ANSWER: X</code> dan dipisahkan 1 baris kosong.</p>
            </div>

            <!-- Guide GIFT -->
            <div id="guide-gift" class="hidden p-3.5 bg-amber-50 border border-amber-200 rounded text-amber-950 space-y-2">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <span class="font-bold text-amber-900">Contoh Format Moodle GIFT (.txt):</span>
                    <a href="{{ route('staff.question-banks.template-gift') }}" class="btn btn-sm bg-amber-600 hover:bg-amber-700 text-white rounded font-bold text-[11px] inline-flex items-center gap-1 shadow-2xs shrink-0">
                        <i data-lucide="download" class="size-3.5"></i>
                        <span>Unduh Template GIFT (.txt)</span>
                    </a>
                </div>
                <pre class="font-mono text-[10px] bg-white p-2 rounded border border-amber-200/70 whitespace-pre-wrap">::Q-01:: Siapa penemu lampu pijar? {=Thomas Edison ~Albert Einstein ~Nikola Tesla}
Matahari terbit dari sebelah barat. {F}
Sebutkan fungsi mitokondria! {}</pre>
                <p class="text-[11px] text-amber-800">Gunakan <code>=</code> untuk jawaban benar, <code>~</code> untuk salah, <code>{T}/{F}</code> untuk Benar/Salah, dan <code>{}</code> untuk Esai.</p>
            </div>

            <x-cbt.dropzone
                name="file"
                id="csv_question_dropzone"
                label="2. Pilih Berkas Soal"
                accept=".xlsx,.zip,.csv,.json,.txt,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,application/json,text/csv,text/plain"
                maxSize="25MB"
                :required="true"
                hint="Unggah berkas (.xlsx, .csv, .json, .zip, atau .txt) sesuai format pilihan di atas."
            />

            <!-- Area Pratinjau & Validasi Sebelum Impor -->
            <div id="importPreviewResult" class="hidden p-3.5 rounded-lg border text-xs space-y-2"></div>

            <div class="flex flex-col-reverse sm:flex-row justify-between items-stretch sm:items-center gap-2.5 pt-3 border-t border-default-100">
                <button type="button" onclick="runImportPreview()" class="w-full sm:w-auto px-4 py-2.5 rounded border border-indigo-300 bg-indigo-50 hover:bg-indigo-100 text-indigo-800 font-semibold cursor-pointer inline-flex items-center justify-center gap-1.5">
                    <i data-lucide="check-square" class="size-3.5"></i>
                    <span>Pratinjau &amp; Validasi Berkas</span>
                </button>
                <div class="flex flex-col-reverse sm:flex-row gap-2">
                    <button type="button" onclick="document.getElementById('modal-import-csv').classList.add('hidden')" class="w-full sm:w-auto px-4 py-2.5 rounded border border-default-200 text-default-700 hover:bg-default-50 font-semibold cursor-pointer">
                        Batal
                    </button>
                    <button type="submit" class="w-full sm:w-auto px-5 py-2.5 rounded bg-primary hover:bg-primary-hover text-white font-semibold shadow-xs transition cursor-pointer">
                        Mulai Impor Soal
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function switchImportGuide(format) {
    ['xlsx', 'csv', 'json', 'zip', 'aiken', 'gift'].forEach(f => {
        const el = document.getElementById('guide-' + f);
        if (el) el.classList.add('hidden');
    });
    const target = document.getElementById('guide-' + format);
    if (target) target.classList.remove('hidden');
}

function openEditStimulusModal(id, title, content, mediaUrl, mediaType) {
    document.getElementById('form-edit-stimulus').action = '{{ url('staff/stimuli') }}/' + id;
    document.getElementById('edit-stim-title').value = title || '';
    document.getElementById('edit-stim-content').value = content || '';
    const mediaBox = document.getElementById('edit-stim-current-media');
    const previewBox = document.getElementById('edit-stim-media-preview');
    if (mediaUrl) {
        mediaBox.classList.remove('hidden');
        if (mediaType === 'audio' || /\.(mp3|wav|ogg|m4a|aac|webm)$/i.test(mediaUrl)) {
            previewBox.innerHTML = `<audio controls preload="metadata" src="${mediaUrl}" class="w-full h-8"></audio>`;
        } else {
            previewBox.innerHTML = `<img src="${mediaUrl}" alt="Media Stimulus" class="max-h-24 rounded border border-default-200 object-contain">`;
        }
    } else {
        mediaBox.classList.add('hidden');
        previewBox.innerHTML = '';
    }
    document.getElementById('modal-edit-stimulus').classList.remove('hidden');
    if (window.lucide) lucide.createIcons();
}

async function runImportPreview() {
    const form = document.getElementById('form-import-questions');
    const fileInput = form.querySelector('input[type="file"][name="file"]');
    const format = document.getElementById('importFormatSelector').value;
    const box = document.getElementById('importPreviewResult');

    if (!fileInput || !fileInput.files || fileInput.files.length === 0) {
        box.className = 'p-3.5 rounded-lg border border-amber-300 bg-amber-50 text-amber-900 text-xs';
        box.textContent = 'Pilih berkas soal terlebih dahulu sebelum menjalankan validasi pratinjau.';
        box.classList.remove('hidden');
        return;
    }

    const fd = new FormData();
    fd.append('file', fileInput.files[0]);
    fd.append('format', format);
    fd.append('_token', '{{ csrf_token() }}');

    box.className = 'p-3.5 rounded-lg border border-default-200 bg-default-50 text-default-700 text-xs';
    box.textContent = 'Memeriksa struktur berkas, daftar soal, dan referensi media...';
    box.classList.remove('hidden');

    try {
        const res = await fetch('{{ route('staff.question-banks.import-preview', $questionBank) }}', {
            method: 'POST',
            body: fd,
            headers: { 'Accept': 'application/json' }
        });
        const data = await res.json();
        const isOk = !!data.valid;
        box.className = isOk
            ? 'p-3.5 rounded-lg border border-emerald-300 bg-emerald-50 text-emerald-950 text-xs space-y-2'
            : 'p-3.5 rounded-lg border border-rose-300 bg-rose-50 text-rose-950 text-xs space-y-2';

        let html = `<div class="font-bold">${isOk ? 'Validasi Lulus' : 'Ditemukan Kendala Struktur'}: Total ${data.total ?? 0} soal (Valid: ${data.valid_count ?? 0}, Gagal: ${data.invalid_count ?? 0})</div>`;
        if (data.media_files && data.media_files.length) {
            html += `<div class="text-[11px]">Media di dalam arsip: <strong>${data.media_files.length} berkas</strong> (${data.media_files.slice(0, 4).join(', ')}${data.media_files.length > 4 ? '...' : ''})</div>`;
        }
        if (data.duplicate_codes && data.duplicate_codes.length) {
            html += `<div class="text-[11px] text-amber-800">Peringatan kode duplikat sudah ada di bank: ${data.duplicate_codes.join(', ')}</div>`;
        }
        if (data.errors && data.errors.length) {
            html += '<ul class="list-disc list-inside space-y-1 text-[11px] text-rose-800">';
            data.errors.forEach(e => {
                html += `<li><strong>[${e.location}]</strong> ${e.message} <em>(Solusi: ${e.fix})</em></li>`;
            });
            html += '</ul>';
        }
        box.innerHTML = html;
    } catch (err) {
        box.className = 'p-3.5 rounded-lg border border-rose-300 bg-rose-50 text-rose-900 text-xs';
        box.textContent = 'Gagal menghubungi server validasi pratinjau.';
    }
}
</script>
@endsection

