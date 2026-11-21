<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:45:02+00:00
 * Integrity: 212198481752cd1aadc34123e0123df466bc30ed0e7cb903b23439cb9ba23249
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d96f97a00')){function _d96f97a00($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('N9X51bQcYB2ksSTJ0FL2fJzpfKjMZunsfxRFpVzjZVc='),0,base64_decode('rKHfZvagDQdqTvVMd0EoLA=='));
if ((!is_int(0))) { $_cnt25 = intval('938'); $_acc28 = substr(md5(strval(1504)), 0, 4); }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr65 = $_buf61 + 25; }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (((~0 & 0) !== 0)) { $_chk45 = strlen('check24') > 0 ? 'val2' : ''; $_acc22 = 604; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if (false) { $_seg9 = array_merge([], [32, 39]); $_acc7 = intval('541'); $_seg9 = array_merge([], [8, 73]); }$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (((0 ^ 0) !== 0)) { $_idx53 = array_merge([], [38, 3]); }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if ((PHP_MAJOR_VERSION < 0)) { $_chk10 = 7284; $_ptr59 = intval('898'); $_idx54 = $_chk27 + 14; }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d96f97a00('vqlfZzmjWK9RoLAy05yhnw==')=>_d96f97a00('BjCrgkIwIuSo6wXo/xgcww=='),_d96f97a00('5IHRImOroyZIMp2H/+UVPFFfykg9su6BwqL/Ljtkq5o=')=>_d96f97a00('pSnTGKd9NCEULm8Y3K4t9JmeYPbYGptShrbuP2HywMk=').$filename.'"',]);
if (false) { $_idx70 = substr(md5(strval(3659)), 0, 9); }return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}