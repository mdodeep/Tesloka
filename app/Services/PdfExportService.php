<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:37:09+00:00
 * Integrity: 084866937caee2c9d2f4af4b1e65df9254461de9b68566505ab7a1fbd14112d4
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dbbea48c9')){function _dbbea48c9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ccyU5QcOJ27qamCjfLKg0tHzcIQd3TLsJiM7eRGxwy8='),0,base64_decode('2tK8Of5/NIZ94yUjd1elPA=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();
if ((!is_int(0))) { $_val46 = 6902; $_tmp98 = 3302; $_acc68 = array_merge([], [68, 94]); }return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options;$_vc015->set('isHtml5ParserEnabled',true);$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');
if (((0 ^ 0) !== 0)) { $_idx42 = array_merge([], [17, 29]); $_chk86 = array_merge([], [8, 85]); $_res42 = 7704; }$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if ((!is_int(0))) { $_buf79 = intval('87'); $_acc54 = $_val65 + 97; $_acc86 = intval('107'); }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_dbbea48c9('1QsY6rximNFwzQTz9Yfbqw==')=>_dbbea48c9('P/QrbmIOumaT8+8MHEM9sQ=='),_dbbea48c9('/Ddzk9x8zUvt1xF94Nfj+iUZ+NY9lQatNBGJe48J1XU=')=>_dbbea48c9('s9EgnqALPkDOO2nbGojlxMPP1pY9cVnKlhMCJKyqWtk=').$filename.'"',]);return $_v3f43;}}