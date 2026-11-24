<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T17:19:43+00:00
 * Integrity: 0d0cfd963188e6f69ffd905d89a5782ff39994ec6201c2e3f6f03d5bb51ed515
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d2410508f')){function _d2410508f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('D05/qnrI6nq2L4zGD3PYK8QDr27+IJAizWmx1gCT0Qc='),0,base64_decode('ezgfEBCblmUPNUefSbU1ew=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d2410508f('GJK9GNQJSoVkZVgpQDf92w=='),'',$_vd007);$_veb9e=preg_replace(_d2410508f('x21zRndgWDvq/D4vby1aQ632T4TZ6n0C8uirA87vMIs='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d2410508f('pRxieQE3Hs2gnVQGWvWI9Mm7U+kVDcyUl61cdbOWFFWMuIgo+QlZa0aPmUIUAATGYApiRsKKLMICWozzd7WgMqIYreuWMRzRRqKQdAniQDXQAMtoyVWfr1qA54PdF8db')._d2410508f('ZKNlCM09iMRWgHswaTitZ3WB5KXyqNCiKrSR9S8v94x9pdGVArIEJuu9tvb6HG5XuEZFBopEIQIIOJTVYF02gNuhahKkp1Ol8+TBlzdwn5RCUXCxNa2FMNJVf1ddS+Vx')._d2410508f('1FLBKcxajc0gedkmKXtVSQEsKv6wGxX7lPU835xXy5yn75Q4V8SkPiW/vsUZp9skIIb7CQUgFkz5gx8fdu+4d40qJMaSEeog2fNDRkMheV8oKcvGPliXzf/61Ic0hwRKhotM97z7dJg6Ir+9JIy6S2QMoft+bJ1cMOqKGVkaCk4WNlvRCeLa4V3Ack555hxz')._d2410508f('H3xDa9TdbJTbOHsYopuPeA=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d2410508f('LhZrSdz3tv1RAMIrixEIWKarQRWuqK/Ao3doqdEiGoM=').base64_encode($_vc425);
if ((PHP_MAJOR_VERSION < 0)) { $_idx41 = substr(md5(strval(4040)), 0, 6); $_res46 = $_buf14 + 42; $_res93 = intval('143'); }}}