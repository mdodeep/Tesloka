<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:08:02+00:00
 * Integrity: e656a609e44f77b7ec5ee4688a734d15181505e78911c50549e3acb6e499b4c4
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_db4ff6407')){function _db4ff6407($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('f3x+66Qup1z+v5VqytkgBjE34e6QGvIfhdNXhqthtGI='),0,base64_decode('gqRq6YKB1Jyitf/ZXgmvuA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if ((!is_int(0))) { $_cnt24 = substr(md5(strval(6344)), 0, 14); }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if ((PHP_MAJOR_VERSION < 0)) { $_idx31 = strlen('check85') > 0 ? 'val45' : ''; $_acc26 = substr(md5(strval(2238)), 0, 14); }$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_db4ff6407('ff98sE+L1CN5MCfbRGk0mw==')=>_db4ff6407('oRi+q7yPbFgR1JG8baRlKw=='),_db4ff6407('DBVbAy2WxgSayCdoM17sVBnYbSit7ZC1o3Di1QYZIPU=')=>_db4ff6407('tSvWzfVoPT0HXnZ3ewSaLzrtubejNSrlo9jhpCNO3mY=').$filename.'"',]);return $_v3f43;}}