<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:38:35+00:00
 * Integrity: 8fb32f9c498b75637e4210b82223abef44c55b561a70cd4ce9a36aab7d49c102
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dcdbac5b5')){function _dcdbac5b5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('RwshDXmsUtHaC6t6qfgh8uFII1t3+rWgZjH6e2x6RFk='),0,base64_decode('ezm7rV1fGGxPxw2V11U2eQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_res95 = 391; }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dcdbac5b5('SyNbXF+ieWBFirILgM5eEA=='),'',$_vd007);$_veb9e=preg_replace(_dcdbac5b5('g9ekYgmP9lct0x9LsP/riEmmv16jn08HQplF8bUQ0Wk='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_dcdbac5b5('GIq10p6b2tstHOvU+K0Q2VWQudCSfvFg+CSEpKqG6pjxofpl0E46UMYYl9JGktZfY9qR0BrCmrVK3H3hCrSUH5tXO9eFZq3lC0YqTLjIPfJ5CRtzHRfSg6YpNfCpEE0K')._dcdbac5b5('c+617v0zmJVvf+GQKwXrk2K3mNJFu8t5Swo4gVXKeA44vm5WTuk2icTsn52D9yFHWZVBEW5naDR8cwYBwdI76rqyJ6MzUV6rYOfGhwCQydDAfTzM1xYWLJT3TyIwAl9h')._dcdbac5b5('Yg1x0j1hPyi8JqFBvhpF7y0zHW8MIkysIveVmzGufCcmJnxFPLDrhPHdB7eoktcu86cjrbS071pXeTPlGJxpqD2dkmenUVVY6MSAKffae0A/Qru1iMuAOeiobnpdxkNtPbFc2iXkE4cixY/ZwsxIvtXcK1fhQwws05ZH3E+ywNwAX5qGp4HpDCPS6rjd79uf')._dcdbac5b5('HhW3rraw6YQdMVdnKgmLVg=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _dcdbac5b5('d5qwfEWvc2t7IBR2GlIn6k7sweLQjDl/6JDigNXECIk=').base64_encode($_vc425);}}