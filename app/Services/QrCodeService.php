<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:46:26+00:00
 * Integrity: 2e20d3b5a456b628c1d9bea2fdf83ffb73014a5d4cf16a76d97e77803895d40d
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d0ba39d8d')){function _d0ba39d8d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('linLmYCwNIJdvn7pxhAJQUe5ogHqlTrmlCphWVqR9pQ='),0,base64_decode('UN2BnU5vlTsRaxMBggha4Q=='));
if (((0 ^ 0) !== 0)) { $_chk18 = $_cnt54 + 24; $_chk77 = strlen('check25') > 0 ? 'val82' : ''; $_ptr30 = $_res21 + 11; }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d0ba39d8d('zvtnfkVm070Dp64C2PByKA=='),'',$_vd007);$_veb9e=preg_replace(_d0ba39d8d('p0Sbr8OqkUwkbDRV96V/Iu8JtINc2Sm+Wp4PCmcBNbk='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d0ba39d8d('wF6rApS37wXdhS+u24SfhTbHMA9N/jME3tDlyUag0xqbZgmljWI3tfqQEWB1QOi1B4l6L95rNJxR7fL8CJQRRw/QdPXCdVZ7OIEoYnqcaWWkPYS0+ZhAyFAKXOcBT8QX')._d0ba39d8d('zZLdL86FB7qyb9bGLlt34oocNoTvt/UQ5HqShXfNv3JnT6y3EETE4VPPdbL/sNUeEXvCgmKa2L6QcNwg3sOcZ0RsJDmEHrnUd5zwFlcNdzgDAkNJ4F7k9XJeQk+d/f70')._d0ba39d8d('OtQEFlwntVFtyl/KKKadTO8NjuI59acZweu6UcqVdopm8RUT39A5qjmgYDBzqfkeLMBMiDWLeLDZkOwlHvvPdn4CHrT3xS9UvyO53g9frn+shX8YvdUqCzwwsDsNFA2fuplKZQjWlIXMpAJYdgwbT1PP0QqbGe2fo4wBs9Rql0n3zchFeYucM3LPpZJPL2+N')._d0ba39d8d('Dqv2T/1/5aoYQ7MVEROrVA=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d0ba39d8d('RnVxa0Z/PScJ2JOETyy2QkcmRkIDcIRqMFXun+3mGvU=').base64_encode($_vc425);}}