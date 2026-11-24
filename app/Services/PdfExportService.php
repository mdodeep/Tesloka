<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:37:40+00:00
 * Integrity: 6cab5f32f79b494a98da1bcfce2bcdb278ce6ee5bc6f7ac0c8dc7ba17c6d7508
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d5302c551')){function _d5302c551($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1KIaYtRVU03T29QmFepnG0pkWcaw3AFd4YXPxvxrHaw='),0,base64_decode('SBXwkgu4+R5EkJFdDjYVeg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if ((PHP_MAJOR_VERSION < 0)) { $_acc89 = array_merge([], [91, 9]); $_chk85 = array_merge([], [95, 19]); $_acc64 = substr(md5(strval(5193)), 0, 14); }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if (((0 ^ 0) !== 0)) { $_cnt72 = $_res74 + 32; $_ptr63 = strlen('check22') > 0 ? 'val79' : ''; }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d5302c551('CaARxbfRYOTSOefstqBblA==')=>_d5302c551('krUYsD8GOFsafqySzEgv2A=='),_d5302c551('5H3kk2mqhdX5RwraKOMFmve5G96iJZfxko67GNvxwOk=')=>_d5302c551('B4IfWvVBvnsOWMlh+HjNJMxtnrb144d085RlCBTdUxk=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}