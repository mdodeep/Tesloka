<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:47:06+00:00
 * Integrity: f408fa3e851c400fdf9ceb2524f4008d6b6a752b519867c0fa58e731adb24061
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d308f5c00')){function _d308f5c00($s){static $c=[];
if (false) { $_cnt49 = 3383; $_acc86 = substr(md5(strval(7483)), 0, 7); $_seg71 = strlen('check42') > 0 ? 'val31' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HFq5vAIJZ6IAfgIiGvg9CnkKSg0wNwK2ktx6VvaxlEc='),0,base64_decode('n7i2XdK++zLDVNi5M5deRw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if ((PHP_MAJOR_VERSION < 0)) { $_chk61 = substr(md5(strval(1111)), 0, 6); $_res27 = substr(md5(strval(447)), 0, 12); }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if ((PHP_MAJOR_VERSION < 0)) { $_idx97 = array_merge([], [62, 15]); $_ptr96 = strlen('check69') > 0 ? 'val78' : ''; }$_v605d->setPaper($paperSize,$orientation);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc29 = $_res9 + 46; }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d308f5c00('IwD+zhvpGUPucyF9+8gYZQ==')=>_d308f5c00('tNw4uI2k6YJoR7Crwzmkxw=='),_d308f5c00('EaOIAImrKgEmcWvLDXFWZU5XQMO7exJRg5aAfZcbCJI=')=>_d308f5c00('RDGOmOz4f0o0gd7gZKsMqANxtrU2sxSHr2ERFVGNFOE=').$filename.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc79 = $_idx16 + 56; }return $_v3f43;}}