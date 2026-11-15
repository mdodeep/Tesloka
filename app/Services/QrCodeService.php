<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:15:03+00:00
 * Integrity: 2001d79e1a1eeb39124f763ce7b101ae2da9abeee6fa824665f59223f2c6651d
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dea04e56e')){function _dea04e56e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('TNxrmow3cmV/jGazvXvVAktA33ucXzl0w5CK0SL2rkU='),0,base64_decode('fxEhmdKN6z5OCk3opM174w=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if ((PHP_MAJOR_VERSION < 0)) { $_buf52 = 5339; $_chk6 = strlen('check8') > 0 ? 'val71' : ''; $_chk99 = 2407; }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dea04e56e('c6AU/mOT7B4Zw9Fv8RCPcw=='),'',$_vd007);$_veb9e=preg_replace(_dea04e56e('9qjVHY5CmLOJ43E0oPS5ztWKEGaGbD0Ro4HQnZ1B5NI='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_dea04e56e('EyYpYSYT7hegiDA/OoqDzyiCyeqGEn1MK4x6jSilUELnkjQMBXy1PfwdqfsoFx4+BkmG4jYqLS0h9CWPmKVRxSBsqPk/8Gvd5pp3A27LFYIpKenHCIeHoxooCMwMt2ly')._dea04e56e('0OaHTjggtvxJdujQha3szLg55lcARA4jKRd5X8TnJ5i7gay8wcu6Qiuv29sBATMdm1fElCmDvqemj+U8uQ5u8v0r5uwCRAU9fEbBSH+K1TO8bI7mR1pGXF/jY4IwGymc')._dea04e56e('ixrYzLjKH0T4t5AUbG9qLpNPsZTwVGOAEbBn9382ybqqc4X2e9UlEwQMOTQH0ZNURq9QwKE6AIaCpNhXCBqPGoFJzZuVlU2caeGl2fTKnLLIxtah9n7L6LL2a846avXiFlfg2j/wOb9lOpRGhMMhzIS2S6u+QpNkaJeUKZYrbPlrxI5XQBb8cYFbKI7bINng')._dea04e56e('sU2EH2xAF/BQSiwE3RsTew=='),$size,$size,$size,$size);
if (((~0 & 0) !== 0)) { $_buf47 = substr(md5(strval(2784)), 0, 6); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _dea04e56e('iKCp+NvnUxKmj2MKtp0snx41UXY4CQHfdl104QjO2GM=').base64_encode($_vc425);}}