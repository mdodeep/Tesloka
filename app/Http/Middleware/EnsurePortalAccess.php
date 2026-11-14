<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:45:28+00:00
 * Integrity: d8d50151664cd5e9171c0571737d97b823c3a8834b7a545e6b01c8ef1911e6de
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1b3d4ead')){function _d1b3d4ead($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1MG4PsaivIQD2haXnReisUklGIUk9DjZOGPpc1HCj0c='),0,base64_decode('xYuhTWn+fLUfuvtOdYfofw=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx13 = substr(md5(strval(5693)), 0, 15); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((0 ^ 0) !== 0)) { $_val53 = substr(md5(strval(8302)), 0, 15); $_idx93 = substr(md5(strval(1573)), 0, 16); $_seg58 = substr(md5(strval(1835)), 0, 13); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d1b3d4ead('A0ZyWdicb3ihO0n0RyndlHEhWK0NDjn6Q35qdr230Hc=')],401);
if ((PHP_MAJOR_VERSION < 0)) { $_buf58 = substr(md5(strval(3286)), 0, 15); }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d1b3d4ead('K9d01EIKsVfVuQy9kTO4aAHPOvCYIjQIYyXC58rD3Llrba+7nALma242cISOG8mDFz1j8NiE7LSsQ/VsR6AU3z5l4LczlUupdMq2kOXMxnclVCuGK16hEvF8wKkuuPt3')],403);
if (((~0 & 0) !== 0)) { $_chk85 = array_merge([], [44, 34]); $_idx34 = intval('81'); }}abort(403,_d1b3d4ead('K9d01EIKsVfVuQy9kTO4aAHPOvCYIjQIYyXC58rD3Llrba+7nALma242cISOG8mDFz1j8NiE7LSsQ/VsR6AU3z5l4LczlUupdMq2kOXMxnclVCuGK16hEvF8wKkuuPt3'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d1b3d4ead('K9d01EIKsVfVuQy9kTO4aGeeVBNcb510DwlcEIIXB7UrK99R9B2HeKyMWHh0cYmxOfg++00zg0TBL15fSbtONA==')],403);}abort(403,_d1b3d4ead('K9d01EIKsVfVuQy9kTO4aGeeVBNcb510DwlcEIIXB7UrK99R9B2HeKyMWHh0cYmxOfg++00zg0TBL15fSbtONA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx90 = array_merge([], [85, 97]); $_buf97 = intval('94'); $_ptr69 = substr(md5(strval(1248)), 0, 14); }}return $next($request);}}