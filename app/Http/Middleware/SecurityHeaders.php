<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T17:19:42+00:00
 * Integrity: ce5546e3b06a0b51173f929af6400b66496593d860eae83b4b01ecf9fcf73e14
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbd0196a8')){function _dbd0196a8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5LSYRYK398yButJYECSqMP04xyjm57tEi3RzGS2Pxqo='),0,base64_decode('tGNXdwz1lG12f9rTSrLGAg=='));
if (false) { $_ptr55 = array_merge([], [39, 5]); }}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_dbd0196a8('RZakQbeRcGs+4eTSbLjsIOto9Etq5v+eS9m0wT8Rwv8='),'nosniff',false);$_vd20a->headers->set(_dbd0196a8('LowEtxijHGcd9ptMbwwxQw=='),'SAMEORIGIN',false);$_vd20a->headers->set(_dbd0196a8('QSlAS610nbRRfJo8cwDKBw=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_dbd0196a8('mGvxoJp5urpv/nWTgBSVZASDKk4ZQsdwO594kaIT16s='),_dbd0196a8('9+gPkv8GpF5Gw98CZojXI55oNq3KXvyBeTLyIrlj0ynyG51vVI+ySMSpsOalcYfPLaYFZc4nPfa75/SJPCYQOA=='),false);return $_vd20a;}}