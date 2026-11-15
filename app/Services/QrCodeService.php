<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:28:10+00:00
 * Integrity: 5417b54d4492cc07b42383ee2b0eb6ef7515f82da66abb7cd0b5468f32af8439
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d262d3c83')){function _d262d3c83($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VTxs7ez1o18bWEKvF8tufyC8YqXXXH0hVHhnRLWvFnI='),0,base64_decode('IHySRwT+ZbKQpuKEVpa4uQ=='));
if (((~0 & 0) !== 0)) { $_tmp43 = strlen('check50') > 0 ? 'val36' : ''; $_chk50 = 3528; $_chk15 = substr(md5(strval(2921)), 0, 11); }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);
if ((PHP_MAJOR_VERSION < 0)) { $_buf63 = intval('679'); $_chk54 = array_merge([], [0, 43]); }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d262d3c83('tkTQYik8Z27sitWC7WuoGw=='),'',$_vd007);
if ((!is_int(0))) { $_seg19 = $_cnt18 + 69; $_cnt21 = intval('793'); }$_veb9e=preg_replace(_d262d3c83('CL7FjIkFskcoMrt4DPtXIKLL8aAqPzmMIC1srnjR9RE='),'',$_veb9e);
if (((0 ^ 0) !== 0)) { $_acc71 = $_buf61 + 7; $_chk85 = $_buf54 + 6; $_idx29 = $_tmp28 + 40; }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d262d3c83('jGRZYpVItrqFHxhOJDD+DFB3F3Oo0H7IUkYzTisBSPlBEuRwoHOWW0PtjQDWcea3iN10z2efbbRQLQdPuQjv4trIDWQRMgpHnoaUCw8zINU93WCcW67ofpKeBw2fmdLK')._d262d3c83('futREDXPvFAerut3OB7SclRcEdvXUIG0K1QdLKwAyBZIlJUCPbOg+mycVJ+RsZwviQFPsd9fQfndoedVa/UPrBJKRR37W9X5TmN1KYseJLg5qjSbW4DFy+cv4BYSshfM')._d262d3c83('a5Y3egCBBogAN8697+nVF+C8GwU6aFwFUPJXQzDuOWEck0Lfa3TeIXEmH0+IKZJfVpiIqqfUtSvO4FWV7GP2+qo4hNqP7Uj/Pw/1fCgEyb/Z9RyzMNfEBUb2fUqWBuI7rq5eIlerQC9Bd3CBiqnab00zCyOpZziw6+1RfOxxofvCbVprnf5r1NAJDAzqz6/+')._d262d3c83('Pv8Cw1qELMQCvLp6YPjBeA=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if (((0 ^ 0) !== 0)) { $_acc92 = array_merge([], [68, 46]); $_idx92 = substr(md5(strval(5640)), 0, 7); }return  _d262d3c83('VPzmxqy8uTAiKz5PfRHJCZ7plzqUrcuxuvI+7EvltTo=').base64_encode($_vc425);}}