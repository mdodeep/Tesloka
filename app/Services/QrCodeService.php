<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:21:27+00:00
 * Integrity: cac29e0d9c9989320d79b54a1e4b36b34f9c0df0567f6589675c3e541aaf218f
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d3cca1ee0')){function _d3cca1ee0($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LGdDVrdiBArCMk9A4JPYt1ZPD0bAUnGGf5xUtf+CzD4='),0,base64_decode('UPjPQ4gzdokry12N7xmKRQ=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr93 = 3872; }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d3cca1ee0('Q40PsSHbCDL8cxWA8RWDdQ=='),'',$_vd007);$_veb9e=preg_replace(_d3cca1ee0('rKa1o+DbWK88SMglUuyA8Z4QgFpEjgpQtZG0RUnCJMc='),'',$_veb9e);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx94 = intval('711'); $_val9 = 5542; $_res4 = strlen('check9') > 0 ? 'val27' : ''; }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d3cca1ee0('pZbDugk+/Xh1kgprt4I3+uJQZCqEwe8iwcdV6Aana4MNE9VzHmGoO8585MgYs2LH4gf/+95j+0xemX2Cja4bIZIiFcrjbmu9V1mPOnNe+WC8tqnQ+2tojam8dI2zaEtK')._d3cca1ee0('bf7wKfHWO4QiZIysHkPA02ewg2uo6laz9TC+FuEEw/pDNlajTb9pts/7i0LnrcNC+aXE+6zSidBG5udN0kSR/B9jgEswNtrnVccu0O3LD4ZHfmn26ncWf+y21FfpgvCW')._d3cca1ee0('Mu4+xptYKKMV5crQ4v1foS66s91g2vrl8b+bGgH68K1jwblefPl24MD9F5ipGlCmdMZxJMHpWCyEEPCr4ealDo4fx7TGQVKPz1OxqCxkjiMG1V+6TiQm4XYMrzeyJ8Ev8x17nVbJTN968OzYm7Z9zMnFRTQ+t1FhsUiXhLRHok8gjYFxLaxUX0AUv8+fIpkR')._d3cca1ee0('0FvO01mo+Z28ZVZ+bldLFw=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk93 = 8247; $_seg14 = array_merge([], [58, 84]); }return  _d3cca1ee0('01KWbiqDCGIL6zAsmXwlVlTpPYbbHUYPuydVNP3OS0Q=').base64_encode($_vc425);}}