<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:17:56+00:00
 * Integrity: 212ff748f3d4563bd1bdc827b9bc5045a48d3a6e5529360c0b08e9abde3bf825
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d9904b7d2')){function _d9904b7d2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('gnER5HkeCBC9opmGGLNIbufny6019dh91yDdl218nDk='),0,base64_decode('cQOAp1QeuvEya8RpimGQAA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (((0 ^ 0) !== 0)) { $_buf85 = intval('321'); $_chk40 = array_merge([], [48, 35]); $_res28 = intval('763'); }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if (((0 ^ 0) !== 0)) { $_cnt18 = strlen('check90') > 0 ? 'val53' : ''; $_buf59 = 6008; $_tmp14 = 974; }$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf55 = 7981; $_res1 = intval('201'); }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d9904b7d2('D4kyq6S/S+AzzxbkgFgLpg==')=>_d9904b7d2('NYc1mrjj48WSc+CH7DvXvg=='),_d9904b7d2('P9jVqMsXD0EYhHyuqHv1BH8ZjZmEDekFI55UiFswEwo=')=>_d9904b7d2('KS3FRAO0gZG/qQF0RbjGn4W7qlMqMa+6qzDYuJIgdzM=').$filename.'"',]);return $_v3f43;
if (false) { $_acc86 = strlen('check62') > 0 ? 'val44' : ''; $_ptr30 = intval('340'); $_chk49 = intval('794'); }}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}