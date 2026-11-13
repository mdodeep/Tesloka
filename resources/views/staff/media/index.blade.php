@extends('layouts.staff')

@section('title', 'Repositori Berkas & Media Terisolasi — TESLOKA CBT')
@section('page-parent', 'Konten & Ujian')
@section('page-title')
Repositori Berkas & Media Terisolasi
@endsection
@section('page-subtitle', 'Penyimpanan aman berkas wacana stimulus, audio listening, gambar butir soal, dan lampiran resmi tanpa eksekusi langsung.')

@section('page-actions')
    <button type="button" onclick="document.getElementById('modal-upload-media').classList.remove('hidden')" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition inline-flex items-center justify-center gap-2 cursor-pointer w-full sm:w-auto">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
        </svg>
        <span>Unggah Berkas Baru</span>
    </button>
@endsection

@section('content')
<div class="space-y-6 w-full">
    <!-- Filter Bar -->
    <div class="bg-white border border-default-200 rounded-md p-4 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-2 overflow-x-auto text-xs">
            <a href="{{ route('staff.media.index') }}" class="px-3 py-1.5 rounded font-semibold transition {{ !request('category') ? 'bg-primary text-white shadow-xs' : 'bg-default-100 text-default-600 hover:bg-slate-200' }}">
                Semua Berkas
            </a>
            <a href="{{ route('staff.media.index', ['category' => 'image']) }}" class="px-3 py-1.5 rounded font-semibold transition {{ request('category') === 'image' ? 'bg-primary text-white shadow-xs' : 'bg-default-100 text-default-600 hover:bg-slate-200' }}">
                Gambar (Soal & Wacana)
            </a>
            <a href="{{ route('staff.media.index', ['category' => 'audio']) }}" class="px-3 py-1.5 rounded font-semibold transition {{ request('category') === 'audio' ? 'bg-primary text-white shadow-xs' : 'bg-default-100 text-default-600 hover:bg-slate-200' }}">
                Audio (Listening)
            </a>
            <a href="{{ route('staff.media.index', ['category' => 'document']) }}" class="px-3 py-1.5 rounded font-semibold transition {{ request('category') === 'document' ? 'bg-primary text-white shadow-xs' : 'bg-default-100 text-default-600 hover:bg-slate-200' }}">
                Dokumen (PDF & CSV)
            </a>
        </div>

        <form method="GET" action="{{ route('staff.media.index') }}" class="flex items-center gap-2 w-full sm:w-auto">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama berkas..."
                class="form-input flex-1 sm:w-60 h-9 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
            <button type="submit" class="h-9 px-3.5 bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition cursor-pointer">
                Cari
            </button>
        </form>
    </div>

    <!-- Grid Berkas Media -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse($files as $file)
            <div class="bg-white border border-default-200 rounded-md overflow-hidden shadow-xs flex flex-col justify-between transition hover:shadow-md">
                <!-- Preview Area -->
                <div class="h-40 bg-default-100 flex items-center justify-center p-3 overflow-hidden relative group">
                    @if($file->isImage())
                        <img src="{{ route('media.stream', $file) }}" alt="{{ $file->original_name }}" class="max-h-full max-w-full object-contain rounded-lg">
                    @elseif($file->isAudio())
                        <div class="text-center p-2 w-full">
                            <div class="w-12 h-12 mx-auto rounded-full bg-primary-100 text-primary-600 flex items-center justify-center mb-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path>
                                </svg>
                            </div>
                            <audio controls class="w-full h-8" preload="none">
                                <source src="{{ route('media.stream', $file) }}" type="{{ $file->mime_type }}">
                            </audio>
                        </div>
                    @else
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto rounded-full bg-slate-200 text-default-600 flex items-center justify-center mb-1">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span class="text-[10px] font-mono text-default-500 uppercase">{{ $file->mime_type }}</span>
                        </div>
                    @endif

                    <div class="absolute top-2 right-2">
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-slate-900/70 text-white backdrop-blur-xs">
                            {{ $file->formatted_size }}
                        </span>
                    </div>
                </div>

                <!-- Metadata & Action Area -->
                <div class="p-4 space-y-3">
                    <div>
                        <h4 class="text-xs font-bold text-default-900 truncate" title="{{ $file->original_name }}">
                            {{ $file->original_name }}
                        </h4>
                        <p class="text-[10px] text-default-400 mt-0.5 font-mono">
                            Oleh: {{ $file->uploadedBy->name ?? 'Staf' }} &bull; {{ $file->created_at->format('d/m/Y') }}
                        </p>
                    </div>

                    <div class="pt-2 border-t border-default-100 flex items-center justify-between gap-2">
                        <button type="button" onclick="navigator.clipboard.writeText('{{ route('media.stream', $file) }}'); alert('Tautan media aman berhasil disalin!')"
                            class="px-2.5 py-1 bg-default-50 hover:bg-default-100 text-default-700 text-[11px] font-semibold rounded-lg border border-default-200 transition cursor-pointer">
                            Salin URL
                        </button>

                        <form action="{{ route('staff.media.destroy', $file) }}" method="POST" onsubmit="return confirm('Hapus berkas ini dari repositori media?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2.5 py-1 bg-rose-50 hover:bg-rose-100 text-rose-700 text-[11px] font-semibold rounded-lg border border-rose-200 transition cursor-pointer">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center bg-white rounded-md border border-default-200">
                <div class="w-12 h-12 mx-auto rounded-full bg-default-100 text-default-400 flex items-center justify-center mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-sm font-bold text-default-700">Repositori Media Masih Kosong</h3>
                <p class="text-xs text-default-400 mt-1">Unggah berkas gambar, audio listening, atau wacana stimulus untuk digunakan dalam ujian.</p>
            </div>
        @endforelse
    </div>

    @if($files->hasPages())
        <div class="p-4 bg-white rounded-md border border-default-200">
            {{ $files->links() }}
        </div>
    @endif

    <!-- Modal Unggah Media Baru -->
    <div id="modal-upload-media" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4 z-50">
        <div class="bg-white rounded-md max-w-md w-full p-4 sm:p-6 shadow-xl space-y-4 max-h-[90vh] flex flex-col">
            <div class="shrink-0 space-y-1">
                <h3 class="text-base font-bold text-default-900">Unggah Berkas Media Baru</h3>
                <p class="text-xs text-default-500">
                    Pilih berkas dari perangkat Anda. Berkas akan divalidasi MIME dan diisolasi di direktori privat server.
                </p>
            </div>

            <form action="{{ route('staff.media.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 overflow-y-auto pr-1">
                @csrf
                <x-cbt.dropzone
                    name="file"
                    id="media_file_dropzone"
                    label="Pilih Berkas Media"
                    accept="image/jpeg,image/png,image/webp,audio/mpeg,audio/wav,application/pdf"
                    maxSize="10MB"
                    :required="true"
                    hint="Mendukung JPG, PNG, WEBP, MP3, WAV, PDF (Maks: 10 MB)."
                />

                <div>
                    <label class="block text-xs font-semibold text-default-700 mb-1">Kategori Peruntukan</label>
                    <select name="category" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                        <option value="stimulus">Wacana Stimulus Ujian</option>
                        <option value="question">Gambar / Diagram Soal</option>
                        <option value="audio">Audio Listening Exam</option>
                        <option value="document">Dokumen / Lampiran Resmi</option>
                        <option value="general" selected>Umum</option>
                    </select>
                </div>

                <div class="flex flex-col-reverse sm:flex-row justify-end gap-2.5 pt-3 border-t border-default-100 shrink-0">
                    <button type="button" onclick="document.getElementById('modal-upload-media').classList.add('hidden')" class="btn btn-sm border border-default-200 text-default-700 hover:bg-default-50 font-semibold cursor-pointer text-center justify-center w-full sm:w-auto">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition-all cursor-pointer inline-flex items-center justify-center gap-1.5 w-full sm:w-auto">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                        <span>Mulai Unggah</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


