<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T21:20:41+00:00
 * Integrity: 82407b4905c57dbee639f80b13b7dda8c68cb714bb5cc6e39cb3b130f3f42e5b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d6a6882c1')){function _d6a6882c1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/MOdV0OpVb/Rbczd/MikWNhTKppE72EVbV2ry0jY5EQ='),0,base64_decode('G3fERdqGbMY4c3su3zUemQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (false) { $_val57 = array_merge([], [9, 89]); }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if (false) { $_acc84 = substr(md5(strval(8449)), 0, 12); }$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d6a6882c1('MVJEnfQDNLZcYpW+VhMVew==')=>_d6a6882c1('HlgcjZjMQ/skgfzD2GQ8Bg=='),_d6a6882c1('DsJSbBoCojZf1BgCdjQqtbOe0FvJPV9muZ5yLqjclbA=')=>_d6a6882c1('jepiEicbz+BjdubD1RxFzFexOna86KVmdonThuTScsQ=').$filename.'"',]);return $_v3f43;
if ((!is_int(0))) { $_idx27 = intval('802'); }}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}