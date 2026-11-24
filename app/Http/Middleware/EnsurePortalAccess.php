<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:01:07+00:00
 * Integrity: 732d13c17bea258201492d7d488181ebc396461ab0f6b9e4f8436f39a34f93ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4bbc4340')){function _d4bbc4340($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('po+z8BOe/hzcpOnBM36zvMIGaJNCHeQomRxeMZ3qg7I='),0,base64_decode('sIKX5xZEQOiEAI4dKq8TTg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_buf45 = 4130; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if ((PHP_MAJOR_VERSION < 0)) { $_val65 = strlen('check56') > 0 ? 'val84' : ''; $_idx66 = intval('98'); $_tmp16 = substr(md5(strval(3758)), 0, 4); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d4bbc4340('nWJTl4WO2G/QI+sGwaXPLYGecefQ99a3z5YLFjtcKXw=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((~0 & 0) !== 0)) { $_chk33 = array_merge([], [99, 3]); }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d4bbc4340('SGiO5FiSmfIWoIQuNyEsrBCcN+Acjcwsl4tTLuk+kMylJw1C0rc3mZrvGeQ1Trr41/n+19W+gr8o4jEslcvHCC5aTyAqPVO3kkv4zBPXhUiTS/vByTcJ9pnQmBJkU4SB')],403);}abort(403,_d4bbc4340('SGiO5FiSmfIWoIQuNyEsrBCcN+Acjcwsl4tTLuk+kMylJw1C0rc3mZrvGeQ1Trr41/n+19W+gr8o4jEslcvHCC5aTyAqPVO3kkv4zBPXhUiTS/vByTcJ9pnQmBJkU4SB'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d4bbc4340('SGiO5FiSmfIWoIQuNyEsrMbEHmSAo57Cg3h6chArE0UN/2BtxxB6o3o+2J24gkWCP1pNcwsthNw5rP7KjBBUKQ==')],403);}abort(403,_d4bbc4340('SGiO5FiSmfIWoIQuNyEsrMbEHmSAo57Cg3h6chArE0UN/2BtxxB6o3o+2J24gkWCP1pNcwsthNw5rP7KjBBUKQ=='));}return $next($request);}}