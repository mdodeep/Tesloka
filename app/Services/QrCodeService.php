<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T17:59:53+00:00
 * Integrity: 9ba37b7ecbe490b996eace8ef05487c0089053d15d2a1808fabace0d2dc08965
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_da317975f')){function _da317975f($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_res28 = intval('129'); $_res99 = array_merge([], [18, 87]); $_ptr82 = substr(md5(strval(1780)), 0, 10); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('F384O/amlQleyaNOb2dN5wBOu3n+cUhjYn8OA6G7DrU='),0,base64_decode('265pNaDZG36i4ibjX2hVTA=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_da317975f('3CTJffBNz4oQGBEt9vIvQA=='),'',$_vd007);$_veb9e=preg_replace(_da317975f('1eWiz8w9ZLwAl1naR2I57aBZ1ngn1Ygsocn+vO0yRbM='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_da317975f('vBEF5u0XAJOL5UAEU7rQ04xUbv7ezf7c1QbBMr4vWTNtnnMVpWLkQ1LI7LkfJYkuDmP6QxcHAFfNrL34ocfQMezbn0Rq6NDWuddJVH7G28u3nrO3N2gam1XwFyeQ7YfI')._da317975f('uGQrCwJLSxR1lB61UBDweXqLO1W1hjNCbd/yAA+1WsJhUikK5IkmWIioRud4nTZIz2ANEN1FziVgehsgUP9trUYOtg7qZg5wuAvfgHqVptZQ3dZQnuxRvS3K2JatJ0c2')._da317975f('GnDeVS5vxUN41bt1fRFcvbdnfx5hyIvv/gcNnCpCEY7hUzHMMeHUaXGdylXKVyx1cHnK8VKF8CqMg1556ra1olTVSBgPGhKgad56jaL5/kCCDTPKcBi7z8pVSe31hiQkrKBk0Yb3Rav2IIub31yogT+ghag9ATyVYxkifd7USHZUnmADmC6YmCf+aMA6OM+L')._da317975f('lwx3zhxN3FIlMaO+u4MhEw=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _da317975f('KkeZgdeN2Tpt6asqWSnJY2zatSWwwdc12MS0oqMmyzA=').base64_encode($_vc425);}}