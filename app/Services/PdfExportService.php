<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:05:27+00:00
 * Integrity: f9d108a5528248385498f914a2886fedb42a4a80097ea009e4a25ad387bf6f7b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d263a8d7b')){function _d263a8d7b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qX/j0qlMlIKEsDqQflh1DVgDWYVynGQuFuDwlBawz7I='),0,base64_decode('f5qibLdL1s0m0GzFgy5OtQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((~0 & 0) !== 0)) { $_buf21 = 1169; $_buf13 = array_merge([], [68, 17]); $_seg94 = array_merge([], [39, 41]); }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if ((!is_int(0))) { $_cnt48 = 7170; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if (((0 ^ 0) !== 0)) { $_val95 = 1188; $_chk38 = strlen('check50') > 0 ? 'val41' : ''; $_acc18 = intval('413'); }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d263a8d7b('nbTsY+6Ed9OFSv+syD5y6A==')=>_d263a8d7b('n3QVC+2cqy2CwAVoRgw5/A=='),_d263a8d7b('sAYbCGAz9t189PIEwjIVtbW8bpBJcWXTk97uYL7iXnU=')=>_d263a8d7b('sTsGRkXSXG5lmUDVlL9xsq37A5E7vyHqjHHub8MXzVU=').$filename.'"',]);return $_v3f43;}}