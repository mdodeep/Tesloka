<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:16:52+00:00
 * Integrity: 9608faf490ace42a088afd556a3015b66d607ed122548cc1fcd4ed5fbf584b4d
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_db637bf50')){function _db637bf50($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('evQqu2/chKoZjvh2/Sm3dWJLcc1xOtOcE39m5mSp5Xc='),0,base64_decode('6PNkK2zseNiQ0z4VG38ZyQ=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;use Symfony\Component\HttpFoundation\ResponseHeaderBag;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options();$_vc015->set('isHtml5ParserEnabled',true);
if (((0 ^ 0) !== 0)) { $_idx84 = array_merge([], [62, 45]); $_buf7 = strlen('check59') > 0 ? 'val16' : ''; }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);
if (((0 ^ 0) !== 0)) { $_idx91 = strlen('check50') > 0 ? 'val12' : ''; $_buf32 = strlen('check3') > 0 ? 'val60' : ''; $_tmp22 = strlen('check32') > 0 ? 'val96' : ''; }$_v605d=new Dompdf($_vc015);
if (((~0 & 0) !== 0)) { $_tmp80 = strlen('check73') > 0 ? 'val3' : ''; $_val16 = strlen('check68') > 0 ? 'val98' : ''; }$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);$_v605d->render();
if (((0 ^ 0) !== 0)) { $_cnt94 = 386; $_val98 = strlen('check49') > 0 ? 'val99' : ''; }$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_db637bf50('3NFJ35Ikcef0LeFa9tKkng==')=>_db637bf50('Yn6qXm4C1GUCGZNrZrgsZg=='),_db637bf50('Yp87K/7/pPk4WcXRk98UKKqrVYkdewaknqTscovvSX0=')=>_db637bf50('J7VU8AdVA1bGh1JfkMbSjeM/9CQp3JnexG19Dh2rIPQ=').$filename.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr90 = 352; }return $_v3f43;}}