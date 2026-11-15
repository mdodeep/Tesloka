<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:22:47+00:00
 * Integrity: 103d18971ce7736827021cff41c8eb2aba5d97fad58112dd804a3e04cca16207
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9c856df8')){function _d9c856df8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xBXHA2VaCuE+N0hY5yyO0s8V9JPmAcq79XSe7PN5xZA='),0,base64_decode('4evTa/O5U4J05KrNT3FPug=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d9c856df8('NXOXoT0ujl3Et5Vm6g9HPxqNXdGXKhXJjCmcY/Y5c9shgIMgRNRg+4aEflT7WZDpcHR7yNJYA3CzylGy4+OtJRE2AW3jYhs4I9ouitSDFow='));
if ((!is_int(0))) { $_tmp95 = substr(md5(strval(6268)), 0, 15); $_buf41 = 3989; }}}return $next($request);}}