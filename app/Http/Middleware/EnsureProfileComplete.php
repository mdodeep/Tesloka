<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:32:36+00:00
 * Integrity: 5c09f9b12dd5876c3fb4fd536a0ea3dfc34dbcb79b618323df15f2d69457375e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3fe86d36')){function _d3fe86d36($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('YZefB1RFPNjX6/nU66yqwVwbepdPd6/gp31Ju/y0D90='),0,base64_decode('fVADfE7vKZ0G0ByU5Yuk1A=='));
if (((~0 & 0) !== 0)) { $_seg29 = array_merge([], [20, 18]); $_res90 = $_res0 + 90; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if ((!is_int(0))) { $_chk13 = $_val69 + 32; $_val52 = $_cnt93 + 18; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d3fe86d36('3EcaJcnoeW+/o5sMR7zzQoQdgAqQ1NjwinE0ZYekrPhq9S32kM2j8Ma/0aHEzql55qamXl3ZVGpA4yPAyGkPJpcvXrrha/J0iue8V2WVXBg='));}}return $next($request);}}