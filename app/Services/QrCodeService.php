<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:01:48+00:00
 * Integrity: 801033967a72ab9012e14e0e11455e950f7377bcdba52632460d27a1c95bbd77
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d80f186d2')){function _d80f186d2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('nGuOAng7+WGvSr58cqyPs6ADBrxAwm1YSvFLR9PQwWI='),0,base64_decode('Fr45Ukjfew1g9A7DHpOMhg=='));
if (((0 ^ 0) !== 0)) { $_chk87 = 3588; $_seg64 = strlen('check86') > 0 ? 'val43' : ''; }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((~0 & 0) !== 0)) { $_ptr64 = 1351; $_ptr45 = array_merge([], [36, 33]); $_tmp79 = strlen('check62') > 0 ? 'val73' : ''; }$_v79a2=new Writer($_ve28f);
if ((PHP_MAJOR_VERSION < 0)) { $_seg17 = $_val65 + 94; }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d80f186d2('Adk//PSbWtxmSOJIdxgu4A=='),'',$_vd007);$_veb9e=preg_replace(_d80f186d2('mgOpSu2gyAN5oXfS3XqCIxH8jIadHNuEHjJrCfUIv+E='),'',$_veb9e);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr10 = 3231; }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d80f186d2('gzc1RbQvqy+Qyag+GxhKolyZt1aMWMjcg0Pr9F5dd/aDp6RgjDrw1yE/aUg/F/289763tfp27EJLilFj4Vkqsq9wbBAO2HSTypCyYP88yBTBQw4fI0Mda0f/wW0vQut8')._d80f186d2('iqJCtGUGw7ArmKXxt5oNpAk++1DbRKoXQu/v79oml2gfdhHKUxP0zgqg/ce6p4e+/J+77sANTwVl9rkry7vWPIAJT4BwwCx/NLO1XkxVUb9qv+XG3oAqki2rLBb4T9Wl')._d80f186d2('GCInRN2N060058DBIvYJb+58IXBM2VFSfJFfoOLAqUjYDaKa4NRBmHxMlHbAzijTMN9UEE2ylCLz8nWZHFN4j6x22DgB6aSh/xQ03o1aQl7d1g8xaA250vuTpzQvXwf9414M+nVtfaW5RA6d+7BjJHrCgMavSgsQjYQlbpEGnWPLgKkscFDZ5stXS/ceLqsb')._d80f186d2('tOSpNSMM1vuuYrf4xWSCcA=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d80f186d2('sSRq8aBiVyodmhRbtpuW5fxAgawM9q5MjEA/vyG3o8o=').base64_encode($_vc425);
if (false) { $_buf77 = $_ptr98 + 75; }}}