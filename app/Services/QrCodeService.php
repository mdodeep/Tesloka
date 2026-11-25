<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:12:00+00:00
 * Integrity: 2df9c3bb0ba8feb903b68df95647296d7c3a359514b150ae19150157f487bb80
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d8a23d9b2')){function _d8a23d9b2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XMa986URQnbONWEh/FG2g+RhFLgq1rf2Nq2AkuyhbNE='),0,base64_decode('7pkqVkFOSEZfFZDuq8R+DQ=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((~0 & 0) !== 0)) { $_acc10 = intval('439'); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d8a23d9b2('cYjzqTyNu92JljCZFnudSg=='),'',$_vd007);$_veb9e=preg_replace(_d8a23d9b2('ZfCfQEeqfF9+zbcWJes1KeDv9oD6y7rkxWEQP1XGCcw='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d8a23d9b2('9crE4avNZ2MyYlqLf6NVheMwHNefB+OeqpxUVQTNDzFqOw2AbTbQSz0w6TqpiS/3xtXu6I0w+tz7zMT8ecHooxpF4M2BzHrbJfDUsR3kUQADWtPl4SBgjwJLk9lTV1dW')._d8a23d9b2('tlUmYvps8QJDRZqXIWtW1KSOtd05DqZrx27Hoq67FQNRNQWfmd3P+xCxSo5qVzyorgy4AbWdnk9RTroV7kPdpCqBIULGvo2fA1sbdkCcGe8Z6wV/gGTkFuLKls3NawuJ')._d8a23d9b2('9Rjb9hKDORQi1Cf9zvFZNeCoORoOyBp+17rLsKsnlTiSuJ2swv1Ve/Gb6GGD5MXx1t5C+CU8ai2yT9N4j1hfAE5jeW+ZFz2Yp/JDEB2P4P+ZTzpcADV2Csp2Cbo5Z+goLE4uu2MFPkw1t5z30BUDuyPQgsyGhinCJCBkAv0Sl8Ot2ulYeLwVMnqbqo1VhmaC')._d8a23d9b2('p943sWeHuidbkrzTNexMiQ=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d8a23d9b2('aqcuBXyb3ftkuRr7cdUc5xbbB3HFYwkpR4hLi5ju3q8=').base64_encode($_vc425);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp38 = strlen('check13') > 0 ? 'val24' : ''; }}}