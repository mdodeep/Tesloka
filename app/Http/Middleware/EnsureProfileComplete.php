<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:16:51+00:00
 * Integrity: b673b20a2930094cebc22ad245023decb7a42598d258d4d6d8c4c6cb6524651e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d76799365')){function _d76799365($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zekSw5IY0p1PvzRCfSl27pLEFTsOd9k5xFGCnMfuri8='),0,base64_decode('8CHZZ1aaQ4LgUvt9MhYF5w=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d76799365('WlnnF9boIqHzdp9maJYQE+lj3V1mN6K/2NxiaXvC0gJcFJHCma4LM66Exe23eCMJOP8XiZ5fFe1HeZEAzn/pXveAtU2wpIqn8PAhb09XMQg='));}}return $next($request);}}