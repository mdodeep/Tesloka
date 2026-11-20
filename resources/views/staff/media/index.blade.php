@extends('layouts.staff')

@section('title', 'Repositori Berkas & Media Terisolasi — TESLOKA CBT')
@section('page-parent', 'Konten & Ujian')
@section('page-title')
Repositori Berkas & Media Terisolasi
@endsection
@section('page-subtitle', 'Penyimpanan aman berkas wacana stimulus, audio listening, gambar butir soal, dan lampiran resmi tanpa eksekusi langsung.')

@section('page-actions')
    <button type="button" onclick="document.getElementById('modal-upload-media').classList.remove('hidden')" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition inline-flex items-center justify-center gap-2 cursor-pointer w-full sm:w-auto">
        <i data-lucide="upload" class="size-4"></i>
        <span>Unggah Berkas Baru</span>
    </button>
@endsection

@section('content')
<div class="space-y-6 w-full">
    <!-- Stat Ringkasan Repositori -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <x-cbt.stat-card
            title="Total Berkas"
            :value="number_format($stats['total'] ?? 0)"
            subtitle="Media Terisolasi"
            icon="folder"
            color="primary"
        />
        <x-cbt.stat-card
            title="Audio Listening"
            :value="number_format($stats['audio'] ?? 0)"
            subtitle="Berkas Ujian Suara"
            icon="volume-2"
            color="secondary"
        />
        <x-cbt.stat-card
            title="Gambar & Wacana"
            :value="number_format($stats['image'] ?? 0)"
            subtitle="Stimulus Visual & Opsi"
            icon="image"
            color="success"
        />
        <x-cbt.stat-card
            title="Dokumen / PDF"
            :value="number_format($stats['document'] ?? 0)"
            subtitle="Lampiran Pendukung"
            icon="file-text"
            color="warning"
        />
    </div>

    <!-- Filter Bar -->
    <div class="card rounded-xl border border-default-200/90 p-4 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-2 overflow-x-auto text-xs">
            <a href="{{ route('staff.media.index') }}" class="px-3.5 py-2 rounded-lg font-semibold transition shrink-0 {{ !request('category') ? 'bg-primary text-white shadow-xs' : 'bg-default-100 text-default-600 hover:bg-default-200' }}">
                Semua Berkas ({{ $stats['total'] ?? 0 }})
            </a>
            <a href="{{ route('staff.media.index', ['category' => 'image']) }}" class="px-3.5 py-2 rounded-lg font-semibold transition shrink-0 {{ request('category') === 'image' ? 'bg-primary text-white shadow-xs' : 'bg-default-100 text-default-600 hover:bg-default-200' }}">
                Gambar ({{ $stats['image'] ?? 0 }})
            </a>
            <a href="{{ route('staff.media.index', ['category' => 'audio']) }}" class="px-3.5 py-2 rounded-lg font-semibold transition shrink-0 {{ request('category') === 'audio' ? 'bg-primary text-white shadow-xs' : 'bg-default-100 text-default-600 hover:bg-default-200' }}">
                Audio Listening ({{ $stats['audio'] ?? 0 }})
            </a>
            <a href="{{ route('staff.media.index', ['category' => 'document']) }}" class="px-3.5 py-2 rounded-lg font-semibold transition shrink-0 {{ request('category') === 'document' ? 'bg-primary text-white shadow-xs' : 'bg-default-100 text-default-600 hover:bg-default-200' }}">
                Dokumen ({{ $stats['document'] ?? 0 }})
            </a>
        </div>

        <form method="GET" action="{{ route('staff.media.index') }}" class="flex items-center gap-2 w-full sm:w-auto">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama berkas..."
                class="form-input flex-1 sm:w-60 h-9 text-xs rounded-lg border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
            <button type="submit" class="btn btn-sm h-9 px-3.5 bg-primary hover:bg-primary-hover text-white rounded-lg text-xs font-semibold shadow-xs transition cursor-pointer">
                <i data-lucide="search" class="size-3.5"></i>
                <span>Cari</span>
            </button>
            @if(request('search') || request('category'))
                <a href="{{ route('staff.media.index') }}" class="btn btn-sm h-9 px-3 bg-default-100 hover:bg-default-200 text-default-700 rounded-lg text-xs font-medium border border-default-200 inline-flex items-center transition" title="Reset Filter">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- Grid Berkas Media -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse($files as $file)
            @php $usage = $file->getUsageDetails(); @endphp
            <div class="bg-white border border-default-200 rounded-md overflow-hidden shadow-xs flex flex-col justify-between transition hover:shadow-md">
                <!-- Preview Area -->
                <div class="h-44 bg-default-100 flex items-center justify-center p-3 overflow-hidden relative group">
                    @if($file->isImage())
                        <img src="{{ $file->url }}" alt="{{ $file->original_name }}" class="max-h-full max-w-full object-contain rounded-lg">
                    @elseif($file->isAudio())
                        <div class="text-center p-2 w-full">
                            <div class="w-10 h-10 mx-auto rounded-full bg-primary/10 text-primary flex items-center justify-center mb-2">
                                <i data-lucide="volume-2" class="size-5"></i>
                            </div>
                            <audio controls class="w-full h-8" preload="none">
                                <source src="{{ $file->url }}" type="{{ $file->mime_type }}">
                            </audio>
                        </div>
                    @else
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto rounded-full bg-default-100 text-default-600 flex items-center justify-center mb-1">
                                <i data-lucide="file-text" class="size-6"></i>
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

                <!-- Metadata & Usage Area -->
                <div class="p-4 space-y-3 flex-1 flex flex-col justify-between">
                    <div class="space-y-2">
                        <div>
                            <h4 class="text-xs font-bold text-default-900 truncate" title="{{ $file->original_name }}">
                                {{ $file->original_name }}
                            </h4>
                            <p class="text-[10px] text-default-400 mt-0.5 font-mono">
                                Oleh: {{ $file->uploadedBy->name ?? 'Sistem' }} &bull; {{ $file->created_at->format('d/m/Y') }}
                            </p>
                        </div>

                        <!-- Informasi Keterkaitan Penggunaan Media -->
                        @if($usage['is_used'])
                            @if($usage['type'] === 'stimulus')
                                <div class="p-2.5 bg-indigo-50/90 border border-indigo-200 rounded text-xs space-y-1.5">
                                    <div class="flex items-center gap-1.5 font-bold text-indigo-900">
                                        <i data-lucide="book-open" class="size-3.5 text-indigo-600 shrink-0"></i>
                                        <span class="truncate" title="{{ $usage['target_title'] }}">Stimulus: {{ $usage['target_title'] }}</span>
                                    </div>
                                    <div class="text-[11px] text-indigo-700">
                                        <div class="text-indigo-500 font-medium text-[10px] uppercase mb-1">Digunakan pada {{ $usage['questions_count'] }} Soal:</div>
                                        <div class="flex flex-wrap gap-1 max-h-16 overflow-y-auto pr-0.5">
                                            @foreach($usage['questions'] as $q)
                                                <a href="{{ $q['show_url'] }}" target="_blank" class="px-1.5 py-0.5 bg-indigo-100 hover:bg-indigo-200 text-indigo-800 rounded text-[10px] font-mono font-bold transition inline-flex items-center gap-1" title="Lihat {{ $q['code'] }}">
                                                    <span>{{ $q['label'] }}</span>
                                                    <i data-lucide="external-link" class="size-2.5"></i>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @elseif($usage['type'] === 'question')
                                <div class="p-2.5 bg-emerald-50/90 border border-emerald-200 rounded text-xs">
                                    <div class="flex items-center justify-between gap-1.5 font-bold text-emerald-900">
                                        <div class="flex items-center gap-1.5 truncate">
                                            <i data-lucide="help-circle" class="size-3.5 text-emerald-600 shrink-0"></i>
                                            <span class="truncate">{{ $usage['target_title'] }}</span>
                                        </div>
                                        @if(!empty($usage['questions'][0]['show_url']))
                                            <a href="{{ $usage['questions'][0]['show_url'] }}" target="_blank" class="text-[10px] text-emerald-700 hover:text-emerald-950 font-bold underline shrink-0 inline-flex items-center gap-0.5">
                                                <span>Buka</span>
                                                <i data-lucide="external-link" class="size-2.5"></i>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="text-[10px] text-emerald-600 mt-1">Audio / Gambar langsung pada butir soal</div>
                                </div>
                            @endif
                        @else
                            <div class="p-2 bg-slate-50 border border-slate-200 rounded text-xs text-slate-500 flex items-center gap-1.5">
                                <i data-lucide="info" class="size-3.5 text-slate-400 shrink-0"></i>
                                <span class="text-[11px]">Belum dikaitkan ke soal / stimulus</span>
                            </div>
                        @endif
                    </div>

                    <!-- Actions Area -->
                    <div class="pt-2 border-t border-default-100 flex items-center justify-between gap-2">
                        <button type="button" onclick="navigator.clipboard.writeText('{{ $file->url }}'); alert('Tautan media aman berhasil disalin!')"
                            class="btn btn-sm bg-default-50 hover:bg-default-100 text-default-700 text-[11px] font-semibold rounded border border-default-200 transition cursor-pointer">
                            Salin URL
                        </button>

                        <form action="{{ route('staff.media.destroy', $file) }}" method="POST" onsubmit="return confirm('Hapus berkas ini dari repositori media?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm bg-danger/10 hover:bg-danger/20 text-danger border border-danger/20 rounded text-[11px] font-semibold transition cursor-pointer">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center bg-white rounded-md border border-default-200">
                <div class="w-12 h-12 mx-auto rounded-full bg-default-100 text-default-400 flex items-center justify-center mb-3">
                    <i data-lucide="image" class="size-6"></i>
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
    <div id="modal-upload-media" class="hidden fixed inset-0 bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4 z-50">
        <div class="card max-w-md w-full p-4 sm:p-6 shadow-xl space-y-4 max-h-[90vh] flex flex-col">
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
                        <i data-lucide="upload" class="size-4"></i>
                        <span>Mulai Unggah</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


