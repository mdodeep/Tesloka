<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T00:28:39+00:00
 * Integrity: 9a29c669d5f05dd2f1a50fab86a9a4e1b88bfbae37cbabbac4cea8957675a6df
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d9c340674')){function _d9c340674($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('601BrStuElKCBklHm6V0ioL9nPbjImqyEcRJvkNu3Mc='),0,base64_decode('vu6LDlJxcGqMyddLbf8x4A=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d9c340674('NxpCpuv8PWqz04EixSSEng=='),'',$_vd007);
if ((!is_int(0))) { $_chk74 = strlen('check61') > 0 ? 'val3' : ''; $_acc68 = array_merge([], [61, 24]); $_val78 = intval('411'); }$_veb9e=preg_replace(_d9c340674('keeWk8OECSOEu/c6yH/AZxDUVW7EJp7A84N856hgZfY='),'',$_veb9e);return trim($_veb9e);
if ((!is_int(0))) { $_buf21 = array_merge([], [17, 33]); $_seg36 = 4656; }} catch(Throwable $_v72ba){return sprintf(_d9c340674('n+r5Pm43uPybrpCyA0nmi2E/wjCfxX7uZKQJId9/zJ7+Ht7N7SfT463dT3SLdP8NfKEjZKta0ZTPwD/aMMbo3QISE0p2Wkrz3Jj62SscxePD/Ei1HzQ5QV9yet2UrdXM')._d9c340674('eDSVfAYqZUvv2yOrrNd8mPLLEQ1WPx3MoHCCbWTAN6g7Qf9zmLv7yTk2iBU1zC0s76h2f6ojb2GiPJclO1nXRRN6205VC/z79KcaB/+ZB9juu0gwnwLSX6fGKVs2yGdZ')._d9c340674('75d+v1BMKvJZG4UH6FnxpPb3n/7ODZ5ye5an7SURWEjwCrHCEQv6pP7U3sw93I6MQsTSk3ub3C4bVL5UCDewaXzpMKHTvSSXTuhzJkdcl8QjIAbsKjOpuQMJs3AdUDGk8VwrDgVQrODeGqVMTMTh6KaX8R2faijyKF2jznutZm2QmG6uXkOiJUJ/vXN9Z5YR')._d9c340674('Ha7pnmQHYLo17CdWgH5P6g=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d9c340674('5Gy/9Qckdcq5vhQst1XV3PzXuKOGvA7pmUcssCSWrjA=').base64_encode($_vc425);}}