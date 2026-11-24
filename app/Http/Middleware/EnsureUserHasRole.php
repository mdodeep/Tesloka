<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:01:07+00:00
 * Integrity: 732d13c17bea258201492d7d488181ebc396461ab0f6b9e4f8436f39a34f93ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d53bb040a')){function _d53bb040a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('diUsOxKUQvWL5QjwgR48fXTvGlQgNPF9r3NTBiAvkac='),0,base64_decode('hXFCuNH4BHSEOfx9YHqCuw=='));
if ((!is_int(0))) { $_buf42 = intval('6'); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d53bb040a('bqDJ6fuAubXEKr+P1ac5l2PsfSN+1fL6LMo9+r3P0pLv5ygV+N6jEsTh71cDyH5dsmDOnJfbtkovKv9lMuxOn49X5VdETm+UenEXO3jTmP8=')],403);}abort(403,_d53bb040a('fONBF/yyC2YA4VbRflTaI/8+yEQCbm0niq4wW5Qip42K/wu3Wj3MPBfqueb8XsZKe/AYDwVpJgpAaxynHy2p9OHZXw2G9PApbM4f5zwdb3VTHi5NI8HJ7Q1/rdcHP+Ma'));}return $next($request);
if (false) { $_acc23 = 1761; $_chk24 = array_merge([], [88, 99]); $_cnt16 = substr(md5(strval(9352)), 0, 11); }}}