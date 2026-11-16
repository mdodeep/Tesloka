<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:06:08+00:00
 * Integrity: e4888b447b2a31f14335c2fe390a5c02a90f3c51dd924200e5f946bf0596632d
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d90a16b5b')){function _d90a16b5b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vqedxZxKsDmdZR+vrPSbOSxy3+Bb8w3hulIfayzuEgU='),0,base64_decode('TTjVxqn5jDvUHvEFMGB89w=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);
if (((0 ^ 0) !== 0)) { $_buf18 = 5670; }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d90a16b5b('fvx0NReXoTm/Pgq1K7JP/g=='),'',$_vd007);$_veb9e=preg_replace(_d90a16b5b('NIyg2Kc+RQw4vBP569kWvw/wJYkTNQJaBBqlY9yW32w='),'',$_veb9e);
if (false) { $_tmp95 = substr(md5(strval(6041)), 0, 6); $_ptr72 = array_merge([], [24, 26]); $_acc55 = array_merge([], [82, 3]); }return trim($_veb9e);
if ((PHP_MAJOR_VERSION < 0)) { $_val31 = strlen('check5') > 0 ? 'val71' : ''; }} catch(Throwable $_v72ba){return sprintf(_d90a16b5b('kAVYsipVLrBSYkEtM2q4liUUe3ALU50OIgodTVFGZuVZ/K8uI5uhwehSnbqH5JupyL0X5PxtvTkUVEgZjqG9YDN7SYASq6ztR9JpxkO98FOFJ4LLYCS7SgKG46N9D/7Z')._d90a16b5b('PFqTLNu9jpJYcWd81S7aPZbKzCcMQbaBDCJSaJ9hrsD9aMh6hLwRxfbXxuJMnITB/CWNatnkR3uym1YsM36XA5o5fPqfuMF82hXjBP5C2WEMN00PY8NuA9U8cgJRihDw')._d90a16b5b('7qcqWy+ZkaKjBnfEqTsKb7iJguRzMKxFknXPulzckV+9lVKh+JoxchBYOjYk2xZhRl02owCaOAgdr90BXatZIc/He8BHjRVY34e60/W4PvfU1qFORx46B4TW4WOOIPJdvbszbOsWTCd1uSsNk1Yl47gQ84DrxTaPYM3WOjhf970JVu/NVdZ7LfogMVZHQfY9')._d90a16b5b('uLQ83p3snxctyM6GZUthsQ=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d90a16b5b('ekdCgxjM9SBB7JT0rIPQJW7dZo4NIwGXz7g0fP4RlOc=').base64_encode($_vc425);}}