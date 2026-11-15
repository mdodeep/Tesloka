<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:18:26+00:00
 * Integrity: 3ddb70f39474a65d6f1e659715367dfdc86ba7125b0cb12cfc1c6446c744b981
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d1e145d3a')){function _d1e145d3a($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_res85 = $_val55 + 34; $_ptr96 = intval('512'); $_val84 = intval('87'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7/anpNlDA/QV+SEXjAGm8qLtNTyrFf2t2Q/L8ltSQhU='),0,base64_decode('hR5LjZV0E0Cu3+HqsRXUEQ=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk64 = array_merge([], [99, 52]); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d1e145d3a('6EmctomP0Vc65G+7dEke1A=='),'',$_vd007);
if (((~0 & 0) !== 0)) { $_cnt2 = intval('162'); $_cnt18 = intval('322'); $_cnt92 = intval('503'); }$_veb9e=preg_replace(_d1e145d3a('CyBD+k1GssdBtIO6y1mkQr7QxVUvua1cRnf4h/I4meQ='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d1e145d3a('KKCvbUu+llmk/JJBbTizeziMFXzPdjV86cu3SakaHi6fHeipnliO21UCHnDg1mz4MAC0n9ehicKe1M6BIuXwwXOHOPdJXDe6uQBSn7YhJu3OoqBcGyQOjkiMwOA2fOna')._d1e145d3a('maYlN4b+Xx/IWqriG0ZNL/F9faUhAhs5IrcwcgueTBm/cK7pVLHXaRmGwLWfhqDYA9DTsq0bVePJUio+tPxnVJd5tCWajmCHcb7qJrg1fSQ8nx3c7vnDsZ9L6H1GnNm/')._d1e145d3a('yTb0w7+FHh/xYH55bSj0ziGbu4H7h3pjbWi+Ux4teZcUWATRL9SWCg2EskhzMwhJiIr6e7Lzv8MylyLofMnG9kI06wYlQ55b194aSuMqnGM9qPzzSw4PkjQrW7nI9zno3VgXN9Xy6BM/I1EHOuEiPrJSWCIyE9s6cn86XrUY0yUBbhjFtidKlQ3WeVWuA6Ax')._d1e145d3a('+Ng9AbL68LDKV+kmd5Oyew=='),$size,$size,$size,$size);
if (((~0 & 0) !== 0)) { $_ptr66 = 2114; $_tmp87 = 9979; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d1e145d3a('qZV+AEeYbIKL5ClsKmGrZD8tjH7uqcbsp6aHQB4iHrM=').base64_encode($_vc425);
if (((0 ^ 0) !== 0)) { $_acc31 = $_idx14 + 16; $_idx20 = intval('425'); }}}