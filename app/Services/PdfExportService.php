<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:44:11+00:00
 * Integrity: edd074c8e740da8aa4cb5d5dde15c72b21ea211882671f62e8f210651ef543bb
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d1cb8e252')){function _d1cb8e252($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('V1u2PNdEgciNHwkztfxK63GfnpDzdrbwrgdeFMhbah4='),0,base64_decode('TSeioLrLdTEogj8x2E5vKQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (false) { $_tmp91 = substr(md5(strval(9949)), 0, 10); $_cnt66 = substr(md5(strval(7345)), 0, 12); $_idx7 = 1678; }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if ((PHP_MAJOR_VERSION < 0)) { $_acc85 = strlen('check9') > 0 ? 'val86' : ''; $_ptr66 = $_seg97 + 42; $_idx34 = array_merge([], [77, 57]); }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if (((~0 & 0) !== 0)) { $_res95 = 480; $_tmp35 = array_merge([], [38, 79]); $_buf89 = $_seg9 + 52; }$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d1cb8e252('C1jGJdlT053tjI+XNhzqig==')=>_d1cb8e252('RdQGrPRxmGMqMcMk8Yuffg=='),_d1cb8e252('u/gFNLuIqiXV84vgP2FAZ9TqvHaQ63r6fu5gazS1cpc=')=>_d1cb8e252('NFkDlu+kAX5kS/uSJBrYnoDyiljkNn2L7HDO4rfkSN4=').$filename.'"',]);return $_v3f43;}}