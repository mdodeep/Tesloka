<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T07:59:37+00:00
 * Integrity: c635bcfb7442de6e654a0ea961cef649d138320aa02c080e7a6c08c6bda193cc
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d0ddad46e')){function _d0ddad46e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ofIXqj3WLapHyEQt5swglDuneHIW/uo9BVD/XPOQjag='),0,base64_decode('WXWWxgGBSuR6D6iZM5JBkA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (((~0 & 0) !== 0)) { $_tmp64 = strlen('check51') > 0 ? 'val40' : ''; $_chk47 = strlen('check7') > 0 ? 'val68' : ''; }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (((0 ^ 0) !== 0)) { $_acc19 = $_acc19 + 39; $_chk22 = intval('915'); $_cnt98 = $_tmp79 + 3; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if (false) { $_acc9 = substr(md5(strval(3434)), 0, 5); $_buf73 = array_merge([], [85, 96]); $_val19 = intval('302'); }$_v605d=new Dompdf($_vc015);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp59 = substr(md5(strval(5440)), 0, 5); $_tmp24 = strlen('check55') > 0 ? 'val5' : ''; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d0ddad46e('gMqtiluVMR3BVLcZbD76jA==')=>_d0ddad46e('wj1Yt0zyoMNovbrNfNIWiw=='),_d0ddad46e('9sPxxA9X+tXyK/92NtuR9jL4MT9lm02jH1VJHNo21tI=')=>_d0ddad46e('nx+0OE7C48dudHuxOrPVJx+x9zqrRkGid5fnRGdJcrE=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}