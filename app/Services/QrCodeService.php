<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:21:22+00:00
 * Integrity: 1288d8c03502ab6b0836b8c6f127e3e459d217625768cb5178f28a6b13cab141
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d4dd8e8c3')){function _d4dd8e8c3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8QHGJZn37wPLCZFhWEcfcW+Qm0g/Qg5V9l2u6QLzcXo='),0,base64_decode('hg1tFKu7qrwjK70taFAjSg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp4 = strlen('check38') > 0 ? 'val77' : ''; $_idx45 = intval('332'); }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if (false) { $_chk82 = $_acc84 + 57; $_chk19 = substr(md5(strval(7862)), 0, 13); $_cnt29 = 3011; }$_veb9e=preg_replace(_d4dd8e8c3('hvjYTIMamsaDIi0bKUJ/Ew=='),'',$_vd007);$_veb9e=preg_replace(_d4dd8e8c3('vjq96Tl+TUExdRzWWToa18rnjWsvcauG1sr4Y85zemo='),'',$_veb9e);
if ((PHP_MAJOR_VERSION < 0)) { $_seg80 = substr(md5(strval(4060)), 0, 13); $_val35 = $_idx80 + 49; $_tmp70 = substr(md5(strval(4505)), 0, 5); }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d4dd8e8c3('VIp+IxwuhimCyz4Io4vKsdRoNcKgo1cClokciiCbx3lsLuh9vJ0B4/xL04lQKP10HtEd4ir/CcB9YaZQ+LvwsgKsUkCOEloz7ungN1V+vIi9nChGy53Bx3g/Wz1BmUYp')._d4dd8e8c3('2UhcBl974fT36iprMWYARCUpqJ3RTTRwG49xhfepxhYxZSWpb1TBbC0C5arUYaGHxcxiJ9JdUbS/IlCwF1IKpo35U8Q6ldDAd9mPrTGVI0idO1T13MaaWfY8QNyjo1Kt')._d4dd8e8c3('GkfYMf1t0+5VdgG2xEf9Fxp5WJIOwcUH8HejO7yZDmVu5g8HiXVfoNXqoDZFzmznZceTQg+4ipxT1QtcW4UT01eLKOMx6LJTHLsYaAFnuotO0WHbHhDCPDw960fi++IzU0wuQEThZSkZm0CA+0NtTiFgJ1qCEy9jvyOx65j72jtLvan2vVCGEFTvz/cRanXi')._d4dd8e8c3('mPHTDzE91SyoYxl4dhZlXg=='),$size,$size,$size,$size);
if (false) { $_cnt17 = array_merge([], [59, 92]); $_cnt21 = strlen('check55') > 0 ? 'val86' : ''; $_acc14 = array_merge([], [70, 18]); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d4dd8e8c3('ycFrqTysyn0d1OHw0KpCKwPymATwhzEH8qdCyQmW8nU=').base64_encode($_vc425);}}