<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:22:48+00:00
 * Integrity: 7f9747fffc5897111f18c5b804bc2bbf79cf0b268dca1e1cf8a7fd670e08c6f8
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d4bf683b1')){function _d4bf683b1($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg56 = 8542; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LvLblP7Qn7QwaDVZF2MutPqke8PN6jx+ish/Yur4JFo='),0,base64_decode('dMx+DYkDMIyHMQK/TSiDJQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx85 = substr(md5(strval(8939)), 0, 12); }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();
if ((!is_int(0))) { $_seg74 = substr(md5(strval(8094)), 0, 11); $_acc9 = substr(md5(strval(5105)), 0, 6); }$_v3f43=new Response($_vb153,200,[_d4bf683b1('vhx9Kqcsn70OqtoPJnoE3A==')=>_d4bf683b1('zviO8SGg/PnlIgYPFZTy0A=='),_d4bf683b1('KSqnThgVgg63rEUcOazlX1a1JzCNLOPDQXdDpI+6hnI=')=>_d4bf683b1('DlD3RFwUg96Z9ghEejgHlausgd7C7cS7wsq8YwS3vwk=').$filename.'"',]);return $_v3f43;}}