<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T06:08:59+00:00
 * Integrity: c03b6aa24b690558efc7f50ae03d2f3fdc86d599c8eee60225c90f4e06fd985b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_db4c4e68d')){function _db4c4e68d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VgRTVqiubeCNfrDDH2UW01j70ulBndqTfHt4t8qze4o='),0,base64_decode('ibhaDK1qNRKR1k1Zif7UhA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr2 = strlen('check84') > 0 ? 'val40' : ''; $_val30 = substr(md5(strval(9382)), 0, 6); $_tmp54 = intval('988'); }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk49 = intval('794'); }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();
if ((!is_int(0))) { $_res10 = 4887; $_seg50 = array_merge([], [3, 26]); }$_v3f43=new Response($_vb153,200,[_db4c4e68d('B9KnlPr7CPdtLxD0gU6ugw==')=>_db4c4e68d('gG/WNvBzOeOeNRF4FDMfCw=='),_db4c4e68d('Et4I1pzYkyqMFFP6EJZ1z9EfC3z1B/h+aEJrQSDJpaU=')=>_db4c4e68d('koGV6rSdUKlPVEvVdaBw6+qjtpGfF1hzfZkzGxQmufE=').$filename.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_idx55 = substr(md5(strval(2045)), 0, 8); $_idx71 = intval('588'); }return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}