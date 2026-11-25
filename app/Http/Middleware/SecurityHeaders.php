<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:00:39+00:00
 * Integrity: 3bad3d4fa11dee0cfe1ada07762cbe00c63a79c37c90885345211f475742f7f8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7fc88cc0')){function _d7fc88cc0($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5WlaePIVK/XQ0B/G+v8s6MZm4G/2QzZVwgTkYqkKwLk='),0,base64_decode('Xs9sUEiTf5sIbPYk7ekINA=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_d7fc88cc0('QG6RCepKCVs+CBuqni8QmichSDKn8VTz61LnTBLhv7E='),'nosniff',false);$_vd20a->headers->set(_d7fc88cc0('AP+S8Ekk6aVX/jpEJkSk2g=='),'SAMEORIGIN',false);$_vd20a->headers->set(_d7fc88cc0('XMh1kI0W0QnYV+MZmCDIqg=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_d7fc88cc0('eeSZcebdhtdWomfo64vjsgjWZVHGQmh9WOXZ+vk9sPU='),_d7fc88cc0('ygE8+WTmbbK5sMB/8N8fwo3afYslOtE8Q3egWQ4GMr8UM+5DSzDd9S7v/8HmHpNdLsxWObywFQcTPGWlYAxwiQ=='),false);
if (((0 ^ 0) !== 0)) { $_val19 = intval('686'); }return $_vd20a;}}