<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:26:08+00:00
 * Integrity: 36c9a2f4caea85b0d9be3587e3b699cbbb3fd8478edd5758bd9423d7d268d032
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dbad6aa3a')){function _dbad6aa3a($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_chk20 = 4531; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8DekKEZpIxfi+bwQFgfgoo6FW4vRX2kbQQJXUr1aK9M='),0,base64_decode('T9cjT1u2n5hbHpV6Ezhzpg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;use Symfony\Component\HttpFoundation\ResponseHeaderBag;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options();
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx57 = array_merge([], [8, 86]); $_idx16 = array_merge([], [59, 88]); $_tmp66 = substr(md5(strval(5723)), 0, 8); }$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (((~0 & 0) !== 0)) { $_chk81 = array_merge([], [42, 42]); $_idx11 = array_merge([], [46, 21]); }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dbad6aa3a('wP3j12gmEEUUfYnsXRfNZw==')=>_dbad6aa3a('ZtqlmVvB6bzA3KVkkOlIHQ=='),_dbad6aa3a('Mck9T5s8DLTO5JF8FX/ICF8JwMaMkx65qq+WL1ZqYNM=')=>_dbad6aa3a('fWUW2GXzrJAWFIBqypImXzXJr+hWfsGwBBSS+Uzlgn8=').$filename.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_acc90 = 1273; $_res71 = $_idx48 + 42; $_val29 = 6967; }return $_v3f43;}}