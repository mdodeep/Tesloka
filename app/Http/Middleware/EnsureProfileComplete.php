<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T11:21:16+00:00
 * Integrity: b23d60efe9e5c511646eddc8e04fbca0f57c6c778e19ba4b4a1d6b17bd86b506
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5743de8e')){function _d5743de8e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OQ9zBKIDYta7+q7emjDDN0KgwP40366wC2i7tZ7raao='),0,base64_decode('JH+DUCwG/+jLt9A69h4JqQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if ((PHP_MAJOR_VERSION < 0)) { $_acc72 = $_val16 + 9; $_chk88 = intval('278'); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d5743de8e('9CtN92Jj35tq2XgfRBEGxaf5TzqEkZ1MGVuRHkDqO6LREeeo8rDYrC/FwlmYO8XhKvwUtMYn7eVexoB3xQW2HaVZ0bDWJt4+PhoFylHH/Kc='));}}return $next($request);}}