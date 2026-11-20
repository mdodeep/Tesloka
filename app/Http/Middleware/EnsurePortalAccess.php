<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:12:53+00:00
 * Integrity: a306dc4c788eb6eaa4a2c3f208f02c66d20642bbc37e89cdc2c9154b697bd1aa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d005154cf')){function _d005154cf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LR8C8ipNzJKul+aDO8wEVDizxHBKu8DAjc8s5/9bkog='),0,base64_decode('Aksm0quIQYMEPAVI1j6ywA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if ((PHP_MAJOR_VERSION < 0)) { $_buf12 = 5076; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d005154cf('Pxm6mI2Mdd8aUHWBtcFoNgCJBCwdlF6PnAifAFZLQAw=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d005154cf('71gjbrsgDHDinK9JAUupxL+h1bQEIpM2/fd/FAt4GyKKBte+HcimJuTztx8fDVOw5WmrrRBGKSk5XmOP5GyTOInK36RJvFWMGfXL66ra6WGLVmTtDYMSFTogpNM4+VRc')],403);}abort(403,_d005154cf('71gjbrsgDHDinK9JAUupxL+h1bQEIpM2/fd/FAt4GyKKBte+HcimJuTztx8fDVOw5WmrrRBGKSk5XmOP5GyTOInK36RJvFWMGfXL66ra6WGLVmTtDYMSFTogpNM4+VRc'));
if (((~0 & 0) !== 0)) { $_val95 = $_tmp72 + 93; $_res11 = 2863; $_chk63 = 5406; }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d005154cf('71gjbrsgDHDinK9JAUupxJQblECfcD+hqaBDYA0dDaZvWTRtoCGwW6aODAThztLGBq+XyMWzyUjIinPoi3glPA==')],403);
if (false) { $_val56 = intval('230'); $_chk83 = intval('643'); }}abort(403,_d005154cf('71gjbrsgDHDinK9JAUupxJQblECfcD+hqaBDYA0dDaZvWTRtoCGwW6aODAThztLGBq+XyMWzyUjIinPoi3glPA=='));
if ((!is_int(0))) { $_seg63 = strlen('check5') > 0 ? 'val10' : ''; }}return $next($request);}}