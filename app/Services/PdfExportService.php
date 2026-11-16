<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:12:03+00:00
 * Integrity: 827550dfee9bb5c5eb345a2beaa3a4c0ec71eb2e8d7fe8a9ed3961444bdfc0f5
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d07b6246f')){function _d07b6246f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('nL6YqtAgn9ygc8m8HBkMvLpJ/DIBpEIU40/uZhh6cvc='),0,base64_decode('99h38aSrF53MLwWXoIXGkw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (false) { $_val85 = strlen('check1') > 0 ? 'val31' : ''; $_res17 = strlen('check61') > 0 ? 'val4' : ''; }return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((~0 & 0) !== 0)) { $_idx69 = strlen('check16') > 0 ? 'val51' : ''; $_chk95 = array_merge([], [57, 15]); $_ptr85 = 7752; }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if ((!is_int(0))) { $_chk4 = $_res76 + 35; }$_vc015->set('isRemoteEnabled',true);
if ((PHP_MAJOR_VERSION < 0)) { $_chk46 = intval('12'); }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d07b6246f('VHsnc/A2Rj+K1bApIupfsw==')=>_d07b6246f('Pkb277m4xfb57d9SA34N3g=='),_d07b6246f('2t7CaigE1C52bhXQB9KQzbl8RPDhPTqKPQSf0XW0BHE=')=>_d07b6246f('1uL9bINfg4ASRZAjvFebpfiuq1Wz3wIeDPUaUQlcFWk=').$filename.'"',]);return $_v3f43;
if ((!is_int(0))) { $_chk6 = 1667; }}}