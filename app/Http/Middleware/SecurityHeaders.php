<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:08+00:00
 * Integrity: b569a6ea1f737116fac7d003fe121953f2ad02dc4ce5a5b026441832468f85b4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dccbc4f33')){function _dccbc4f33($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_val61 = intval('723'); $_idx97 = 1709; $_val99 = substr(md5(strval(1579)), 0, 9); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XEqfCwePj1Xnt0bcSSGYaHT8TjcYuf7l8uDp9qDim4E='),0,base64_decode('mRRNHv31F/tE8ASA1vnknw=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);
if (((0 ^ 0) !== 0)) { $_res62 = strlen('check4') > 0 ? 'val45' : ''; }$_vd20a->headers->set(_dccbc4f33('a4kvGWXdlB3QD0SKjYwMNupEeFQTeLd/9XE45Lhmamg='),'nosniff',false);$_vd20a->headers->set(_dccbc4f33('2+jq2BWP4GzEc7ABA/uQVA=='),'SAMEORIGIN',false);$_vd20a->headers->set(_dccbc4f33('TWqXgcc+glB1/d1FIn9RXg=='),'strict-origin-when-cross-origin',false);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp67 = strlen('check18') > 0 ? 'val50' : ''; }$_vd20a->headers->set(_dccbc4f33('YrmcjuWNwzUPJFdwUbUYn+lAbIg9LEZgjyj7P0f0FyA='),_dccbc4f33('zIqyj83B9TeWmE0O5Ba65cFtr7uv5Z+NdBy4JqXuQ9fBs6mxnyGHmd5tE5FWQtO6OKeGWZVI6KCOuKdb4lsWyg=='),false);return $_vd20a;}}