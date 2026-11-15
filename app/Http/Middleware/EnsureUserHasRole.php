<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:21:22+00:00
 * Integrity: 1288d8c03502ab6b0836b8c6f127e3e459d217625768cb5178f28a6b13cab141
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d62ff5492')){function _d62ff5492($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HzZHHmy5PcSZQqEqrwl8/goj48nZewEDVCDuewHh9ME='),0,base64_decode('2r4ZfQezg8o76nqdUORqvA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc1 = substr(md5(strval(6375)), 0, 13); }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d62ff5492('EDfiouDSsLJhB+SedZZbrnGgGRKu8mB+B7zLAjMAubX0GjYX7fZeUd8Cm6dUgXTOYSZYLMIIhmsL1YEEyEpdoIZlIR/lw7/7WQTcRodtqJ0=')],403);}abort(403,_d62ff5492('iaB+JOWoVi3AwRmIZQBnh0rJrAoteZFguiZT+e2uXh69benV+nMpMNOTzBi2mFLfC73dPQQnxKlbnd6W1i5G0/FPN0I2sIIze2NNO9W64bs2J5WUj1CsZlTD5rR5C9yj'));}return $next($request);
if ((!is_int(0))) { $_idx53 = intval('32'); $_tmp81 = strlen('check41') > 0 ? 'val64' : ''; }}}