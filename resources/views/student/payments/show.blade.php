@extends('layouts.student')

@section('title', 'Pembayaran Biaya Ujian - ' . $exam->title)

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center gap-2 text-xs text-default-500">
        <a href="{{ route('student.dashboard') }}" class="hover:text-primary font-medium">Beranda</a>
        <span>/</span>
        <a href="{{ route('student.exam.index') }}" class="hover:text-primary font-medium">Daftar Ujian</a>
        <span>/</span>
        <span class="text-default-800 font-semibold">Konfirmasi Pembayaran</span>
    </div>

    <div class="card bg-white border border-default-200/90 rounded-xl p-5 sm:p-6 shadow-2xs space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-default-100 pb-4">
            <div>
                <span class="text-[11px] font-mono font-bold px-2.5 py-0.5 rounded bg-primary/10 text-primary">{{ $exam->code }}</span>
                <h1 class="text-xl font-bold text-default-900 mt-1.5">{{ $exam->title }}</h1>
                <p class="text-xs text-default-500 mt-0.5">{{ $exam->subject->name ?? '-' }} &bull; Sesi: {{ $participant->session->name ?? '-' }}</p>
            </div>
            <div class="bg-slate-900 text-white px-4 py-3 rounded-xl text-left sm:text-right shrink-0">
                <span class="block text-[10px] uppercase tracking-wider text-slate-300 font-semibold">Biaya Ujian</span>
                <span class="text-lg sm:text-xl font-black font-mono text-teal-400">Rp {{ number_format((float) $exam->payment_amount, 0, ',', '.') }}</span>
            </div>
        </div>

        @if($latestPayment && $latestPayment->isApproved())
            <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="flex items-start gap-3">
                    <i data-lucide="check-circle-2" class="size-5 text-emerald-600 shrink-0 mt-0.5"></i>
                    <div class="text-xs text-emerald-900">
                        <strong class="font-bold text-sm block">Pembayaran Disetujui</strong>
                        <span>Bukti transfer Anda telah diverifikasi oleh Administrator. Anda sudah dapat memasuki ruang ujian.</span>
                    </div>
                </div>
                <a href="{{ route('student.exam.instructions', $exam) }}" class="btn btn-sm bg-emerald-600 hover:bg-emerald-700 text-white font-bold shrink-0">
                    Masuk Halaman Petunjuk Ujian &rarr;
                </a>
            </div>
        @elseif($latestPayment && $latestPayment->isPending())
            <div class="p-4 rounded-xl bg-amber-50 border border-amber-200 flex items-start gap-3 text-xs text-amber-900">
                <i data-lucide="clock" class="size-5 text-amber-600 shrink-0 mt-0.5"></i>
                <div>
                    <strong class="font-bold text-sm block">Bukti Transfer Sedang Diverifikasi Admin</strong>
                    <span>Anda sudah mengunggah bukti transfer pada {{ $latestPayment->created_at?->translatedFormat('d M Y, H:i') }}. Mohon tunggu persetujuan Admin sebelum memulai ujian.</span>
                </div>
            </div>
        @elseif($latestPayment && $latestPayment->isRejected())
            <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 flex items-start gap-3 text-xs text-rose-900">
                <i data-lucide="alert-octagon" class="size-5 text-rose-600 shrink-0 mt-0.5"></i>
                <div>
                    <strong class="font-bold text-sm block">Pembayaran Sebelumnya Ditolak</strong>
                    <p class="mt-1"><strong>Alasan Penolakan Admin:</strong> {{ $latestPayment->rejection_reason }}</p>
                    <p class="mt-1 text-rose-700">Silakan perbaiki dan unggah ulang bukti transfer yang sesuai melalui formulir di bawah ini.</p>
                </div>
            </div>
        @else
            <div class="p-4 rounded-xl bg-sky-50 border border-sky-200 flex items-start gap-3 text-xs text-sky-900">
                <i data-lucide="info" class="size-5 text-sky-600 shrink-0 mt-0.5"></i>
                <div>
                    <strong class="font-bold block">Konfirmasi Pembayaran Diperlukan</strong>
                    <span>Silakan transfer sesuai nominal ke salah satu rekening bank resmi di bawah ini, lalu unggah bukti transfernya untuk verifikasi Admin.</span>
                </div>
            </div>
        @endif

        @if(! empty($exam->payment_instructions))
            <div class="p-3.5 rounded-lg bg-default-50 border border-default-200 text-xs text-default-700">
                <strong class="block text-default-900 mb-1">Instruksi Pembayaran dari Panitia:</strong>
                <p class="leading-relaxed">{{ $exam->payment_instructions }}</p>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Daftar Rekening Tujuan Transfer -->
        <x-cbt.card title="1. Pilihan Rekening Bank Tujuan Transfer">
            @if($bankAccounts->isNotEmpty())
                <div class="space-y-3">
                    @foreach($bankAccounts as $bank)
                        <div class="p-4 rounded-xl border border-default-200 bg-default-50/70 space-y-1.5">
                            <div class="flex items-center justify-between gap-2">
                                <span class="font-bold text-sm text-default-900">{{ $bank->bank_name }}</span>
                                @if($bank->branch)
                                    <span class="text-[11px] px-2 py-0.5 rounded bg-white border border-default-200 text-default-600">{{ $bank->branch }}</span>
                                @endif
                            </div>
                            <div class="flex items-center justify-between gap-2 pt-1">
                                <span class="font-mono text-base font-black text-primary tracking-wider">{{ $bank->account_number }}</span>
                                <button type="button" onclick="navigator.clipboard?.writeText('{{ $bank->account_number }}'); this.textContent='Tersalin'; setTimeout(() => this.textContent='Salin', 1500)" class="px-2.5 py-1 rounded bg-white hover:bg-default-100 border border-default-200 text-[11px] font-semibold text-default-700 cursor-pointer">
                                    Salin
                                </button>
                            </div>
                            <div class="text-xs text-default-700">Atas Nama: <strong>{{ $bank->account_holder }}</strong></div>
                            @if($bank->notes)
                                <div class="text-[11px] text-default-500">{{ $bank->notes }}</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-6 text-center border border-dashed border-default-200 rounded-lg text-xs text-default-500">
                    Belum ada rekening bank aktif yang ditambahkan oleh Administrator. Silakan hubungi panitia ujian.
                </div>
            @endif
        </x-cbt.card>

        <!-- Form Unggah Bukti Transfer -->
        <x-cbt.card title="2. Unggah Bukti Transfer Manual">
            @if($latestPayment && $latestPayment->isApproved())
                <div class="p-5 text-center text-xs text-emerald-800 bg-emerald-50/60 rounded-lg border border-emerald-200">
                    Pembayaran Anda sudah berstatus Lunas / Disetujui. Tidak perlu mengunggah bukti tambahan.
                </div>
            @else
                <form action="{{ route('student.exam.payment.store', $exam) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Bank Tujuan yang Anda Pilih *</label>
                        <select name="bank_account_id" required class="form-select w-full h-10 text-xs rounded-lg border-default-200 bg-white">
                            <option value="">-- Pilih Rekening Tujuan --</option>
                            @foreach($bankAccounts as $bank)
                                <option value="{{ $bank->id }}" @selected(old('bank_account_id') == $bank->id)>
                                    {{ $bank->bank_name }} - {{ $bank->account_number }} (a.n {{ $bank->account_holder }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Nama Pengirim *</label>
                            <input type="text" name="sender_name" value="{{ old('sender_name', auth('student')->user()->name) }}" required class="form-input w-full h-10 text-xs rounded-lg border-default-200">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Bank Asal Pengirim *</label>
                            <input type="text" name="sender_bank" value="{{ old('sender_bank') }}" placeholder="Contoh: BCA / BRI / Dana / BSI" required class="form-input w-full h-10 text-xs rounded-lg border-default-200">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Nominal Ditransfer (Rp) *</label>
                            <input type="number" step="1" min="0" name="amount" value="{{ old('amount', (int) $exam->payment_amount) }}" required class="form-input w-full h-10 text-xs font-mono rounded-lg border-default-200">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Tanggal Transfer *</label>
                            <input type="date" name="transfer_date" value="{{ old('transfer_date', date('Y-m-d')) }}" required class="form-input w-full h-10 text-xs rounded-lg border-default-200">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Nomor Rekening Pengirim (Opsional)</label>
                        <input type="text" name="sender_account_number" value="{{ old('sender_account_number') }}" placeholder="Nomor rekening pengirim" class="form-input w-full h-10 text-xs font-mono rounded-lg border-default-200">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Berkas Bukti Transfer (JPG/PNG/WebP/PDF, Maks. 5MB) *</label>
                        <input type="file" name="proof" accept=".jpg,.jpeg,.png,.webp,.pdf" required class="block w-full text-xs text-default-700 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 border border-default-200 rounded-lg p-1.5 bg-white">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Catatan Tambahan (Opsional)</label>
                        <textarea name="student_notes" rows="2" placeholder="Keterangan tambahan bila diperlukan" class="form-textarea w-full text-xs rounded-lg border-default-200">{{ old('student_notes') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-sm w-full h-10 bg-primary hover:bg-primary-hover text-white font-bold text-xs rounded-lg inline-flex items-center justify-center gap-2 cursor-pointer" @disabled($bankAccounts->isEmpty())>
                        <i data-lucide="upload" class="size-4"></i>
                        <span>{{ $latestPayment ? 'Kirim Ulang Bukti Pembayaran' : 'Kirim Bukti Pembayaran' }}</span>
                    </button>
                </form>
            @endif
        </x-cbt.card>
    </div>

    @if($paymentHistory->isNotEmpty())
        <x-cbt.card flush title="Riwayat Konfirmasi Pembayaran Anda">
            <div class="overflow-x-auto -mx-3.5 sm:mx-0">
                <table class="w-full min-w-[700px] divide-y divide-default-200 text-left text-xs">
                    <thead class="bg-default-100 border-b border-default-200 font-semibold text-default-700">
                        <tr>
                            <th class="px-4 py-3 whitespace-nowrap">Waktu Unggah</th>
                            <th class="px-3 py-3 whitespace-nowrap">Bank Tujuan</th>
                            <th class="px-3 py-3 whitespace-nowrap">Pengirim &amp; Nominal</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Status &amp; Catatan Admin</th>
                            <th class="px-4 py-3 text-right whitespace-nowrap">Berkas</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200/70">
                        @foreach($paymentHistory as $item)
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap">{{ $item->created_at?->translatedFormat('d M Y H:i') }}</td>
                                <td class="px-3 py-3 whitespace-nowrap">{{ $item->bank_name_snapshot }} ({{ $item->account_number_snapshot }})</td>
                                <td class="px-3 py-3 whitespace-nowrap">
                                    <strong>{{ $item->sender_name }}</strong> &bull; Rp {{ number_format((float) $item->amount, 0, ',', '.') }}
                                </td>
                                <td class="px-3 py-3 text-center whitespace-nowrap">
                                    <x-cbt.badge color="{{ $item->isApproved() ? 'success' : ($item->isRejected() ? 'danger' : 'warning') }}">
                                        {{ $item->getStatusLabel() }}
                                    </x-cbt.badge>
                                    @if($item->isRejected() && $item->rejection_reason)
                                        <div class="text-[11px] text-rose-700 mt-1">{{ $item->rejection_reason }}</div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-right whitespace-nowrap">
                                    <a href="{{ route('student.payments.proof', $item) }}" target="_blank" rel="noopener noreferrer" class="text-primary font-semibold hover:underline">Lihat Bukti</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-cbt.card>
    @endif
</div>
@endsection
