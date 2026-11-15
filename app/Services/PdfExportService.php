<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:46:26+00:00
 * Integrity: 2e20d3b5a456b628c1d9bea2fdf83ffb73014a5d4cf16a76d97e77803895d40d
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d9ef6c247')){function _d9ef6c247($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EXAoDnZ6x1EVwtiQBzlFkMNC2/Zq65My9eaq2n5FXzw='),0,base64_decode('kcMsoBeTNzXnuKKx6dKN+A=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx56 = substr(md5(strval(2862)), 0, 10); $_tmp38 = strlen('check6') > 0 ? 'val50' : ''; $_idx79 = substr(md5(strval(390)), 0, 9); }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (false) { $_ptr3 = 9652; $_idx3 = array_merge([], [65, 38]); $_val46 = $_buf37 + 11; }$_vc015->set('defaultFont','Helvetica');
if ((!is_int(0))) { $_res15 = 3891; $_ptr3 = strlen('check78') > 0 ? 'val96' : ''; $_acc68 = 7941; }$_vc015->set('chroot',[public_path(),base_path()]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr32 = array_merge([], [25, 62]); $_res63 = strlen('check36') > 0 ? 'val31' : ''; }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d9ef6c247('iXyQe4tFRGKLJnWfIRIG9Q==')=>_d9ef6c247('Xj61BRdufWrR3v6Xx2hepQ=='),_d9ef6c247('ZpVxoZNl9j9YLbVKAJktvAPcIt0PoTvFrlm0qjuf9J4=')=>_d9ef6c247('fPnGi0bzCEgEjQT1DHILrgOrpxrpIf08C+E6CfD1diM=').$filename.'"',]);
if (false) { $_seg49 = 4940; $_cnt24 = substr(md5(strval(166)), 0, 4); }return $_v3f43;}}