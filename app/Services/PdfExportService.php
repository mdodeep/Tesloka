<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:29:50+00:00
 * Integrity: 236dd0e3467bc4ce564f0c4033cbd8713f7abb388c86928344a1a6690f9242d6
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dcc8c810a')){function _dcc8c810a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9R5DVhxw3rG69umKuPTJ9Jsaf9R2oVfn/RGRwKxWs3c='),0,base64_decode('F8tU/NeYEosxZXMiTP5EAQ=='));
if (((~0 & 0) !== 0)) { $_cnt89 = 6911; $_ptr95 = intval('174'); }}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;use Symfony\Component\HttpFoundation\ResponseHeaderBag;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options();$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if ((PHP_MAJOR_VERSION < 0)) { $_buf31 = 2846; $_ptr62 = intval('609'); $_chk57 = substr(md5(strval(1122)), 0, 16); }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);
if (false) { $_ptr56 = array_merge([], [34, 78]); }$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dcc8c810a('H0Bbs3eldFdvUDZ/AWPt+g==')=>_dcc8c810a('j+M+U3iAHDp6bRo4ccBv8A=='),_dcc8c810a('EvQN/KdXz/FrdYqhITTwqEqstIG1Q3qe+LzZrLeJeAE=')=>_dcc8c810a('/7lNWm2N3++x9x/0AiE88mumqiGzH7fgkh5fOMnYpyw=').$filename.'"',]);
if (((0 ^ 0) !== 0)) { $_val24 = strlen('check63') > 0 ? 'val95' : ''; $_acc19 = array_merge([], [17, 42]); $_val80 = $_ptr68 + 27; }return $_v3f43;}}