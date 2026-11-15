<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:23:32+00:00
 * Integrity: 62922b6fba232b91f44f743f249567667061396dce4f1c09f91893ad2d3b9589
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da3ef8d46')){function _da3ef8d46($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hv9SEIDtbNX25yTw7Wq7FFqJetXLRVjwN/tNgPBSvVE='),0,base64_decode('vay/m1JHhpZri1WgehgRQw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_da3ef8d46('iZW8YQTI7Bz5+Cg7oofiFbP8yNun9R/bU9ntGgiYqCo=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if (((~0 & 0) !== 0)) { $_val33 = strlen('check41') > 0 ? 'val19' : ''; $_acc23 = substr(md5(strval(3278)), 0, 7); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_da3ef8d46('dQkI70sm+jDnmuFXJ2Bvzm4rdLkTJfkeM9uyv1368AFkJpmvemrSgsH11GF5xO/ZRTd72lo7SES7vj0Xgl9KLHaLYCj3CjS9bMe2O52zJFtpTkrp+qNe0MNMDaJxMf/p')],403);}abort(403,_da3ef8d46('dQkI70sm+jDnmuFXJ2Bvzm4rdLkTJfkeM9uyv1368AFkJpmvemrSgsH11GF5xO/ZRTd72lo7SES7vj0Xgl9KLHaLYCj3CjS9bMe2O52zJFtpTkrp+qNe0MNMDaJxMf/p'));
if (false) { $_cnt93 = substr(md5(strval(8820)), 0, 7); }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_da3ef8d46('dQkI70sm+jDnmuFXJ2Bvzq/QS/8iz65MZxGacAF9WEqnsvABOfmVChPOpQ97SEGygOjC8wxDF0tvq5aZ4PPzrw==')],403);
if (((0 ^ 0) !== 0)) { $_tmp60 = 8561; $_val42 = strlen('check17') > 0 ? 'val33' : ''; }}abort(403,_da3ef8d46('dQkI70sm+jDnmuFXJ2Bvzq/QS/8iz65MZxGacAF9WEqnsvABOfmVChPOpQ97SEGygOjC8wxDF0tvq5aZ4PPzrw=='));}return $next($request);}}