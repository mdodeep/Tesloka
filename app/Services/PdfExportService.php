<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:27:59+00:00
 * Integrity: cf12f3439e1b68eafa07242eb2c8f03327d3a7052d570ce7519b0359c7c64b4f
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_de057dac8')){function _de057dac8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ksd6mCbL2BWuBGi7Ga2ZhbEjaibidpiSbOpdSpheniM='),0,base64_decode('Ho3nZJa6uhRswzhSGGEkMg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (((0 ^ 0) !== 0)) { $_acc57 = 3762; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if ((PHP_MAJOR_VERSION < 0)) { $_acc6 = 7850; $_seg36 = strlen('check59') > 0 ? 'val69' : ''; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (false) { $_buf93 = 5727; $_buf59 = intval('996'); }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_de057dac8('cBEOuxVzMGD0BIdgq8X7EA==')=>_de057dac8('4jQ3iry1UBvddG04kUSI/g=='),_de057dac8('YbgEreJobY2s/YNzNK3StpslIMhMruLdl+HQPiQ0cK4=')=>_de057dac8('RZGayW5wvkh/HZY2TMlP73eb88dfcSvg+8oJgt7t+64=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}