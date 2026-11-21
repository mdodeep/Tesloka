<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:32:21+00:00
 * Integrity: fcaa0d410ad2dc05fad9faf528a0ad308ad6fa6d51a3eb44bcba09444ceea3b9
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d28db89ab')){function _d28db89ab($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ery+mTQ8EySDnTOyfZQeyJYi72Cfghw0pYLKFghdkIg='),0,base64_decode('ir05c0CEC13vxOgJvALRsA=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d28db89ab('4qvpC5UULGT5yG5NYO/lGQ=='),'',$_vd007);$_veb9e=preg_replace(_d28db89ab('wh89K/K8Eyq9wXnA2RNSb7xD+CaetlVjfVFh6QMiOoM='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d28db89ab('8YgCww/I3SYbJ8zLwYcOORdNz8PQQk0k+CmY3mgml76p7LtYq67KKHSJ+rt1IE5ONcW+FeFvSmTiKyVsCst80hxtKB+jxZPyAcOW9qhxdBbtDLcBbqduHF3Eh7rdn2nI')._d28db89ab('Dz9kSlQht++3Eo/jmgr21Sxuz/pBir2IFH3pToQKAVKFvmprfh7zaxHHWzXl6TOAQKOSwvtPKaRMbkTr5Pgx0wniSeLk+6pOTYDPd5BrxudHIrtkmlapplQIqveVKbPj')._d28db89ab('pAp8aU2tTCvkCeK/xVqfYFkx0qLpCn+BKGnBDS7FSXPCc+tZ2WiNPUDUiFOFOePq6a4RnbLpZqfJZP79BYtz15tGctFoEYDkH7UxwDYlA5Oxw5z/oywr2Xd1LvAIRDnatPUuB+39H1kj8hQnszYXhOCqFx/xyioMjtBm+9ZpToh2RBbE5t5EDed+3pA88Q3y')._d28db89ab('23EN9QXfyhj7LT1YgJ3jVg=='),$size,$size,$size,$size);
if (((~0 & 0) !== 0)) { $_res31 = array_merge([], [15, 51]); $_buf72 = intval('929'); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if (false) { $_ptr89 = substr(md5(strval(8166)), 0, 8); $_cnt0 = substr(md5(strval(3345)), 0, 9); }return  _d28db89ab('DQTc+ILcMH9a/SgUCfEofXFdgzF2EGVcBUMGpPVsJVw=').base64_encode($_vc425);}}