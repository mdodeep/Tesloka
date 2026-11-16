<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:12:03+00:00
 * Integrity: 827550dfee9bb5c5eb345a2beaa3a4c0ec71eb2e8d7fe8a9ed3961444bdfc0f5
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df7523f99')){function _df7523f99($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1Rr4MqFiFJ9e8Mw9Fwu6mefxT8acSChKslfPwDgS2Zs='),0,base64_decode('1zn3JW7c58j38JS8FzzKqg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_df7523f99('DUXJ+7h0mxPRw7Uk9LnHEl10izwA1Hj51g7KjYJRUuwRLibqvNTwIbfFQSsyAsAdOZ3E8PEiFxZChJ7qrv/ZMmgZifPayYKOEPZWLW9ouNQ='));}}return $next($request);}}