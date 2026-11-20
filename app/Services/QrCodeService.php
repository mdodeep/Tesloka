<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:12:54+00:00
 * Integrity: 3cda86e7217c6b29eec63df29fb1f17eddd6d301aaafc27934ba4aaaa2410493
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d2384d105')){function _d2384d105($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('gKQLtJZrqMU+qx/BF8oM1LwxU+lGqwWb7NKe68Fb5oU='),0,base64_decode('ib0dNpfbFSFC4LpkcShHRg=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d2384d105('4+tSfr51Pt678EXHr1JMVQ=='),'',$_vd007);$_veb9e=preg_replace(_d2384d105('3/8qds7lJS4VIb61i1E2EzPuTuZx9dlmnr7bzFN/YQc='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d2384d105('uD69DLkIuCHCrRwz9Bzky0CX8Ro7SkKtPY2GhKo84QjkmoUTq668g97p9h297kMgGgdtjpL1AhMc5djJimh/6NbVhuXoelO6K2pVnwF6RTbFGNtzw0hrdijmI6ZW8Xil')._d2384d105('O2tY7EOVwDeAu1XJW+0JA8az6t2swZrcl8CIXeTO/zKoq/gjucBIE7WCRFAIP2PLTr1gOXm5mtBbdSSmXyL915Om3vngSz0fBOWsS9/RzNaV9G1pZOTSg35+ZVoLKoK0')._d2384d105('JrSLfxBQ1Nzw+FohQuB3tAKRR7f+jh/9t2iQzqpTsw5DWLuH/cjbwKNxY5T+reNmvVS4h676Sd+FgQZqIOdOZea5aj2joBzLLep+46xC8Koce7my5/ArLKcV+IshSot55RAWkTrayNxbo+GAguyDenLJwwCgyAvaaPoUuLNNQrewuNPZXn7Z8xmGpmH286Dx')._d2384d105('fAway8Pwn7AKkUkHnyM6Dw=='),$size,$size,$size,$size);
if ((!is_int(0))) { $_ptr21 = array_merge([], [76, 21]); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d2384d105('3o68CajVXWICPlKGcB7oxt7VNn1oykA/SnoIc3EHq+k=').base64_encode($_vc425);}}