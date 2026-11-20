<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T11:21:17+00:00
 * Integrity: f306e282dd584688fe4bfc0548558cfabe05607eed8ce659a5adade5b4d7082e
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d923c553a')){function _d923c553a($s){static $c=[];
if ((!is_int(0))) { $_ptr75 = $_idx47 + 12; $_cnt98 = array_merge([], [77, 64]); $_buf71 = intval('372'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tpTzXzofboF9elTWqorcOq15iza4+c1qTqEBe6Er1Hg='),0,base64_decode('HglKFZjQmGylrE3gw+rybg=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if (false) { $_chk93 = $_buf55 + 83; $_chk19 = 9613; }$_veb9e=preg_replace(_d923c553a('JIdPKrM+jmIi16P0SCyh4A=='),'',$_vd007);
if (false) { $_idx8 = substr(md5(strval(5801)), 0, 4); $_buf5 = 1102; }$_veb9e=preg_replace(_d923c553a('T26JyMCqX+SWWdVTWO8WwY16MZTpAm2/ScmhI17mJEQ='),'',$_veb9e);
if (((0 ^ 0) !== 0)) { $_acc10 = strlen('check21') > 0 ? 'val94' : ''; $_chk85 = substr(md5(strval(2628)), 0, 9); }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d923c553a('9F6vCxZweWeY2uXBpj8/KrUYvc9kwqjXfzLbDAAX5+rop5OSg9npgQdcpCN5vtLUx0llaRGV2GxNyNGfhc2to/O7RmGsB11+EP0jRlWF74SQKAMQRixasKcyYr6fbpQI')._d923c553a('oUoqcOtKf95pHobO17ToUCtnFImg3Dmq1aKcUGDRBUH9KZXdTdx+poe77yJa6v/cCuf3vNVBdJY5nNDrBPAbRecBaHJM9bMHsoWDiItA/GvYG/nSg5qilcaYbFyhKvmO')._d923c553a('xTVB6+CZLr2gXXZjJdVqUwocfLmcZVb4HyGojVzepNHs75TZpY2uNZI5zZbRss2QqlljapwlRvgKxD5+jqVMheS89UWnofjS5+Y4Spknp7FlQbaLhG+NiJH06S4rOmFI0uW79jZLI7Mxv4IaEwCtHul/hbsxWpl0GIoR7mQXBAk9KJyv5wjIaxv9lbznfTEF')._d923c553a('wbuDYHFTf6PsqpEI6nxZGQ=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d923c553a('KMI8mkAWo3AORaOGx/EDIeWGEvElyz24lbt3VNlO+6Q=').base64_encode($_vc425);}}