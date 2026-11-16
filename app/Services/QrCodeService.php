<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:12:03+00:00
 * Integrity: 827550dfee9bb5c5eb345a2beaa3a4c0ec71eb2e8d7fe8a9ed3961444bdfc0f5
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dbfbf7f6f')){function _dbfbf7f6f($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_acc21 = array_merge([], [40, 73]); $_buf42 = strlen('check63') > 0 ? 'val14' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Ug1bGZMmEeG1MlxjIuF+5dNsSmG0E1Jg7EhN1SrIwso='),0,base64_decode('n23OR0V1XewIvTmB9Gl7rQ=='));
if (((0 ^ 0) !== 0)) { $_acc74 = substr(md5(strval(3177)), 0, 15); $_acc77 = $_chk31 + 14; $_buf24 = array_merge([], [13, 43]); }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if ((PHP_MAJOR_VERSION < 0)) { $_seg10 = intval('986'); $_chk90 = substr(md5(strval(4133)), 0, 16); $_acc14 = array_merge([], [1, 32]); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dbfbf7f6f('sxCu6iXQwsBkQq2l9jd4vA=='),'',$_vd007);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc89 = array_merge([], [1, 37]); $_idx0 = substr(md5(strval(8502)), 0, 16); $_chk67 = intval('982'); }$_veb9e=preg_replace(_dbfbf7f6f('BIN36D+LwY/ZGss7qcqEqwn6FwNHUtqyStwVzCOkY0c='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_dbfbf7f6f('Vay7LAjuHV33q4doAMXDKsZX+qesK8p/l5x5wS018bSrVYEA0huqVF7u42vK2s5OHumKcjFC4YNkJpVQ8T/adMSLKMltBdw710puyK9bXmTP4IkOoIC4UZgy4IF7MaJZ')._dbfbf7f6f('IMi5CGmnsQ/0O9NEd9+ab8enlvbqv2dSfNrYk1I1aeu6nI7z8EBf4yVLRXgMghCapGVSLHi43lqODg1yQcdfLGAdN+ZjNyj7sjW89Q8O/+g4ju/A4JwhSF7jeujmf7jm')._dbfbf7f6f('5vUOamUnznFKn9mie3k8KnK4mczuHyvg0vmPPutubVuG3jj4qO2ER5E3DZfBJxR+sm/oCl1U784wSCjaSba9UcnVVK60s8EX3bwu0/jSi3IleDmPoM1H6iku9hhtj9l30D/hblHaDq0K6+BIRkUQaGGFmVuq2pXkHDao2g7t+kdhiwnNxX1Hpz4YjBtp573H')._dbfbf7f6f('EezfWy78zS8ffr5kZFvYvw=='),$size,$size,$size,$size);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg65 = $_cnt3 + 42; $_seg77 = intval('331'); $_res74 = substr(md5(strval(5765)), 0, 15); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _dbfbf7f6f('yrS453exU/zw8n0CTQ9TyY50PQBX2VvkenFJL4MdecY=').base64_encode($_vc425);}}