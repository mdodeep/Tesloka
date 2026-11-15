<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T01:48:53+00:00
 * Integrity: 2b02e96a3b668b5091b70acb55324e853532ac96032889cccec9afa6dfd25cd0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd93f5e49')){function _dd93f5e49($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('YbmtzhNi/JoWkeDQd/JnkSW0A+qAnqL1jAz8ogxdwuY='),0,base64_decode('z3hhM6CYmeX6lmwRKbqc1w=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dd93f5e49('llX5clckr3eo0JSadQDuBxC9Fcci+S5qcG6tpJXf43wkhRiFxfMrOtkkc+0lSm19F3Jt2IrOfzU7imGTvW0U8m3mHscaYUJtG7YpX4StJTU='));}}return $next($request);}}