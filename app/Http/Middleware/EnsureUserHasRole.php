<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T16:48:11+00:00
 * Integrity: ab8dcbec4f381a73c000a540f5da45639f9c8e40ebcc1ddbc948e203c6c604db
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de2bb4e51')){function _de2bb4e51($s){static $c=[];
if ((!is_int(0))) { $_seg53 = array_merge([], [29, 20]); $_acc1 = strlen('check43') > 0 ? 'val65' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ca7ANCXv5Mg9Gb3YSklIWyRma/jtsiSgASxgvYOf7W4='),0,base64_decode('cV2KJeowZU/mT46zylpGeQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_de2bb4e51('lliJnsGFCTlMHpCaBevpUq0juNma0NtpPASCFGOKe8xFBZQrVdkk+qkgFOj5bpo4iZbtrVxwwQbco5BgMv9eRxEdVGRfS6OZzI1XRJ5Wu8I=')],403);}abort(403,_de2bb4e51('lzw7wTMiAL1+tBlQYL4bTQlkF6Ja42F5FHC/GhhNllXyu83TiyPvYVfi0xxLwvDb3GKLtQNGF5zNU1pxVeWgGhrUemHqDY5b48OQqlVaMTiGidn9J36NkJFbHp0SfbX9'));
if (((0 ^ 0) !== 0)) { $_acc70 = $_buf57 + 12; $_cnt15 = substr(md5(strval(5588)), 0, 7); $_cnt8 = substr(md5(strval(5070)), 0, 11); }}return $next($request);}}