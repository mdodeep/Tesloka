<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T22:15:49+00:00
 * Integrity: 47d77785b7693bde6cba101c75e2ba7d523281db8c0cc0ae672ba68f3781cb9f
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d2a6e263f')){function _d2a6e263f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('y1yPB5o1lksbjzImnUxGplRYiu3ng17ge7LiO+EibDo='),0,base64_decode('uclp0DJ4TifksSKRARrmvA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if (((PHP_INT_SIZE * 0) !== 0)) { $_val31 = array_merge([], [25, 91]); }$_vc015->set('chroot',[public_path(),base_path()]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val0 = 5509; $_cnt77 = intval('253'); $_cnt73 = 2497; }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (((0 ^ 0) !== 0)) { $_tmp7 = strlen('check68') > 0 ? 'val78' : ''; }$_v605d->setPaper($paperSize,$orientation);
if (((0 ^ 0) !== 0)) { $_tmp48 = $_seg75 + 25; }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d2a6e263f('mx/fwLOgCn1vWA8zcyqWEA==')=>_d2a6e263f('szvSPEBkJVGUatvVNNwEPA=='),_d2a6e263f('z+4aL/1hs4mnTsMyhnrEVVX38zMY6F8IvFPCYGVPXxA=')=>_d2a6e263f('EGD5alyRcQ4X0DwsjVy/YjEvBcCm31YutVbCSp3/oWM=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}