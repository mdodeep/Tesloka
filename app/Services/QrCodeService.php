<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T07:04:02+00:00
 * Integrity: d4d5761f50219bb797d696d526cc028b2469eaa46416f42a5b65935306e2b5a6
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d55f1c578')){function _d55f1c578($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('u9mV5pv37uo11DMXQAVsUDeFjTNRoFlFGIDOrRuSOCk='),0,base64_decode('dn5eUta6+Jo4GkLmxncWPA=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((~0 & 0) !== 0)) { $_ptr17 = $_val98 + 98; $_acc60 = 5211; $_cnt60 = $_seg7 + 84; }$_v79a2=new Writer($_ve28f);
if (false) { $_tmp31 = array_merge([], [66, 43]); }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d55f1c578('QjEO6Rtvz0308spA5UrxmA=='),'',$_vd007);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr82 = strlen('check43') > 0 ? 'val10' : ''; }$_veb9e=preg_replace(_d55f1c578('+dpSFKNhQb5Iq8D5PKgbi5bf9sVuLmRzHmEdJS/XlGI='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d55f1c578('lfqmZ7s9fAcRnhHiWxKFsC374WSnlPEupnKdappXtgv+DkeSwM4cgfA/SsXxi+oMl5xutWmix3Ozvmig3NTpBASpyjzgNkuM92rrcgAwRmD2M1tMpQhSBWmvBRnJzRjt')._d55f1c578('ehTSoPxCIaQffKXlUABISRMrQ+tSejDJ3zVl+GFj7fZYKoK4bZfkB4ktMZhASQK7NxkLi4QdqgMmQv+2BtnZTGxTLttwxZpnFq6ydvHmtmRXfD5VAfMoJOzrFU7DZLm0')._d55f1c578('7bNLsdCno1dqp+u+7taR0pksXpDW1YpBLKnU7tjqT6cj4uKyi0Ah8c+XaONycbQpq9mvTZmzMfXeiddXApzf+WNuNBD9ArRNWagIkNtFVbqUcnFD1pa+axNBVFzVyIIZQlx+EMXVOplD0+h3qQgeuHVZp3C7XBFGrXX15k0AqP20RCCVmX+e2Q1yO2w4EQV5')._d55f1c578('kWqG3b2zB+BwOZBAicPofA=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d55f1c578('Hf8oWYosBKfRVFLDE+P7sBUcq/DrDRn1cPvycvgihAw=').base64_encode($_vc425);
if (((0 ^ 0) !== 0)) { $_buf91 = 37; }}}