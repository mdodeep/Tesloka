<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:06:07+00:00
 * Integrity: 97253e7a138b8dfc29cb91654dc1e219bfff6043bef9e78fea4f64e20462c2e9
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d533c233a')){function _d533c233a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MDVk+bvH+VFnhnETq5OrtVFf7yt9M3Kj0au8i3g1q1Q='),0,base64_decode('H4kPxkWvtlh4ujp4sIiTLA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d533c233a('Wae+PjYBDou3yZCsHURPDVqcP0T266WSNVaIuzaxDsM=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d533c233a('p4EQwudxBSqYxNElkdu/79X8w+q6e2+NAWro5R0W2B25r2iNOaIiwvR43CSds6iHpHufKs5Gvcuf46EphzgWtGxFk3oHWpvc7ZYB0RUKqGWxatMk92RJAXYMz8qnuhBO')],403);}abort(403,_d533c233a('p4EQwudxBSqYxNElkdu/79X8w+q6e2+NAWro5R0W2B25r2iNOaIiwvR43CSds6iHpHufKs5Gvcuf46EphzgWtGxFk3oHWpvc7ZYB0RUKqGWxatMk92RJAXYMz8qnuhBO'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d533c233a('p4EQwudxBSqYxNElkdu/78DwrewuNYZw1R83ndjbmZSdNl5lamDPddlHP6TLUu1dAYrhlpEnnHJl7o2p0c6+pg==')],403);}abort(403,_d533c233a('p4EQwudxBSqYxNElkdu/78DwrewuNYZw1R83ndjbmZSdNl5lamDPddlHP6TLUu1dAYrhlpEnnHJl7o2p0c6+pg=='));}return $next($request);}}