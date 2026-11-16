<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T16:48:11+00:00
 * Integrity: ab8dcbec4f381a73c000a540f5da45639f9c8e40ebcc1ddbc948e203c6c604db
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d356bdf0b')){function _d356bdf0b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OYTKYTtD1jSO4nXaMI2u3GOGL2Xn4wmObA/UnDGAETA='),0,base64_decode('+uWs5xyDgaRw613EqYdcwg=='));
if (false) { $_tmp10 = strlen('check30') > 0 ? 'val91' : ''; $_tmp13 = array_merge([], [71, 1]); $_ptr76 = 7053; }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d356bdf0b('QMAMxABrY5uuHaU5Lcr0+w=='),'',$_vd007);$_veb9e=preg_replace(_d356bdf0b('1EdFlfNgL0Ocubr3uUhxtgGFevwS9Omg3yOP1p9iU68='),'',$_veb9e);return trim($_veb9e);
if (((~0 & 0) !== 0)) { $_acc21 = substr(md5(strval(9961)), 0, 4); }} catch(Throwable $_v72ba){return sprintf(_d356bdf0b('rKNnyi4Jwd5W297AL0y3beeVGM4dNA7B1ZQhgUNROvGqXfu1mH9toSAYnNAnV+4it3OaCkNGYTpF+nm2HtNn2iDG4f1Px8F5YHXjVixrSJj1pxu8Snbl3/RvObV2HVxh')._d356bdf0b('f0slTraqdIYQbKbw8fS2AulOSi85/2mfq2ncapV0Gzd905vWJnyunC4/Wr8yAxy/rstIS4xDeflB1YbYKmamH2PitDvfUEq7xM95u+R+4EYwvRxwGf/BtBfpxG/08oEd')._d356bdf0b('a2cH4txUTSLLsGQYN8ebJHxoyEXazeY1d9lZGp+e0zcfQv568xExFcMXeDFmLogYtH9lPRwurEMqhLr7Al4I6Hk2VNo/YrH8y/Z6mqxsYSIRGMVHSwHUT+zigEntbWCMinQgGGzPgNxlt9rm3R/p58AkLMV/8Djf4McYsOx1uYHkEkcemfQeskIzwNM2HtjT')._d356bdf0b('NLdDVyRMdxZoMTjFaWjmWQ=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d356bdf0b('33a2Ncf9bfP8bAZguZTB+s0i5OVYwcpnMpLjY8aVX5U=').base64_encode($_vc425);
if (((0 ^ 0) !== 0)) { $_ptr69 = array_merge([], [65, 8]); }}}