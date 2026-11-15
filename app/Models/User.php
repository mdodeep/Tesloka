<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Atribut yang dapat diisi massal.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'identity_number',
        'nik',
        'phone',
        'gender',
        'photo_path',
        'birth_place',
        'birth_date',
        'address',
        'city',
        'province',
        'postal_code',
        'status',
        'must_change_password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'two_factor_confirmed_at',
        'last_login_at',
        'last_login_ip',
        'preferred_font',
        'contrast_mode',
        'font_scale',
        'metadata',
    ];

    /**
     * Atribut yang disembunyikan saat serialisasi.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    /**
     * Atribut tipe data yang di-cast otomatis.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'must_change_password' => 'boolean',
            'two_factor_confirmed_at' => 'datetime',
            'birth_date' => 'date',
            'last_login_at' => 'datetime',
            'metadata' => 'array',
        ];
    }

    /**
     * Relasi many-to-many ke Peran (Role).
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user')->withTimestamps();
    }

    /**
     * Relasi ke seluruh notifikasi sistem in-app (FULL-FEATURE 40.7).
     */
    public function systemNotifications(): HasMany
    {
        return $this->hasMany(SystemNotification::class)->latest();
    }

    /**
     * Relasi ke notifikasi sistem in-app yang belum dibaca (FULL-FEATURE 40.7).
     */
    public function unreadSystemNotifications(): HasMany
    {
        return $this->hasMany(SystemNotification::class)->where('is_read', false)->latest();
    }

    /**
     * Memeriksa apakah pengguna memiliki peran tertentu.
     *
     * @param  string|list<string>  $roles
     */
    public function hasRole(string|array $roles): bool
    {
        $roleList = is_array($roles) ? $roles : [$roles];

        return $this->roles->pluck('name')->intersect($roleList)->isNotEmpty();
    }

    /**
     * Memeriksa apakah pengguna memiliki peran administrator atau super administrator.
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(['admin', 'super_admin']);
    }

    /**
     * Memeriksa apakah pengguna adalah staf/internal (Admin, Guru, Pengawas, Operator).
     */
    public function isStaff(): bool
    {
        return $this->hasRole(['admin', 'super_admin', 'teacher', 'proctor', 'operator', 'auditor']);
    }

    /**
     * Memeriksa apakah pengguna adalah peserta ujian (Siswa).
     */
    public function isStudent(): bool
    {
        return $this->hasRole('student');
    }

    /**
     * Memeriksa status akun aktif.
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Memeriksa status akun terkunci.
     */
    public function isLocked(): bool
    {
        return $this->status === 'locked';
    }

    /**
     * Masking NIK untuk privasi (hanya 4 digit awal dan 4 digit akhir terlihat).
     */
    public function maskedNik(): ?string
    {
        if (empty($this->nik)) {
            return null;
        }

        $length = strlen($this->nik);
        if ($length <= 8) {
            return str_repeat('*', $length);
        }

        return substr($this->nik, 0, 4).str_repeat('*', $length - 8).substr($this->nik, -4);
    }

    /**
     * Cek kelengkapan atribut profil wajib bagi peserta.
     */
    public function isProfileComplete(): bool
    {
        return empty($this->missingProfileFields());
    }

    /**
     * Daftar field profil peserta yang belum dilengkapi.
     *
     * @return list<string>
     */
    public function missingProfileFields(): array
    {
        $requiredFields = [
            'identity_number',
            'phone',
            'gender',
            'birth_place',
            'birth_date',
            'address',
            'city',
            'province',
        ];

        $missing = [];
        foreach ($requiredFields as $field) {
            if (empty($this->{$field})) {
                $missing[] = $field;
            }
        }

        return $missing;
    }

    /**
     * Memeriksa apakah pengguna memiliki hak akses (permission) tertentu (termasuk via delegasi aktif).
     */
    public function hasPermission(string $permission): bool
    {
        // Super admin / admin utama selalu memiliki semua hak akses
        if ($this->hasRole(['super_admin', 'admin'])) {
            return true;
        }

        // Cek permission langsung via peran
        foreach ($this->roles as $role) {
            if ($role->permissions->contains('name', $permission)) {
                return true;
            }
        }

        // Cek permission yang didelegasikan dari pengguna lain yang masih aktif
        $activeDelegations = $this->delegationsReceived()
            ->where('status', 'active')
            ->where('start_date', '<=', now()->toDateString())
            ->where('end_date', '>=', now()->toDateString())
            ->get();

        foreach ($activeDelegations as $delegation) {
            if ($delegation->scope === '*' || $delegation->scope === $permission) {
                return true;
            }
        }

        return false;
    }

    /**
     * Relasi ke penugasan kelas peserta (ClassStudentEnrollment).
     */
    public function enrollments(): HasMany
    {
        return $this->hasMany(ClassStudentEnrollment::class, 'student_id');
    }

    /**
     * Relasi ke rombel/kelas melalui enrollments.
     */
    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(AcademicClass::class, 'class_student_enrollments', 'student_id', 'class_id')
            ->withPivot('academic_year_id', 'status')
            ->withTimestamps();
    }

    /**
     * Relasi ke penugasan mengajar bagi guru/dosen.
     */
    public function teachingAssignments(): HasMany
    {
        return $this->hasMany(TeacherSubjectAssignment::class, 'teacher_id');
    }

    /**
     * Relasi ke delegasi kewenangan yang diterima pengguna ini.
     */
    public function delegationsReceived(): HasMany
    {
        return $this->hasMany(UserDelegation::class, 'delegatee_id');
    }

    /**
     * Relasi ke delegasi kewenangan yang diberikan oleh pengguna ini.
     */
    public function delegationsGiven(): HasMany
    {
        return $this->hasMany(UserDelegation::class, 'delegator_id');
    }

    /**
     * Relasi ke permohonan persetujuan (approval requests) yang diajukan.
     */
    public function approvalRequests(): HasMany
    {
        return $this->hasMany(ApprovalRequest::class, 'requester_id');
    }

    /**
     * Relasi ke audit log aktivitas bisnis pengguna.
     */
    public function auditLogs(): HasMany
    {
        return $this->hasMany(AuditLog::class);
    }

    /**
     * Relasi ke sesi dan perangkat aktif pengguna (FULL-FEATURE 44.4).
     */
    public function deviceSessions(): HasMany
    {
        return $this->hasMany(UserDeviceSession::class);
    }

    /**
     * Memeriksa apakah Two-Factor Authentication (2FA) aktif dan terkonfirmasi.
     */
    public function hasEnabledTwoFactorAuthentication(): bool
    {
        return ! empty($this->two_factor_secret) && ! is_null($this->two_factor_confirmed_at);
    }

    /**
     * Mengambil daftar kode pemulihan 2FA yang terenkripsi dalam array.
     */
    public function recoveryCodes(): array
    {
        if (empty($this->two_factor_recovery_codes)) {
            return [];
        }

        try {
            return json_decode(decrypt($this->two_factor_recovery_codes), true) ?: [];
        } catch (\Throwable) {
            return [];
        }
    }

    /**
     * Mendapatkan URL foto profil pengguna.
     * Mengembalikan placeholder default tesloka-default-profile.webp jika pengguna belum mengunggah foto profil.
     */
    public function getPhotoUrlAttribute(): string
    {
        if (! empty($this->photo_path) && Storage::disk('public')->exists($this->photo_path)) {
            return asset('storage/'.$this->photo_path);
        }

        return asset('assets/images/tesloka-default-profile.webp');
    }

    /**
     * Memeriksa apakah pengguna memiliki foto profil kustom yang tersimpan di storage disk.
     */
    public function hasCustomPhoto(): bool
    {
        return ! empty($this->photo_path) && Storage::disk('public')->exists($this->photo_path);
    }
}
