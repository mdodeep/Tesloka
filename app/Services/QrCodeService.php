<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:12:48+00:00
 * Integrity: 0a23bac24655622a1df5c5cfc1c6d9adf92e27730dd547da8bb39cdb9e5c2acf
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d289439c6')){function _d289439c6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qmOXd3QMYaUE0YtKERErd7O2+cNO0pxcvfFfQ0Vhn8E='),0,base64_decode('XFnMOKNc9d/Ez2V6bt6rjQ=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (false) { $_cnt52 = substr(md5(strval(1911)), 0, 8); $_acc15 = 6632; }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp12 = 8835; }$_veb9e=preg_replace(_d289439c6('qOz3WiNAN/xzH2G+/Hd2BA=='),'',$_vd007);$_veb9e=preg_replace(_d289439c6('uFRhy0QgwGoqWNMdAAPGWGfuy4H1HNFofqScv2Tb4ec='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d289439c6('JlypnUpxFvT/1tF/ONPwSsmzZRvptXkV1603Fd3b4DtnaSKhv4s8+L8Y1QcP+nIE297uh8qdLC2wLygFg/lEyftVHwoll9GUQCPFyeV8sleueb4J675R2rZCUVkC5sDq')._d289439c6('JHztuFl8F1/KJObmXyHi+c/3/DSUNThiaX+on2tMkKgJeHt1oKLRkj9cuCXwEn+I0m6jRCuDmWZDEscDgFBVUKB8nxLVhIW1yyHfJmluy0DT9c3KdNqIxxLGZyYtDHTW')._d289439c6('AeuxXdYRD5RIOQjaOJeyNsmLVLey2fxbMd3vEwTKC5ZW1+KLoyOHaHn7/+FGlTc60WV9laL96ny3P03UEVS/2Pan7QR8+Dhrw4Ksz8EvoC/s9+hXx+9Dd16m8vtGjLyZEwx1ja3FbxsaNiJhp+km6ra9gEmf+L6KJkOpE+bVjOI4Kpm/1seihypbvEk1hyZQ')._d289439c6('8C8glzBFS9nrmkGryWKg2w=='),$size,$size,$size,$size);
if (((0 ^ 0) !== 0)) { $_idx65 = strlen('check17') > 0 ? 'val56' : ''; $_acc19 = 6975; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if ((!is_int(0))) { $_res89 = $_chk64 + 54; $_res84 = strlen('check71') > 0 ? 'val66' : ''; $_res81 = $_res24 + 42; }return  _d289439c6('lqJY8eI9v1RtJ470l5vDmFJZsYNWTCoH5bUgHA6VsT0=').base64_encode($_vc425);
if ((!is_int(0))) { $_chk81 = substr(md5(strval(6257)), 0, 9); $_acc10 = intval('190'); }}}