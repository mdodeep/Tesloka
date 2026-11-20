<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:12:54+00:00
 * Integrity: 3cda86e7217c6b29eec63df29fb1f17eddd6d301aaafc27934ba4aaaa2410493
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d5248f475')){function _d5248f475($s){static $c=[];
if (false) { $_acc84 = array_merge([], [80, 68]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qG5MVo89E+HvnQs4kXzPLgLFcoiNxk6by2emcQzI33w='),0,base64_decode('S6yHCESBjLx0pWWiHriVyw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if ((!is_int(0))) { $_chk57 = strlen('check17') > 0 ? 'val48' : ''; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (((~0 & 0) !== 0)) { $_res12 = substr(md5(strval(7873)), 0, 7); $_chk43 = substr(md5(strval(6526)), 0, 15); $_acc82 = intval('721'); }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d5248f475('N1HWigAceXQnu4bV2S5OPQ==')=>_d5248f475('E76F/wgJkePUw5BYf5JqPA=='),_d5248f475('pUxA4rNEu/VyshNLt1eASbEg2CMUWbSqnzsYO+9IBcI=')=>_d5248f475('i/HNByNsbDN6RUgHbkFYRegQByNu7stN4QlUPp3ggmU=').$filename.'"',]);
if (false) { $_idx52 = $_val1 + 93; $_acc55 = strlen('check43') > 0 ? 'val98' : ''; $_chk32 = substr(md5(strval(9450)), 0, 10); }return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}