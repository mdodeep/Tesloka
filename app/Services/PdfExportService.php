<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:43:01+00:00
 * Integrity: 9813c3c38fb11e7037f0d1a86d038780b8a42350121dceee08366dd6a8250936
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dfd19fae9')){function _dfd19fae9($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_acc89 = substr(md5(strval(9639)), 0, 16); $_acc18 = array_merge([], [46, 33]); $_res46 = $_idx74 + 98; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mtE+lsbngznWqOZOsxGTe1D/9jN6aaOt/3vIPx0AsaA='),0,base64_decode('2T3qvcbD9Eluo1AgxKWJww=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((~0 & 0) !== 0)) { $_seg62 = $_val61 + 63; $_ptr46 = 5653; $_res58 = array_merge([], [72, 56]); }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if ((!is_int(0))) { $_val28 = intval('623'); $_val96 = 4179; $_ptr51 = 9663; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dfd19fae9('1ZJYdpspExY5CacfH4N2uw==')=>_dfd19fae9('3/Igp+3k4FamTfnYb9wKbg=='),_dfd19fae9('xbj22gBq8gG7ePIIrGdbGcDyC0t9QoFGK2Y4pstKiFs=')=>_dfd19fae9('ypp69tMJNDUM6XQ8IM3W5dpczCwukawX9EZLrXVeBGk=').$filename.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_acc78 = $_chk45 + 93; }return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}