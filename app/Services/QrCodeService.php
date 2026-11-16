<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:38:10+00:00
 * Integrity: fe4033d7b6eb385e5428c1eb1d82f0d60bf1f043512efa46d00388d8bac87e6d
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_db9e9f93c')){function _db9e9f93c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('TBqd88u2gvrwShiUA+AqGbvqnQpXw8yNPEfpsNbdxg0='),0,base64_decode('T5bEjPSXXNp2pCtsTcSR1w=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);
if (((~0 & 0) !== 0)) { $_ptr88 = strlen('check78') > 0 ? 'val53' : ''; }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_db9e9f93c('Tw/ykmEEZEE+B4FeW5gmOg=='),'',$_vd007);$_veb9e=preg_replace(_db9e9f93c('3Ll3qd5n7NFzyHp09PVYx9bTqVjwGHe6zS6MWbHUybg='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_db9e9f93c('ZF7QV7hfyVbi3hZyDdt5ele97jA60MiOe8zQpSvNGFKK5gC5wOuSs3F6lPKWMGY5GA2NLB9nnc6BNlxBdPwnTWsLhJAEKDjRlx37LIz0Z7imxGBXHoonWRnYQYRO7UB0')._db9e9f93c('JO/GrwiZxph90UxfMkiE1NbZ1+qncTFsfhJ5b57IyCDvyxiDldQJfY5V7toZ33iAK6ySeyM5xnaqwmxz5NSPLdM/Lj+WQsGzQqKDHjAv0n0s3I5LhGxzsJanv22cS/t9')._db9e9f93c('TJ9Hu6gRtniIpPdny+CcJwAHC39VyWxFCHcgrj9EnxZNGwngiIqSjbhybMOfiAs5tOcS9yMlwwANqUyRc7VDkJyXrEtPkLwRq4i/cc2fJH3Y60y2Lkvw/VexNlsM95Fb8S+nlAbneG5KHwwxXSAtVFO1f4+Gvon1gHIGT/Zo4M4D0RgNl96isYCKdcfKEwNf')._db9e9f93c('4BQnXJ95OQR1mL8ntUgEtQ=='),$size,$size,$size,$size);
if ((!is_int(0))) { $_idx80 = intval('991'); $_chk9 = 9642; $_ptr14 = $_chk55 + 68; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _db9e9f93c('guSbO0ZnXgNLStYIje9GymluHvP41U1MpnJ6CwBC7dE=').base64_encode($_vc425);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val65 = 1499; $_seg45 = array_merge([], [65, 65]); $_buf76 = array_merge([], [26, 99]); }}}