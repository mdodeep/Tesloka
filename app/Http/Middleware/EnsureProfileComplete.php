<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:39:43+00:00
 * Integrity: 0fdf13291d07f0e42301c8c3306b05ab598cd2c738e47ff0d4f9093778ec66c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfebc4413')){function _dfebc4413($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Tprie8ruReRgB3szmXtU7YCIlX+qf1MlJvRpRsdpj8U='),0,base64_decode('DnyeRxy/hadxRbtqsbOexg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((0 ^ 0) !== 0)) { $_res49 = $_chk74 + 51; $_tmp74 = 2250; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dfebc4413('CTJpHLqUjlWQ7pp10TPT7VWizOyOsu3HmzyaXGGHU+xHYmyV6ughf8Zz0A+arWUVbL2Byl0trqv0mfUW3T0fnBJUEzzoKg3f6movgljcw4U='));
if ((!is_int(0))) { $_acc66 = array_merge([], [66, 27]); }}}return $next($request);}}