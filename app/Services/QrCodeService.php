<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:45:02+00:00
 * Integrity: 212198481752cd1aadc34123e0123df466bc30ed0e7cb903b23439cb9ba23249
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dfb98ec5a')){function _dfb98ec5a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qW1y3dMRMUHqWqnrJweCCFtIaqPCdxx/UZ3109XhI6Y='),0,base64_decode('tnV0I7SysuCK8XcnJZc38w=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp11 = strlen('check20') > 0 ? 'val81' : ''; $_ptr88 = 9245; }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dfb98ec5a('dv9eaegDMnVJhVFfOmiMyQ=='),'',$_vd007);$_veb9e=preg_replace(_dfb98ec5a('fucRT7HIvxrqzEi84IAR1O/JTFYUYhfZ0Om5C4rYdQs='),'',$_veb9e);return trim($_veb9e);
if (false) { $_idx37 = $_seg20 + 67; }} catch(Throwable $_v72ba){return sprintf(_dfb98ec5a('9j8wn3hJHPDp3ELtZdphnSvkANVC7DgimsJONvCLD7l4h2OhxIUev3dutF4NtlYQsHZTwLnuGMAJE1ZXRa+CJFeQFiWTY9ACRKLcNzxXUtj920kMc/dQC9G2lIaqdzOy')._dfb98ec5a('oN6ht+MU7OdRhEHbnF8DSozRtYJktLN2aLBHbgUEiLaPHnDhVk5hBxCI5wCkc33Y36LZ999g5h6WYMNaA26U+A0lkZbzK5VYMIbvROYC1TgyA8kyuaJgHcbHCnh86Uc7')._dfb98ec5a('TEEKZAA3d0KmsqpuISK5WDvTVgIf+NPTkP5iLaVtnH9ZxElVAPGrF5syKMYdC4wa8wxskUOojguUpGPk9my93z5tZdggJo1wVJbDVH5DCUBcP40tnh1+ukUA7wOFf1dEUfPnzmWHTii1WejDqwcMaVNFONbjeuqYJuFqUvvKwMDWva8TyDYYhGeurKM3xp4a')._dfb98ec5a('OGF+T5kvd/AHKrChyIipig=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _dfb98ec5a('BS/TAKMitWy5DpltMP5ipbuj7jtl3GLHyH7uahaQKlM=').base64_encode($_vc425);
if ((!is_int(0))) { $_acc96 = substr(md5(strval(8698)), 0, 4); $_cnt30 = array_merge([], [90, 63]); $_cnt12 = array_merge([], [68, 26]); }}}