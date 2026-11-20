<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:50:52+00:00
 * Integrity: d7c66562ce4a107ebd4de40abb8e2b11b36632b113893ffb61b3747d778543fb
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d1f693d99')){function _d1f693d99($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk30 = $_tmp72 + 47; $_ptr65 = 4675; $_acc9 = substr(md5(strval(6572)), 0, 4); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('NaYPGbQ2fY8lLBbZ1xsm44DvNWKeCRcDVwWsuQUQU8U='),0,base64_decode('6zyJ8jMH696vqzN84NLOxQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_tmp72 = intval('862'); $_ptr29 = substr(md5(strval(9046)), 0, 12); }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if ((!is_int(0))) { $_acc88 = substr(md5(strval(7997)), 0, 11); }$_vc015->set('isHtml5ParserEnabled',true);
if ((PHP_MAJOR_VERSION < 0)) { $_buf90 = $_val53 + 74; $_chk46 = strlen('check83') > 0 ? 'val98' : ''; $_tmp91 = array_merge([], [7, 84]); }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if (((PHP_INT_SIZE * 0) !== 0)) { $_val65 = array_merge([], [99, 50]); $_chk59 = array_merge([], [4, 48]); $_chk33 = array_merge([], [44, 60]); }$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if ((PHP_MAJOR_VERSION < 0)) { $_buf34 = 3784; $_val69 = intval('206'); }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d1f693d99('hPDso4f7unj8IwIHEKPq8w==')=>_d1f693d99('oI5sk7dBiY68CQrQYZ2Nug=='),_d1f693d99('aTBN9a0qDZIkvT+qrX1ckF1Uq0VmoNQQjUmqRpH2MJY=')=>_d1f693d99('yOWHts3FcpXfp7yiARo1tNR3vVACe1tvsTZGjxBTf4c=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}