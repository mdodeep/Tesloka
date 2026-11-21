<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Server Donasi & Otoritas Lisensi Resmi TESLOKA
    |--------------------------------------------------------------------------
    |
    | URL endpoint server donasi dan pembaruan resmi TESLOKA CBT.
    |
    */
    'server_url' => env('TESLOKA_DONATE_SERVER_URL', 'http://tesloka-donate.test'),

    /*
    |--------------------------------------------------------------------------
    | Versi Aplikasi TESLOKA CBT Saat Ini
    |--------------------------------------------------------------------------
    */
    'current_version' => env('TESLOKA_VERSION', '1.0.0'),

    /*
    |--------------------------------------------------------------------------
    | Kunci Publik Kriptografis Resmi (RSA-2048)
    |--------------------------------------------------------------------------
    |
    | Kunci ini digunakan untuk verifikasi integritas token lisensi secara
    | 100% offline tanpa mewajibkan koneksi internet ke server donasi.
    |
    */
    'public_key' => env('TESLOKA_LICENSE_PUBLIC_KEY', <<<'PEM'
-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAouof+akkj4kmKAC92Fn8
K5YGhybIMTH9iSgIt/3x0ilPP1OdIV0MUnad7eq1+IX64ESQ2r9yH8GHgDbI7url
dxf0PpH39ecdBuHwSP32JazoXuQ8fVKYX7A2/2HPmhBnvWDyZZp+sdKUT6ZK22FW
nyu4hFZuwh710VPyzCfxC31iYByl+OcmhAL3gw3AOL7repQJ+sQhxWDyH2i0KtMS
1sp+ucIor37mSbM/ocM/MPT9hKzRRLqKgLSc4sFDiU/A6MZAYCu3Mv6BEqGE3iGT
ObTu/5d0gQrcI7xKhSbEdvCiIk+tDo6eywmSdEQcvUvu8xG/9jkBc0A3r7/ys8SX
jwIDAQAB
-----END PUBLIC KEY-----
PEM
    ),
];
