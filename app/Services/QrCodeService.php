<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T02:29:34+00:00
 * Integrity: b01655018c94d9a6d98ce3abbe72200d33cd62dda25971490828ecaee8340877
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dc8a5cf64')){function _dc8a5cf64($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VVXhxUPgwvCers2jEla4Y93jB9RchXyeVefT0pofZWQ='),0,base64_decode('BoyO9aspXcDepKQYT7oX1w=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (false) { $_res42 = intval('69'); }$_v79a2=new Writer($_ve28f);
if (((~0 & 0) !== 0)) { $_ptr25 = 6738; $_buf78 = strlen('check31') > 0 ? 'val17' : ''; $_buf34 = $_seg76 + 41; }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dc8a5cf64('VleU/8VnzNX5y/ZzYEsYkg=='),'',$_vd007);$_veb9e=preg_replace(_dc8a5cf64('YQUjim6xr570djbo1WbihD4B4pBx2n354wuTtKDMS8E='),'',$_veb9e);
if (((0 ^ 0) !== 0)) { $_cnt31 = strlen('check12') > 0 ? 'val42' : ''; $_cnt37 = 5873; }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_dc8a5cf64('69S++vLHa6QewRQfq/wAH4Y6TZiuHOEmmpIfbjrXdK1aUDm3GECPFH4lA3/ldkwXuspbu3dugGSLJ/0MVz+UGxrYaSnvg7aPN7jo7otrMw6ELminSySjVCjGEaL6fEju')._dc8a5cf64('21vqvK/SnILcS+2Ku6r7Q/tvqe1JQBBFSImpa6V0c8+1IoXQwa166VngGVurNTRDo8yB6Fgypnb0hO9ZzUIrTnC+U6su9FxkVafQbyfaLPaqKFJZArjwDSvVJG55O/D0')._dc8a5cf64('n1tvrCv5ojxbEspNQ5IKdD8uNSeonIeRnexaEvPV2tu1iQ2xD9IbxE88DjWiDtG/6asPFMNl1wrbp1T3YLJDuonfgRKFcZxNkY9mPubbZDMSmTXEKZYoBWwEtV06eqCtlPkaE0PPdCp2G+vI85dqrL6H4G04gUWvisbz7VA1mc4qqeeMSaxmHa2z5esFMFaP')._dc8a5cf64('DcR1PPSdTATQCLlbmq17hA=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp55 = array_merge([], [35, 74]); $_buf75 = 8227; $_cnt64 = strlen('check72') > 0 ? 'val72' : ''; }return  _dc8a5cf64('4KuyYZeiFDiC4LDna9z0ksFS5GmdgjtGs2cqXUboYXw=').base64_encode($_vc425);
if (((~0 & 0) !== 0)) { $_chk38 = substr(md5(strval(7814)), 0, 13); $_seg16 = intval('771'); }}}