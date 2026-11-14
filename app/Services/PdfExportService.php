<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:02:59+00:00
 * Integrity: 4edd3c90534f55b33f572aa5269c8814b50e3f7edbc23e0daa0329b9f63e51ee
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d16028727')){function _d16028727($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_chk2 = substr(md5(strval(2293)), 0, 9); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uqC8UY2kj0TU6Y3Tw303wErle8t5ZZoj3TamZRr30es='),0,base64_decode('sD2KH4xJwZmOq7/HcvlgHA=='));
if (false) { $_tmp68 = array_merge([], [24, 17]); $_buf33 = intval('973'); $_tmp47 = strlen('check70') > 0 ? 'val14' : ''; }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;use Symfony\Component\HttpFoundation\ResponseHeaderBag;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options();$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if ((!is_int(0))) { $_cnt3 = 8462; $_idx68 = 7081; $_buf7 = 9551; }$_v605d->render();
if ((PHP_MAJOR_VERSION < 0)) { $_buf54 = $_acc55 + 61; $_cnt58 = substr(md5(strval(2516)), 0, 9); }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d16028727('oYlTwli7G/L9ThKW7pVUOQ==')=>_d16028727('AJJO0zVD0p0CWLe6s0MtFQ=='),_d16028727('Hlu7Y68RVir9IcKn+D0bZ1kQqTuqjAJhwL3qLjFT3v0=')=>_d16028727('kJRVK/Fw4PsnydcygD5Lpa5CxNJcid3gJONpR2KOb+M=').$filename.'"',]);return $_v3f43;}}