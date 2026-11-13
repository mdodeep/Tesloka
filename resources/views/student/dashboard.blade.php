@extends('layouts.student')

@section('title', 'Lobi Ujian Peserta')

@section('content')
<div class="space-y-6">
    <!-- Student Greeting Banner -->
    <div class="bg-white border border-default-200 rounded-md p-6 shadow-xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <div class="text-xs font-semibold text-primary uppercase tracking-wider">Selamat Datang di Portal Ujian</div>
            <h1 class="text-xl font-bold text-default-800 mt-1">{{ $user->name }}</h1>
            <p class="text-xs text-default-500 mt-1">
                NIM / ID: <span class="font-mono font-semibold text-default-700">{{ $user->identity_number ?? $user->username }}</span>
                @if ($enrollments->isNotEmpty())
                    &bull; Kelas: <span class="font-semibold text-default-700">{{ $enrollments->first()->name }}</span>
                @endif
            </p>
        </div>

        @if (! $isProfileComplete)
            <div class="p-3 bg-amber-50 border border-amber-200 rounded text-amber-900 text-xs flex items-center gap-3">
                <svg class="w-5 h-5 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                <div>
                    <div class="font-bold">Profil Belum Lengkap!</div>
                    <a href="{{ route('student.profile.complete') }}" class="text-primary font-semibold underline">Lengkapi sekarang &rarr;</a>
                </div>
            </div>
        @else
            <div class="p-3 bg-emerald-50 border border-emerald-200 rounded text-emerald-900 text-xs flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                <span class="font-semibold">Profil Lengkap & Siap Ujian</span>
            </div>
        @endif
    </div>

    <!-- Exam Schedule & Assigned Exams -->
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <h2 class="text-sm font-bold text-default-800">Daftar Jadwal Ujian Resmi Anda</h2>
            <a href="{{ route('student.exam.index') }}" class="text-xs font-semibold text-primary hover:underline">
                Lihat Semua Ujian &rarr;
            </a>
        </div>

        @if($assignedParticipants->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($assignedParticipants as $p)
                    <div class="bg-white border border-default-200 rounded-md p-5 shadow-xs space-y-4 hover:border-primary/40 transition">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <span class="px-2.5 py-0.5 bg-primary/10 text-primary border border-primary/20 text-[10px] font-bold rounded-full uppercase">
                                    {{ $p->exam->exam_type }}
                                </span>
                                <h3 class="text-base font-bold text-default-900 mt-1.5">{{ $p->exam->title }}</h3>
                                <p class="text-xs text-default-500">{{ $p->exam->subject->name ?? '-' }} &bull; <code>{{ $p->exam->code }}</code></p>
                            </div>
                            <span class="text-xs font-mono font-bold text-primary px-2.5 py-1 bg-primary/5 border border-primary/20 rounded-lg shrink-0">
                                {{ __('Kursi:') }} {{ $p->seat_number ?? '-' }}
                            </span>
                        </div>

                        <div class="grid grid-cols-2 gap-2 text-xs text-default-600 bg-default-50 p-3 rounded border border-default-100">
                            <div>
                                <span class="text-default-400 block text-[10px]">{{ __('Sesi & Ruang:') }}</span>
                                <strong>{{ $p->session->name ?? __('Sesi Ujian') }}</strong> ({{ $p->session->room->name ?? '-' }})
                            </div>
                            <div>
                                <span class="text-default-400 block text-[10px]">{{ __('Durasi Ujian:') }}</span>
                                <strong>{{ $p->exam->duration_minutes }} {{ __('Menit') }}</strong>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2 pt-1">
                            <a href="{{ route('student.exam.card', $p->exam) }}" target="_blank" class="py-2 bg-default-100 hover:bg-slate-200 text-default-700 font-semibold text-xs rounded inline-flex items-center justify-center gap-1.5 transition">
                                <svg class="size-3.5 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                                {{ __('Kartu Ujian') }}
                            </a>
                            <a href="{{ route('student.exam.instructions', $p->exam) }}" class="py-2 bg-primary hover:bg-primary-hover text-white font-bold text-xs rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition">
                                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                                {{ __('Buka Petunjuk') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white border border-default-200 rounded-md p-8 text-center space-y-2 shadow-xs">
                <div class="w-12 h-12 rounded-full bg-default-100 text-default-400 flex items-center justify-center mx-auto">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                </div>
                <div class="text-sm font-bold text-default-700">{{ __('Belum Ada Sesi Ujian Aktif Saat Ini') }}</div>
                <p class="text-xs text-default-400 max-w-sm mx-auto">
                    {{ __('Sesi ujian akan otomatis muncul di halaman ini saat jadwal ujian telah dibuka oleh pengawas ruang.') }}
                </p>
            </div>
        @endif
    </div>

    @if($recentAttempts->isNotEmpty())
        <!-- Riwayat Pengerjaan & Tanda Terima Digital -->
        <div class="space-y-4">
            <h2 class="text-sm font-bold text-default-800">{{ __('Riwayat Pengerjaan Ujian') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($recentAttempts as $att)
                    <div class="bg-white border border-default-200 rounded-md p-4 sm:p-5 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-3 hover:border-primary/30 transition">
                        <div class="min-w-0">
                            <span class="px-2 py-0.5 bg-default-100 text-default-600 rounded text-[10px] font-semibold font-mono">{{ $att->exam->code }}</span>
                            <h3 class="text-sm font-bold text-default-800 mt-1 leading-snug">{{ $att->exam->title }}</h3>
                            <p class="text-xs text-default-400 mt-0.5">Selesai: {{ $att->submitted_at?->translatedFormat('d M Y, H:i') ?? '-' }}</p>
                        </div>
                        <div class="flex items-center gap-2 flex-wrap self-start sm:self-auto shrink-0 pt-1 sm:pt-0">
                            @if($att->exam->show_score_after_submit)
                                <div class="text-left sm:text-right mr-1">
                                    <span class="text-[10px] text-default-400 block">Nilai:</span>
                                    <strong class="text-sm font-bold text-primary">{{ number_format($att->total_score, 1) }}</strong>
                                </div>
                            @else
                                <span class="px-2.5 py-1 bg-default-100 text-default-700 font-medium rounded-lg text-xs">
                                    {{ ucfirst($att->status) }}
                                </span>
                            @endif
                            <a href="{{ route('student.exam.finish', $att) }}" class="px-2.5 py-1 bg-default-100 hover:bg-slate-200 text-default-700 font-semibold rounded-lg transition text-[11px]" title="Lihat Tanda Terima Resi">
                                Resi
                            </a>
                            <a href="{{ route('student.exam.transcript', $att) }}" target="_blank" class="px-2.5 py-1 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-semibold rounded-lg border border-indigo-200 transition text-[11px]" title="Cetak Surat Keterangan Hasil Ujian">
                                SKHU
                            </a>
                            @if($att->isPassed())
                                <a href="{{ route('student.exam.certificate', $att) }}" target="_blank" class="px-2.5 py-1 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-semibold rounded-lg border border-emerald-200 transition text-[11px]" title="Unduh Sertifikat Kelulusan">
                                    Sertifikat
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Petunjuk Teknis Pelaksanaan Ujian -->
    <div class="bg-default-100/70 border border-default-200 rounded-md p-6 text-xs text-default-600 space-y-2">
        <div class="font-bold text-default-800 text-sm">{{ __('Tata Tertib & Ketentuan Ujian CBT:') }}</div>
        <ul class="list-disc list-inside space-y-1 text-default-600">
            <li>{{ __('Pastikan koneksi internet stabil selama pengerjaan ujian berlangsung.') }}</li>
            <li>{{ __('Jawaban Anda disimpan secara berkala dan otomatis ke server (Autosave).') }}</li>
            <li>{{ __('Dilarang berpindah tab browser, membuka aplikasi lain, atau melakukan kecurangan dalam bentuk apapun.') }}</li>
            <li>{{ __('Jika terjadi kendala teknis atau listrik padam, segera lapor ke Pengawas Ruang untuk proses pemulihan (Recovery).') }}</li>
        </ul>
    </div>
</div>
@endsection
