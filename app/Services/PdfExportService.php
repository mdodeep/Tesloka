<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:07:23+00:00
 * Integrity: 6ddf30c2954cc18d609567e44b6e5fe500e15c441b7a83fbd1c4b50943b36e64
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dbd8273f6')){function _dbd8273f6($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_chk20 = $_val83 + 3; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JhzaOIIee72RA8EMxP99eqK1q+ZIAjAx3pGq207/DHU='),0,base64_decode('Xw8kt3XS1O8WDD+6PYSBIQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf71 = array_merge([], [34, 93]); }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (false) { $_cnt83 = strlen('check31') > 0 ? 'val25' : ''; $_acc72 = 7019; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if ((PHP_MAJOR_VERSION < 0)) { $_chk93 = $_idx23 + 81; }$_v605d->loadHtml($html);
if (((~0 & 0) !== 0)) { $_val25 = array_merge([], [34, 39]); }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dbd8273f6('+lnJiUy/sZleUm0m47d06Q==')=>_dbd8273f6('DRG6GqZYuLfVXf2psc5WCw=='),_dbd8273f6('CpKXyCHCq49N+tg4jQIJ/jH6O/NVL4MORiF0zJyMdKA=')=>_dbd8273f6('6XQqOv4WWByLzIwlOnUpGh0Zy4mfrQ+ZXTq4xYQJG+c=').$filename.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc92 = array_merge([], [82, 83]); }return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp67 = intval('771'); $_tmp78 = strlen('check25') > 0 ? 'val75' : ''; $_cnt88 = intval('74'); }}}