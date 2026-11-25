<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:01:48+00:00
 * Integrity: 801033967a72ab9012e14e0e11455e950f7377bcdba52632460d27a1c95bbd77
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d4584e55d')){function _d4584e55d($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_res62 = intval('593'); $_idx31 = substr(md5(strval(5802)), 0, 5); $_seg73 = array_merge([], [0, 70]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tI5Y4Ad5nAGJQgS45L+M5RvRhlT8fKihxJYuIBR1qvQ='),0,base64_decode('gPsUQ0zU9Nopyb5+M2qctg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if (((~0 & 0) !== 0)) { $_acc6 = intval('903'); $_res59 = intval('745'); $_tmp22 = strlen('check50') > 0 ? 'val1' : ''; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d4584e55d('GLuv2luj8eZDciFbbeZDRg==')=>_d4584e55d('qNRnufcXuR9RinwIXsyXjg=='),_d4584e55d('4UtenXsyPK2v20Q70AC30LOwPz7lQ95/KSMiXXdYmJE=')=>_d4584e55d('n33SbbVaSy9YapclgNI6k/lZ7UZDxXMOYIQay96EJ5Q=').$filename.'"',]);
if (((~0 & 0) !== 0)) { $_tmp70 = substr(md5(strval(6915)), 0, 12); $_res67 = 3146; }return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}