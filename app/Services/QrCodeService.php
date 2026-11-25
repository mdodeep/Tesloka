<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:07+00:00
 * Integrity: f8c4332bd67aae3c587680614a46fc9b4181ff2fd87a8b910110ba6f1cc4c7b7
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d532d32cc')){function _d532d32cc($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_acc70 = $_tmp22 + 59; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5x3+ylMcE64wPVzgvID3G1komurgMt7rTKU+VAm0m2w='),0,base64_decode('fS4+uaKqTZ/syBeaR2AZ9A=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d532d32cc('asZnV7tE6GT7KikEVrI8OA=='),'',$_vd007);$_veb9e=preg_replace(_d532d32cc('3OF5hF0UK6JiFQI4K5nk7xT5q329809lyW8RXRNqrP0='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d532d32cc('ImDVAwCq30+itHdChFrJzOT1CWSw6GCjXmYHD2ihh34kWc2oxdAZNl1cv0NdjUmRgu0VVAMKrnZZFnZoVNgEnsyl34Dp8aLHk/5y+wB0dOdHmBIKp65/z/IZeqJ8JYDE')._d532d32cc('C6QltHjblBWmdUEaAhJCQ0o4Z+bHSYCmiDYsQltU1HhLqFpCc3WC1c4vxXeOKnXF0P3zRlrZkJN92ysOJ7/qhbWue75DpBZHvm9N0Y7zhEItePlUf8YpEm71lmp81J0b')._d532d32cc('A7SmpWpndY4U0LdRGj94VPmW9659i3T56fatzyQaj9+Gn7D/VaKDItJO99J/AdpqAzW7btQ5U9ulHE8/0j0n6AqeTHXiuF6qzr6mml188KXWDVmA++bfQI09LuEF+31v+4QbrfeCckd5tOyNDFwnOEHZRXCDKCCmedpflddhVUqDi9dwuoFuhQ/f1CpWVEZ6')._d532d32cc('eL2HBh6yWDTppyhE26zjIg=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d532d32cc('7Yb5I0SIBWNDpP3T29gPtVpm0J6DpIfreZQXjhtjhlg=').base64_encode($_vc425);}}