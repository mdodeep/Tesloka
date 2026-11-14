<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:24:08+00:00
 * Integrity: d265ea50dc5bbc689fa520fd4333b1bc1a3d5e6acda2777d1c9a7eca14bc6d59
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d2aad2e2b')){function _d2aad2e2b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qI3CltSwvkAbCvJht8dVEo5eLW3NfOFnvhPjGGFzEKU='),0,base64_decode('6YUcCkOksu3FCj3YjjRjHw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_acc75 = intval('869'); $_buf0 = substr(md5(strval(5250)), 0, 16); }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if ((PHP_MAJOR_VERSION < 0)) { $_seg71 = 2190; }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d2aad2e2b('gwDaIQoO+7LUpWhKgl1Y3w=='),'',$_vd007);
if (((0 ^ 0) !== 0)) { $_seg21 = array_merge([], [75, 93]); $_ptr19 = intval('57'); }$_veb9e=preg_replace(_d2aad2e2b('/HBH76SF4FkE9Me5+nb7IO4TZz2hUvRAvaRZHKoNKbc='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d2aad2e2b('Wi7KQAOB0YKycnOIPnB1FSrqeW+cNUhyLMg4kYodZWgwCVAy65sJt0wAo322zw4Nls5VYwUuY2mi0bnOJGYiUsxh/2nQHUlKzX8XaPLkL3cpm+OhVq4DvJnWMc6uFoHR')._d2aad2e2b('z/Yuu4O6HJEUYr8Wze+rMPoUj06c2IrAk3DY3PN6XdQp6WZrmdXmvPvFi9nphn4f34QIPV0dPUXbRt99D1pomKxOa6UMLzz/krTiyeavwM9h/J3iKKXNj0HyUVXigFbg')._d2aad2e2b('fjxm6QXOj12F2Kj7l0K54RTbqztCAslsJ4rB56ESwDdkZFYpPEe8ea0qixEygXoRAzCRSZn2CComQevMsrjTPrV0AzvtQJjlN4KqN8ysU7RA+HxNtMWb4G52UGajBaR28odAeqM2BxtL8BNsiXXV1IGOGBQHn+mbIm76kVD4msFt2MklKk/GiCHUl/Kz9rii')._d2aad2e2b('tnToNzWw8LFOzva6eH7B2A=='),$size,$size,$size,$size);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp79 = $_buf12 + 48; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if (((0 ^ 0) !== 0)) { $_acc90 = intval('37'); $_tmp16 = array_merge([], [82, 84]); }return  _d2aad2e2b('V8FuqxjaTvnlFcAQVICM773j2+fTZTqlHhL4p6un854=').base64_encode($_vc425);
if (false) { $_chk14 = strlen('check27') > 0 ? 'val31' : ''; $_acc8 = intval('541'); $_idx4 = substr(md5(strval(1295)), 0, 11); }}}