<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:24:08+00:00
 * Integrity: d265ea50dc5bbc689fa520fd4333b1bc1a3d5e6acda2777d1c9a7eca14bc6d59
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d111577eb')){function _d111577eb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/Bcb/vI0KQWTyFHQGrTOBZLVPQcyi5VId5p/5/OeJGA='),0,base64_decode('qrkpSeNwqf54QSZi99o3xw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if ((PHP_MAJOR_VERSION < 0)) { $_acc15 = substr(md5(strval(3678)), 0, 16); }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d111577eb('qovjl909nHN6H+qkiSAFkA==')=>_d111577eb('RAJ35GIKoAUBsOHIl/AbNQ=='),_d111577eb('/dgz2IULSa6f2LAqPy1PNCm6vJkAkWg89JqQ4JT7gjU=')=>_d111577eb('2HXkoqdOM4Pa5WA3OT72rv+opyGsgqnBZpgYYtWuruI=').$filename.'"',]);
if (((0 ^ 0) !== 0)) { $_chk54 = 3364; }return $_v3f43;}}