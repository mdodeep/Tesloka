<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T01:48:54+00:00
 * Integrity: 41afb97771ad12821f3dbaf26706c0d5fe2717d9aff9a950b050b821da5e65a7
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d6265c472')){function _d6265c472($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2uyVm8/7ZyvBUKEDd6Y0Bq0shDJ5z9BXyVHmHwTwiRE='),0,base64_decode('ZFViB1ndx/pDH8hXGjigfQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc25 = strlen('check50') > 0 ? 'val88' : ''; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (false) { $_ptr19 = $_buf7 + 7; $_idx77 = substr(md5(strval(9056)), 0, 11); }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if (((~0 & 0) !== 0)) { $_cnt26 = $_cnt38 + 23; }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d6265c472('IwECcNZZ3A1xfzEeqJBJtQ==')=>_d6265c472('KydMjkx/9ubaLfzDUs9KJQ=='),_d6265c472('FwauBXHsofJcppTuVO/a3vOwwyHk+rKaCsMYC3wuDa8=')=>_d6265c472('7oXeEQnngBu8stcPh3Lr2VuN/9P5KL5Mqbfg5WuW4/A=').$filename.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt87 = substr(md5(strval(6847)), 0, 16); $_seg12 = array_merge([], [70, 89]); }return $_v3f43;}}