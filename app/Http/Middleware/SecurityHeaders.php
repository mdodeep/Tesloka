<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:03:23+00:00
 * Integrity: bb5e2d4dc002ca16e352f94dec9ff1b22a235be0f9eaf548fb64c7f0cb8d46b8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df12d9476')){function _df12d9476($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('D6eK6hdXr0d2VQhC3UBayrfauKlFJqvl1wv8LfGARTM='),0,base64_decode('sTrNCkiCFXqPKLzO7IhAAQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_tmp49 = array_merge([], [32, 61]); }}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_df12d9476('dP0ygpLswroH04elZ1tEvAN/tvZAxYJYsxerOVA9Hiw='),'nosniff',false);
if (false) { $_seg19 = strlen('check51') > 0 ? 'val53' : ''; $_seg51 = substr(md5(strval(6512)), 0, 9); $_val30 = substr(md5(strval(209)), 0, 5); }$_vd20a->headers->set(_df12d9476('13+pMIX749t5GpL0srQm8g=='),'SAMEORIGIN',false);$_vd20a->headers->set(_df12d9476('TLMMU/wp9l1tImtA17hbiQ=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_df12d9476('qFusBG4dn2sQYFZTRqOq4zLV6IcxO7CiO6mU6nhBIq8='),_df12d9476('1/pLhL7GspWIysn/a964pwv4GFGvV4er9up2SU3c1m1W8PAWUmm6a5OuOxor0IV1745r5Us6M2wJlzDPu+jd+Q=='),false);return $_vd20a;}}