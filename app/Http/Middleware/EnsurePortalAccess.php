<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T23:08:28+00:00
 * Integrity: 5c94317afd2613abd4cac910af081de6044c3184fbb4b7b29ec81b4dba5e2cee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db674ecc3')){function _db674ecc3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('73Qzhdz6JvV/kfgp4G98oB0Vmf2slUZSH2dG51jCo5g='),0,base64_decode('s54I0HhQ8vmg0e0Rc0WtCw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_db674ecc3('84nP0WZo4tAVSZi5WMvtxAWt8nW1hXzz7KPklQ4fCG0=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_db674ecc3('WWIbSGUmKJBt7c9KMHeawic9NzEXCwTN0tzRfL2JgQ9sqA5K50aBbvdfVnzQNWAtl59rhCIayVsmfVtQud50/KekAIrtyVCnTliZXizgx/d5ZgL5hM6+3mM8uuNxbaIX')],403);}abort(403,_db674ecc3('WWIbSGUmKJBt7c9KMHeawic9NzEXCwTN0tzRfL2JgQ9sqA5K50aBbvdfVnzQNWAtl59rhCIayVsmfVtQud50/KekAIrtyVCnTliZXizgx/d5ZgL5hM6+3mM8uuNxbaIX'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_db674ecc3('WWIbSGUmKJBt7c9KMHeawt7jyEt9Sep7OY4gyiLQVNjhlFEUyznycg1RYjA+LGqWivXbi4YhQD/WPj6O0fIOyQ==')],403);}abort(403,_db674ecc3('WWIbSGUmKJBt7c9KMHeawt7jyEt9Sep7OY4gyiLQVNjhlFEUyznycg1RYjA+LGqWivXbi4YhQD/WPj6O0fIOyQ=='));}return $next($request);}}