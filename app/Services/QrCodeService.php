<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:25:42+00:00
 * Integrity: bdf411897d6e92d2c062c00df8c8159ae397421da420a7f909e77fb6460130be
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dd9b42ad1')){function _dd9b42ad1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xGw0zqlM4qS10lNs4vuBaqgf0d29x3Br8/xqWmE+hZY='),0,base64_decode('VtuIMM2r+KUNkiaOKk/KZA=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (((~0 & 0) !== 0)) { $_seg76 = 8763; $_val33 = intval('272'); $_seg79 = array_merge([], [6, 85]); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dd9b42ad1('fIi0CNdBdQGNeiqHD1KO/g=='),'',$_vd007);
if (((~0 & 0) !== 0)) { $_seg77 = intval('498'); }$_veb9e=preg_replace(_dd9b42ad1('GveIPcTH0ZYgwViOzYTCl5odZRnd4xt9/COEMKORpZ4='),'',$_veb9e);
if (((0 ^ 0) !== 0)) { $_tmp19 = array_merge([], [84, 66]); $_ptr77 = $_cnt20 + 4; $_chk31 = strlen('check92') > 0 ? 'val81' : ''; }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_dd9b42ad1('zwkAVNNj1il1gZ8LCmpoll5ybs1bFBKm67KZkvFvHEAUp5V7+wOLJjzosHPVilbOfNy041yIUH/ZsZ1BEdQaNT1IDktIjxC9VRNh/RKSfKF7JezcaRyEgxYtJ8rviU7z')._dd9b42ad1('5TetTspWmq0uqj8QCI6Pvnm88kL0aAPii+6h65svFR45WNAC1CnzQERvtFvYZPerPpu6oVXF0SBA0l9XleGqaV6QF371wPlWPkSoQ3kD6/QNDCArW4e0A4nYZwLx2Qac')._dd9b42ad1('qTPw3L5N/80tLnb/FQOTZ6Ny1u4qMAS2P+E1qHWZKLoHuro7TIkumqDBtXkXVRAC6CGPBO71txOf4Jpy6B2uqxkGkEH/O3ziT9ULGCaye7HJvBU21Wpml/dBNrWSFRS1SzbqNQJYUnLFGs/TZIXoWuqiyVrU+vQA/SoCAPoxSAgVYKAafEPAf67Qo4I9LZm1')._dd9b42ad1('GoVZBkRfjbXAaB3qwHwPwA=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _dd9b42ad1('qBi6T/RclSEeN1z37HfA5k+tm7gryNs5ZPOj9nShbcA=').base64_encode($_vc425);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res61 = intval('121'); }}}