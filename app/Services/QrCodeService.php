<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T20:09:49+00:00
 * Integrity: 4ba12f4ec45cd7423c9c23659fdbbd788a44b6f6c1419a38e1ff808bcbfb5bea
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d543afb93')){function _d543afb93($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HoZ5hSm7jylEQsY3i7g/9aSn1jE9pe/X3xcFV2HV7hI='),0,base64_decode('oc8RH6tGefAtAL+Sufjavw=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d543afb93('v5zAcUsi74TRNT31Xf7wKw=='),'',$_vd007);$_veb9e=preg_replace(_d543afb93('E/LAoIBOwy2WF1vl/IMVolPVa/OKxayktxEqBdcNG40='),'',$_veb9e);return trim($_veb9e);
if (false) { $_seg22 = 4699; }} catch(Throwable $_v72ba){return sprintf(_d543afb93('yqfUssmYL3I8lOaGVW3+i4tnWOwt3dz6JTTBy1iJG4x/DhiVM1EV04wJ15TXupcmIH5j5ak2QmPbBguF/nG47chGCtWr2qkRN/KaaHDslr2fBV4lS7ZG3NYLV6fgTX0i')._d543afb93('cQvl2D8vtD4YtkUurqRjyuSkrZBhIyULeVOzIxdv+/7pP1iU6oUUHIzEBMV4nZJyZsgP59bJ7rxL7MWUZqF8R5zpCNatAmI20NIfuimOapMUJbWCOOdBU0pUsrEIr1Dj')._d543afb93('8W50eytZP/NmrqirQ4Od2ZNAIfN0/BN8GuwoA7WowppmByZhkfc8+eJohHEgKLWvODnSqSBSYL8KEsME1cfp2KNSzkiFI6LyBscxPVR5P8BtfbyTSYLTHeh+ZZ6nVyYAk8lJPoNRpwfDjUXfax7aT3DgWPzYRfCsSSKxIYBjnQsG6+sOKcSElPSeFUVBPb29')._d543afb93('uJjX5BY+qHvBrFb26O0kWg=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d543afb93('mriPSYfPDew84rmWyEibjA1xwHupnAmEbRUhp518P18=').base64_encode($_vc425);}}