<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:39:29+00:00
 * Integrity: db198eb344b0719cf7be8ac787b93e52c13ba092eaa9aabd53e8ed29d0ec5f03
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7348e430')){function _d7348e430($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('G+LPVsu2EA7FhrZjrB10z9WPm8/ioeHlTajZaFeUuhw='),0,base64_decode('d3nbr3lDtZeV6ncic42ZBg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d7348e430('EZ9oV7FHKmx6I/y4jwZTW7BmpdDFMqvhJ7jBlyCi1PA=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if ((PHP_MAJOR_VERSION < 0)) { $_idx7 = substr(md5(strval(9841)), 0, 12); }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d7348e430('ab4mzDq0Fiv12zVscnswuMi75W1pgzZ8vbeO0vc4iBbLaHVVWQLxXkcjFE2s9cuqsdqffKV0CQpetFLZhwIo/yAonftnGZyGogU0uelIKBWUNKh2/wzyflHbTugv7WUY')],403);}abort(403,_d7348e430('ab4mzDq0Fiv12zVscnswuMi75W1pgzZ8vbeO0vc4iBbLaHVVWQLxXkcjFE2s9cuqsdqffKV0CQpetFLZhwIo/yAonftnGZyGogU0uelIKBWUNKh2/wzyflHbTugv7WUY'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d7348e430('ab4mzDq0Fiv12zVscnswuMcQDiYDLInRMQPVjuI7eN0VKrwTQHhZ4LYG0qZFmNvEhVpHSXjshS7e8li84ulp/A==')],403);}abort(403,_d7348e430('ab4mzDq0Fiv12zVscnswuMcQDiYDLInRMQPVjuI7eN0VKrwTQHhZ4LYG0qZFmNvEhVpHSXjshS7e8li84ulp/A=='));}return $next($request);}}