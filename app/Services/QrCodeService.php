<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:23:50+00:00
 * Integrity: 94678863c2316a2322cb71605b78fc005ea68d15b429edbc0deb4840d61a7a9b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d3a07825c')){function _d3a07825c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5cbYZlrOeju7OugAD9GlkSGU2aUi6piv4voIis0w204='),0,base64_decode('YvM/t2oG8bQLAkk2zDcpGA=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if (((~0 & 0) !== 0)) { $_val16 = strlen('check27') > 0 ? 'val55' : ''; }$_veb9e=preg_replace(_d3a07825c('hkE1vrYNYl6Xkgrx7PP6ew=='),'',$_vd007);
if ((PHP_MAJOR_VERSION < 0)) { $_acc28 = strlen('check20') > 0 ? 'val59' : ''; }$_veb9e=preg_replace(_d3a07825c('G6Yxj24NSFWvKa7pBM2WK0eCsbl8ATzQCd+7+5Bc60Q='),'',$_veb9e);
if (false) { $_ptr37 = $_chk22 + 30; }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d3a07825c('Q3gN/x0+D15bs9kxrSXfmv+kH8/jEVnajLR0wfoIjWbP5Wbl8Ahyn6/+n2R2zCNUr1tAmCJv1XrnGtlfJgtu3J0cKEEeK3U03VFQUBe1sNfTmGSfEKmiUjER1j/x9UQd')._d3a07825c('iq0TSrTBJq3yESJFxG/dQUmqkVzMTAOrDSCScThwHyELChFD52pcMWoIXF9RQHkJ2v9iHoY5vjXzxQm+Op4FgbDBt6TVWd32bkOWwdldYIr6Pzt6FDM7QdipwmSj9Ok1')._d3a07825c('J8poUG4WwhW/ObJ+iyQ/CgoX5Y3Y/Ic7xIUaBL0R8khmDfRSS7UCzbnjXUwiKb+iyRx3nO+xPc95vumyn6Ny7Y0wsjwNeJ+Cc711Wnpl2epc8Qa3EQRg7AVL63Iw/z86WkUaDxoKjDGFXISx60jShAlSGSb+5koqCduQl2+aQbY/Y5t3IIwrZvr8y445+p3p')._d3a07825c('N+3qB9J2b1ErWq5OG4EjYQ=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d3a07825c('8ahmf9O+vw4Fsyxp8vv1drQJr5j+Wmmn7Ql9l9CmZio=').base64_encode($_vc425);}}