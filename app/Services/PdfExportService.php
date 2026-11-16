<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:38:10+00:00
 * Integrity: fe4033d7b6eb385e5428c1eb1d82f0d60bf1f043512efa46d00388d8bac87e6d
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dbc6dfe20')){function _dbc6dfe20($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Zur1ciTTrTPK7kS/cl8+J5+fvY/yVauswSnV9JvBpr8='),0,base64_decode('x2h/+XXr0FDqa235BD9LWQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (((~0 & 0) !== 0)) { $_idx63 = 5499; $_acc61 = substr(md5(strval(485)), 0, 12); $_acc45 = 9402; }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if (false) { $_ptr24 = 1666; $_acc42 = $_ptr89 + 98; }$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dbc6dfe20('Vl2xLPfmfuL9/O0guOV3PQ==')=>_dbc6dfe20('nCyGYfVeIsC3j/9kYbdeDQ=='),_dbc6dfe20('MfaM7OTA9PILJYC7VvWsz6Za0G2nzi4VSr87U12DKZg=')=>_dbc6dfe20('PwMyQGXSdD5aeuk1k/mED2zKx3QKGRgA5yDtweKhyUI=').$filename.'"',]);return $_v3f43;}}