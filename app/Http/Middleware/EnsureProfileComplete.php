<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:01:07+00:00
 * Integrity: 732d13c17bea258201492d7d488181ebc396461ab0f6b9e4f8436f39a34f93ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de81372ed')){function _de81372ed($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_res6 = array_merge([], [70, 61]); $_cnt9 = intval('136'); $_seg60 = 2575; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('n1dHMnHVzRKOXcaeheFChUCTDsp8i59/q3mvv+pxPsI='),0,base64_decode('Zrda7qHNkpgsAnpbWH6Fng=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_de81372ed('p4LwyTphtVArfBehcn9DSwumZOx4K9BbIlSsqsqNHRNn47Ro9Gi6WofGGsR0Wqk9r7hUIFAGs9LreWFT0VKuRohF/qxi7qcPc89FAjjyl54='));}}return $next($request);}}