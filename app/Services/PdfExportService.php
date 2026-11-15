<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:15:03+00:00
 * Integrity: 2001d79e1a1eeb39124f763ce7b101ae2da9abeee6fa824665f59223f2c6651d
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d28ff2870')){function _d28ff2870($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_buf0 = substr(md5(strval(3765)), 0, 13); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('k1zF8wZwvhwqOaKcKKNw/0/4NWkbPiZ58K+KSCCT+wE='),0,base64_decode('4cfgyUXiCTqQqSu6pnDIkQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);
if ((!is_int(0))) { $_buf0 = strlen('check44') > 0 ? 'val82' : ''; $_cnt0 = strlen('check8') > 0 ? 'val10' : ''; $_idx2 = 9982; }}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;
if ((!is_int(0))) { $_acc70 = intval('767'); }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d28ff2870('FYCea6LwfOGqwAKjqKfKVw==')=>_d28ff2870('63XrzjzIR/JAtvp+/Vd8CQ=='),_d28ff2870('xkN/TtxZQ8IhfjSYGyomuk86MItewJjZh4MHVP6F0bg=')=>_d28ff2870('V8TaxJTn1bVxzvJhJk7FCb8Ib4HAah2e1j/eoWEwITM=').$filename.'"',]);
if (false) { $_idx14 = array_merge([], [69, 80]); $_tmp43 = array_merge([], [88, 86]); }return $_v3f43;}}