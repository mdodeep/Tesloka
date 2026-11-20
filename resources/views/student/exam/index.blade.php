@extends('layouts.student')

@section('title', 'Daftar Ujian Saya')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-default-800">Daftar Ujian Saya</h1>
            <p class="text-sm text-default-500">Pilih ujian aktif yang dialokasikan untuk Anda dan ikuti instruksi pengawas ruang.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($enrolledExams as $enrollment)
            @php
                $ex = $enrollment->exam;
                $session = $enrollment->session;
                $attempt = $attempts->get($ex->id);
                $isSubmitted = $attempt && $attempt->status === 'submitted';
                $isInProgress = $attempt && $attempt->status === 'in_progress' && !$attempt->isExpired();
            @endphp
            <x-cbt.card class="flex flex-col justify-between h-full">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <x-cbt.badge color="primary">
                            {{ $ex->exam_type }}
                        </x-cbt.badge>
                        @if($isSubmitted)
                            <x-cbt.badge color="success">Sudah Selesai</x-cbt.badge>
                        @elseif($isInProgress)
                            <x-cbt.badge color="primary">Sedang Berjalan</x-cbt.badge>
                        @else
                            <x-cbt.badge color="info">Siap Dikerjakan</x-cbt.badge>
                        @endif
                    </div>

                    <h3 class="text-base font-bold text-default-900 leading-snug">
                        {{ $ex->title }}
                    </h3>

                    <div class="text-xs text-default-500 space-y-1.5 pt-2 border-t border-default-100">
                        <div class="flex items-center gap-2">
                            <i data-lucide="book-open" class="size-4 text-default-400 shrink-0"></i>
                            <span>Mapel: <strong class="text-default-800 font-semibold">{{ $ex->subject->name ?? '-' }}</strong></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="clock" class="size-4 text-default-400 shrink-0"></i>
                            <span>Durasi: <strong class="text-default-800 font-semibold">{{ $ex->duration_minutes }} Menit</strong></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="map-pin" class="size-4 text-default-400 shrink-0"></i>
                            <span>Ruang: <strong class="text-default-800 font-semibold">{{ $session->room->name ?? '-' }}</strong> &bull; Kursi: <strong class="text-default-800 font-semibold">{{ $enrollment->seat_number ?? '-' }}</strong></span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 mt-4 border-t border-default-100">
                    @if($isSubmitted)
                        <a href="{{ route('student.exam.finish', $attempt) }}" class="btn btn-sm w-full py-2.5 bg-default-100 hover:bg-default-200 text-default-700 font-semibold text-xs rounded inline-flex items-center justify-center gap-1.5 transition">
                            <i data-lucide="file-check-2" class="size-4 text-default-500"></i>
                            Lihat Bukti Tanda Terima
                        </a>
                    @elseif($isInProgress)
                        <a href="{{ route('student.exam.show', $attempt) }}" class="btn btn-sm w-full py-2.5 bg-primary hover:bg-primary-hover text-white font-bold text-xs rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition">
                            <i data-lucide="play-circle" class="size-4"></i>
                            Lanjutkan Ujian
                        </a>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 w-full">
                            <a href="{{ route('student.exam.card', $ex) }}" target="_blank" class="btn btn-sm py-2.5 bg-default-100 hover:bg-default-200 text-default-700 font-semibold text-xs rounded inline-flex items-center justify-center gap-1.5 transition">
                                <i data-lucide="printer" class="size-4 text-default-500"></i>
                                Kartu Ujian
                            </a>
                            <a href="{{ route('student.exam.instructions', $ex) }}" class="btn btn-sm py-2.5 bg-primary hover:bg-primary-hover text-white font-bold text-xs rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition">
                                <i data-lucide="arrow-right-circle" class="size-4"></i>
                                Buka Petunjuk
                            </a>
                        </div>
                    @endif
                </div>
            </x-cbt.card>
        @empty
            <div class="col-span-full">
                <x-cbt.empty-state title="Belum Ada Ujian Terjadwal" description="Saat ini belum ada sesi ujian yang dialokasikan untuk akun Anda. Silakan hubungi proktor atau staf penguji." />
            </div>
        @endforelse
    </div>
</div>
@endsection

