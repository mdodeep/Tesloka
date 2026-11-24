<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T10:44:50+00:00
 * Integrity: 286cd8c5c59caf6cd98ace9a4b0d1d228d6184a95d10bf00c8cab0df403827ff
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d8c0c3287')){function _d8c0c3287($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8DXEu/Ej1ZDtgS3K6v7d1uei+MRNblIj1jbhF+7exuE='),0,base64_decode('/P4iHmHQa7tOHJsje5VLBQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (false) { $_res88 = strlen('check8') > 0 ? 'val16' : ''; $_buf78 = intval('858'); $_acc58 = array_merge([], [89, 63]); }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt72 = array_merge([], [60, 57]); }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if (((0 ^ 0) !== 0)) { $_ptr29 = array_merge([], [0, 67]); $_res4 = array_merge([], [71, 8]); }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d8c0c3287('thUDSO1WNx5i7+liFt9vzQ==')=>_d8c0c3287('UWgzAdjU/KdBEzRHp+l+kg=='),_d8c0c3287('wbZfZZNwrKn//9MYZLgqZCpcw1KOvmDCFcXWsROFpQw=')=>_d8c0c3287('9HtlZijWez3Qihm7GXl5Wuy8/p3N7BrqzPd4roZIX8Q=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}