<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:44:39+00:00
 * Integrity: e3e930e84d69e4e551158d8bff0589806df09b46df84f244df75a1f61989a560
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d305bfd38')){function _d305bfd38($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Ab9ecUxGZ6QwtOPfiYbMar83dp6JVA8Eu0HUHwPehEE='),0,base64_decode('PI/R1Jop/FwA0LMlZaQGvw=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((0 ^ 0) !== 0)) { $_buf74 = 2976; $_val28 = array_merge([], [34, 77]); $_cnt44 = array_merge([], [62, 32]); }$_v79a2=new Writer($_ve28f);
if (((0 ^ 0) !== 0)) { $_acc19 = array_merge([], [26, 49]); $_ptr31 = 7161; }$_vd007=$_v79a2->writeString($data);
if (((0 ^ 0) !== 0)) { $_res68 = $_val8 + 66; $_idx20 = 1621; }$_veb9e=preg_replace(_d305bfd38('qI3bx+VPsta6cuuI7YWWag=='),'',$_vd007);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk88 = $_res55 + 30; }$_veb9e=preg_replace(_d305bfd38('C4FhNDI4hwvP8aBLXsv/qJnzae+4DOxYW+af3GBftqk='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d305bfd38('fvw0+yhbCV5IGUlNexnrF5YWtonzPFOPuZyMAqpfcIgYp5q2GS2oR/uTmxZzrE3HGxKvTawbC8FQ4P244ey1FMaNl7LJNoWd6uFO91ED5rpKKhhkBfL45C+BbL8bJoL2')._d305bfd38('61ApkG5CbwscsjfPxdlONmvVY/Evdv3QnGOXMh3dkJRmx5+1e1vavkG+n/imscKI3eU4VBetPi1YT3W4SmLh6YbEXcg6LiII5zcVV85Yq3foZ8wryp/Q3Nb41GyycBFV')._d305bfd38('9q1Zskq3aiGhwaydWkBYCvwBkS/66fjBycTcALNI8Rb87ZfkPTXU2CiXuZ9pHZ/Fnihc1+mhhhGzFt2NR8EfKymBG3+LZTk3FE0TWgh6JVQWxlUOH663IPBGI+Em2qkRwmaps9PfceCtDbkLu+/MUWud5YYlSif+94EoOw5N4DHPDATPQe77npP8oxPKQqeZ')._d305bfd38('jysbVNXGBYXLepgSEtkiuQ=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if ((!is_int(0))) { $_cnt8 = strlen('check58') > 0 ? 'val27' : ''; $_val10 = $_acc40 + 89; }return  _d305bfd38('ETslOjzwkZrJ9cerM0elmXTyCE4ppTc6RvXFmw/MCOc=').base64_encode($_vc425);}}