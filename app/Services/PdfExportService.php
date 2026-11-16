<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T01:23:56+00:00
 * Integrity: 4e1c7752e95c81a2683be7e5bb0fbaaad74a16613b448c0bfff220d1f9f10844
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d5097e8b2')){function _d5097e8b2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Io1UykRSXBmjDLji7evg8UTuccM21q3x4LIPfpcyW64='),0,base64_decode('KnOZEPLmrxi+T5V/HjpQfg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((0 ^ 0) !== 0)) { $_ptr86 = intval('248'); $_tmp59 = array_merge([], [25, 67]); }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr40 = 9324; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr0 = $_val80 + 69; }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d5097e8b2('CK25wbQUmj5rKa3u26yZbA==')=>_d5097e8b2('tt8a+tJhyr7qG6kSrB8iPw=='),_d5097e8b2('HqudfLZ7/DjAGu5tmEqeyvNadAXSmcNuhBsANwr31sQ=')=>_d5097e8b2('BvUpoIfP31vYDxhobed82NRmgdHCv4BRbetlCXOmnAM=').$filename.'"',]);
if (((~0 & 0) !== 0)) { $_cnt93 = 3490; $_acc96 = intval('130'); $_idx26 = strlen('check80') > 0 ? 'val81' : ''; }return $_v3f43;
if ((!is_int(0))) { $_seg31 = $_chk84 + 41; }}}