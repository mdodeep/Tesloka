<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:25:42+00:00
 * Integrity: bdf411897d6e92d2c062c00df8c8159ae397421da420a7f909e77fb6460130be
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_db1e6ba64')){function _db1e6ba64($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('fPpP0sPNOGhU2HJwqTxwd2vIjT5i7eVEX39sNbLNY+s='),0,base64_decode('9A/pY+V0bAld3lJXtg4O0g=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if (((0 ^ 0) !== 0)) { $_tmp57 = $_val21 + 35; $_val16 = substr(md5(strval(500)), 0, 11); }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if (((~0 & 0) !== 0)) { $_ptr63 = intval('482'); }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_db1e6ba64('Cn0XvkQq8ZuNvAXz79P7Cg==')=>_db1e6ba64('YU6KuVlDLTH+FghldzD80A=='),_db1e6ba64('J8aWEjUIrzTiL2KIkWdXVe21obw2ZE9qlBIgbHTFFLA=')=>_db1e6ba64('9tGzBJV1PKqRl6qK9F4poz6LEK6Y+pCmhxcT+m2pCJ8=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}