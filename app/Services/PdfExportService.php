<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T23:08:28+00:00
 * Integrity: 5c94317afd2613abd4cac910af081de6044c3184fbb4b7b29ec81b4dba5e2cee
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d6cd26a46')){function _d6cd26a46($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uTNYI6AfziniT5qH6oHkg00Ogf9ZDPRAGDv+wHzMxjM='),0,base64_decode('J6ZqGakqAHmECzNOnvB5uw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc86 = $_res68 + 25; $_ptr12 = array_merge([], [36, 45]); $_acc68 = strlen('check58') > 0 ? 'val3' : ''; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if ((!is_int(0))) { $_cnt84 = substr(md5(strval(9304)), 0, 10); $_acc19 = array_merge([], [0, 88]); }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d6cd26a46('qWoXxALMsNZn9Z2tgjqfjw==')=>_d6cd26a46('f+jSmDlb4g7Y6iSRHm+vwA=='),_d6cd26a46('IFPrkpvRHpT4mPFjTrB+x0ihiXue4MsVbbcS5ZJMZIA=')=>_d6cd26a46('YRZT1EFe0aA16/YwSVC199GXgWBUIVI+d6bIqmjSlms=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk65 = substr(md5(strval(4134)), 0, 5); $_cnt7 = strlen('check76') > 0 ? 'val15' : ''; $_tmp64 = 6469; }}}