<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:21:27+00:00
 * Integrity: cac29e0d9c9989320d79b54a1e4b36b34f9c0df0567f6589675c3e541aaf218f
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dce46a6af')){function _dce46a6af($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GaG1la9cd+TNBm40RuRi92flKDSfdBY1y7WWVsC1TBw='),0,base64_decode('Wu6WpC1m/wl1GxpEaiRJUg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (((0 ^ 0) !== 0)) { $_seg47 = 4971; $_val59 = $_acc61 + 53; }$_v605d->setPaper($paperSize,$orientation);
if (((~0 & 0) !== 0)) { $_ptr48 = substr(md5(strval(9204)), 0, 9); $_cnt58 = intval('884'); $_tmp85 = strlen('check81') > 0 ? 'val16' : ''; }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dce46a6af('hmdMeCmlCTCMY01Y2elCcw==')=>_dce46a6af('ttytJu5KUweJwt7RpR9EFQ=='),_dce46a6af('lv6qknSO7x9Fife7eNGOGBsxTquBt6MWLco2c/jBXpQ=')=>_dce46a6af('OnoYOLVr0TubJhxk8K+uRqTDmfmjLCyR0rxaLDiqkMk=').$filename.'"',]);
if ((!is_int(0))) { $_ptr18 = 49; $_cnt76 = array_merge([], [86, 13]); $_res92 = intval('689'); }return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}