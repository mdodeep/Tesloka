<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:40:29+00:00
 * Integrity: 70d9cc4ad1a6117188484a766b85d0e44fba40851435a8655312994255203c70
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dcd12955d')){function _dcd12955d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rlG6ObBEWat7Z1nFajRN48fEeyZF8VNhT6McGH6g92w='),0,base64_decode('hQSUwP6Kg+vNslMs2yUo/A=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp29 = $_tmp96 + 73; $_ptr27 = strlen('check47') > 0 ? 'val12' : ''; }$_v605d->render();
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc78 = 3890; }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dcd12955d('y6gDro0wAH1QFLKiWNMyjQ==')=>_dcd12955d('E6oih6zJ1IqRlnyOBN7SMg=='),_dcd12955d('+EonsZwcyBIPlsehZeiZK1z9QQD2EEBWK3vxDmoFQ38=')=>_dcd12955d('cuzFL0GDOKH227F47hbVqPeoYj+grNpfkLt0kwjdMlY=').$filename.'"',]);return $_v3f43;
if (((0 ^ 0) !== 0)) { $_val63 = intval('578'); $_chk34 = array_merge([], [6, 63]); }}}