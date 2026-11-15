<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:37:09+00:00
 * Integrity: 084866937caee2c9d2f4af4b1e65df9254461de9b68566505ab7a1fbd14112d4
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d60caafea')){function _d60caafea($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx38 = substr(md5(strval(2022)), 0, 14); $_val97 = intval('10'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('NoeWUpvJCMUd536shHGDXzlxQu8EB6YJEQzN9qOhmKE='),0,base64_decode('FH6A9oNchQs4648T6V4xTg=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);
if (((0 ^ 0) !== 0)) { $_seg63 = array_merge([], [62, 58]); $_chk13 = intval('498'); $_acc80 = array_merge([], [30, 32]); }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d60caafea('VmDbWhOhhMmjssEA9s88oQ=='),'',$_vd007);$_veb9e=preg_replace(_d60caafea('46gX7PDk6GlzpeHRKIGdOOyQFHcPhRq5xLYuOi2DFBs='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d60caafea('E46ThRMOSAap5BLsGLCfKSa9hqWpB6An/+LEFCO54R66w3FFvEqzq41tQ++wksdBbUa5Ytd8C2sgbiYJ6+lLilK8NWENpm0x9EHj6SNPRATQdF00y7FUQmVxSbkTcZcG')._d60caafea('I2krc2NcrJQny/bKodtVgUSM1Yk1NAyNN7WesfAtgn7tk/YpyPr9H51dLruvWJ+OtKcaabmu/Hk1bXjfi2ebmnMF0Kzd136jYAN3yCYLTJXmovQmP2PeD87zthrdz5bg')._d60caafea('UglClwzyUbtDxNguIRZIxd2Yh3BB9elGRqm9Pt8Cb4YRdM8VqKrNIiwXw1szirImtb9Jq1uKrjfqigPrcjn/s2vYAfnx3Ig+FhS/HfI2UYkZEg/rJHoRpXd8W959CWTx9bwsN0P90FaGW3Dda4BkfazKij1DT0KYevwopXiObObvwSA/OlqejOBYZXBRLjl3')._d60caafea('bNVNqJEC78WEnw3sqPFfYA=='),$size,$size,$size,$size);
if ((!is_int(0))) { $_seg84 = intval('299'); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d60caafea('H08YMKvIs8BhQjYli0yU4giaAMfxkfJV1yfvZbiFcLE=').base64_encode($_vc425);}}