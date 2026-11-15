<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:40:29+00:00
 * Integrity: 70d9cc4ad1a6117188484a766b85d0e44fba40851435a8655312994255203c70
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d6a46a617')){function _d6a46a617($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Cu3N5zHEDs+6AD2+dHozQqAOaUJLnDm/HiRzcMqaePo='),0,base64_decode('aA0A27iueTBBVfYewJbdVA=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((0 ^ 0) !== 0)) { $_ptr33 = strlen('check58') > 0 ? 'val48' : ''; $_buf3 = 1614; $_idx4 = strlen('check69') > 0 ? 'val75' : ''; }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d6a46a617('pHbLGor+Fb08/0A8yz/XJA=='),'',$_vd007);$_veb9e=preg_replace(_d6a46a617('o56ubUj0XrtVBiPKdZDxVZ0os+Mr4WqDkshRlY2/7E0='),'',$_veb9e);
if ((PHP_MAJOR_VERSION < 0)) { $_chk75 = strlen('check44') > 0 ? 'val26' : ''; }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d6a46a617('5b8HiIxp1tt+psxjgHIdpkvvnwqureGRY1kItP+RSDNUcO4OuTqHwHc/KMBcnggmVMFj8rrEU2A9NiWlWUoZm182WKPTv1x9Chn0Wxt9MmGkBOEETN1Loh88K2O9DIUS')._d6a46a617('jMXXFY/CHWITOMXVjCdEbDSlXIHDZBavRSEaWDszx7wF0NWVaac8Vlx4VzDi9zliPDAoamrHc5T+wztDxR6dFy16Zz9IOlVy4z75c/ZolJVHy+J2l9AX/FdXc0kE3xMr')._d6a46a617('7M0ga8jKtzmjpW9enjK4Sr+X/ysm3p8S5PVdLmV97YKs+iWLv3bfL3Ni6iuzzakMWmQWHTeUCZP0W10zsaaIIiWObPaqHv3yV1J6FhEx7kPWjuRavLDxuYNu9ymZrLBgKD21lHgQbcIWUjKK6aA7wq1pB3fj8Rmvs2zjGhrD5AocQggE3bRWnuYrlR5qcGOz')._d6a46a617('h099sn40JE6lkOtw7ta4Vg=='),$size,$size,$size,$size);
if (((0 ^ 0) !== 0)) { $_ptr77 = intval('999'); $_tmp52 = 3810; $_idx73 = array_merge([], [49, 44]); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d6a46a617('MFRKf2dQ1uDJ7p065o+itECM6HCH9auIQMscIGqGlVA=').base64_encode($_vc425);
if ((!is_int(0))) { $_res96 = $_res82 + 11; }}}