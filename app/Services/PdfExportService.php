<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T17:59:53+00:00
 * Integrity: 9ba37b7ecbe490b996eace8ef05487c0089053d15d2a1808fabace0d2dc08965
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dab83caeb')){function _dab83caeb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7W8Bh1Y0p20zOmmTe0Um58Hw+kNSMqo+GXJf+6796Zc='),0,base64_decode('pjV8jdGX95HTi622a2ucUQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if ((!is_int(0))) { $_res16 = $_buf79 + 30; }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if ((PHP_MAJOR_VERSION < 0)) { $_buf12 = $_seg17 + 17; $_idx16 = strlen('check99') > 0 ? 'val9' : ''; $_idx6 = strlen('check67') > 0 ? 'val47' : ''; }$_vc015->set('chroot',[public_path(),base_path()]);
if (((~0 & 0) !== 0)) { $_cnt1 = substr(md5(strval(741)), 0, 15); $_ptr52 = substr(md5(strval(116)), 0, 8); $_idx25 = array_merge([], [71, 25]); }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr31 = intval('392'); $_res78 = intval('404'); $_tmp74 = 3257; }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dab83caeb('U2L0R/6hoiSf5qAnU8tZ2g==')=>_dab83caeb('ddRuW3JUI0+o9jzmb6QtEA=='),_dab83caeb('RvsWnx2uEG1Xo1wfVrrtueJPBfgTsw9cZGnHoAPGl7E=')=>_dab83caeb('zSrfHwKUMkIwfri1qkdVourG9frJCW4lYSjN1IYFz9k=').$filename.'"',]);
if (((0 ^ 0) !== 0)) { $_seg16 = $_val8 + 33; }return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}