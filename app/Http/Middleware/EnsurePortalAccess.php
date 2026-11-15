<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:46:25+00:00
 * Integrity: 5dc076367dca2aca8216f163718bf09dc1ac6d174d5e80534a1715a9a20a58f6
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dcf483292')){function _dcf483292($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('QIyToKgWa0PF9Ob5pNoI1yheMFeTfT0ijbx0fDkYHQ4='),0,base64_decode('XKrL8B4GWrjT4ruBkOqztA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dcf483292('jfJfBEZZ0VwGg2KtyxzI0lB6GzT4HY9UarULB26SmR4=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dcf483292('Byl1pQZKEvDKtd9z9oi80Hl5i5DYjDL6rXmZEeiRI0F/YNpzk/EInQS75T0R9bOjdLw+ToDGzqOSAkIfq0hRZICVcYXexyOsrti4+vU+ds9AX6c42aSgzcXHHCIdZGfV')],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx63 = 3681; $_tmp31 = $_seg32 + 51; }}abort(403,_dcf483292('Byl1pQZKEvDKtd9z9oi80Hl5i5DYjDL6rXmZEeiRI0F/YNpzk/EInQS75T0R9bOjdLw+ToDGzqOSAkIfq0hRZICVcYXexyOsrti4+vU+ds9AX6c42aSgzcXHHCIdZGfV'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dcf483292('Byl1pQZKEvDKtd9z9oi80KgErrFbZOFz2OsxaQIWYI3mmlJPsTHaQe5BMKNxNExDuqGjX6pk3WclyfvBQqtfwA==')],403);}abort(403,_dcf483292('Byl1pQZKEvDKtd9z9oi80KgErrFbZOFz2OsxaQIWYI3mmlJPsTHaQe5BMKNxNExDuqGjX6pk3WclyfvBQqtfwA=='));}return $next($request);}}