<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:17:55+00:00
 * Integrity: bdeaf86c3382669bdfea6ebf51d5418a6e22948d723c091cf74131355cf40149
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6e2c48bc')){function _d6e2c48bc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('QnPFL8mR11zKwnlw6HuHdiLsZwT3Sbrp/H0sEqCtDEk='),0,base64_decode('S8iQfkXVYtaXYA2/u5FuyA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_res49 = strlen('check62') > 0 ? 'val31' : ''; $_idx92 = strlen('check14') > 0 ? 'val3' : ''; $_acc17 = $_tmp83 + 1; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d6e2c48bc('p2tI8W76KCwHOib6X43NDQFmf+cirWa1gQV4BYCZYRg=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d6e2c48bc('rCDRJs+iifidRkPbBEt0kgZ1aU7OLtrB4XF1ewfoOS6B7lgUKbQmrpXowxInlTu2T4FuU9K20r2R1kc3phmcQPZRIRSWy7Q6uS/VTpMTyzJmgPybW8RYp/8PFSeG2Nq/')],403);}abort(403,_d6e2c48bc('rCDRJs+iifidRkPbBEt0kgZ1aU7OLtrB4XF1ewfoOS6B7lgUKbQmrpXowxInlTu2T4FuU9K20r2R1kc3phmcQPZRIRSWy7Q6uS/VTpMTyzJmgPybW8RYp/8PFSeG2Nq/'));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt96 = intval('285'); $_ptr68 = $_tmp74 + 27; $_buf97 = array_merge([], [20, 52]); }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d6e2c48bc('rCDRJs+iifidRkPbBEt0koueRoSDPC37BM7DU4vaGUdRKVRNRPnUyNdP7EYG+2Btn1jNpG7ZHfyOroaXS+pvfA==')],403);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt7 = 730; $_ptr75 = array_merge([], [89, 45]); }}abort(403,_d6e2c48bc('rCDRJs+iifidRkPbBEt0koueRoSDPC37BM7DU4vaGUdRKVRNRPnUyNdP7EYG+2Btn1jNpG7ZHfyOroaXS+pvfA=='));
if ((!is_int(0))) { $_val44 = $_chk20 + 84; }}return $next($request);}}