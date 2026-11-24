<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T00:08:21+00:00
 * Integrity: e2d6ed59f9f7faebfce4df88a34a26f59e037c7a22cc74a203ec30f8a25d5b4e
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d6bbbdeb0')){function _d6bbbdeb0($s){static $c=[];
if (false) { $_buf26 = strlen('check60') > 0 ? 'val72' : ''; $_cnt51 = intval('396'); $_idx32 = substr(md5(strval(5582)), 0, 6); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5BLBGQESNo5kf/2wGyzM8OEAtYQE3FWdI8GVz4boRJM='),0,base64_decode('56YinY5oTebVzacWTF9zrg=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);
if (((~0 & 0) !== 0)) { $_acc87 = substr(md5(strval(5769)), 0, 7); $_seg34 = $_chk27 + 27; }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d6bbbdeb0('1hM6tm2EPUbJM9sMwhIF/Q=='),'',$_vd007);$_veb9e=preg_replace(_d6bbbdeb0('1Zel6FvGL7LpkcQ0saOtlespZ3etXVLm5Nl2vrJ8mdM='),'',$_veb9e);
if (false) { $_chk26 = intval('924'); }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d6bbbdeb0('zvduDHizsbEQvi6MkoTwsCtTJpxew22/79LE1Cc9VzAmPF26FCfSk3jz54/geblRK1/xQtf73PEoWv56JLZlwqFEUyvo5AV1YJydWRqjeiqcETZd5xJHd5KOyWrrMRI5')._d6bbbdeb0('EUf9l9hbnLZyQMcyssBYIo3MBFqDfewdavCTxCB65nuj3VMLbPhQy2Vxxg1CjhJQd+nE41HoQZMFIPiqBEPZMPnAHVVcYX2El7rR+ZrCca0Eu3k32sWhwmnxGDBCdj1y')._d6bbbdeb0('dn6T+7qrbbRxui03rea/T05oWT3CO5RFUo+wWXAF1gkoVuoOr6j0fXJ4lL1QK9k/bSS/n17gOU2Ipu3rMcLlnFGzu9j6+TjcXXdSIMPdmasgoNruJX2U2DLrjODen9TvD/HWz/HGuQzOMC0roiqgVGegedhxQMf3MJD8a4M0l/MVk/Kj4wZxHszO6Xe8id9Q')._d6bbbdeb0('W0Sbr+wV26gqBFUnCUuFyg=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d6bbbdeb0('sgCGCgApLXMBy16zGoC790qgFdhprOB+SVjF9RRZacw=').base64_encode($_vc425);}}