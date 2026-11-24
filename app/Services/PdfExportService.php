<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T14:53:15+00:00
 * Integrity: 66ff9d9327da48d51ef30c1b87340781e68d1e35da02241fa08da010e021b253
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dd0af5890')){function _dd0af5890($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_ptr38 = intval('847'); $_chk62 = $_idx67 + 20; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KKFl23HgGgADPxuLwg9ZPGjy5LT0WAlRSLfKVNx1RjM='),0,base64_decode('41/SyqJmQqttC+/zYizKSA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if ((!is_int(0))) { $_val96 = $_ptr20 + 7; $_seg15 = 4710; $_val54 = strlen('check73') > 0 ? 'val37' : ''; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if ((PHP_MAJOR_VERSION < 0)) { $_buf42 = intval('316'); $_buf49 = intval('178'); }$_v605d->loadHtml($html);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr33 = array_merge([], [92, 88]); }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if ((PHP_MAJOR_VERSION < 0)) { $_val95 = intval('169'); $_tmp70 = $_tmp53 + 46; $_tmp21 = intval('868'); }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dd0af5890('vobrjRaStsWyT/15M4TYoA==')=>_dd0af5890('IE+9l1AS+JWrK1TVMDVt0w=='),_dd0af5890('9NgNmOuuq3tITdw8DXWCOf1RYJGNLIdVfhyzKTW0F8c=')=>_dd0af5890('EgesIrIx3xg9HIIxJTtOJYXyzka828RuRhgms5YSXfg=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);
if (false) { $_buf90 = intval('704'); $_cnt82 = intval('165'); $_ptr61 = strlen('check25') > 0 ? 'val74' : ''; }}}