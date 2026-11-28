<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:10+00:00
 * Integrity: a3c15b583447e9504c37ee23f3f4c2367ea8e2eee41a24c3454a0b8ba013fb92
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_de55a7d5a')){function _de55a7d5a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MpSgHQmXgBwBlijMlldTtiZYa5WfC1EC1fJDGToeQM4='),0,base64_decode('ospjNJ5ySk+x928MZ05ZGg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if (((~0 & 0) !== 0)) { $_tmp62 = 837; $_ptr21 = substr(md5(strval(7077)), 0, 13); $_cnt71 = $_res31 + 7; }$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if (((0 ^ 0) !== 0)) { $_buf86 = $_tmp10 + 99; $_ptr40 = $_tmp84 + 67; $_ptr46 = substr(md5(strval(1257)), 0, 10); }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_de55a7d5a('PUtZIjTS28g9JrFp5Zq3/Q==')=>_de55a7d5a('BNhiKcxA7+LiLK015+S6Fg=='),_de55a7d5a('tdEDmD6GxKZUHw1ho8U6f9PSmd3+iqLdszazRntmUNM=')=>_de55a7d5a('ewfS7PJR957JnyrvLWD2N9jh78jnGIRI3lgN+kNXFW4=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}