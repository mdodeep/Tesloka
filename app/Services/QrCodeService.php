<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:05:07+00:00
 * Integrity: a8e88f52112376f553c68c8832e8c8753f9719b0fe90114b81a1ce80a12cfca6
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d8b171675')){function _d8b171675($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Z32ZCegYqr1HwCMuWn6PVohH2f3FJQt5c7/iXUikmrg='),0,base64_decode('55we0TrwlwtfTy8iI1Ufog=='));
if (((0 ^ 0) !== 0)) { $_ptr16 = intval('655'); }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((~0 & 0) !== 0)) { $_res91 = strlen('check83') > 0 ? 'val92' : ''; $_chk30 = substr(md5(strval(6317)), 0, 6); $_cnt33 = $_idx14 + 39; }$_v79a2=new Writer($_ve28f);
if (((0 ^ 0) !== 0)) { $_seg72 = $_idx56 + 60; $_res35 = substr(md5(strval(7996)), 0, 7); }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d8b171675('kqUhT7906lZ0oGgezJX1Hw=='),'',$_vd007);$_veb9e=preg_replace(_d8b171675('vTw+8KrBOkTQln/KjZE+oAmUqJ65+nBkepCqgnfj0d0='),'',$_veb9e);
if (false) { $_buf27 = strlen('check24') > 0 ? 'val33' : ''; $_cnt97 = 7918; $_chk39 = $_val90 + 28; }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d8b171675('epG4q10aUvwFu/Y9F5R47efVivT3lOFb1qn3sQs8eT0+2Wh1zXOFcbwnq4/fD4LvK985wwhBZOuF7UeJ06oUhigAlQAjMIhcj/pCEwPyRkvkCsaOUeMd1gWoP2hLaqp0')._d8b171675('4fAoPrgaT/kVx3/0U7dI0xwE5XmJR1i5EmQwDxZm2KeM/ZwDPBh9GXXlixUK2JqS1VmOOL7uLo1kn9yE9emssxRxTkXgBxyWmP22XkkBmn3skdO4zGRGTb7Scek56e3b')._d8b171675('HmNvGai9GohP4i4ZfNYSkNm5emNiFrw0nbsdEaBhBDAgxRYo4tEADsrZVIq3jSey40CJ/bwzz6Awp3+7Yd0c7BGff+GYVMZhSbh7mFP7dpTyHSH0wKQjYnqoYUin+hWtUo5yczqtT2+wXo6XphCI+zg95iaIqFnMqbAn/vS3ruxcqzxw90t/EvGQ09snAo3Y')._d8b171675('2WVPmj6j3xcogbG1jo1usg=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if (((0 ^ 0) !== 0)) { $_buf71 = $_val13 + 73; }return  _d8b171675('ZrFURYjBLZsa5YwMZCnRHqyYIvSJL4FVMbY2hz2cfXE=').base64_encode($_vc425);
if (false) { $_chk8 = 7193; $_chk90 = $_acc23 + 28; }}}