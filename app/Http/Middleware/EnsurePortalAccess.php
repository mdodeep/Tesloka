<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:17:29+00:00
 * Integrity: e707243f54e4004ab820d2ab617f6532b06a3b9d57f89b9942c273a07685ce5b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbc5cbf49')){function _dbc5cbf49($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('lI7g/350GxbA2WDAfF6H5uytXK7B1EL92Di0PvkLbZM='),0,base64_decode('VwokseCM8pnzDCSONeeHVg=='));
if (((~0 & 0) !== 0)) { $_val60 = strlen('check15') > 0 ? 'val57' : ''; $_val14 = $_buf94 + 12; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dbc5cbf49('Ve5YaGuvxiptdgJnxsIUYEGku8BHwDkfa11IlKLRZeo=')],401);
if ((!is_int(0))) { $_seg78 = array_merge([], [67, 23]); }}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (false) { $_buf30 = $_tmp0 + 70; $_idx17 = substr(md5(strval(1618)), 0, 16); $_chk37 = $_chk34 + 17; }}$_v7e58=Auth::guard($_vefbd)->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_val45 = intval('393'); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dbc5cbf49('Ed5Z4Gm6hC3DZBRbAbJoca4RK8BpFwOZFQwhqJZMtXLooR+S0MhaBku3T+F05b5PWceLGSo1vHcuiGQmuAXb7lgVtvc7kuIgB/d6Cx5xZgHqEsiHFwLP8VnNulMkcn7Q')],403);}abort(403,_dbc5cbf49('Ed5Z4Gm6hC3DZBRbAbJoca4RK8BpFwOZFQwhqJZMtXLooR+S0MhaBku3T+F05b5PWceLGSo1vHcuiGQmuAXb7lgVtvc7kuIgB/d6Cx5xZgHqEsiHFwLP8VnNulMkcn7Q'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dbc5cbf49('Ed5Z4Gm6hC3DZBRbAbJocRPj31mXaPxxE5QOwjm0tYkdYe46PQBh8FqF2gzHveoRr3yB6oEyRqETuz4rh5s9wQ==')],403);}abort(403,_dbc5cbf49('Ed5Z4Gm6hC3DZBRbAbJocRPj31mXaPxxE5QOwjm0tYkdYe46PQBh8FqF2gzHveoRr3yB6oEyRqETuz4rh5s9wQ=='));}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr67 = 3863; $_seg64 = intval('542'); }}}