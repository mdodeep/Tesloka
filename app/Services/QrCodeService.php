<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T22:15:49+00:00
 * Integrity: 47d77785b7693bde6cba101c75e2ba7d523281db8c0cc0ae672ba68f3781cb9f
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_daf93b40d')){function _daf93b40d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BZJc1n2fDVDRU8Ksb7pjsQS7ZWOGID/iOaBkd6K4y74='),0,base64_decode('i0r2B9c+jmVpqNsQoLPgaw=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_daf93b40d('2OZnEReh/wtDdRWbFWrBEg=='),'',$_vd007);$_veb9e=preg_replace(_daf93b40d('iQ+udEDnR0DGnw9okhWXcnJf9l4pQvxqt4W5KHGJuZQ='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_daf93b40d('JmrZq2SB14044lkqfRNT8jgXHlKWWTcLaizxTA2Sj8mM+ozlAhK0dkTGc1X3CAyxzo+Y5Uo4QZz+nK5IUlf+vlBYkZSnTYmP5QjILqE6cQZwEe6k794kKSjL9bX4Sfcw')._daf93b40d('JHSiwsKRWYuzq15NIm+rGiiRs9hur3JPM/h0Own05sVFQg01RYA7gP3pdLWTI/+j1uBbXONqXRAwp3RMN1cBelsNapURk4EpDVAwCvBn9scX3bGrmq+6zKakpsDIKumM')._daf93b40d('+FmRi1yeCATJAZfuyyUXPYGhkLOtc0WQr+xh5vJLwuhMetVr3TCdlK7g06Ao0QvohTwJo8bEsIdy/Dw4WnuzQg7DlDWL4w2ABs/NEr5LO2P//SSs/+Hyw7LPCGFTyzzN6IrykWwC/l7XitT0oA8bS8qz8kIqKr1sAUSKmZmDIcTb0mMhd4xVQqdd9Kd/EquF')._daf93b40d('r14dS8JX1ooL8KQTlRdVmA=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _daf93b40d('QPMXz+2Oyh2cHULBaOanCBuF8MzD3yI4pWzNeWB/+Sw=').base64_encode($_vc425);}}