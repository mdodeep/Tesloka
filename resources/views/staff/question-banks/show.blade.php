@extends('layouts.staff')

@section('title', $questionBank->name . ' — TESLOKA CBT')
@section('page-parent', 'Bank Soal')
@section('page-title', $questionBank->name)
@section('page-subtitle', 'Kode: ' . $questionBank->code . ' • Mapel: ' . ($questionBank->subject?->name ?? 'Umum') . ' • Penyusun: ' . ($questionBank->author?->name ?? 'Staf'))

@section('page-actions')
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
                            @if ($stimulus->media_type === 'audio' && $stimulus->media_url)
                                <div class="my-2 p-1.5 bg-slate-100 border border-default-200 rounded">
                                    <audio controls class="w-full h-7" preload="none" src="{{ $stimulus->media_url }}"></audio>
                                </div>
                            @elseif ($stimulus->media_type === 'image' && $stimulus->media_url)
                                <div class="my-2">
                                    <img src="{{ $stimulus->media_url }}" alt="{{ $stimulus->title }}" class="max-h-24 rounded border border-default-200 object-contain">
                                </div>
                            @endif
                            <p class="text-[11px] text-default-500 line-clamp-2 mt-1">{{ strip_tags($stimulus->content) }}</p>
                        </div>
                        <div class="pt-2 mt-2 border-t border-default-200 flex items-center justify-between text-[11px] text-default-400">
                            <span>{{ $stimulus->questions()->count() }} Soal Terhubung</span>
                            <form method="POST" action="{{ route('staff.stimuli.destroy', $stimulus) }}" class="inline" onsubmit="return confirm('Hapus stimulus ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-600 hover:underline">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Questions Table -->
    <div class="bg-white border border-default-200 rounded-md p-6 shadow-xs space-y-4">
        <div class="flex items-center justify-between border-b border-default-100 pb-4">
            <div>
                <h2 class="text-sm font-bold text-default-800">Daftar Butir Soal ({{ $questions->total() }})</h2>
                <p class="text-xs text-default-400">Soal-soal yang tersimpan pada bank soal ini.</p>
            </div>
        </div>

        <div class="overflow-x-auto -mx-3.5 sm:-mx-6 -my-4">
            <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-bank-questions">
                <thead class="bg-default-50/75 border-y border-default-200/80">
                    <tr class="text-[11px] font-semibold uppercase tracking-wider text-default-500 whitespace-nowrap">
                        <th class="py-3.5 px-6 border-b border-default-200 whitespace-nowrap">Kode & Versi</th>
                        <th class="py-3.5 px-4 border-b border-default-200 whitespace-nowrap">Tipe Soal</th>
                        <th class="py-3.5 px-4 border-b border-default-200 whitespace-nowrap">Konten Pertanyaan</th>
                        <th class="py-3.5 px-4 border-b border-default-200 text-center whitespace-nowrap">Tingkat</th>
                        <th class="py-3.5 px-4 border-b border-default-200 text-center whitespace-nowrap">Bobot</th>
                        <th class="py-3.5 px-4 border-b border-default-200 whitespace-nowrap">Stimulus</th>
                        <th class="py-3.5 px-6 border-b border-default-200 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200 dark:divide-white/14">
                    @forelse ($questions as $q)
                        <tr class="hover:bg-default-50/80 transition">
                            <td class="py-3.5 px-6 whitespace-nowrap">
                                <div class="font-mono font-bold text-default-900 whitespace-nowrap">{{ $q->code }}</div>
                                <div class="text-[10px] text-default-400 font-medium whitespace-nowrap">Versi #{{ $q->version }}</div>
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap">
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
                            <td class="py-3.5 px-4 max-w-md">
                                <div class="text-default-800 line-clamp-2 {{ $q->is_rtl ? 'text-right font-serif' : '' }}" dir="{{ $q->is_rtl ? 'rtl' : 'ltr' }}">
                                    {{ strip_tags($q->content) }}
                                </div>
                                <div class="text-[11px] text-default-400 mt-0.5">
                                    {{ $q->options->count() }} Pilihan Jawaban
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                @if ($q->difficulty === 'easy')
                                    <x-cbt.badge color="success">Mudah</x-cbt.badge>
                                @elseif ($q->difficulty === 'hard')
                                    <x-cbt.badge color="danger">Sukar</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="warning">Sedang</x-cbt.badge>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-center font-bold text-default-800">{{ $q->weight }}</td>
                            <td class="py-3.5 px-4 text-default-500">
                                {{ $q->stimulus?->title ?? '-' }}
                            </td>
                            <td class="py-3.5 px-6 text-right">
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
                            <td colspan="7" class="py-8 text-center text-default-400">
                                <x-cbt.empty-state title="Belum Ada Butir Soal" description="Klik '+ Tambah Soal Baru' atau gunakan fitur 'Impor CSV' untuk memasukkan soal." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination & Summary Footer -->
        <div class="pt-4 border-t border-default-100 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-default-500">
            <div>
                Menampilkan <span class="font-bold text-default-800">{{ $questions->firstItem() ?? 0 }}</span> sampai <span class="font-bold text-default-800">{{ $questions->lastItem() ?? 0 }}</span> dari <span class="font-bold text-default-800">{{ $questions->total() }}</span> butir soal
            </div>

            <div class="flex items-center gap-2">
                {{ $questions->links() }}
            </div>
        </div>
    </div>
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

<!-- Modal Impor Soal (CSV, XLSX, Aiken, GIFT, ZIP) -->
<div id="modal-import-csv" class="hidden fixed inset-0 bg-default-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="card max-w-lg w-full max-h-[90vh] flex flex-col p-5 sm:p-6 shadow-xl border border-default-200 space-y-4 overflow-y-auto">
        <div class="flex items-center justify-between border-b border-default-100 pb-3">
            <div>
                <h3 class="text-base font-bold text-default-900">Impor Soal ke Bank</h3>
                <p class="text-[11px] text-default-500">Mendukung format Excel (.xlsx), CSV, Media Bundle ZIP, Aiken, dan Moodle GIFT</p>
            </div>
            <button type="button" onclick="document.getElementById('modal-import-csv').classList.add('hidden')" class="btn btn-icon size-7 rounded text-default-400 hover:text-default-600 hover:bg-default-100 cursor-pointer">
                <i data-lucide="x" class="size-4"></i>
            </button>
        </div>

        <form method="POST" action="{{ route('staff.question-banks.import-csv', $questionBank) }}" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            <div>
                <label class="block font-bold text-default-800 mb-1">Pilih Format Berkas Impor:</label>
                <select name="format" id="importFormatSelector" onchange="switchImportGuide(this.value)" class="form-select w-full rounded border-default-200 text-xs">
                    <option value="xlsx" selected>Excel Spreadsheet Standar TESLOKA (.xlsx)</option>
                    <option value="csv">CSV Tabular Standar TESLOKA (.csv)</option>
                    <option value="zip">Paket Media Bundle (.zip) - Soal + Lampiran Media</option>
                    <option value="aiken">Format Teks Aiken (.txt) - Pilihan Ganda Ringkas</option>
                    <option value="gift">Format Moodle GIFT (.txt) - Multi-tipe Soal</option>
                </select>
            </div>

            <!-- Guide XLSX -->
            <div id="guide-xlsx" class="p-3 bg-emerald-50 border border-emerald-200 rounded text-emerald-950 space-y-2">
                <div class="flex items-center justify-between">
                    <span class="font-bold text-emerald-900">Format Excel (.xlsx) Standar:</span>
                    <a href="{{ route('staff.question-banks.template-xlsx') }}" class="btn btn-sm bg-success hover:bg-success-hover text-white rounded font-bold text-[10px] inline-flex items-center gap-1 shadow-2xs">
                        <i data-lucide="download" class="size-3"></i>
                        <span>Unduh Template Excel</span>
                    </a>
                </div>
                <p class="text-[11px] text-emerald-800">Gunakan berkas template resmi dengan 13 kolom baku (Kode, Tipe, Konten, Kesulitan, Bobot, RTL, Stimulus, Opsi A-E, dan Kunci).</p>
            </div>

            <!-- Guide CSV -->
            <div id="guide-csv" class="hidden p-3 bg-indigo-50 border border-indigo-100 rounded text-indigo-900 space-y-1">
                <div class="font-bold">Format Kolom CSV:</div>
                <div class="font-mono text-[10px] bg-white p-2 rounded-lg border border-indigo-200/50 break-all">
                    kode,tipe,konten,kesulitan,bobot,is_rtl,stimulus,opsi_a,opsi_b,opsi_c,opsi_d,opsi_e,kunci
                </div>
                <p class="text-[11px] text-indigo-700">Contoh kunci: <code>A</code> (tunggal) atau <code>A,C</code> (kompleks).</p>
            </div>

            <!-- Guide ZIP -->
            <div id="guide-zip" class="hidden p-3 bg-purple-50 border border-purple-200 rounded text-purple-950 space-y-1">
                <div class="font-bold text-purple-900">Paket Media Bundle (.zip):</div>
                <p class="text-[11px] text-purple-800 leading-relaxed">Arsip ZIP yang berisi <code>manifest.json</code> atau <code>questions.json</code> beserta folder <code>media/</code> berisi gambar/audio listening stimulus.</p>
            </div>

            <!-- Guide Aiken -->
            <div id="guide-aiken" class="hidden p-3 bg-emerald-50 border border-emerald-100 rounded text-emerald-900 space-y-1">
                <div class="font-bold">Contoh Format Aiken (.txt):</div>
                <pre class="font-mono text-[10px] bg-white p-2 rounded-lg border border-emerald-200/50 whitespace-pre-wrap">Ibu kota negara Indonesia adalah...
A. Surabaya
B. Bandung
C. Jakarta
D. Medan
ANSWER: C</pre>
                <p class="text-[11px] text-emerald-700">Setiap soal dipisahkan satu baris kosong.</p>
            </div>

            <!-- Guide GIFT -->
            <div id="guide-gift" class="hidden p-3 bg-amber-50 border border-amber-100 rounded text-amber-900 space-y-1">
                <div class="font-bold">Contoh Format Moodle GIFT (.txt):</div>
                <pre class="font-mono text-[10px] bg-white p-2 rounded-lg border border-amber-200/50 whitespace-pre-wrap">::Judul Soal:: Siapa penemu lampu pijar? {=Thomas Edison ~Albert Einstein ~Nikola Tesla}
Matahari terbit dari sebelah barat. {F}
Sebutkan fungsi mitokondria! {}</pre>
                <p class="text-[11px] text-amber-700">Gunakan <code>=</code> untuk jawaban benar dan <code>~</code> untuk salah.</p>
            </div>

            <x-cbt.dropzone
                name="file"
                id="csv_question_dropzone"
                label="Pilih Berkas Soal"
                accept=".xlsx,.zip,.csv,.txt,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,text/csv,text/plain"
                maxSize="20MB"
                :required="true"
                hint="Unggah berkas (.xlsx, .zip, .csv, atau .txt) sesuai format yang dipilih."
            />

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2.5 pt-3 border-t border-default-100">
                <button type="button" onclick="document.getElementById('modal-import-csv').classList.add('hidden')" class="w-full sm:w-auto px-4 py-2.5 rounded border border-default-200 text-default-700 hover:bg-default-50 font-semibold cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="w-full sm:w-auto px-5 py-2.5 rounded bg-primary hover:bg-primary-hover text-white font-semibold shadow-xs transition cursor-pointer">
                    Mulai Impor Soal
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function switchImportGuide(format) {
    document.getElementById('guide-xlsx').classList.add('hidden');
    document.getElementById('guide-csv').classList.add('hidden');
    document.getElementById('guide-zip').classList.add('hidden');
    document.getElementById('guide-aiken').classList.add('hidden');
    document.getElementById('guide-gift').classList.add('hidden');
    const target = document.getElementById('guide-' + format);
    if (target) target.classList.remove('hidden');
}
</script>
@endsection

