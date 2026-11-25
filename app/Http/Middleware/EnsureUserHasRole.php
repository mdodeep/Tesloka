<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:00:39+00:00
 * Integrity: 3bad3d4fa11dee0cfe1ada07762cbe00c63a79c37c90885345211f475742f7f8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d25434a01')){function _d25434a01($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wKuSeEeQZOcpQ2VTIHs0vvPqTgY6KF1elPwuqQbgOr0='),0,base64_decode('z+ASjfm4esCugwnGJP0gJQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d25434a01('+b3IHx7+CNrFvdYMnCg96TzuJfri5kNgysEC6fgBW06XrvMn45HpaDdMlFGaHIOyltYWDBfewS2FTcxQ+FufgU3HRN/8Yvad/EX78zI3Gf0=')],403);}abort(403,_d25434a01('G3nxzeH9JpNQr2fL0JOzZDY8xfVL9AsaPDtVIqCNo1hOODOoyG5vK4PEfC1phTRozrDd18vZ/Sx8G200//iw6N08NcLn+vCCSK7OU4wixbIOzQfWHNo8kcBFP4xSJHIr'));
if ((!is_int(0))) { $_idx89 = strlen('check71') > 0 ? 'val47' : ''; $_buf60 = substr(md5(strval(8666)), 0, 11); $_tmp49 = substr(md5(strval(9853)), 0, 13); }}return $next($request);}}