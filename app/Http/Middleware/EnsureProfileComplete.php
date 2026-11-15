<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:18:26+00:00
 * Integrity: 3ddb70f39474a65d6f1e659715367dfdc86ba7125b0cb12cfc1c6446c744b981
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1cb7a887')){function _d1cb7a887($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9D3QVGVozZHPoeLldAVT2BJUJXr+AGH5oklW9XT/j14='),0,base64_decode('WJp/7kKQQth1A+m90Br7IQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d1cb7a887('P1IcqTrH7ECGUq81DN1l06Yaf7+wLUzt2NbBTGvZ6xHK5f/Fsf/j1KfH4rVltBHjxU3A1//M6iZohkJgy71RbmCkaPkD0OVUfTbgPr1Cwp0='));}}return $next($request);}}