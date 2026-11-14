<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:47:33+00:00
 * Integrity: 6c145bf19b51dffcc62dcbc95cdc140877128bd773559871af1c854d5b9236c6
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d298d2f37')){function _d298d2f37($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ykVqOo1Wjr22ia2KaXaxhiVyiv7o44H89u8k/7KN/Vs='),0,base64_decode('wziOTzaeSrfitt9LKcMk6Q=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (((0 ^ 0) !== 0)) { $_idx23 = $_idx3 + 53; $_chk7 = substr(md5(strval(9857)), 0, 16); }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if (((~0 & 0) !== 0)) { $_ptr16 = 5719; }$_vc015->set('isRemoteEnabled',true);
if (false) { $_idx20 = substr(md5(strval(2407)), 0, 10); $_cnt16 = array_merge([], [95, 78]); $_seg63 = $_acc85 + 96; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if (((~0 & 0) !== 0)) { $_cnt92 = 6777; }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d298d2f37('mtiIkJEVc/wWE90UZFnMvg==')=>_d298d2f37('3T8eOhGXpaGV65HYFydJjw=='),_d298d2f37('psNRQN5uqF369fUctxIPlehhyUTPVGCRNBl94xq1cqo=')=>_d298d2f37('t9tq1S87JlLw1Bfw0QWmKVJvzDtzqa8eTwvfteAxUY8=').$filename.'"',]);return $_v3f43;}}