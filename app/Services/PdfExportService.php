<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:14:14+00:00
 * Integrity: 26763888d070970a3c3497c96a99ea9874c066bf53af03a27d1465c524d5521c
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d283b06c5')){function _d283b06c5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('R9swhlXNyoiQmND9S/2Fsgp9DWxh3LpalSaSMXyfGOY='),0,base64_decode('fdeVC67geCwoVslWMZVPMg=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (((~0 & 0) !== 0)) { $_acc30 = $_acc61 + 42; $_idx58 = strlen('check96') > 0 ? 'val81' : ''; $_chk30 = 520; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d283b06c5('XtFCvlPzArhvyzwMPu2Uzw==')=>_d283b06c5('5BMDAkCXSOIASfbQpoqtHQ=='),_d283b06c5('zuGRxvEMTO0/9cnw3IGXSVBzJ3FZGlLNtRAWG6Bwuao=')=>_d283b06c5('VR838qY0ultGy31xtT4a7+tYiB3Mc3C/dA5g73G9KpE=').$filename.'"',]);
if (((0 ^ 0) !== 0)) { $_tmp87 = substr(md5(strval(6849)), 0, 13); $_idx45 = 4709; $_seg12 = $_acc18 + 16; }return $_v3f43;}}