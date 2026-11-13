<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T10:25:08+00:00
 * Integrity: 355d438183c4270a99efdc1299cd916b84883368582d9ba9e9ce8f086bd847f4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfbe81cdc')){function _dfbe81cdc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ObDOijDAVRpvOGw19M366bF6IrcGEVBCJ/p1m4E2NXY='),0,base64_decode('UVsxDY+i7kpBlL6GeAw8WA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dfbe81cdc('XJ5TeY5WkfqYWLnR3ANkQY2qHNjDD+KDwl+Hb/ZmwYg=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dfbe81cdc('nKF/gcr2/Ke/tXMRXeMjcQw3UILOmmhxR7ts7puksQXii6weBqsghCqvnFVSr0UVDjih8nE6kqX8MmQKFnpQlO9kHcalBseXpX4LxFx29YQ3DKwdxhFO4ulRekMV4TNz')],403);}abort(403,_dfbe81cdc('nKF/gcr2/Ke/tXMRXeMjcQw3UILOmmhxR7ts7puksQXii6weBqsghCqvnFVSr0UVDjih8nE6kqX8MmQKFnpQlO9kHcalBseXpX4LxFx29YQ3DKwdxhFO4ulRekMV4TNz'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dfbe81cdc('nKF/gcr2/Ke/tXMRXeMjcfa0c+Z4uA5pDkPAs/cfwXYO7u5hWX8XtHwRYxImo4fc7dJiCd3825JImMwvoskyOg==')],403);}abort(403,_dfbe81cdc('nKF/gcr2/Ke/tXMRXeMjcfa0c+Z4uA5pDkPAs/cfwXYO7u5hWX8XtHwRYxImo4fc7dJiCd3825JImMwvoskyOg=='));
if (((~0 & 0) !== 0)) { $_acc38 = array_merge([], [85, 5]); $_seg60 = array_merge([], [8, 43]); $_val18 = 5587; }}return $next($request);}}