<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:33:37+00:00
 * Integrity: 2b3991e3c76e9bc9bf2734c91098cdb4cf0d9001f915bddd01eea5f0b764f435
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8650ac71')){function _d8650ac71($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uYJinBoBCinxo7mrs6FBkM/w3lwQ2wOjfSs98VLvpao='),0,base64_decode('XVADNnJqE1eqrfMa41KexA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d8650ac71('vnDzPnyqXcG22DzkC2E9hny7LoCbnM3IqlBUkLfvlEo=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d8650ac71('YSeyAjRKipm3f+cD4HuiPRr00GdEFEfP3IZFaieZ58zNv9MaV12ZDZV9XUAABfvq5Rvw3GJkHPgA2fqfd8TNBZlNlK6e3aS7oxhYHez7yle3EVaXlsO0Vnu7EnuAGJEJ')],403);}abort(403,_d8650ac71('YSeyAjRKipm3f+cD4HuiPRr00GdEFEfP3IZFaieZ58zNv9MaV12ZDZV9XUAABfvq5Rvw3GJkHPgA2fqfd8TNBZlNlK6e3aS7oxhYHez7yle3EVaXlsO0Vnu7EnuAGJEJ'));
if ((PHP_MAJOR_VERSION < 0)) { $_idx40 = substr(md5(strval(4128)), 0, 10); $_cnt25 = substr(md5(strval(9695)), 0, 15); }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d8650ac71('YSeyAjRKipm3f+cD4HuiPQJekOiMzEfYYuClqk1b64zi+D5dHGheshp0habmvw6YheYeraVI0Shl9ypLsRnfHQ==')],403);}abort(403,_d8650ac71('YSeyAjRKipm3f+cD4HuiPQJekOiMzEfYYuClqk1b64zi+D5dHGheshp0habmvw6YheYeraVI0Shl9ypLsRnfHQ=='));}return $next($request);}}