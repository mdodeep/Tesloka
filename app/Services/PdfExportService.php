<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:50:58+00:00
 * Integrity: 2266da28b3c509b6852b3f5add15de31b7e4092754260a7df476ef5aa85d8081
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d49a4400f')){function _d49a4400f($s){static $c=[];
if (false) { $_ptr53 = array_merge([], [39, 54]); $_acc59 = intval('981'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wtQB3FX1it6TgXQPbLEHqLIsKu9BrS8escczXFMK8+Y='),0,base64_decode('UB//g26jxr0LYQnZ3wB3yw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg12 = substr(md5(strval(1977)), 0, 6); $_seg37 = intval('718'); }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if (((~0 & 0) !== 0)) { $_tmp37 = substr(md5(strval(8583)), 0, 13); }$_vc015->set('isRemoteEnabled',true);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx67 = substr(md5(strval(3308)), 0, 9); $_val86 = $_res78 + 18; $_idx21 = substr(md5(strval(7456)), 0, 9); }$_vc015->set('defaultFont','Helvetica');
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc38 = intval('968'); $_cnt2 = substr(md5(strval(5992)), 0, 6); }$_vc015->set('chroot',[public_path(),base_path()]);
if (((0 ^ 0) !== 0)) { $_seg12 = $_tmp7 + 86; $_idx42 = $_acc96 + 76; }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg64 = intval('688'); $_res2 = substr(md5(strval(5304)), 0, 14); $_acc47 = 5567; }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg29 = intval('855'); $_buf70 = $_cnt9 + 77; $_val0 = intval('859'); }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d49a4400f('dJqpeSjBnnMs8knMcQRD+A==')=>_d49a4400f('odOEY6rVtD0RW/uZlL62TA=='),_d49a4400f('+FgjzXub8xUflLS7n03JTqmQ1sOoRiUETV2gE2mQUoo=')=>_d49a4400f('oyhTjwtk/mbStFlwQjwMQSE99cXz+d6EoEojUVKAcGo=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}