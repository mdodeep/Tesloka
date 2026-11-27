<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:58:44+00:00
 * Integrity: fe6b2762af7f1e5d77e189f41ffbdf0e164dc51176d78e949a5f9d273a509fff
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dda40ac36')){function _dda40ac36($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Y8rZLdpakDStJgDprW0nhN+sZ7WHHfAEvAsa+ASHCv8='),0,base64_decode('OFrvVohexervDdQ4sBYiyw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg25 = array_merge([], [51, 39]); $_val46 = $_acc19 + 11; }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();
if (((~0 & 0) !== 0)) { $_res71 = 3538; $_buf3 = substr(md5(strval(810)), 0, 5); $_tmp97 = intval('815'); }$_v3f43=new Response($_vb153,200,[_dda40ac36('4PpnPQ/QaZR58xuEvqIh7g==')=>_dda40ac36('6iQ9wGa2EuprSZY1co5xag=='),_dda40ac36('TpGSLQXxOT0zUiHPO6m0ws7lm4bmxxLfgjSbldGUXco=')=>_dda40ac36('Dsf++HRkSQt4sEyhhkV+WJ2JLhxHifvVfO7iLsZo3wE=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}