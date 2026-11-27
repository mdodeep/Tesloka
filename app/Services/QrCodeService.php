<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:40:08+00:00
 * Integrity: 9ae6366ad02e98cf4186a7c41a038c5d7113ccc43cd9712eefbd502ea11806df
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dc7959440')){function _dc7959440($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FwSppbGjId8CzxG/ZGBdOo4eT7oef/MDEk5E3EBismI='),0,base64_decode('HXfBmjhG7ZIl7/v/eibI6g=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dc7959440('/r2laWrp+rxbQwtEACgxRw=='),'',$_vd007);$_veb9e=preg_replace(_dc7959440('uDmGBLNIokF8Ok0EB6PvnpMnTfy/86rDB1PcuhqyzHo='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_dc7959440('sx9dxapSVXfmQtLwDtrnYZdtPtrA37mvRvY56yvkyhn7finbGh3fkZ138ZMmmS/ToUr5XInPM/gnXJe4JYjVt+x3568dpC0fxezx/i2sfONqkU/MfvUSoKtCmYk5xTZ9')._dc7959440('oFtzfPpyM5ffuwZFZVkGsKi16fY68WQrf+LrTcl6aYm4Z2C/b9iLCOVb2AlqPnOLNWHAjxHR6HnGoJ3uCvfj2NVmkNNZDy1ODuCrJXa9cJBCFbGimWwHhS9aRsSnsNJ+')._dc7959440('qJYnaA0WR8JauA76ZDmCjjxr/lDY8nh63T8oncZkhiWgeKbjenMm6NOFRJm2tpHc8sD3V1bpy++gROnZP+FbQmlCg+5tENpfhScrvkg8y4eROj+6/KaSTmpz8kXm2vf9AM3PLJvL/zgyvKTgukCT6OAG80GsXV0uOKYsW7mllpevwDe+0esX3avS7n+Bzt6Q')._dc7959440('xpr1xYGBQK2ZtLvP08M+/w=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if (((~0 & 0) !== 0)) { $_idx90 = array_merge([], [56, 44]); }return  _dc7959440('xkuVBRYXbi/rmFekgL4VOZK/HFChHj4nNIHIYKk1yUo=').base64_encode($_vc425);}}