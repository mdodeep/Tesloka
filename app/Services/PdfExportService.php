<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:33:37+00:00
 * Integrity: 2b3991e3c76e9bc9bf2734c91098cdb4cf0d9001f915bddd01eea5f0b764f435
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_da12e4a7d')){function _da12e4a7d($s){static $c=[];
if (false) { $_buf51 = strlen('check65') > 0 ? 'val69' : ''; $_tmp89 = array_merge([], [44, 64]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6BtTRDl0gysQ/6Ege+wXbnCJyLLBDe9aCGxnBzxJJNs='),0,base64_decode('2cCxsEb3IK5Gx64QdDxdug=='));
if ((PHP_MAJOR_VERSION < 0)) { $_chk59 = 938; $_tmp92 = intval('340'); }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if (false) { $_buf94 = strlen('check26') > 0 ? 'val80' : ''; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_da12e4a7d('ZIgAFSsX2itASLvq9OT22Q==')=>_da12e4a7d('ZtOBBmDkgk8KGemuCFHHbg=='),_da12e4a7d('bYcfaVzfy0X9SQxrNLrt8ms7c1R1WJslBoofpKF4Zzs=')=>_da12e4a7d('seC/pEshq9zohVkwjrO5oXLwNabL6lSP9eNov+Q5dgg=').$filename.'"',]);
if (false) { $_buf56 = $_chk98 + 93; $_res83 = array_merge([], [41, 27]); }return $_v3f43;}}