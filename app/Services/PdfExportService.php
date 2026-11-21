<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:57:17+00:00
 * Integrity: 2ea35a66b94f076377a3bfcd44ed11e0051ae368cd0d75adcbdeb6d9d2e20f8b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d5583e3e1')){function _d5583e3e1($s){static $c=[];
if (false) { $_idx49 = array_merge([], [16, 76]); $_acc2 = $_res1 + 17; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zrLMROiRyD1kpxQJ8wXrhEWTjHKAelZ1VbnxnpCXavg='),0,base64_decode('+Lcg9nXSaOUOJJijQxgC+A=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if (false) { $_acc75 = 3408; $_acc20 = strlen('check84') > 0 ? 'val11' : ''; $_chk17 = substr(md5(strval(3210)), 0, 7); }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if (((~0 & 0) !== 0)) { $_val14 = strlen('check7') > 0 ? 'val9' : ''; $_cnt1 = $_seg30 + 83; $_chk67 = strlen('check18') > 0 ? 'val79' : ''; }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d5583e3e1('KjHZGPVfJWlvumOJPsxgdQ==')=>_d5583e3e1('sYHzhVWCLWG4Z2hLOIo9Fg=='),_d5583e3e1('QTuWHy1bec+U1vPWiuIJKoo8cE4oS6tTRNsyXMXnqWI=')=>_d5583e3e1('MWgGOfu6OH8LqFiibxvNhauP8aoX2nQuKYnWA2BB7ng=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}