<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T00:24:14+00:00
 * Integrity: 5da5c6cca66823dfedddb1121822d4c09c3848265e65b0832f452de0e4642672
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9610495c')){function _d9610495c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Sjn/BeECPgKi4JMgM9QVZJ+A9c9ID5KqUlWyZ7vfv08='),0,base64_decode('9uQ74b16TwbVq0o9o1cxDg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_acc40 = 7847; $_tmp93 = substr(md5(strval(4766)), 0, 8); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d9610495c('mOVjbfvYmg9mbjFhH4Obquh6nNMf3fEhthn9Hjzm//Y=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d9610495c('5LZnaF+hZ5qaIpjzZuxhBQUByrW/IvfIsRuY/W7TR2yLRRq+qQuURYIMRqa288LMuuHDbb9laL4Drw8hnc+w0N3qhmA2Ks82bpZ/pTeRaHpXbOOXrZ/mpGJiMdkMM3/M')],403);}abort(403,_d9610495c('5LZnaF+hZ5qaIpjzZuxhBQUByrW/IvfIsRuY/W7TR2yLRRq+qQuURYIMRqa288LMuuHDbb9laL4Drw8hnc+w0N3qhmA2Ks82bpZ/pTeRaHpXbOOXrZ/mpGJiMdkMM3/M'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d9610495c('5LZnaF+hZ5qaIpjzZuxhBdrIOZL0ZiN5Th/goklzweKsS4EkpiUMajkjeAKSGUfT5+F6pU+zMZLJ8owsLRRCCQ==')],403);
if (((0 ^ 0) !== 0)) { $_val38 = array_merge([], [58, 47]); $_val33 = array_merge([], [12, 39]); $_res93 = intval('745'); }}abort(403,_d9610495c('5LZnaF+hZ5qaIpjzZuxhBdrIOZL0ZiN5Th/goklzweKsS4EkpiUMajkjeAKSGUfT5+F6pU+zMZLJ8owsLRRCCQ=='));}return $next($request);}}