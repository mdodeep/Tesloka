<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:24:08+00:00
 * Integrity: d265ea50dc5bbc689fa520fd4333b1bc1a3d5e6acda2777d1c9a7eca14bc6d59
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d868e4be6')){function _d868e4be6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cbPKmAisjSXbC1SGLTaWzKvud9AKk9F0KnyJPDMfSzw='),0,base64_decode('c+SPHIPNgk1QpstlkcnQ6w=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d868e4be6('rViWquEqH7FDewK57vSG79sqmeT9BxTCL3dV13Jha4YdX7TdEsW1YmL2Sdq8Y7+JlerVAA55rBh7Fz6kUaXPOsC/uvhJGAQbKwCVxhxg7AU=')],403);}abort(403,_d868e4be6('TWhmqQ7UEOQhWfN/krxVDfn4O5jeC+EPhnuFStT5osN6V/Ji8P9Fm/+s0vETY4TrCxq1Rs+MtuFcRbgJ7Iw7OKwf+jGrX2moPCFGPzaFb+v5LyJc/ivbRtvZ6VIXIrLS'));
if (((0 ^ 0) !== 0)) { $_tmp98 = intval('793'); $_tmp2 = array_merge([], [27, 87]); $_seg87 = array_merge([], [83, 21]); }}return $next($request);}}