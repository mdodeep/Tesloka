<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:52:39+00:00
 * Integrity: 2474375cdffefca3312fed197f4d5978af35cf7ce2041d9337b6c641bbaffc53
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_df715bdd6')){function _df715bdd6($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr38 = substr(md5(strval(282)), 0, 15); $_seg16 = substr(md5(strval(5218)), 0, 5); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XruekIZe3IYHlbHCWG04ABz6oAlvFennapFTooR8gAI='),0,base64_decode('VRWoeUD5gDflH81YOVDgdg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;use Symfony\Component\HttpFoundation\ResponseHeaderBag;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options();
if (((~0 & 0) !== 0)) { $_buf67 = array_merge([], [77, 58]); $_val72 = $_seg94 + 98; $_seg81 = 3880; }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if ((!is_int(0))) { $_acc3 = 2419; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf46 = intval('622'); $_cnt29 = strlen('check44') > 0 ? 'val36' : ''; $_idx86 = 9704; }$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if (((~0 & 0) !== 0)) { $_seg94 = $_buf23 + 63; $_cnt84 = substr(md5(strval(8665)), 0, 7); $_tmp27 = array_merge([], [58, 87]); }$_v605d->render();
if (((0 ^ 0) !== 0)) { $_acc73 = array_merge([], [86, 30]); }$_vb153=$_v605d->output();
if (false) { $_res48 = 6104; $_res80 = intval('193'); }$_v3f43=new Response($_vb153,200,[_df715bdd6('37twWq2JFvXvIn32fFULNw==')=>_df715bdd6('vPG5fq0bHQwFzVpCbwOZGQ=='),_df715bdd6('v+D1gqJjjJ0Ed4WrimB0lKpZZczdqsDrhIXgQZ4J1ZE=')=>_df715bdd6('yaPm1FF5NwW88JjnkI+9ex3AbWt4Q8URMltCJwdOTSY=').$filename.'"',]);return $_v3f43;
if (((0 ^ 0) !== 0)) { $_idx49 = 1069; $_chk76 = 5287; }}}