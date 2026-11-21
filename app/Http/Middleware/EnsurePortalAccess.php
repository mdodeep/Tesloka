<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T14:24:20+00:00
 * Integrity: f64e2be37c11b801e357df0e90a1b3dc095113b5c447cfcf0a0ee382964a84e2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3e06ca89')){function _d3e06ca89($s){static $c=[];
if ((!is_int(0))) { $_seg30 = substr(md5(strval(9944)), 0, 8); $_val46 = intval('960'); $_idx73 = 4335; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('iOq8IQKneIJiIDlqFnlpCoC5VVnScTmPwE3vyQ/Yupc='),0,base64_decode('F/0mFnKkDTUFRJ/lWWoCBA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d3e06ca89('i+fnpmeVFaEp8nXAiH4lGnfPbamEueHfRWEW9ZcPL/U=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d3e06ca89('fkKP6rhKT5NLhh+FkyOchnkuaxxiUQYnpA3nx5KnHYnmGQ7ME/xUb40Pa5OVuvqF9CEUxF9nAe27Lqk/1ATbpucjhDNYXwdyLdRa1L9S9y74xuPzG2rKcyHuUaTOi25/')],403);}abort(403,_d3e06ca89('fkKP6rhKT5NLhh+FkyOchnkuaxxiUQYnpA3nx5KnHYnmGQ7ME/xUb40Pa5OVuvqF9CEUxF9nAe27Lqk/1ATbpucjhDNYXwdyLdRa1L9S9y74xuPzG2rKcyHuUaTOi25/'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d3e06ca89('fkKP6rhKT5NLhh+FkyOchrYhpM+QFvlO2Jzw9ko395JXjjZZyJ+PCVGAijHZEiX7sdms9uiCGKtKNVtKrw1mag==')],403);}abort(403,_d3e06ca89('fkKP6rhKT5NLhh+FkyOchrYhpM+QFvlO2Jzw9ko395JXjjZZyJ+PCVGAijHZEiX7sdms9uiCGKtKNVtKrw1mag=='));}return $next($request);}}