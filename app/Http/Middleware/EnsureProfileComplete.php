<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:40:28+00:00
 * Integrity: d8afa62270f139dce3d4ed0f9766ada15192a183d4abdb06565216c2901cb57a
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d625f14dd')){function _d625f14dd($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_tmp88 = intval('724'); $_val6 = 7476; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('pGLbkC+YRJC88p0YUJWXiDNvI21UIeLr/IYkw43WxNQ='),0,base64_decode('vQlLDB0rN2YmZXCSO/yrog=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if ((!is_int(0))) { $_ptr35 = intval('662'); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d625f14dd('flwbHpHG2yRXEGaaexkOOb1C8ksMW+MXWFhGYC77eNnshk6ACcHeaKwqZ8sLdniD+5QTynPlwLAlJ2xMJ/Rlsg9VvH1wB9H7ocmYKb59gVo='));}}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr27 = intval('945'); }}}