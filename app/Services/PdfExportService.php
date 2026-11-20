<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T11:21:17+00:00
 * Integrity: f306e282dd584688fe4bfc0548558cfabe05607eed8ce659a5adade5b4d7082e
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_df1ee166a')){function _df1ee166a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JQxQL567zeLXWtk6x25ZSav9fMoVFInxHcfdS+a74X0='),0,base64_decode('nDcprXhiJQvwPj+/VrDEmg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if (((~0 & 0) !== 0)) { $_res39 = strlen('check87') > 0 ? 'val53' : ''; $_cnt53 = 5475; $_tmp1 = strlen('check17') > 0 ? 'val77' : ''; }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if (false) { $_val27 = $_cnt38 + 54; $_idx74 = array_merge([], [94, 39]); }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_df1ee166a('TaV8h+Dzl4qoiSE00Vc9Rg==')=>_df1ee166a('HVvqbPvFJkixysY1C23W6w=='),_df1ee166a('UBxy99NX75inPIparv/7lxe3qfxDuT/NSZgz7fxOyns=')=>_df1ee166a('xNjppdg154di9LawwQxkpEwDrkmRRAhg8Du9L+1xxeQ=').$filename.'"',]);return $_v3f43;
if ((PHP_MAJOR_VERSION < 0)) { $_acc65 = substr(md5(strval(9007)), 0, 4); $_val85 = 8809; $_buf82 = array_merge([], [74, 96]); }}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((0 ^ 0) !== 0)) { $_cnt99 = strlen('check53') > 0 ? 'val62' : ''; $_buf54 = intval('34'); $_cnt65 = 6123; }}}