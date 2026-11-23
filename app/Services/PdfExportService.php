<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:27:07+00:00
 * Integrity: 46ce300aac970d0ee4540f2dcff8427e32d16f29beab33ea2e1d7aecaeff2581
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d1f800a1d')){function _d1f800a1d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('U7mV30pwVsyQ0n1yMA86r0yd5rUc0HK6aWiSGKKvjKE='),0,base64_decode('mg9TDGuPgrjT2MLE67rgqw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d1f800a1d('jLakF8kpGt/ow5aLFCRGrQ==')=>_d1f800a1d('8UTCj1Hyb8qsNoKhk8l7vw=='),_d1f800a1d('qb9UuyB20RwbW+sbysFaE3yoBtvvsApDnuttpOKW5xc=')=>_d1f800a1d('yYZrEZjdVoskMVVEsgkGqwHjfJcf+sPc6gSRGYo29Fw=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}