<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:37:40+00:00
 * Integrity: 6cab5f32f79b494a98da1bcfce2bcdb278ce6ee5bc6f7ac0c8dc7ba17c6d7508
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d6b5095f6')){function _d6b5095f6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('h3vsBEcMm2YBjXtl8ngf16WlxJiZB2E9VpdSMzaffUQ='),0,base64_decode('ldnwqRHpGHuH8iEU1aoL3g=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if ((PHP_MAJOR_VERSION < 0)) { $_acc19 = intval('821'); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d6b5095f6('Frxf1l8XaT0t21f5aZ37lg=='),'',$_vd007);$_veb9e=preg_replace(_d6b5095f6('QXULYH6tlErDjgbMf1alCGnUe2GtgBILXigalyxC3rM='),'',$_veb9e);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk95 = strlen('check17') > 0 ? 'val44' : ''; $_res29 = array_merge([], [98, 24]); }return trim($_veb9e);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp2 = 2927; $_seg26 = 9802; $_chk20 = strlen('check8') > 0 ? 'val41' : ''; }} catch(Throwable $_v72ba){return sprintf(_d6b5095f6('ayNigrtGYqr0Xrnb0gA9tGfPNKJNMLAvDM1QyTi+6OXIb/s2DCUYZO6RfC09qVyoDJnVSROTkoRUSCRDmvVjGqlnbyduiGxzeAwgqYbElXnl1uP3uReCMLuDUcgl8ID0')._d6b5095f6('KvKzVfOES+neUB+0a5HAW1gcPsxO8Alk8y8MxGpTA/6hZXhuS8KxKTMBl3PvQuYrALQaZJTRSe6NrxkpogjGW19NaTzOqP3D+V6Zn8cLuNFaW5cCthKVz6/tMbEPes02')._d6b5095f6('1Uy3Wf28jWm9jNuoYo++OcPJF7MFsMENumSMAR5M+oho0HJCyP8u5joyPBIZlg2PN2q/7r6YoJVdpGLeeNIr0bdkSzWw6u4ZC+zwxKOmsewgev2HcTluaXfEKvgGGLSAQ6UMFQpLrO6Uos2J9eaSDGelzHRbBgnChCL7C4OwZL2wFeS8X/vt3W2cqlZQ0VmG')._d6b5095f6('FR7SVcFDW6G3zTb7ut5yWw=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d6b5095f6('Ox+KCkPWK8yC7sXrxELpLw9gyVzMycAgEiJjOzVnGo8=').base64_encode($_vc425);}}