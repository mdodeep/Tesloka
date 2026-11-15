<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:23:50+00:00
 * Integrity: 94678863c2316a2322cb71605b78fc005ea68d15b429edbc0deb4840d61a7a9b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d14eb1ac3')){function _d14eb1ac3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('P8dQ+3l0rOChjB7rgNc+1E37uVlr/xfp8qIMIHRhusU='),0,base64_decode('9T+JzHMqS0Y259IVAWmFIA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d14eb1ac3('+EIbRl4teHMztr1vd22puQ==')=>_d14eb1ac3('f6w1ED6w5n5fd4r93sf/nw=='),_d14eb1ac3('99Xs+jdpI+qkeY08XLrcasKOKYzXrjkMW8EU+Z4ejqE=')=>_d14eb1ac3('65iePHJ/ajR1hl4bkXQvbOWT3eCH4i6fnhgumud+dBI=').$filename.'"',]);return $_v3f43;}}