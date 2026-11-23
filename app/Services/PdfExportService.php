<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:10:07+00:00
 * Integrity: 54ea91c19fc84dd91af7961bc5719995fc0afcae149869aecef5322dc68af55f
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d98fee3e9')){function _d98fee3e9($s){static $c=[];
if (false) { $_res35 = substr(md5(strval(1326)), 0, 6); $_idx94 = array_merge([], [14, 53]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PytFxMoHvQAXYnuDXKhi7ZMZsmO82Tnd5MLtfxeMlEs='),0,base64_decode('IGR/1tqiOdgt44OY5oFK7w=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((~0 & 0) !== 0)) { $_buf35 = intval('946'); $_ptr76 = $_seg82 + 24; }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res82 = substr(md5(strval(4399)), 0, 4); }$_v605d->setPaper($paperSize,$orientation);
if ((!is_int(0))) { $_acc6 = strlen('check12') > 0 ? 'val72' : ''; $_acc87 = substr(md5(strval(3663)), 0, 7); $_chk30 = $_acc78 + 34; }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d98fee3e9('D53tpwvG+9K/Y7VAgDLRQA==')=>_d98fee3e9('bJOw5l9Ye0gKNt6ktnOhpg=='),_d98fee3e9('nutb0Ht8A0NDgeDlXoOn2k3US+AumE4xeubHXnEJldA=')=>_d98fee3e9('GxbP3DbC/D/+9gDdRzqtJbP7RlQA1BhKKNsk022fO+I=').$filename.'"',]);return $_v3f43;
if (((~0 & 0) !== 0)) { $_res16 = substr(md5(strval(6591)), 0, 8); $_chk9 = 1646; }}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}