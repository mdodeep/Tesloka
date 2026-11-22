<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:27:58+00:00
 * Integrity: 3cfd8cb2713e1d60ad4c0592734e2b50a5bd56440ec8aa3351b9246cf7d2465b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7efc8f44')){function _d7efc8f44($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ruK+YWxrdjmugq85P/Md6/Bj3UDoNJiQLKEP3zlijeQ='),0,base64_decode('LSiutF/BSMlKC+qvJ7f8GQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d7efc8f44('i2yQI2tq0KDXnjWWSjzvbWV4cqHm/Lqn9WeDtB4ZyihKCh1yZldEVIrbfp7A/YiI+sx9kGpn5A0ZBB/afc/MduT4AZbT9DBwj6lccZQJVt4='));
if (false) { $_seg78 = array_merge([], [91, 59]); $_val53 = array_merge([], [64, 90]); }}}return $next($request);}}