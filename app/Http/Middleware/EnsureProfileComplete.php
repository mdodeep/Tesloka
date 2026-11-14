<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:29:50+00:00
 * Integrity: 236dd0e3467bc4ce564f0c4033cbd8713f7abb388c86928344a1a6690f9242d6
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7e816cf0')){function _d7e816cf0($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('QLTSIP4AC6HXq2CpOJVIoZZoAQTrH6qFEO62WxpD0yc='),0,base64_decode('XskqsWu5KHkffJUOpYYK5w=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d7e816cf0('8JlHnZVv3PKINu6SKzVHbyplroujiLHQETGxhJsndpqB67l3Ps+qDu/0Oe13aW+H6gAb57uioFd0+8lW4DQjMZyjRqvOaHh7V8KXBhkgDRI='));}}return $next($request);
if (false) { $_seg93 = array_merge([], [99, 35]); }}}