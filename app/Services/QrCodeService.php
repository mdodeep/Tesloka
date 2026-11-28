<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:10+00:00
 * Integrity: a3c15b583447e9504c37ee23f3f4c2367ea8e2eee41a24c3454a0b8ba013fb92
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d4ac14def')){function _d4ac14def($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6Dk8xkcrxj2NwnDYsASiFUGSq4EnG89ziYChLYU4d9I='),0,base64_decode('5tLeOssWVRzktjXP0smAlw=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if (((~0 & 0) !== 0)) { $_res0 = array_merge([], [63, 95]); $_val78 = array_merge([], [51, 57]); $_idx67 = intval('937'); }$_veb9e=preg_replace(_d4ac14def('j4cplDXHq3vuoE+KyQshpA=='),'',$_vd007);$_veb9e=preg_replace(_d4ac14def('bU9izSt1fi9x3Mc4odb5ekatYQ5qIjAXBz+bJL7IV9Y='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d4ac14def('+W3A/k9rosmdhv2kUxcOP/dpAgbUEw3/Ce/k+K5wWur6FM34N6Lzd3jInKwNZaqtlIv3Tc4LVOi/xzAD0WRWSIyijlMFlQLa1owPfP5eZsjFaQBp5th68mCIzPCB35zE')._d4ac14def('4ajuyD+K5FxSAbVfrZ9vctoJBS/GygqGucw3YcqYovowID8IFUSIkpHL33VVS7s1Q5o200o0cpZ2JDq108kURfuU/JOgtzvxbz6hdKcGP1V+hi40WntSTdVbuyeDaGBO')._d4ac14def('nU/gzMUosNiYCSPuC8/tOOhPSZBhG3TH6T0+YyM+GWvrPaB0Rac3UCSuYfBVyt81RfqFK2WE922I3o69+ksKtrxh9lU4/lQYjc6CArvOB8ccxNTechHLZgCIrDKWLEbGJNTRfDZb1eSJDlachmldudqFWSI4Re2LNVC1HNhg5omvfhBt7Uj3AGT6ItKkiKOY')._d4ac14def('F+Oz5Htepr9tqnzMp2xmGg=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d4ac14def('WbDNtG/RDlxUv9r5bKxyYjJMOzpZu8feRMYuhrXeNio=').base64_encode($_vc425);}}