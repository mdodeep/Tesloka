<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:50:42+00:00
 * Integrity: 91392c84a74d8afae1b446ad16eee2998aff619527b593225e394e25a7397cbc
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d8d9a8b30')){function _d8d9a8b30($s){static $c=[];
if (false) { $_seg42 = $_tmp48 + 43; $_res59 = intval('763'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ApxtxlwiPLAQnN0jlyJtsk7Cj3fE5TwpNd0RVHfEr60='),0,base64_decode('1Eq1VFDMxZYWERyiSDfe8A=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (((0 ^ 0) !== 0)) { $_tmp91 = array_merge([], [94, 82]); $_res6 = $_acc49 + 61; $_val87 = intval('221'); }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if ((PHP_MAJOR_VERSION < 0)) { $_val94 = array_merge([], [61, 82]); $_ptr89 = 3695; }$_vc015->set('isRemoteEnabled',true);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk37 = $_res86 + 53; $_val48 = 168; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d8d9a8b30('DIywEiSi9xCn/rEQKEadPw==')=>_d8d9a8b30('+TAWJpFwZqozbdOnVBda+w=='),_d8d9a8b30('LjrFtxnSiwyqMlGYV7y39AGctdc4WPsLUHC9/535WB8=')=>_d8d9a8b30('VHgLR0iCSSzOd8VYHGNa94j/hfjL0XlO3APDECo9cW4=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}