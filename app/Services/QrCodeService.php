<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:27:59+00:00
 * Integrity: cf12f3439e1b68eafa07242eb2c8f03327d3a7052d570ce7519b0359c7c64b4f
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d9b5bec63')){function _d9b5bec63($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('DS/MMAoHbyD/rpflPpNWR6esvpKmEY1g+R6jZ3E+cuU='),0,base64_decode('GTyWWDBzv+YGVbzMAvrKPw=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx20 = array_merge([], [28, 44]); $_tmp42 = array_merge([], [37, 15]); $_res82 = 7845; }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d9b5bec63('7eYqDkTpOnh3blqutVakvg=='),'',$_vd007);
if (false) { $_res65 = 2401; $_res62 = substr(md5(strval(1709)), 0, 16); }$_veb9e=preg_replace(_d9b5bec63('52qdr56FiMjlIq482dobspDynvsTKvot3ped7gMfzj8='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d9b5bec63('XZs/gQr7ElHS029fR6E+AWIHIxbRcw1W0dH9UitRCR8ToH6OmfuyW/APzBUDKkkYVlsEfJon/vEdaiK1Z3NTy8GcSxhXk+0raigUsemQaVXKRTqDi2A262JwpzobBkyU')._d9b5bec63('iYA2acD6IRfvIynuH+wo8BFlfnATCRfF+tC1Cg09QmI8fkMfMvGqF8HKHIx+lbGcbJ9W3WW881F20gTcJXIBfHj27Wpu+Qx+zonaujDBTb54MQLBQMkuFCC4SwOwsrYD')._d9b5bec63('TviLfXSnfxUbtkBd/DmSiFqd6Mr8BGfELvS6mBrN7D4diXkf/ouHx5RBen+MhwMacZBZQbSmNmSHBHUGlyAVgwieRDz4n0+i+FdqQK68+QXi36TIwIdGXO8/5xipGev+jh6Nq9wGiXysINmteM40JI/vps2HiZqScXJfXwHh8UmlMmn102WbT1RK012rbeIn')._d9b5bec63('9eHomecU2FnHNJb0wlmRaA=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d9b5bec63('oko0hEEbrN9Q0d2bJn8xegEI9IVlskwUu18SfaLKdZk=').base64_encode($_vc425);}}