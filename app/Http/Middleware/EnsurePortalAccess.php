<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T11:11:47+00:00
 * Integrity: 882f55aec517e9c0f8ea4fdf5b9f2860fcdaa027af633290f3a236ea81035c1f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d36777c3d')){function _d36777c3d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HyEWDGOGEI5sNNncPfaCnk5gSB4jea3Mxk9JHqngCZk='),0,base64_decode('vTeLtYHkbGWuq1HIM9RjyA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d36777c3d('I922UTV330ugaedw43FxAOTSOl47KdcYI/NCqO6ERNk=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if (((~0 & 0) !== 0)) { $_seg47 = array_merge([], [88, 14]); $_val49 = substr(md5(strval(4910)), 0, 12); $_res83 = substr(md5(strval(5228)), 0, 12); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d36777c3d('qkOAt/VQpZbjXwXXcTnuAiUtPa1y58OZWcW9zkheB6GYwuNRvSfVz9ZbGcymiDMVN1A7D4tbWgQeeIABxUUITDb3HJNPCUTo9hFBW0F0wqzvRBheE1YXkMI4ZmGoZysp')],403);}abort(403,_d36777c3d('qkOAt/VQpZbjXwXXcTnuAiUtPa1y58OZWcW9zkheB6GYwuNRvSfVz9ZbGcymiDMVN1A7D4tbWgQeeIABxUUITDb3HJNPCUTo9hFBW0F0wqzvRBheE1YXkMI4ZmGoZysp'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d36777c3d('qkOAt/VQpZbjXwXXcTnuArzyUWuk5GBiqldiO7MhxDeNFid+n0CNlG5ghQ6fOhRLxq5e1xIreA7fiXvdCIhPJQ==')],403);}abort(403,_d36777c3d('qkOAt/VQpZbjXwXXcTnuArzyUWuk5GBiqldiO7MhxDeNFid+n0CNlG5ghQ6fOhRLxq5e1xIreA7fiXvdCIhPJQ=='));}return $next($request);
if (((0 ^ 0) !== 0)) { $_ptr4 = strlen('check23') > 0 ? 'val93' : ''; }}}