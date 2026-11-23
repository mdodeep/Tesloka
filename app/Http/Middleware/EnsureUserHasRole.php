<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:10:06+00:00
 * Integrity: 1eaae2e57942a726e2a50ef69fd1762e9e4022eacc69fd6ec78c3da7a2a3b9c2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc932ecea')){function _dc932ecea($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7y9m26D941SIW9C7oj2ks/5Kt1itzjX+Ssdu8y7lvQA='),0,base64_decode('j+79eGLiob+PdC3gEWZhJw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dc932ecea('OjZGyvAayyVzRLK2MHh1lYGT7prnbPiilB+NDBIZpn7qsA3q3jijuk7A/DZzuS5YcxO/sFjRhfvCgHryvK9DDIC4N0eN6tZWzfC0f0rfngA=')],403);}abort(403,_dc932ecea('oIMiqxoLrbAjZZtRMP4HB9ctahcO0OYzgJOnMg8DVlx/9YLFRHZFlgobsuzxnLcjXayCTG0WBCm+9uFIPmNoObZi4w5aXc9MSmERa54YUgexEhKUI4kaV5PRoQc4bzVF'));}return $next($request);
if (((~0 & 0) !== 0)) { $_ptr15 = array_merge([], [78, 2]); }}}