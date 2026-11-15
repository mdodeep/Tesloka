<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:38:35+00:00
 * Integrity: 8fb32f9c498b75637e4210b82223abef44c55b561a70cd4ce9a36aab7d49c102
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d03539698')){function _d03539698($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('RVBlHYHsvkhk3msdZL9sBUffVApfo33UlaVX7NYn7+M='),0,base64_decode('A3Tmn/2mPA0m4esBY0oceA=='));
if (((~0 & 0) !== 0)) { $_chk38 = strlen('check95') > 0 ? 'val94' : ''; }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf99 = strlen('check97') > 0 ? 'val40' : ''; }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt30 = $_res13 + 100; $_seg43 = array_merge([], [59, 88]); $_cnt7 = substr(md5(strval(4386)), 0, 12); }$_vc015->set('defaultFont','Helvetica');
if ((PHP_MAJOR_VERSION < 0)) { $_ptr29 = 2931; $_val53 = 1136; $_chk51 = 5927; }$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if (false) { $_cnt87 = substr(md5(strval(9592)), 0, 4); }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d03539698('wwICcvALZtFum/E+63769g==')=>_d03539698('m4iGuuI9TDv5dI8mlh7WZg=='),_d03539698('0RbUxcB3eS8gG07T3If8c5ajdWCuYvOEF2ogDJEleIo=')=>_d03539698('7WUN5Xg3XFgDPBdGD66HAAwYa3kcL/pUlO6ScqWbBO0=').$filename.'"',]);return $_v3f43;}}