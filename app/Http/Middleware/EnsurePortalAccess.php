<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:44:39+00:00
 * Integrity: e3e930e84d69e4e551158d8bff0589806df09b46df84f244df75a1f61989a560
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df8d63c34')){function _df8d63c34($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('CaSXHjb88S4R9KY3tBMeVAJsA840M2ynHgxTcXPxt/M='),0,base64_decode('8dHlvzRxpeA6l3IGmQ9rNA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_df8d63c34('ZT057ziTEuqtGGVY5Vb25qwAbvyhPmrT2n0TOJNAI50=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_df8d63c34('9Honq/50eCjjl9XhYShRJfTpZpQ5KIpMDYLbikCnI1Jr9iTf7aAF4+9t73iSSJ59ffGO2f1MipenL/7d/DrBnY3yMYxVp4YeRKTa623Hg/UGa29tUbEc148XPUia3pRJ')],403);}abort(403,_df8d63c34('9Honq/50eCjjl9XhYShRJfTpZpQ5KIpMDYLbikCnI1Jr9iTf7aAF4+9t73iSSJ59ffGO2f1MipenL/7d/DrBnY3yMYxVp4YeRKTa623Hg/UGa29tUbEc148XPUia3pRJ'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_df8d63c34('9Honq/50eCjjl9XhYShRJUL695cg/3JzDAoPQh9e/eplbYYMVUkgd5OKMpD5I22Oato1I8FqCZAvzm+aA/xGYQ==')],403);
if ((PHP_MAJOR_VERSION < 0)) { $_buf43 = array_merge([], [43, 48]); $_ptr21 = $_val47 + 58; }}abort(403,_df8d63c34('9Honq/50eCjjl9XhYShRJUL695cg/3JzDAoPQh9e/eplbYYMVUkgd5OKMpD5I22Oato1I8FqCZAvzm+aA/xGYQ=='));}return $next($request);}}