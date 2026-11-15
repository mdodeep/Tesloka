<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:28:10+00:00
 * Integrity: 5417b54d4492cc07b42383ee2b0eb6ef7515f82da66abb7cd0b5468f32af8439
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dca281b7b')){function _dca281b7b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('C+uvVn0KJaM2xt++AvhFqHPlAxLW0QkP5ZHH0BiSXr8='),0,base64_decode('flARG2bWDXwfRvQGcbGHvQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if ((!is_int(0))) { $_seg38 = substr(md5(strval(7145)), 0, 15); $_buf37 = strlen('check79') > 0 ? 'val21' : ''; $_tmp15 = 8207; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if ((!is_int(0))) { $_chk69 = intval('32'); $_seg76 = $_acc61 + 7; }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if (((0 ^ 0) !== 0)) { $_val91 = $_tmp14 + 19; $_tmp24 = $_ptr10 + 63; $_acc1 = substr(md5(strval(7833)), 0, 15); }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dca281b7b('xhMogN95mnHn2CRGo/NX+Q==')=>_dca281b7b('yzvP/KdsMlTkbqzmiqxACg=='),_dca281b7b('AvVwNKgGqxfDBklvxUw/0DY3EMMTYmoG6vk20YgX8lE=')=>_dca281b7b('qC9Uk7kuuvNMyykclpC0lKJzBrtT7nh8khnzB64ZS2c=').$filename.'"',]);return $_v3f43;}}