<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:29:15+00:00
 * Integrity: bf398720bd9a3bd753e409fc55455db0d0d24680c20966a4ff9c3742bc0133a1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0d21e42c')){function _d0d21e42c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Duh/aSzskrBxX3qP8CEckH5Ml+MsNMiFX4IZ2TKcVYs='),0,base64_decode('XCghjFuuPiXS6GAuewUJ9A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if ((!is_int(0))) { $_seg70 = intval('199'); $_ptr7 = array_merge([], [82, 13]); $_cnt27 = strlen('check2') > 0 ? 'val84' : ''; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d0d21e42c('A5O/TA4fIhktYrA2aPJS++k4fSprliQYmfL/nIXmMpS60pwe1tY1AeC52l9MTgc8QV9hKlCC1wOTGdzR1UfoTY6MguwdjKnsrRYTgS/kqOQ='));
if (((0 ^ 0) !== 0)) { $_tmp7 = 990; $_acc66 = $_seg96 + 27; }}}return $next($request);}}