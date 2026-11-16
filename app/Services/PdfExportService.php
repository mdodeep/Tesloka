<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:44:39+00:00
 * Integrity: e3e930e84d69e4e551158d8bff0589806df09b46df84f244df75a1f61989a560
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dd468c53d')){function _dd468c53d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('beuFX3jKNzdUt6E8DOHUYVQbKAiFcDhex0DeWnZzC4w='),0,base64_decode('ZQr9UVS4WiTUbLyrKerkuA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (false) { $_val97 = substr(md5(strval(9591)), 0, 16); }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if ((PHP_MAJOR_VERSION < 0)) { $_ptr97 = 7566; }$_vc015->set('chroot',[public_path(),base_path()]);
if ((PHP_MAJOR_VERSION < 0)) { $_val20 = strlen('check36') > 0 ? 'val25' : ''; }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr76 = array_merge([], [22, 30]); $_cnt11 = array_merge([], [79, 88]); $_buf56 = strlen('check47') > 0 ? 'val20' : ''; }$_v605d->setPaper($paperSize,$orientation);
if (((0 ^ 0) !== 0)) { $_tmp37 = array_merge([], [1, 38]); $_buf24 = strlen('check6') > 0 ? 'val34' : ''; }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dd468c53d('SOkm7DxnIPEa9AkIf18+ZQ==')=>_dd468c53d('XNcx3k/wL5qcYQCnuPh7Tg=='),_dd468c53d('eKy1OWSqgVLY8A2t4nmWB4U71aDl2PvyB4XRLdIayBI=')=>_dd468c53d('GwI3ddECo54wIQ9xApfLVgkK+Bs+KTDsFjsxCXwaPnU=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res76 = strlen('check71') > 0 ? 'val19' : ''; $_buf97 = intval('21'); $_idx27 = substr(md5(strval(9599)), 0, 6); }}}