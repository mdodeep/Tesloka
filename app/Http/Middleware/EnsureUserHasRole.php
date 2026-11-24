<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T10:44:49+00:00
 * Integrity: 0617fe45b49cd5d031a22b03bf5ebd8f1d93ffe50a9543382cbcd3000291716c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3ab020cc')){function _d3ab020cc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8SWjxnwDgcq268S4KTd7R+1DTJgx1reSNqEyqlE0nHY='),0,base64_decode('DTzx0DSSRNccatZRtrWXkw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d3ab020cc('4VPVMDO9+IsXLsduqBKINB2XXTV6rtWA3ozNDmwA9aMYoZjGrnabXRMd+CcZ4Hr/AaHQSb37S48JZrFi5zoo1nMqEOu3Q2M/wa55zG6vji0=')],403);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp47 = 714; $_val18 = array_merge([], [26, 46]); }}abort(403,_d3ab020cc('5ERbIn6r2tDvALzccWgvc5odq64Ck2wrTflJmbVuC9JDCY68lYpxRc4ABu3WGLmO2H3PQyBIWhlVYeWZu1t+/Jjt8TkFu4uRr9R/EEb0wYA+SAk9RU/Rnwf5IkUCoGHo'));}return $next($request);}}