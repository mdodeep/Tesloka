<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:40:08+00:00
 * Integrity: 9ae6366ad02e98cf4186a7c41a038c5d7113ccc43cd9712eefbd502ea11806df
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d819a0355')){function _d819a0355($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('lh1blBjbDPaH2w22Xted4HwFHu3RSQ4spFa5LU4hd08='),0,base64_decode('rsP1/A038NEfd7y94pkp9w=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr71 = array_merge([], [21, 26]); }$_vc015->set('isRemoteEnabled',true);
if (((~0 & 0) !== 0)) { $_val71 = substr(md5(strval(7717)), 0, 15); $_buf3 = intval('441'); }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp0 = strlen('check48') > 0 ? 'val98' : ''; $_res67 = 3331; }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d819a0355('JrY95571txP+p6KKt6r/5w==')=>_d819a0355('E15Nt6HUb2/QJjl21yTmqQ=='),_d819a0355('5m/euAhJ4QZxJhfAHr+B6Ct13Qpg0T93jIzU0w9TDVg=')=>_d819a0355('GqKdaLcqJP+SYEG7R4dwa5ei9D2I+ufe9MjWcXwNq+E=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}