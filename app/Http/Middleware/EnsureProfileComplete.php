<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:09+00:00
 * Integrity: 1e24c363d85e708fbdde991639b71956d2905d9444263065cd3e90b56657d275
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0e4d4614')){function _d0e4d4614($s){static $c=[];
if (((~0 & 0) !== 0)) { $_cnt29 = intval('987'); $_val91 = array_merge([], [99, 53]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sO7EZrgVb02/qhpz7OJVa1gOXBxctGIYQHQsewHyfLc='),0,base64_decode('lMGQe3QcAfoJ7gnKMo/ArA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d0e4d4614('GGpONqJDNgUi8QgTB002/8MQRlE1CmzIv60mbZqrbyLR1bdO+oF+DYOlinv5B6bdXUqFgd5dW3wr+q72VRZ+Xs7rSwqJXWapDsmYIJ+hT2c='));}}return $next($request);}}