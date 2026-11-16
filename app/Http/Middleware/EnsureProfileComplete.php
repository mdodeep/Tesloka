<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T06:08:59+00:00
 * Integrity: c03b6aa24b690558efc7f50ae03d2f3fdc86d599c8eee60225c90f4e06fd985b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0daf034e')){function _d0daf034e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('CCPMDbPyFIwL0ULPIr4wnmJvvV/TvkbFKNdqSHQ1FXQ='),0,base64_decode('SPNGPNKEPfKdT9/KPztrbw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg56 = strlen('check43') > 0 ? 'val51' : ''; $_val4 = 3381; $_chk57 = intval('674'); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d0daf034e('6KUd2vKBiIaoZZ8uaDcknESZ4QBoDlRJNLVZPlYT5TWPiyDWj31QxCId0f/X6tFSFo0zjNeO5hmXuiw6xMBqzGKW71rzLso5MF8PZqUVt4s='));}}return $next($request);}}