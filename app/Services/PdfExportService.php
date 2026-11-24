<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T02:29:34+00:00
 * Integrity: b01655018c94d9a6d98ce3abbe72200d33cd62dda25971490828ecaee8340877
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d1dd47c35')){function _d1dd47c35($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_res19 = strlen('check74') > 0 ? 'val6' : ''; $_val30 = substr(md5(strval(7869)), 0, 11); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ikrwsZ5MOBAYTrsBeU60pEddAJNxpX91mQtIIjcCzuI='),0,base64_decode('M4wWu+aXMF8H7MT5av8BOg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if (false) { $_res1 = strlen('check4') > 0 ? 'val68' : ''; $_idx85 = 9797; $_buf8 = array_merge([], [90, 44]); }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc15 = $_acc55 + 8; }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if (((PHP_INT_SIZE * 0) !== 0)) { $_res37 = strlen('check43') > 0 ? 'val88' : ''; $_tmp24 = $_seg97 + 46; $_acc86 = array_merge([], [42, 65]); }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d1dd47c35('iUYePRs+tZCPr9HBsoMReQ==')=>_d1dd47c35('NCg/Iiu7q1SDQewCKO7KxA=='),_d1dd47c35('oyIQjtjRns9a8zKIYrzEJd4wMjwm2meNEPprpwHiZ6o=')=>_d1dd47c35('HPLlrxfHa1cNhCQZ4+c6WITfCuQpRWchj8smGF38/5w=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}