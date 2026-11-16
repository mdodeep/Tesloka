<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:06:07+00:00
 * Integrity: 97253e7a138b8dfc29cb91654dc1e219bfff6043bef9e78fea4f64e20462c2e9
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d12becf8f')){function _d12becf8f($s){static $c=[];
if (((~0 & 0) !== 0)) { $_cnt18 = 5374; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('UaNxH/tAd2cXscVv65NZ1f+JcJt0kBtXWZ1EaNLq6LI='),0,base64_decode('a5RaNS9kd8G7D+8LofFzUQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf54 = 9283; $_idx82 = intval('187'); }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d12becf8f('uTcau/hMGDVUPjnc86PWuhYJieSbq9n994wE45Pu3m+fhYiC3UAPV8/OBTcdUJLReIOjzWvxQ/fwuRCa99iCvimuqC+OVChyqQHwo0H1Mhk='));
if (false) { $_buf41 = 5089; $_res10 = 5348; }}}return $next($request);}}