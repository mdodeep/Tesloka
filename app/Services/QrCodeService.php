<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T14:53:15+00:00
 * Integrity: 66ff9d9327da48d51ef30c1b87340781e68d1e35da02241fa08da010e021b253
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dc0ab9eff')){function _dc0ab9eff($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('pAk8BSrGS72wXAhAnQDhI+wHi33ooJ8uOavv6cdGcgM='),0,base64_decode('NpzNSGB1UMjwOcbwnaskog=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dc0ab9eff('KG5Eprpki62Mivn2906udA=='),'',$_vd007);$_veb9e=preg_replace(_dc0ab9eff('O+JDIbxJ1laRLCLPZoxEJFRDzGX66EPGWvQJJiA9ixY='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_dc0ab9eff('oylx8ZJUPc87H8XfbzEHu1vgx1ufboGALPJ/dmqiWDCmHbWJXsw2lIdV3n8YfGmhGljYA7qAnXOJwCfrbfzICMblwp+lG2Rgvi0kEmZdKp5VAn3EVaT4fNm7AmusiIHA')._dc0ab9eff('Qt6fgMEFsnYxglhO8bTluVoCmCWxcOXEWsnOu58/a0bulpqnPTcEWoW6WToBsNmtK+pMdlEnKGtbEOSukRSmmkPMlpWOWQxJoFLvox2M+AWBcLDru05X1J7XvTQVydmd')._dc0ab9eff('Lb/NcTtWFy33L5B7QofBbe8mTmJsfz8xYoqAfPE5nNvcBSLLYaJvvNBYy4+EH+q4Rq4d3W5ZWcFV3riqxwd+s3pvGterO0lBre2NbYQn8L+lRtgTQ49lSX+2HSq5oqDV1eeSB0sBrqd5tW/WnOLHCRXQAu8lXCAkCE7Ar+aWIS1rxm1gujZoy2Vp0c3V4oLs')._dc0ab9eff('N68KzWESaSWhUW1TUEEeAg=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _dc0ab9eff('u0b0QjyAX0q0ORXhUQloxtsLbV4/XltJUrgV0fzyJi4=').base64_encode($_vc425);}}