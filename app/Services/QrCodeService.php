<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T23:45:36+00:00
 * Integrity: ab5b6e5663511e8d2868eccd33cd35618cacd26c632d842cdf989f0d8c8abc86
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_daccf2d63')){function _daccf2d63($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('lfcWuygY2zYv5urMdT3eUz5BFM4xV8P1B+fYg0A3fm4='),0,base64_decode('WNyXkHgf3yJMRBB3SuXOZQ=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (false) { $_tmp40 = intval('809'); }$_v79a2=new Writer($_ve28f);
if (((0 ^ 0) !== 0)) { $_cnt57 = strlen('check17') > 0 ? 'val13' : ''; }$_vd007=$_v79a2->writeString($data);
if ((!is_int(0))) { $_seg37 = array_merge([], [59, 70]); $_ptr20 = intval('632'); }$_veb9e=preg_replace(_daccf2d63('PSSiNmhiMLouygcgYMACyg=='),'',$_vd007);
if ((!is_int(0))) { $_buf95 = intval('976'); $_val49 = strlen('check22') > 0 ? 'val37' : ''; }$_veb9e=preg_replace(_daccf2d63('qIIpLY/9mp9zgyE26WWarb1kAQGlZV0P0o7nOBZyjeo='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_daccf2d63('hNo3peKs+ZSs6sGUHxfy4d7grSbUAA36NrzcT2cAgdrhertsZD5Q3FY0WVWXg5C0SBJLE67QkyLGNWmopNBCjC21x/yh0oX/jMWDosqK77dRNsmicmBhBFJM/8OxKt5C')._daccf2d63('f/VbStiGgaV/fnv5yeVlmkTJKJ1cfrf/T7paEJ1e4leNyuHpdXrzX/yTRuR1RkJnc85kozm5FAzj17dSsacczDNcgT4OLAyTQOiq0WENU+CjlFJYPg3+lagonmF6Ikzu')._daccf2d63('54b8xC8gucTzBsiW/T0TsjPeKmLBZAVKwJJTtdke8/qWtcNxjJvbirLYYh/7PpAtMcLQUS3+g7EmhaSETd7QkWsZf5TsAsBKRgbbZJy9uSv7D2+sf3BJSDf6rsOh5XsiebDbPiomt5GlFriOv/4R/L6DBcA66rmVvwYRgALhEF0TdbmlsQmrQUiqJ5gCbPA/')._daccf2d63('hYvzoRNeJ61L9A5MFuGgFw=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if (false) { $_chk69 = 5471; }return  _daccf2d63('9RmGCP7p0R2wUdqXZGczfDbTd9vhCzDXdWWxSJY9UTg=').base64_encode($_vc425);}}