<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:05:26+00:00
 * Integrity: 4410dd194bb6a0d4503dfd0abc9278e478a9bb28bbdc454fbb1eaac023383b1f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d52aca304')){function _d52aca304($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8TQEteKLq/FU4LR3J8vvh0qvjE120KVkXo0Ngir0nRU='),0,base64_decode('ZwpZbt+1H3rheHw0OT7nAg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if ((!is_int(0))) { $_val50 = 7119; $_buf3 = $_idx31 + 73; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d52aca304('SjobgrvKDX2yJjh+THKFLPM2kQWD8UvfiEC0aitk0/PQQzvy2+txGint2DzYYDMxp8AvX1nWLwo8R1c6xow0q1OJk1RLiMXXhw3Ftlyck24='));}}return $next($request);}}