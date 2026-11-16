<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:50:58+00:00
 * Integrity: 2266da28b3c509b6852b3f5add15de31b7e4092754260a7df476ef5aa85d8081
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_deba418ba')){function _deba418ba($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hRGcS72uRjKwRSDXUGnXwvwxvcBCmd2Z42JQij3G//k='),0,base64_decode('c5bUbhVFyxyU2spFc8Q3NA=='));
if (((~0 & 0) !== 0)) { $_acc80 = 5424; $_cnt97 = 9544; }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);
if (((0 ^ 0) !== 0)) { $_ptr50 = intval('215'); $_chk77 = intval('14'); $_acc27 = $_tmp20 + 75; }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_deba418ba('/UJMh5dmNZ3gbtYr7ZZZWQ=='),'',$_vd007);$_veb9e=preg_replace(_deba418ba('0RwpHxDqA2usgE3rkQIBO6a6M/Ti3s1gvx4RcNNeyEQ='),'',$_veb9e);
if (((0 ^ 0) !== 0)) { $_buf20 = $_acc36 + 49; $_seg37 = intval('322'); }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_deba418ba('5FVK7sJfoOgZ4FIIcCo0KR/QLrY7MgailRDg3EMmQMFBvPLmYSbUJsxM3v9FvU52ju6g2Hcxeqbno9w3hGYyBjrRk7HlBFN2Jld1dJfUnzDBR0orTcdixU+nixOPMRb8')._deba418ba('veiaiEIxLSNJU2dmV0s9a8XHrUkEzxzbUGuahXKLIccptLsZa371PI5b7LVMzCrZj+zF4a/3AFYHOtTTxIY5692DPTtWr6lXX5Hw+Zoifz4nkJbnlK/A5ksIzNzW0vdk')._deba418ba('NvbdxCZ5tlvyOHSeGbuDkpZuOHuK5vPsivXRiINYW/5duDzA9ykv4/6diznbqlqumrFBmqbieBzvQZYoj5BimSTnzcBMQgXwB8BGnbESsmKhu69HBl1BZUgXpQnhoXndzlP/mLTMtWOzrYJ7BBWSmuWHNNVUsgp+NkBTGYYx5yiq4yiG2/Mq1h0SEyFBosnp')._deba418ba('77I+rl8K7ZL927k2+aD6Jw=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _deba418ba('vGY17mN7ZD7ax5GbI7Qakv6N4PI8pzBAL4UDeZBYCc4=').base64_encode($_vc425);
if (((0 ^ 0) !== 0)) { $_idx81 = 3581; $_tmp73 = 9549; $_acc24 = substr(md5(strval(4421)), 0, 10); }}}