@extends('layouts.staff')

@section('title', 'Pembayaran & Rekening Ujian')
@section('page-parent', 'Pelaksanaan Ujian')
@section('page-title', 'Verifikasi Pembayaran & Rekening Bank')
@section('page-subtitle', 'Kelola daftar rekening bank tujuan transfer dan verifikasi bukti pembayaran peserta ujian sebelum masuk ruang CBT.')

@section('content')
<div class="space-y-6 w-full">

    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <x-cbt.stat-card
            title="Menunggu Verifikasi"
            value="{{ $stats['pending'] }}"
            subtitle="Perlu Dicek Admin"
            icon="clock"
            color="warning" />
        <x-cbt.stat-card
            title="Disetujui / Lunas"
            value="{{ $stats['approved'] }}"
            subtitle="Boleh Ikut Ujian"
            icon="check-circle-2"
            color="success" />
        <x-cbt.stat-card
            title="Ditolak"
            value="{{ $stats['rejected'] }}"
            subtitle="Wajib Unggah Ulang"
            icon="x-circle"
            color="danger" />
        <x-cbt.stat-card
            title="Rekening Bank Aktif"
            value="{{ $stats['active_banks'] }}"
            subtitle="Tujuan Transfer"
            icon="landmark"
            color="primary" />
    </div>

    <div class="border-b border-default-200 overflow-x-auto scrollbar-none -mx-3.5 px-3.5 sm:mx-0 sm:px-0">
        <nav class="flex gap-3 min-w-max pb-0.5">
            <a href="{{ route('staff.payments.index', ['tab' => 'verifications']) }}"
               class="py-3 px-2 border-b-2 text-xs font-bold whitespace-nowrap inline-flex items-center gap-2 {{ $activeTab === 'verifications' ? 'border-primary text-primary' : 'border-transparent text-default-500 hover:text-default-700' }}">
                <i data-lucide="receipt" class="size-4"></i>
                <span>Antrean Verifikasi Pembayaran</span>
                @if($stats['pending'] > 0)
                    <span class="px-1.5 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[10px] font-bold">{{ $stats['pending'] }}</span>
                @endif
            </a>
            <a href="{{ route('staff.payments.index', ['tab' => 'banks']) }}"
               class="py-3 px-2 border-b-2 text-xs font-bold whitespace-nowrap inline-flex items-center gap-2 {{ $activeTab === 'banks' ? 'border-primary text-primary' : 'border-transparent text-default-500 hover:text-default-700' }}">
                <i data-lucide="landmark" class="size-4"></i>
                <span>Kelola Rekening Bank ({{ $bankAccounts->count() }})</span>
            </a>
        </nav>
    </div>

    @if($activeTab === 'banks')
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div>
                <x-cbt.card title="Tambah Rekening Bank Tujuan">
                    <form action="{{ route('staff.payments.banks.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Nama Bank *</label>
                            <input type="text" name="bank_name" value="{{ old('bank_name') }}" placeholder="Contoh: Bank Syariah Indonesia (BSI) / BRI / Mandiri" class="form-input w-full h-10 text-xs rounded-lg border-default-200" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Nomor Rekening *</label>
                            <input type="text" name="account_number" value="{{ old('account_number') }}" placeholder="Contoh: 7123456789" class="form-input w-full h-10 text-xs font-mono rounded-lg border-default-200" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Atas Nama Pemilik Rekening *</label>
                            <input type="text" name="account_holder" value="{{ old('account_holder') }}" placeholder="Contoh: Lembaga Bahasa Universitas PTIQ" class="form-input w-full h-10 text-xs rounded-lg border-default-200" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Kantor Cabang (Opsional)</label>
                            <input type="text" name="branch" value="{{ old('branch') }}" placeholder="Contoh: KCP Ciputat / Jakarta" class="form-input w-full h-10 text-xs rounded-lg border-default-200">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Catatan Tambahan (Opsional)</label>
                            <input type="text" name="notes" value="{{ old('notes') }}" placeholder="Contoh: Cantumkan NIM pada berita transfer" class="form-input w-full h-10 text-xs rounded-lg border-default-200">
                        </div>
                        <button type="submit" class="btn btn-sm w-full h-10 bg-primary hover:bg-primary-hover text-white font-semibold text-xs rounded-lg inline-flex items-center justify-center gap-1.5 cursor-pointer">
                            <i data-lucide="plus" class="size-4"></i>
                            <span>Simpan Rekening Bank</span>
                        </button>
                    </form>
                </x-cbt.card>
            </div>

            <div class="lg:col-span-2">
                <x-cbt.card flush title="Daftar Rekening Pembayaran Institusi">
                    <div class="overflow-x-auto -mx-3.5 sm:mx-0">
                        <table class="w-full min-w-[700px] divide-y divide-default-200 text-left text-xs">
                            <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                                <tr>
                                    <th class="px-4 py-3 whitespace-nowrap">Bank &amp; Cabang</th>
                                    <th class="px-3 py-3 whitespace-nowrap">Nomor Rekening</th>
                                    <th class="px-3 py-3 whitespace-nowrap">Atas Nama</th>
                                    <th class="px-3 py-3 text-center whitespace-nowrap">Status</th>
                                    <th class="px-4 py-3 text-right whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200/70">
                                @forelse($bankAccounts as $bank)
                                    <tr class="hover:bg-default-50/70">
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <strong class="text-default-900 block">{{ $bank->bank_name }}</strong>
                                            @if($bank->branch)
                                                <span class="text-[11px] text-default-500">{{ $bank->branch }}</span>
                                            @endif
                                            @if($bank->notes)
                                                <span class="block text-[10px] text-default-400">{{ $bank->notes }}</span>
                                            @endif
                                        </td>
                                        <td class="px-3 py-3 font-mono font-bold text-primary whitespace-nowrap">{{ $bank->account_number }}</td>
                                        <td class="px-3 py-3 text-default-800 whitespace-nowrap">{{ $bank->account_holder }}</td>
                                        <td class="px-3 py-3 text-center whitespace-nowrap">
                                            <x-cbt.badge color="{{ $bank->is_active ? 'success' : 'slate' }}">
                                                {{ $bank->is_active ? 'Aktif' : 'Nonaktif' }}
                                            </x-cbt.badge>
                                        </td>
                                        <td class="px-4 py-3 text-right whitespace-nowrap space-x-1">
                                            <button type="button"
                                                    onclick="openEditBankModal({{ $bank->id }}, '{{ addslashes($bank->bank_name) }}', '{{ addslashes($bank->account_number) }}', '{{ addslashes($bank->account_holder) }}', '{{ addslashes($bank->branch ?? '') }}', '{{ addslashes($bank->notes ?? '') }}')"
                                                    class="px-2.5 py-1 rounded bg-default-100 hover:bg-default-200 text-default-700 text-[11px] font-semibold cursor-pointer">
                                                Edit
                                            </button>
                                            <form action="{{ route('staff.payments.banks.toggle', $bank) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="px-2.5 py-1 rounded bg-amber-50 hover:bg-amber-100 text-amber-800 text-[11px] font-semibold cursor-pointer">
                                                    {{ $bank->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                                </button>
                                            </form>
                                            <form action="{{ route('staff.payments.banks.destroy', $bank) }}" method="POST" class="inline" onsubmit="return confirm('Hapus rekening ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-2.5 py-1 rounded bg-rose-50 hover:bg-rose-100 text-rose-700 text-[11px] font-semibold cursor-pointer">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-10 text-center text-default-400">
                                            Belum ada rekening bank terdaftar. Silakan tambahkan minimal satu rekening di formulir sebelah kiri.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </x-cbt.card>
            </div>
        </div>
    @else
        <x-cbt.card>
            <form method="GET" action="{{ route('staff.payments.index') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-3 items-end">
                <input type="hidden" name="tab" value="verifications">
                <div>
                    <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Status Verifikasi</label>
                    <select name="status" class="form-select w-full h-9 text-xs rounded-lg border-default-200">
                        <option value="all" @selected(request('status', 'all') === 'all')>Semua Status</option>
                        <option value="pending" @selected(request('status') === 'pending')>Menunggu Verifikasi</option>
                        <option value="approved" @selected(request('status') === 'approved')>Disetujui / Lunas</option>
                        <option value="rejected" @selected(request('status') === 'rejected')>Ditolak</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Filter Ujian Berbayar</label>
                    <select name="exam_id" class="form-select w-full h-9 text-xs rounded-lg border-default-200">
                        <option value="">Semua Ujian</option>
                        @foreach($exams as $ex)
                            <option value="{{ $ex->id }}" @selected(request('exam_id') == $ex->id)>{{ $ex->code }} - {{ $ex->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Cari Siswa / Pengirim</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama siswa, NIM, nama pengirim..." class="form-input w-full h-9 text-xs rounded-lg border-default-200">
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="btn btn-sm flex-1 h-9 bg-primary hover:bg-primary-hover text-white font-semibold text-xs rounded-lg cursor-pointer">
                        Filter
                    </button>
                    <a href="{{ route('staff.payments.index') }}" class="btn btn-sm h-9 bg-default-100 hover:bg-default-200 text-default-700 font-semibold text-xs rounded-lg inline-flex items-center px-3">
                        Reset
                    </a>
                </div>
            </form>
        </x-cbt.card>

        <x-cbt.card flush title="Daftar Bukti Transfer Peserta Ujian">
            <div class="overflow-x-auto -mx-3.5 sm:mx-0">
                <table class="w-full min-w-[880px] divide-y divide-default-200 text-left text-xs">
                    <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                        <tr>
                            <th class="px-4 py-3 whitespace-nowrap">Peserta</th>
                            <th class="px-3 py-3 whitespace-nowrap">Ujian &amp; Nominal</th>
                            <th class="px-3 py-3 whitespace-nowrap">Rekening Tujuan</th>
                            <th class="px-3 py-3 whitespace-nowrap">Pengirim &amp; Tgl Transfer</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Bukti</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Status</th>
                            <th class="px-4 py-3 text-right whitespace-nowrap">Tindakan Admin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200/70">
                        @forelse($payments as $pay)
                            <tr class="hover:bg-default-50/80">
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <strong class="text-default-900 block">{{ $pay->student?->name ?? '-' }}</strong>
                                    <span class="font-mono text-[11px] text-default-500">{{ $pay->student?->identity_number ?? $pay->student?->username ?? '-' }}</span>
                                </td>
                                <td class="px-3 py-3 whitespace-nowrap">
                                    <span class="font-semibold text-default-800 block">{{ $pay->exam?->title ?? '-' }}</span>
                                    <span class="font-mono font-bold text-primary">Rp {{ number_format((float) $pay->amount, 0, ',', '.') }}</span>
                                </td>
                                <td class="px-3 py-3 whitespace-nowrap">
                                    <span class="font-semibold text-default-800 block">{{ $pay->bank_name_snapshot }}</span>
                                    <span class="font-mono text-[11px] text-default-500">{{ $pay->account_number_snapshot }}</span>
                                </td>
                                <td class="px-3 py-3 whitespace-nowrap">
                                    <span class="font-semibold text-default-800 block">{{ $pay->sender_name }} ({{ $pay->sender_bank }})</span>
                                    <span class="text-[11px] text-default-500">{{ $pay->transfer_date?->translatedFormat('d M Y') ?? '-' }}</span>
                                </td>
                                <td class="px-3 py-3 text-center whitespace-nowrap">
                                    @php $isPdfProof = str_ends_with(strtolower((string) $pay->proof_path), '.pdf'); @endphp
                                    @if($isPdfProof)
                                        <a href="{{ route('staff.payments.proof', $pay) }}" target="_blank" rel="noopener noreferrer" class="px-2.5 py-1 rounded bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-semibold inline-flex items-center gap-1">
                                            <i data-lucide="file-text" class="size-3.5"></i>
                                            <span>Lihat PDF</span>
                                        </a>
                                    @else
                                        <button type="button" onclick="openProofPreviewModal('{{ route('staff.payments.proof', $pay) }}', '{{ addslashes($pay->student?->name ?? 'Peserta') }}')" class="px-2.5 py-1 rounded bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-semibold inline-flex items-center gap-1 cursor-pointer">
                                            <i data-lucide="image" class="size-3.5"></i>
                                            <span>Lihat Bukti</span>
                                        </button>
                                    @endif
                                </td>
                                <td class="px-3 py-3 text-center whitespace-nowrap">
                                    <x-cbt.badge color="{{ $pay->isApproved() ? 'success' : ($pay->isRejected() ? 'danger' : 'warning') }}">
                                        {{ $pay->getStatusLabel() }}
                                    </x-cbt.badge>
                                    @if($pay->isRejected() && $pay->rejection_reason)
                                        <div class="text-[10px] text-rose-700 mt-1 max-w-[180px] truncate" title="{{ $pay->rejection_reason }}">
                                            Alasan: {{ $pay->rejection_reason }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-right whitespace-nowrap space-x-1">
                                    @if(! $pay->isApproved())
                                        <form action="{{ route('staff.payments.approve', $pay) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="px-2.5 py-1.5 rounded bg-emerald-600 hover:bg-emerald-700 text-white text-[11px] font-bold cursor-pointer">
                                                Terima
                                            </button>
                                        </form>
                                    @endif
                                    @if(! $pay->isRejected())
                                        <button type="button" onclick="openRejectPaymentModal({{ $pay->id }}, '{{ addslashes($pay->student?->name ?? 'Peserta') }}')" class="px-2.5 py-1.5 rounded bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 text-[11px] font-bold cursor-pointer">
                                            Tolak
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-10 text-center text-default-400">
                                    Belum ada unggahan bukti pembayaran dari peserta ujian.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($payments->hasPages())
                <div class="p-4 border-t border-default-200">{{ $payments->links() }}</div>
            @endif
        </x-cbt.card>
    @endif
</div>

<!-- Modal Tolak Pembayaran -->
<div id="rejectPaymentModal" role="dialog" aria-modal="true" aria-labelledby="rejectPaymentModalTitle" class="hidden fixed inset-0 z-50 bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4">
    <div class="card max-w-md w-full max-h-[90vh] flex flex-col p-5 shadow-2xl">
        <div class="flex items-center justify-between border-b border-default-200 pb-3 shrink-0">
            <div>
                <h3 id="rejectPaymentModalTitle" class="text-sm font-bold text-default-900">Tolak Bukti Pembayaran</h3>
                <p id="rejectPaymentStudentName" class="text-[11px] text-default-500 mt-0.5"></p>
            </div>
            <button type="button" onclick="document.getElementById('rejectPaymentModal').classList.add('hidden')" class="p-1 text-default-400 hover:text-default-700 cursor-pointer">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>
        <form id="rejectPaymentForm" method="POST" class="pt-4 space-y-4 overflow-y-auto flex-1">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Alasan Penolakan (Wajib Dibaca Siswa) *</label>
                <textarea name="rejection_reason" rows="3" required placeholder="Contoh: Nominal transfer kurang, foto bukti buram/terpotong, atau rekening tujuan salah." class="form-textarea w-full text-xs rounded-lg border-default-200"></textarea>
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100 w-full sm:w-auto">
                <button type="button" onclick="document.getElementById('rejectPaymentModal').classList.add('hidden')" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold w-full sm:w-auto">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-rose-600 hover:bg-rose-700 text-white font-bold w-full sm:w-auto cursor-pointer">
                    Tolak Pembayaran
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Preview Bukti Gambar -->
<div id="proofPreviewModal" role="dialog" aria-modal="true" aria-labelledby="proofPreviewTitle" class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4">
    <div class="card max-w-2xl w-full max-h-[90vh] flex flex-col p-4 shadow-2xl">
        <div class="flex items-center justify-between border-b border-default-200 pb-2.5 shrink-0">
            <h3 id="proofPreviewTitle" class="text-sm font-bold text-default-900">Pratinjau Bukti Transfer</h3>
            <button type="button" onclick="document.getElementById('proofPreviewModal').classList.add('hidden')" class="p-1 text-default-500 hover:text-default-800 cursor-pointer" aria-label="Tutup dialog">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>
        <div class="overflow-y-auto py-3 flex-1 flex items-center justify-center bg-default-50 rounded-lg my-2">
            <img id="proofPreviewImage" src="" alt="Bukti Transfer" class="max-h-[65vh] w-auto object-contain rounded">
        </div>
        <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-2 border-t border-default-100 w-full sm:w-auto shrink-0">
            <a id="proofDownloadLink" href="#" onclick="if(!this.dataset.ready){return false;}" target="_blank" rel="noopener noreferrer" class="btn btn-sm bg-primary text-white font-semibold w-full sm:w-auto text-center">Buka Ukuran Penuh</a>
            <button type="button" onclick="document.getElementById('proofPreviewModal').classList.add('hidden')" class="btn btn-sm bg-default-100 text-default-700 font-semibold w-full sm:w-auto cursor-pointer">Tutup</button>
        </div>
    </div>
</div>

<!-- Modal Edit Bank -->
<div id="editBankModal" role="dialog" aria-modal="true" aria-labelledby="editBankModalTitle" class="hidden fixed inset-0 z-50 bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4">
    <div class="card max-w-md w-full max-h-[90vh] flex flex-col p-5 shadow-2xl">
        <div class="flex items-center justify-between border-b border-default-200 pb-3 shrink-0">
            <h3 id="editBankModalTitle" class="text-sm font-bold text-default-900">Edit Rekening Bank</h3>
            <button type="button" onclick="document.getElementById('editBankModal').classList.add('hidden')" class="p-1 text-default-400 hover:text-default-700 cursor-pointer">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>
        <form id="editBankForm" method="POST" class="pt-4 space-y-3 overflow-y-auto flex-1">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Nama Bank *</label>
                <input type="text" id="edit_bank_name" name="bank_name" required class="form-input w-full h-10 text-xs rounded-lg border-default-200">
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Nomor Rekening *</label>
                <input type="text" id="edit_account_number" name="account_number" required class="form-input w-full h-10 text-xs font-mono rounded-lg border-default-200">
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Atas Nama *</label>
                <input type="text" id="edit_account_holder" name="account_holder" required class="form-input w-full h-10 text-xs rounded-lg border-default-200">
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Cabang</label>
                <input type="text" id="edit_branch" name="branch" class="form-input w-full h-10 text-xs rounded-lg border-default-200">
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Catatan</label>
                <input type="text" id="edit_notes" name="notes" class="form-input w-full h-10 text-xs rounded-lg border-default-200">
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100 w-full sm:w-auto">
                <button type="button" onclick="document.getElementById('editBankModal').classList.add('hidden')" class="btn btn-sm bg-default-100 text-default-700 font-semibold w-full sm:w-auto">Batal</button>
                <button type="submit" class="btn btn-sm bg-primary text-white font-bold w-full sm:w-auto cursor-pointer">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openRejectPaymentModal(id, studentName) {
        document.getElementById('rejectPaymentForm').action = `/staff/payments/${id}/reject`;
        document.getElementById('rejectPaymentStudentName').textContent = 'Peserta: ' + studentName;
        document.getElementById('rejectPaymentModal').classList.remove('hidden');
    }

    function openProofPreviewModal(url, studentName) {
        document.getElementById('proofPreviewTitle').textContent = 'Bukti Transfer - ' + studentName;
        document.getElementById('proofPreviewImage').src = url;
        const dl = document.getElementById('proofDownloadLink');
        dl.href = url;
        dl.dataset.ready = url ? '1' : '';
        document.getElementById('proofPreviewModal').classList.remove('hidden');
    }

    function openEditBankModal(id, name, number, holder, branch, notes) {
        document.getElementById('editBankForm').action = `/staff/payments/bank-accounts/${id}`;
        document.getElementById('edit_bank_name').value = name;
        document.getElementById('edit_account_number').value = number;
        document.getElementById('edit_account_holder').value = holder;
        document.getElementById('edit_branch').value = branch;
        document.getElementById('edit_notes').value = notes;
        document.getElementById('editBankModal').classList.remove('hidden');
    }
</script>
@endsection
