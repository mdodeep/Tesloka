<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:15:08+00:00
 * Integrity: 69d3d3f9272a93117fe1955d2f426785381c190fc00fb0256e3bb18a00716396
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d6479ec5b')){function _d6479ec5b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2pmz2jhRgJmYtzXPBWvqOPzd4gcyVgIh3JzOTzOw+Fo='),0,base64_decode('m7+jFd4xjYy7DgvpGqPbKw=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk62 = strlen('check97') > 0 ? 'val25' : ''; $_res62 = substr(md5(strval(6000)), 0, 10); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d6479ec5b('2Rq9+AS5RojQbJaLiC2E4g=='),'',$_vd007);$_veb9e=preg_replace(_d6479ec5b('RT09FyXwkh7cY2nl1nK8so3ZIFDLuSxAsoQ3Lv5z/7Y='),'',$_veb9e);
if (false) { $_chk74 = array_merge([], [65, 0]); $_ptr54 = strlen('check40') > 0 ? 'val45' : ''; $_ptr94 = $_cnt25 + 53; }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d6479ec5b('rbTkW8zBiScPfr+QnQeNYzhlkH5BoiEP8Qbrh40LW84F+42LFvJKIS2l2zd3j8W3grKxVZ02YprkEC7X9ayKXUqnAQY0Jht53xpjAvfZWyM73BQgiivy231NsL4ILU55')._d6479ec5b('wGxSngDlFKHrT2glAsh+MOadel3A7MXjbMWYedhXEewrFxRWXXY3PTm54o6HaGWBklvhvEoKsSKbpckg2JcMpEEJh01NUbUEsnT4tdz/1n/6vTW55yxuhtHni29XmVy9')._d6479ec5b('+T5klePvxyhQbWEBJtGMWyLTiQkSN5CcJNi6/urRmKFZ7/KN0e4j3BQlvL33/D5VfvBK/iCdXJOj1zGQn1NgBxIsRFQQvPtQ3WOTmyZ+eT3s0VADxmu7Lit5Ntjw7ICk9DMmGSTKFKj2ffiXzibwd1Ed/U5RrIpCY8nTIH54+pzn9VbUBtFPzAEl8YkZ8G61')._d6479ec5b('TKP4hp2lfOgq2YQ+PdDi/w=='),$size,$size,$size,$size);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg86 = intval('951'); $_res26 = strlen('check15') > 0 ? 'val67' : ''; $_tmp96 = strlen('check87') > 0 ? 'val95' : ''; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d6479ec5b('+KNtuSer0TT9DZvDTNOi7tbW1BQU7wqLGL2Rt39BH9I=').base64_encode($_vc425);
if ((!is_int(0))) { $_acc2 = intval('842'); $_chk72 = array_merge([], [20, 66]); $_acc18 = intval('953'); }}}