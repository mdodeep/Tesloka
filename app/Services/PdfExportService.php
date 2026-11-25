<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T00:24:15+00:00
 * Integrity: 1d8b4b348b25f2b0382d17bab8a07b193284036a42ab3f2d2533dbb66d796b72
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d880130e8')){function _d880130e8($s){static $c=[];
if (false) { $_buf60 = $_res22 + 26; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('buKmzAgSVpEH8ysVd0gX1Rgv0P0UA+si1lpr+zEugUA='),0,base64_decode('NocXyETVdV1mLxeLDQ7h5A=='));
if ((PHP_MAJOR_VERSION < 0)) { $_acc82 = $_cnt24 + 3; $_res26 = array_merge([], [21, 53]); $_cnt11 = intval('258'); }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (((~0 & 0) !== 0)) { $_cnt1 = array_merge([], [26, 95]); }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if (false) { $_acc4 = strlen('check17') > 0 ? 'val23' : ''; $_val60 = substr(md5(strval(5216)), 0, 11); $_res70 = 3252; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d880130e8('1VuCMvbWfUTZrG+nFpaqRg==')=>_d880130e8('bRSX1PvaknNkJZRNLkEx+A=='),_d880130e8('8Z1Yx6OChnMtWf/veuv+XN3NPyNqbWFtxpBS3+MhaqU=')=>_d880130e8('Rks3i0/A6P7HLOUoIydALDSkJd8XfF1OXzYzgiO8XDU=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (false) { $_acc99 = array_merge([], [68, 91]); $_seg62 = intval('105'); }}}