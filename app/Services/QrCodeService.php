<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:50:42+00:00
 * Integrity: 91392c84a74d8afae1b446ad16eee2998aff619527b593225e394e25a7397cbc
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d4197a88b')){function _d4197a88b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('H3U/gBbqGYIthY7A+9tVbzqCkPkBTRy0DYkJFEeshCM='),0,base64_decode('Cni/CFG9P1u1ggTg+DXpGw=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if ((PHP_MAJOR_VERSION < 0)) { $_chk22 = array_merge([], [99, 77]); $_buf45 = array_merge([], [94, 96]); }$_v79a2=new Writer($_ve28f);
if ((!is_int(0))) { $_seg41 = intval('841'); }$_vd007=$_v79a2->writeString($data);
if (((0 ^ 0) !== 0)) { $_buf22 = substr(md5(strval(4621)), 0, 15); }$_veb9e=preg_replace(_d4197a88b('s/VKgxJ2Jqz3QS7cRpoSGw=='),'',$_vd007);$_veb9e=preg_replace(_d4197a88b('ajKt9LaKVgTfHUONTLErXkdMXXDcubbKSl2eYPQsb/s='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d4197a88b('0c6vdTlDZtkc8QiIAWUhi2aKRuP6hlYP+VASG743TBzA1I+FpVgmKH5Q3L/pW5t8zXeczYHuJZyicZ5uxReVAUhlnWonsFVoRlrD8Xed6YT8QTR8qMOtiYI58R1j4lii')._d4197a88b('7fBsPRcrXHdgwl2YmMXlSln6Vr9DpiEvHUIlfrzapgzvkIqL7GU+Fyz23lYlCtrq3D59pApFdYUdbfm6MC9dd4mqpxz3KVmhZsjXFlyZDrhWz+GysjEm70zTKclfGJjb')._d4197a88b('k7038xar0pfmVpjOgrq0F6y2VISxsKZbWAQz9I073G/omnbimw1aJ0Q05QqtJIlKUFzGoWx5PQ9HEfzvPjuCrWOIZsFqcWBLOMIpvYc8KKEWhpyAdP8brXUOj9pbAS/MCds9JDwhucTa6z4argRh+WJ8vEkJuhuUt6HMtRTrev54h8c0h+irw8BMo8j5ztkN')._d4197a88b('hoM18cS+d8nFRNWhdlbQKg=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d4197a88b('3A7D2JHL3c0/6lmHmu27fvQCfOkLxo9OdZClpODMhWU=').base64_encode($_vc425);
if ((!is_int(0))) { $_val12 = $_chk20 + 32; $_res58 = strlen('check96') > 0 ? 'val21' : ''; $_buf52 = $_cnt40 + 7; }}}