@extends('layouts.student')

@section('title', 'Lobi Ujian Peserta')

@section('content')
<div class="space-y-6">
    <!-- Student Greeting Banner -->
    <div class="card bg-white border border-default-200/90 rounded-xl p-5 sm:p-6 shadow-2xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <div class="text-xs font-semibold text-primary uppercase tracking-wider">Selamat Datang di Portal Ujian</div>
            <h1 class="text-xl sm:text-2xl font-bold text-default-900 mt-1 tracking-tight">{{ $user->name }}</h1>
            <p class="text-xs text-default-500 mt-1">
                NIM / ID: <span class="font-mono font-bold text-default-700">{{ $user->identity_number ?? $user->username }}</span>
                @if ($enrollments->isNotEmpty())
                    &bull; Kelas: <span class="font-semibold text-default-700">{{ $enrollments->first()->name }}</span>
                @endif
            </p>
        </div>

        @if (! $isProfileComplete)
            <div class="p-3 bg-amber-50 border border-amber-200 rounded-lg text-amber-900 text-xs flex items-center gap-3 shadow-2xs">
                <i data-lucide="alert-triangle" class="size-4.5 text-amber-600 shrink-0"></i>
                <div>
                    <div class="font-bold">Profil Belum Lengkap!</div>
                    <a href="{{ route('student.profile.complete') }}" class="text-primary font-semibold underline">Lengkapi sekarang &rarr;</a>
                </div>
            </div>
        @else
            <div class="p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-emerald-900 text-xs flex items-center gap-2.5 shadow-2xs">
                <i data-lucide="check-circle" class="size-4.5 text-emerald-600 shrink-0"></i>
                <span class="font-semibold">Profil Lengkap &amp; Siap Ujian</span>
            </div>
        @endif
    </div>

    <!-- Exam Schedule & Assigned Exams -->
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <h2 class="text-sm font-bold text-default-900 tracking-tight">Daftar Jadwal Ujian Resmi Anda</h2>
            <a href="{{ route('student.exam.index') }}" class="text-xs font-semibold text-primary hover:underline">
                Lihat Semua Ujian &rarr;
            </a>
        </div>

        @if($assignedParticipants->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($assignedParticipants as $p)
                    @php
                        $needsPay = $p->exam->requiresPayment();
                        $payRecord = isset($paymentsByExam) ? $paymentsByExam->get($p->exam_id) : null;
                        $isPaid = !$needsPay || ($payRecord && $payRecord->isApproved());
                    @endphp
                    <div class="card bg-white border border-default-200/90 rounded-xl p-5 sm:p-6 shadow-2xs space-y-4 hover:border-primary/50 hover:shadow-xs transition">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-1.5 flex-wrap">
                                    <x-cbt.badge color="primary">
                                        {{ $p->exam->exam_type }}
                                    </x-cbt.badge>
                                    @if($needsPay)
                                        <x-cbt.badge color="{{ $isPaid ? 'success' : ($payRecord && $payRecord->isRejected() ? 'danger' : 'warning') }}">
                                            {{ $isPaid ? 'Lunas' : ($payRecord ? $payRecord->getStatusLabel() : 'Wajib Bayar') }}
                                        </x-cbt.badge>
                                    @endif
                                </div>
                                <h3 class="text-base font-bold text-default-900 mt-2 truncate">{{ $p->exam->title }}</h3>
                                <p class="text-xs text-default-500 mt-0.5">{{ $p->exam->subject->name ?? '-' }} &bull; <code>{{ $p->exam->code }}</code></p>
                            </div>
                            <span class="text-xs font-mono font-bold text-primary px-3 py-1 bg-primary/5 border border-primary/20 rounded-lg shrink-0">
                                {{ __('Kursi:') }} {{ $p->seat_number ?? '-' }}
                            </span>
                        </div>

                        <div class="grid grid-cols-2 gap-2 text-xs text-default-700 bg-default-50/80 p-3.5 rounded-lg border border-default-200/70">
                            <div>
                                <span class="text-default-400 block text-[10px] uppercase font-semibold">{{ __('Sesi & Ruang:') }}</span>
                                <strong class="text-default-900">{{ $p->session->name ?? __('Sesi Ujian') }}</strong> ({{ $p->session->room->name ?? '-' }})
                            </div>
                            <div>
                                <span class="text-default-400 block text-[10px] uppercase font-semibold">{{ __('Durasi Ujian:') }}</span>
                                <strong class="text-default-900">{{ $p->exam->duration_minutes }} {{ __('Menit') }}</strong>
                            </div>
                        </div>

                        @if($needsPay && ! $isPaid)
                            <div class="p-3 rounded-lg text-xs border {{ $payRecord && $payRecord->isRejected() ? 'bg-rose-50 border-rose-200 text-rose-900' : ($payRecord && $payRecord->isPending() ? 'bg-amber-50 border-amber-200 text-amber-900' : 'bg-sky-50 border-sky-200 text-sky-900') }}">
                                @if($payRecord && $payRecord->isRejected())
                                    <strong class="block font-bold">Bukti Pembayaran Ditolak Admin</strong>
                                    <span class="block mt-0.5">Alasan: {{ $payRecord->rejection_reason }}</span>
                                @elseif($payRecord && $payRecord->isPending())
                                    <strong class="block font-bold">Menunggu Verifikasi Pembayaran</strong>
                                    <span class="block mt-0.5">Bukti transfer sebesar Rp {{ number_format((float) $payRecord->amount, 0, ',', '.') }} sedang diperiksa Administrator.</span>
                                @else
                                    <strong class="block font-bold">Biaya Ujian: Rp {{ number_format((float) $p->exam->payment_amount, 0, ',', '.') }}</strong>
                                    <span class="block mt-0.5">Silakan transfer dan unggah bukti pembayaran agar dapat memulai ujian.</span>
                                @endif
                            </div>
                        @endif

                        <div class="grid grid-cols-2 gap-2 pt-1">
                            <a href="{{ route('student.exam.card', $p->exam) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold text-xs rounded-lg inline-flex items-center justify-center gap-1.5 transition">
                                <i data-lucide="printer" class="size-3.5 text-default-500"></i>
                                <span>{{ __('Kartu Ujian') }}</span>
                            </a>
                            @if($needsPay && ! $isPaid)
                                <a href="{{ route('student.exam.payment', $p->exam) }}" class="btn btn-sm bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs rounded-lg inline-flex items-center justify-center gap-1.5 shadow-xs transition active:scale-[0.98]">
                                    <i data-lucide="credit-card" class="size-3.5"></i>
                                    <span>{{ $payRecord && $payRecord->isPending() ? 'Status Pembayaran' : 'Bayar & Upload Bukti' }}</span>
                                </a>
                            @else
                                <a href="{{ route('student.exam.instructions', $p->exam) }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-bold text-xs rounded-lg inline-flex items-center justify-center gap-1.5 shadow-xs transition active:scale-[0.98]">
                                    <i data-lucide="arrow-right-circle" class="size-3.5"></i>
                                    <span>{{ __('Buka Petunjuk') }}</span>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="card bg-white border border-default-200/90 rounded-xl p-10 text-center space-y-3 shadow-2xs">
                <div class="size-14 rounded-full bg-default-100 text-default-400 flex items-center justify-center mx-auto">
                    <i data-lucide="calendar" class="size-7 text-default-400"></i>
                </div>
                <div class="text-base font-bold text-default-800">{{ __('Belum Ada Sesi Ujian Aktif Saat Ini') }}</div>
                <p class="text-xs text-default-500 max-w-sm mx-auto leading-relaxed">
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
                    <div class="card bg-white border border-default-200/90 rounded-xl p-4 sm:p-5 shadow-2xs flex flex-col sm:flex-row sm:items-center justify-between gap-3 hover:border-primary/30 transition">
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
                                <x-cbt.badge color="{{ $att->status === 'submitted' ? 'success' : ($att->status === 'in_progress' ? 'info' : 'slate') }}">
                                    {{ match($att->status) {
                                        'in_progress' => 'Sedang Ujian',
                                        'submitted' => 'Selesai Dikirim',
                                        'graded' => 'Selesai Dinilai',
                                        default => ucfirst(str_replace('_', ' ', (string) $att->status))
                                    } }}
                                </x-cbt.badge>
                            @endif
                            <a href="{{ route('student.exam.finish', $att) }}" class="px-2.5 py-1 bg-default-100 hover:bg-slate-200 text-default-700 font-semibold rounded-lg transition text-[11px]" title="Lihat Tanda Terima Resi">
                                Resi
                            </a>
                            <a href="{{ route('student.exam.transcript', $att) }}" target="_blank" rel="noopener noreferrer" class="px-2.5 py-1 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-semibold rounded-lg border border-indigo-200 transition text-[11px]" title="Cetak Surat Keterangan Hasil Ujian">
                                SKHU
                            </a>
                            @if($att->isPassed())
                                <a href="{{ route('student.exam.certificate', $att) }}" target="_blank" rel="noopener noreferrer" class="px-2.5 py-1 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-semibold rounded-lg border border-emerald-200 transition text-[11px]" title="Unduh Sertifikat Kelulusan">
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
    <div class="card bg-default-100/70 border border-default-200 rounded-xl p-5 text-xs text-default-600 space-y-2">
        <div class="font-bold text-default-800 text-sm">{{ __('Tata Tertib & Ketentuan Ujian:') }}</div>
        <ul class="list-disc list-inside space-y-1 text-default-600">
            <li>{{ __('Pastikan koneksi internet stabil selama pengerjaan ujian berlangsung.') }}</li>
            <li>{{ __('Jawaban Anda disimpan secara berkala dan otomatis ke server (Autosave).') }}</li>
            <li>{{ __('Dilarang berpindah tab browser, membuka aplikasi lain, atau melakukan kecurangan dalam bentuk apapun.') }}</li>
            <li>{{ __('Jika terjadi kendala teknis atau listrik padam, segera lapor ke Pengawas Ruang untuk proses pemulihan (Recovery).') }}</li>
        </ul>
    </div>
</div>
@endsection
