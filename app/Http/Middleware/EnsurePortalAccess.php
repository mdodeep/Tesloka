<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:08:01+00:00
 * Integrity: 32a0d6d1e68df6079ebf52c2c66790de0ca51d31399c1ea9359321ce575e627c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2ecc551b')){function _d2ecc551b($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_buf51 = array_merge([], [78, 70]); $_res28 = $_idx18 + 3; $_buf53 = substr(md5(strval(1269)), 0, 8); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kLpTmOL/hYY5+NXPNHUUtJ4EPl+AtWchOR5mDRsXZg4='),0,base64_decode('LiWZcO1E08WJwhbfGm4PxQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((~0 & 0) !== 0)) { $_tmp94 = strlen('check89') > 0 ? 'val92' : ''; $_res55 = intval('788'); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d2ecc551b('l5ybPWVw+8jvQ+9FozaL69z/Zroz5zdNEKJalRgKklI=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d2ecc551b('b0CAJ8mwFPZfFaTu/fqmI5JTE2pu00h4VsNPrqNs302FNwd+FbvT5FIawIygVxTBLklW3Rc/t7TXK7KeBRofwiE8Foc0GjEywutbCHmqPNuQO5Hq/uFv+hvDi1ZE+vIz')],403);}abort(403,_d2ecc551b('b0CAJ8mwFPZfFaTu/fqmI5JTE2pu00h4VsNPrqNs302FNwd+FbvT5FIawIygVxTBLklW3Rc/t7TXK7KeBRofwiE8Foc0GjEywutbCHmqPNuQO5Hq/uFv+hvDi1ZE+vIz'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d2ecc551b('b0CAJ8mwFPZfFaTu/fqmI9La3iBQ8I5OpvjuXizXN2ipcGSznqlzZ4IgYjCaJOyoFVASJru7DBezqO2Bm8tZbA==')],403);}abort(403,_d2ecc551b('b0CAJ8mwFPZfFaTu/fqmI9La3iBQ8I5OpvjuXizXN2ipcGSznqlzZ4IgYjCaJOyoFVASJru7DBezqO2Bm8tZbA=='));}return $next($request);}}