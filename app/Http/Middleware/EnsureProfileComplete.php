<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T01:23:55+00:00
 * Integrity: 03dd73e209ae763b7e45b9127ad9ba4052ed9339cd9eeca7000dee536483c9e0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d72952234')){function _d72952234($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_tmp93 = array_merge([], [19, 69]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1dC3PACNO5MlrGWQBX/+FCaejJ766bhXu9sEwgeXkV8='),0,base64_decode('qi9TI72DJh0mn3aFpeJ1CA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (false) { $_val79 = array_merge([], [43, 79]); $_idx12 = intval('77'); $_cnt22 = strlen('check37') > 0 ? 'val23' : ''; }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d72952234('JpUlb3NajyTjSrOMMdXytNj4XcBB8NdKOo0VcekDu0wAuYvblxspMv/vcbPY4HF7crf94Zg6kY93yMBJpcBzHBO20hKhtxBXIbxMfPboBUI='));
if ((PHP_MAJOR_VERSION < 0)) { $_acc17 = strlen('check71') > 0 ? 'val6' : ''; }}}return $next($request);}}