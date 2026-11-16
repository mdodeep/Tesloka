@extends('layouts.staff')

@section('title', 'Manajemen Pengguna — TESLOKA CBT')
@section('page-parent', 'Master Organisasi')
@section('page-title', 'Manajemen Pengguna')
@section('page-subtitle', 'Kelola akun administrator, pengajar, pengawas, dan peserta ujian secara terpadu.')

@section('page-actions')
    <a href="{{ route('staff.users.export-csv') }}" class="btn btn-sm border border-default-200 bg-card hover:bg-default-100 text-default-700 shadow-xs inline-flex items-center gap-1.5 transition-all">
        <i data-lucide="download" class="size-4 text-default-500"></i>
        <span>Ekspor CSV</span>
    </a>
    <button type="button" onclick="document.getElementById('modal-import').classList.remove('hidden')" class="btn btn-sm bg-success text-white hover:bg-success/90 shadow-xs inline-flex items-center gap-1.5 transition-all cursor-pointer">
        <i data-lucide="upload" class="size-4"></i>
        <span>Impor CSV</span>
    </button>
    <button type="button" onclick="document.getElementById('modal-create-user').classList.remove('hidden')" class="btn btn-sm bg-primary text-white hover:bg-primary-hover shadow-xs inline-flex items-center gap-1.5 transition-all cursor-pointer">
        <i data-lucide="user-plus" class="size-4"></i>
        <span>Buat Akun Baru</span>
    </button>
@endsection

@section('content')
<div class="space-y-5">

    <!-- Segmented Navigation Tabs: Pemisahan Staf & Peserta Ujian -->
    <div class="flex items-center gap-2 border-b border-default-200 pb-3 overflow-x-auto text-xs">
        <a href="{{ route('staff.users.index', array_merge(request()->except('page', 'tab'), ['tab' => 'all'])) }}"
           class="inline-flex items-center gap-2 px-3.5 py-2 rounded-md font-semibold transition shrink-0 {{ $currentTab === 'all' ? 'bg-primary text-white shadow-xs' : 'bg-card border border-default-200 text-default-700 hover:bg-default-50' }}">
            <i data-lucide="users" class="size-4"></i>
            <span>Semua Pengguna</span>
            <span class="px-2 py-0.5 rounded-full text-[10px] {{ $currentTab === 'all' ? 'bg-white/20 text-white font-bold' : 'bg-default-100 text-default-600 font-semibold' }}">{{ number_format($countAll) }}</span>
        </a>

        <a href="{{ route('staff.users.index', array_merge(request()->except('page', 'tab'), ['tab' => 'staff'])) }}"
           class="inline-flex items-center gap-2 px-3.5 py-2 rounded-md font-semibold transition shrink-0 {{ $currentTab === 'staff' ? 'bg-primary text-white shadow-xs' : 'bg-card border border-default-200 text-default-700 hover:bg-default-50' }}">
            <i data-lucide="shield-check" class="size-4"></i>
            <span>Staf &amp; Pengawas</span>
            <span class="px-2 py-0.5 rounded-full text-[10px] {{ $currentTab === 'staff' ? 'bg-white/20 text-white font-bold' : 'bg-primary/10 text-primary font-bold' }}">{{ number_format($countStaff) }}</span>
        </a>

        <a href="{{ route('staff.users.index', array_merge(request()->except('page', 'tab'), ['tab' => 'student'])) }}"
           class="inline-flex items-center gap-2 px-3.5 py-2 rounded-md font-semibold transition shrink-0 {{ $currentTab === 'student' ? 'bg-primary text-white shadow-xs' : 'bg-card border border-default-200 text-default-700 hover:bg-default-50' }}">
            <i data-lucide="graduation-cap" class="size-4"></i>
            <span>Peserta Ujian (Siswa)</span>
            <span class="px-2 py-0.5 rounded-full text-[10px] {{ $currentTab === 'student' ? 'bg-white/20 text-white font-bold' : 'bg-teal-50 text-teal-700 font-bold border border-teal-200' }}">{{ number_format($countStudent) }}</span>
        </a>
    </div>

    <!-- Filter Form (Design System) -->
    <x-cbt.card>
        <form method="GET" action="{{ route('staff.users.index') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-4 items-end text-xs">
            <input type="hidden" name="tab" value="{{ $currentTab }}">
            <div class="min-w-0">
                <label for="filter_search" class="block text-xs font-semibold uppercase tracking-wider text-default-700 mb-1.5">Cari Nama / NIM / NIK / Email</label>
                <input type="text" id="filter_search" name="search" value="{{ request('search') }}" placeholder="Ketik kata kunci..." class="form-input w-full">
            </div>
            <div class="min-w-0">
                <label for="filter_role" class="block text-xs font-semibold uppercase tracking-wider text-default-700 mb-1.5">Filter Peran (Role)</label>
                <select id="filter_role" name="role" class="form-select w-full truncate">
                    <option value="">-- Semua Peran --</option>
                    @foreach ($roles as $r)
                        <option value="{{ $r->name }}" {{ request('role') == $r->name ? 'selected' : '' }}>{{ $r->display_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="min-w-0">
                <label for="filter_status" class="block text-xs font-semibold uppercase tracking-wider text-default-700 mb-1.5">Filter Status</label>
                <select id="filter_status" name="status" class="form-select w-full">
                    <option value="">-- Semua Status --</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                    <option value="locked" {{ request('status') == 'locked' ? 'selected' : '' }}>Terkunci</option>
                </select>
            </div>
            <div class="flex items-center gap-2 min-w-0">
                <x-cbt.button type="submit" variant="primary" size="sm" class="flex-1">
                    <i data-lucide="filter" class="size-3.5"></i>
                    <span>Filter</span>
                </x-cbt.button>
                <a href="{{ route('staff.users.index', ['tab' => $currentTab]) }}" class="btn btn-sm border border-default-200 bg-default-100 hover:bg-default-200 text-default-700" title="Reset Filter">
                    Reset
                </a>
            </div>
        </form>
    </x-cbt.card>

    <!-- Users Table with Batch Selection -->
    <x-cbt.card 
        title="Daftar Pengguna Sistem ({{ $currentTab === 'staff' ? 'Staf & Pengawas' : ($currentTab === 'student' ? 'Peserta Ujian' : 'Seluruh Pengguna') }})" 
        subtitle="Kelola data akun, informasi identitas (NIM/NIK), serta lakukan aksi massal terintegrasi.">
        
        <!-- Bilah Aksi Massal Terintegrasi Langsung di Atas Tabel (Tanpa Pop-up Mengambang) -->
        <div id="batchActionBar" class="mb-4 p-3 rounded-md border transition-all duration-200 bg-default-50 border-default-200">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs">
                <div class="flex items-center gap-2.5">
                    <span class="inline-flex size-6 rounded-full bg-default-200 text-default-700 font-bold text-xs items-center justify-center transition-colors" id="selectedCountBadge">0</span>
                    <span class="font-medium text-default-700">
                        <span id="selectedCountText">0</span> pengguna dipilih
                    </span>
                    <button type="button" id="clearSelectionBtn" onclick="clearAllSelections()" class="hidden ml-1 text-default-500 hover:text-danger underline cursor-pointer text-[11px] transition">
                        Batal Pilih
                    </button>
                </div>

                <div class="flex items-center gap-2 flex-wrap sm:flex-nowrap">
                    <span class="text-default-500 font-medium text-xs hidden md:inline whitespace-nowrap">Aksi Massal:</span>
                    
                    <!-- Dropdown Ubah Status Massal -->
                    <select id="bulkStatusSelect" disabled class="form-select text-xs h-9 py-1 px-3 rounded-md bg-default-100 border border-default-200 text-default-400 disabled:cursor-not-allowed transition">
                        <option value="">-- Ubah Status --</option>
                        <option value="active">Jadikan Aktif</option>
                        <option value="inactive">Jadikan Nonaktif</option>
                        <option value="locked">Kunci Akun</option>
                    </select>

                    <button type="button" id="applyStatusBtn" disabled onclick="executeBulkStatus()" class="btn btn-sm h-9 px-3.5 rounded-md whitespace-nowrap bg-default-100 text-default-400 border border-default-200 font-semibold shadow-none cursor-not-allowed transition-all inline-flex items-center justify-center gap-1.5">
                        <i data-lucide="check" class="size-4 shrink-0"></i>
                        <span class="whitespace-nowrap">Terapkan</span>
                    </button>

                    <!-- Hapus Terpilih -->
                    <button type="button" id="bulkDeleteBtn" disabled onclick="openBulkDeleteModal()" class="btn btn-sm h-9 px-3.5 rounded-md whitespace-nowrap bg-default-100 text-default-400 border border-default-200 font-semibold shadow-none cursor-not-allowed transition-all inline-flex items-center justify-center gap-1.5">
                        <i data-lucide="trash-2" class="size-4 shrink-0"></i>
                        <span class="whitespace-nowrap">Hapus Terpilih</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto -mx-3.5 sm:mx-0">
            <table class="w-full min-w-[850px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-users">
                <thead class="bg-default-150">
                    <tr class="text-xs uppercase font-semibold text-default-600 whitespace-nowrap tracking-wider">
                        <th class="w-10 px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">
                            <input type="checkbox" id="selectAllCheckbox" onchange="toggleSelectAll(this)" class="form-checkbox size-4 rounded text-primary cursor-pointer" title="Pilih Semua di Halaman Ini">
                        </th>
                        <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Nama &amp; Username</th>
                        <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">
                            @if($currentTab === 'student')
                                NIM / NIK
                            @elseif($currentTab === 'staff')
                                NIP / ID Staf
                            @else
                                Identitas (NIM / NIP / NIK)
                            @endif
                        </th>
                        <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Email &amp; Kontak</th>
                        <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">
                            @if($currentTab === 'student')
                                Rombel / Kelas
                            @else
                                Peran &amp; Akses
                            @endif
                        </th>
                        <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Status</th>
                        <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Profil</th>
                        <th class="px-3.5 py-3 border-b border-default-200 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200 dark:divide-white/14">
                    @forelse ($users as $u)
                        <tr class="hover:bg-default-50 transition" id="user-row-{{ $u->id }}">
                            <td class="w-10 px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                @if ($u->id !== auth('staff')->id())
                                    <input type="checkbox" name="user_ids[]" value="{{ $u->id }}" data-id="{{ $u->id }}" data-name="{{ $u->name }}" onchange="handleRowCheckboxChange()" class="user-checkbox form-checkbox size-4 rounded text-primary cursor-pointer">
                                @else
                                    <span class="text-default-300 text-[11px]" title="Akun Anda Sendiri">-</span>
                                @endif
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 whitespace-nowrap">
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ $u->photo_url }}" alt="{{ $u->name }}" class="size-8 rounded-full object-cover border border-default-200 shrink-0">
                                    <div>
                                        <div class="font-semibold text-default-900">{{ $u->name }}</div>
                                        <div class="text-[11px] text-default-400 font-mono">{{ $u->username }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 whitespace-nowrap">
                                <div class="font-mono font-medium text-default-700">{{ $u->identity_number ?? '-' }}</div>
                                @if($u->nik)
                                    <div class="text-[10px] text-default-400 font-mono">NIK: {{ $u->maskedNik() }}</div>
                                @endif
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 whitespace-nowrap">
                                <div class="text-default-600">{{ $u->email }}</div>
                                @if($u->phone)
                                    <div class="text-[10px] text-default-400">{{ $u->phone }}</div>
                                @endif
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 whitespace-nowrap">
                                @if($u->isStudent())
                                    @if($u->classes->isNotEmpty())
                                        @foreach($u->classes as $c)
                                            <span class="inline-block px-2 py-0.5 rounded text-[10px] font-semibold bg-teal-50 text-teal-700 border border-teal-200">
                                                {{ $c->name }}
                                            </span>
                                        @endforeach
                                    @else
                                        <span class="text-default-400 italic text-[11px]">Belum Ada Kelas</span>
                                    @endif
                                @else
                                    @foreach ($u->roles as $r)
                                        <span class="inline-block px-2 py-0.5 rounded text-[10px] font-semibold bg-primary/10 text-primary border border-primary/20">
                                            {{ $r->display_name }}
                                        </span>
                                    @endforeach
                                @endif
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                @if ($u->status === 'active')
                                    <x-cbt.badge color="success">Aktif</x-cbt.badge>
                                @elseif ($u->status === 'locked')
                                    <x-cbt.badge color="danger">Terkunci</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="secondary">Nonaktif</x-cbt.badge>
                                @endif
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                @if ($u->isStudent())
                                    @if ($u->isProfileComplete())
                                        <span class="text-success font-semibold inline-flex items-center gap-1">
                                            <i data-lucide="check" class="size-3.5"></i>
                                            Lengkap
                                        </span>
                                    @else
                                        <span class="text-warning font-medium text-[11px]">Belum Lengkap</span>
                                    @endif
                                @else
                                    <span class="text-default-400">-</span>
                                @endif
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-1.5">
                                    <!-- View User Detail -->
                                    <button type="button" 
                                            onclick="openViewUserModal({{ json_encode($u->only(['id', 'name', 'username', 'email', 'identity_number', 'nik', 'phone', 'gender', 'status', 'birth_place', 'city', 'province', 'postal_code', 'address']) + [
                                                'photo_url' => $u->photo_url,
                                                'has_custom_photo' => $u->hasCustomPhoto(),
                                                'roles' => $u->roles->pluck('display_name')->toArray(),
                                                'role_id' => $u->roles->first()?->id,
                                                'classes' => $u->classes->pluck('name')->toArray(),
                                                'is_profile_complete' => $u->isProfileComplete(),
                                                'has_2fa' => $u->hasEnabledTwoFactorAuthentication(),
                                                'masked_nik' => $u->maskedNik(),
                                                'birth_date_raw' => $u->birth_date ? $u->birth_date->format('Y-m-d') : '',
                                                'birth_date' => $u->birth_date ? $u->birth_date->format('d M Y') : null,
                                                'created_at' => $u->created_at->format('d M Y H:i'),
                                                'last_login_at' => $u->last_login_at ? $u->last_login_at->format('d M Y H:i') : 'Belum pernah login',
                                                'last_login_ip' => $u->last_login_ip ?? '-',
                                            ]) }})"
                                            class="btn btn-icon size-8 rounded border border-default-200 bg-card hover:bg-primary/10 text-default-600 hover:text-primary transition cursor-pointer" 
                                            title="Lihat Detail Pengguna">
                                        <i data-lucide="eye" class="size-4"></i>
                                    </button>

                                    <!-- Edit User -->
                                    <button type="button" 
                                            onclick="openEditUserFromData({{ json_encode($u->only(['id', 'name', 'username', 'email', 'identity_number', 'nik', 'phone', 'gender', 'status', 'birth_place', 'address']) + [
                                                'role_id' => $u->roles->first()?->id,
                                                'class_id' => $u->classes->first()?->id,
                                                'birth_date_raw' => $u->birth_date ? $u->birth_date->format('Y-m-d') : '',
                                                'has_custom_photo' => $u->hasCustomPhoto(),
                                                'photo_url' => $u->photo_url,
                                            ]) }})"
                                            class="btn btn-icon size-8 rounded border border-default-200 bg-card hover:bg-info/10 text-default-600 hover:text-info transition cursor-pointer" 
                                            title="Edit Data Pengguna">
                                        <i data-lucide="edit-3" class="size-4"></i>
                                    </button>

                                    <!-- Reset Password -->
                                    <form method="POST" action="{{ route('staff.users.reset-password', $u) }}" class="inline" onsubmit="return confirm('Reset password akun ini ke password sementara acak?')">
                                        @csrf
                                        <button type="submit" class="btn btn-icon size-8 rounded border border-default-200 bg-card hover:bg-warning/10 text-default-600 hover:text-warning transition cursor-pointer" title="Reset Password Acak">
                                            <i data-lucide="key" class="size-4"></i>
                                        </button>
                                    </form>

                                    <!-- Delete Single User -->
                                    @if ($u->id !== auth('staff')->id())
                                        <form method="POST" action="{{ route('staff.users.destroy', $u) }}" class="inline" onsubmit="return confirm('Hapus pengguna {{ addslashes($u->name) }} secara permanen?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-icon size-8 rounded border border-default-200 bg-card hover:bg-danger/10 text-default-600 hover:text-danger transition cursor-pointer" title="Hapus Pengguna">
                                                <i data-lucide="trash-2" class="size-4"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-3.5 py-8 text-center text-default-400">
                                <x-cbt.empty-state title="Tidak Ada Pengguna" description="Tidak ditemukan pengguna yang sesuai dengan kriteria filter saat ini." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($users->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 px-4 py-3.5 border-t border-default-200 dark:border-white/14 bg-default-50/30">
                <p class="text-xs text-default-500">
                    Menampilkan <span class="font-semibold text-default-700">{{ $users->firstItem() ?? 0 }}</span> sampai <span class="font-semibold text-default-700">{{ $users->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-default-700">{{ $users->total() }}</span> data
                </p>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        @endif
    </x-cbt.card>
</div>

<!-- Modal Konfirmasi Hapus Massal -->
<div id="modal-bulk-delete" class="hidden fixed inset-0 bg-default-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="bg-card rounded-md max-w-md w-full p-4 sm:p-5 shadow-2xl border border-default-200 max-h-[90vh] flex flex-col">
        <div class="flex items-center justify-between pb-3 border-b border-default-200 mb-3 shrink-0">
            <h4 class="text-sm font-bold text-rose-600 flex items-center gap-2">
                <i data-lucide="alert-triangle" class="size-4.5"></i>
                <span>Konfirmasi Hapus Massal</span>
            </h4>
            <button type="button" onclick="closeModal('modal-bulk-delete')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>

        <form method="POST" action="{{ route('staff.users.bulk-delete') }}" id="formBulkDelete" class="space-y-3.5 text-xs overflow-y-auto pr-1">
            @csrf
            <div id="bulkDeleteInputsContainer"></div>

            <p class="text-default-700 leading-relaxed">
                Anda akan menghapus <strong id="bulkDeleteCountText" class="text-danger">0 pengguna</strong> yang telah dipilih.
            </p>

            <div class="p-3 bg-rose-50 border border-rose-200 rounded text-rose-800 space-y-1">
                <div class="font-semibold text-[11px] uppercase tracking-wider">Perlindungan Integritas CBT:</div>
                <p class="text-[11px] leading-relaxed">
                    Pengguna yang memiliki riwayat pengerjaan ujian, jawaban, atau kepemilikan bank soal akan secara otomatis <strong>dilewati (tidak dihapus)</strong> demi menjaga integritas data akademik.
                </p>
            </div>

            <div class="max-h-36 overflow-y-auto border border-default-200 rounded p-2 bg-default-50 font-mono text-[11px]" id="bulkDeleteNamesList"></div>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 shrink-0">
                <button type="button" onclick="closeModal('modal-bulk-delete')" class="btn btn-sm border border-default-200 text-default-700 hover:bg-default-100 rounded w-full sm:w-auto cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-rose-600 text-white hover:bg-rose-700 rounded w-full sm:w-auto cursor-pointer font-bold">
                    Hapus Pengguna Terpilih
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Form Tersembunyi untuk Ubah Status Massal -->
<form id="formBulkStatus" method="POST" action="{{ route('staff.users.bulk-status') }}" class="hidden">
    @csrf
    <input type="hidden" name="status" id="formBulkStatusValue">
    <div id="bulkStatusInputsContainer"></div>
</form>

<!-- Modal Create User (Full Admin Data Entry) -->
<div id="modal-create-user" class="hidden fixed inset-0 bg-default-900/40 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="bg-card rounded-md max-w-xl w-full p-4 sm:p-5 shadow-2xl border border-default-200 max-h-[90vh] flex flex-col">
        <div class="flex items-center justify-between pb-3 border-b border-default-200 mb-4 shrink-0">
            <h4 class="text-sm font-semibold text-default-800 flex items-center gap-2">
                <i data-lucide="user-plus" class="size-4.5 text-primary"></i>
                <span>Buat Akun Pengguna Baru</span>
            </h4>
            <button type="button" onclick="document.getElementById('modal-create-user').classList.add('hidden')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>

        <form method="POST" action="{{ route('staff.users.store') }}" class="space-y-4 text-xs overflow-y-auto pr-1">
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="name" required placeholder="Contoh: Muhammad Ilham" class="form-input w-full">
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Username Unik <span class="text-danger">*</span></label>
                    <input type="text" name="username" required placeholder="ilham_peserta" class="form-input font-mono w-full">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" required placeholder="ilham@tesloka.test" class="form-input w-full">
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Peran (Role) <span class="text-danger">*</span></label>
                    <select name="role_id" required class="form-select w-full max-w-full truncate">
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}" {{ $r->name === 'student' ? 'selected' : '' }}>{{ $r->display_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="space-y-1.5 min-w-0">
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Rombel / Kelas (Khusus Siswa / Peserta Didik)</label>
                <select name="academic_class_id" class="form-select w-full">
                    <option value="">-- Tanpa Rombel / Belum Ditugaskan --</option>
                    @if(isset($academicClasses))
                        @foreach($academicClasses as $ac)
                            <option value="{{ $ac->id }}">{{ $ac->name }} ({{ $ac->code }}) &bull; Th. {{ $ac->academicYear->name ?? '-' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">NIM / NIP (Identitas)</label>
                    <input type="text" name="identity_number" placeholder="Contoh: NIM20260010 atau NIP1985..." class="form-input font-mono w-full">
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">NIK (16 Digit KTP)</label>
                    <input type="text" name="nik" maxlength="16" placeholder="3201xxxxxxxxxxxx" class="form-input font-mono w-full">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Jenis Kelamin</label>
                    <select name="gender" class="form-select w-full">
                        <option value="">-- Belum Dipilih --</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">No. Telepon / WhatsApp</label>
                    <input type="text" name="phone" placeholder="08xxxxxxxxxx" class="form-input w-full">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Tempat Lahir</label>
                    <input type="text" name="birth_place" placeholder="Kota / Kabupaten" class="form-input w-full">
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Tanggal Lahir</label>
                    <input type="date" name="birth_date" class="form-input w-full">
                </div>
            </div>

            <div class="space-y-1.5 min-w-0">
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Alamat Lengkap</label>
                <textarea name="address" rows="2" placeholder="Alamat domisili pengguna..." class="form-input w-full"></textarea>
            </div>

            <div class="space-y-1.5 min-w-0 pt-1 border-t border-default-200">
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Password (Opsional)</label>
                <input type="password" name="password" placeholder="Kosongkan untuk meng-generate password acak otomatis" class="form-input w-full">
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 shrink-0">
                <button type="button" onclick="document.getElementById('modal-create-user').classList.add('hidden')" class="btn btn-sm border border-default-200 text-default-700 hover:bg-default-100 rounded w-full sm:w-auto cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-primary text-white hover:bg-primary-hover rounded w-full sm:w-auto cursor-pointer font-bold">
                    Simpan Akun
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Bulk Import -->
<div id="modal-import" class="hidden fixed inset-0 bg-default-900/40 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="bg-card rounded-md max-w-lg w-full p-4 sm:p-5 shadow-2xl border border-default-200 max-h-[90vh] flex flex-col">
        <div class="flex items-center justify-between pb-3 border-b border-default-200 mb-4 shrink-0">
            <h4 class="text-sm font-semibold text-default-800">Impor Massal Akun Peserta Ujian (CSV)</h4>
            <button type="button" onclick="document.getElementById('modal-import').classList.add('hidden')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>

        <form method="POST" action="{{ route('staff.users.bulk-import') }}" enctype="multipart/form-data" class="space-y-4 text-xs overflow-y-auto pr-1">
            @csrf
            <div class="p-3 bg-primary/5 border border-primary/20 rounded text-default-800 space-y-1">
                <div class="font-semibold">Format Kolom Berkas CSV:</div>
                <div class="font-mono text-xs bg-card p-2 rounded border border-default-200 break-all">
                    nim,nama_lengkap,email,jenis_kelamin,kode_kelas
                </div>
                <div class="text-xs text-default-500">Contoh: <code>NIM20260099,Ahmad Fauzi,ahmad.f@tesloka.test,male,TIQ-1A</code></div>
            </div>

            <x-cbt.dropzone
                name="file"
                id="csv_import_dropzone"
                label="Pilih Berkas CSV Data Pengguna"
                accept=".csv,text/csv"
                maxSize="10MB"
                :required="true"
                hint="Unggah file spreadsheet berformat .csv yang sesuai template kolom di atas."
            />

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2.5 pt-3 border-t border-default-200 shrink-0">
                <button type="button" onclick="document.getElementById('modal-import').classList.add('hidden')" class="btn btn-sm border border-default-200 text-default-700 hover:bg-default-100 rounded w-full sm:w-auto cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-primary text-white hover:bg-primary-hover shadow-xs rounded inline-flex items-center justify-center gap-1.5 w-full sm:w-auto cursor-pointer font-bold">
                    <i data-lucide="upload" class="size-4"></i>
                    <span>Unggah &amp; Impor Peserta</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal View User Detail -->
<div id="modal-view-user" class="hidden fixed inset-0 bg-default-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="bg-card rounded-md max-w-2xl w-full p-4 sm:p-5 shadow-2xl border border-default-200 max-h-[90vh] flex flex-col">
        <div class="flex items-center justify-between pb-3 border-b border-default-200 mb-4 shrink-0">
            <h4 class="text-sm font-bold text-default-800 flex items-center gap-2">
                <i data-lucide="user-check" class="size-4.5 text-primary"></i>
                <span>Rincian Profil Pengguna</span>
            </h4>
            <button type="button" onclick="closeModal('modal-view-user')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>

        <div class="space-y-4 text-xs overflow-y-auto pr-1">
            <!-- Header User Card -->
            <div class="p-4 bg-default-50 border border-default-200 rounded-md flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <img id="view_user_avatar" src="{{ asset('assets/images/tesloka-default-profile.webp') }}" class="size-12 rounded-full object-cover border border-default-200 shrink-0 shadow-xs">
                    <div>
                        <h3 id="view_user_name" class="text-sm font-bold text-default-800">Nama Pengguna</h3>
                        <p id="view_user_email" class="text-xs text-default-500 font-mono">user@tesloka.test</p>
                        <div class="flex items-center gap-2 mt-1">
                            <span id="view_user_role_badge" class="px-2 py-0.5 rounded text-[10px] font-semibold bg-primary/10 text-primary border border-primary/20">
                                Administrator
                            </span>
                            <span id="view_user_status_badge" class="px-2 py-0.5 rounded text-[10px] font-semibold bg-success/10 text-success border border-success/20">
                                Aktif
                            </span>
                            <form id="form_reset_view_user_photo" method="POST" action="" class="hidden inline" onsubmit="return confirm('Apakah Anda yakin ingin mereset foto profil pengguna ini ke avatar default Tesloka?')">
                                @csrf
                                <button type="submit" class="px-2 py-0.5 rounded text-[10px] font-semibold bg-danger/10 text-danger hover:bg-danger hover:text-white transition cursor-pointer">
                                    Reset Foto
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="view_user_profile_complete" class="text-left sm:text-right">
                    <span class="text-[11px] font-semibold text-success bg-success/10 px-2.5 py-1 rounded inline-flex items-center gap-1 border border-success/20">
                        <i data-lucide="check-circle" class="size-3.5"></i> Profil Lengkap
                    </span>
                </div>
            </div>

            <!-- Detail Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-3.5">
                <div class="p-3 bg-card border border-default-200 rounded">
                    <span class="text-[10px] font-semibold text-default-400 uppercase tracking-wider block">Username Sistem</span>
                    <strong id="view_user_username" class="text-xs font-mono text-default-800 mt-0.5 block break-all">-</strong>
                </div>
                <div class="p-3 bg-card border border-default-200 rounded">
                    <span class="text-[10px] font-semibold text-default-400 uppercase tracking-wider block">NIM / NIP (Identitas)</span>
                    <strong id="view_user_identity" class="text-xs font-mono text-default-800 mt-0.5 block break-all">-</strong>
                </div>
                <div class="p-3 bg-card border border-default-200 rounded">
                    <span class="text-[10px] font-semibold text-default-400 uppercase tracking-wider block">Nomor Telepon / WhatsApp</span>
                    <strong id="view_user_phone" class="text-xs text-default-800 mt-0.5 block break-all">-</strong>
                </div>
                <div class="p-3 bg-card border border-default-200 rounded">
                    <span class="text-[10px] font-semibold text-default-400 uppercase tracking-wider block">Jenis Kelamin</span>
                    <strong id="view_user_gender" class="text-xs text-default-800 mt-0.5 block">-</strong>
                </div>
                <div class="p-3 bg-card border border-default-200 rounded">
                    <span class="text-[10px] font-semibold text-default-400 uppercase tracking-wider block">Nomor Induk Kependudukan (NIK)</span>
                    <strong id="view_user_nik" class="text-xs font-mono text-default-800 mt-0.5 block break-all">-</strong>
                </div>
                <div class="p-3 bg-card border border-default-200 rounded">
                    <span class="text-[10px] font-semibold text-default-400 uppercase tracking-wider block">Rombel / Kelas Terdaftar</span>
                    <strong id="view_user_classes" class="text-xs text-default-800 mt-0.5 block">-</strong>
                </div>
                <div class="p-3 bg-card border border-default-200 rounded sm:col-span-2">
                    <span class="text-[10px] font-semibold text-default-400 uppercase tracking-wider block">Tempat &amp; Tanggal Lahir</span>
                    <strong id="view_user_birth" class="text-xs text-default-800 mt-0.5 block">-</strong>
                </div>
                <div class="p-3 bg-card border border-default-200 rounded sm:col-span-2">
                    <span class="text-[10px] font-semibold text-default-400 uppercase tracking-wider block">Alamat Domisili</span>
                    <strong id="view_user_address" class="text-xs text-default-800 mt-0.5 block">-</strong>
                </div>
            </div>

            <!-- Metadata Keamanan & Waktu -->
            <div class="p-3.5 bg-default-50 border border-default-200 rounded text-xs space-y-1.5">
                <div class="flex justify-between text-default-600">
                    <span>Terdaftar Pada:</span>
                    <strong id="view_user_created" class="font-mono text-default-800">-</strong>
                </div>
                <div class="flex justify-between text-default-600">
                    <span>Login Terakhir:</span>
                    <strong id="view_user_last_login" class="font-mono text-default-800">-</strong>
                </div>
                <div class="flex justify-between text-default-600">
                    <span>IP Address Login Terakhir:</span>
                    <strong id="view_user_last_ip" class="font-mono text-default-800">-</strong>
                </div>
                <div class="flex justify-between text-default-600">
                    <span>Autentikasi Dua Faktor (2FA):</span>
                    <span id="view_user_2fa" class="font-semibold text-default-800">-</span>
                </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 shrink-0">
                <button type="button" onclick="closeModal('modal-view-user')" class="btn btn-sm border border-default-200 text-default-700 hover:bg-default-100 rounded cursor-pointer w-full sm:w-auto">
                    Tutup
                </button>
                <button type="button" id="btn-switch-to-edit" class="btn btn-sm bg-primary text-white hover:bg-primary-hover rounded inline-flex items-center justify-center gap-1.5 cursor-pointer w-full sm:w-auto font-bold">
                    <i data-lucide="edit-3" class="size-4"></i>
                    <span>Edit Akun Ini</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit User (Full Admin Editing Capability) -->
<div id="modal-edit-user" class="hidden fixed inset-0 bg-default-900/40 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="bg-card rounded-md max-w-xl w-full p-4 sm:p-5 shadow-2xl border border-default-200 max-h-[90vh] flex flex-col">
        <div class="flex items-center justify-between pb-3 border-b border-default-200 mb-4 shrink-0">
            <h4 class="text-sm font-semibold text-default-800 flex items-center gap-2">
                <i data-lucide="edit-3" class="size-4.5 text-primary"></i>
                <span>Edit Data Pengguna (Akses Penuh Administrator)</span>
            </h4>
            <button type="button" onclick="closeModal('modal-edit-user')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>

        <form id="form-edit-user" method="POST" action="" class="space-y-4 text-xs overflow-y-auto pr-1">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" id="edit_user_name" name="name" required class="form-input w-full">
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Username Unik <span class="text-danger">*</span></label>
                    <input type="text" id="edit_user_username" name="username" required class="form-input font-mono w-full">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Email <span class="text-danger">*</span></label>
                    <input type="email" id="edit_user_email" name="email" required class="form-input w-full">
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Peran (Role) <span class="text-danger">*</span></label>
                    <select id="edit_user_role_id" name="role_id" required class="form-select w-full max-w-full truncate">
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->display_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="space-y-1.5 min-w-0">
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Rombel / Kelas (Khusus Siswa / Peserta Didik)</label>
                <select id="edit_user_academic_class_id" name="academic_class_id" class="form-select w-full">
                    <option value="">-- Tanpa Rombel / Belum Ditugaskan --</option>
                    @if(isset($academicClasses))
                        @foreach($academicClasses as $ac)
                            <option value="{{ $ac->id }}">{{ $ac->name }} ({{ $ac->code }}) &bull; Th. {{ $ac->academicYear->name ?? '-' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">NIM / NIP (Identitas)</label>
                    <input type="text" id="edit_user_identity" name="identity_number" placeholder="NIM/NIP..." class="form-input font-mono w-full">
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">NIK (16 Digit KTP)</label>
                    <input type="text" id="edit_user_nik" name="nik" maxlength="16" placeholder="3201xxxxxxxxxxxx" class="form-input font-mono w-full">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Status Akun <span class="text-danger">*</span></label>
                    <select id="edit_user_status" name="status" required class="form-select w-full">
                        <option value="active">Aktif</option>
                        <option value="inactive">Nonaktif</option>
                        <option value="locked">Terkunci</option>
                    </select>
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Jenis Kelamin</label>
                    <select id="edit_user_gender" name="gender" class="form-select w-full">
                        <option value="">-- Belum Dipilih --</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Tempat Lahir</label>
                    <input type="text" id="edit_user_birth_place" name="birth_place" placeholder="Kota / Kabupaten" class="form-input w-full">
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Tanggal Lahir</label>
                    <input type="date" id="edit_user_birth_date" name="birth_date" class="form-input w-full">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Nomor Telepon / WhatsApp</label>
                    <input type="text" id="edit_user_phone" name="phone" placeholder="08xxxxxxxxxx" class="form-input w-full">
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Ganti Kata Sandi (Opsional)</label>
                    <input type="password" name="password" placeholder="Kosongkan jika tidak diubah" class="form-input w-full">
                </div>
            </div>

            <div class="space-y-1.5 min-w-0">
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Alamat Domisili</label>
                <textarea id="edit_user_address" name="address" rows="2" placeholder="Alamat lengkap..." class="form-input w-full"></textarea>
            </div>

            <!-- Opsi Kelola Foto Profil -->
            <div id="edit_user_photo_section" class="p-3 bg-default-50 border border-default-200 rounded space-y-2 hidden">
                <div class="flex items-center gap-3">
                    <img id="edit_user_avatar_preview" src="{{ asset('assets/images/tesloka-default-profile.webp') }}" class="size-10 rounded-full object-cover border border-default-200 shrink-0">
                    <div class="text-xs">
                        <span class="font-medium text-default-800 block">Pengguna Memiliki Foto Profil Kustom</span>
                        <label class="inline-flex items-center gap-1.5 text-danger font-medium cursor-pointer mt-1">
                            <input type="checkbox" name="remove_photo" value="1" class="form-checkbox text-danger rounded">
                            <span>Reset foto &amp; kembalikan ke avatar default Tesloka</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2.5 pt-3 border-t border-default-200 shrink-0">
                <button type="button" onclick="closeModal('modal-edit-user')" class="btn btn-sm border border-default-200 text-default-700 hover:bg-default-100 rounded cursor-pointer w-full sm:w-auto">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-primary text-white hover:bg-primary-hover rounded cursor-pointer w-full sm:w-auto font-bold">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    let currentViewingUser = null;

    function openModal(id) {
        const m = document.getElementById(id);
        if (m) m.classList.remove('hidden');
        if (window.lucide) lucide.createIcons();
    }

    function closeModal(id) {
        const m = document.getElementById(id);
        if (m) m.classList.add('hidden');
    }

    // --- BATCH SELECTION & ACTIONS LOGIC ---
    function toggleSelectAll(master) {
        const checkboxes = document.querySelectorAll('.user-checkbox:not(:disabled)');
        checkboxes.forEach(cb => {
            cb.checked = master.checked;
        });
        updateBatchActionBar();
    }

    function handleRowCheckboxChange() {
        const total = document.querySelectorAll('.user-checkbox:not(:disabled)').length;
        const checked = document.querySelectorAll('.user-checkbox:checked').length;
        const master = document.getElementById('selectAllCheckbox');
        if (master) {
            master.checked = total > 0 && checked === total;
            master.indeterminate = checked > 0 && checked < total;
        }
        updateBatchActionBar();
    }

    function updateBatchActionBar() {
        const checkedBoxes = document.querySelectorAll('.user-checkbox:checked');
        const count = checkedBoxes.length;
        const bar = document.getElementById('batchActionBar');
        const badge = document.getElementById('selectedCountBadge');
        const countText = document.getElementById('selectedCountText');
        const clearBtn = document.getElementById('clearSelectionBtn');
        const statusSelect = document.getElementById('bulkStatusSelect');
        const applyBtn = document.getElementById('applyStatusBtn');
        const deleteBtn = document.getElementById('bulkDeleteBtn');

        if (badge) badge.textContent = count;
        if (countText) countText.textContent = count;

        if (count > 0) {
            if (bar) {
                bar.classList.remove('bg-default-50', 'border-default-200');
                bar.classList.add('bg-primary/5', 'border-primary/30', 'ring-1', 'ring-primary/20');
            }
            if (badge) {
                badge.classList.remove('bg-default-200', 'text-default-700');
                badge.classList.add('bg-primary', 'text-white');
            }
            if (clearBtn) clearBtn.classList.remove('hidden');
            if (statusSelect) {
                statusSelect.disabled = false;
                statusSelect.className = 'form-select text-xs h-9 py-1 px-3 rounded-md bg-white border border-default-300 text-default-700 transition cursor-pointer';
            }
            if (applyBtn) {
                applyBtn.disabled = false;
                applyBtn.className = 'btn btn-sm h-9 px-3.5 rounded-md whitespace-nowrap bg-primary text-white hover:bg-primary-hover font-semibold shadow-xs cursor-pointer transition-all inline-flex items-center justify-center gap-1.5';
            }
            if (deleteBtn) {
                deleteBtn.disabled = false;
                deleteBtn.className = 'btn btn-sm h-9 px-3.5 rounded-md whitespace-nowrap bg-danger text-white hover:bg-danger/90 font-semibold shadow-xs cursor-pointer transition-all inline-flex items-center justify-center gap-1.5';
            }
        } else {
            if (bar) {
                bar.classList.remove('bg-primary/5', 'border-primary/30', 'ring-1', 'ring-primary/20');
                bar.classList.add('bg-default-50', 'border-default-200');
            }
            if (badge) {
                badge.classList.remove('bg-primary', 'text-white');
                badge.classList.add('bg-default-200', 'text-default-700');
            }
            if (clearBtn) clearBtn.classList.add('hidden');
            if (statusSelect) {
                statusSelect.value = '';
                statusSelect.disabled = true;
                statusSelect.className = 'form-select text-xs h-9 py-1 px-3 rounded-md bg-default-100 border border-default-200 text-default-400 disabled:cursor-not-allowed transition';
            }
            if (applyBtn) {
                applyBtn.disabled = true;
                applyBtn.className = 'btn btn-sm h-9 px-3.5 rounded-md whitespace-nowrap bg-default-100 text-default-400 border border-default-200 font-semibold shadow-none cursor-not-allowed transition-all inline-flex items-center justify-center gap-1.5';
            }
            if (deleteBtn) {
                deleteBtn.disabled = true;
                deleteBtn.className = 'btn btn-sm h-9 px-3.5 rounded-md whitespace-nowrap bg-default-100 text-default-400 border border-default-200 font-semibold shadow-none cursor-not-allowed transition-all inline-flex items-center justify-center gap-1.5';
            }
        }
    }

    function clearAllSelections() {
        document.querySelectorAll('.user-checkbox').forEach(cb => cb.checked = false);
        const master = document.getElementById('selectAllCheckbox');
        if (master) {
            master.checked = false;
            master.indeterminate = false;
        }
        updateBatchActionBar();
    }

    function openBulkDeleteModal() {
        const checkedBoxes = document.querySelectorAll('.user-checkbox:checked');
        if (checkedBoxes.length === 0) return;

        const inputsContainer = document.getElementById('bulkDeleteInputsContainer');
        const namesList = document.getElementById('bulkDeleteNamesList');
        inputsContainer.innerHTML = '';
        namesList.innerHTML = '';

        document.getElementById('bulkDeleteCountText').textContent = checkedBoxes.length + ' pengguna';

        checkedBoxes.forEach(cb => {
            const hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = 'user_ids[]';
            hidden.value = cb.value;
            inputsContainer.appendChild(hidden);

            const div = document.createElement('div');
            div.className = 'py-0.5 text-default-700 flex items-center justify-between';
            div.innerHTML = `<span>&bull; ${cb.dataset.name || 'ID ' + cb.value}</span><span class="text-default-400">ID: ${cb.value}</span>`;
            namesList.appendChild(div);
        });

        openModal('modal-bulk-delete');
    }

    function executeBulkStatus() {
        const status = document.getElementById('bulkStatusSelect').value;
        if (!status) {
            alert('Silakan pilih target status terlebih dahulu.');
            return;
        }

        const checkedBoxes = document.querySelectorAll('.user-checkbox:checked');
        if (checkedBoxes.length === 0) {
            alert('Tidak ada pengguna yang dipilih.');
            return;
        }

        if (!confirm(`Terapkan status '${status}' pada ${checkedBoxes.length} pengguna terpilih?`)) {
            return;
        }

        const container = document.getElementById('bulkStatusInputsContainer');
        container.innerHTML = '';
        document.getElementById('formBulkStatusValue').value = status;

        checkedBoxes.forEach(cb => {
            const hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = 'user_ids[]';
            hidden.value = cb.value;
            container.appendChild(hidden);
        });

        document.getElementById('formBulkStatus').submit();
    }

    // --- VIEW & EDIT MODALS LOGIC ---
    function openViewUserModal(user) {
        currentViewingUser = user;
        document.getElementById('view_user_name').textContent = user.name || '-';
        document.getElementById('view_user_email').textContent = user.email || '-';
        document.getElementById('view_user_username').textContent = user.username || '-';
        document.getElementById('view_user_identity').textContent = user.identity_number || '-';
        document.getElementById('view_user_phone').textContent = user.phone || '-';
        document.getElementById('view_user_gender').textContent = user.gender === 'male' ? 'Laki-laki' : (user.gender === 'female' ? 'Perempuan' : '-');
        document.getElementById('view_user_nik').textContent = user.masked_nik || (user.nik || '-');
        document.getElementById('view_user_classes').textContent = (user.classes && user.classes.length > 0) ? user.classes.join(', ') : 'Belum ditugaskan ke kelas';
        
        const birthParts = [];
        if (user.birth_place) birthParts.push(user.birth_place);
        if (user.birth_date) birthParts.push(user.birth_date);
        document.getElementById('view_user_birth').textContent = birthParts.length > 0 ? birthParts.join(', ') : '-';

        const addressParts = [];
        if (user.address) addressParts.push(user.address);
        if (user.city) addressParts.push(user.city);
        if (user.province) addressParts.push(user.province);
        if (user.postal_code) addressParts.push(user.postal_code);
        document.getElementById('view_user_address').textContent = addressParts.length > 0 ? addressParts.join(', ') : '-';

        document.getElementById('view_user_created').textContent = user.created_at || '-';
        document.getElementById('view_user_last_login').textContent = user.last_login_at || '-';
        document.getElementById('view_user_last_ip').textContent = user.last_login_ip || '-';
        document.getElementById('view_user_2fa').textContent = user.has_2fa ? 'Aktif (TOTP Terlindungi)' : 'Nonaktif';

        // Avatar Preview & Reset Button
        const avatarEl = document.getElementById('view_user_avatar');
        if (avatarEl) {
            avatarEl.src = user.photo_url || "{{ asset('assets/images/tesloka-default-profile.webp') }}";
        }
        const formResetPhoto = document.getElementById('form_reset_view_user_photo');
        if (formResetPhoto) {
            if (user.has_custom_photo) {
                formResetPhoto.action = `/staff/users/${user.id}/reset-photo`;
                formResetPhoto.classList.remove('hidden');
            } else {
                formResetPhoto.classList.add('hidden');
            }
        }

        // Role & Status Badges
        const roleName = (user.roles && user.roles.length > 0) ? user.roles[0] : 'Pengguna';
        document.getElementById('view_user_role_badge').textContent = roleName;
        
        const statusMap = {
            'active': 'Aktif',
            'inactive': 'Nonaktif',
            'locked': 'Terkunci'
        };
        document.getElementById('view_user_status_badge').textContent = statusMap[user.status] || user.status;

        // Profile complete badge
        const completeContainer = document.getElementById('view_user_profile_complete');
        if (user.is_profile_complete) {
            completeContainer.innerHTML = '<span class="text-[11px] font-semibold text-success bg-success/10 px-2.5 py-1 rounded inline-flex items-center gap-1 border border-success/20"><i data-lucide="check-circle" class="size-3.5"></i> Profil Lengkap</span>';
        } else {
            completeContainer.innerHTML = '<span class="text-[11px] font-semibold text-warning bg-warning/10 px-2.5 py-1 rounded inline-flex items-center gap-1 border border-warning/20"><i data-lucide="alert-circle" class="size-3.5"></i> Profil Belum Lengkap</span>';
        }

        // Configure switch to edit button
        const btnEdit = document.getElementById('btn-switch-to-edit');
        btnEdit.onclick = function() {
            closeModal('modal-view-user');
            openEditUserFromData(user);
        };

        openModal('modal-view-user');
    }

    function openEditUserFromData(u) {
        document.getElementById('form-edit-user').action = `/staff/users/${u.id}`;
        document.getElementById('edit_user_name').value = u.name || '';
        document.getElementById('edit_user_username').value = u.username || '';
        document.getElementById('edit_user_email').value = u.email || '';
        document.getElementById('edit_user_identity').value = u.identity_number || '';
        document.getElementById('edit_user_nik').value = u.nik || '';
        document.getElementById('edit_user_role_id').value = u.role_id || '';
        document.getElementById('edit_user_status').value = u.status || 'active';
        document.getElementById('edit_user_gender').value = u.gender || '';
        document.getElementById('edit_user_phone').value = u.phone || '';
        document.getElementById('edit_user_birth_place').value = u.birth_place || '';
        document.getElementById('edit_user_birth_date').value = u.birth_date_raw || '';
        document.getElementById('edit_user_address').value = u.address || '';
        const classSelect = document.getElementById('edit_user_academic_class_id');
        if (classSelect) {
            classSelect.value = u.class_id || (u.classes && u.classes.length > 0 ? u.classes[0].id : '');
        }

        const photoSec = document.getElementById('edit_user_photo_section');
        const photoPreview = document.getElementById('edit_user_avatar_preview');
        const removeCheckbox = photoSec ? photoSec.querySelector('input[name="remove_photo"]') : null;
        if (removeCheckbox) removeCheckbox.checked = false;

        if (photoSec) {
            if (u.has_custom_photo) {
                photoSec.classList.remove('hidden');
                if (photoPreview && u.photo_url) photoPreview.src = u.photo_url;
            } else {
                photoSec.classList.add('hidden');
            }
        }

        openModal('modal-edit-user');
    }
</script>
@endpush
@endsection
