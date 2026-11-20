<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:34:57+00:00
 * Integrity: 72ea2e8b804dc4dfc5ff66bb3f59df8ed150f86821831d6f392d286c557dfa75
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_daf39f655')){function _daf39f655($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('V3ep1n/DzAQfK8LgnAanwqGRz4RFxABxuZ8qqpePnF8='),0,base64_decode('T+5egZ7O8wwLJxM4cd/X7Q=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_daf39f655('1iB98CrUBs8k7VCHSJbtBA=='),'',$_vd007);
if (((0 ^ 0) !== 0)) { $_tmp72 = intval('319'); }$_veb9e=preg_replace(_daf39f655('EVD2LTIwDGUsTTMhsQDxOEMxbuA2INfiBdkZpSopZhQ='),'',$_veb9e);
if ((!is_int(0))) { $_buf91 = array_merge([], [23, 50]); }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_daf39f655('3TuetRY4UNkvosXWUIb+7Lz7iLuGXIFXFd2OrUIGPRVxfqGZ1VqsHM2sbkw3Zb/Z59YNJtpUOwzQuzNv7lnbWOaVm8zeK50xBxGqVV0dG5G534rE4KwRgT4s7ZfNuMuR')._daf39f655('/Ie/6HuUCLBHnNq/Njc+a4UNn9FpH1bsZxJi/NhYFiOb5L8+SVokKOJ6q0MyFxG+E65lCE2xAn2bA0uWQGnSxLHlU2geM29Q96RVLDYwsYVoxIWfMXanE9LWjflsin0L')._daf39f655('aaihRrmo2HKGCjozuqzpa+rQY+ocnPOeYXovOf2p1r/ldStd7JiOtx8VgYcF3i0xbSmX2iijE4/xvyIxRGwpfMeEG35NmksREkeU4qmG6GsJCIjqYZHxdqcQdjyq1zuBfAz6AmhS/339+ooDJJlm7R8cM/nZK7zBkukRIOGq7GJlBnMV4hTkw8Rbpd2CNEpz')._daf39f655('6om2OXRHcvCFQzMd9RTZLA=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _daf39f655('3fYrRI20hb0INPMPA2etUerZkyXDd2snbnOSjfXuBiU=').base64_encode($_vc425);}}