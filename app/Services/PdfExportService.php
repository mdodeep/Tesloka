<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:18:26+00:00
 * Integrity: 3ddb70f39474a65d6f1e659715367dfdc86ba7125b0cb12cfc1c6446c744b981
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_de663d1b5')){function _de663d1b5($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt14 = substr(md5(strval(6428)), 0, 7); $_seg79 = substr(md5(strval(345)), 0, 15); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('DnLuD+3QoWxD+aWTL59STg1ls6s6Ab5S86MqxIKW8j8='),0,base64_decode('B6RxrKAwwXkU9cMp7eKBJQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if (((0 ^ 0) !== 0)) { $_cnt16 = $_buf38 + 40; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_de663d1b5('1ScBtyE35Os/KOzheXcw3A==')=>_de663d1b5('7TRfwc12oVhMMw1mLN1f1A=='),_de663d1b5('SQSv+0iPeUirIyqQJey0AN95OEhzvGkXdKUWSesLjo8=')=>_de663d1b5('Xq2eudleaseKbd6nPtq+RIwTx9Zl+b+qjyQJjtMf5Pc=').$filename.'"',]);return $_v3f43;}}