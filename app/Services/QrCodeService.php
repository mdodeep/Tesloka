<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:17:56+00:00
 * Integrity: 212ff748f3d4563bd1bdc827b9bc5045a48d3a6e5529360c0b08e9abde3bf825
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_de07ca101')){function _de07ca101($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('iGF+7lS2Ek1gLH0j3IwK+dcrtSyMxNmNfiyt9n3+ZaE='),0,base64_decode('VWguVany/bZmVCIluDWYGA=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((~0 & 0) !== 0)) { $_cnt17 = array_merge([], [61, 47]); $_seg71 = strlen('check6') > 0 ? 'val23' : ''; $_buf20 = substr(md5(strval(4647)), 0, 13); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_de07ca101('x062qB6bfynegzRKqwjSBg=='),'',$_vd007);$_veb9e=preg_replace(_de07ca101('11vuT16HY3REtuWwg47FiFGLcuohDuhrE2uZ3yBpsTA='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_de07ca101('0gZIpY5cFgFyFvtAMFm5YuhIMKOIFwISF0Br3N6lbxLXJCWdK17WDubVt4fdw8OR9WHpu3s7VepRqw80koaQFcxavvMzY4aQWC0PIMRpENFd/tGm2HjMfEy3tWxkBpP7')._de07ca101('p/hMU76I1rzt0KyuJpMPswI8w4SOhqZsY4Nx3cbtt4biXcuz961i51QFGRLwQxTr5IRz4J4xzzp/w3f/CQPMMgVklREZOJaqUzflcvoodYqXAEDFdodKPDmnIxrIecXU')._de07ca101('GnuQdEmUwKF+2rZugEk2MfzTdyQ6Iyc4GQitHZcC6ZLEXNtYVUCtCBZQg5eMUn/d3sop+fPVk06nQJIKIzVU3IUiJhJ5/eJ+qIPW1nvHR+N9YxuwjK2h/KdN/f26ajAIB2TTaG1OISxO+G4EDX8VPsYaWJRLdsrnfAqg21gkDiqm8f41GJqHW8dfchDP/kLU')._de07ca101('8UUhE4PWxe+CmwzarjnUfQ=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _de07ca101('CJ4CmJLgaS6ksvAsP9nB+/op+Yw9bg7gxMGUpehw3oI=').base64_encode($_vc425);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt96 = strlen('check99') > 0 ? 'val10' : ''; }}}