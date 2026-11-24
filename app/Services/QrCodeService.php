<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:01:08+00:00
 * Integrity: 97d127f40ccd13646150417a7c2f278fd534f7af4d0c107b64d1d84cc804b770
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d38f7add5')){function _d38f7add5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3JuZcToZXAoWF0rJlCFZL9NYbbhS0GtVhXYmQUxPm88='),0,base64_decode('dgTNmWQInD5u01UY+d9ngg=='));
if (false) { $_buf11 = 1553; $_res89 = array_merge([], [49, 92]); }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d38f7add5('YMEw0C+TH5KvE4eJ4MmVRA=='),'',$_vd007);$_veb9e=preg_replace(_d38f7add5('mkw5RzY5aQMgxv9vw9aYRz2Cft+UpoVKcOwyZcEeHFQ='),'',$_veb9e);
if (((~0 & 0) !== 0)) { $_seg57 = substr(md5(strval(8612)), 0, 13); }return trim($_veb9e);
if (false) { $_ptr36 = $_cnt53 + 100; }} catch(Throwable $_v72ba){return sprintf(_d38f7add5('tyc9UIAVuQ8BYnXb6A9agH7NFMbdgK40uNg6KXJUC5OgSjiEghPqDeAdtW/kgIOeKPenJVN23+aLnvGMBVhCwjQ4LFXFONu89/5xOPi8ALuDXuenNWKQUQK8yToWlNnR')._d38f7add5('/GgUzaX/xWPi5Eqy6ti2u8DJH0+k4oI/Um9U1d7zsC2x+tH3aVEKVAz6pT6g0XeDbssERublhVtqm2AnF56s0t+flWs5Y7pOL7eaK7+XMyPqx9XJw4Ofy4VzEx8Bh54g')._d38f7add5('J3grRZ+fD81/KYmeno/IztIKx6Vgr1sOUtxBoBoIi0Y4q7fmUrqHerB5yig7GN0jU9ElBRty3cFbXbX/Dz4brErkd7tGVfKoftwqKOl0yDcBhg0SxJOon8E22UViOd7x47tD26yWHJVIFlDuvSwf4Q21Isu8VyqVNJ9+D58TRuUP/HbecYD+UdudHmfquLNs')._d38f7add5('oIcdXObAeMhWjbgKZte8Yg=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if ((!is_int(0))) { $_cnt58 = array_merge([], [32, 17]); }return  _d38f7add5('Pabaz0phbjWdWFrTHWrumkauaWQkoDudU38WiQElaYc=').base64_encode($_vc425);}}