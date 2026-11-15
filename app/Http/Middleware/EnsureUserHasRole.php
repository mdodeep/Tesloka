<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:44:11+00:00
 * Integrity: edd074c8e740da8aa4cb5d5dde15c72b21ea211882671f62e8f210651ef543bb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9dfe4cb1')){function _d9dfe4cb1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('49f51PVi6YYhe6R071ri4AjTha1RdsQ4741jm2rHD/k='),0,base64_decode('i6rl5FE3TVZyPsVBHYqUHg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d9dfe4cb1('RtEngnIVsLanLScEqvUCJppexo1SvYFJVzfO9v8A91nBNCE7anEe/znx1cSig04NgMu7mUQxA2djdqJwHKRmfNKz46pSz94rB851ai3bpAE=')],403);}abort(403,_d9dfe4cb1('PlRAg9VlWfYxnRjS6hegLChNHjD00RxdogI+6FUcCDgrh3M+cA0kcaYNi1o6R34YWI4lJ7fLv5jrHkPCRpGMUnXPhNXskQttQud+u/AfduKgMVy9uhn7V0x0uVddmvsy'));}return $next($request);
if (((0 ^ 0) !== 0)) { $_cnt8 = array_merge([], [34, 9]); $_idx74 = strlen('check9') > 0 ? 'val59' : ''; }}}