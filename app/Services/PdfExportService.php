<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:50:49+00:00
 * Integrity: 6e48eacd37c0657c17bcb61b20d2efb1699df9d30aeab06f678e96aad97f6c95
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d1d8ce93b')){function _d1d8ce93b($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_cnt16 = $_cnt8 + 85; $_cnt44 = array_merge([], [13, 18]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('M8Xn3NQ/JK7pnAPH60zTQAyighHcZCsiApL4cu8RONo='),0,base64_decode('P+d2XAw9psLvhDFzu4D7aQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (false) { $_idx30 = substr(md5(strval(3322)), 0, 14); $_buf53 = substr(md5(strval(4026)), 0, 14); }return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((0 ^ 0) !== 0)) { $_idx4 = $_tmp81 + 5; $_tmp11 = $_acc75 + 15; $_acc99 = strlen('check1') > 0 ? 'val17' : ''; }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt32 = $_cnt68 + 79; $_buf30 = array_merge([], [94, 98]); $_idx61 = 4266; }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();
if ((PHP_MAJOR_VERSION < 0)) { $_res60 = 2367; }$_v3f43=new Response($_vb153,200,[_d1d8ce93b('iiXpmtawrkkNHKf9I/1eFg==')=>_d1d8ce93b('TtK3Hfbd8FhqfZs3ONPSeg=='),_d1d8ce93b('qVhx7aHPUeREehpbvD2OSVwUkp/RwoMBb3vuSMxMk18=')=>_d1d8ce93b('oEScv8q3v9VlZe6c2oNFQT8u3joGuUtapqZ4o4ysI50=').$filename.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val90 = array_merge([], [29, 13]); $_res82 = array_merge([], [47, 94]); $_seg93 = $_res0 + 88; }return $_v3f43;}}