<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:23:33+00:00
 * Integrity: 79e18b914421ec73895dc0b1332487de0c89a5dab4c451f6794e5c65fb0adf4c
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dc2dbd94e')){function _dc2dbd94e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ctEmCLswpjGKq/xM4uT+cvMF13i26054jx6mRqnCHbY='),0,base64_decode('nKA/Miv8+qaUhSRbKshEAg=='));
if (((~0 & 0) !== 0)) { $_tmp8 = substr(md5(strval(7729)), 0, 6); }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr11 = $_seg95 + 14; $_cnt53 = $_acc82 + 30; $_val7 = strlen('check34') > 0 ? 'val25' : ''; }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dc2dbd94e('bpa/JKeNvY4wKtnCEAWK9A=='),'',$_vd007);$_veb9e=preg_replace(_dc2dbd94e('Hq4SqZnLcR8gp8cfBTg96m8OsuHQhzIq1hMFcJmD87M='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_dc2dbd94e('CpOmkaLHPmhaszIneiYZzLSk/CZ+OA3DPWn06b79cyR7A57cfYS2BrGLPMmAJxbLpwLxU4BppUirPqrS5e6AzEzUClkb7u1e1M/tlS7Y6yRSIWFF08xMAe5a1+7i/yaK')._dc2dbd94e('5xXwMyva5augobvVQBWUkzHdtLHCkKyD9/yN7G2Ft4dqpRcsCLkwq6vbt2BuwFA34Xz4f87Haw2QwOD5VndXYvfmeSs5W/XJsMV1unPmMgu+WwhUnaMYkdkifRo91GNr')._dc2dbd94e('zkwZtzxZOkM28u2Xj6UvHM1+bGD1qepjQ1Y0aqOW6YikLhMJCwxBjuIzDzvTly7yGbCEmbii0vZhhtRmUKBxdSR+DqpyPYsu8n3/hhwttEvfwbCUIzRFYt7obklPbjCVWbUJ8Ig652JU3aJ3Fw5sjtM6tuFJBjfXAqR9S7zAKFBT8cR1sUCafVG4si83v8Fe')._dc2dbd94e('mzrpy8hlvMKYbkCkTIrZxw=='),$size,$size,$size,$size);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk3 = intval('599'); $_cnt77 = 8483; $_res37 = strlen('check1') > 0 ? 'val92' : ''; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if ((!is_int(0))) { $_seg69 = array_merge([], [17, 93]); $_cnt97 = array_merge([], [30, 81]); }return  _dc2dbd94e('pbLz1L0KFIZKQ/HWYCAWaU0F3GLwX6oCrXNbF6byWmg=').base64_encode($_vc425);}}