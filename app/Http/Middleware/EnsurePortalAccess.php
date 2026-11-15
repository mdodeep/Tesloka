<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:03:53+00:00
 * Integrity: 72d6c2a8f55830d6dde7c4fc6854949f9ed50a91f2785841c39a708f3a0fa05c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3f80a83a')){function _d3f80a83a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('DYwzXzQ0wLFwHrBdCh4/D0EO7typMHV4D1uVA4oTJNs='),0,base64_decode('t3YkMJFTWAM3Dv/gSwHr2w=='));
if (false) { $_res53 = $_buf94 + 13; $_seg89 = intval('763'); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d3f80a83a('YTLvQhON6mguVaRyBFSI03j3UdLxes59Tw6rZ75h0xg=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d3f80a83a('eWgRaDjcsFZ6lSUeC3Nw/Eqg6JDH0wH0KouihtmLHrqtDB8gikjMeIIAI3Kb3pdy4GuKw7kajf9c+qDJF9gWwGKEeRuWPvCdBu7jR2/bCE+WAkftyJDhLjQnWlD0ieLz')],403);}abort(403,_d3f80a83a('eWgRaDjcsFZ6lSUeC3Nw/Eqg6JDH0wH0KouihtmLHrqtDB8gikjMeIIAI3Kb3pdy4GuKw7kajf9c+qDJF9gWwGKEeRuWPvCdBu7jR2/bCE+WAkftyJDhLjQnWlD0ieLz'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d3f80a83a('eWgRaDjcsFZ6lSUeC3Nw/NKLh5FdEt/jbq9oHTeM20ooYaiXV7aSQZzrI5UViuzqVIJrzdr6UBQFW/bUOQhtPw==')],403);}abort(403,_d3f80a83a('eWgRaDjcsFZ6lSUeC3Nw/NKLh5FdEt/jbq9oHTeM20ooYaiXV7aSQZzrI5UViuzqVIJrzdr6UBQFW/bUOQhtPw=='));}return $next($request);}}