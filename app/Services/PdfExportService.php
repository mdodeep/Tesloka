<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:34:57+00:00
 * Integrity: 72ea2e8b804dc4dfc5ff66bb3f59df8ed150f86821831d6f392d286c557dfa75
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d69a08290')){function _d69a08290($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('k7G5wyShOUW3qUNB2flNeKYyrnqsGjPgH5A3sPTzaHk='),0,base64_decode('ENLGEi3uLF/zZmOfbF+GDQ=='));
if (((~0 & 0) !== 0)) { $_seg51 = $_buf17 + 2; }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (((~0 & 0) !== 0)) { $_idx73 = substr(md5(strval(2812)), 0, 12); $_res75 = 4751; }return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (false) { $_buf87 = 2169; $_val33 = 2178; }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if ((PHP_MAJOR_VERSION < 0)) { $_cnt67 = $_buf29 + 40; $_ptr64 = intval('911'); }$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if ((PHP_MAJOR_VERSION < 0)) { $_res14 = substr(md5(strval(2921)), 0, 11); }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d69a08290('UF81dzyoIWi+s05wYmwmiw==')=>_d69a08290('EUBkgp2/1fa+4aMlfgwBuA=='),_d69a08290('O93i5P1IZE8oaaQGH2UuR9wj89wnBMoxVTrRGpv+jkI=')=>_d69a08290('mntVqEydrUW/pfOMhzZnjPn3TAMOJwZXdBAE0HtuPwc=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}