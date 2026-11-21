<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:23:13+00:00
 * Integrity: 57c709e308df7c2142dec53cf3ecde1776cd5f17324db381d878b416f9ff3a89
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d1c702e30')){function _d1c702e30($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GN7KatkKb6/r12QpatBzJIHXl18uJ6uhPC25ALXnUc0='),0,base64_decode('/Up0/wenjucdVJz+nacbrA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf30 = 8471; $_tmp30 = intval('753'); }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d1c702e30('/qylSioSPrXqRjCWEFFZrg=='),'',$_vd007);$_veb9e=preg_replace(_d1c702e30('Lsilhel6S/oQBnfmK6Fq8Uu1ckeLHwuiEAn/xoX3OG4='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d1c702e30('Tv9GDO1ftgu8PLi7kKLou7SRt0E9wPTc+7oP6m1Am1DWj3SG9S2FixBgKcPDBrtEsRpN8xQL+w6Sy5t8j1cALnQ01kN8VD8A0+QJ1YiqG8Aa2LmmvJhXJPEA1CkVQBYC')._d1c702e30('I6E8uRgm8lh8vxhDoD7PMGMfVEQkZk8Uq9IQyR9294dpewL+hjeu6q3+fnVyLDUeCOQCChS9s1nhIcLgpYCRLSn4XHs0gCSp13C9oSD7nAQuiZPsgdgkzo0THVsMYti3')._d1c702e30('NdICDEEWlScBwRn2CMWq+qlNoAKGw8tjYcgH8QoqRV5TBeYjmUsVQFbbFCg8pDDKurM7qCSaM1PF8W6q7GJg5Gz2/+1oc6WAOCABTBKrZVAcNs1a6lsDgdUGXSfktuTXsr6SRUDhW0QACUCHpWKK0UWk3MHazhsHt8yzmCxTSyIyuoRhV4Z4XlXc6dZK9A8c')._d1c702e30('AksNUH2kg+/DPfWEhfT+6w=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d1c702e30('ewyzL5tls+9OckmVZ/OR1bB4iM8xOAfh4rAYBHnFQuM=').base64_encode($_vc425);}}