<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:39:30+00:00
 * Integrity: 4ddb7b7803bfd3cb7e1aa8db3f5acf1ccb03971bde949f57afc886328393684e
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_da6dfa8bf')){function _da6dfa8bf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jpcWvRu0cvAUFJEMLwXkT8FuGVAP0w0nzkSvPpaZVyE='),0,base64_decode('QdlHPg8vXRtRX9ICGRY2lw=='));}}
use Dompdf\Dompdf;use Dompdf\Options;use Illuminate\Http\Response;use Symfony\Component\HttpFoundation\ResponseHeaderBag;class PdfExportService{public function renderView(string $view,array $data,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$html=view($view,$data)->render();return $this->renderHtml($html,$filename,$paperSize,$orientation);}public function renderHtml(string $html,string $filename,string $paperSize='a4',string $orientation='portrait'):Response{$_vc015=new Options();$_vc015->set('isHtml5ParserEnabled',true);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg51 = array_merge([], [55, 88]); $_acc8 = substr(md5(strval(9135)), 0, 12); $_tmp65 = array_merge([], [74, 38]); }$_vc015->set('isRemoteEnabled',true);$_vc015->set('defaultFont','Helvetica');$_vc015->set('chroot',[public_path(),base_path()]);$_v605d=new Dompdf($_vc015);$_v605d->loadHtml($html);$_v605d->setPaper($paperSize,$orientation);
if (((~0 & 0) !== 0)) { $_ptr65 = 7823; $_seg92 = strlen('check24') > 0 ? 'val62' : ''; }$_v605d->render();$_vb153=$_v605d->output();$_v3f43=new Response($_vb153,200,[_da6dfa8bf('vwTK2qJENVlcoj3mzt3+3A==')=>_da6dfa8bf('zSet0AvVDsjWyksrlD+JfA=='),_da6dfa8bf('K8pSt6daSimVJEB02x/E7fuA3LJ4GCaZb+hGwUrhjUE=')=>_da6dfa8bf('T6zRhqi8djqJ5ofucfy8lvIDV8cuvw94xrgl7orBIbs=').$filename.'"',]);
if (((0 ^ 0) !== 0)) { $_seg92 = $_res14 + 99; $_idx23 = substr(md5(strval(9791)), 0, 9); $_ptr96 = $_val13 + 54; }return $_v3f43;}}