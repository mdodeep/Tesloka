<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:48:01+00:00
 * Integrity: 404c5595eff4588f6e41542c765e99d669f210a056df99b31ad7850fe8dc1c17
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d4005f486')){function _d4005f486($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_acc47 = intval('416'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('CkpGvVnKkYm01dp7/dL0Q+UEKb9/rkjlttdpsc8DcFw='),0,base64_decode('a8gV6UlQJPRAgCnMURaQYA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((0 ^ 0) !== 0)) { $_res74 = strlen('check35') > 0 ? 'val70' : ''; }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if (((0 ^ 0) !== 0)) { $_ptr91 = 7739; $_chk92 = substr(md5(strval(4873)), 0, 16); $_val39 = strlen('check44') > 0 ? 'val21' : ''; }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if (((~0 & 0) !== 0)) { $_tmp15 = intval('841'); $_seg96 = 9394; }$_vc015->set('chroot',[public_path(),base_path()]);
if (false) { $_val49 = $_ptr23 + 79; $_tmp58 = strlen('check21') > 0 ? 'val70' : ''; }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if ((PHP_MAJOR_VERSION < 0)) { $_res55 = intval('135'); }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d4005f486('9C6mkpyCDP0Q0ogzpBQEJA==')=>_d4005f486('Xo4umEXS4Fs0vcxEVfHi9A=='),_d4005f486('4orbYLxd8LUgSlGbhK1lYNDsEWOy/tNnS8qJGtg1uq0=')=>_d4005f486('wrcAQvgDgqcRWcU5LCHICg0cfgznYze6N3FekWvoclc=').$filename.'"',]);
if (((~0 & 0) !== 0)) { $_cnt14 = substr(md5(strval(6778)), 0, 4); }return $_v3f43;}}