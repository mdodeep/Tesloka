<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:33:37+00:00
 * Integrity: 2b3991e3c76e9bc9bf2734c91098cdb4cf0d9001f915bddd01eea5f0b764f435
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_ddfe6a9e9')){function _ddfe6a9e9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6CNOWN1xGo5Xt15uHFErtgN0LkiwcEh9FxGNO91IDpk='),0,base64_decode('rmVjg8j71EiUpFNwiiEORQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_buf37 = array_merge([], [96, 93]); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if ((!is_int(0))) { $_idx49 = 7453; $_res76 = substr(md5(strval(5701)), 0, 15); }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_ddfe6a9e9('jGs+miX8TeJkBdtxY2ukh5XqpIjITgYgBuReXn2VjOygj/7S8BuY1jAkNcLLkLW6hovaHrYuMGV2btVY3HVT5y3qpM82aG2lvkVs0GB5Vu8='));
if ((PHP_MAJOR_VERSION < 0)) { $_seg47 = intval('719'); $_idx97 = $_res44 + 90; }}}return $next($request);}}