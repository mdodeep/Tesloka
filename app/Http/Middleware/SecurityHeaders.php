<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:58:43+00:00
 * Integrity: 3dc1d2953336640e852424b26616dc079ca30419693ee27f8cb34c60b2f6da17
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dede4501c')){function _dede4501c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3hfaS18fjOPEDwFgDQ90j4Wt7BaHHGv0MbEvBvN8Kfw='),0,base64_decode('3Z9TO5/4XN3VRQIYTvg4Ew=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);
if (((0 ^ 0) !== 0)) { $_val48 = strlen('check47') > 0 ? 'val65' : ''; }$_vd20a->headers->set(_dede4501c('ZvacKgln5uCC690njsec/LAmjJDAD99Op3GK1WmyDGE='),'nosniff',false);$_vd20a->headers->set(_dede4501c('/t6EIyIeTnOZw++YNz9How=='),'SAMEORIGIN',false);$_vd20a->headers->set(_dede4501c('N8vQlWPT6ZV8LKrmDJ5mMw=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_dede4501c('+mhVTdgpXi6OkUoVNorX5Jud/Vl0cvuGfWoRrUl9A5Y='),_dede4501c('ltFjHTo6rbhwzrJ0tqy2hFZLN0u2uhloP71LtlEz00xE21f5qjTDJ9lA1+O0s+FIPwLcybWs0ypgLTyhuk3EMA=='),false);return $_vd20a;}}