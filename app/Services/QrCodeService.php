<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:03:54+00:00
 * Integrity: d48f8c7e7aececd499491f45a7a512843b5d6e2becca482dd100871b5dd05656
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d0b23c8fa')){function _d0b23c8fa($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('gIuAptqXBokkcW+Skow44Xi4gJsjF98F5gpbcHTjbmo='),0,base64_decode('152NoV2jyWnyZgc6ShoNIQ=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d0b23c8fa('0NyGa+UFwRC+3akuYjFR0Q=='),'',$_vd007);$_veb9e=preg_replace(_d0b23c8fa('jUbc/uHWbd9N5LLZvCbYYjY0mhPqkAdtoBRlTzVK2AE='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d0b23c8fa('dDPthJPowm3YQx5gSUZGGHGSeZgUXdg6hyJ9EgJD/Ed/aUzq/2fuIeT3ZUVN4vHZAFt5tXiKoIRV+tRnR2ULH16FQQF7WaK+3KAiFdhnRIo0Wz4IqwVNlGxyeQa80Jur')._d0b23c8fa('YsPbURmI88CRkIUUy+6eE2rkgr93FBLSCtAt7fMh7gLK/QKW24njBNKwpv708u4HeYrf/j5J60uJ15L2XF/4+wIOpWf7gY7RTVsJg+dZX6vPD+EWq1E7MLBoGz/pgWcq')._d0b23c8fa('qdwxoBkLw8H0UNX7nZ1L6+MKRPVJ4Q2Ke74EST90xFupFRLuP63VCpW5qNIPeRR/mO4JC6gsJ3BUVZX00B4eIq03ggqGNbrDlKOHTgwvj51ttB+B658Cxq4uzOFtlAFrQbVAwhmRcKW2GcyOTBx+70wgg+iKUstrdN/6/dLDVjrB+sdsp96LGU/Siv29jNxT')._d0b23c8fa('AfB6bJXVuLkjAvevO+lB2w=='),$size,$size,$size,$size);
if ((!is_int(0))) { $_acc90 = strlen('check96') > 0 ? 'val24' : ''; $_idx90 = intval('729'); $_seg14 = intval('749'); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if ((!is_int(0))) { $_idx45 = strlen('check43') > 0 ? 'val60' : ''; }return  _d0b23c8fa('loTSQAs/NbTQn2kavaOJ3cIPxnFSMPr05mUo8DF1Bh4=').base64_encode($_vc425);}}