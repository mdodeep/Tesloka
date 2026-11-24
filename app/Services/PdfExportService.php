<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:39:11+00:00
 * Integrity: 794b6d1995c8180bfde18e4b875d8410027b5e6654ccd3d02db7ec3ceebe09bd
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dc5c558a4')){function _dc5c558a4($s){static $c=[];
if (false) { $_idx21 = intval('421'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('axXSVoWAh967g1mbZozmdIJzKz4WBcWXkW9hjJ6IwOM='),0,base64_decode('MergDasXsd1EdvqSfDajYQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res59 = strlen('check7') > 0 ? 'val80' : ''; $_tmp5 = strlen('check83') > 0 ? 'val77' : ''; $_chk3 = 4030; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if (false) { $_val28 = substr(md5(strval(3869)), 0, 5); }$_v605d->render();
if (((PHP_INT_SIZE * 0) !== 0)) { $_res8 = 4203; $_buf92 = $_tmp57 + 49; $_seg28 = strlen('check18') > 0 ? 'val46' : ''; }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dc5c558a4('2pVmyfCGqgmdYk2dNQrefQ==')=>_dc5c558a4('22HDaw/Eqvz/mp0Oq4sL0A=='),_dc5c558a4('A0oJEbm+jCyZ0R4ZnUYaC5TITUHqByrmT5DPKcnePNU=')=>_dc5c558a4('/FmL0NijmYEkew9WZ0dYIxNUxJyfMiJV3DuyBSDDaxU=').$filename.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_buf91 = $_cnt0 + 6; $_ptr44 = array_merge([], [89, 88]); $_val69 = 4698; }return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}