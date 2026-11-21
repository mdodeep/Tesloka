<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T07:04:02+00:00
 * Integrity: d4d5761f50219bb797d696d526cc028b2469eaa46416f42a5b65935306e2b5a6
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dab03b596')){function _dab03b596($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('TX1n2g9+W7CCH9uR4hAFU7V0CLZANFs74/isWLxNl60='),0,base64_decode('VW+mX2WOVTanKznDnqt/Lg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (((0 ^ 0) !== 0)) { $_res36 = 6248; $_idx62 = 7079; $_chk18 = array_merge([], [9, 43]); }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if ((!is_int(0))) { $_val65 = $_seg13 + 8; }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dab03b596('CqCVpObs5MsJP7dXGkeEWA==')=>_dab03b596('NKrL6xzlwKOYZNl3TL3wGg=='),_dab03b596('X4QY3DlZhqWQoww+0RfP4cttCoFYHcRE8dYIcJmq8rE=')=>_dab03b596('AXcsNLPbav2fxM6R4a33YyCAcsf2geXHSbQ4zMYGJSI=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);
if ((!is_int(0))) { $_acc61 = intval('455'); $_idx84 = 9342; $_idx62 = array_merge([], [9, 22]); }}}