<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:21:22+00:00
 * Integrity: 1288d8c03502ab6b0836b8c6f127e3e459d217625768cb5178f28a6b13cab141
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d67e3a958')){function _d67e3a958($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jp3x8UXmawR7hp1BCsJ4KmOTS03yTZ4rkMZp0c3IhwE='),0,base64_decode('P29pktyhBqUBpcXP7PDSqg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d67e3a958('cHrKoRU9u+/YWQQXaLWo55u65wJmgjJkvNQw1cJvBfw=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d67e3a958('oyl2f6jFp9QRG+q1JZ4DW6EPanguna045cs1rtg7wWUV+MpbY0an7XK+XiPxeEfUZATjycE9riE+XTmEliAXMPWskWuVMvhA+9KlXhNtY9hJyD+vtY1q3enz5uGS9Sz3')],403);
if (((~0 & 0) !== 0)) { $_idx52 = array_merge([], [18, 69]); }}abort(403,_d67e3a958('oyl2f6jFp9QRG+q1JZ4DW6EPanguna045cs1rtg7wWUV+MpbY0an7XK+XiPxeEfUZATjycE9riE+XTmEliAXMPWskWuVMvhA+9KlXhNtY9hJyD+vtY1q3enz5uGS9Sz3'));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt78 = substr(md5(strval(2550)), 0, 14); $_res93 = intval('734'); }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d67e3a958('oyl2f6jFp9QRG+q1JZ4DWza915iAcmtSoV3XpVLVW7YK8XyKWeSIU3fYn3hF+0alClrsObcvPvadXF05UJUiDw==')],403);}abort(403,_d67e3a958('oyl2f6jFp9QRG+q1JZ4DWza915iAcmtSoV3XpVLVW7YK8XyKWeSIU3fYn3hF+0alClrsObcvPvadXF05UJUiDw=='));}return $next($request);}}