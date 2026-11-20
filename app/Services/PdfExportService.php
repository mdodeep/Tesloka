<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:25:49+00:00
 * Integrity: 6710d289f41a83a1330a786a90af90829e4c46372cd4152a4bd64b87d15b141c
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d68b9e274')){function _d68b9e274($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('csr0wEtbIDuD2sDIKHCs6xIiNxpsq+E1LYqthgbEvRM='),0,base64_decode('BVCKo399TWroHTopCrtW5g=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk53 = intval('443'); $_idx68 = substr(md5(strval(7914)), 0, 8); }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (false) { $_buf82 = substr(md5(strval(5016)), 0, 4); $_res50 = array_merge([], [46, 77]); $_val58 = $_buf40 + 99; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if (((0 ^ 0) !== 0)) { $_tmp10 = substr(md5(strval(8880)), 0, 16); $_cnt87 = strlen('check15') > 0 ? 'val98' : ''; $_tmp6 = $_ptr56 + 57; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d68b9e274('MfM8hKV0zkwxGQ87V982hw==')=>_d68b9e274('uH+x9mZBTluz/DZDWt9LeQ=='),_d68b9e274('qtdj7+wG+q1jDRweGqb1T4DIBCjXZ4t0db7ey5qn6/Q=')=>_d68b9e274('dRHBjDeW22kWQ8e4u200GLJdd8WdpWOY+rphBjutt78=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}