<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:03:23+00:00
 * Integrity: bb5e2d4dc002ca16e352f94dec9ff1b22a235be0f9eaf548fb64c7f0cb8d46b8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d000cd81e')){function _d000cd81e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7vIPNWh654i6+t8QUf7vtcV49dt45fXxG6TDKdZrRPY='),0,base64_decode('4egxqkZ42H+fdXmykwVSQA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d000cd81e('sv1nNzpLjYpo9H8A+8ZQyvjnKPStW0VKrMpVZ0ArP86fAXmxjqWauYrZN26xemUChq4Ynmkjk3AEUN1FjcSvV1bM/OnnvhDp3ogpoaA9Utg='));}}return $next($request);
if (((0 ^ 0) !== 0)) { $_chk79 = substr(md5(strval(9067)), 0, 11); }}}