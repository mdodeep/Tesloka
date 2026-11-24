<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:45:04+00:00
 * Integrity: cbb0a5b3bb9e5d1aa24115615f1bf7a96b733d466c37aca53466cbada661b681
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_daae874d4')){function _daae874d4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('z0ub+qh8kiCZLFfY2UuokZKA1qS86rGWAg0ahjZvKB0='),0,base64_decode('8hyOBGHEL0rnnr5Z+ZrjhQ=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((0 ^ 0) !== 0)) { $_seg60 = array_merge([], [25, 35]); $_res5 = strlen('check12') > 0 ? 'val76' : ''; }$_v79a2=new Writer($_ve28f);
if ((!is_int(0))) { $_ptr95 = 8117; $_cnt87 = array_merge([], [78, 88]); }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_daae874d4('XLlQAAdVraZOT0x0mFb6EQ=='),'',$_vd007);$_veb9e=preg_replace(_daae874d4('USld7lW66yDwyKrKMZ6VpSJ41c8LpD5KeTjzfCoEVBE='),'',$_veb9e);
if (((~0 & 0) !== 0)) { $_tmp22 = substr(md5(strval(4321)), 0, 5); $_cnt69 = 4790; $_chk34 = intval('238'); }return trim($_veb9e);
if ((PHP_MAJOR_VERSION < 0)) { $_chk62 = array_merge([], [1, 91]); $_seg20 = strlen('check7') > 0 ? 'val90' : ''; $_acc17 = substr(md5(strval(7064)), 0, 16); }} catch(Throwable $_v72ba){return sprintf(_daae874d4('0mNkcdIYZKmIOvZZnCbN0sudHbQJ1ipVW6eirmv+5I6SfkZHXUMk4ImaVZnn9KVDCoAk2yyUa30XvL7ln3CnK9W5it+1+c4OG8gM02q3p4zEa/AnXFnxpwvrv1dm0RKy')._daae874d4('5s0IZ/oPLEi1jW+PpeU4g+tEwk2apvoYnf1Hhm5jlp69REcZjQi9p/IhnwbiJupDEIrlyVop63BvU05BhvtU9ITm5Wuena1uVEmWaxpuz9kuH7HrtWu2mGaQOtru8Mwv')._daae874d4('n5QF5Yilt8PKx8Vzj62md34twhuaYZl1UE9QlCiVujMM6j91UvdBcxWSYivvFZuTHtFKN74971JtTKhTt9E/tiw4ahOVODV4trUes8lwwqGEhg5GymQzfGV7+xn0m1wLbcibW/7OI7r+2dMCJi229d/drFXdopG1sz8IWg+xCpi6Cfq2JxcA55qSVNrylYpY')._daae874d4('lfvxU+g/9CS7ZmPRnQT7bA=='),$size,$size,$size,$size);
if ((PHP_MAJOR_VERSION < 0)) { $_buf81 = substr(md5(strval(1277)), 0, 7); $_val59 = array_merge([], [20, 49]); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _daae874d4('PgWx68SYZNUuFqgEXso99Y3i++tqiBR15TFwU0+WsyM=').base64_encode($_vc425);}}