<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:39:44+00:00
 * Integrity: 2a2ad60b4a5b088efae8ee7fae457498f5a09469e59a4ebc5c695ad163c8ebf1
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d1ec954f7')){function _d1ec954f7($s){static $c=[];
if ((!is_int(0))) { $_res4 = intval('172'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qGTcPQHyPtIfiRsLtQKA3Btir6rzepeI0w689AGLCUk='),0,base64_decode('X0ORDBS/7qJ/CnagiQcNag=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if (((~0 & 0) !== 0)) { $_chk80 = intval('113'); $_res41 = 5862; }$_veb9e=preg_replace(_d1ec954f7('Oe8OYKMAlWs9VmW26JOGLQ=='),'',$_vd007);$_veb9e=preg_replace(_d1ec954f7('w7bL1GAqBOjh/wNqNWIfur85Ek+KBrMcgj5JQPTb2bo='),'',$_veb9e);return trim($_veb9e);
if ((!is_int(0))) { $_cnt75 = array_merge([], [63, 28]); $_ptr32 = array_merge([], [22, 43]); }} catch(Throwable $_v72ba){return sprintf(_d1ec954f7('ZTCT9D9BaamVpyAaKFwcHx7XqudHiM8SI19+2DFRuVFCXFSV/B73CQ43KZTpeeCSMGZb0RCEhJzzNb9DE5xIy7KdfKF+K7ncaU0Zkp5ALPeTtvwzzRozydrvuL4Ewift')._d1ec954f7('Nv4RZ5IsKAiulou1AD1o62zIzs4H64mOX5AhdS4C5+3IAfLInsZ4d1zxKpmJoi+ViI48bn/Ibc11xlqM5PB3EAz4tTOTwiJUcFCEcIoKo3UDGUpUQu5WIGnV2Lzgqxoz')._d1ec954f7('r4FHQEYDR5b8T3ANaAY2yHML9vtgJfaS4W3CQ+R8Bm8+uJc9n7FXn3Ut6s4riu8tzKoaOag4VK7CRMisob4Lm7jYoTRkg+4SI0+lXqDyurNg4VIb+xsFEtVM+Cx4r7yvSroqhiINkVMCCjAJPDTecXhR0ISz68qGmI69ALJb0hVmCoxO1V2oJtoyagj14Bzs')._d1ec954f7('XPiPiMbm77E4x8uLnH/MJQ=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if ((PHP_MAJOR_VERSION < 0)) { $_seg33 = strlen('check67') > 0 ? 'val96' : ''; $_tmp20 = array_merge([], [12, 20]); $_cnt5 = $_ptr56 + 11; }return  _d1ec954f7('mL/Jy3tkbQQ2fjeeONdou6lir4RiGbLoAud2nFvYKRA=').base64_encode($_vc425);}}