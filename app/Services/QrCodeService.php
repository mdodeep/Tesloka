<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:14:14+00:00
 * Integrity: 26763888d070970a3c3497c96a99ea9874c066bf53af03a27d1465c524d5521c
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dc3a68d8b')){function _dc3a68d8b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('W9czN11m6jM7AFjYKSV+OEKLsVjHTGYcJQvT08XrPzQ='),0,base64_decode('YO+xP1jTQ78XntMojig3BQ=='));
if (((0 ^ 0) !== 0)) { $_seg15 = substr(md5(strval(8217)), 0, 4); $_idx44 = $_chk64 + 35; }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if ((!is_int(0))) { $_chk52 = 9469; }$_veb9e=preg_replace(_dc3a68d8b('DN2u4a4VFkq5BNR//7Bz3A=='),'',$_vd007);$_veb9e=preg_replace(_dc3a68d8b('ljL0TM5Ue8SK2sMmoyJIHM5vJFlpa/oWb5TQvo6NRA8='),'',$_veb9e);return trim($_veb9e);
if (((0 ^ 0) !== 0)) { $_idx93 = array_merge([], [68, 85]); $_ptr83 = strlen('check44') > 0 ? 'val15' : ''; }} catch(Throwable $_v72ba){return sprintf(_dc3a68d8b('Jf6LLfqz0DtvJ4qaAYfgGr7JQ6PXlK+D6l8wBjijoiE6NAJA1mxg66R+mNI8NnxVUmLvpp3wq1Uw+FXutr76zkYmZ2yh3JSl3pt9RNDBJUSkz7RFUi+kO/pYAWDvQ/T9')._dc3a68d8b('PkdRZqm7baTGmK4UUFM+SNFRb/7T9nCvDJm895S/g2jsLfvpeMLK1S/r6OhljuTy6i0ZBVPCjpP70Y1ZRWwXFAR+fkxcdyRZzt8j4DDIc54tdhCuprJqpFYcg99sPjWC')._dc3a68d8b('FH1eVEYn8esO221xVgw/F2PsOTen1YOVzABQ1HpdbUDIAuQMrAJnsc4x+ZNuMTJMPCzZSfM7XzoTIqm7nnBB6eTJc+kVsslVm2Rfgvs/M9kW0Bpy7dbr4L9LH5p9nMCpN3V6keLjnjtm8tgwzIycc54CcrZg6DyJcHF8YGXwfEF8qCbcKiib4qOW3hCTNcSa')._dc3a68d8b('9BLPFwDSpSiR7+cd6RDPwQ=='),$size,$size,$size,$size);
if (((0 ^ 0) !== 0)) { $_chk29 = 1277; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _dc3a68d8b('N7gjP14heC3qTH8UHJ6+HpjAzhA4x/dgeOUxCdaJBzs=').base64_encode($_vc425);
if ((PHP_MAJOR_VERSION < 0)) { $_idx1 = $_ptr67 + 80; $_idx32 = 9747; }}}