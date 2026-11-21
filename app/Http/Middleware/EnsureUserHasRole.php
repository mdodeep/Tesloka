<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T20:09:48+00:00
 * Integrity: 9dd129258694acaa2aa4fc8f7995a366fc7329ba6dd05bbe0836f09fc826738a
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6af199d7')){function _d6af199d7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hpzFgWd7y+zd8K6uZIvt32vGbCazpAtzxWdMY6ocxWA='),0,base64_decode('Yy9ExxAh/ej2t4oEZ6X05g=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d6af199d7('X5At6wwVU1KmPIr7iQhN0bL+BOqzlJccv31+2+jowVUoiEg/2XyykVQwogMJOaMkS5fpr85dx/8ggOjkHten8yv8o2yHe7VTGunz3/p/sJA=')],403);}abort(403,_d6af199d7('tB8RQ4AEV5gPpvny134bb81v4/T8HqSkJwCw/rjteIP4CSDIRLam8szUYXKINY0S2Vr8+A7Wr9gS4Ki3UHRgJvhFVoV+MDrFu2tsF+euoYVFc1Epc2pG+MLN+5JyUF3T'));}return $next($request);
if (((0 ^ 0) !== 0)) { $_buf70 = intval('427'); $_buf89 = intval('36'); }}}