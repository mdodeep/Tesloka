<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:09+00:00
 * Integrity: 7de7c0a32bac58f3112955eaaa8a235103a3b40d41f46a59b87a32aeb3710111
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d47cd5ccf')){function _d47cd5ccf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('YCsVPHtsIfuB8pw5HolHzY3LTDEdD6stZSULfv/RjVc='),0,base64_decode('Yw1mQS4q8NDmuiuFroLlAw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if (false) { $_cnt14 = array_merge([], [16, 46]); }$_vc015->set('isRemoteEnabled',true);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx95 = $_tmp55 + 27; $_buf6 = 7414; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if (((0 ^ 0) !== 0)) { $_chk19 = array_merge([], [5, 22]); $_seg59 = substr(md5(strval(2953)), 0, 16); }$_v605d=new Dompdf($_vc015);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc86 = array_merge([], [99, 67]); $_cnt72 = array_merge([], [50, 88]); $_chk68 = strlen('check93') > 0 ? 'val16' : ''; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d47cd5ccf('RLYzo/v0xYVVu/uSNyurNQ==')=>_d47cd5ccf('6LGvLRUqKlDP94EzF2U0Aw=='),_d47cd5ccf('0x+aK9GAcIKG/qs+2fQXw2derE8JmIfmgNyQXFQHAfw=')=>_d47cd5ccf('J2WdNRT3HpFtgUo0VTt+tZ1X9nycNdEryE4gsSVsV3M=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}