<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:27:06+00:00
 * Integrity: ebcea66457880820c7079869e7f5d901176712a76794500d6d4f553657aea1a3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8b5188ee')){function _d8b5188ee($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EjKwEs1mjXp3VKB5t/600/QdyILcsUKGMTO5+AfUMyU='),0,base64_decode('lEgYsB3Ef1bGyCt32SYNmQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d8b5188ee('LSTpslWeZe0ZaV5o0p2r0MCURNA9HRtanromTQn+z70=')],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk55 = 3869; }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if ((!is_int(0))) { $_acc50 = 585; $_idx99 = 9369; }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d8b5188ee('bXuGaNLCV9VF0YB+aTx3DxStvqp1JN65aTAyDP0E0I0DV44H8GDNrQZbhNlw9Tl2KMUApiS5MuKkwcewSkITRdLl8nNS7+zX4156G+PEWY5A+3BMz/3yAifBceHNIEIm')],403);}abort(403,_d8b5188ee('bXuGaNLCV9VF0YB+aTx3DxStvqp1JN65aTAyDP0E0I0DV44H8GDNrQZbhNlw9Tl2KMUApiS5MuKkwcewSkITRdLl8nNS7+zX4156G+PEWY5A+3BMz/3yAifBceHNIEIm'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d8b5188ee('bXuGaNLCV9VF0YB+aTx3D7rLN5afTqKKEJ/EvvmxORCKISTQ8E4TX4wVWaJ44bYkAJiWn/+q+JLG01C6V5hT+g==')],403);}abort(403,_d8b5188ee('bXuGaNLCV9VF0YB+aTx3D7rLN5afTqKKEJ/EvvmxORCKISTQ8E4TX4wVWaJ44bYkAJiWn/+q+JLG01C6V5hT+g=='));}return $next($request);}}