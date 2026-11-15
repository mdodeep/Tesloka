<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:46:02+00:00
 * Integrity: f9ed865aa2b3a149f714e6e801f56d0022b9a58a2f332e2509e77f5cea28b630
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_db1ba52d2')){function _db1ba52d2($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_val92 = strlen('check82') > 0 ? 'val47' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vDfQXSPyNNl+zQjOoniLyHQ+0Pt+TssX36wX5pa3b0s='),0,base64_decode('+eXQPQnuB+hCbTXFtHaLDQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_db1ba52d2('BiP1vO+8A/W+3yLE0rvymg==')=>_db1ba52d2('v/f3kc4dLzvvnZMcQWhXhA=='),_db1ba52d2('VQR4Vmldka4tmz59TGBFD4wc1ePww/NwtoyaQIW0J/I=')=>_db1ba52d2('V59S+2jtICm7Ttp8CzNxMq10g9r9iti9otFg205sAkA=').$filename.'"',]);
if (((~0 & 0) !== 0)) { $_ptr31 = intval('674'); $_tmp54 = array_merge([], [21, 8]); }return $_v3f43;}}