<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:07:23+00:00
 * Integrity: 6ddf30c2954cc18d609567e44b6e5fe500e15c441b7a83fbd1c4b50943b36e64
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_dbf25445f')){function _dbf25445f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('P+C7W8hSfUQjAMBKLGy0g/F6CVEXkMPEudAg1uXnNmc='),0,base64_decode('bznZjbQdp18sBUiOP2KdiA=='));
if (((0 ^ 0) !== 0)) { $_chk50 = intval('806'); $_seg55 = array_merge([], [58, 5]); $_acc60 = 6987; }}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_dbf25445f('3jNb7Olg0JQpjV6PwkyLBg=='),'',$_vd007);$_veb9e=preg_replace(_dbf25445f('keusomGGHvyebt30FlzhGaEQBjMXEZOJGn+C/Q6cDLg='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_dbf25445f('+I+VwjRbhJZ7oADF2kCspD/U1yMc7pBUIjlgUS1+NTEaapBeyt3YDrIz7cyc7GFE0jFKb4TWu63WYYOAiPVvC+me+towrNdZ231VY8L+coU3AQntdTPJ3sn5ZmJVI2aB')._dbf25445f('oSf/9xmdaHOFgfDKUqm2NhCEBut/jE2bVSmkcODQief1I7Jtm9Qa2qex6K3UM68pL081J4AOtSMs8Vr/HVycPw5KFB6kDVPYcGktgxcYf5+wxFxzzlmFjIx3AqRGuKXF')._dbf25445f('4wL7YfDnaKe89FsUBar0kFWjby9iVXdrbwPYFJmAGcDKF2REYPTYmRJyyeXxuqnELp3N9gqQw9CCYm8QgyLC9iufBCc2dR57smhzIf/5N9+Y7t0vm94J9BNPqvXnPQX6pFihj4jnYGB/vn63NHqOIS7HIFHYw9ygL57fgcBHTqsABmMjCQNobfroFtUzjTzq')._dbf25445f('KzhWKq3bF5GqbdC14148Sw=='),$size,$size,$size,$size);}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if ((PHP_MAJOR_VERSION < 0)) { $_acc93 = 8358; $_idx96 = $_buf40 + 98; $_cnt76 = $_buf84 + 38; }return  _dbf25445f('2wn4hMSJgQnakybuSH5Tl1Pa7LLdddtYBb63pcCcVog=').base64_encode($_vc425);}}