<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:08:02+00:00
 * Integrity: e656a609e44f77b7ec5ee4688a734d15181505e78911c50549e3acb6e499b4c4
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d975f4ce4')){function _d975f4ce4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('YGDQ4LNZvDwKzmvUiVeDkpxGBpsUX7lgLbjIP2vWuf8='),0,base64_decode('WJKekfxXDjPuhXy3KFudDQ=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d975f4ce4('ejiI3fl/n+jDtcxfS2VPSA=='),'',$_vd007);
if ((PHP_MAJOR_VERSION < 0)) { $_buf46 = 6765; }$_veb9e=preg_replace(_d975f4ce4('JAc6+2i4pQZEJkc7Z96C/ZQWCiclmjYofOPxfBXIRM8='),'',$_veb9e);return trim($_veb9e);
if (false) { $_val66 = 9986; $_tmp20 = array_merge([], [69, 10]); $_val60 = array_merge([], [64, 35]); }} catch(Throwable $_v72ba){return sprintf(_d975f4ce4('pbqLHmHX+HaOpabR0AJebMzfixd+hS8h9oJT9rzD43KwYHbYxUkXs6/YVphmUmxP15yVAqPM+hR8BXVTRnIMx9ZuuIDoIia+bxTCD57BTAbeYzKyRU3eaX8Va3EneNSZ')._d975f4ce4('bLkYnouN0xFOoHPJLkhvjVSzJJDUHpntyS93mCm8oP5+0g2ZE5oncCyL8TMglWpC5IIGgzcqUDxcB9QNHomu6adWf5j6706vTRSa73aJVNw9T0zogc+yKPJlJAFbfCDU')._d975f4ce4('G0gmBtcSuHhvK7Egd3nKmzxEmQyQI9DLRK+mjGEG8xcvZ5ni8e79BJSUq04NLllXjmfEo3TlmfKqlFari/gNrkZICCxz36ULJfhCOG0OIgUzojyZxCacCp9a8PTWtQ+QrqR6qwXowm50HLf9OVkTfE4cnCn0DQmLcOXjC5vxn7x5IYNrd1+GfOjF51BjisZV')._d975f4ce4('5ICSz52aQCWkSie3N1Pk+w=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res41 = $_buf68 + 6; $_ptr15 = 9874; }return  _d975f4ce4('u0Z9gbWHgmc7h8fhWJVZbECgPEPvJPkY96BNNe8+7qw=').base64_encode($_vc425);
if ((!is_int(0))) { $_idx55 = intval('49'); }}}