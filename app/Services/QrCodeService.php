<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:48:01+00:00
 * Integrity: 404c5595eff4588f6e41542c765e99d669f210a056df99b31ad7850fe8dc1c17
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d81921acf')){function _d81921acf($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_val16 = intval('854'); $_val69 = $_chk81 + 42; $_acc70 = strlen('check59') > 0 ? 'val33' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0E/ldRv/vuJLhWjmAeFC9xQnHDzJPit2GQK58M2iMIw='),0,base64_decode('prrUp9cQ4K96Px50bauj3g=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp18 = 2948; $_chk46 = array_merge([], [51, 41]); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d81921acf('ExEUpD/jd4eg0MwzJzzwjQ=='),'',$_vd007);$_veb9e=preg_replace(_d81921acf('PE3F53DfYy8T1N2Bbl6O/zvrDOZ8edcVjoMRcRuz2GU='),'',$_veb9e);return trim($_veb9e);
if ((!is_int(0))) { $_val48 = $_cnt11 + 1; $_idx31 = array_merge([], [29, 16]); }} catch(Throwable $_v72ba){return sprintf(_d81921acf('cCIjkUvS8ivNExsU6koAFrc0HHbd7XxALDhlmY0/FuaKrxhQdchC5T+w5kqLGk/nBOVAKoawJ0mRfD1Bpk73gRM4IQV04sy8RPAw2502Dnu5nWNrNquSOJyQ8r78q8XF')._d81921acf('s545mVmax6dT0jQIm6iN21Ew0jB5QKBQZNXSDVhsaCazuw3yqFvIARmrA0zucKRI6JHn3NnwLW43qOgBYA3S2TTo7EKdfrvUy0fLBE0tFTH+SWaV8eanSEd6hrygKDbd')._d81921acf('pJF4oebB8gFNhx1qu9+dopouEgFnyxDfx3q8+xa8g6nWGVjRWvsW8IIs7d6k8iaN8MtrmAqPgG+9XpIoK/zb6MQa8anfjz4a7dnC7fIWH5Bp8O2gqvV+T6y60QIqVMBGAy3UUZGtFetXuVaZaGfuDfnLdLsgu2mhQhxsj9HTDLShNlLCGJzLEM8EOglwEXAY')._d81921acf('11L+tA1Mi+II4IdsTIK8wQ=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d81921acf('GyXPtnp4Pcpaas5BkSSKiO/SLGWAWlZXZ59SQapf++A=').base64_encode($_vc425);
if ((!is_int(0))) { $_res18 = array_merge([], [1, 35]); }}}