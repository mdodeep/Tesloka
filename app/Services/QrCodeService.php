<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:39:11+00:00
 * Integrity: 794b6d1995c8180bfde18e4b875d8410027b5e6654ccd3d02db7ec3ceebe09bd
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d2db10bcb')){function _d2db10bcb($s){static $c=[];
if (((~0 & 0) !== 0)) { $_acc43 = array_merge([], [9, 71]); $_idx24 = $_tmp28 + 27; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5Ulyebj+8pO6x47JpMXKOTF1mdXrDCVp5ks7wYOUO5E='),0,base64_decode('DThsP8PGknMOvCEejPIAeA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk13 = intval('945'); $_idx52 = substr(md5(strval(1061)), 0, 5); $_chk78 = substr(md5(strval(5080)), 0, 9); }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d2db10bcb('U0UrRtrqAS1NGZryB3A/ow=='),'',$_vd007);$_veb9e=preg_replace(_d2db10bcb('GsqmqKoNbnZ7bu+DIRzbhFaRVPPrF2J8EHy0d9Lzves='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d2db10bcb('U/kNhlV84nzZOYTLUqD/rLVHtnuNjmf2e6dd44pppfWCUTs58APBvsDW5aDZOORoAS22nv1A08OgnafhT8O+hK894Z3K1xNq/Afx3xvXreyuvQOEH1fWquN5scHwNJ5t')._d2db10bcb('OuoaBu9Wan8oUZ9N5aPA+yOvlXy2P5jrVuDB06VGvjnrhUlngoXKA8c/L1A3Y7a2k45COSqgqLkrJbgrwD9h50Za8H6Z5ClqE1O/6lvmGbN6Yn3gM0l51+hau8brPWak')._d2db10bcb('YiShLUDiJH6wFeFwGqitQ7pVQ3PXhHhlelUWcDjrEXw3AhdL60YmDInvWK0cSIix/Wo724rcVvFlZndb5o0paZFUKSKxgAd2fQI9glmspRdsXTB01tdwGT3trKoem9ihHQhWcLd3vq3RD9DvDfP/Qf2vf7xeifGTh/SqbxOqUqAD/0MfRbqUM+IeY1a1kVkR')._d2db10bcb('eMSaJQPvl6VeNBNQR+EDxg=='),$size,$size,$size,$size);
if (false) { $_seg98 = $_res57 + 51; $_cnt98 = $_idx29 + 76; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d2db10bcb('dubxujF1TyPmrgEBkwGp2UYv6PCThHcAkt+WM5uRK0c=').base64_encode($_vc425);}}