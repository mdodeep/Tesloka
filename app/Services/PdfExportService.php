<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:32:21+00:00
 * Integrity: fcaa0d410ad2dc05fad9faf528a0ad308ad6fa6d51a3eb44bcba09444ceea3b9
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d3258719f')){function _d3258719f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('r0z76aY4mTpdfqwPtF+Cl1ZvEd4pGznPnAKrZI3GgKg='),0,base64_decode('IgPeo7kQ8v43Y7u9TE1dEA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr60 = intval('691'); }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk33 = 1879; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk31 = $_res29 + 25; }$_v605d->render();$_vb153=$_v605d->output();
if (((PHP_INT_SIZE * 0) !== 0)) { $_val85 = strlen('check16') > 0 ? 'val65' : ''; $_idx75 = intval('883'); }$_v3f43=new Response($_vb153,200,[_d3258719f('8t73RiV64JaKpkLAnZMwkg==')=>_d3258719f('64aayV/P8KLLgGrSCYlmpw=='),_d3258719f('YGZBgXKShwOq9h68YdZcveSicnLy5PI9XgO+LU7QFvA=')=>_d3258719f('hiNCBDozcGf23BmksdfKuOV4+35B1N0HkQbFMpnVtDM=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}