<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:55:37+00:00
 * Integrity: 1e494954db31ea5015f15c78b54cb3ec28774dcf71dc04fa59ca18152ead1bdf
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dcbcebec9')){function _dcbcebec9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FHRBNicRR4Oc4TGTQUu/XgpswbO2rgZ4WtjbF/p0XL8='),0,base64_decode('NIOqqDzMWujo4ZU9gyB5+A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dcbcebec9('GP3gCh90dr/m2i5GfbcI4Ls38MXTRwVArZ802xFIZr8=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((~0 & 0) !== 0)) { $_val59 = substr(md5(strval(8473)), 0, 12); $_chk77 = $_chk4 + 23; $_cnt1 = substr(md5(strval(5868)), 0, 14); }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dcbcebec9('CnETyGk2VGvymmWDZVB87gelFjVuQqYVng2pXHH6UD9XJpCpxsMgFY2zyXcKFBbIJFYJcOTXyeNTso1VOhkDSGIu2/n6JESBSCGA7DnIWwEJtnutx9YKuQ4PjrzNoAr+')],403);}abort(403,_dcbcebec9('CnETyGk2VGvymmWDZVB87gelFjVuQqYVng2pXHH6UD9XJpCpxsMgFY2zyXcKFBbIJFYJcOTXyeNTso1VOhkDSGIu2/n6JESBSCGA7DnIWwEJtnutx9YKuQ4PjrzNoAr+'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dcbcebec9('CnETyGk2VGvymmWDZVB87rZosBjWR9Wdbzjet1GV0LGNz3h2tnkrbDgHbNMhvXGU+m8IP74tx1EsTF/kSSynCg==')],403);}abort(403,_dcbcebec9('CnETyGk2VGvymmWDZVB87rZosBjWR9Wdbzjet1GV0LGNz3h2tnkrbDgHbNMhvXGU+m8IP74tx1EsTF/kSSynCg=='));}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_idx15 = strlen('check50') > 0 ? 'val44' : ''; $_seg74 = $_cnt22 + 67; }}}