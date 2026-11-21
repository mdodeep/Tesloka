<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T23:45:35+00:00
 * Integrity: 77663be56596b873b92abe6bccc47448a4f71dc1a2cd4fe86ff846550e946ec4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0bab0236')){function _d0bab0236($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OMXPX3UVyT2hdEs7b1d6iJ5Xfqegq7W6pUSsP7bbmAQ='),0,base64_decode('cm/uUqO3yAgeblK/7LDSuw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d0bab0236('byU/U7f95C3gDnOQZunNHdbT4aw2zL0BmMGygwItlUA=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if ((PHP_MAJOR_VERSION < 0)) { $_ptr23 = array_merge([], [96, 61]); $_buf87 = $_ptr94 + 17; $_acc82 = $_idx66 + 73; }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d0bab0236('69VOqwGNMIV0wuNy3MqQvK1PEbPL/KN8BGjFfu99/3kmv9F1EOw1lnKJ7hqTju3H6A5kdSQBpI+fVtHzEiCZC1xMGS2R8lcmLEzKaybMHgQoqpC9s65YT+VPQoOl6lZ7')],403);
if (false) { $_idx49 = $_chk13 + 76; }}abort(403,_d0bab0236('69VOqwGNMIV0wuNy3MqQvK1PEbPL/KN8BGjFfu99/3kmv9F1EOw1lnKJ7hqTju3H6A5kdSQBpI+fVtHzEiCZC1xMGS2R8lcmLEzKaybMHgQoqpC9s65YT+VPQoOl6lZ7'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d0bab0236('69VOqwGNMIV0wuNy3MqQvAAXyPnESDOkX2OEqLpm1EpkwZc+xbXrl2WLB3+D726lfZdp4FOyo2tV07pRjxw7cg==')],403);}abort(403,_d0bab0236('69VOqwGNMIV0wuNy3MqQvAAXyPnESDOkX2OEqLpm1EpkwZc+xbXrl2WLB3+D726lfZdp4FOyo2tV07pRjxw7cg=='));}return $next($request);}}