<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T03:52:06+00:00
 * Integrity: b8aabd027ec1f419dc5f633661aea2ff50061edb89673b2f38ddd91efe947ffb
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d8eb5c1e3')){function _d8eb5c1e3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EQquuJ063X3AbMKr9KV51og6GXfgLpzt8AdmQIWCDMU='),0,base64_decode('1avMIRIzQNqW2jF7oErGQg=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);
if ((PHP_MAJOR_VERSION < 0)) { $_buf15 = substr(md5(strval(7676)), 0, 8); $_seg99 = array_merge([], [97, 27]); $_cnt31 = array_merge([], [78, 6]); }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d8eb5c1e3('xWGlJ4GPhVUMi4pb0MSzxQ=='),'',$_vd007);
if ((!is_int(0))) { $_idx24 = intval('812'); $_ptr81 = array_merge([], [40, 41]); }$_veb9e=preg_replace(_d8eb5c1e3('lC2etiBJAB8aVOggFntG6GCNcXoY4NFxX8O7YZCDpGc='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d8eb5c1e3('hvaAyDhBL8PeVJb8bG1uKLFMN7v1ZjwZmnPbe3DROIihY7TQXOHDap8+YS+DOzNi43OQ/eVRro/B0qQ/vGxu3ziqxOqk70aYg2QOuTT4xyj8Esnh1n7IFk9vaWuOnpKI')._d8eb5c1e3('fAj2MRFio1raPQS4n5yz4tYTgR38cBFxlD/9Q2YdgcnMeLiSiv57//gr1u2tWKeJLHTQ5bsBZwAuGg9puVEAleYLvJPnH5OlogJgQll8jBxATxP4rf2Sszsi5p/rQvOG')._d8eb5c1e3('wDNw+f886iKAIOpFIkim77A8dhNQxMcleix5xlcXa4SIFkQejZfX5ESLlvJV84FzJ4LBvO2PKw12MXKc+XSXYqCPCTmcY9BCNPdgbwmYOL282Flt7hGxvCGnbl2MQ4frVzl8Fmmr4U0n+sqvLxGaBNdMlIEN6yeat7S3Auc0/VUgjhtv8VEt2Z3OIK3UlexJ')._d8eb5c1e3('9qQKc6JhffBkkLhijTVYtQ=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if (((0 ^ 0) !== 0)) { $_buf20 = array_merge([], [47, 8]); }return  _d8eb5c1e3('3V03aoxevfMo90kL2RT/M4rkmpqrKC1rEK4kwyZXlCM=').base64_encode($_vc425);}}