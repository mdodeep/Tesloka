<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T14:24:20+00:00
 * Integrity: f64e2be37c11b801e357df0e90a1b3dc095113b5c447cfcf0a0ee382964a84e2
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d24dafdc8')){function _d24dafdc8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hN/bLbUtZMfiC467eUxaf2XGz3yx5vbvMrgWTNvyhZc='),0,base64_decode('py8pSu+ro4IUlrx2h//G/g=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if (((0 ^ 0) !== 0)) { $_idx54 = array_merge([], [59, 31]); $_res55 = array_merge([], [78, 94]); }$_veb9e=preg_replace(_d24dafdc8('3TnbzeHWYs6BrJOnnJuutg=='),'',$_vd007);
if (false) { $_res7 = $_res74 + 77; }$_veb9e=preg_replace(_d24dafdc8('u9J5aBThJuZjDWyEDG48HrytItnwRi8fbKa3uMo1Was='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d24dafdc8('iOWuRd7RbPQbvvhBwjdKDZT9Ukcyp+webOnUTfjxfC6Zjxv/w/7qVS6sA3lIOQW2aIjesoZsGYwXsm/O/udm3o0zWUGoUY/vnDdO94NhkCHmu9fXuEn7/NjY2wCLYeRd')._d24dafdc8('Pr8neWNKR6o32AkDFuI3dhhhlnYsIo4s06lvWumwbSufc/3Hc5mpTDUqt4wpXjxCGvKm9J8MTVfEh/gVbP156UkClDktO+d/CbVxMKbJpN/eD9VEMXLhpkHxh2YVcwbM')._d24dafdc8('+/4I9FSDPGeqPbjGHUstFvXebyPIpvh5Z8qiY5eXZqxlbDVbkt6eIz/bdbWGL8YAcSXk6OBQU2aW/BdJh7t9NI2xWI3T8/NeXzbu4zYVNRcLbJ0flcSnTA8V5hND935rICmNBF6PnQr3OAJ98FJlgyZXov6aq6esImXMwtE4OV3TQ9247LNtwYW0bY52HfhH')._d24dafdc8('gTuO63SIDIqdqNoznaIB6Q=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d24dafdc8('PfmJ7WgH/ttp4SyRL2Szhp+EkdWIVTXf99W7fx/989s=').base64_encode($_vc425);}}