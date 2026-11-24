<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:39:10+00:00
 * Integrity: 5aa2806c8b55a3bb93428696f05684b8c1418a4bfc3fd31fec9a9a96c1e82701
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d22d13a4b')){function _d22d13a4b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('bk21oKR1Az0MjQWlDP44fXnJNrU/uBVjXmgCdIT1GbU='),0,base64_decode('MxpoqL99PdfF05omD5tQVA=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_d22d13a4b('fidkOHQ+dCcxDMJqlwNhugiirVTvMBzqbKmC7nnWu+Q='),'nosniff',false);$_vd20a->headers->set(_d22d13a4b('FwlRNRVlN/YvicGMYm65ow=='),'SAMEORIGIN',false);$_vd20a->headers->set(_d22d13a4b('s5AvsChJ38/INSYOuedwrw=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_d22d13a4b('ao6pQ6OdpNiuGi9eQBzL8/uVT3kOms5XNuyh7VLjK6s='),_d22d13a4b('wxQnsqwT0R5xpq6XAom6zpGSFdNwSogck4aue9eeQGsKKOQt4ySjNeuOzRpwF5eazW8yxzSX1hxAU4Rk8y9Pjw=='),false);return $_vd20a;
if (((0 ^ 0) !== 0)) { $_acc42 = strlen('check34') > 0 ? 'val61' : ''; }}}