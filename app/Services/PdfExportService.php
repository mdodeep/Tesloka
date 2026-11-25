<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:00:40+00:00
 * Integrity: 8004d8cb5a4f600e1c5bcc23dc48e53209682cbfd80a127b9bc385cbe0456d79
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d3b048a7f')){function _d3b048a7f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XaXuovA1Un1eihi0EFftMfWbcFyZdudkTWjyLyP/7po='),0,base64_decode('b00XDEJOO55PcsiWnn08nw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (((0 ^ 0) !== 0)) { $_tmp93 = intval('45'); $_val28 = strlen('check12') > 0 ? 'val72' : ''; $_tmp96 = 489; }return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (false) { $_chk61 = array_merge([], [14, 59]); }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if ((PHP_MAJOR_VERSION < 0)) { $_seg38 = $_buf57 + 33; }$_vc015->set('isHtml5ParserEnabled',true);
if (false) { $_chk61 = substr(md5(strval(7811)), 0, 7); $_val97 = substr(md5(strval(5702)), 0, 13); $_chk32 = substr(md5(strval(3434)), 0, 4); }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp91 = strlen('check57') > 0 ? 'val6' : ''; $_acc82 = substr(md5(strval(5690)), 0, 11); $_acc50 = 4894; }$_v605d->setPaper($paperSize,$orientation);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp94 = substr(md5(strval(3035)), 0, 15); $_tmp77 = intval('329'); }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d3b048a7f('T6Es7p31ZBX9hCw6esMVig==')=>_d3b048a7f('VQuxstppuzbu/jhCW771Eg=='),_d3b048a7f('RG80F8WsELdDIZfhuVH8PdYPnVPmhSRRnCgrjcfOJ+I=')=>_d3b048a7f('+OTE9XUm/Y/iWjPSr2ty8MbZVQ5ftYtzZXi4vZkP9dg=').$filename.'"',]);
if (false) { $_chk73 = intval('925'); $_tmp28 = substr(md5(strval(5028)), 0, 7); $_res77 = $_seg95 + 89; }return $_v3f43;
if ((PHP_MAJOR_VERSION < 0)) { $_tmp16 = substr(md5(strval(4667)), 0, 9); $_cnt99 = intval('809'); $_cnt83 = substr(md5(strval(5173)), 0, 10); }}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}