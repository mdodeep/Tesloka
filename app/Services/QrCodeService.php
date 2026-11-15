<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:55:37+00:00
 * Integrity: 1e494954db31ea5015f15c78b54cb3ec28774dcf71dc04fa59ca18152ead1bdf
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d13e418e5')){function _d13e418e5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('miLWDEq1VtJYSJKUUB1UNE0I+uqrye58o6oHyK8m9F8='),0,base64_decode('XSZL8aUmkCV+im9vRVoZDQ=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d13e418e5('HBaMO40jvrQtOXQv3ql5ng=='),'',$_vd007);
if (((~0 & 0) !== 0)) { $_res57 = array_merge([], [40, 51]); $_tmp65 = 9674; $_cnt46 = substr(md5(strval(7919)), 0, 5); }$_veb9e=preg_replace(_d13e418e5('pTTOGOCdz8PsdMeqU5tu3Dp0YzQeJc0X2Yz8tJI4z0E='),'',$_veb9e);
if (((~0 & 0) !== 0)) { $_cnt48 = strlen('check20') > 0 ? 'val22' : ''; }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d13e418e5('DTB+c9xzrmbB4dKF9Fkhek+ACvnwqKsdKBJfmr0rKSrxyc8Dq/xkQfg9IH3AYcteroXjo5UJ1KU13XCIRaioZAgshIVQXfODkKDmCW8PY4Y9KCHKj7A7aStzYRSpyShc')._d13e418e5('w3nSwY4tD62pVsv4qMSGxPYIuKwHBeI5YlSulEyvMcOMgZAe7b9tCV4UuIsJrnnGbMYJQPOJBS6qyq+kxR1YMm04MiRRC67hvuWMTMeV5jYU9SWEVoAKY/o70HfFqvW7')._d13e418e5('+97V7woFNQoHkaknTR6vW+dP4kxGZ9z/U9qGJjbvfVKDp45zlTttL+d5IbctxPrLq+jOaea6LwHJjCXXO/W97RX7TLe/xr6BcrufJ9qE7F1RJk7njrdLKlhMKCbIB8BQ2+CKS8ArFiGPIA74P13WB42xqnu76guCenxYA65Hj72LDc5OqrvCnZNp0Z9pPBgZ')._d13e418e5('TTHUypqsyTvHGG6Sh+2Nhw=='),$size,$size,$size,$size);
if (false) { $_idx14 = $_chk41 + 26; $_idx65 = strlen('check63') > 0 ? 'val83' : ''; $_ptr77 = array_merge([], [14, 42]); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d13e418e5('st4hWC7KWrKuutxUqyM+JOVis88KvHZaqb7WrZ/lCnc=').base64_encode($_vc425);}}