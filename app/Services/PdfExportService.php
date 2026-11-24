<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T00:08:21+00:00
 * Integrity: e2d6ed59f9f7faebfce4df88a34a26f59e037c7a22cc74a203ec30f8a25d5b4e
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_de80ef3d8')){function _de80ef3d8($s){static $c=[];
if ((!is_int(0))) { $_idx26 = $_chk39 + 74; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('92buSZocp7Pqao4dJ1NFY+FKktCToJiLSkBmL5llRp4='),0,base64_decode('t51ajD37cO9L2qNOujRM8w=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (((0 ^ 0) !== 0)) { $_val54 = array_merge([], [54, 13]); }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if ((!is_int(0))) { $_tmp83 = intval('169'); }$_vc015->set('isRemoteEnabled',true);
if ((PHP_MAJOR_VERSION < 0)) { $_chk8 = array_merge([], [66, 95]); $_val52 = substr(md5(strval(5743)), 0, 9); $_acc64 = $_res27 + 89; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_de80ef3d8('PE7J6Ci01AJ4TMaJpCYmAQ==')=>_de80ef3d8('dpivr1YfPCltHwIMtY9smQ=='),_de80ef3d8('zB7qf37ewMOkauWdLCTNA6um6fBVofdbr2v+1P3aLgI=')=>_de80ef3d8('WZLFx+3NJvUmZACC8t/igq8kYkHppqF3jj1FEP+snQ0=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}