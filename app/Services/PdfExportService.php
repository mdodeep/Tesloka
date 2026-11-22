<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:14:50+00:00
 * Integrity: f85c349e6d597ae8dbe016acded77964614944975eae1a9a0dc888ecaabf0fad
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d5b06e477')){function _d5b06e477($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_acc24 = 175; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('S3xqgB+W2AiPsa1PjHA6E9F9YwO/7S1Ts+p3xqn/u6A='),0,base64_decode('NRtsqgKoB0OsaXUti2eMSw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt52 = array_merge([], [54, 44]); }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (((0 ^ 0) !== 0)) { $_res64 = intval('669'); $_buf98 = strlen('check1') > 0 ? 'val53' : ''; }$_vc015->set('isHtml5ParserEnabled',true);
if ((!is_int(0))) { $_val43 = array_merge([], [99, 15]); }$_vc015->set('isRemoteEnabled',true);
if ((PHP_MAJOR_VERSION < 0)) { $_buf99 = 4011; $_seg18 = 509; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf37 = 8921; $_acc73 = array_merge([], [81, 84]); }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();
if (((~0 & 0) !== 0)) { $_ptr72 = intval('768'); $_idx57 = array_merge([], [48, 52]); }$_v3f43=new Response($_vb153,200,[_d5b06e477('28UiBN9VauzTEwpFhGmwVg==')=>_d5b06e477('2I5HukLDlzG0tkbiIpv9JA=='),_d5b06e477('1c/cZ0QaAGpPKGtDDUxE5tKCM52NnblBG5Sl2V9//kU=')=>_d5b06e477('S3XpoGcW+vTjWeAd9m+MjuVDVQzATNu5aRDW5yIDmHs=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}