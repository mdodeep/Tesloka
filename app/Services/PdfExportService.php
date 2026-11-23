<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T05:03:52+00:00
 * Integrity: 02f237932c0fd9e0121825f9327cd25007f51fa212cda8ade95ced9f8cf6536b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d99fad55d')){function _d99fad55d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tfw/2W0FbteYJejcVGGq7h4pVH6js2R4sYky8gnC5Y8='),0,base64_decode('fEkQlMSsXtojsEr5m2EIag=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (false) { $_chk2 = intval('881'); }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();
if ((PHP_MAJOR_VERSION < 0)) { $_cnt36 = intval('60'); $_res49 = 5422; $_tmp10 = strlen('check75') > 0 ? 'val91' : ''; }$_v3f43=new Response($_vb153,200,[_d99fad55d('dktNn11fzlS9dyzJlb2BFQ==')=>_d99fad55d('UHuZzRPYfaP+KYiBEWuTgw=='),_d99fad55d('NbCCn4AwV2vMI7Xv9XJju0bzvrFUM7Dj/td0VPrnnrQ=')=>_d99fad55d('tM1dIF/vh1ig9RyCB2M/jnL40VlynQB4vMFmVFD9aJk=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((0 ^ 0) !== 0)) { $_val23 = strlen('check1') > 0 ? 'val99' : ''; $_acc48 = substr(md5(strval(9597)), 0, 14); }}}