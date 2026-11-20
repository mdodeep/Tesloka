<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T10:38:09+00:00
 * Integrity: 050ebdccf1821ec518511956c64deab5c5aac669ab0060c5197e9747f5911f4a
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dbcd7a410')){function _dbcd7a410($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('SvmuXcMYRpdBGzO+h6MS26maNGNsAJjmiEZWtriMlZc='),0,base64_decode('DN2HPKCzYpy7gIAEmsdNbg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (false) { $_seg9 = $_ptr57 + 56; }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (((~0 & 0) !== 0)) { $_chk13 = 9289; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (((0 ^ 0) !== 0)) { $_cnt96 = $_tmp50 + 53; $_seg67 = 6902; $_seg1 = strlen('check68') > 0 ? 'val20' : ''; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk68 = $_chk78 + 97; $_cnt85 = strlen('check75') > 0 ? 'val7' : ''; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dbcd7a410('cuF5+I0q0OTSvpGzWtfheQ==')=>_dbcd7a410('32QWqHFJ5EwSVRJ0kGkceA=='),_dbcd7a410('Al/lTVpPqMB/5nXBiO6knp1dMqJFPW6dgjL6vYvL5Tg=')=>_dbcd7a410('WQ+xV9KiErlrfNgjjDLemasMTK5kSpfrLqFIRIfDd8g=').$filename.'"',]);return $_v3f43;
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk75 = array_merge([], [61, 75]); $_seg3 = strlen('check66') > 0 ? 'val48' : ''; }}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}