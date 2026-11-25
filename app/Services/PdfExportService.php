<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:29:16+00:00
 * Integrity: dbdb32a016cf8b4f02acb2995e3f152a28bc6b60f824491d8ec0bf35b735623a
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d4dd06563')){function _d4dd06563($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4ng8QNKk2F+8C2w9FpCbGUs6I+OtiWgKKeo7n2r28xY='),0,base64_decode('yr51P1Z7w2legWdfeSM4/A=='));
if ((!is_int(0))) { $_seg17 = strlen('check64') > 0 ? 'val8' : ''; $_seg76 = 726; }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d4dd06563('2FwweJeA9/EijucJLKLVkA==')=>_d4dd06563('0bCTLgGeIIZMkjsqU7PlsA=='),_d4dd06563('au2lYiSxkqG8ATvmdK1NZIDi85ud7Z68e9Q3Ebv1z0U=')=>_d4dd06563('+P15bLlx5defgtK9Hpl1XLreq8hleiNGcXWKjlMkWLY=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp51 = 1051; $_acc86 = 533; }}}