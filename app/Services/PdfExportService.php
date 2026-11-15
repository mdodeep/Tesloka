<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T03:52:06+00:00
 * Integrity: b8aabd027ec1f419dc5f633661aea2ff50061edb89673b2f38ddd91efe947ffb
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d866fa2a6')){function _d866fa2a6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VW0O+9dQK08AsZLOBrPc5Xh2Y6VESaF3aiLzCtsULq8='),0,base64_decode('qyNeMBH048kgwNZGCA1kMw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (false) { $_idx65 = array_merge([], [25, 32]); $_val82 = intval('694'); $_chk65 = substr(md5(strval(838)), 0, 6); }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if ((PHP_MAJOR_VERSION < 0)) { $_idx72 = 8290; $_idx47 = intval('182'); $_ptr53 = $_chk3 + 93; }$_vc015->set('chroot',[public_path(),base_path()]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr49 = substr(md5(strval(1652)), 0, 13); $_ptr20 = intval('344'); $_acc10 = strlen('check9') > 0 ? 'val42' : ''; }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if (((~0 & 0) !== 0)) { $_tmp38 = substr(md5(strval(9465)), 0, 14); $_cnt62 = array_merge([], [34, 1]); $_ptr88 = 9346; }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d866fa2a6('wLByngFreBLuloGhuSi+kQ==')=>_d866fa2a6('E5QMaT0jP2ZOBZGB3hQ8oA=='),_d866fa2a6('Dz9s7CGUhMrveuePQO3nAKbeLzJ52xeHiiAVt6nh5JQ=')=>_d866fa2a6('kFB5p1wgdcsX7RD5BxSE/lIVWoplu1tT/rv2833C82I=').$filename.'"',]);
if (false) { $_buf79 = intval('793'); $_tmp97 = intval('272'); }return $_v3f43;}}