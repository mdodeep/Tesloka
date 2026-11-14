<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:26:08+00:00
 * Integrity: 36c9a2f4caea85b0d9be3587e3b699cbbb3fd8478edd5758bd9423d7d268d032
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d528a6ebb')){function _d528a6ebb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('558QCPv+PqNe8kxw+lvHiR19y6sad2UV6lfQ0yS9wL4='),0,base64_decode('RzWev9UwTwEeTmteqrZ54A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d528a6ebb('dj4VJVOdtO1gPeYVXs1pPCX6+yICuGGOYPXYggV9p1U=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (false) { $_acc84 = intval('232'); }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d528a6ebb('s5PkRrXTEARX6noe97MLnYerCzB9lebB7D1kqvSdvhOAyqTCaVdapak4TQihAGP7ylLHkoIVbodkh7kaa6ZCk8pLn1gRJM2KQRphEWJbVSiAVmKDddPYPNs9OeX3MvVC')],403);}abort(403,_d528a6ebb('s5PkRrXTEARX6noe97MLnYerCzB9lebB7D1kqvSdvhOAyqTCaVdapak4TQihAGP7ylLHkoIVbodkh7kaa6ZCk8pLn1gRJM2KQRphEWJbVSiAVmKDddPYPNs9OeX3MvVC'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d528a6ebb('s5PkRrXTEARX6noe97MLnUzbyjV9wH0gm280Am54ahyqomgwlUmmjLJTYKzzYuf/TwyyJDBcX9dj1QjxUe1XIA==')],403);
if (false) { $_chk47 = substr(md5(strval(8832)), 0, 9); }}abort(403,_d528a6ebb('s5PkRrXTEARX6noe97MLnUzbyjV9wH0gm280Am54ahyqomgwlUmmjLJTYKzzYuf/TwyyJDBcX9dj1QjxUe1XIA=='));
if (((~0 & 0) !== 0)) { $_tmp8 = $_seg1 + 31; $_cnt36 = intval('746'); }}return $next($request);}}