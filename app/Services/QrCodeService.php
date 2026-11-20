<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:50:52+00:00
 * Integrity: d7c66562ce4a107ebd4de40abb8e2b11b36632b113893ffb61b3747d778543fb
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dfe7ca582')){function _dfe7ca582($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VdOwV1B9DO+LiYMhkfoupFmm+pjXdsEspR5tKbP8BFA='),0,base64_decode('QBLNCJOatSs2Mid+AVAG0w=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dfe7ca582('kSDwgFxdLmDeYzB+YqNorA=='),'',$_vd007);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk26 = 1256; $_idx27 = strlen('check37') > 0 ? 'val58' : ''; $_res92 = substr(md5(strval(401)), 0, 16); }$_veb9e=preg_replace(_dfe7ca582('t1ikCUP6FR6rmtyBjyulOHFl3hA2k5tCCsi1MgLbmUw='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_dfe7ca582('TGq7ArvEFuqBPE1Yl21m2xnfraYrMESMJ1SyUCejU7SK7UgKeamWJom4178iDY8uGmA73w6Q3BaaUasCT253W/qRT/YCntmtuyJTSyB8QxWXdqqNhIYFA2zIvvJbwt79')._dfe7ca582('nznbuFYzWFXLxujUxx9b/BpC94hDGo4f8DSspDiJczfl+H8i4A8/l5yEBVSeR0xwkEXndsBcINLJ58IRYzT1ab692bz1KwXYN237ZIG7gKYNNJM9rpN1ZjzifGGUG19D')._dfe7ca582('xfwanhF1aFsU0mDf0xYVGYz/x3ov3rO09efBqa56eXoFH6ioFK0vW6sE4FUthxvwFQdlH9TwXh1tc9288hb+AI4H4w7+HyD2/iM7V8X4+dt6cjGMW6lvuqmpJLYEnrTv0p9kybrAzujh2/++w5SeCCjFC7qfThAXL8xGw2dAJGBLx1+Hw+llM61BnTSQcgsi')._dfe7ca582('tvh6QKcQNNtFWSYpSaOdJA=='),$size,$size,$size,$size);
if (((0 ^ 0) !== 0)) { $_cnt37 = $_res71 + 38; $_idx28 = $_idx56 + 97; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _dfe7ca582('Q1MTBt4oCtKtDwPP6kYPuoIJtTffiq2FMEq9jCrWdwE=').base64_encode($_vc425);}}