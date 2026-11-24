<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:39:10+00:00
 * Integrity: 5aa2806c8b55a3bb93428696f05684b8c1418a4bfc3fd31fec9a9a96c1e82701
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4d2dc513')){function _d4d2dc513($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9II2jJnkUAhIc2+p/jl1AkrRNNvOUdhObDE3KOKHXVw='),0,base64_decode('wJ1rscT4sZ1de/fzPyou6g=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (false) { $_val34 = $_seg6 + 65; $_buf42 = array_merge([], [20, 52]); $_chk12 = 4240; }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d4d2dc513('0lL617SF7bX8yRrcqDwul+zlL8oLYuLP/6KIc2wKi86srpPUdbACpBf4gwT07OcOYk7zjM3V9LdeeNZ3UM8eUbmEJphk8VMoIqQX4W2O6gg='));}}return $next($request);
if (false) { $_idx97 = $_cnt28 + 61; $_tmp7 = strlen('check61') > 0 ? 'val26' : ''; $_chk72 = substr(md5(strval(5238)), 0, 15); }}}