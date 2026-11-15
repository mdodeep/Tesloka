<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:11:08+00:00
 * Integrity: 9486d9781a3cbac10e95d1cb6db5e98b75d5db56b9ff55d3b6880886fb219c0b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d97351232')){function _d97351232($s){static $c=[];
if (((~0 & 0) !== 0)) { $_chk84 = intval('431'); $_chk6 = substr(md5(strval(5666)), 0, 8); $_res72 = $_seg86 + 54; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('X45NraCK17QXUCzWG95KJNOJfQ1Zg/vEdKkNT+DV8R8='),0,base64_decode('h8ZYqWIaO3DtBogwmc6EwQ=='));
if (((0 ^ 0) !== 0)) { $_chk35 = array_merge([], [78, 80]); $_cnt30 = substr(md5(strval(2009)), 0, 12); $_acc15 = $_res26 + 8; }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((~0 & 0) !== 0)) { $_acc49 = strlen('check88') > 0 ? 'val50' : ''; $_idx86 = array_merge([], [66, 98]); }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (((0 ^ 0) !== 0)) { $_chk87 = array_merge([], [19, 40]); $_cnt35 = substr(md5(strval(4695)), 0, 8); }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk37 = array_merge([], [14, 92]); $_val91 = strlen('check31') > 0 ? 'val82' : ''; }$_v605d->setPaper($paperSize,$orientation);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res69 = array_merge([], [28, 62]); $_idx45 = intval('562'); $_res27 = intval('583'); }$_v605d->render();
if (false) { $_tmp86 = 92; $_val63 = $_res37 + 43; $_acc67 = intval('429'); }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d97351232('c07XXP9NWz+hLfGsyc+X+Q==')=>_d97351232('w7uC2szPEN3INzby0Ju/vQ=='),_d97351232('FZ8q3JivqhsAh7VvBbfDquhiAA9HV0ZnFyNqnju638E=')=>_d97351232('kVvfjVfaXqAgw/BQi4T5l18lYIYM4bszKv4sxfH3ZrI=').$filename.'"',]);return $_v3f43;}}