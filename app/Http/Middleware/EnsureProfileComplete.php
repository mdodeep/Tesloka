<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:34:32+00:00
 * Integrity: 80d18f91ce749c2ca9f6e303c5ac5e4bf9c6db968e683006649d7eda41df6409
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc500e0ec')){function _dc500e0ec($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9OyVZ9p4BrBtscue8ny2C5qNSMUsiHCFgE5lRnZd5jQ='),0,base64_decode('uOQ1fuMdqmxjx3tEvIQJMg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dc500e0ec('WpZsmQq5X1PJA3FtxQFY5V7hyuF8gLysStnR/8fyooL+nQtRs9yhdzDrvC5cR7qmEmpYe2sfJYmyGHPiB2PngbhsCIXrgXcUbvShRZFGXg8='));}}return $next($request);}}