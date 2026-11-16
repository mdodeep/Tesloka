<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:38:09+00:00
 * Integrity: bc7f5b3c74d51b63901f4967a2adc5558fd3cec333bf300f09ffd1de449a27e9
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d273d2a42')){function _d273d2a42($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7LqOH/hugBjE5I73oFSDn5CZ0iLoCZwiqzwWWkrU0x0='),0,base64_decode('wVnndh83QpKACjUKM5HWcw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d273d2a42('SXn03gDhKaN1tHjkRfszEA7bk1z8E9dr9nc5N6QKvYw=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d273d2a42('mGN7wfHKemTvqsoH2++Xxuk4+iYZeS2/KvhStaGUmI/DWLo4ajj40mshcqFAC9Lg2SitpewEsk1JfBW1BKDjopB8HO2kpNVCaIrhU2dZHT6WQePfC51+CMU5ZLGZ7ClO')],403);}abort(403,_d273d2a42('mGN7wfHKemTvqsoH2++Xxuk4+iYZeS2/KvhStaGUmI/DWLo4ajj40mshcqFAC9Lg2SitpewEsk1JfBW1BKDjopB8HO2kpNVCaIrhU2dZHT6WQePfC51+CMU5ZLGZ7ClO'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d273d2a42('mGN7wfHKemTvqsoH2++Xxt8+PtpYCM/Dyg8Cgh2E09RZ6PR5HQ8mm5M2+30h+8JybvWEKLvQswz0LxqJp728UQ==')],403);}abort(403,_d273d2a42('mGN7wfHKemTvqsoH2++Xxt8+PtpYCM/Dyg8Cgh2E09RZ6PR5HQ8mm5M2+30h+8JybvWEKLvQswz0LxqJp728UQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg31 = substr(md5(strval(6351)), 0, 8); }}return $next($request);}}