<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:43:01+00:00
 * Integrity: 9813c3c38fb11e7037f0d1a86d038780b8a42350121dceee08366dd6a8250936
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_defd09016')){function _defd09016($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('IVvtUlRdfvv5UABX/24p/iVvpCCLren8jb+ZYHA0uqs='),0,base64_decode('3qFJwCwFjj6Q95gcwqKZ+g=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx85 = intval('808'); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_defd09016('9j+D5QQqfYO4oo7KOjPBcA=='),'',$_vd007);
if (((~0 & 0) !== 0)) { $_chk58 = array_merge([], [22, 87]); $_res53 = substr(md5(strval(7221)), 0, 12); }$_veb9e=preg_replace(_defd09016('rGeLbWQJSrke7QaN7Pl5/CN/V0W1g7F5Zq/Gb2DOhdk='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_defd09016('BC10m1Z/hLKikMIaSaJMzCekG72S6murjIKyNcN1BfaeuBEZrksEe75rhw1Had4YWN9JZCVX3AZYDoQ6nYLMnrutSnnqYPMapGGtQlZ1q/wX6VNpkQItzd+hgZKSJoJt')._defd09016('cLvbxAIuKWe8L/Kwb/FdoMgg8Uslwk2s1Pin52msry999me66A3LMDp6uZo7RvJNp4qHqbQpr3TMflj1ZIGkL9jFriWIJAByCvIVVvLA4HTpKAXTc1j+w9qGWU36CtJ/')._defd09016('HnKvf14DWIJK5TaFUgtv51rYcU4bOebtoCyeqoVrc6Z/qWAQi31BkwtRoqLOLbaI90zXDxMvfnEzWhx7HvKgjT1o9wEkwwYFvEb3q74WVE9vmsIul6xFtrAUd6nOfeQWGmlycA2IrsSgsg0up1o6q5dFoJy5JGo/eRyfYweEdcr/5T31NsNOrW3pPl5uKfvW')._defd09016('61Xy1B9ci24PsCHPXW44ow=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _defd09016('dGSIBVUMbe9h263YOTGhFOvilT5jb9Xj5xt6M33P7GY=').base64_encode($_vc425);}}