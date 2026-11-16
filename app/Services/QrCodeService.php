<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T01:23:56+00:00
 * Integrity: 4e1c7752e95c81a2683be7e5bb0fbaaad74a16613b448c0bfff220d1f9f10844
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d936bffca')){function _d936bffca($s){static $c=[];
if ((!is_int(0))) { $_chk82 = 3578; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('G6yfkBuehwy0F51BKVbyjpie3Hab01C8BGSzXg6NsRg='),0,base64_decode('fp2/EoahVNO0xzfLWeT69Q=='));
if (((~0 & 0) !== 0)) { $_buf23 = intval('463'); $_val62 = 2957; }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d936bffca('1t0gp0oKxr+gq9GPYy+DCA=='),'',$_vd007);$_veb9e=preg_replace(_d936bffca('a8lv6Bnmhzjgv/QrHeLzrYxnzIzG2kh24UiOGGppkxM='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d936bffca('CBZAzVx0GWY3vtlxaRir0iEy4sCmeVRyIdp6N3vaSLufoe4nS9XiM3DwvQlyJO5RytYCvb9eC1nV0epjnOblnxk1+t4yVaIeLwB0XNWaAZaWK/BagTvv0M//DlT687/Q')._d936bffca('M1K9ld7fK6i6aPvuJzv1rySWeS8UZgNnxDHJNmFiqNF9v9S5aNkvKTzvhv2zjpUv9U8VOz8sry+UXL7PsGRwZVJdZ1tPQYkIWNMds8OMUOoj3XGR8Sq4JM3Q72Ivw3ue')._d936bffca('NlDeXKdW5YUWz/H4ABkoQYw73EGTnnjNSMUow9b6GaH//s3+erjF1DBVdmkVdwUfC6sMV02CGs4JLbntjrAaXnElAHFrZRWfRvorlZBX53FBJbt8wE6mVWZxPfb+FRB+AfqqIzbSkxXVrsZKZeaJ5VM8ZT8ufljsuFmrDe4Hp8BNJAHd7avNiNeOKwtT34P9')._d936bffca('bjZEVAJCxhYR0Nxrtf7r7g=='),$size,$size,$size,$size);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc4 = $_val12 + 45; $_buf22 = intval('818'); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d936bffca('ntTx6nL8S5YliX7KTYlpJIrL5Bb2WtADrhHwrDdMlRI=').base64_encode($_vc425);}}