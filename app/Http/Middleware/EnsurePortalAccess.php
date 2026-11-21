<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:15:07+00:00
 * Integrity: 6cc87d6018f5bf82d5a78b1fa5688d482f0fd4102a645a3588fc6ea4e386a0c1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de52b228d')){function _de52b228d($s){static $c=[];
if (((~0 & 0) !== 0)) { $_ptr83 = substr(md5(strval(3546)), 0, 14); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cWzh7ExHC1aszp0NSdTiGjpnuc3j7dcPmnr6JA2e/KY='),0,base64_decode('Id5jHSZwsQY8Mr/uvnh+Rw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_idx17 = strlen('check92') > 0 ? 'val81' : ''; $_cnt64 = $_tmp69 + 93; $_tmp2 = array_merge([], [96, 71]); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_de52b228d('/Ywyrb5Ey4wjTcJ+1yLafcNBxn3R+5Zh7OxsFj1g4/M=')],401);
if (false) { $_val66 = 9668; $_res13 = intval('176'); $_cnt37 = $_val28 + 71; }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if (false) { $_acc32 = array_merge([], [62, 13]); $_chk86 = array_merge([], [82, 35]); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_de52b228d('vYc4yHQ9sjvmHkCr9SrGM+UVkkGXBahOsuD/mRc9O1JYOULMiBnWh8s4y+wbcaFIZoW/l9pZkzWa23KLFnnsaJ72AfQyb/LrjLjR4lsg9E2uL8XQxcMPWeWzMpayhTDP')],403);}abort(403,_de52b228d('vYc4yHQ9sjvmHkCr9SrGM+UVkkGXBahOsuD/mRc9O1JYOULMiBnWh8s4y+wbcaFIZoW/l9pZkzWa23KLFnnsaJ72AfQyb/LrjLjR4lsg9E2uL8XQxcMPWeWzMpayhTDP'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_de52b228d('vYc4yHQ9sjvmHkCr9SrGM+YsCyAXUcHmcefOGSamCqPbup5ObDKfrIO33/BVip4MWBk/cDbI3FH7pvJa2df4aA==')],403);
if (((~0 & 0) !== 0)) { $_res66 = $_chk74 + 9; $_res51 = array_merge([], [66, 82]); }}abort(403,_de52b228d('vYc4yHQ9sjvmHkCr9SrGM+YsCyAXUcHmcefOGSamCqPbup5ObDKfrIO33/BVip4MWBk/cDbI3FH7pvJa2df4aA=='));}return $next($request);}}