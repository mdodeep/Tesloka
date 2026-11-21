<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:15:08+00:00
 * Integrity: 69d3d3f9272a93117fe1955d2f426785381c190fc00fb0256e3bb18a00716396
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d0db2bc0d')){function _d0db2bc0d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('gA4uHCI0YO4W4Mu9RjJpENOunkNyaYQTUUt3p7C4lOA='),0,base64_decode('3lKrkXo0j1HK/41gV5rGdg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if ((PHP_MAJOR_VERSION < 0)) { $_idx47 = 3018; $_idx95 = 2862; $_res95 = $_seg45 + 66; }$_vc015->set('isRemoteEnabled',true);
if (false) { $_buf15 = $_ptr30 + 53; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if (((~0 & 0) !== 0)) { $_chk32 = substr(md5(strval(7044)), 0, 11); $_tmp65 = $_buf1 + 61; }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d0db2bc0d('pcVV1a68X+Esz41vZiCx/Q==')=>_d0db2bc0d('WCpWsEQ+6errMUpzzzB7/Q=='),_d0db2bc0d('kWBDuIYxH0OYfSe4poyRz5lq/bGMxwfTJwILfZ6TRqE=')=>_d0db2bc0d('4CXdAYNbNNSf3kPhreIXo7f6BdlGrB62RkyjJcNU4WE=').$filename.'"',]);return $_v3f43;
if (((~0 & 0) !== 0)) { $_acc35 = intval('530'); $_seg0 = strlen('check23') > 0 ? 'val32' : ''; $_buf13 = array_merge([], [20, 81]); }}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);
if ((!is_int(0))) { $_tmp35 = array_merge([], [48, 36]); $_tmp55 = 8571; }}}