<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:12:47+00:00
 * Integrity: 1cdeb71c732ef090d82efb9eedef96d124d99060b2369817c5185abbd41d6868
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc4754f8c')){function _dc4754f8c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5f8dUjqxps+KtygPxd+76BVqA8Vd7Ohonzeb8ciyUSo='),0,base64_decode('UC9/ptguIFAfhxdlhhjHmg=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_dc4754f8c('vX0LTUMwbT7a6UvCqT4nCl6LM1wU4yJ993OJt8+Czts='),'nosniff',false);
if ((!is_int(0))) { $_ptr59 = array_merge([], [21, 7]); $_ptr70 = array_merge([], [74, 99]); $_cnt53 = intval('80'); }$_vd20a->headers->set(_dc4754f8c('UXZUcBVNDE7mkaG87Ny4bQ=='),'SAMEORIGIN',false);$_vd20a->headers->set(_dc4754f8c('rRS1VoKadHtPo95OSLP7ng=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_dc4754f8c('tMvy9h6XyMpDl9DdcVIouyQi9Pyve1D1ob4HDd2DWP0='),_dc4754f8c('x7ImIX3+4ZSxwN1fpjV05zv6VfoeodCsRiS3bhu3051aOHGnft+l+G+tz5KYCkRzhYWz24iDJbx2h0PiE7/iZQ=='),false);return $_vd20a;}}