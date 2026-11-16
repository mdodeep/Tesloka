<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T07:59:37+00:00
 * Integrity: c635bcfb7442de6e654a0ea961cef649d138320aa02c080e7a6c08c6bda193cc
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d6f4618db')){function _d6f4618db($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('52xRghma/roa+Yj9OQ0MxH7OqcaNuw8OYUYhQGgLer0='),0,base64_decode('pimDhKJINnwSLJvTfC1eIA=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d6f4618db('mXQl0SGtuPQr3e8JeDkwPA=='),'',$_vd007);$_veb9e=preg_replace(_d6f4618db('L2MR2YnjxTF2tvmCbrC08hmsxmkzTMAK5hkBW/n41NY='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d6f4618db('2LCwpiyAICD97UTBcmSR4DuI6pdG6T5ZoSbJbJd1oPTvE4oGeOczluWKWegCFLuOEl1Rr7lF17TuJtLgH0NmNVCJpnqbt3g7Rm1SfZivunaCzB9PvISCvZVBi2FrC5y+')._d6f4618db('yVndpF/saqwnL1aaN285cK7YJARCQEe8UxraP3MjVyVhvlcELsTVoydCjS+VJnXY80uKPO0+fSGdW9JryL9X/MWvMTw8UpT8edbPzyQdcu8jI/fsGc5oi1O+25Eqr9Kp')._d6f4618db('lnz4/hLDS0Hgvtfu35U73VmrYpPK8jLo4ba0Slea4IzlFnLD1OSP27QaJQnJMJ/Npl1I4iOTIgLZxoltIOwE/hMKRsKFlhzMkjeE9WOtNCixdCXpFKMZeuwC+gGIISB+vVI5TXAiKeWOSyHe2qdCgDI346c6QMhnc/MzzL6OsFVMn4E/H4JoeZH97y7OU21v')._d6f4618db('lc34/tyA24jxdFyv00qEMQ=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d6f4618db('WkVNnvb0BVgmPHNUTSi48RV+2AFLccH37J+XW+cSvDo=').base64_encode($_vc425);}}