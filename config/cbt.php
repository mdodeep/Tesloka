<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Mode Portal CBT (Domain vs Path)
    |--------------------------------------------------------------------------
    | 'path'      : Portal staf di /staff, portal siswa di /ujian
    | 'subdomain' : Portal staf di staff.domain, portal siswa di ujian.domain
    */
    'portal_mode' => env('CBT_PORTAL_MODE', 'path'),

    'staff_domain' => env('CBT_STAFF_DOMAIN', 'staff.tesloka.test'),
    'student_domain' => env('CBT_STUDENT_DOMAIN', 'ujian.tesloka.test'),

    /*
    |--------------------------------------------------------------------------
    | Keamanan Autentikasi & Brute-Force Rate Limiting
    |--------------------------------------------------------------------------
    */
    'max_login_attempts' => env('CBT_MAX_LOGIN_ATTEMPTS', 5),
    'lockout_minutes' => env('CBT_LOCKOUT_MINUTES', 1),
    'temporary_password_expiry_days' => env('CBT_TEMP_PASSWORD_DAYS', 7),

    /*
    |--------------------------------------------------------------------------
    | Ketentuan Foto Profil & Dokumen
    |--------------------------------------------------------------------------
    */
    'max_photo_size_kb' => 1024,
    'allowed_photo_mimes' => ['image/jpeg', 'image/png', 'image/webp'],

    /*
    |--------------------------------------------------------------------------
    | Field Profil Wajib bagi Peserta Ujian
    |--------------------------------------------------------------------------
    */
    'required_student_profile_fields' => [
        'identity_number' => 'NIM / Nomor Peserta',
        'phone' => 'Nomor WhatsApp / HP',
        'gender' => 'Jenis Kelamin',
        'birth_place' => 'Tempat Lahir',
        'birth_date' => 'Tanggal Lahir',
        'address' => 'Alamat Lengkap',
        'city' => 'Kabupaten / Kota',
        'province' => 'Provinsi',
    ],

    /*
    |--------------------------------------------------------------------------
    | Tindakan yang Memerlukan Four-Eyes Approval
    |--------------------------------------------------------------------------
    */
    'four_eyes_approval_actions' => [
        'exam.publish_high_stake',
        'exam.modify_key_in_progress',
        'exam.finalize_score_override',
        'exam.mass_regrade',
        'exam.reopen_closed_attempt',
        'data.critical_delete',
    ],
];
