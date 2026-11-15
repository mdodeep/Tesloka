<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:06:37+00:00
 * Integrity: cf1490e0e40d44e80b28fdf590044dfef46bee366998158e0ab499e7710c3b23
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3795cedf')){function _d3795cedf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/aU9hkRVw+1rKPJ9FrqjkYxdfsvxw8KTJJVkDbWVAWY='),0,base64_decode('VIi5X4DzBUndf6IaeAwM2A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d3795cedf('ApFQoZJrjUFFst96gofL51+W2+gxupdQPT96mnSNr8tGbPqP7Ys45TkraUKhiREQqVhHB3sW0BgZszdaATDHzdnT8/FozKx5z+CpPsrFyok='));}}return $next($request);}}