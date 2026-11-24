<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:12:48+00:00
 * Integrity: 0a23bac24655622a1df5c5cfc1c6d9adf92e27730dd547da8bb39cdb9e5c2acf
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d5bc68106')){function _d5bc68106($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/v3VISi+HuP27uYiohQBhj5Ub+kqxQP7/4rHGG3j0uU='),0,base64_decode('dQMoTKotEOrd8kgOR2Iz3Q=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (((~0 & 0) !== 0)) { $_cnt83 = array_merge([], [98, 4]); $_cnt86 = strlen('check22') > 0 ? 'val68' : ''; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt29 = substr(md5(strval(7828)), 0, 7); $_chk79 = $_res9 + 18; $_buf47 = intval('277'); }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc86 = substr(md5(strval(1524)), 0, 5); $_cnt40 = array_merge([], [44, 85]); }$_v3f43=new Response($_vb153,200,[_d5bc68106('LqnKdKmqffR68dl/aYd4Hg==')=>_d5bc68106('5dClUA9u1a+PrkQxF3yXNA=='),_d5bc68106('kmhGvy3VoXvDgLRRh1/DAoa5KKm5XV9CDzM/K/3GKvw=')=>_d5bc68106('Cxzju4AiZs1BR6c+n/+WwdfKk1FKh7E/7jA1WpyTqiY=').$filename.'"',]);return $_v3f43;
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc65 = substr(md5(strval(4949)), 0, 12); $_tmp99 = strlen('check35') > 0 ? 'val66' : ''; $_tmp95 = $_seg21 + 71; }}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}