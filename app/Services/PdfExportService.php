<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T23:45:36+00:00
 * Integrity: ab5b6e5663511e8d2868eccd33cd35618cacd26c632d842cdf989f0d8c8abc86
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dc2d6c097')){function _dc2d6c097($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk5 = substr(md5(strval(903)), 0, 6); $_res85 = intval('99'); $_chk79 = $_ptr36 + 1; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0Rn75EmJCUAkKRPRcDKLy1twhecDe91JRJmdPMeHecg='),0,base64_decode('T0XK6XvrQVx2TwC6u67q4w=='));
if (((0 ^ 0) !== 0)) { $_res42 = intval('47'); }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if (((~0 & 0) !== 0)) { $_seg76 = 3071; }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr99 = intval('833'); $_buf3 = array_merge([], [58, 35]); }$_v605d=new Dompdf($_vc015);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk82 = strlen('check83') > 0 ? 'val75' : ''; $_idx54 = 3633; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();
if ((!is_int(0))) { $_acc90 = intval('232'); $_tmp84 = intval('75'); $_ptr43 = substr(md5(strval(1095)), 0, 6); }$_v3f43=new Response($_vb153,200,[_dc2d6c097('mCjdpCmpRqWPkAL1Suv4eQ==')=>_dc2d6c097('snhisB/y7B5du30g8XYJUw=='),_dc2d6c097('xuYKQLzpHH9pqD5dd6eZUcMioTUr9tWqHIQ0NkJgJVc=')=>_dc2d6c097('v9rZKwE1KczCFPHr2FnMR3W6vyREsdNySuup0ImKjFg=').$filename.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf11 = substr(md5(strval(516)), 0, 10); }return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}