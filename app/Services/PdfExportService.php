<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:21:22+00:00
 * Integrity: 1288d8c03502ab6b0836b8c6f127e3e459d217625768cb5178f28a6b13cab141
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d166e29fe')){function _d166e29fe($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ZLDwnjerSrqheEFYN+Jr2Sko/e/QrTw8TFcbkQ1kwe8='),0,base64_decode('3A4ryf4v/qw121BJT7A7mw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp17 = intval('493'); $_val75 = intval('769'); }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if ((!is_int(0))) { $_seg91 = strlen('check52') > 0 ? 'val25' : ''; $_tmp8 = substr(md5(strval(7477)), 0, 14); }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d166e29fe('EmqIFEAkYUSOyMvTG3UQ2w==')=>_d166e29fe('8vb9CKNAYHS8OOUheaJ07g=='),_d166e29fe('aEu2Tok1LTOm1BB19VO+ccXEJCGyvd3QWEf1SkzM20s=')=>_d166e29fe('8KRQH1L3kieEAL1DawZ0hJjZrUvYbkjWBiYoEHOb3fI=').$filename.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg1 = strlen('check87') > 0 ? 'val88' : ''; }return $_v3f43;}}