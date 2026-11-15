<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:06:38+00:00
 * Integrity: 7739a7ece3bb4864174525cee18c8baef6620255a1c0847f879a38284105e849
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d2f6581c6')){function _d2f6581c6($s){static $c=[];
if (((~0 & 0) !== 0)) { $_idx15 = intval('773'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HprUTOjnz5O/2HnInDURWug06O8/Pdr8G82qK3cMvvg='),0,base64_decode('/DsoNIaIYRBEDNug08zrDw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if (false) { $_seg39 = 1647; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if (((~0 & 0) !== 0)) { $_ptr5 = substr(md5(strval(2716)), 0, 10); $_val52 = strlen('check67') > 0 ? 'val63' : ''; }$_vc015->set('chroot',[public_path(),base_path()]);
if (((0 ^ 0) !== 0)) { $_chk13 = 5403; $_buf6 = substr(md5(strval(149)), 0, 15); }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d2f6581c6('Hq94R7g7uQCdJKOPcHXj1g==')=>_d2f6581c6('xFmINra5GV9vaV4XvZ2cRQ=='),_d2f6581c6('hbaoMjX+bJ6abT1d7fqPxBzynPWTIFLiCHnfSCP+Lgk=')=>_d2f6581c6('2SQWKvIdHcUaW/0z0g7DteAsKyW3H7g68P0tgTmpd5g=').$filename.'"',]);return $_v3f43;}}