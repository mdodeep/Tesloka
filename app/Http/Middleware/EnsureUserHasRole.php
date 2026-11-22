<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:25:42+00:00
 * Integrity: bdf411897d6e92d2c062c00df8c8159ae397421da420a7f909e77fb6460130be
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9ff4be75')){function _d9ff4be75($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('yBXWU99Ek/8c9tRsDLXjW+EXZ94Ff0u0PKAglUh45QA='),0,base64_decode('4tGvV2/DpIiPSUxl5WDgvw=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg1 = intval('231'); $_idx61 = $_tmp96 + 85; $_chk88 = strlen('check69') > 0 ? 'val36' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d9ff4be75('hCLP5+3XDX0ZgtIKgbk1JWn91B3u+rQresRo1YZlWXJWHBsuZVVWQ6jljp1V0S4vL6HQ/lqv3dAADR+6QbcTExzIiNpEk/CxrmD7qyh/uCE=')],403);}abort(403,_d9ff4be75('4pBydDjXJxBxJu9TlsAbpwz8ywUuIuT/Vzi7KKMJO4WVQg/Szj7nWO1xDRyw/WTIa0DlPVufyED3kl9zqaA0RLCB8TdXbXQxspvOa0KCw5COHJosptaXRfAs1y7Gd4vD'));
if ((!is_int(0))) { $_seg57 = array_merge([], [64, 60]); $_seg38 = 1359; $_chk50 = intval('796'); }}return $next($request);}}