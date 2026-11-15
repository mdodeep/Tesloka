<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:06:38+00:00
 * Integrity: 7739a7ece3bb4864174525cee18c8baef6620255a1c0847f879a38284105e849
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dd6f931b2')){function _dd6f931b2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6pQfn7yk6hO3a/qLwtlrhvxHY78XnTgFMJBCD7I1s2Q='),0,base64_decode('ykumwBypcz5MjnPSxuXTGg=='));
if (((0 ^ 0) !== 0)) { $_seg79 = 3800; $_val81 = $_val33 + 42; $_tmp48 = intval('794'); }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dd6f931b2('xfV4ZI5E5W8D3CMKsCsiKA=='),'',$_vd007);$_veb9e=preg_replace(_dd6f931b2('dmwZ56Lwt1s7of2DfMTzkiligrd2O9L/j0J37VCyibw='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_dd6f931b2('1GT2nNDTTuMWtRzQKlhGqCUR5icg0YhQdp2AhFDQj89t3PeDwFjbaoXqRVozEVcfgcvkQcbftgmPDIVu0v/V90s1MAJ8/aFT3pAIczG22f0D0MlN4wuxn10EXtoJchF8')._dd6f931b2('cViwHvbQk6MxrVm88D2VUYme1ZyXg7cN2T91R00jnFjLz9FoyqYSL1UDJ5N0R4pGsBGqHQYJ0XWp7NF+Q9xgFikSG5mudTtd7agZJHN3SbzZ9lz03k+UUHdpz9V8A1wW')._dd6f931b2('CEyCi3NxbOq1Z/EKr9uSn8Y7fzzphlyuTbzL6QbseV5jRV1ibQ/03jqtBosKVvB8AnA6enaopbLdX0jHJ+/gFR261kL1ei34cpMdCKvwXLXxNDL1qcLK2L43CLaCsPZGG2Kti7I9qRLifoqJW3D+wZd5yxG1TSYH4HbeJtIFqwVLoGBA1x5KWOGMKoLyBZZW')._dd6f931b2('jNu3ZaO/6jcIZrH7+1WQ9g=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _dd6f931b2('WwR1gQPojMnHJH017/wO8Rllr9DpshJwvFDaiFu6WTw=').base64_encode($_vc425);}}