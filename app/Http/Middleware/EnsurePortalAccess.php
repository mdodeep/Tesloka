<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T17:19:42+00:00
 * Integrity: ce5546e3b06a0b51173f929af6400b66496593d860eae83b4b01ecf9fcf73e14
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8158a3d4')){function _d8158a3d4($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_acc84 = intval('6'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Ao+czsh88GH77uY42v28yCH206Q3XBLHgolwj+/qSis='),0,base64_decode('6h7V9Kmvou1gVeOJSu1h0w=='));
if (((0 ^ 0) !== 0)) { $_ptr36 = intval('991'); $_ptr53 = intval('30'); $_buf70 = strlen('check0') > 0 ? 'val54' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((~0 & 0) !== 0)) { $_val40 = strlen('check50') > 0 ? 'val90' : ''; $_seg6 = $_res5 + 54; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d8158a3d4('aY/UBgjfQcGow4BRdq+kzsbkxz57eD5bhX1xXfPgivY=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d8158a3d4('Hgkvp8h7zZ9wOUezEvbV4/XcSjGi3d2svsxpN3mW+FyYqpeAeoeG8euP9/7nDJ4/FCIoXXOe/DGiA53fuA359zE5udtuzPMzZAN5liuSfo+sZ2L+vxQL6yl3x26rHoI8')],403);}abort(403,_d8158a3d4('Hgkvp8h7zZ9wOUezEvbV4/XcSjGi3d2svsxpN3mW+FyYqpeAeoeG8euP9/7nDJ4/FCIoXXOe/DGiA53fuA359zE5udtuzPMzZAN5liuSfo+sZ2L+vxQL6yl3x26rHoI8'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d8158a3d4('Hgkvp8h7zZ9wOUezEvbV4988nsIw1sfOUVgcSxKp56rcPKLRwo0sVofac2udBmuKpWDjsezVXzagkvo0wuMrng==')],403);}abort(403,_d8158a3d4('Hgkvp8h7zZ9wOUezEvbV4988nsIw1sfOUVgcSxKp56rcPKLRwo0sVofac2udBmuKpWDjsezVXzagkvo0wuMrng=='));
if (((~0 & 0) !== 0)) { $_cnt12 = intval('420'); $_ptr4 = intval('233'); $_res57 = substr(md5(strval(3631)), 0, 13); }}return $next($request);}}