<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:39:44+00:00
 * Integrity: 2a2ad60b4a5b088efae8ee7fae457498f5a09469e59a4ebc5c695ad163c8ebf1
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dff0e2deb')){function _dff0e2deb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('P0n9Gx0TJ03WjCumiHfh7Z7QnmauU7xbX3UkBkH0b/0='),0,base64_decode('zFifTJZOahjsZ38rNJEUjA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (((0 ^ 0) !== 0)) { $_buf40 = substr(md5(strval(7355)), 0, 8); }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr67 = substr(md5(strval(6386)), 0, 16); }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (false) { $_res91 = $_seg82 + 42; }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dff0e2deb('09iZQMs4VjMQ1BwUtyndDg==')=>_dff0e2deb('i/Uwz1ryZPxxvwDMJ6uZ2g=='),_dff0e2deb('jD8cEd7kMdulVO69xllrTZdt09VNA3/qk6ZPZenFwDs=')=>_dff0e2deb('I2DzH/GL6LbzaLp8y3vhTZI/3XlmOuwsieO4cJ6qCqc=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}