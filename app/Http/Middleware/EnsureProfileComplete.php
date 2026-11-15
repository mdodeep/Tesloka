<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:37:08+00:00
 * Integrity: 453f233f3fab52634ec2f18e0752b7d9c835945c007e1a04ea31d7efaf616c33
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6832a929')){function _d6832a929($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XCnGxik+Gx7WRi6LeiQu5tt15dooFcKpxJ4OXpTSyiQ='),0,base64_decode('rty4UtF7S++HdKOw5K0JFA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (false) { $_buf75 = substr(md5(strval(7394)), 0, 4); $_acc24 = substr(md5(strval(1102)), 0, 14); }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if ((PHP_MAJOR_VERSION < 0)) { $_chk79 = strlen('check75') > 0 ? 'val37' : ''; }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d6832a929('AIKWvD3GIoAfjLiKqKVjOoAnpoQ24Z5nVXs8lMBnMb3ztTFlYzVgry0pCr1dCxuQDESLlZuRPj2XmnTJHSVh0WVJWq2CxgnAf3v6MG9WzcE='));}}return $next($request);}}