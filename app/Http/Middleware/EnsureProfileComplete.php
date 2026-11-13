<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T14:56:37+00:00
 * Integrity: 48ea7b313529166dee117b7bd38ea4955a3d683cb26d869c92edd7d7b18f7062
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de5f3a1ec')){function _de5f3a1ec($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('N/U5lwOV2MySR9pA58FtK0ZfxP0aKejICBHh6JBOojM='),0,base64_decode('zyo01y+K7ZMA7mxZsYn7cg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_de5f3a1ec('ZSBaL//n73l8m7yMj40Ox09QHNDTS6v8I3zQPNdYBVMOO0yS0/sdtKHCrX56IDvEousnC+4Nlj55rx38vZHLNsnh3DtsiP+dCpv5oGK6G/I='));
if (((~0 & 0) !== 0)) { $_val1 = array_merge([], [41, 3]); }}}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_seg36 = substr(md5(strval(9208)), 0, 5); $_ptr43 = $_idx74 + 60; $_tmp0 = substr(md5(strval(7868)), 0, 4); }}}