<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T21:20:41+00:00
 * Integrity: 82407b4905c57dbee639f80b13b7dda8c68cb714bb5cc6e39cb3b130f3f42e5b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d2f9106e9')){function _d2f9106e9($s){static $c=[];
if (((~0 & 0) !== 0)) { $_idx18 = array_merge([], [55, 10]); $_acc1 = $_val25 + 90; $_seg9 = intval('554'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('QhRO8G+tD608C6xKLYgb18qQhxWD+h2cSdib4WcTTBM='),0,base64_decode('lHGmQBxojfqQsFSvL8Wa5w=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg25 = array_merge([], [76, 59]); }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx40 = intval('634'); $_buf44 = strlen('check50') > 0 ? 'val14' : ''; }$_veb9e=preg_replace(_d2f9106e9('zk524AU1lD1LN5o1YOK8Aw=='),'',$_vd007);$_veb9e=preg_replace(_d2f9106e9('nbUU040V1+to9J5GvJJdu4cQMp/irbq0nhiuGgG6O0Q='),'',$_veb9e);return trim($_veb9e);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg68 = substr(md5(strval(7258)), 0, 11); }} catch(Throwable $_v72ba){return sprintf(_d2f9106e9('edIiIVDDn9LtOe+gZVo6axjEk1+3DPq8JoC6MLl+8NXeeZb3clT1WyhZ3owSm1OT92SI6eH8p4wndp8tAQHwJsMg+X+kW5eD+mByBe5n+9ZmVEk3Q3A6llBIOBVkaCLZ')._d2f9106e9('Yh75nHxjv/Ep5PCtjMu+lfd9KIpczFTfCknWNWyCxU2ExJL32zxS1kLtpfWx7X63bhaAUdkHaeBDM4XXCWk6poWZmyKo1m3EphGkbHhQ+AnFwKNBzWSnmOnal4QR7Sqc')._d2f9106e9('YvrWrGrVrxH2IehGH8HMPnRfFJJ0c7t0CQ342uT1jRVSB57Ok7S13vJ8MMRMnATqfqRNgvqRjITEXY34VwNSV3MWUBifO0Jz87LBzwzaM9aAkT0Khy9nbj8SkUf4st8S0cMk6XJHXYoldj/8YBdac02psCcqWIhwpjaoaY8P1GIjgnMo5HHSn1QH7FDAz+oK')._d2f9106e9('ELqD0a3rPIajOe2AUwJHSg=='),$size,$size,$size,$size);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp26 = $_ptr69 + 87; $_chk64 = intval('239'); $_buf57 = array_merge([], [5, 26]); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d2f9106e9('o+CIUxwVFUquoR0viARPv9nF/UaHMMAp8NgbBAu7JAs=').base64_encode($_vc425);}}