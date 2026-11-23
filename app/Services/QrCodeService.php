<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:27:07+00:00
 * Integrity: 46ce300aac970d0ee4540f2dcff8427e32d16f29beab33ea2e1d7aecaeff2581
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d6b1f58bc')){function _d6b1f58bc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('SADSZfG7WWlfq+xaG8pp+Mei4cBZYOlywDCGx4Vhipc='),0,base64_decode('PUl40wLbGhNai+Ofyyrw/w=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d6b1f58bc('pZ2KWTL3hQHQc9kaxTYzXQ=='),'',$_vd007);$_veb9e=preg_replace(_d6b1f58bc('3oI9vC9Yjj/LwXd/JRT4/daKW8cjiUp0gVBGWoFNOwc='),'',$_veb9e);return trim($_veb9e);
if ((PHP_MAJOR_VERSION < 0)) { $_idx58 = substr(md5(strval(4297)), 0, 13); $_cnt83 = 8450; }} catch(Throwable $_v72ba){return sprintf(_d6b1f58bc('kwsH3ZC/Pq/Is29EhFBde36BDcxz1gqaVlT2wIQoLrTbcBeS49FCdjuKXGIlc5lHds32kvCLF4yXG6K+lsE86ubsfGoahiQRQcaD8AOpzkQouwUZrBhVf/Q20WFurpTP')._d6b1f58bc('O/utNLxz+kXiL9ZEefkwbZ0/+pF+lC8psZvcsvNF4rDJrxFHH2e10f9cKKqRFQjmrMFlkEm90popps3adjAKsqYnPyd+kSz5FgM98q6EnZj0GTn20cyEfg/lFq0iZjN+')._d6b1f58bc('mdOZUlwNgZxJ2YVz3Jch/XhRK/3ADK/cZwjfp6Bw/nulhIa5y6mVnAJU8pUipOwufChQlTCBJ29p36W34zan0l8SQ12245EsQXgW9lvVFbzCKubjM62yBC7s6lKZnyL5kJSUFjAvDJQj6vWnM/Q2Xw2jA+NE+CS4FbAg9VTgpXFgWa+tCcIG3JqSsWKrts0T')._d6b1f58bc('fGv4C9W4cBFjLSLXBt198A=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if ((!is_int(0))) { $_idx87 = substr(md5(strval(6090)), 0, 8); }return  _d6b1f58bc('CyrSt7WfPUpto+o+ozd5q3BsFeGkCsIsCJupVQj0iy8=').base64_encode($_vc425);}}