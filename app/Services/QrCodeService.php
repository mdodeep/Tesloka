<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T10:38:09+00:00
 * Integrity: 050ebdccf1821ec518511956c64deab5c5aac669ab0060c5197e9747f5911f4a
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d09f3152a')){function _d09f3152a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('91z7MqI8GW71W7BZta2/2/PhWlq37Y/SmjWup/aI+nY='),0,base64_decode('K7gh72EpmN43RvV8otn8bw=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d09f3152a('OT0hZj8upIs19tk0FmTOiA=='),'',$_vd007);$_veb9e=preg_replace(_d09f3152a('qr5TsmtrwtBJrQwFQtipFIZbbY9DKJG7bs2AOzDPhRM='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d09f3152a('TxrOFwn7/JbekvFBKJfAsSjeBIF22+xJm5n4nZ88MasuhMzv+ytMXVJcHwM5lwM4EEEenvmhaPKHQHddACQHWWJyFmY5bQFgdnqlCLrij9CIblyAyxfbAwM1i1138hNE')._d09f3152a('VGmHIb6pAS8yC57nsZUz30AwKaNHK+yWpQpG7x/YwtegEEUvh6cZcJ0/PF81IOmL/AfbYE6mK55Rk3f2xs4F7am2CabFFWCgWPg5UDxZ7i9x2Ykhm37GA6h0/o2Oqjk6')._d09f3152a('Khq/KWWG7ctnMDAL/nloviLHDWJ0z58afLtq7W6tmmmD3obJgxksP6wa7ikf5KtP1H+ERXA1SgoJRC6pIVMs3uFdYMld0hc57jCvtLNZeQGNB/fCQTeNCvt+H5HjJpx6M3goY6cKbd/sdvVz1D8FU3suAbVMEnaabKv1M6BKanMaDdwZIm5VF7+bOMqrWaWq')._d09f3152a('vDbfOyKx8cowcWNNxf672A=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d09f3152a('4sZOmcRb9KI/1R8sGahvVENVyEfEdisccNW4TkkiTuM=').base64_encode($_vc425);}}