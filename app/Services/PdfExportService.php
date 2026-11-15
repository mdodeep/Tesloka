<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:03:54+00:00
 * Integrity: d48f8c7e7aececd499491f45a7a512843b5d6e2becca482dd100871b5dd05656
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dedf68bdf')){function _dedf68bdf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8r2drlKayEITUg9iNl5EgnLo0IuX3EJI883SFfGTafQ='),0,base64_decode('0sKhT+PZ7feyJ9DH32+6vQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if ((PHP_MAJOR_VERSION < 0)) { $_chk76 = strlen('check51') > 0 ? 'val14' : ''; $_buf44 = array_merge([], [72, 1]); $_tmp18 = 3689; }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if ((PHP_MAJOR_VERSION < 0)) { $_acc3 = substr(md5(strval(1818)), 0, 11); }$_v605d->setPaper($paperSize,$orientation);
if (false) { $_idx52 = strlen('check65') > 0 ? 'val88' : ''; $_tmp29 = array_merge([], [38, 86]); $_seg58 = intval('580'); }$_v605d->render();$_vb153=$_v605d->output();
if (((~0 & 0) !== 0)) { $_seg36 = strlen('check46') > 0 ? 'val6' : ''; $_cnt13 = 3336; $_val1 = strlen('check35') > 0 ? 'val7' : ''; }$_v3f43=new Response($_vb153,200,[_dedf68bdf('9R813ysCqcLsB/wETF3o3Q==')=>_dedf68bdf('sGtqTaU5JBsIMXNvDCK+dw=='),_dedf68bdf('ia52kU7HVuaq93+ba9f3Shrl1dcHv23lwcZumeja914=')=>_dedf68bdf('gOeBdNY/oHCYINPnnNW0y69ao+183WIDdlsqofIUcSw=').$filename.'"',]);return $_v3f43;}}