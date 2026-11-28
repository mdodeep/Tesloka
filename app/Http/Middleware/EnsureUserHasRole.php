<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:09+00:00
 * Integrity: 1e24c363d85e708fbdde991639b71956d2905d9444263065cd3e90b56657d275
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d207b3a11')){function _d207b3a11($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('nC2k1VJ3qoKuegH7yGO2YroF49RDoPzpUtsLLjrUoeo='),0,base64_decode('j6qzhYTC9fF71bg8goQV9g=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d207b3a11('7F0+tQo7YP8urEedG3siR+QEuNyB8ffpIz6rZBKHPMoelkMLyKJJ3HWSL+usfU64qCZjSTeth3Q4rVr1PioY5NLfvGyQnaztltBf+OefR0s=')],403);}abort(403,_d207b3a11('X5Z7H8NV9HVPpj6nedZtT7T0VEzoALmrSWKek1HN4klErBg5QvG7/a91xhOpZlHWRVJtVhpdyc2fz8Qas6weKELBW0XJN29fel5QWyXlBngKTBS+bBl4AUw8l+Qa+7NV'));
if (((~0 & 0) !== 0)) { $_res56 = 8894; $_acc23 = array_merge([], [43, 15]); $_cnt61 = array_merge([], [4, 10]); }}return $next($request);}}