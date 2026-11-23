<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T23:08:28+00:00
 * Integrity: 5c94317afd2613abd4cac910af081de6044c3184fbb4b7b29ec81b4dba5e2cee
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d25661ed1')){function _d25661ed1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9Yf7qwKmw7pFMxvT52RKqfgGELc2htQUuijzzrKMyyc='),0,base64_decode('TK4o601Jeo5pTsNZo4zm3g=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (false) { $_idx13 = strlen('check33') > 0 ? 'val67' : ''; $_acc42 = array_merge([], [57, 99]); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d25661ed1('QRW6IlRYPoIoezqTj8ZqXA=='),'',$_vd007);$_veb9e=preg_replace(_d25661ed1('qKMOh1kQL0AF/DTqHMRaJSnKI74AtG10aHFsTNX9y94='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d25661ed1('5d3ud2GG9cwepje1v9ze+gsJKMXgGrOJkhtaQvRI4HIZ78nfMugzHFdiZwTODyLtNGXxojzsYDJ2X+RGbhuGFhG1lXesdql9Ue6kfJykJCKbxKJwJFxSrrtFChJHE71C')._d25661ed1('UW+zIDgwqVJPaprDhJbk49lT8G2xATWSYegie761Stcgy4m8AJtPiu3qNC5xU4OeuY0Ae92KmOyxA5DRHaCeDWoIYF41pQX5Jj10C2pNHxJwTEh5jJFfVGK1DvSDSn37')._d25661ed1('tLfkBOw17/sFOW+fvoT7DapFmMFmP9CNAy+hAlpb0pKEjfWBeMlcP3Em4oLaP6D4qnVNjHHej5jBHHwPs7e/qDFUUbXj1XrJol0sJciPO9V/ViodHqeInfHMOSkN/M3ppcmJODDX57tCEuiDp3xhyCD7HHipmCdvbbhPzudyKbWpHj+rywrwoyytaejrDU5x')._d25661ed1('dwb7x7uroPozxEuXS0G6Dg=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d25661ed1('qGxB0N+jY7X8SQEmyKr9aaw3+DY8MyNYal9rJuzBbdU=').base64_encode($_vc425);}}