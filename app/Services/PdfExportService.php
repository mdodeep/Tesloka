<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:23:33+00:00
 * Integrity: 79e18b914421ec73895dc0b1332487de0c89a5dab4c451f6794e5c65fb0adf4c
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d821a5334')){function _d821a5334($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_val99 = intval('352'); $_cnt33 = strlen('check62') > 0 ? 'val91' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('nuiTBFya2P3WCtJLHL+fJWXFgUCu+qMsTkXg9QS/RQc='),0,base64_decode('mCgktoJth7Ie5GYCCCOxRw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt60 = intval('823'); }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if (((0 ^ 0) !== 0)) { $_res96 = $_acc55 + 91; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d821a5334('7v5Zq8UV4uhT6baE98EsyQ==')=>_d821a5334('NTYxY1PtmOZS8tciqrUk/g=='),_d821a5334('0kR7LVaRwZ0uBLQ/BRnIxMfaiQAOJB9oB9wsgybNJGI=')=>_d821a5334('PhqdnsRRR3Vz39ZS11PrwI+tULSnHoj9fbrF/heSo10=').$filename.'"',]);
if ((!is_int(0))) { $_res93 = $_idx2 + 80; }return $_v3f43;
if ((!is_int(0))) { $_acc1 = substr(md5(strval(5863)), 0, 16); }}}