<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:06:08+00:00
 * Integrity: e4888b447b2a31f14335c2fe390a5c02a90f3c51dd924200e5f946bf0596632d
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d614a77f3')){function _d614a77f3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VQz22exAYZV8ltlkjmZRw+ATV4ayJxYqVOW9RNxoEOQ='),0,base64_decode('qh/BVHeqJQubrZtdl6io1Q=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if ((PHP_MAJOR_VERSION < 0)) { $_chk52 = $_tmp77 + 81; $_ptr28 = intval('74'); $_tmp44 = $_seg89 + 11; }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();
if (((0 ^ 0) !== 0)) { $_val44 = intval('366'); $_seg59 = strlen('check97') > 0 ? 'val74' : ''; $_chk0 = $_val39 + 73; }$_v3f43=new Response($_vb153,200,[_d614a77f3('GOSTQ+FKdT7GPtqIEA+Xrg==')=>_d614a77f3('Vw8IMx0YcWGhwmZGoQiJ5g=='),_d614a77f3('BoUvGH7/a44Sn5/BowSXH9sXCLwYYtQSdV4YjPTOSNg=')=>_d614a77f3('s+ZLVW1jPcXT+ATtF89oM8oXh1aE/+OeRJlAOhPjYP0=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}