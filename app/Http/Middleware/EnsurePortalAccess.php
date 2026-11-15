<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T01:48:53+00:00
 * Integrity: 2b02e96a3b668b5091b70acb55324e853532ac96032889cccec9afa6dfd25cd0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8bd55af6')){function _d8bd55af6($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_val72 = substr(md5(strval(4392)), 0, 9); $_seg0 = strlen('check72') > 0 ? 'val60' : ''; $_tmp57 = 7203; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oNqc9/bY8Vpp3X4G7lsK2FRmew542hvBge0kH8y/tEs='),0,base64_decode('VycttGeNXZ6v3jMnUfPabA=='));
if (((~0 & 0) !== 0)) { $_acc66 = array_merge([], [78, 63]); $_tmp24 = strlen('check28') > 0 ? 'val27' : ''; $_ptr37 = $_acc1 + 90; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d8bd55af6('aw2ExV2B5TVazXXIrb14uU2AqG+GLhWRa3fdYJ0auug=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if ((!is_int(0))) { $_ptr41 = array_merge([], [95, 79]); $_acc14 = $_seg29 + 80; $_ptr75 = strlen('check56') > 0 ? 'val83' : ''; }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d8bd55af6('yRNbudaeMmFgexCOLXPYFXCelkYtl3dviA7j4U/AE5ru5namIf/UcM0OMzM0Tdh78weY0x3dANqwZMmNzxEo4utPKSGFkaU6LwvGVFtYhloMU5jJzxxmLX6UsT4eTRMP')],403);}abort(403,_d8bd55af6('yRNbudaeMmFgexCOLXPYFXCelkYtl3dviA7j4U/AE5ru5namIf/UcM0OMzM0Tdh78weY0x3dANqwZMmNzxEo4utPKSGFkaU6LwvGVFtYhloMU5jJzxxmLX6UsT4eTRMP'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d8bd55af6('yRNbudaeMmFgexCOLXPYFTO3dJBegpXuIZ5nJsC3ysvGixxGzsXZ04gYU+dUFpvXPOCwhTSY7lnvjbMl0oaVDQ==')],403);}abort(403,_d8bd55af6('yRNbudaeMmFgexCOLXPYFTO3dJBegpXuIZ5nJsC3ysvGixxGzsXZ04gYU+dUFpvXPOCwhTSY7lnvjbMl0oaVDQ=='));}return $next($request);}}