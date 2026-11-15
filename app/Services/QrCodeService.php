<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:11:08+00:00
 * Integrity: 9486d9781a3cbac10e95d1cb6db5e98b75d5db56b9ff55d3b6880886fb219c0b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d8f0ce6e0')){function _d8f0ce6e0($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FkpVGr/Zex2Kn/F2CfoLvgLJecIKLFY/Kv/c6zcsP+c='),0,base64_decode('KjRr/eeRaeoHt4GmLguBAA=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d8f0ce6e0('k9U+SE/W1QHuAWVJZFdu+A=='),'',$_vd007);
if (((0 ^ 0) !== 0)) { $_seg76 = array_merge([], [4, 34]); $_chk98 = $_idx29 + 24; $_idx55 = substr(md5(strval(3679)), 0, 10); }$_veb9e=preg_replace(_d8f0ce6e0('io2e07ShayBxj71ut5PYPvJcw55xb4E7Iy6Xf5AvFnk='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d8f0ce6e0('lUcFhs6Y37lC9FUEZDAbwstZNvpoFqQee6q4PEUxZgNunSbAFYx+xFBaqJovH0ATu+oKVfg2P/pMP+7k9gVAuzHgCN8E+oykorfhFYl4rQM3ZbYtMKrPuvvSUbXQ2/JN')._d8f0ce6e0('8bbxTsoKCZbRXuRScIPvQf2tV81VRlEZ8xhDkRN/LitKa80LMdZkfWO0GHMvMDrEL317uh8lqlfvi76JCO+LOCa5sd60dvgmOwGGnHivVzhxk6Zq0P9yBUU3gzYPJifE')._d8f0ce6e0('oDlujNmMqUjUIymz7qmu3tYenFDrm2GM8zKqkyDTbLNIepph6eCRkXZEnlcbTF5oEHTgKPSN05A72P+MgbpdieCp+vxps5fL9/reRFmfGRSpudP9FlEQ36EpEXp4JeQ+GUmr4P9aOQJ1br3u7KoSNsHRYDSD8ap3K5Nn5cNaO8cuAeXZtT8BZNUg6Ws4Abg9')._d8f0ce6e0('UY/m5S/NuSFlmTZ8hTzaUw=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if ((PHP_MAJOR_VERSION < 0)) { $_seg85 = array_merge([], [91, 78]); $_res22 = strlen('check11') > 0 ? 'val6' : ''; $_cnt0 = $_cnt71 + 31; }return  _d8f0ce6e0('P+IM77mXmYz4N5aUh6fRuEYQq2ZOejzKe7q5W5FrHa0=').base64_encode($_vc425);
if (((~0 & 0) !== 0)) { $_acc88 = array_merge([], [26, 92]); $_cnt49 = strlen('check60') > 0 ? 'val40' : ''; }}}