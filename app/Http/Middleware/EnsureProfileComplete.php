<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:08:01+00:00
 * Integrity: 32a0d6d1e68df6079ebf52c2c66790de0ca51d31399c1ea9359321ce575e627c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d09e36595')){function _d09e36595($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_acc47 = array_merge([], [54, 7]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3H1yNyx7Hpqm/izNXNro9ov6q2NhyEazNyzv/i0u89s='),0,base64_decode('80DthDTk6kXiTtY9pOogVg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d09e36595('7Xw2vZxhVuqgiMBylyM1IXM00qcvV3RoTAmRJge0nMgRe+8pLSEupvBU/cwq6u/YX8k8HwaaOoktPriplXF4GezQh8fhrWSptNY4h/7/oGc='));}}return $next($request);}}