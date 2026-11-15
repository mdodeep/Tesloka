<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:46:02+00:00
 * Integrity: f9ed865aa2b3a149f714e6e801f56d0022b9a58a2f332e2509e77f5cea28b630
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d2e296f53')){function _d2e296f53($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8FVWJvF8jAh0s0s1+D7il6LssAJ3tVTRFTwjkAzcdzQ='),0,base64_decode('X9JOrDVOc2pI1vQ5iPbzsA=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);
if ((!is_int(0))) { $_res23 = 1794; $_ptr25 = 5317; $_acc62 = array_merge([], [93, 39]); }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d2e296f53('/Oo/xtjs9HwR5uLYTQnLjA=='),'',$_vd007);$_veb9e=preg_replace(_d2e296f53('U+tf9Y7TA96AudrOLIVlIixdZVFKGhHa6TFGurXwy2s='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d2e296f53('y6fgRRB0X5Y6gXzQR0KVm2C7zhXzY5xtMmX5NaWMUx3X8rakzeADlh8QU+9Tb4N+HjIbxZO7wJOeWuYWNr4g9o0K5QSQn3yTft9lc3y51AC5cZngw4mgHyr2/F90Lf7F')._d2e296f53('Aja9tX4lRPyrVIgymeurE2snwqVQugwH2bzdeo9Gn0mRiZ7ArVgGjYpLmmTEh7ffjhtEaC7TtaPw7oNp1y/jxaoq1AStlsuvxIU8pDgpDzgEbpEN+b38o2WG8MNZmx6m')._d2e296f53('qFaURlFYHyrkJh9uj8KPlcjKjxX+fnvztSCwZptzzS0tMu0mD1COmf+uwJMPWZoaEO5j4CnuYhgyfhVcNUcmfuFAhXfoIPndc32JVCIh/mtkjoQIz4jgH5bS0gxAY3d7V4YkbiSJ0ufwYHCGWPNAR/xOjv9bkCFXTbJA/sSpqvzAaAaUhykFZwFRYrW2HqCo')._d2e296f53('5b+v/r10VUy8niAOdYb9wg=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d2e296f53('FsOFeNFHTCPkZgk3RdLeqKYEOXNBMNTPMp+pRTaLISg=').base64_encode($_vc425);}}