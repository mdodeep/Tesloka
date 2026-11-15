<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T01:48:54+00:00
 * Integrity: 41afb97771ad12821f3dbaf26706c0d5fe2717d9aff9a950b050b821da5e65a7
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d3d8a1731')){function _d3d8a1731($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('B8/I5N6Q+SVm3jAl1lMAWRgwkRxvx/8h87vO8mkuXZ0='),0,base64_decode('nWsc2NlhSfzSuwqDs4vHVQ=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d3d8a1731('TI3vQ7otPbsaeFNL29UNzA=='),'',$_vd007);$_veb9e=preg_replace(_d3d8a1731('hmkK/sJnK3lCWk4WkS07bSmHCzeiDI90WD46fxam/K4='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d3d8a1731('CG14ulDjnu+Y8pYXqU3cAiSJa72hiS8WCdUwFLk/qMsGPh08DYnkrymMlA2KfoLMt4j6nur8Q6piKYKa6p0uQHKSSwzHHdNT4XwxVel9XOsl/aLeivFHcZZ20bj9piXC')._d3d8a1731('rE3u5ao1pFYfyBX6cyP+7fDC2J0ySZVfA4do1RGzEFxlL+hJ/3JlW1A2nwVsp720f8rBPqhSEeLVLN2bPvIAv3h2sUzLy3wkeo7cnn1cQlzSrwmuO+kLzIyo6uqQXoiy')._d3d8a1731('YFTk7/ZhgByNASzBgMzGFfqnYS4oO9htq49yanMWNJAvcmQqPIFfhyMJtPXHLmQdLLVRgp7i5P7EzTVhwEgsP5EuKfzmlDKND0KPbC+WNmZHO+Ffu8WlmWb0HkqniO8eeQ/B2Fz4FknIg7nw1g7oMW0xRI259Z4X4ivXJLHgJ1TJeOBuvy9lTyFQcpfl91Gz')._d3d8a1731('gx9qHBAoFHyrSB8dJz+bXQ=='),$size,$size,$size,$size);
if ((PHP_MAJOR_VERSION < 0)) { $_buf97 = 2485; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d3d8a1731('cyNpek8vlwiWiJvvcXEZhWqZ6/vteOhY9E1Gd3IU0mQ=').base64_encode($_vc425);}}