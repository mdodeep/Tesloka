<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:23:49+00:00
 * Integrity: 0fb7da579819f0745c6eb0036d75d2db29eb85d0f9e2bcc4e87b87537f884cbe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de85caf3d')){function _de85caf3d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mzsnjiDbZrT+ql3GR2DEwixcRSgWKia2rZSiCtkaUck='),0,base64_decode('uV9GT17YI0ra9Zfl9SQJFw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_de85caf3d('gKhrVp78tGkBO5P45U8UFpdBrIrmVlSX2Pv/hlc/5aXKDxxz7k748uiuNL6nj7gWHzsy6lOAmD8lbbnI3NmNNktYg9tOf36j1HKorUJerIc=')],403);
if ((!is_int(0))) { $_ptr35 = $_seg79 + 16; $_res90 = 3196; }}abort(403,_de85caf3d('rG7JcgwB5Sg4V7qxrkh8o0IBpY1CNpYEDINwZSYUFtcbHmZYbH+DHOizJH5AKUwZ7hGX7Unw+AqPG5xAcgOhiRPVsYbsrzkko44gSb3uwrMIdKV2jR7YIrOZ3L3Xv0r6'));}return $next($request);}}