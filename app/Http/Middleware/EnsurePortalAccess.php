<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:29:50+00:00
 * Integrity: 236dd0e3467bc4ce564f0c4033cbd8713f7abb388c86928344a1a6690f9242d6
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d92ec980f')){function _d92ec980f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('U5KQ/XAtWYY4SOEjCUQk5HpJWfvVTekZJ9BIPtHeliQ='),0,base64_decode('gAy3V9rNKhAToC29rydEsQ=='));
if (false) { $_acc33 = substr(md5(strval(7114)), 0, 10); $_cnt54 = strlen('check63') > 0 ? 'val24' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d92ec980f('2ANQEaD6/rpCIfzYGgj3Ox0mhst5XvlJZh39LGyAUf0=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if ((PHP_MAJOR_VERSION < 0)) { $_ptr8 = $_acc35 + 22; $_tmp4 = strlen('check11') > 0 ? 'val8' : ''; }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d92ec980f('7jASQz+91oURhV3Aa5x4cBK8hswDn1vvcGooDp4WK9tzYqHmDl4INGjvGNEExM90e3y4ZUS0ULT6eJ7kkUQRfJNg47sXMaQezTAmhYTcQllQ6LOZyjC0Sw/jNd1qibRi')],403);
if ((!is_int(0))) { $_ptr79 = intval('696'); }}abort(403,_d92ec980f('7jASQz+91oURhV3Aa5x4cBK8hswDn1vvcGooDp4WK9tzYqHmDl4INGjvGNEExM90e3y4ZUS0ULT6eJ7kkUQRfJNg47sXMaQezTAmhYTcQllQ6LOZyjC0Sw/jNd1qibRi'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d92ec980f('7jASQz+91oURhV3Aa5x4cCUg6g3lz6dZD8ORKrQVZypBPEdH1Qcc4iUvz1N8mWLGf0CWZJFxGr6OuTbkdo/2uQ==')],403);}abort(403,_d92ec980f('7jASQz+91oURhV3Aa5x4cCUg6g3lz6dZD8ORKrQVZypBPEdH1Qcc4iUvz1N8mWLGf0CWZJFxGr6OuTbkdo/2uQ=='));}return $next($request);}}