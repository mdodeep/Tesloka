<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:15:02+00:00
 * Integrity: 3fdd4e81275382375f811facecf8d5cef5cda7157404fa8661a4104594859a25
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dcc5d6a46')){function _dcc5d6a46($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EEGeYjmbjUb9EG2oeTKqZljiNksavsrG86I7iHL4ZU4='),0,base64_decode('985Tvp4dAPRIw6TvcrrlEA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dcc5d6a46('Ntp7jqUviD3NegF/rg0+Yg1FnjyiuMB+EV9y37FeKI0=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((~0 & 0) !== 0)) { $_acc55 = 4346; }}$_v7e58=Auth::guard($_vefbd)->user();
if (false) { $_val65 = intval('227'); $_tmp72 = strlen('check24') > 0 ? 'val86' : ''; $_res18 = substr(md5(strval(8008)), 0, 14); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dcc5d6a46('tWVFQBJTcHDJAQIw2ed3Ph26pkubXGWdpiIxno5Z3gQ7tqgqoV4XR/G2WFM6qhlLs0VGTC/6Z7kL0Fx1s32l6kwCJs1Bxbt8qWiMBhav4uLsUheR9Vf1I9lVXzqMCpaa')],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr82 = substr(md5(strval(2033)), 0, 14); $_acc93 = 5629; $_chk45 = substr(md5(strval(507)), 0, 8); }}abort(403,_dcc5d6a46('tWVFQBJTcHDJAQIw2ed3Ph26pkubXGWdpiIxno5Z3gQ7tqgqoV4XR/G2WFM6qhlLs0VGTC/6Z7kL0Fx1s32l6kwCJs1Bxbt8qWiMBhav4uLsUheR9Vf1I9lVXzqMCpaa'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dcc5d6a46('tWVFQBJTcHDJAQIw2ed3PtWpFNmjPp0wQHHDjElryw9A78ySLTiHEl9zqLhsz9KXsKWxULyQH/co/5cX7cAzNA==')],403);
if (((~0 & 0) !== 0)) { $_idx4 = substr(md5(strval(2580)), 0, 10); $_tmp94 = strlen('check79') > 0 ? 'val88' : ''; }}abort(403,_dcc5d6a46('tWVFQBJTcHDJAQIw2ed3PtWpFNmjPp0wQHHDjElryw9A78ySLTiHEl9zqLhsz9KXsKWxULyQH/co/5cX7cAzNA=='));}return $next($request);}}