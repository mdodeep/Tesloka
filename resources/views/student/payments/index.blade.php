@extends('layouts.student')

@section('title', 'Pembayaran Ujian Saya')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-xl sm:text-2xl font-bold text-default-900">Pembayaran &amp; Konfirmasi Biaya Ujian</h1>
        <p class="text-xs text-default-500 mt-1">Lihat daftar ujian berbayar Anda, pilih rekening bank tujuan transfer, dan unggah bukti pembayaran untuk diverifikasi Administrator.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse($paidExamParticipants as $p)
            @php $pay = $latestPaymentsByExam->get($p->exam_id); @endphp
            <div class="card bg-white border border-default-200/90 rounded-xl p-5 shadow-2xs space-y-3">
                <div class="flex items-start justify-between gap-2">
                    <div>
                        <span class="font-mono text-[10px] font-bold px-2 py-0.5 rounded bg-primary/10 text-primary">{{ $p->exam->code }}</span>
                        <h3 class="text-base font-bold text-default-900 mt-1">{{ $p->exam->title }}</h3>
                        <p class="text-xs text-default-500">{{ $p->exam->subject->name ?? '-' }} &bull; Rp {{ number_format((float) $p->exam->payment_amount, 0, ',', '.') }}</p>
                    </div>
                    <x-cbt.badge color="{{ $pay && $pay->isApproved() ? 'success' : ($pay && $pay->isRejected() ? 'danger' : ($pay ? 'warning' : 'slate')) }}">
                        {{ $pay ? $pay->getStatusLabel() : 'Belum Dibayar' }}
                    </x-cbt.badge>
                </div>

                @if($pay && $pay->isRejected() && $pay->rejection_reason)
                    <div class="p-3 rounded-lg bg-rose-50 border border-rose-200 text-xs text-rose-800">
                        <strong>Alasan Penolakan:</strong> {{ $pay->rejection_reason }}
                    </div>
                @endif

                <div class="pt-2 flex justify-end">
                    <a href="{{ route('student.exam.payment', $p->exam) }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold text-xs">
                        {{ $pay && $pay->isApproved() ? 'Lihat Status Lunas' : ($pay && $pay->isRejected() ? 'Unggah Ulang Bukti Transfer' : 'Bayar & Upload Bukti') }}
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full card bg-white border border-default-200 rounded-xl p-8 text-center text-xs text-default-500">
                Saat ini Anda tidak memiliki jadwal ujian yang mewajibkan pembayaran.
            </div>
        @endforelse
    </div>
</div>
@endsection
