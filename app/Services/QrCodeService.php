<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:14:50+00:00
 * Integrity: f85c349e6d597ae8dbe016acded77964614944975eae1a9a0dc888ecaabf0fad
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d626871b6')){function _d626871b6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('CRnk+WwSGCzzBTGHkmQMyx+0Wkcyzx+62XozLfet/rs='),0,base64_decode('2xwiExi7exdCi+RZY7PpVg=='));
if (((0 ^ 0) !== 0)) { $_ptr12 = strlen('check24') > 0 ? 'val59' : ''; $_val87 = strlen('check83') > 0 ? 'val30' : ''; }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((~0 & 0) !== 0)) { $_idx19 = $_cnt33 + 1; $_res49 = array_merge([], [83, 0]); $_res22 = substr(md5(strval(7835)), 0, 16); }$_v79a2=new Writer($_ve28f);
if (((~0 & 0) !== 0)) { $_cnt61 = strlen('check70') > 0 ? 'val47' : ''; }$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d626871b6('W9A2LjMfqemn/75GUe/Ndw=='),'',$_vd007);$_veb9e=preg_replace(_d626871b6('y5Vgc3MIVNz7hyWwNCzlytMyA0o7L5q+otM+dCDO+Sk='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d626871b6('X/+6r+w/5PocLRXbR1SfQ47WE4L1WNmUFquHglh+V1jOCK2WOHBRQahXkVawYvRWpSRZKnTCTNillvML6NJibcw68KbgBtZY/20p2Z7ViPUpXDglaVcsIJjQS1LB3Hod')._d626871b6('6C1VH2OH4iHkvcWdkMeQ8DgtnbRoX2ye6ji9Jxilo0DYoXYIgtsxnVhJthJ+BqzhimNUFh5j1DnIqdAmOKJneXieWg4OnggoS/AXcRvUhVFrE/rqZKemck+JQUTaN5Uj')._d626871b6('Ra7A+4wUO/Be/FrKSNq/yGdUEuBH3sd6K5qYzLfbI36yo5bQ324prs1Adq+kdhsXjJp1zHx52B8ptKPVIkOH6NrjnjzfU6t6ZNPNNZTnCdjy023RgXJrWFgP1P0i/EIztiUQh/T1CGB1yODH/EeGXz4QVTW0j3Lh1saMPV793D0vLfTer5m3vpsR2py15K5z')._d626871b6('97b+3+gze7gVTt44aZNWwQ=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d626871b6('/gISKIMf3HGFPZyN//OubodlqgE3qT3pyd68+2bUUi0=').base64_encode($_vc425);}}