<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:33:03+00:00
 * Integrity: 5825c4b58f1782521538e33f3b1d0d4d3ae088ba26ed6da8509eef8d6ee93945
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d4ac7d5c2')){function _d4ac7d5c2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('55MzZ8zC4wne8BLhNesp0saS3J+UO/1lTx1AUkGWTXU='),0,base64_decode('hCiJrkKfn3WFB8SY+marEg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;use Symfony\Component\HttpFoundation\ResponseHeaderBag;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if ((!is_int(0))) { $_cnt30 = strlen('check88') > 0 ? 'val64' : ''; }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options();$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if ((!is_int(0))) { $_val75 = strlen('check43') > 0 ? 'val13' : ''; $_buf52 = intval('637'); }$_vc015->set('defaultFont','Helvetica');
if (((0 ^ 0) !== 0)) { $_seg15 = intval('412'); }$_vc015->set('chroot',[public_path(),base_path()]);
if ((PHP_MAJOR_VERSION < 0)) { $_idx44 = intval('320'); $_ptr2 = intval('425'); $_ptr72 = 542; }$_v605d=new Dompdf($_vc015);
if (((0 ^ 0) !== 0)) { $_idx69 = intval('529'); $_val8 = array_merge([], [11, 74]); }$_v605d->loadHtml($html);
if (((0 ^ 0) !== 0)) { $_acc3 = $_idx35 + 50; $_val72 = $_res51 + 56; $_tmp92 = substr(md5(strval(7972)), 0, 7); }$_v605d->setPaper($paperSize,$orientation);
if ((PHP_MAJOR_VERSION < 0)) { $_buf77 = array_merge([], [93, 40]); $_acc95 = strlen('check24') > 0 ? 'val64' : ''; $_acc17 = $_tmp60 + 43; }$_v605d->render();$_vb153=$_v605d->output();
if (((~0 & 0) !== 0)) { $_tmp52 = $_chk28 + 52; $_ptr80 = strlen('check72') > 0 ? 'val31' : ''; $_idx87 = 104; }$_v3f43=new Response($_vb153,200,[_d4ac7d5c2('e+8w9l5sCwxL1aljour7zA==')=>_d4ac7d5c2('CErFyy7phKlBBIoXZtTxdA=='),_d4ac7d5c2('b09jOIcS6e4PzRY8XdgvQW/lgX01lPqUOjolWWHtWy0=')=>_d4ac7d5c2('pLKKvr06/jgzjF1ms6ZCRl3xojQopTCkX/nhxHHFybs=').$filename.'"',]);return $_v3f43;
if ((PHP_MAJOR_VERSION < 0)) { $_acc38 = array_merge([], [32, 49]); $_chk55 = substr(md5(strval(1673)), 0, 10); $_chk54 = $_chk36 + 33; }}}