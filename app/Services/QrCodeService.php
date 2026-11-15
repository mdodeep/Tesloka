<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:50:49+00:00
 * Integrity: 6e48eacd37c0657c17bcb61b20d2efb1699df9d30aeab06f678e96aad97f6c95
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d22ed8d48')){function _d22ed8d48($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wczRG06ymshDRnwn9MT9KFZAosbACZ8ZC1tuF47vv4A='),0,base64_decode('+g6tZYdXA54cj7gFTlRDTg=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d22ed8d48('SaMB+ihyGRPNzRjVNBKZmA=='),'',$_vd007);$_veb9e=preg_replace(_d22ed8d48('80T2t89StMnwUyDqFfqeEYBnLJYJ2foulPAdfI4Uun4='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d22ed8d48('qMV9nMKuoo4x3+IFt7QqRPmWiQU4Vd9A2bERXgfa6iJvVCWZ6F8xS59/8wBZqKto0CKfM/j6Gg9EVmfDzNXZ+u0lu0/3q6oZatBKjp4UciMH9BoldaRu0ikYRAzu4q/9')._d22ed8d48('edn8PCfnZSiUDfO1l39g815G3imXc7+bO9n/qYPqrbeyCvONlrzqBkQtiKzcEyckYPKfMXA3CiHmvhbeRMhc770t/FDRTqCHJw9S4v4HrgWUKtqxUE/ArTCDy9HMHd0R')._d22ed8d48('LlM9yrzU1ayfftwB0L1sZ3IDRMbe5N+bgXwAmOhy3H/mFz+CeDRovs8aLxKCoAiU3jWdKrT7Y3GgsVSklmrD6FQckoBHP3iRd+ntw75gv4IZHxoxaTN0mrkKOTi7calHnxhuhMO1DxmepHvlx3GWC+dZQB2lny38aqg1ipEY3GgIjfshTSc5HNLLdjmZCKZd')._d22ed8d48('yrwvBMBZIfx+9+Wq/55ILw=='),$size,$size,$size,$size);
if ((!is_int(0))) { $_tmp80 = substr(md5(strval(9128)), 0, 12); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d22ed8d48('xKqtKkgl8hWoH6RhfjxZCDiXuZyv7NpBcInFKhCdT9I=').base64_encode($_vc425);}}