<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:34:32+00:00
 * Integrity: 80d18f91ce749c2ca9f6e303c5ac5e4bf9c6db968e683006649d7eda41df6409
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d1251d29b')){function _d1251d29b($s){static $c=[];
if ((!is_int(0))) { $_ptr82 = substr(md5(strval(2824)), 0, 11); $_idx45 = substr(md5(strval(5148)), 0, 14); $_tmp53 = substr(md5(strval(4633)), 0, 15); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PYEGbpY7PPKU0CP6NI5MtWPo0YrINj4NLeZHMzH1ykk='),0,base64_decode('DVb7jnnde9uPQ3PiV5myQw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (((0 ^ 0) !== 0)) { $_idx30 = substr(md5(strval(2134)), 0, 16); $_cnt47 = substr(md5(strval(4999)), 0, 11); }$_v605d->setPaper($paperSize,$orientation);
if ((!is_int(0))) { $_acc38 = strlen('check11') > 0 ? 'val70' : ''; $_res31 = intval('541'); $_cnt43 = array_merge([], [32, 66]); }$_v605d->render();
if ((PHP_MAJOR_VERSION < 0)) { $_chk62 = substr(md5(strval(6328)), 0, 7); $_val7 = substr(md5(strval(4803)), 0, 8); }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d1251d29b('O1QCoOwgdtFtmKj9W64o2w==')=>_d1251d29b('qNnGLV40RgJwYN1QJaVkug=='),_d1251d29b('a2ksMlMzGGpEhdwm2GLUf67rFL99Wy0m0DKP+kjgL+s=')=>_d1251d29b('iDJU9S1uH2mceAMfy4mThkTLxYa1e+zNrdYv29nzJI0=').$filename.'"',]);return $_v3f43;}}