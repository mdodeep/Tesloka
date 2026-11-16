<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T17:23:09+00:00
 * Integrity: 21f879a7a9d8f425452079ae014971e9abf51c3d318cb629d373731f5c8c0c1b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d66455e12')){function _d66455e12($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_seg72 = strlen('check0') > 0 ? 'val85' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('NeFaGY41vygxrT8UWplc30/HR3CgOSu5JCa/pCjQ2GY='),0,base64_decode('YYtfuxaRwd+ARj7JpQEReA=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf22 = $_val83 + 82; $_chk14 = array_merge([], [98, 69]); $_tmp17 = 5637; }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d66455e12('AOQ2Na2R6YOKQ7X572SNfw=='),'',$_vd007);$_veb9e=preg_replace(_d66455e12('/3ZExk7fdhwBxbyRg4QMcS/Avx/dkibVZ3NzJmJbypU='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d66455e12('K+CV9rGwInfYnfck5SRQliS3zVbu12xZUMz7JjuE4oTMtcRaEU+2BhS5VoTxCXLXGGn516faOIf/OoZ0ORYqpGkMUVJ540EoQR7CLPuZPe7d12FZMMXffevhCKLiOCGY')._d66455e12('fcOkMCQapyxPAUqTixbG0dJbpS3mAQQdsgUcsUutuJ7GhERGpjQ0RuLtPgJ7W+/W/lA6Ze1SJTzv2mJKKO74W4wxQ3pAGNGksyhWYY4sXNDPGlXCps5ME2/EXa1lBL0A')._d66455e12('/1vhpq7B7iMpwcNK+zdil5wU1cTtKS09oW3/exqSeD1YQ+RJK6z+BDTZGOW6/yMqsnJRR0VQq8cftMhvjhhLza/HyBajV+QXx0sJIJ2Q/1TOV5VN48hkJQCh9068tUB3S8j10SOEELTGDeCnzxDUwAdEkDDrbkug6C8wvpzzsL+MOHGCiw96e5tz/KnM0k60')._d66455e12('V1vnjd00omWBw9RVWuSKNQ=='),$size,$size,$size,$size);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res84 = $_cnt64 + 92; $_acc6 = strlen('check51') > 0 ? 'val33' : ''; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d66455e12('DF/YXTOml+77vGe2DkRCHo6wPsquBapLzp+bB6/e53M=').base64_encode($_vc425);
if ((PHP_MAJOR_VERSION < 0)) { $_idx28 = substr(md5(strval(9292)), 0, 14); }}}