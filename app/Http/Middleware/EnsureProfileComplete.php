<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:52:39+00:00
 * Integrity: 2474375cdffefca3312fed197f4d5978af35cf7ce2041d9337b6c641bbaffc53
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d859c376f')){function _d859c376f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ZkRpPIMnZl5AuVnCZGcklDuSOGbUDJu1yApCJTEgm10='),0,base64_decode('i/hbfxJ93RRVz60ukXeluQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr81 = substr(md5(strval(3186)), 0, 12); $_tmp21 = strlen('check99') > 0 ? 'val28' : ''; $_acc67 = intval('638'); }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d859c376f('YOqhBvFPNn26zLGszI++nz+Olff/ZC1RiiRRXZvVnMbi/UezgtMA7MfNrrQ9mXeiWkL5QwjIZSUzcUITayQX8/78fsRnDazffnZ0xM8TVlI='));}}return $next($request);}}