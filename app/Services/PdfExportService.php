<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:10:06+00:00
 * Integrity: 90830522eac3cf227eb1444b6716fee34fb1ae71e0fc3173d8b1481d1b2703a4
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dce59cbd9')){function _dce59cbd9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('B4NpeUnJ1y6YjzQAhd2SzynCjc//FNc0F2tGIqjAotY='),0,base64_decode('T2rm5JYjFM6FjaJUkSyUOg=='));
if ((!is_int(0))) { $_acc60 = 7183; }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;use Symfony\Component\HttpFoundation\ResponseHeaderBag;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options();$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();
if (((~0 & 0) !== 0)) { $_chk92 = intval('284'); $_val85 = strlen('check64') > 0 ? 'val57' : ''; }$_v3f43=new Response($_vb153,200,[_dce59cbd9('idGJInX1EW4DO9JY4e8BnA==')=>_dce59cbd9('HKQgGVaPp9baoOTR9u/u+w=='),_dce59cbd9('R/nYg+ipYc7BzSOn2fMULzFCE6s5NnNndH2a8X7ArAw=')=>_dce59cbd9('5Pc3CAl3OsewSoYz7aavfcwHm+JttOOhHRDZxmAjFNY=').$filename.'"',]);return $_v3f43;}}