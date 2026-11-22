<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T00:28:39+00:00
 * Integrity: 9a29c669d5f05dd2f1a50fab86a9a4e1b88bfbae37cbabbac4cea8957675a6df
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dcaf4d5ee')){function _dcaf4d5ee($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hdU6HVYtbJ/vyYfidrhzfyFjFRQvtv2sGObOd94OgbE='),0,base64_decode('yHDlDcnQCS2OjVu7QZpfLA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);
if (false) { $_tmp44 = 1493; $_res61 = strlen('check63') > 0 ? 'val96' : ''; }$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if (((~0 & 0) !== 0)) { $_val68 = array_merge([], [91, 74]); $_res59 = 6822; $_tmp51 = array_merge([], [82, 0]); }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dcaf4d5ee('BXyRg1xzDqdSWmi7tZI7vw==')=>_dcaf4d5ee('YUEo2RVxAuU8YeS8l4pndQ=='),_dcaf4d5ee('6OkhgoYFj9VcbVy1dC0/X9eRaUVm94savU14qjW+Jwk=')=>_dcaf4d5ee('pywdOf1G1xwmJg+uZzNG0reFonI5tPAjX8DqTfReiDY=').$filename.'"',]);return $_v3f43;}public function streamPdf(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{return $this->renderHtml($html,$filename,$paperSize,$orientation);}}