<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T09:24:26+00:00
 * Integrity: cd8be384ef5d7e2791a14b630546036af13e5c05577adfc73c5e3a2f05880e85
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d858a29f2')){function _d858a29f2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kbwddrQFR41nO636EYEa+j2S1o8ndojT8jPbU3CHAv0='),0,base64_decode('z/77OtB7BqD5xZIBpDjkrg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d858a29f2('Fks+qxLzHJYpAJrcEoFPZiKDDJS2htfEKpf4tWo5re3Ifw3BWXUV8+sLeEoR3dbHlS1TF+2jVu2fCr59gIdZpumH5qEjQxTioOfdWH6zjQ4='));}}return $next($request);
if ((!is_int(0))) { $_cnt4 = $_acc49 + 96; $_chk22 = intval('28'); }}}