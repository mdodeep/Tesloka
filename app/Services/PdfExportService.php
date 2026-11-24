<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T17:19:43+00:00
 * Integrity: 0d0cfd963188e6f69ffd905d89a5782ff39994ec6201c2e3f6f03d5bb51ed515
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d8bfa96fd')){function _d8bfa96fd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MEF5Q/k/NMrnY8We7U8A35pPqbHMdk6Uf8TRsf4XsYI='),0,base64_decode('WmwpwVtM07yQbOrQbRQzIg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_idx50 = intval('165'); $_val60 = $_tmp55 + 9; $_acc26 = strlen('check10') > 0 ? 'val51' : ''; }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if (((0 ^ 0) !== 0)) { $_buf2 = intval('229'); $_cnt78 = 3370; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d8bfa96fd('MP3UCS/8AMZFV9u+nBgveA==')=>_d8bfa96fd('jt00FS3hrzXQc01/ptd7kQ=='),_d8bfa96fd('zCWyYej17dVVdsfFes+RweUdsoxA6bzCSh+wOJive3E=')=>_d8bfa96fd('8OOKGV8tQx2WoqvGufkV+hsqZ/CS++dqLveZZTHfdQQ=').$filename.'"',]);
if (false) { $_res57 = strlen('check80') > 0 ? 'val91' : ''; $_idx55 = intval('916'); }return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}