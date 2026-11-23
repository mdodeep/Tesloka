<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T05:03:51+00:00
 * Integrity: f5a75bcdc48148c8724fcb4a06b85088073bf6fdb5c9c28924b472633ae79374
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8477f2ea')){function _d8477f2ea($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('WZT2M4rBVA9Jc3Wn9w5xrpFwd1uCW8/sf7QsgsecdoM='),0,base64_decode('4tmul/Iq/iYYp6EP+5QRLQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((~0 & 0) !== 0)) { $_buf72 = strlen('check70') > 0 ? 'val4' : ''; $_chk55 = intval('690'); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d8477f2ea('oefilfBG32f7A2SFMSuY8EzQEbjeOsWbauatpmdxaSI=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d8477f2ea('fKCTkT+yj/hMdN9o8niE3l/kBv1GEOr2js1tjYN93Ms5+HVbkX914t0FUem4JUd6oOAvc5ugor5GvUgCCYaDvgwEF2V2DaYHgtgab0I7+Wc7Wul/2R/78xlKHA1LsXgI')],403);}abort(403,_d8477f2ea('fKCTkT+yj/hMdN9o8niE3l/kBv1GEOr2js1tjYN93Ms5+HVbkX914t0FUem4JUd6oOAvc5ugor5GvUgCCYaDvgwEF2V2DaYHgtgab0I7+Wc7Wul/2R/78xlKHA1LsXgI'));
if (false) { $_buf16 = $_res90 + 3; $_buf30 = 4649; }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d8477f2ea('fKCTkT+yj/hMdN9o8niE3rr0wNu0cH37Y7NI9uLDg/hheJbYnwvfKDIM8+CxjBhyUWGrSoM1idX5uHONdJZj2Q==')],403);}abort(403,_d8477f2ea('fKCTkT+yj/hMdN9o8niE3rr0wNu0cH37Y7NI9uLDg/hheJbYnwvfKDIM8+CxjBhyUWGrSoM1idX5uHONdJZj2Q=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg2 = intval('899'); $_val14 = array_merge([], [68, 80]); }}return $next($request);}}