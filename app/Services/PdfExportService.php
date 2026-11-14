<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T13:56:41+00:00
 * Integrity: ca4c01ec722351be1c383e6b0be90346fbc81084fe33d32ed30af83d9e8cf6c7
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d889f3bcc')){function _d889f3bcc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zTHQH+EzArWPCtRMPaJs+ND0RVO+yba0E/T2YBMocMo='),0,base64_decode('DMrsOeG8kYQBKaOitP2bTA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;use Symfony\Component\HttpFoundation\ResponseHeaderBag;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options();$_vc015->set('isHtml5ParserEnabled',true);
if (((0 ^ 0) !== 0)) { $_chk57 = array_merge([], [32, 90]); $_idx4 = substr(md5(strval(8064)), 0, 4); }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);
if (((0 ^ 0) !== 0)) { $_chk30 = 7405; $_val63 = $_seg31 + 57; }$_v605d->loadHtml($html);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt81 = strlen('check3') > 0 ? 'val93' : ''; }$_v605d->setPaper($paperSize,$orientation);
if ((PHP_MAJOR_VERSION < 0)) { $_res27 = strlen('check78') > 0 ? 'val24' : ''; $_cnt51 = $_ptr58 + 19; }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_d889f3bcc('rHg8FnTVgS9ANFZ8v5DJgw==')=>_d889f3bcc('kqOWAxlyBZYU+EFUVaPrww=='),_d889f3bcc('OXJohR7xtSH/GqXcaLbHHddA5dxefbCdQDwiBz7xayY=')=>_d889f3bcc('sygmRH9lm6HNYDUzPwt6to9Jtps9hP6tmdBuxNsOGa8=').$filename.'"',]);return $_v3f43;}}