<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:03:24+00:00
 * Integrity: aca9a714cd4eb8d0204b58bdf686adbbf2aef1e43088c2af286fb7e526d28470
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_df3a08254')){function _df3a08254($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BNMcKRAfy17lnKHHEc75XHVZyU3A0HjKWbKxLoz+DsM='),0,base64_decode('Rdj+0dUf7C4Pq1Gwhn009g=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_df3a08254('fkaeGbnYbBaHJABONAnsNQ=='),'',$_vd007);$_veb9e=preg_replace(_df3a08254('lp1r4RyD1mAhkDlpPXL/4kHvYt7fBjkwdJmPAxqW504='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_df3a08254('Wk937slLF72xs0hzPDO2B+VQ7lz11HhZkLVwFRd89Grd10jwNqGuFrIMFGiicjy01IhRbbNvQ5riZ8qlo1BvuWEcksQ3pip7vxqu/dhJ43JiiPOHymqRh6h6X589B8LD')._df3a08254('mgYl11/j7MC0QeoPI1pt9FYw/y/r4JVBIPDPi9ZdPjtVOjn2LMGXjS1gyBxyrLWr5m4bCOwi8UXTzNFEYe+xJbDjhTUjcec2L+Jsgy9RX2WRzvUJTMhceXKIUYf47E2c')._df3a08254('SVX/85J3x9VhAK/B8IwxTMt5Fif7jfmEfYA/7FAY42h7gVzpsUtg/ulJAuiHoNdRwx8lPwoCjcI0t5jF016amrSyWvSVJ+R1EIadXaBaU6dui3B02X57F7PRtguCwNfEtxE5Jao8CeSUQxepKqYDdKtohyosg+bGdXFm5JY0HKhza67oqqf0fBNfo79aYhdK')._df3a08254('PRFe3ncOsyGTq9jSHU5/Lw=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _df3a08254('+/d/eYoFd0FCFaKWyYMGfsOQ8KFe1HnoxpD8wzTz4Ow=').base64_encode($_vc425);}}