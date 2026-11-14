<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:47:32+00:00
 * Integrity: a598bf64f00008c783ad21f6af90c807f908ed697fcf9716f4d136daee24f76f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d074764b6')){function _d074764b6($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_res49 = $_seg34 + 67; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('g9vSKWFlRyWbShUXGJGO3KruqmCoAePWDXYEXsbPf5w='),0,base64_decode('E1VNPIeR6tjeK6XEyRVhXQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d074764b6('Waut/DeAp8p5zrn0fpWbEnviHZYVKsnQcwNAXBdbEfAJrm2QbTwhjco7Y2+pTN8ivlZB4qMnATFdqhVzKYWFGxKYQa6buScOrMrnsPwMhJs='));}}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr51 = substr(md5(strval(14)), 0, 5); }}}