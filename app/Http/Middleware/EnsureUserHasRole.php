<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:38:35+00:00
 * Integrity: 8fb32f9c498b75637e4210b82223abef44c55b561a70cd4ce9a36aab7d49c102
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d583a197c')){function _d583a197c($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf66 = intval('420'); $_res53 = substr(md5(strval(3537)), 0, 7); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1mwpe06Ep7vStak2oJf4pjUSNVl1Oo/S/KFcZCogWLA='),0,base64_decode('nWmQXZWI9zTi4cEDc8iHAA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d583a197c('3vPeM8t88id24/yeHTSdVXmU++bMuSksohOK6Gtnfuqe7BNsGFUtj/83J1PsFsM5KOB45ntC27BcUB7JZ43sI/AWkpICyF0vogNweO8Lu+Y=')],403);}abort(403,_d583a197c('FXO/i40OYGw/HKiYTb9teLQpqEjBd3iemEn5J5WL1q4nG1aHb9D7jQAYLw1F0zrHneRnLuo+N1VXryvY/7ApQGCQg29jSaZWaKJ4USwrj3IEiDPjzZNQjZRZGcz+UNM/'));}return $next($request);
if (false) { $_buf28 = 8613; }}}