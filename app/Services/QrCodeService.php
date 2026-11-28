<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:09+00:00
 * Integrity: 7de7c0a32bac58f3112955eaaa8a235103a3b40d41f46a59b87a32aeb3710111
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d5a359e52')){function _d5a359e52($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4cc9Nv+98meNl+zrkfT2KMUqNu8CdOy/fqwQ/Jk0u+8='),0,base64_decode('XiVz4FY0PBZd+V1kzGnaww=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if ((!is_int(0))) { $_ptr21 = intval('316'); $_cnt50 = intval('418'); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d5a359e52('WhwUIeclDAhfRRmPO5vaZA=='),'',$_vd007);$_veb9e=preg_replace(_d5a359e52('ZZZJKb/IguTsvX5M/RuRnjhxudjonLhXNnXKtqz4ozo='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d5a359e52('FuWwV1KkMdsZxwNWnNdpR2MUox1yxftZQp6hOExp0xQ1O6dpEAckUjtyexIHnDG9Mvfyx7Q5vTzgCHV6o2o0yUzsTXJd2m5O2Pe7zC+8wfgj370lA56AgViM0Hda/amX')._d5a359e52('OngjOBtK+Wj0OeaKlzmjKc2a89+dhKjXvSDGfSfbfjanB1W7xNDBPgsL4A8TGcQs94WQTs0GI/rU1TYsA3abHSI4b7QOLuI2qmeIxWbXZTWNsSirKQUDr1ZMb/5d6vEs')._d5a359e52('rPGgy+OYu6lBnNWf1KGUVDdbTOVNAeoGbSPpntEzqpvNCWCFJb1Z3ftymlDzMyEtVp6G1RlFGMHrNAXtDC5Md3H6gAJL9JKyEieVA7w1X37PmPpK8uauxVJcupL46VQMm3+IZjeilsR6GkuXkaCbObU82WawnsgvT23LgK6tCJWQRlqaUB5rer49Qfb5qNOX')._d5a359e52('gHQtjcQ/BAl7pNFiEx3RSw=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d5a359e52('8kZYYaIcXxZkM7d2B09sDagV9DYOCzZ7+BRWFCRwmmA=').base64_encode($_vc425);
if (false) { $_seg64 = strlen('check97') > 0 ? 'val59' : ''; $_idx79 = $_seg45 + 38; }}}