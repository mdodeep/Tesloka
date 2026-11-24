<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T00:08:20+00:00
 * Integrity: 7e97075b0c1d11d33345a82032b32d9a6731eec33cb5702f74d22d41762357b3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d13022b79')){function _d13022b79($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('IJZ5U7v/ZgPVTjZt9uYoMu7VlmRyA8qGWdwdoAKTnXs='),0,base64_decode('6A5eq4pNJp4lEVsNSWrXAg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d13022b79('tm1m+ZnCo+9iy2U2iFRwns2zEKcGZAUaEmWybaXm8KQ=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((0 ^ 0) !== 0)) { $_res51 = $_seg0 + 94; $_buf95 = 3678; $_tmp3 = substr(md5(strval(576)), 0, 15); }}$_v7e58=Auth::guard($_vefbd)->user();
if (((~0 & 0) !== 0)) { $_acc69 = strlen('check91') > 0 ? 'val0' : ''; }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d13022b79('VPAyQfHtz93NWMIkPJNlfjz+MHw2tj5vdbgW7NIOPkwljAnwru9MgC1tE63dPVHNg85aBaVNyCDqi7aXXq9K3Z9vZwRcnfvQdiGk15+U8nC3M2yjMEXBep/bfoaoirLe')],403);}abort(403,_d13022b79('VPAyQfHtz93NWMIkPJNlfjz+MHw2tj5vdbgW7NIOPkwljAnwru9MgC1tE63dPVHNg85aBaVNyCDqi7aXXq9K3Z9vZwRcnfvQdiGk15+U8nC3M2yjMEXBep/bfoaoirLe'));
if (((~0 & 0) !== 0)) { $_chk49 = intval('793'); $_buf26 = 3108; $_res50 = intval('145'); }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d13022b79('VPAyQfHtz93NWMIkPJNlfsUkcccGGwAemEq+vBSZp/hNCFBn7qeiHa9SY4bvj0QZl4Smaz/jwedHri4AiAul4Q==')],403);}abort(403,_d13022b79('VPAyQfHtz93NWMIkPJNlfsUkcccGGwAemEq+vBSZp/hNCFBn7qeiHa9SY4bvj0QZl4Smaz/jwedHri4AiAul4Q=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc36 = substr(md5(strval(3417)), 0, 9); }}return $next($request);
if (false) { $_buf32 = $_seg22 + 26; }}}