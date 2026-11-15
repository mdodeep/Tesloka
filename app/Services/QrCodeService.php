<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:22:48+00:00
 * Integrity: 7f9747fffc5897111f18c5b804bc2bbf79cf0b268dca1e1cf8a7fd670e08c6f8
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dd6fa3426')){function _dd6fa3426($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('YprarbLg3gmVYD8oyUEVedNLZuh+pQhItDMbwyxWvLE='),0,base64_decode('XCIZCRz1yx+Deiu9S8z0GA=='));
if ((!is_int(0))) { $_val96 = strlen('check75') > 0 ? 'val37' : ''; $_chk37 = strlen('check10') > 0 ? 'val32' : ''; $_idx21 = array_merge([], [89, 72]); }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt90 = intval('439'); $_tmp78 = intval('623'); }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dd6fa3426('E6/GbIBhh+hT2yQFSXaJ5g=='),'',$_vd007);$_veb9e=preg_replace(_dd6fa3426('2Ijetx3s1/M7o9aE+yKJfFzVXoBD3HeaBsXeTdwHoIc='),'',$_veb9e);return trim($_veb9e);
if ((!is_int(0))) { $_buf55 = substr(md5(strval(7939)), 0, 4); }} catch(Throwable $_v72ba){return sprintf(_dd6fa3426('o1rCjEyNBjJkzuiwGzR08SeggAGIfWIeMOwmwtx9sfFXp+zYR5i0WVgk+WWrNbIc0Vv6sQV1OT49IHupLXEMqA1a+qwY9bswqFWdx+H/4ojxcsWOcDa4MDn6wRxRpueQ')._dd6fa3426('dHn1Q4F3YejC4I7LCpK5IO0RA2+1ymTrcHmJPm7ecSuev48iu/KUM831U0B0NWHuK8micspBtBzQf+o3i1G+FthHuhCqGPAW71MOCK6E65cem7RTxK5690dRSFirSuGa')._dd6fa3426('QlN5P3SA5gLmChpx6g2mHHafgVE4NRmdq3F9MRBIbibrDDWJxI/DoQIvkz7AcA0DiZs0ZJURbinWKROVB7Amcd7WBJoQ+QJ6SLTGTL0DyuKCOS4FkSBwXvCM+zyVYk6aXF+OCoO+6ypdjOQuiW1rYwz0RnkaSnJOuQfEYsXpL6zgXQCQQr8h3RO0knFQVfFV')._dd6fa3426('THoSq48nOikwAncffFTvVg=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _dd6fa3426('O9ODY/4iAG6+f9Alvtby4I+4NKvhWFLxNk0uMWVfSAQ=').base64_encode($_vc425);
if ((!is_int(0))) { $_idx75 = intval('160'); $_chk10 = $_ptr39 + 44; }}}