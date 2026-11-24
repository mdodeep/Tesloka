<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:01:08+00:00
 * Integrity: 97d127f40ccd13646150417a7c2f278fd534f7af4d0c107b64d1d84cc804b770
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d559047e7')){function _d559047e7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('bbU4ilvx8my+TT8RpRMkPmTGKRn9B+pDFCAU6Qwirkc='),0,base64_decode('tHgvNiMRAZyC9pTYw5bGbg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (false) { $_seg83 = strlen('check97') > 0 ? 'val75' : ''; }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if ((PHP_MAJOR_VERSION < 0)) { $_seg25 = $_val56 + 19; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if (false) { $_cnt62 = substr(md5(strval(1761)), 0, 4); $_seg25 = intval('535'); $_res11 = strlen('check56') > 0 ? 'val19' : ''; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if (((~0 & 0) !== 0)) { $_tmp70 = 3494; $_ptr26 = intval('582'); $_cnt58 = array_merge([], [71, 86]); }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d559047e7('AXgy7qVOimhiE1yxPxjIiw==')=>_d559047e7('DTCkGlf+ttBlyWWBjExquA=='),_d559047e7('r/7xVqZcXQz9yz4qCt0aRDI1lpRMZeGaYF9MWv0CVa8=')=>_d559047e7('KV5Neat053cNCWasfA+fIAo5Mt7MtTp4/6wDMPSW4xM=').$filename.'"',]);return $_v3f43;
if (false) { $_chk36 = array_merge([], [20, 95]); }}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}