<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:07+00:00
 * Integrity: f8c4332bd67aae3c587680614a46fc9b4181ff2fd87a8b910110ba6f1cc4c7b7
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_de0fa7dcb')){function _de0fa7dcb($s){static $c=[];
if ((!is_int(0))) { $_val9 = intval('817'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OZOT96cD+ED/7Nj2FW4vsRV/ZSet6sWj2+ufp/nOgjo='),0,base64_decode('yDXwhBThGyeS4Ag324ONmw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if ((!is_int(0))) { $_acc72 = intval('187'); $_buf60 = strlen('check50') > 0 ? 'val4' : ''; $_val68 = 3172; }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if ((PHP_MAJOR_VERSION < 0)) { $_val83 = strlen('check51') > 0 ? 'val84' : ''; $_acc68 = $_cnt37 + 26; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if ((!is_int(0))) { $_cnt27 = strlen('check89') > 0 ? 'val48' : ''; $_acc2 = substr(md5(strval(793)), 0, 5); $_tmp77 = 7944; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc7 = strlen('check99') > 0 ? 'val38' : ''; }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_de0fa7dcb('dG3tXwfJ11hGXcWkS+mJZQ==')=>_de0fa7dcb('zR53+35oP4Msy8wN8dQr9g=='),_de0fa7dcb('RewxD6GUZIkmTXoeDQ3Xb0J9xzZW38ghtnEFcvSmfWA=')=>_de0fa7dcb('kA1vvokmjX8BiBMgJPR9fHd6dv+LSccLfZFEaJgKIbc=').$filename.'"',]);return $_v3f43;
if ((PHP_MAJOR_VERSION < 0)) { $_tmp88 = intval('698'); $_seg1 = strlen('check67') > 0 ? 'val34' : ''; $_acc54 = intval('366'); }}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}