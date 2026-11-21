<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:15:07+00:00
 * Integrity: 6cc87d6018f5bf82d5a78b1fa5688d482f0fd4102a645a3588fc6ea4e386a0c1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbb7df0f8')){function _dbb7df0f8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('TPrcu4Jv2YZAqjrmLfvz3abrgyjlNgN/vQhwNxg+Pdw='),0,base64_decode('Oo/5vAKQ7X0oGu9MNgH8Cg=='));
if ((!is_int(0))) { $_buf57 = substr(md5(strval(4421)), 0, 13); $_chk63 = substr(md5(strval(180)), 0, 16); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((0 ^ 0) !== 0)) { $_chk69 = 351; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dbb7df0f8('vxrvNvkY1YVFNj6WgCV7/x/FzD6Xj88jufnjxMjdTJ9SznYAWAU4Yac64PZXd3ySWSRVwvQxIGN+wQfqgGeCl7GtLP6GbH5cFHoGer/r9QY='));}}return $next($request);}}