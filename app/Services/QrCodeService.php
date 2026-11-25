<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:00:40+00:00
 * Integrity: 8004d8cb5a4f600e1c5bcc23dc48e53209682cbfd80a127b9bc385cbe0456d79
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_df02e090b')){function _df02e090b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('52vDuJ9pE7i3mZ5s/q1ZDPUvEQymF9hiccHtRyOQ2Lo='),0,base64_decode('8DUbA2ytAjvUPRFBpiOBhg=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((~0 & 0) !== 0)) { $_chk91 = $_chk10 + 72; }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_df02e090b('v1pu/WuBZJYEFIa0o01JdQ=='),'',$_vd007);
if ((PHP_MAJOR_VERSION < 0)) { $_buf26 = 815; $_idx45 = intval('50'); }$_veb9e=preg_replace(_df02e090b('OnfKebrwHg/m6dDia9f5DTqirft5tIftygSextyUP8I='),'',$_veb9e);
if (((0 ^ 0) !== 0)) { $_chk46 = strlen('check55') > 0 ? 'val30' : ''; $_seg65 = 978; $_buf56 = $_ptr85 + 89; }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_df02e090b('euVZQvOk6ZSa88brLDyKPmhrrVzl+qC0g1uI5Hq8a4gTYRoJ1jpIznN9YiG1C+yev5UCk+QVUkJ7zuc6KInE2T6Q6QbuXSdi1YnG1GuJq91T9yNCGqXwcHl/7Tgla41X')._df02e090b('ZzPELakC+fszWsWhLoQn+S0Oq2fCOVgMYuHCvEkLbrQ1oJ+mlZiXYdGaptqZrrua0VbxJ9ZPSfps9aFPd2kiae8otNDuKEiH2RCjysnxqaR8pQQ1FYyuGuwZBmNo14Xk')._df02e090b('mbI4OohgQtoHtFQRrnsfseiQyW05FfacKDyoDFHT7k/liwja02D0c/I6ToPMXfwC9228CMCuWUZhDjCL9esAx3Lhmsd0JpHCt6ogh+/E6+5gsv0VRwni31W7BxhFi0c6t9ad/2Q5YJRL7897UEO91BhZpVGfTIG3C9PBjrar2i+Q8KrZyTSZ9C4I+92bphKO')._df02e090b('KBcIuJfmhHnpimtihV29bg=='),$size,$size,$size,$size);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc93 = strlen('check3') > 0 ? 'val68' : ''; $_cnt9 = substr(md5(strval(712)), 0, 6); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _df02e090b('J6a1aVpiJzrr/nntMFVXqEU6hHvYpBZrBh9eO0AE1hM=').base64_encode($_vc425);}}