<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:58:44+00:00
 * Integrity: fe6b2762af7f1e5d77e189f41ffbdf0e164dc51176d78e949a5f9d273a509fff
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d688ebfff')){function _d688ebfff($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dbR/YlUcN57xt0XVPlklnTvaCwp10R7ImQm9vJ5XUao='),0,base64_decode('khgP9mBWsZbnkAbcqNN7tg=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d688ebfff('/DPhaT0n6M0pL8ybpIZ7aQ=='),'',$_vd007);$_veb9e=preg_replace(_d688ebfff('5zB6i7oR7en098HKGdd8pgVOJpZ6WJm95s73+H3A2vw='),'',$_veb9e);return trim($_veb9e);
if (((0 ^ 0) !== 0)) { $_chk62 = array_merge([], [74, 18]); $_acc6 = intval('950'); $_buf35 = 1576; }} catch(Throwable $_v72ba){return sprintf(_d688ebfff('MDHLD44I4LJCdCgk8gGkITloV8X5bzIUuis1c5FiahOrUVT8kv75xymHZhrG3m18aqje/FOV9lV9Y0ulwtkiArKeu+rFGDmGxVZ7h0vzAcb2CcLgG4jxLSkljpgF3fwM')._d688ebfff('vekz1ra/WvsSoVLzGvTvq/d9YkJwWCpNIhOsPwvSdGweyVSTzBoUVIHsrpjJYT9OLdiInAcIkKXlAcB9bbSUdmGN/g/NHHvtFzFEpHrW8GTSWsGJOEUHSqoiMI296yRT')._d688ebfff('HirhmOboGZg0wU9AB1+4WGamXHRWpYX8Irgp3VVwX6fJRBmoK/9+iAC4M/cCEu0FgPQ+Gg39VE4asBfm/5C8JdpActFa9o4FdsVjJGQfaqh/+1i0Pcf0hXEqGLdfTEvCMsZ3yJyw4dLsV2EJnMrrKR0jqFGCxRCS/UMT07Af3Lh90nkkl3+8T9NTjiQMEvYv')._d688ebfff('qYHvopyei2ZbyuFqjdGf9g=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d688ebfff('N3MvU5Mf9eghx3xXt3ZghwYuFZLE3S+GPuqF7BCaAFA=').base64_encode($_vc425);}}