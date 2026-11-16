<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T06:08:59+00:00
 * Integrity: c03b6aa24b690558efc7f50ae03d2f3fdc86d599c8eee60225c90f4e06fd985b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d5d2f71f3')){function _d5d2f71f3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2Isy+Bnj7QHVjuQS4VIqwgTWEpsuJaiKIXSA42psVBM='),0,base64_decode('4uq+sIVgUdZNrUDwZ/x2eA=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc77 = substr(md5(strval(4077)), 0, 8); $_cnt71 = substr(md5(strval(2691)), 0, 8); }$_veb9e=preg_replace(_d5d2f71f3('0wzn5flNNKcDUbQ0uS6Zfg=='),'',$_vd007);$_veb9e=preg_replace(_d5d2f71f3('18cmXMA0silms0hdW3xzsL3NmiJVrR0McQZqpVjOZEI='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d5d2f71f3('LJwWxrMB4nSzbSWkCKw/iAekx0MbK2Dkfo2c+AHloa9pNCjHraQH8ffT1YeP3cDHMbzxx2rWgi9avk16HUE8VTmR51bxgF46ErJjOBSxthAooFyCOS74seR9Vo8RpA6v')._d5d2f71f3('bKWeJHQTBdic/h+rY9wAssp3ssMwP5dDziaQdvegM+BAbECIX6Knevbc/zbeW0lczQ/wXq8GNmZo1MI/9XEEOKYLwSL32fMZL6MUzzWxEUdZjc6XEXIti3k0WLN+mx3H')._d5d2f71f3('sRByNPn0bi3R/C06kVufghYMAmhtwtwlXDEOuUxSPaPeAW7zgCdnNqF14hV64kyAGOU1FUvLk5jhdQ86woM3uDe5OGoQOSvCGKBikNo+HLXqWakNrT8tABVF8MDVSSsrZeurKYt0RjuTTBDS4uuz8eW6k8ypNIPR91S91e/FmWhgSQ/keTHDBDMBLm4r1+uV')._d5d2f71f3('LwEcedeacJoujXpS82340A=='),$size,$size,$size,$size);
if (((0 ^ 0) !== 0)) { $_chk9 = $_acc39 + 75; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d5d2f71f3('qd3qnHJE7y2BWeoR3mRycMiyqbFjhs54c/Rj47C+iMI=').base64_encode($_vc425);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk32 = $_buf86 + 54; $_buf10 = 1215; $_cnt59 = strlen('check42') > 0 ? 'val52' : ''; }}}