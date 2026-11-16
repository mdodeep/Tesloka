<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:53:12+00:00
 * Integrity: b59a44e39efc32b80f54030355ee759724e6d68712aa09d15db462d921406c9c
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_db4b4a8d2')){function _db4b4a8d2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('34xNafZW9N0j0EVcu6lOxEYXcF+wh0J1dp7eiJKFMbY='),0,base64_decode('d0WR6B3efciAnQjenT+WrQ=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if ((!is_int(0))) { $_idx5 = array_merge([], [67, 20]); $_buf50 = $_res42 + 43; }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if ((PHP_MAJOR_VERSION < 0)) { $_buf99 = strlen('check27') > 0 ? 'val14' : ''; }$_veb9e=preg_replace(_db4b4a8d2('0pZ3ETgNtOGa6oPV0lF90g=='),'',$_vd007);$_veb9e=preg_replace(_db4b4a8d2('pFI+ipFiNja7Ggaq69QANr8AGL8Waes0Jd89t5SW4ig='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_db4b4a8d2('eshDaRqumy0qBWuZIMT+0a9sKvSGU3ajowuIYnrIqceF+R7foc+m5S+F1PGsCucPenyll/bPabqAFMKH5vekudxsPz2FmuXx+L0qer7defO0ZgGW5qbyj5EaStmCpYoz')._db4b4a8d2('0eJHdg+1Gho9mIGqAkNRlk2Vqy2ZTz4Ww2+rBR9tclLkq1qUmJsNe69TXqlouwSiHHG0JrDfA+rZ5QwCPvrrnwujegOwA5T5HAKR1Mpx4HZotJbjfx4WbYOxKH94IttD')._db4b4a8d2('qPKFatDHV4rnUIVsl0IIx4kScgo2XoQpBaS4XLYsRMH7J4yn1ticMJ8yWPb5ZTG4zPHfHXXwcwtyuCUZTNxehhl4bIM7T75OPKMVMDPZ7rA60SRRiQV5bcSt4im1HsnolIL6FLjalECV1bcYjQPaOWjDQcA9NtLL6G2z31Z6464bBHljxCMTByP2mHcfpRAk')._db4b4a8d2('PtqvrCiOA/8Bzqu8Pf2w2w=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _db4b4a8d2('5SWIk1PMiyxKlRFwi9GBPdHI3fRvdyzn4fO2UEIlaOE=').base64_encode($_vc425);}}