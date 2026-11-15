<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:33:37+00:00
 * Integrity: 2b3991e3c76e9bc9bf2734c91098cdb4cf0d9001f915bddd01eea5f0b764f435
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d8eecdfba')){function _d8eecdfba($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FkXggoKXlo78CsvU8Pvo8vxG2I9r5nBf+E4HttNlkWE='),0,base64_decode('kCm8lgO8uxSjbowwc1sK/Q=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if ((!is_int(0))) { $_ptr9 = intval('718'); $_seg29 = substr(md5(strval(3896)), 0, 16); }$_veb9e=preg_replace(_d8eecdfba('N/gdKO9j0gKEieG+UyNiHA=='),'',$_vd007);$_veb9e=preg_replace(_d8eecdfba('mAo+kQ2DnW+WBac1dTwzaZMct5hISppKLu2btq48OnU='),'',$_veb9e);
if ((!is_int(0))) { $_ptr31 = intval('315'); }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d8eecdfba('y0hK4jw3znmf+FqToXuEuKNAlSPEYb1ueEH/C74ar3P6SEIsdMXsFmfOh5N1XHuMlXJolHNvkM1rQoHJ4ITMpIG0Uce8qbD6RRo6bMXBSqIr3286iR82NWfz89uhpVJI')._d8eecdfba('1MUpucOhixksU5vVWiqMcoPOyabuoNG1jEauuEQbFM+HTm6ctAH3RPZiWBV05Fa7SvEQ2d4qvFZtxQITSikI7mes39gHuj0f34aK27CjS5Ten7R5Gcpl4l2QQm6SyK7z')._d8eecdfba('xz6xT5DXK8QD2503Pexcptu60f8jI7X2qUVoriYdluOl+b8e2kpjZwKKMXoBb4+G1UAFXhdn1VU0lE0zHdL1sc3iCA78InjyzVPbwINYhUQtwSMlQNrLtJSN6eHzwZNFN5WBC718BgyWUV3gc/IFg0erdg7hyTcWJjKRk7CfkcHned3BbZdoy5B1LMyHhopp')._d8eecdfba('DV3tFKIxSexdKXJLMtnnGA=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp7 = intval('788'); $_res10 = 6110; $_acc53 = strlen('check60') > 0 ? 'val37' : ''; }return  _d8eecdfba('SlkzDrmEYtDAjZzRw+A1fHBWS/x4Dc5Aiy8oeU7J/l0=').base64_encode($_vc425);}}