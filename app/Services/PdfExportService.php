<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:05:07+00:00
 * Integrity: a8e88f52112376f553c68c8832e8c8753f9719b0fe90114b81a1ce80a12cfca6
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dc7321056')){function _dc7321056($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ahoY+JTYU1arnQu3+wgYmr7atZ7KETzaBciPwcF6W5s='),0,base64_decode('Zm2veDIGENMTeP77TTrRkQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc48 = 4415; $_tmp1 = $_idx53 + 78; }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);
if (((0 ^ 0) !== 0)) { $_val48 = $_cnt70 + 5; $_acc13 = intval('617'); }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if (((0 ^ 0) !== 0)) { $_acc49 = array_merge([], [4, 62]); }$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();
if (((~0 & 0) !== 0)) { $_tmp21 = 1058; }$_v3f43=new Response($_vb153,200,[_dc7321056('7QsbwDqoHzpzEH+BaZvMGw==')=>_dc7321056('Zq1fogLv5CbEJo5Lgrsr5g=='),_dc7321056('G2kI7kBU8Rf/Kp1SoIAJk0rDH/UJq4uW4ZltG4cbZks=')=>_dc7321056('Ex9ZkqMgxucYI2gU/+GI0V6S+ZDEIIvxGaTMZW3XObY=').$filename.'"',]);return $_v3f43;
if (((~0 & 0) !== 0)) { $_tmp55 = 554; $_cnt36 = 9527; $_cnt59 = strlen('check79') > 0 ? 'val78' : ''; }}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}