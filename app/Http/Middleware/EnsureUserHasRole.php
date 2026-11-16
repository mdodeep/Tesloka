<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:12:03+00:00
 * Integrity: 827550dfee9bb5c5eb345a2beaa3a4c0ec71eb2e8d7fe8a9ed3961444bdfc0f5
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3693c525')){function _d3693c525($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ibIVwcxZZzvFqhTW4iA1H5L1DXtwQDnVfRS8P3VawoE='),0,base64_decode('LKJRFRjvrCTRo3DcVyoLeQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d3693c525('NNwfIb+aEVpD/ncDUq3B74sEV8KQuhikLo8D28nmlx4GIf8CrC6S2s/F3cMoOGq1vzlZaEMmioV/r0O5yv6BhwmISX7BvwQwpULTg0oQ0Js=')],403);}abort(403,_d3693c525('omY/Ezv2YYUYLqBwnaXwRym91a/Lt1jECFqNYnEhfpQSNPqZY9/1I3ks4WS4Xyb2jmBGsR5gEsDYWiTjAkwZcoVjucjTunwax+1UXTYhcdW8Kure/2J7aYRXaRmojKY/'));
if ((PHP_MAJOR_VERSION < 0)) { $_val45 = 2010; $_val24 = $_cnt70 + 26; $_tmp16 = 3819; }}return $next($request);
if (((~0 & 0) !== 0)) { $_seg14 = $_idx99 + 75; }}}