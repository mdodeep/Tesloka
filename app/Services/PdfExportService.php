<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:17:30+00:00
 * Integrity: 4796eb2c7e73703db2de83bd99b7f99fe97db3be758f81b3554c88decfa9bd87
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_daf776662')){function _daf776662($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('feRryhgzYviVqVD0v0RcDXkI4863iu5eiPEs8P2T6nU='),0,base64_decode('geh1K6L4RG70HrXpBiad/g=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (((~0 & 0) !== 0)) { $_ptr5 = intval('530'); $_acc31 = 1496; $_ptr76 = strlen('check98') > 0 ? 'val54' : ''; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if ((!is_int(0))) { $_val2 = $_acc19 + 30; $_idx92 = array_merge([], [65, 32]); }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if ((!is_int(0))) { $_val38 = array_merge([], [56, 97]); $_chk0 = 3170; }$_vb153=$_v605d->output();
if ((!is_int(0))) { $_cnt49 = array_merge([], [65, 47]); $_idx42 = 7875; $_idx73 = 2168; }$_v3f43=new Response($_vb153,200,[_daf776662('RR5nTQbI5TI/gpA6Uiczcg==')=>_daf776662('LchWx9JpdyFw8xSxI5nAIw=='),_daf776662('PKBjfQHw2iLb0YeJX0cTfTnzhtqzjP8o0v7aKd7GM3Y=')=>_daf776662('yyiIB5ah9j1AM2y+Bj5oYnEvEpeml/uL9JHgqJGQVJI=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}