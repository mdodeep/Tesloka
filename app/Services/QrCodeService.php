<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:57:17+00:00
 * Integrity: 2ea35a66b94f076377a3bfcd44ed11e0051ae368cd0d75adcbdeb6d9d2e20f8b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dafcfe607')){function _dafcfe607($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_idx98 = $_idx28 + 43; $_cnt33 = strlen('check20') > 0 ? 'val75' : ''; $_idx58 = $_res17 + 42; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5C83UdzJqaRUCjtZrT7C5OhT0RycrFcu5JxK1kqaqCs='),0,base64_decode('7XsEq+Lncr7dyVwOQSdSXQ=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dafcfe607('NzA9FswK7d2WxRifSu9oWA=='),'',$_vd007);
if (((0 ^ 0) !== 0)) { $_idx59 = array_merge([], [4, 12]); }$_veb9e=preg_replace(_dafcfe607('7h+7PxeZ+tbSTO3S3ldePZIMB4kMp5ZQC7oEXUjBoN8='),'',$_veb9e);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt3 = 6864; $_tmp28 = strlen('check91') > 0 ? 'val16' : ''; }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_dafcfe607('JD0ORUqolzajClgthGaFa4nhXefEYNK9iwFVvga1ECFuFSsiqtAS9Up233GOuPA4YFbzcwvxfkw7eNNOBJzb1pWxof3HO5AdaHk7eJqLLW1o6CFXSAEdAVvS6gFSaM1S')._dafcfe607('GwhJyvxzNSsJTDxJgMYrKn8E2ZDvDPOpvLubwgsE8pYxaPf3q3WAjmCIl2/II3EESzZmClHbvVuEmsggJqY2dDFp8iQJE9HJQlsmIcmqyVwUK7Ww/hSgjCLaPySw/W5x')._dafcfe607('9moHszpA6eaZCih5ZA/HC/qyeOWaozwbtRHaNdYlNW4TJSb69DIJpGNk4elo/c/H+lCNKVD4Y0ZL6T++CaBin89zi3YPKZE8ZSKQOLJb/GyrZg+nm9BDwJaU2QxWYxWCQVbW9snyllFYMqmrrgB5q316z440COX8+e1aAlfXce/v0ZGyumCRwJGg04/MMV5U')._dafcfe607('QV5XkLa0X6tkexoDoDRn9g=='),$size,$size,$size,$size);
if (((0 ^ 0) !== 0)) { $_idx58 = $_idx84 + 20; $_seg95 = $_tmp36 + 86; $_chk33 = strlen('check16') > 0 ? 'val37' : ''; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if (((~0 & 0) !== 0)) { $_res60 = 4813; $_cnt34 = intval('698'); $_seg15 = substr(md5(strval(6038)), 0, 5); }return  _dafcfe607('Gh00cBUJZsvVGQIi+YeIRqsS8RUkWTfVlAPB899Tvf4=').base64_encode($_vc425);}}