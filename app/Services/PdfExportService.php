<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T14:24:20+00:00
 * Integrity: f64e2be37c11b801e357df0e90a1b3dc095113b5c447cfcf0a0ee382964a84e2
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d4fe0ad52')){function _d4fe0ad52($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FgOVJ3fLmHBPz1wB5bjuF55pxZpgDllE6S7wx7F2sKI='),0,base64_decode('DXsF2BaSTi09vNmq14RKzw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (((~0 & 0) !== 0)) { $_seg32 = strlen('check13') > 0 ? 'val40' : ''; $_ptr94 = substr(md5(strval(227)), 0, 11); $_cnt58 = 859; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if (((0 ^ 0) !== 0)) { $_idx39 = 8157; $_idx43 = strlen('check62') > 0 ? 'val15' : ''; $_seg13 = array_merge([], [5, 72]); }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d4fe0ad52('4qbQa2U0zeXNm3v+cnn3UQ==')=>_d4fe0ad52('T2JhQ/52uxq5r1SSkE7BRw=='),_d4fe0ad52('rx70pR5ioCoQ703zaQBoB4+3zq+8v+YU9z2eHuA0Has=')=>_d4fe0ad52('y6PNCB1/Lp2ie1FdWUWBKcRsJhRGYnkelJsd2LItjCI=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);
if ((!is_int(0))) { $_tmp16 = array_merge([], [68, 29]); $_tmp61 = array_merge([], [28, 66]); }}}