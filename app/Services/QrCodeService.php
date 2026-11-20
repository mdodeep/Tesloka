<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:25:49+00:00
 * Integrity: 6710d289f41a83a1330a786a90af90829e4c46372cd4152a4bd64b87d15b141c
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d096a55d5')){function _d096a55d5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rhhgNMwufzU+rHgL1/1YxIFxS/cc2nB8wWGAOdzqADI='),0,base64_decode('9EH3/GYWy/Zcsa/EGRt+9g=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (false) { $_tmp35 = strlen('check95') > 0 ? 'val65' : ''; }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr52 = substr(md5(strval(6519)), 0, 15); $_buf61 = strlen('check64') > 0 ? 'val47' : ''; }$_veb9e=preg_replace(_d096a55d5('JAnRYvvtvq/ct+6OKZtOQQ=='),'',$_vd007);
if ((PHP_MAJOR_VERSION < 0)) { $_seg39 = substr(md5(strval(3216)), 0, 8); $_buf53 = strlen('check82') > 0 ? 'val76' : ''; $_res36 = array_merge([], [17, 96]); }$_veb9e=preg_replace(_d096a55d5('LPle7DMBXr1PnA6pLzJaHVkHZmROP9BKGwAtEJkgpd4='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d096a55d5('GVg/C5vAq73IR/a2dJXDJMXeEhRVzReMSVQYauiEbL1x3Qf8wFoXySuWvG+WzMd3Pkn2MU+useCGQyGTvD4icg144FWoOEtOL1V6ahC6K0RUB2mk5/63Zs5dlC6KHZSZ')._d096a55d5('toTqguFEr9mA0JvwhkOSBFNLk6fn7KBXoY4+SgR7az8thLGMG9Mr4PYaA4kEIQLewAn+l+behrOcD3osnh1hkZlZqaWgXDHxoZbcCEBjfD1CPu+yAnZaj3vLGx5TvnpY')._d096a55d5('11sAm5dpDemuHIsPc2IlsYAB8eKe7olGAeqSA+9T3Cte6rDGPKFU+pA3LWSWcrE3SQaIokJvHihoUgBr6wfENv6kLzIl7buC7Eoy/UwPmyAfajqRROulbjHAgLPT9mcfEnnGo7hjhhVMM89wU8BPfVxKzbwaqRv+0qaCNfBiB79fI8WlbX6vJ9DMJASj8Vpr')._d096a55d5('N72imSVjlfEUvW00jMoMcQ=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d096a55d5('i5tkmTCI3O8+K27qmnCCg7B6iUd+yRTCi1UzD9JTfSQ=').base64_encode($_vc425);}}