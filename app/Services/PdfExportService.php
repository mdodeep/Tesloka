<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:53:12+00:00
 * Integrity: b59a44e39efc32b80f54030355ee759724e6d68712aa09d15db462d921406c9c
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d2bd7e1db')){function _d2bd7e1db($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KdY5MU19sJZKfy//DJS6yltHNP+Vn/JaIXXCvVGoxv0='),0,base64_decode('yvvl11j5qcSxsidFXUVlcA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if ((PHP_MAJOR_VERSION < 0)) { $_buf62 = 7856; $_ptr47 = substr(md5(strval(2558)), 0, 13); $_tmp53 = array_merge([], [6, 49]); }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if ((PHP_MAJOR_VERSION < 0)) { $_res62 = strlen('check64') > 0 ? 'val29' : ''; $_ptr8 = array_merge([], [72, 8]); }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();
if ((!is_int(0))) { $_tmp25 = substr(md5(strval(9050)), 0, 8); $_chk64 = strlen('check31') > 0 ? 'val20' : ''; }$_v3f43=new Response($_vb153,200,[_d2bd7e1db('3v6O3PNPdzAVUAmRJqqoqQ==')=>_d2bd7e1db('2Dqoi71ODiHZB4V9fTITAA=='),_d2bd7e1db('x1COHFzWYlx5j3Cd1leWe9HQpPxlPwBvZ5ACLmBdVE0=')=>_d2bd7e1db('bRym43JElx3NPSeViznK+8XRnvT3knNs4Z3nzSExVbY=').$filename.'"',]);return $_v3f43;}}