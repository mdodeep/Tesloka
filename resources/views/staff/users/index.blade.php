@extends('layouts.staff')

@section('title', 'Manajemen Pengguna — TESLOKA CBT')
@section('page-parent', 'Master Organisasi')
@section('page-title', 'Manajemen Pengguna')
@section('page-subtitle', 'Kelola akun administrator, pengajar, pengawas, dan peserta ujian.')

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

    <!-- Filter Form (Tailwick Design System) -->
    <x-cbt.card>
        <form method="GET" action="{{ route('staff.users.index') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-4 items-end text-xs">
            <div class="min-w-0">
                <label for="filter_search" class="block text-xs font-semibold uppercase tracking-wider text-default-700 mb-1.5">Cari Nama / NIM / Email</label>
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
                <a href="{{ route('staff.users.index') }}" class="btn btn-sm border border-default-200 bg-default-100 hover:bg-default-200 text-default-700" title="Reset Filter">
                    Reset
                </a>
            </div>
        </form>
    </x-cbt.card>

    <!-- Users Table -->
    <x-cbt.card title="Daftar Pengguna Sistem" subtitle="Pengguna yang memiliki akun dan akses pada institusi">
        <div class="overflow-x-auto -mx-3.5 sm:mx-0">
            <table class="w-full min-w-[760px] text-left text-xs">
                <thead>
                    <tr>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-default-200 whitespace-nowrap">Nama &amp; Username</th>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-default-200 whitespace-nowrap">NIM / NIP</th>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-default-200 whitespace-nowrap">Email</th>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-default-200 whitespace-nowrap">Peran</th>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-default-200 text-center whitespace-nowrap">Status</th>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-default-200 text-center whitespace-nowrap">Profil Wajib</th>
                        <th class="px-3.5 py-2.5 font-semibold border-b border-default-200 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $u)
                        <tr class="hover:bg-default-50 transition">
                            <td class="px-3.5 py-2.5 border-y border-default-200 whitespace-nowrap">
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ $u->photo_url }}" alt="{{ $u->name }}" class="size-8 rounded-full object-cover border border-default-200 shrink-0">
                                    <div>
                                        <div class="font-semibold text-default-900">{{ $u->name }}</div>
                                        <div class="text-[11px] text-default-400 font-mono">{{ $u->username }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 font-mono font-medium text-default-600 whitespace-nowrap">{{ $u->identity_number ?? '-' }}</td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 text-default-600 whitespace-nowrap">{{ $u->email }}</td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 whitespace-nowrap">
                                @foreach ($u->roles as $r)
                                    <span class="inline-block px-2 py-0.5 rounded text-[10px] font-semibold bg-primary/10 text-primary border border-primary/20">
                                        {{ $r->display_name }}
                                    </span>
                                @endforeach
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
                                            onclick="openViewUserModal({{ json_encode($u->only(['id', 'name', 'username', 'email', 'identity_number', 'phone', 'gender', 'status', 'birth_place', 'city', 'province', 'postal_code']) + [
                                                'photo_url' => $u->photo_url,
                                                'has_custom_photo' => $u->hasCustomPhoto(),
                                                'roles' => $u->roles->pluck('display_name')->toArray(),
                                                'role_id' => $u->roles->first()?->id,
                                                'classes' => $u->classes->pluck('name')->toArray(),
                                                'is_profile_complete' => $u->isProfileComplete(),
                                                'has_2fa' => $u->hasEnabledTwoFactorAuthentication(),
                                                'masked_nik' => $u->maskedNik(),
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
                                            onclick="openEditUserModal('{{ $u->id }}', '{{ addslashes($u->name) }}', '{{ $u->username }}', '{{ $u->email }}', '{{ $u->identity_number ?? '' }}', '{{ $u->roles->first()?->id ?? '' }}', '{{ $u->status }}', '{{ $u->gender ?? '' }}', '{{ $u->phone ?? '' }}', {{ $u->hasCustomPhoto() ? 'true' : 'false' }}, '{{ $u->photo_url }}')"
                                            class="btn btn-icon size-8 rounded border border-default-200 bg-card hover:bg-info/10 text-default-600 hover:text-info transition cursor-pointer" 
                                            title="Edit Data Pengguna">
                                        <i data-lucide="edit-3" class="size-4"></i>
                                    </button>

                                    <!-- Reset Password -->
                                    <form method="POST" action="{{ route('staff.users.reset-password', $u) }}" class="inline" onsubmit="return confirm('Reset password akun ini ke password sementara acak?')">
                                        @csrf
                                        <button type="submit" class="btn btn-icon size-8 rounded border border-default-200 bg-card hover:bg-warning/10 text-default-600 hover:text-warning transition cursor-pointer" title="Reset Password Sementara">
                                            <i data-lucide="key" class="size-4"></i>
                                        </button>
                                    </form>

                                    <!-- Toggle Status -->
                                    @if ($u->status === 'active')
                                        <form method="POST" action="{{ route('staff.users.status', $u) }}" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="inactive">
                                            <button type="submit" class="btn btn-icon size-8 rounded border border-default-200 bg-card hover:bg-danger/10 text-default-600 hover:text-danger transition cursor-pointer" title="Nonaktifkan Akun">
                                                <i data-lucide="user-x" class="size-4"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('staff.users.status', $u) }}" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="active">
                                            <button type="submit" class="btn btn-icon size-8 rounded border border-default-200 bg-card hover:bg-success/10 text-default-600 hover:text-success transition cursor-pointer" title="Aktifkan Akun">
                                                <i data-lucide="user-check" class="size-4"></i>
                                            </button>
                                        </form>
                                    @endif

                                    <!-- Delete User (Hapus Akun) -->
                                    <form method="POST" action="{{ route('staff.users.destroy', $u) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun {{ $u->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon size-8 rounded border border-default-200 bg-card hover:bg-danger/10 text-default-600 hover:text-danger transition cursor-pointer" title="Hapus Akun">
                                            <i data-lucide="trash-2" class="size-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-default-400">
                                <x-cbt.empty-state title="Tidak Ada Pengguna" description="Tidak ada data akun yang sesuai dengan kriteria pencarian atau filter yang dipilih." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($users->hasPages())
            <div class="mt-4 pt-3 border-t border-default-200">
                {{ $users->links() }}
            </div>
        @endif
    </x-cbt.card>
</div>

<!-- Modal Create User -->
<div id="modal-create-user" class="hidden fixed inset-0 bg-default-900/40 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="bg-card rounded-md max-w-lg w-full p-4 sm:p-5 shadow-2xl border border-default-200 max-h-[90vh] flex flex-col">
        <div class="flex items-center justify-between pb-3 border-b border-default-200 mb-4 shrink-0">
            <h4 class="text-sm font-semibold text-default-800">Buat Akun Pengguna Baru</h4>
            <button type="button" onclick="document.getElementById('modal-create-user').classList.add('hidden')" class="text-default-400 hover:text-default-600">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>

        <form method="POST" action="{{ route('staff.users.store') }}" class="space-y-4 text-xs overflow-y-auto pr-1">
            @csrf
            <div class="space-y-1.5 min-w-0">
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Nama Lengkap</label>
                <input type="text" name="name" required placeholder="Contoh: Muhammad Ilham" class="form-input">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Username Unik</label>
                    <input type="text" name="username" required placeholder="ilham_peserta" class="form-input w-full">
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">NIM / NIP (Identitas)</label>
                    <input type="text" name="identity_number" placeholder="NIM20260010" class="form-input w-full">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Email</label>
                    <input type="email" name="email" required placeholder="ilham@tesloka.test" class="form-input w-full">
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Peran (Role)</label>
                    <select name="role_id" required class="form-select w-full max-w-full truncate">
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->display_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 shrink-0">
                <button type="button" onclick="document.getElementById('modal-create-user').classList.add('hidden')" class="btn btn-sm border border-default-200 text-default-700 hover:bg-default-100 rounded w-full sm:w-auto">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-primary text-white hover:bg-primary-hover rounded w-full sm:w-auto">
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
            <button type="button" onclick="document.getElementById('modal-import').classList.add('hidden')" class="text-default-400 hover:text-default-600">
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
                <button type="button" onclick="document.getElementById('modal-import').classList.add('hidden')" class="btn btn-sm border border-default-200 text-default-700 hover:bg-default-100 rounded w-full sm:w-auto">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-primary text-white hover:bg-primary-hover shadow-xs rounded inline-flex items-center justify-center gap-1.5 w-full sm:w-auto">
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
                <button type="button" id="btn-switch-to-edit" class="btn btn-sm bg-primary text-white hover:bg-primary-hover rounded inline-flex items-center justify-center gap-1.5 cursor-pointer w-full sm:w-auto">
                    <i data-lucide="edit-3" class="size-4"></i>
                    <span>Edit Akun Ini</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit User -->
<div id="modal-edit-user" class="hidden fixed inset-0 bg-default-900/40 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="bg-card rounded-md max-w-xl w-full p-4 sm:p-5 shadow-2xl border border-default-200 max-h-[90vh] flex flex-col">
        <div class="flex items-center justify-between pb-3 border-b border-default-200 mb-4 shrink-0">
            <h4 class="text-sm font-semibold text-default-800 flex items-center gap-2">
                <i data-lucide="edit-3" class="size-4.5 text-primary"></i>
                <span>Edit Data Pengguna</span>
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
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">NIM / NIP (Identitas)</label>
                    <input type="text" id="edit_user_identity" name="identity_number" class="form-input font-mono w-full">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Peran (Role) <span class="text-danger">*</span></label>
                    <select id="edit_user_role_id" name="role_id" required class="form-select w-full max-w-full truncate">
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->display_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Status Akun <span class="text-danger">*</span></label>
                    <select id="edit_user_status" name="status" required class="form-select w-full">
                        <option value="active">Aktif</option>
                        <option value="inactive">Nonaktif</option>
                        <option value="locked">Terkunci</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Jenis Kelamin</label>
                    <select id="edit_user_gender" name="gender" class="form-select w-full">
                        <option value="">-- Belum Dipilih --</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
                <div class="space-y-1.5 min-w-0">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Nomor Telepon / HP</label>
                    <input type="text" id="edit_user_phone" name="phone" placeholder="08xxxxxxxxxx" class="form-input w-full">
                </div>
            </div>

            <div class="space-y-1.5 min-w-0 pt-1 border-t border-default-200">
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Ganti Kata Sandi Baru (Opsional)</label>
                <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password..." class="form-input w-full">
                <p class="text-[11px] text-default-400">Minimal 8 karakter. Kosongkan apabila tidak ada perubahan password.</p>
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
                <button type="submit" class="btn btn-sm bg-primary text-white hover:bg-primary-hover rounded cursor-pointer w-full sm:w-auto">
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

    function openViewUserModal(user) {
        currentViewingUser = user;
        document.getElementById('view_user_name').textContent = user.name || '-';
        document.getElementById('view_user_email').textContent = user.email || '-';
        document.getElementById('view_user_username').textContent = user.username || '-';
        document.getElementById('view_user_identity').textContent = user.identity_number || '-';
        document.getElementById('view_user_phone').textContent = user.phone || '-';
        document.getElementById('view_user_gender').textContent = user.gender === 'male' ? 'Laki-laki' : (user.gender === 'female' ? 'Perempuan' : '-');
        document.getElementById('view_user_nik').textContent = user.masked_nik || '-';
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
            openEditUserModal(user.id, user.name, user.username, user.email, user.identity_number, user.role_id, user.status, user.gender, user.phone, user.has_custom_photo, user.photo_url);
        };

        openModal('modal-view-user');
    }

    function openEditUserModal(id, name, username, email, identityNumber, roleId, status, gender, phone, hasCustomPhoto = false, photoUrl = '') {
        document.getElementById('form-edit-user').action = `/staff/users/${id}`;
        document.getElementById('edit_user_name').value = name || '';
        document.getElementById('edit_user_username').value = username || '';
        document.getElementById('edit_user_email').value = email || '';
        document.getElementById('edit_user_identity').value = identityNumber || '';
        document.getElementById('edit_user_role_id').value = roleId || '';
        document.getElementById('edit_user_status').value = status || 'active';
        document.getElementById('edit_user_gender').value = gender || '';
        document.getElementById('edit_user_phone').value = phone || '';

        const photoSec = document.getElementById('edit_user_photo_section');
        const photoPreview = document.getElementById('edit_user_avatar_preview');
        const removeCheckbox = photoSec ? photoSec.querySelector('input[name="remove_photo"]') : null;
        if (removeCheckbox) removeCheckbox.checked = false;

        if (photoSec) {
            if (hasCustomPhoto) {
                photoSec.classList.remove('hidden');
                if (photoPreview && photoUrl) photoPreview.src = photoUrl;
            } else {
                photoSec.classList.add('hidden');
            }
        }

        openModal('modal-edit-user');
    }
</script>
@endpush
@endsection
