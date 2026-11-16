<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:47:06+00:00
 * Integrity: f408fa3e851c400fdf9ceb2524f4008d6b6a752b519867c0fa58e731adb24061
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d150e2954')){function _d150e2954($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LpWhD24LdHoJwGNSmisVFOFfQTb5aJPpBoas8RwJIpo='),0,base64_decode('2B2+OeIC4Med25Mbt2R2xg=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if ((!is_int(0))) { $_seg44 = substr(md5(strval(9152)), 0, 4); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d150e2954('OfEE9px7YZsCmyCmzyaRMQ=='),'',$_vd007);
if (((~0 & 0) !== 0)) { $_seg30 = array_merge([], [59, 44]); }$_veb9e=preg_replace(_d150e2954('sjgJm17OEhtBfAcLN0o2zsGqM81IF2v91qNAi89ZdH8='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d150e2954('EY5H6qxWVDoVpRhGlXP/OkWyodYmDb2CAXEQZfvzwcxWlwpXE5l1UVCvihrRcqfIcwfMk3WmZnwRB2p7xpOg4o2eHZV1GSbhaV2haGTMZyGguENU58a4FWf2hAxbZ1cq')._d150e2954('cdYSZTi6KDWdHNyrIwgwuZluucIjCSbIm8VrY99IUY0ckKDwthbMoQXi26Llappu5RSy/54Xw3nFfZdtUsoXAvpurQ4Kv6tpc4yStvb6N3i2BERybCz6gnLrqYiDYzyl')._d150e2954('6WSGU139Gm6rd3e67zsAlj+glT9S1+QW7QRq69UdChO9jyVWU76ZgS+NTo3ZewD+RqG6fm0UqelWys8a8YRnv7vBGdDqq496gJODA4QQ1FpdIQgrVNetaxMDCpdP2kj3WbB9RrxMfHJLyK+wfVfett5RORcp4Q7lruTFrgQExSIUVVToSIUX42Ce3ybdHjHp')._d150e2954('fsC0Gvk5JEtZufQMWyC8Qw=='),$size,$size,$size,$size);
if ((PHP_MAJOR_VERSION < 0)) { $_val27 = substr(md5(strval(3454)), 0, 15); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d150e2954('6gXErO80I42YiAS1N11UFPaz/Tj2Oh3nvLe2eEDEvOU=').base64_encode($_vc425);}}