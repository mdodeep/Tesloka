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
                        <span class="px-2.5 py-1 bg-primary-50 text-primary-700 font-bold rounded-lg text-xs uppercase">
                            {{ $ex->exam_type }}
                        </span>
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
                            <svg class="size-4 text-default-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            <span>Mapel: <strong class="text-default-800 font-semibold">{{ $ex->subject->name ?? '-' }}</strong></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="size-4 text-default-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Durasi: <strong class="text-default-800 font-semibold">{{ $ex->duration_minutes }} Menit</strong></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="size-4 text-default-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>Ruang: <strong class="text-default-800 font-semibold">{{ $session->room->name ?? '-' }}</strong> &bull; Kursi: <strong class="text-default-800 font-semibold">{{ $enrollment->seat_number ?? '-' }}</strong></span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 mt-4 border-t border-default-100">
                    @if($isSubmitted)
                        <a href="{{ route('student.exam.finish', $attempt) }}" class="w-full py-2.5 bg-default-100 hover:bg-slate-200 text-default-700 font-semibold text-xs rounded inline-flex items-center justify-center gap-1.5 transition">
                            <svg class="size-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Lihat Bukti Tanda Terima
                        </a>
                    @elseif($isInProgress)
                        <a href="{{ route('student.exam.show', $attempt) }}" class="w-full py-2.5 bg-primary hover:bg-primary-hover text-white font-bold text-xs rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Lanjutkan Ujian
                        </a>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 w-full">
                            <a href="{{ route('student.exam.card', $ex) }}" target="_blank" class="py-2.5 bg-default-100 hover:bg-slate-200 text-default-700 font-semibold text-xs rounded inline-flex items-center justify-center gap-1.5 transition">
                                <svg class="size-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                                Kartu Ujian
                            </a>
                            <a href="{{ route('student.exam.instructions', $ex) }}" class="py-2.5 bg-primary hover:bg-primary-hover text-white font-bold text-xs rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition">
                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
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

