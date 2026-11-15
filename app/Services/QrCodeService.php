<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:44:11+00:00
 * Integrity: edd074c8e740da8aa4cb5d5dde15c72b21ea211882671f62e8f210651ef543bb
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d08068718')){function _d08068718($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_val14 = 4990; $_cnt18 = intval('326'); $_chk69 = strlen('check41') > 0 ? 'val30' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HSC8/Sg16SVoXJs/LEeXNKIwThcwVH/Itzmgl65WRqM='),0,base64_decode('hcudk+HX48lv44dOKooRLg=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d08068718('mnyEr5xBUe/jgqZUjfqvhQ=='),'',$_vd007);$_veb9e=preg_replace(_d08068718('3ruX2PYdo2pfvO0+WzHI9LzFyHFhAwBsC3SFvbuMaOY='),'',$_veb9e);return trim($_veb9e);
if (((0 ^ 0) !== 0)) { $_val54 = array_merge([], [3, 13]); }} catch(Throwable $_v72ba){return sprintf(_d08068718('uVGxKSa6h7cmbMNocQKLK5ICV5gKGiVQKcWpNQU6RARE2X4H5s3oTZ0zNRHcML7ch/5g7YEaS/NzCt0nPjFQ5ecy0GpxI3a4BXaDHv7p2iERBvTzzCjeWEpOJIa5/mmo')._d08068718('5JzuOerq5+dxnZZnhZwFkgLv/lhVkpBCwpRNVmIvvTs2+hPXYHpu26xo5CeFJ1adrQq1kv4rUoNEgXDnz++1nhr7oIcDC4EjcgdGCSrSC4PWZfZPTBmz/RlQq5RPkles')._d08068718('ctAfd/1wKza0WDwz/2bkiZhNvRVyJc/13159RpEsmrruPAJ+MEOMM0fHuodIexC6UteOjWfTh3mCj8Kx++znY11V8nGHYF0sIbyRYZNrO5ARBwUHSeChMiybmFKuWYUFkHx6yBmF31iX155CRaBzi8bGrviWiYH2mg5Wo1oinIuU5BZLLqrIye243woLWfUz')._d08068718('BIqjAYXTnUl2O0gF2a+h4Q=='),$size,$size,$size,$size);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr80 = 3086; $_chk18 = 176; $_res93 = 8853; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d08068718('CQK6qZQg6lfqFtAiCRmDbjlveAsrRwX/nJ2AwEWl/84=').base64_encode($_vc425);}}