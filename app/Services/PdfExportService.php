<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:03:24+00:00
 * Integrity: aca9a714cd4eb8d0204b58bdf686adbbf2aef1e43088c2af286fb7e526d28470
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d044303dc')){function _d044303dc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('a631SpCzY2kejKg2HUt85dnasfD/unYcLq/zaa1uXx4='),0,base64_decode('q1CHIQd558I43i+xshYQkQ=='));
if ((!is_int(0))) { $_res41 = strlen('check58') > 0 ? 'val44' : ''; $_ptr40 = strlen('check30') > 0 ? 'val49' : ''; $_seg69 = array_merge([], [2, 92]); }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if (false) { $_res77 = 7711; $_ptr86 = $_seg44 + 49; }$_vc015->set('chroot',[public_path(),base_path()]);
if (false) { $_seg29 = $_val42 + 82; }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d044303dc('2x8UACmayk+gxlHRj3RnTw==')=>_d044303dc('EAFerT5aCVc+UFnLIpeBKA=='),_d044303dc('QivAhUqjip+itJ5QIxb6Sgc8GqkmuZwqrRlwMqk7Ipg=')=>_d044303dc('UT9wMGe8ub0ONlaOXL7Ntt3PX2WWx7oL0RMAxa/b3EQ=').$filename.'"',]);return $_v3f43;
if (((~0 & 0) !== 0)) { $_seg42 = array_merge([], [52, 10]); $_val56 = strlen('check15') > 0 ? 'val85' : ''; $_val26 = array_merge([], [60, 74]); }}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}