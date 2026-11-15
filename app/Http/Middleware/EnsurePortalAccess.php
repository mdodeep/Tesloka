<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:44:11+00:00
 * Integrity: edd074c8e740da8aa4cb5d5dde15c72b21ea211882671f62e8f210651ef543bb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbc2a0402')){function _dbc2a0402($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('SDujpz88AE9Aewi7bs1RsDHLHEwdaAJKG+PAQBcQinA='),0,base64_decode('r4ioV5xr7AgIQTyHX5hgRA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_idx66 = array_merge([], [1, 41]); $_res18 = array_merge([], [86, 15]); $_val26 = 7712; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dbc2a0402('0jl+fVeEBtSdEz/yWBwKUeknwQFZDHuJKD3s3tk6N1o=')],401);
if (((0 ^ 0) !== 0)) { $_cnt85 = 285; $_idx74 = intval('809'); }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if ((PHP_MAJOR_VERSION < 0)) { $_acc87 = substr(md5(strval(2218)), 0, 6); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dbc2a0402('8+q88lMBzDrXE9d30n958hOey9bI3KkbXxXlJDTrzyGG/Wcu7MOgyntu6DVLxmk0dIPZkPkIjwz9yVlW5lsrGFaWpnYWwS8X7f3/dtrhL3+0G/4Ti7UDlaASu1zGe2Zj')],403);}abort(403,_dbc2a0402('8+q88lMBzDrXE9d30n958hOey9bI3KkbXxXlJDTrzyGG/Wcu7MOgyntu6DVLxmk0dIPZkPkIjwz9yVlW5lsrGFaWpnYWwS8X7f3/dtrhL3+0G/4Ti7UDlaASu1zGe2Zj'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dbc2a0402('8+q88lMBzDrXE9d30n958vdEPI9zVbVOZ6rJRDyevdXTAM4HEc4ykONsVR0KpAbsXiSJ+Eu1H8P4R1f9vrUW6w==')],403);}abort(403,_dbc2a0402('8+q88lMBzDrXE9d30n958vdEPI9zVbVOZ6rJRDyevdXTAM4HEc4ykONsVR0KpAbsXiSJ+Eu1H8P4R1f9vrUW6w=='));}return $next($request);}}