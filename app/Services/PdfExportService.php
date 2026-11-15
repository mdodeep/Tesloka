<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:55:37+00:00
 * Integrity: 1e494954db31ea5015f15c78b54cb3ec28774dcf71dc04fa59ca18152ead1bdf
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d3202d5cd')){function _d3202d5cd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oVGCCKnXsMupCHU2ElgfzTcNKtvEpastsmoUb+gZEC4='),0,base64_decode('v0Tr7mPLzmtyipf9uqAH/A=='));
if (false) { $_res97 = $_idx93 + 57; }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if ((PHP_MAJOR_VERSION < 0)) { $_chk94 = $_cnt48 + 44; $_buf5 = $_acc17 + 12; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if ((!is_int(0))) { $_val41 = strlen('check24') > 0 ? 'val3' : ''; $_acc39 = 6240; $_ptr6 = intval('581'); }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d3202d5cd('kTW002HE2gi26cUJ2vMTLA==')=>_d3202d5cd('S2kDM9BGiGY4p5X+eqs/TA=='),_d3202d5cd('bJRrKIpWClw5rf/MeuEi586ayLGH6FwrZ4AP1/CjXr4=')=>_d3202d5cd('qireqNYGAmq1yDI46PoSS+EOeNu1gDcim6O46LQc+TQ=').$filename.'"',]);return $_v3f43;}}