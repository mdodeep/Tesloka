<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T00:24:15+00:00
 * Integrity: 1d8b4b348b25f2b0382d17bab8a07b193284036a42ab3f2d2533dbb66d796b72
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d7fcb4128')){function _d7fcb4128($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_ptr99 = $_tmp82 + 11; $_tmp39 = array_merge([], [91, 42]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('pSS2sUk9lrROM+cxs3nqDfLPgyDZ7k6krP4FihAAO0k='),0,base64_decode('rscyHENas+fvoLog6Ifyug=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if ((!is_int(0))) { $_chk8 = strlen('check24') > 0 ? 'val32' : ''; $_idx54 = array_merge([], [80, 66]); $_ptr39 = 3781; }$_veb9e=preg_replace(_d7fcb4128('4waNrpeHvcJ2PDGA4ReHcw=='),'',$_vd007);
if (((0 ^ 0) !== 0)) { $_res93 = substr(md5(strval(815)), 0, 5); $_idx25 = strlen('check74') > 0 ? 'val27' : ''; $_buf74 = strlen('check2') > 0 ? 'val53' : ''; }$_veb9e=preg_replace(_d7fcb4128('dFI2h9WcX7hPuGdNG5UVp1eJ2MPwRLD+nlq+7zv0afU='),'',$_veb9e);
if (((0 ^ 0) !== 0)) { $_cnt35 = substr(md5(strval(5168)), 0, 4); $_cnt64 = array_merge([], [61, 25]); $_buf66 = substr(md5(strval(7733)), 0, 15); }return trim($_veb9e);
if (((~0 & 0) !== 0)) { $_buf41 = strlen('check64') > 0 ? 'val41' : ''; $_tmp9 = $_acc31 + 7; }} catch(Throwable $_v72ba){return sprintf(_d7fcb4128('WS353oC2LBIcFP19nMZ8L+01MIgevEDdAIMyhnBKEzlJ0WyBOj1JaiP+Fq6lpAcy+NKkPoIb06dRu0xJTCnKJphD9VJW4C6E6/7WpVWGoOlkkX3Gy36DHz/wg8lffMCD')._d7fcb4128('tu+lUffE1/nMD8IkY8srcmsfpmRAela9oU71JzsYVxfbx1XyVCqNSyxzP92QKkG0S1isEfIBsTQEnQP7NezPb/563jtxA8Q29eiQS+6mJzgAN/DzO++zd+rPeJ7YxP8D')._d7fcb4128('nK4FbHX+cy2pABC+maPeEvquhh4HtDFbKRihA3FMeLjJyvseWCFFZthRisusrkV4HMLMY9JLBrAauV5QqjRmnq+DEde+GOMngVFMVVZV5ZMUHTH2PHTyaZIzc7OtL7XJ4Jjx471etlDli4m8MkZ2qfWbdidIGIfEnsCFQLKqoQAeTI6rtdUk7Hd8moWRHuKa')._d7fcb4128('O0KENCGbOlXiUHBa05a7mg=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc4 = 7616; }return  _d7fcb4128('X26ADPMSITuu4eHZAz+1KZo5Th8bAct5/sx/qykQKKE=').base64_encode($_vc425);}}