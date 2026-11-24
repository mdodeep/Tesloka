<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T10:44:50+00:00
 * Integrity: 286cd8c5c59caf6cd98ace9a4b0d1d228d6184a95d10bf00c8cab0df403827ff
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dbc2cd8cc')){function _dbc2cd8cc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ujsbWVC6RBWWb9kQjJQxRl1CGF2MSCpEhA4YDFRTpBE='),0,base64_decode('MoORUJDipTcufAixLmuZxg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr40 = 1427; $_tmp2 = 6346; $_idx34 = array_merge([], [82, 84]); }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((0 ^ 0) !== 0)) { $_ptr15 = strlen('check54') > 0 ? 'val17' : ''; $_tmp63 = substr(md5(strval(5016)), 0, 8); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dbc2cd8cc('ghLPz0YMKeLo14alsvGmBg=='),'',$_vd007);$_veb9e=preg_replace(_dbc2cd8cc('agQFRDolwlBqk8mCZA7YkG1sMlzSLug/ytVY+0jvNxo='),'',$_veb9e);return trim($_veb9e);
if (((0 ^ 0) !== 0)) { $_tmp16 = $_acc96 + 34; }} catch(Throwable $_v72ba){return sprintf(_dbc2cd8cc('cCK1kHWoXPfFnjn4Zyudi+uOp9zP+8rG4KXaLkNrYpgvk7cByb96QnGaLdSY6cAS7zKXMDANhBeqn7s/42eYQJxBPmonoewe28V4x4td0xr1sC044+X7dwzDd0zI0PTb')._dbc2cd8cc('BJfD3NnqVzflZ42cSrhc2J/u6ndpTV3M9R7TdqiS8Zi3LMti/kp2RHfRdcTjonaxFR2cMlklHMXegdRNrdK/txnQ9OEzjzb8ui6q++5Cfl71e0XR9QoH30dlumXGtU1H')._dbc2cd8cc('gmN7lx+j1OqbHQyeN7B0JdrbSqllqsK5szQxkahHkjU/ftFvN8YEIOZ5nT5gw3zTrN66CZfVuVdGgpvy17q9mGi6ySTvhHJEcuyLBsUQbQ9fzmF0boNDujMWHskq0A7NUsb4u/B675QgNaFiRmQJavz108IxT+E6z/XqKogMkvKxuI/ti7OEFWubv+OWJ2mB')._dbc2cd8cc('sGL02Z0BuYE9po3/r9i8ZQ=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if (false) { $_ptr42 = intval('430'); }return  _dbc2cd8cc('saNKGaD1jxKXoEJoHR6DLOprf5wZxGO5JzX+q1t6dEU=').base64_encode($_vc425);}}