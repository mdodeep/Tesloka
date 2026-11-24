<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:17:30+00:00
 * Integrity: 4796eb2c7e73703db2de83bd99b7f99fe97db3be758f81b3554c88decfa9bd87
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_db63b674c')){function _db63b674c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Q7GlLrsjUghJndifvxTGip5ss+d9o2r9EAUPTAS7cdc='),0,base64_decode('WJAKd7lvd4DXqZOiUnrFcw=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx70 = 7558; $_res85 = intval('441'); $_idx75 = intval('64'); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_db63b674c('5gYMhaUzx0kFPhE+XrCJBA=='),'',$_vd007);$_veb9e=preg_replace(_db63b674c('mkrmDzaUCvmASp34EEpfaoaBT6fnGj/NTH1NEHNFDvw='),'',$_veb9e);
if ((PHP_MAJOR_VERSION < 0)) { $_res53 = array_merge([], [55, 36]); }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_db63b674c('q4aKiCR0T+o8Y8opQ7Ed5+W+Euo2HGZn6irYqxNq/0fhIQctbr7LJtdeKknPSDBSicUGNxbSSqiNPBY2nBYF6UpJpn50uLKiFEPc+gPtpy2s72R7FjdBOfPoTDL21U/K')._db63b674c('SJn8dJ8KZMbRYLNpNl7nYBVfnyp9/SwaPQd6XRUFm8oMcBViETzC1oVNKFUgSu2Ctwil4R3Kg3lCt7chPalXYPUGriQxjQhgaBtv9QMhdbheIAx9IzAeIsST/TjhFHcL')._db63b674c('ZfqwN3iL+aOGEl0pvVz6UR1SLRcUDlWoxB17h6UYWcReJDR5q4QkSBG0Z+MY7TkLA0oCaYhctudHA0UpnpjFet9+wJ5O/ylycvMOk1U6wIKEFB5RTxtCtU/GJXN2fTNXA6c4BGePZZYjmoIfdhWkAV40UGnOPj/TPDY4ivzvphmoY5JNB2Pp/SiMVssq8W11')._db63b674c('iYuA3jsAI4o/eZjo5i9NhA=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _db63b674c('UmMV10U0hIBBhKF0+X8P0GL9tIh6c+j01ysGpTgrWRg=').base64_encode($_vc425);}}