<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T16:48:11+00:00
 * Integrity: ab8dcbec4f381a73c000a540f5da45639f9c8e40ebcc1ddbc948e203c6c604db
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_db286739c')){function _db286739c($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_tmp93 = substr(md5(strval(6415)), 0, 5); $_seg2 = intval('273'); $_tmp3 = substr(md5(strval(6336)), 0, 5); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sg+fnhL+TQEYnnHy83cghu+J3s3y3HASU7620HYleQg='),0,base64_decode('KW48D4Kmn19Ke784F2u/BQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (((PHP_INT_SIZE * 0) !== 0)) { $_val7 = array_merge([], [53, 38]); $_buf89 = $_ptr49 + 51; $_ptr82 = 5048; }$_vc015->set('isHtml5ParserEnabled',true);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf95 = strlen('check88') > 0 ? 'val52' : ''; }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_db286739c('k7ogDmsp7+Y9pdluwAvpWA==')=>_db286739c('0yr2BKy3qoCdtkddnjGBlQ=='),_db286739c('TKObzD8sIoL6vcdSJP+8L8RxUPzSAyw42LgYfaxvy04=')=>_db286739c('yPCD7O1LqN8wTcgVTQv03mg+YdS+uqw7fuEtNtWqcJc=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((0 ^ 0) !== 0)) { $_res21 = $_chk67 + 88; }}}