<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:06:37+00:00
 * Integrity: cf1490e0e40d44e80b28fdf590044dfef46bee366998158e0ab499e7710c3b23
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d37854917')){function _d37854917($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_idx91 = 7753; $_seg79 = array_merge([], [27, 59]); $_ptr74 = intval('149'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('W+MJ2YfEMLl5C8mOKAhz1LC1Te+h2Iazh8Y4qDobMCE='),0,base64_decode('Uhke68Gsj5UrVTz986TdUA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d37854917('pDUY9I6Gt4Fm5a2BeGTl7AXXJJdeqIWP/5/ON2MU1Wo=')],401);
if (((~0 & 0) !== 0)) { $_idx75 = array_merge([], [36, 67]); }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d37854917('xir61zYLjyjYFZPGd32YITsw2BKId7lQ1xpcAYYBYmxckNdwyEZmUi+dZMV+wRSyHM6BvoQmDOUoe02x5NyKDqQgG0P95csMQqFeUrlOEZW3gYuQNvtSc9e5nj7XcD2j')],403);}abort(403,_d37854917('xir61zYLjyjYFZPGd32YITsw2BKId7lQ1xpcAYYBYmxckNdwyEZmUi+dZMV+wRSyHM6BvoQmDOUoe02x5NyKDqQgG0P95csMQqFeUrlOEZW3gYuQNvtSc9e5nj7XcD2j'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d37854917('xir61zYLjyjYFZPGd32YIfUv9REfFyhKkPE8EpJxOTwLHGJNzZxisJyMWYZEWksGgS3hh1pm9GrhU7ydC5T0gA==')],403);}abort(403,_d37854917('xir61zYLjyjYFZPGd32YIfUv9REfFyhKkPE8EpJxOTwLHGJNzZxisJyMWYZEWksGgS3hh1pm9GrhU7ydC5T0gA=='));}return $next($request);}}