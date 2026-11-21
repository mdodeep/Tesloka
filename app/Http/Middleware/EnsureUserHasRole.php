<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:32:20+00:00
 * Integrity: 478a70a0514ca4b030cf683c5df8b15a4375318e1e3ca01055d8d807b786e642
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d40ac2450')){function _d40ac2450($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oijes8ahWffsJdKCZIoRH9i8Cheoy+mvZib0w38eVZ8='),0,base64_decode('M4TzGk/cjPJLdfMY/0a0Iw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg28 = intval('131'); $_seg17 = intval('334'); $_idx44 = 8843; }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d40ac2450('cHpsDbRWK/lDoO6uzOD2x1oATpPX6sYYeOQMviAlPMvaVpw/QKdrZMXfdJKdrbHUD3NO4PSlakGYE92tMUr3N/epRYTS+N2tPO5kppnfxz8=')],403);}abort(403,_d40ac2450('nF1JU9iajy/2LrR4UBTYs48nnQaJusTUDU1V5n1ARvSJTDNEUpqV9DgJ/tQxdL6lMYAnTwnATt7xBOymHPwfbUnA1vfQ7HyT3bfFJW+WEo0PHs07f+EmQJFmknjkSfba'));}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt41 = substr(md5(strval(8888)), 0, 5); $_val58 = 5818; $_val20 = substr(md5(strval(8734)), 0, 6); }}}