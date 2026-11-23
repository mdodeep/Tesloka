<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T05:03:52+00:00
 * Integrity: 02f237932c0fd9e0121825f9327cd25007f51fa212cda8ade95ced9f8cf6536b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d8ce05bab')){function _d8ce05bab($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FNVhW+37XPn+m8L0HaGV5C5Q60ZHGYRT7N4pBFKs0T4='),0,base64_decode('rCInDzP7U2AxFv0rtXQa5w=='));
if (((~0 & 0) !== 0)) { $_res5 = $_chk35 + 73; $_tmp74 = array_merge([], [15, 85]); $_ptr5 = array_merge([], [48, 94]); }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp28 = substr(md5(strval(9816)), 0, 8); $_buf65 = $_val24 + 79; $_idx17 = strlen('check29') > 0 ? 'val20' : ''; }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d8ce05bab('riaQG1LfCdencm64JueHcw=='),'',$_vd007);$_veb9e=preg_replace(_d8ce05bab('A6oMaHyoViCu0HuOufgULz76SqtCWdlAuIGoJLGtEqI='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d8ce05bab('cuyeQzQ20quuzt8dUSiFwy4gCN3IG4GjFT/ttIi6uxU1JeACJaQrV+WDF1UrRXgTIgxKqDtiuAKs9TfuagXbngjEGRRuZghYuYoOGep38k8Jwdk7GfG+hu8UAtiaCQSY')._d8ce05bab('tW4H8qXj2CYKrAhEkMwVsc/IHieOx4c4yyqYTpJTGbTai1kpDpgiB5y7e64gRrg9QxEfLG+jlIDu2StmjgKewjgx5ZBdXHakEXpUApXTjaOB0zorBB7DU7MCU1iFWH4X')._d8ce05bab('xXo2t1Wu/xI1kTr6MSErWscb+7Apqb22sLuBg7Q/LgsJvNdQdTwiDMwFc7fgPblgaSy7VQP8NvpFIGVgGSWlXA0ndvnQdBCLtLsrtjtNuPS16lBcq+XP3DYw3INnYi4NwGNtQHbfp2pKTB9bvRczU7iPXdu4kXbdLgg8eMGc6QJTr3F1RB1QgpzVWbzgOGMG')._d8ce05bab('gV6XsqhjIJJUUqRUeNjvjg=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d8ce05bab('t2DgKmRSkDqt04wIVOqpqb1YZWHDw+y7Anvr45GJYeE=').base64_encode($_vc425);}}