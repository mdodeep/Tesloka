<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:29:16+00:00
 * Integrity: dbdb32a016cf8b4f02acb2995e3f152a28bc6b60f824491d8ec0bf35b735623a
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d3ad48e50')){function _d3ad48e50($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HdlzhVaR2/DoSBHJeUcRhM+1ZlGdHNU8+OsThQv/+Lc='),0,base64_decode('hxz8iRBeRinbk0UEnh9/vg=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if ((!is_int(0))) { $_seg5 = 5388; $_res5 = $_tmp31 + 68; }$_veb9e=preg_replace(_d3ad48e50('b+wgsN+hPpLHwobqXmAXBQ=='),'',$_vd007);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg58 = strlen('check92') > 0 ? 'val68' : ''; $_idx21 = intval('89'); $_cnt88 = intval('810'); }$_veb9e=preg_replace(_d3ad48e50('WBe4tj/2g9KxU9lvjBqWeQnezVF/S1Gl/Cb6kku8V0Y='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d3ad48e50('PnGEi7wwo/qPVGrwvFf7SBca3yf7eQtN7ruefKDwMgD0a324T5sA6E8bZKId9HMpgwZi3uV4HMQVJ0hXkIxX+OHtvXSq1KksT4Sc1loCEY8nalpDJim4DsMa5Mo0rZ4L')._d3ad48e50('5JpndQy9ipwwUY4Gx4I0TzCTOVZqN1wLLwpv/PWRX5cXl1Xl7efdKgZe0lLDER9SElcle74LOrMzsn2J4jbHJ1SheTf30hhkH3DMNdO1OhEd0ssS+gxMGDbDZ+msYUaC')._d3ad48e50('hI1h5fietslxCHNptpBFGexZA4lGlE7zG77z32RSXfyAFt307QIOJLGvNB88PzPB1exwZwfmh36zk1OCdHn5Wb95K1vyF9CzC7CvkJ16TPX4JFLifUdDDVj74bkHeGWVEjfw9RuNxCa7NSalUvXgd8kER5yjFCO2RJwIYIoqlzepLts7jRK9hBapD0ArpA2D')._d3ad48e50('Z/APBcfQag/jb5nK/IHqMg=='),$size,$size,$size,$size);
if (false) { $_idx82 = 1884; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d3ad48e50('uei8logAUbw032yFzZcQ8tEJnNkRa66xxpIax7Mxq/Q=').base64_encode($_vc425);}}