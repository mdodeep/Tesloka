<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T17:23:09+00:00
 * Integrity: 21f879a7a9d8f425452079ae014971e9abf51c3d318cb629d373731f5c8c0c1b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_db519b011')){function _db519b011($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2d1c7tb7QCKP39G1/mG/fewd0vhzz/DQmMB79mZY2Mo='),0,base64_decode('uP1PIkTf3rIicF5RUkicYA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt64 = $_val37 + 38; $_buf1 = intval('328'); $_buf45 = strlen('check93') > 0 ? 'val52' : ''; }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((0 ^ 0) !== 0)) { $_val66 = array_merge([], [40, 9]); $_val31 = array_merge([], [57, 67]); }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val21 = strlen('check11') > 0 ? 'val77' : ''; $_val7 = array_merge([], [87, 91]); }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (false) { $_acc76 = $_tmp57 + 46; $_seg20 = substr(md5(strval(9523)), 0, 11); }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_db519b011('/uHncvdDjmB+3UDgCKKYFg==')=>_db519b011('JBwXpL8WRdoDS2MktcW9zw=='),_db519b011('vEOojSYlHYqh9xmUl5I+WOmIqX7BCGjqUQ6uWIFX/GY=')=>_db519b011('HV8mjM53zciZoReeE0OdHTTV+pJBLD/rk2KC74NG1L4=').$filename.'"',]);
if (((~0 & 0) !== 0)) { $_val19 = array_merge([], [58, 46]); $_idx20 = array_merge([], [8, 92]); $_seg89 = strlen('check49') > 0 ? 'val57' : ''; }return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}