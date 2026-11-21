<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:23:13+00:00
 * Integrity: 57c709e308df7c2142dec53cf3ecde1776cd5f17324db381d878b416f9ff3a89
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dfd21861c')){function _dfd21861c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('nP2xNZv29dlpjiOX6wyrVor6CGHlBLQbaTIqhrhKV9M='),0,base64_decode('+L/Nh49dc0mNUrHyCtXVRg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if (((0 ^ 0) !== 0)) { $_acc53 = 511; $_chk19 = substr(md5(strval(7356)), 0, 16); $_chk73 = strlen('check78') > 0 ? 'val52' : ''; }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dfd21861c('jTRlE4ZS+cGWLmLvrqTLrA==')=>_dfd21861c('EC3Ak+c8DffqRY97WQolKg=='),_dfd21861c('X2r0M+jhn6kI/piivTh+uKNyPceXUrv8hRIsm3nYmdc=')=>_dfd21861c('M91ibGXoJ9ioeclnKfKNHdy0UOYu3Th6Zmmd1fsvMdA=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (false) { $_tmp97 = 7676; $_tmp88 = substr(md5(strval(9161)), 0, 12); }}}