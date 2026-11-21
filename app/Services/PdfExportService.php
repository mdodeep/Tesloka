<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T20:09:49+00:00
 * Integrity: 4ba12f4ec45cd7423c9c23659fdbbd788a44b6f6c1419a38e1ff808bcbfb5bea
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d5f340729')){function _d5f340729($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('htSf1EcgZWI7KM7b5r+IbaoTWWTlEBPW3G1XGiOQosY='),0,base64_decode('PU3oNX4zaR8s/fx3TJPpDg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if (false) { $_cnt96 = intval('19'); }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk82 = strlen('check42') > 0 ? 'val57' : ''; $_res64 = 4142; }$_v605d->render();$_vb153=$_v605d->output();
if ((!is_int(0))) { $_res5 = strlen('check56') > 0 ? 'val32' : ''; }$_v3f43=new Response($_vb153,200,[_d5f340729('IxKc4wXtWt0bQ0PkDs2lCQ==')=>_d5f340729('7WH1Xf4loKyEnMtqaq5F/A=='),_d5f340729('nzAg5AaE/SHwx0GXA85Yx9TF+KIj2fnZUwcH4yK28Wc=')=>_d5f340729('A+WWfGB1fM7+oiydcwFfkzjzInQ/RmViXUbUf9/pLX4=').$filename.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt80 = 6263; }return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}