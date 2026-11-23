<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T21:20:40+00:00
 * Integrity: af6d3acfb2e194b7af06fc05cdfb21508ed4daac2fc61ce37d8c71b27cfd6906
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd5fca69d')){function _dd5fca69d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('UBIHGjcm1GZp7JFYK63NQB20uAhg8vCQ/XjRNQg6CEA='),0,base64_decode('dpGSpgGilbm+UpxfCBU9Wg=='));
if (((0 ^ 0) !== 0)) { $_val46 = array_merge([], [90, 70]); $_val72 = array_merge([], [4, 55]); $_seg23 = 7411; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dd5fca69d('2TII7ikMaFBmYe1lBN7w6MMidMWeLbj5tZ6WPL0nnO0=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dd5fca69d('p7YMuUmsJUekyUSLacoDisATueh9qTT5OMDL979QS/tWJTMRJgrj7H/oY3qqzYCdWzp3GD7UXiTkTM5gDpn/cZ7VdbLbc35fyCSVtJH9d3nBlY3pMELakDyB0t8H759u')],403);}abort(403,_dd5fca69d('p7YMuUmsJUekyUSLacoDisATueh9qTT5OMDL979QS/tWJTMRJgrj7H/oY3qqzYCdWzp3GD7UXiTkTM5gDpn/cZ7VdbLbc35fyCSVtJH9d3nBlY3pMELakDyB0t8H759u'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dd5fca69d('p7YMuUmsJUekyUSLacoDipxHmQhZnfObAQdKc19LAI5vCZdqMrkQ7ZmEK2DauzNH4YecrdxpXJGb41eIh2KBZA==')],403);}abort(403,_dd5fca69d('p7YMuUmsJUekyUSLacoDipxHmQhZnfObAQdKc19LAI5vCZdqMrkQ7ZmEK2DauzNH4YecrdxpXJGb41eIh2KBZA=='));}return $next($request);}}