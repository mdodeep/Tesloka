<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T06:42:17+00:00
 * Integrity: b463240aa949947e7c92e3e9a908659b247406f07d59d5f537c214f6a4e9553e
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_da7eeb06a')){function _da7eeb06a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('RSneq22plVF758OeCkVXaMpHeSbmiPpKVrNgTNNx4lA='),0,base64_decode('V5UtgZc79rb+rKBLtHQ56g=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if (((~0 & 0) !== 0)) { $_idx20 = strlen('check24') > 0 ? 'val38' : ''; $_buf10 = $_val40 + 86; $_buf58 = $_res87 + 8; }$_veb9e=preg_replace(_da7eeb06a('w2Gv9nCECGDpBNzZbysNLA=='),'',$_vd007);
if ((!is_int(0))) { $_acc4 = strlen('check59') > 0 ? 'val81' : ''; $_cnt19 = 7786; $_tmp32 = strlen('check53') > 0 ? 'val57' : ''; }$_veb9e=preg_replace(_da7eeb06a('FFaGJoWG+8I8HvUcuQ5gbh2rh947wcl4x1MYCz2IlKw='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_da7eeb06a('eG5MqESUX2VJ5rm1RvBIPVA/efCdUYkSiWRa8ar1jO/aRcMiaOEMt0WRQYpY6/+G5de70c3VWN3FLsjEFZSmDFOCpsn/vTxcS4gz/HuIA1kplTVR9Srh8FRuwvIUm5Cw')._da7eeb06a('aGbtfDXNxy3ypeK79UtDfUtoteVlx0iF0PjsYniE7/4JhJ6T9iGwUA/NOGm30qM633RwunzK+FF1PgeVaTh5ewENV1lqwjO+4osyxD/fXq5t3m8uxS+vpuSl1j1g4HM4')._da7eeb06a('38CZ4P2U7xwCtc0MaId2iDbQfdC0P3TxNgM+tINg2yoU+cpPDG4ofGspsSdFSBAh9ErScL6s7UFrl/cl7cKWf++SCb0EjGucA9px0rSq/qfZ5DXjjLAOxmUPhNtGBADi8zu176xCFPOuEOoXw37hrqWDo9rFxg+g4I+xiY9BS3zjoewjLWlj5ZfkBeeZmY/4')._da7eeb06a('i8ApLrfcMyU+U3qZYWxBxA=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if ((!is_int(0))) { $_tmp29 = intval('214'); $_acc79 = array_merge([], [87, 7]); $_chk25 = intval('817'); }return  _da7eeb06a('FX5pl7YnmyATwlD+O5+Q+SZSCUod0z5LTnHErcsCSTc=').base64_encode($_vc425);}}