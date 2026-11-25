<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:12:00+00:00
 * Integrity: 2df9c3bb0ba8feb903b68df95647296d7c3a359514b150ae19150157f487bb80
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d9ec5ccca')){function _d9ec5ccca($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2EvDC4zLpouHrhk86Y3AF/hgT6yIounQdgSyP8Vb14g='),0,base64_decode('LMV1tJ0lbNbTyWp8HwiHnA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc2 = $_tmp5 + 9; $_tmp41 = $_idx96 + 15; $_tmp54 = $_ptr66 + 30; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if ((PHP_MAJOR_VERSION < 0)) { $_seg90 = intval('700'); $_acc62 = 46; }$_vc015->set('chroot',[public_path(),base_path()]);
if ((PHP_MAJOR_VERSION < 0)) { $_idx81 = intval('806'); $_cnt81 = array_merge([], [36, 35]); $_ptr48 = strlen('check17') > 0 ? 'val97' : ''; }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if (false) { $_chk23 = array_merge([], [13, 75]); $_res44 = 4276; $_val76 = array_merge([], [27, 58]); }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d9ec5ccca('sHyYawrhv0CMRyuQvNNvyg==')=>_d9ec5ccca('ee/NhDt0Xf2NL8esg1ObrA=='),_d9ec5ccca('SZR12EqZtoWnvB57ge+6EvWqdSAvXbtoogBCpSXQdPU=')=>_d9ec5ccca('NovWGQasAbOKlloIpeqSCII7nY//+/hNpur+DG45LhI=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}