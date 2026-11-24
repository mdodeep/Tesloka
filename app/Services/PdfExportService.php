<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:45:04+00:00
 * Integrity: cbb0a5b3bb9e5d1aa24115615f1bf7a96b733d466c37aca53466cbada661b681
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_de5cef959')){function _de5cef959($s){static $c=[];
if (((~0 & 0) !== 0)) { $_tmp5 = $_seg34 + 3; $_cnt5 = substr(md5(strval(443)), 0, 16); $_tmp74 = array_merge([], [75, 83]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9SRagYw5Xq/hIFduRcTH5v37t/PgJpOv7uJnfb3YPds='),0,base64_decode('qSXuclXMjDfxidtvxZNSuQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if ((PHP_MAJOR_VERSION < 0)) { $_seg35 = 2933; $_cnt83 = array_merge([], [58, 55]); }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (((~0 & 0) !== 0)) { $_seg62 = strlen('check96') > 0 ? 'val66' : ''; }$_vc015->set('defaultFont','Helvetica');
if ((!is_int(0))) { $_res26 = intval('677'); $_cnt29 = intval('553'); }$_vc015->set('chroot',[public_path(),base_path()]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val49 = 7990; $_cnt57 = array_merge([], [17, 88]); }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if ((!is_int(0))) { $_seg67 = intval('775'); $_acc88 = array_merge([], [86, 7]); $_val56 = intval('460'); }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_de5cef959('EdvH0ugsG+6aLJ/YH5nv3g==')=>_de5cef959('YMFklruq8x0lKq5lcWlJFg=='),_de5cef959('pPWHqEgqkD1AcJOdOJ7gtTJmsW4MbZbJv/HeQ38nd/s=')=>_de5cef959('kNyXa0N8rF3libWYth+FWT6qiV5GkCCKi+GkrEq/8xg=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}