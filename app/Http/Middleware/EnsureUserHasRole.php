<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:40:28+00:00
 * Integrity: d8afa62270f139dce3d4ed0f9766ada15192a183d4abdb06565216c2901cb57a
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2ff4eeba')){function _d2ff4eeba($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oQpIT7Pnaz6BNwZr8q0amwl6kmsNsGeEIsGcAO6Co18='),0,base64_decode('Mve7+1LFEUXljUS8nEZoRg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d2ff4eeba('RDrg8zTqyOKORwelGwtouhDQV3JtnyEAayKsJQvEm7bHGBBi7s4Q3+1QX32D4K7Wv4XUm7EDv3kkfUgG6VSoCVT053m6ywvHpJiresDrqdI=')],403);
if (false) { $_val12 = $_val93 + 84; $_tmp93 = array_merge([], [61, 52]); }}abort(403,_d2ff4eeba('7EuGWWaFnl4OtijRyPzzZ6KKUypBM7t0dkfZXlpgvYozdwcXFWO6XQ+ghpqFFBDq0ouUTTcPN2AzwufXI4mG3ZDCbcGIp3o8ZRuTboGzT3OJMQ93bv40p6ITqZ+d5R90'));}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp37 = 452; }}}