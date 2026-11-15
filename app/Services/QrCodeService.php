<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:34:32+00:00
 * Integrity: 80d18f91ce749c2ca9f6e303c5ac5e4bf9c6db968e683006649d7eda41df6409
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dd03f0ff7')){function _dd03f0ff7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0cw4U1ddPSz42140QIW25CYgJK638xVaJ37rBNX0HZQ='),0,base64_decode('BbWlDt1EkL2rQFa6tf1e6g=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dd03f0ff7('JLgZI7IaWi/QlLZQv0qo9w=='),'',$_vd007);$_veb9e=preg_replace(_dd03f0ff7('qyIioc92jYB4olXeZeCrYxTbSiJUeQWy2tG7Au+wMjs='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_dd03f0ff7('qWciwkzpLAppV+qqd7FlO2MJoeaURfkTl2drQoAQZlWVTVuTzYFKLex+a3z78tNNizln9kZg90BDKQ73q0muEPihNm780UME6B14COywsKOjBjSELE28o+p0gVqq9/Yk')._dd03f0ff7('U8rCajVTi0aHjE55QRGcK/AAWwwnBgXXM8u5b4vvZ3vNtA3xdJDBVYthRWCFCGGJiaOmHLnu04OuD+y+yGzgWwgVEjf3maI7OVT8UttchmYTL2XzWAWOMKwYwGw8qFYh')._dd03f0ff7('pjP6doVrZlUpsE+2nHrrVMN/Z88TAsnOBLy+/RFxKiJsMqmoZSXAkI1iGycwBFHTvcZlhegnS/E+E587n1ssjKxrr4Bh/ZRNjHV38MJ2RsReKbG/ignf30DSCS6Umo3oEPmla07KzZ642eBVWLhtYUuHMH6Q7h8jLFLan85zsBT7junI2YVVRHrZ+1Xy9mdu')._dd03f0ff7('RZeJvVItuvOBOYHPgsrMTQ=='),$size,$size,$size,$size);
if (((0 ^ 0) !== 0)) { $_cnt5 = intval('167'); $_idx56 = intval('848'); $_res44 = 2331; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _dd03f0ff7('U4LRsv3F/kyOThhPXVqpAv4lCtzJU0b0qNNHoJm7Grc=').base64_encode($_vc425);}}