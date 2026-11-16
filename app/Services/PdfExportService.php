<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T05:39:18+00:00
 * Integrity: 5d754da99e767286fe5e250593422cf402a67b7f6e84d9a24224033e75db0d43
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d5755fade')){function _d5755fade($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_buf50 = array_merge([], [71, 63]); $_seg60 = array_merge([], [44, 7]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mqk7PySSTgTqMdnymdPiXppys1SxscIYPozB3Y32N7s='),0,base64_decode('vf0hjsb1wS7f+Z2jaUYyoQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if ((PHP_MAJOR_VERSION < 0)) { $_chk81 = strlen('check50') > 0 ? 'val50' : ''; $_val59 = substr(md5(strval(4118)), 0, 9); $_idx50 = substr(md5(strval(2906)), 0, 8); }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if ((PHP_MAJOR_VERSION < 0)) { $_acc12 = $_ptr65 + 7; $_cnt31 = substr(md5(strval(6743)), 0, 15); $_tmp28 = 1143; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (((~0 & 0) !== 0)) { $_cnt20 = 162; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr0 = intval('182'); }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if ((PHP_MAJOR_VERSION < 0)) { $_val22 = strlen('check62') > 0 ? 'val19' : ''; }$_v605d->render();$_vb153=$_v605d->output();
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx60 = intval('920'); $_tmp93 = 9578; $_ptr76 = 2117; }$_v3f43=new Response($_vb153,200,[_d5755fade('taSj1VEwEPHN94po58RE/Q==')=>_d5755fade('Ag/Oj2m3y4n0858XGSIhsA=='),_d5755fade('7/N3wAQ+j5frQxTSKElXqoCCgG2R2wgs4vBJ3idj/zk=')=>_d5755fade('o3yuq9LHzfv1Rofr8aMtQwOZUNgOmhUtubN5ZmkJmWI=').$filename.'"',]);
if (((0 ^ 0) !== 0)) { $_tmp85 = intval('142'); }return $_v3f43;
if (false) { $_res32 = strlen('check78') > 0 ? 'val0' : ''; }}}