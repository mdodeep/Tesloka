<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T06:42:17+00:00
 * Integrity: b463240aa949947e7c92e3e9a908659b247406f07d59d5f537c214f6a4e9553e
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d3b22c22b')){function _d3b22c22b($s){static $c=[];
if (((~0 & 0) !== 0)) { $_val97 = $_val98 + 15; $_buf61 = intval('443'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('p10FuRvcGLUeMLXgxQ4JLHL+wMkKfjl9v7DyYXmtltg='),0,base64_decode('Xb5dwmhuej1utSxI7SVOzQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((~0 & 0) !== 0)) { $_val91 = $_seg41 + 49; $_val98 = array_merge([], [27, 73]); }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if (((0 ^ 0) !== 0)) { $_idx21 = array_merge([], [83, 8]); }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();
if (((0 ^ 0) !== 0)) { $_seg21 = substr(md5(strval(4869)), 0, 15); }$_v3f43=new Response($_vb153,200,[_d3b22c22b('LCZ+38ryo2C4PwcAi2+Hfw==')=>_d3b22c22b('oK5SrAQSftKW7REKgtI5Nw=='),_d3b22c22b('in6R18RF0DidmoEemiST07zER94vLntewsfCXWxcHcU=')=>_d3b22c22b('IKAovMhAAn3ESl6JmbA5ZkUcfVo45bHoYNiEHwtegDY=').$filename.'"',]);
if (((~0 & 0) !== 0)) { $_res69 = $_tmp76 + 17; }return $_v3f43;}}